<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 03/10/2016
 * Time: 10:43
 */
namespace App\Modules\Gallery\Http\Controllers\Administrator;


use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use App\Modules\Gallery\Models\GalleryPhoto as Image;
use App\Modules\Gallery\Models\GalleryEvent;
use Auth;

class ImageRepository {
    public function upload($form_data) {
        $validator = Validator::make($form_data, Image::$rules, Image::$messages);
        if ($validator->fails()) {
            return Response::json([
                'error' => true,
                'message' => $validator->messages()->first(),
                'code' => 400
            ], 400);
        }

        //event name
        $event = GalleryEvent::find($form_data['gallery_event_id']);
        $image_folder = 'gallery/';
        if($event) {
            $image_folder .=Str::slug($event->name, '-');
        } else {
            $image_folder .='default/';
        }

        if(!File::exists($image_folder)){
            File::makeDirectory($image_folder,$mode = 0777, true, true);
        }

        $photo = $form_data['file'];
        $originalName = $photo->getClientOriginalName();
        $extension = $photo->getClientOriginalExtension();
        $originalNameWithoutExt = substr($originalName, 0, strlen($originalName) - strlen($extension) - 1);
        $filename = $this->sanitize($originalNameWithoutExt);
        $allowed_filename = $this->createUniqueFilename( $filename, $extension );
        $uploadSuccess1 = $this->original( $photo,$image_folder, $allowed_filename );
        $uploadSuccess2 = $this->icon( $photo, $allowed_filename );

        if( !$uploadSuccess1 || !$uploadSuccess2 ) {
            return Response::json([
                'error' => true,
                'message' => 'Server error while uploading',
                'code' => 500
            ], 500);
        }


        $image = new Image;
        $image->gallery_event_id =$form_data['gallery_event_id'];
        $image->photo_storage_location = $image_folder.'/'.$allowed_filename;
		$image->description = $originalNameWithoutExt;
        $image->created_at = date("Y-m-d H:i:s");
        $image->created_by = Auth::user()->id;
        $image->updated_at = date("Y-m-d H:i:s");
        $image->updated_by = Auth::user()->id;
        $image->save();
        return Response::json([
            'error' => false,
            'code'  => 200
        ], 200);
    }

    public function createUniqueFilename( $filename, $extension ) {
        $full_size_dir = Config::get('images.full_size');
        $full_image_path = $full_size_dir . $filename . '.' . $extension;

        if ( File::exists($full_image_path))
        {
            // Generate token for image
            $imageToken = substr(sha1(mt_rand()), 0, 5);
            return $filename . '-' . $imageToken . '.' . $extension;
        }

        return $filename . '.' . $extension;
    }

    /**
     * Optimize Original Image
     */
    public function original($photo,$location,$filename){
        $manager = new ImageManager();
        $image = $manager->make($photo)->save($location .'/'. $filename);
        return $image;
    }

    /**
     * Create Icon From Original
     */
    public function icon( $photo, $filename ) {
        $manager = new ImageManager();
        $image = $manager->make( $photo )->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();
        })
            ->save( Config::get('image.icon_size')  . $filename );

        return $image;
    }

    /**
     * Delete Image From Session folder, based on original filename
     */
    public function delete($originalFilename) {
        $sessionImage = Image::where('photo_storage_location', 'like', $originalFilename)->first();

        if(empty($sessionImage))  {
            return Response::json([
                'error' => true,
                'code'  => 400
            ], 400);
        }

        if(File::exists(public_path($originalFilename)))  {
            File::delete($originalFilename);
        }

        if( !empty($sessionImage)){
            $sessionImage->delete();
        }

        return Response::json([
            'error' => false,
            'code'  => 200
        ], 200);
    }

    function sanitize($string, $force_lowercase = true, $anal = false) {
        $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]",
            "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
            "â€”", "â€“", ",", "<", ".", ">", "/", "?");
        $clean = trim(str_replace($strip, "", strip_tags($string)));
        $clean = preg_replace('/\s+/', "-", $clean);
        $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;

        return ($force_lowercase) ?
            (function_exists('mb_strtolower')) ?
                mb_strtolower($clean, 'UTF-8') :
                strtolower($clean) :
            $clean;
    }



}