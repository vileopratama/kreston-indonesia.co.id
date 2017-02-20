<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 28/09/2016
 * Time: 14:28
 */
namespace App\Modules\Publication\Http\Controllers\Administrator;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use App\Modules\Publication\Models\Publication;
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

class PublicationController extends Controller {
    public function __construct() {
        Theme::setActive("administrator");
    }

    public function index(Publication $publication) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('publication::app.home banner'));
        return Theme::view ('publication::Administrator.index',array(
            'publications' =>  $publication
                ->where("title", "like", "%".Request::get("title")."%")
                ->sortable()->paginate(Setting::get_key('limit_page') ? Setting::get_key('limit_page') : Config::get('site.limit_page')),
        ));
    }

    public function create() {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('action.create').' '.Lang::get('publication::app.home banner'));
        return Theme::view ('publication::Administrator.form',array(
            'publication' =>  null,
        ));
    }
	
	public function view($id,Publication $publication) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('action.view').' '.Lang::get('publication::app.home banner'));
		$id = Crypt::decrypt($id);
		return Theme::view ('publication::Administrator.view',array(
            'publication' =>  $publication->find($id),
        ));
	}
	
	public function status($id,Publication $publication) {
		$ids = Crypt::decrypt($id);
		$publication = $publication->find($ids);
		if($publication) {
			if($publication->is_active == 1) {
				$is_active = 0;
			} else {
				$is_active = 1;
			}
			$publication->is_active = $is_active;
			$publication->updated_at = date("Y-m-d H:i:s");
            $publication->save();			
		}  
		
		return Redirect::intended ( '/publication/administrator/view/'.$id);
	}
	
	public function edit($id,Publication $publication) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('action.edit').' '.Lang::get('publication::app.home banner'));
		$id = Crypt::decrypt($id);
		return Theme::view ('publication::Administrator.form',array(
            'publication' =>  $publication->find($id),
        ));
	}

    public function update(Publication $publication) {
        $id =  Input::has("id") ? Crypt::decrypt(Input::get("id")) : null;
        $title = Input::get("title");
        $storage_location = str_replace(url("/"),"",Input::get('filepath'));
        $description = Input::get('description');

        $field = array (
            'title' => $title,
            'storage_location' => $storage_location,
            'description' => $description,
        );

        $rules = array (
            'title' => 'required',
            'storage_location' => "required",
			'description' => "required",
        );

        $validate = Validator::make($field,$rules);
        if($validate->fails()) {
            $params = array(
                'success' => false,
                'message' => $validate->getMessageBag()->toArray()
            );
        } else {
            if(!empty($id)) {
                //update publication
                $publication = $publication->find($id);
                $publication->title  = $title;
                $publication->storage_location = $storage_location;
				$publication->description = $description;
                $publication->updated_at = date("Y-m-d H:i:s");
                $publication->save();
                $message = Lang::get('publication::message.update successfully');
            } else {
                $publication->title  = $title;
                $publication->storage_location = $storage_location;
				$publication->description = $description;
                $publication->created_at = date("Y-m-d H:i:s");
                $publication->created_by = Auth::user()->id;
                $publication->updated_at = date("Y-m-d H:i:s");
                $publication->updated_by = Auth::user()->id;
                $publication->save();
                $message =  Lang::get('publication::message.insert successfully');
            }
            $params ['success'] =  true;
            $params ['redirect'] = url('/publication/administrator/view/'.Crypt::encrypt($publication->id));
            $params ['message'] =  $message;
        }
		
		return Response::json($params);
    }
	
	public function delete(Publication $publication) {
        $id = Crypt::decrypt(Input::get("id"));
        $is_exists = $publication->select(['id'])->where('id',$id)->first();
        if($is_exists) {
            $publication->where(['id' => $id])->delete();
            $params ['id'] =  $is_exists->id;
            $params ['success'] =  true;
            $params ['message'] =  Lang::get('publication::message.delete successfully');
        }
        return Response::json($params);
    }

}