<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 28/09/2016
 * Time: 14:28
 */
namespace App\Modules\Gallery\Http\Controllers\Administrator;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use App\Modules\Gallery\Models\GalleryEvent;
use App\Modules\Gallery\Models\GalleryPhoto;
use App\Modules\Gallery\Http\Controllers\Administrator\ImageRepository;
use Auth;
use Config;
use Crypt;
use Lang;
use Redirect;
use Request;
use Response;
use SEOMeta;
use Setting;
use Theme;
use Validator;

class GalleryController extends Controller {
    protected $image;
    public function __construct(ImageRepository $imageRepository) {
        $this->image = $imageRepository;
        Theme::setActive("administrator");
    }

    public function index(GalleryEvent $event) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').Lang::get('gallery::app.gallery'));
        return Theme::view ('gallery::Administrator.index',array(
            'events' =>  $event
                ->selectRaw("*,DATE_FORMAT(date_from,'%d/%m/%Y') as date_from,DATE_FORMAT(date_to,'%d/%m/%Y') as date_to")
                ->where("name", "like", "%".Request::get("name")."%")
                ->sortable()->paginate(Setting::get_key('limit_page') ? Setting::get_key('limit_page') : Config::get('site.limit_page')),
        ));
    }

    public function create() {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('action.create').' '.Lang::get('gallery::app.gallery'));
        return Theme::view ('gallery::Administrator.form',array(
            'event' =>  null,
        ));
    }

    public function view($id,GalleryEvent $event,GalleryPhoto $photo) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('action.view').' '.Lang::get('gallery::app.gallery'));
        $id = Crypt::decrypt($id);
        return Theme::view ('gallery::Administrator.view',array(
            'event' =>  $event->selectRaw("*,DATE_FORMAT(date_from,'%d/%m/%Y') as date_from,DATE_FORMAT(date_to,'%d/%m/%Y') as date_to")->find($id),
            'photos' => $photo->where("gallery_event_id",$id)->paginate(Setting::get_key('limit_page') ? Setting::get_key('limit_page') : Config::get('site.limit_page')),
        ));
    }

    public function status($id,GalleryEvent $event) {
        $ids = Crypt::decrypt($id);
        $event = $event->find($ids);
        if($event) {
            if($event->is_active == 1) {
                $is_active = 0;
            } else {
                $is_active = 1;
            }
            $event->is_active = $is_active;
            $event->updated_at = date("Y-m-d H:i:s");
            $event->save();
        }

        return Redirect::intended ( '/gallery/administrator/view/'.$id);
    }

    public function edit($id,Gallery $event) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('action.edit').' '.Lang::get('gallery::app.gallery'));
        $id = Crypt::decrypt($id);
        return Theme::view ('gallery::Administrator.form',array(
            'job' =>  $event->selectRaw("*,DATE_FORMAT(date_from,'%d/%m/%Y') as date_from,DATE_FORMAT(date_to,'%d/%m/%Y') as date_to")->find($id),
        ));
    }

    public function update(GalleryEvent $event) {
        $id =  Input::has("id") ? Crypt::decrypt(Input::get("id")) : null;
        $name = Input::get("name");
        $date_from = preg_replace('!(\d+)/(\d+)/(\d+)!', '\3-\2-\1', Input::get('date_from'));
        $date_to = preg_replace('!(\d+)/(\d+)/(\d+)!', '\3-\2-\1', Input::get('date_to'));

        $field = array (
            'name' => $name,
            'date_from' => $date_from,
            'date_to' => $date_to,
        );

        $rules = array (
            'name' => 'required',
            'date_from' => 'required',
            'date_to' => 'required',
        );

        $validate = Validator::make($field,$rules);
        if($validate->fails()) {
            $params = array(
                'success' => false,
                'message' => $validate->getMessageBag()->toArray()
            );
        } else {
            if(!empty($id)) {
                //update home_banner
                $event = $event->find($id);
                $event->name  = $name;
				$event->date_from = $date_from;
                $event->date_to = $date_from;
                $event->updated_at = date("Y-m-d H:i:s");
				$event->updated_by = Auth::user()->id;
                $event->save();
                $message = Lang::get('gallery::message.update successfully');
            } else {
                $event->name  = $name;
                $event->date_from = $date_from;
                $event->date_to = $date_from;
                $event->created_at = date("Y-m-d H:i:s");
                $event->created_by = Auth::user()->id;
                $event->updated_at = date("Y-m-d H:i:s");
                $event->updated_by = Auth::user()->id;
                $event->save();
                $message =  Lang::get('gallery::message.insert successfully');
            }
            $params ['success'] =  true;
            $params ['redirect'] = url('/gallery/administrator/view/'.Crypt::encrypt($event->id));
            $params ['message'] =  $message;
        }

        return Response::json($params);
    }

    public function upload($id,GalleryEvent $event) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('action.upload').' '.Lang::get('gallery::app.gallery'));
        $id = Crypt::decrypt($id);
        return Theme::view ('gallery::Administrator.upload',array(
            'event' => $event->selectRaw("*,DATE_FORMAT(date_from,'%d/%m/%Y') as date_from,DATE_FORMAT(date_to,'%d/%m/%Y') as date_to")->find($id),
        ));
    }

    public function server_images() {
        $id = Input::get("id");
        $images = GalleryPhoto::where("gallery_event_id",$id)->get();
        $image_data = array();
        foreach ($images as $key => $image) {
            $image_data[] = array(
                'original' =>  $image->photo_storage_location,
                'server' => url($image->photo_storage_location),
                'size' => File::size(public_path($image->photo_storage_location))
            );
        }

        return response()->json([
            'images' => $image_data
        ]);

    }

    public function do_upload() {
        $photo = Input::all();
        $response = $this->image->upload($photo);
        return $response;
    }

    public function do_upload_delete() {
        $file_id = Input::get('id');
        if(!$file_id)  {
            return false;
        }
        $response = $this->image->delete($file_id);
        return $response;
    }

    public function delete(GalleryEvent $event) {
        $id = Crypt::decrypt(Input::get("id"));
        $is_exists = $event->select(['id'])->where('id',$id)->first();
        if($is_exists) {
            $event->where(['id' => $id])->delete();
            $params ['id'] =  $is_exists->id;
            $params ['success'] =  true;
            $params ['message'] =  Lang::get('gallery::message.delete successfully');
        }
        return Response::json($params);
    }

}