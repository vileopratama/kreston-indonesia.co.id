<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 28/09/2016
 * Time: 14:28
 */
namespace App\Modules\Advertising\Http\Controllers\Administrator;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use App\Modules\Advertising\Models\Advertising;
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

class AdvertisingController extends Controller {
    public function __construct() {
        Theme::setActive("administrator");
    }

    public function index(Advertising $advertising) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('advertising::app.home banner'));
        return Theme::view ('advertising::Administrator.index',array(
            'advertisings' =>  $advertising
                ->where("name", "like", "%".Request::get("name")."%")
                ->where("storage_location", "like", "%".Request::get("location")."%")
                ->sortable()->paginate(Setting::get_key('limit_page') ? Setting::get_key('limit_page') : Config::get('site.limit_page')),
        ));
    }

    public function create() {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('action.create').' '.Lang::get('advertising::app.home banner'));
        return Theme::view ('advertising::Administrator.form',array(
            'advertising' =>  null,
        ));
    }
	
	public function view($id,Advertising $advertising) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('action.view').' '.Lang::get('advertising::app.home banner'));
		$id = Crypt::decrypt($id);
		return Theme::view ('advertising::Administrator.view',array(
            'advertising' =>  $advertising->find($id),
        ));
	}
	
	public function status($id,Advertising $advertising) {
		$ids = Crypt::decrypt($id);
		$advertising = $advertising->find($ids);
		if($advertising) {
			if($advertising->is_active == 1) {
				$is_active = 0;
			} else {
				$is_active = 1;
			}
			$advertising->is_active = $is_active;
			$advertising->updated_at = date("Y-m-d H:i:s");
            $advertising->save();			
		}  
		
		return Redirect::intended ( '/advertising/administrator/view/'.$id);
	}
	
	public function edit($id,Advertising $advertising) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('action.edit').' '.Lang::get('advertising::app.home banner'));
		$id = Crypt::decrypt($id);
		return Theme::view ('advertising::Administrator.form',array(
            'advertising' =>  $advertising->find($id),
        ));
	}

    public function update(Advertising $advertising) {
        $id =  Input::has("id") ? Crypt::decrypt(Input::get("id")) : null;
        $name = Input::get("name");
		$link = Input::get("link");
        $storage_location = str_replace(url("/"),"",Input::get('filepath'));
        $description = Input::get('description');

        $field = array (
            'name' => $name,
			'link' => $link,
            'storage_location' => $storage_location,
            'description' => $description,
        );

        $rules = array (
            'name' => 'required',
			'link' => 'required',
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
                //update advertising
                $advertising = $advertising->find($id);
                $advertising->name  = $name;
				$advertising->link  = $link;
                $advertising->storage_location = $storage_location;
				$advertising->description = $description;
                $advertising->updated_at = date("Y-m-d H:i:s");
                $advertising->save();
                $message = Lang::get('advertising::message.update successfully');
            } else {
                $advertising->name  = $name;
				$advertising->link  = $link;
                $advertising->storage_location = $storage_location;
				$advertising->description = $description;
                $advertising->created_at = date("Y-m-d H:i:s");
                $advertising->created_by = Auth::user()->id;
                $advertising->updated_at = date("Y-m-d H:i:s");
                $advertising->updated_by = Auth::user()->id;
                $advertising->save();
                $message =  Lang::get('advertising::message.insert successfully');
            }
            $params ['success'] =  true;
            $params ['redirect'] = url('/advertising/administrator/view/'.Crypt::encrypt($advertising->id));
            $params ['message'] =  $message;
        }
		
		return Response::json($params);
    }
	
	public function delete(Advertising $advertising) {
        $id = Crypt::decrypt(Input::get("id"));
        $is_exists = $advertising->select(['id'])->where('id',$id)->first();
        if($is_exists) {
            $advertising->where(['id' => $id])->delete();
            $params ['id'] =  $is_exists->id;
            $params ['success'] =  true;
            $params ['message'] =  Lang::get('advertising::message.delete successfully');
        }
        return Response::json($params);
    }

}