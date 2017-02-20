<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 28/09/2016
 * Time: 14:28
 */
namespace App\Modules\PopupBanner\Http\Controllers\Administrator;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use App\Modules\PopupBanner\Models\PopupBanner;
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

class PopupBannerController extends Controller {
    public function __construct() {
        Theme::setActive("administrator");
    }

    public function index(PopupBanner $popup_banner) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('popup-banner::app.popup banner'));
		return Theme::view ('popup-banner::Administrator.index',[
            'popup_banners' =>  $popup_banner
                ->where("name", "like", "%".Request::get("name")."%")
                ->where("storage_location", "like", "%".Request::get("location")."%")->sortable()
				->paginate(Setting::get_key('limit_page') ? Setting::get_key('limit_page') : Config::get('site.limit_page')),
        ]);
    }

    public function create() {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('action.create').' '.Lang::get('popup-banner::app.popup banner'));
        return Theme::view ('popup-banner::Administrator.form',array(
            'popup-banner' =>  null,
        ));
    }
	
	public function view($id,PopupBanner $popup_banner) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('action.view').' '.Lang::get('popup-banner::app.popup banner'));
		$id = Crypt::decrypt($id);
		return Theme::view ('popup-banner::Administrator.view',array(
            'popup_banner' =>  $popup_banner->find($id),
        ));
	}
	
	public function status($id,PopupBanner $popup_banner) {
		$ids = Crypt::decrypt($id);
		$popup_banner = $popup_banner->find($ids);
		if($popup_banner) {
			if($popup_banner->is_active == 1) {
				$is_active = 0;
			} else {
				$is_active = 1;
			}
			$popup_banner->is_active = $is_active;
			$popup_banner->updated_at = date("Y-m-d H:i:s");
            $popup_banner->save();			
		}  
		
		return Redirect::intended ( '/popup-banner/administrator/view/'.$id);
	}
	
	public function edit($id,PopupBanner $popup_banner) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('action.edit').' '.Lang::get('popup-banner::app.popup banner'));
		$id = Crypt::decrypt($id);
		return Theme::view ('popup-banner::Administrator.form',array(
            'popup_banner' =>  $popup_banner->find($id),
        ));
	}

    public function update(PopupBanner $popup_banner) {
        $id =  Input::has("id") ? Crypt::decrypt(Input::get("id")) : null;
        $name = Input::get("name");
        $storage_location = str_replace(url("/"),"",Input::get('filepath'));
        $description = Input::get('description');

        $field = array (
            'name' => $name,
            'storage_location' => $storage_location,
            'description' => $description,
        );

        $rules = array (
            'name' => 'required',
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
                //update popup_banner
                $popup_banner = $popup_banner->find($id);
                $popup_banner->name  = $name;
                $popup_banner->storage_location = $storage_location;
				$popup_banner->description = $description;
                $popup_banner->updated_at = date("Y-m-d H:i:s");
                $popup_banner->save();
                $message = Lang::get('popup-banner::message.update successfully');
            } else {
                $popup_banner->name  = $name;
                $popup_banner->storage_location = $storage_location;
				$popup_banner->description = $description;
                $popup_banner->created_at = date("Y-m-d H:i:s");
                $popup_banner->created_by = Auth::user()->id;
                $popup_banner->updated_at = date("Y-m-d H:i:s");
                $popup_banner->updated_by = Auth::user()->id;
                $popup_banner->save();
                $message =  Lang::get('popup-banner::message.insert successfully');
            }
            $params ['success'] =  true;
            $params ['redirect'] = url('/popup-banner/administrator/view/'.Crypt::encrypt($popup_banner->id));
            $params ['message'] =  $message;
        }
		
		return Response::json($params);
    }
	
	public function delete(PopupBanner $popup_banner) {
        $id = Crypt::decrypt(Input::get("id"));
        $is_exists = $popup_banner->select(['id'])->where('id',$id)->first();
        if($is_exists) {
            $popup_banner->where(['id' => $id])->delete();
            $params ['id'] =  $is_exists->id;
            $params ['success'] =  true;
            $params ['message'] =  Lang::get('popup-banner::message.delete successfully');
        }
        return Response::json($params);
    }

}