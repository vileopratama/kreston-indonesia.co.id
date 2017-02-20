<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 28/09/2016
 * Time: 14:28
 */
namespace App\Modules\HomeBanner\Http\Controllers\Administrator;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use App\Modules\HomeBanner\Models\HomeBanner;
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

class HomeBannerController extends Controller {
    public function __construct() {
        Theme::setActive("administrator");
    }

    public function index(HomeBanner $home_banner) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('home-banner::app.home banner'));
        return Theme::view ('home-banner::Administrator.index',array(
            'home_banners' =>  $home_banner
                ->where("name", "like", "%".Request::get("name")."%")
                ->where("storage_location", "like", "%".Request::get("location")."%")
                ->sortable()->paginate(Setting::get_key('limit_page') ? Setting::get_key('limit_page') : Config::get('site.limit_page')),
        ));
    }

    public function create() {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('action.create').' '.Lang::get('home-banner::app.home banner'));
        return Theme::view ('home-banner::Administrator.form',array(
            'home-banner' =>  null,
        ));
    }
	
	public function view($id,HomeBanner $home_banner) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('action.view').' '.Lang::get('home-banner::app.home banner'));
		$id = Crypt::decrypt($id);
		return Theme::view ('home-banner::Administrator.view',array(
            'home_banner' =>  $home_banner->find($id),
        ));
	}
	
	public function status($id,HomeBanner $home_banner) {
		$ids = Crypt::decrypt($id);
		$home_banner = $home_banner->find($ids);
		if($home_banner) {
			if($home_banner->is_active == 1) {
				$is_active = 0;
			} else {
				$is_active = 1;
			}
			$home_banner->is_active = $is_active;
			$home_banner->updated_at = date("Y-m-d H:i:s");
            $home_banner->save();			
		}  
		
		return Redirect::intended ( '/home-banner/administrator/view/'.$id);
	}
	
	public function edit($id,HomeBanner $home_banner) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('action.edit').' '.Lang::get('home-banner::app.home banner'));
		$id = Crypt::decrypt($id);
		return Theme::view ('home-banner::Administrator.form',array(
            'home_banner' =>  $home_banner->find($id),
        ));
	}

    public function update(HomeBanner $home_banner) {
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
                //update home_banner
                $home_banner = $home_banner->find($id);
                $home_banner->name  = $name;
                $home_banner->storage_location = $storage_location;
				$home_banner->description = $description;
                $home_banner->updated_at = date("Y-m-d H:i:s");
                $home_banner->save();
                $message = Lang::get('home-banner::message.update successfully');
            } else {
                $home_banner->name  = $name;
                $home_banner->storage_location = $storage_location;
				$home_banner->description = $description;
                $home_banner->created_at = date("Y-m-d H:i:s");
                $home_banner->created_by = Auth::user()->id;
                $home_banner->updated_at = date("Y-m-d H:i:s");
                $home_banner->updated_by = Auth::user()->id;
                $home_banner->save();
                $message =  Lang::get('home-banner::message.insert successfully');
            }
            $params ['success'] =  true;
            $params ['redirect'] = url('/home-banner/administrator/view/'.Crypt::encrypt($home_banner->id));
            $params ['message'] =  $message;
        }
		
		return Response::json($params);
    }
	
	public function delete(HomeBanner $home_banner) {
        $id = Crypt::decrypt(Input::get("id"));
        $is_exists = $home_banner->select(['id'])->where('id',$id)->first();
        if($is_exists) {
            $home_banner->where(['id' => $id])->delete();
            $params ['id'] =  $is_exists->id;
            $params ['success'] =  true;
            $params ['message'] =  Lang::get('home-banner::message.delete successfully');
        }
        return Response::json($params);
    }

}