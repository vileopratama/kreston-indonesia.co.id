<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 28/09/2016
 * Time: 14:28
 */

namespace App\Modules\Navigation\Http\Controllers\Administrator;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use App\Modules\Navigation\Models\Navigation;
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

class NavigationController extends Controller {
    public function __construct() {
        Theme::setActive("administrator");
    }

    public function index(Navigation $navigation) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('navigation::app.navigation'));
        return Theme::view ('navigation::Administrator.index',array(
            'navigations' => $navigation->recursive(),
        ));
    }

    public function create(Navigation $navigation) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('action.create').' '.Lang::get('navigation::app.navigation'));
        return Theme::view ('navigation::Administrator.form',array(
			'navigation_dropdown' => $navigation->dropdown(Lang::get("action.root")),  
			'post_dropdown' => array(''=>'','News' => 'News','Article' => 'Article','People' => 'People','Contact Us' => 'Contact Us'),
            'navigation' =>  null,
        ));
    }

    public function view($id,Navigation $navigation) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('action.view').' '.Lang::get('navigation::app.navigation'));
        $id = Crypt::decrypt($id);
        return Theme::view ('navigation::Administrator.view',array(
            'navigation' =>  $navigation->find($id),
        ));
    }

    public function status($id,Navigation $navigation) {
        $ids = Crypt::decrypt($id);
        $navigation = $navigation->find($ids);
        if($navigation) {
            if($navigation->is_active == 1) {
                $is_active = 0;
            } else {
                $is_active = 1;
            }
            $navigation->is_active = $is_active;
            $navigation->updated_at = date("Y-m-d H:i:s");
			$navigation->updated_by = Auth::user()->id;
            $navigation->save();
        }

        return Redirect::intended ( '/navigation/administrator/view/'.$id);
    }

    public function edit($id,Navigation $navigation) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('action.edit').' '.Lang::get('navigation::app.navigation'));
        $id = Crypt::decrypt($id);
        return Theme::view ('navigation::Administrator.form',array(
			'navigation_dropdown' => $navigation->dropdown(Lang::get("action.root")),  
			'post_dropdown' => array(''=>'','News' => 'News','Article' => 'Article','People' => 'People','Contact Us' => 'Contact Us'),
            'navigation' =>  $navigation->find($id),
        ));
    }

    public function update(Navigation $navigation) {
        $id =  Input::has("id") ? Crypt::decrypt(Input::get("id")) : null;
        $name = Input::get("name");
		$parent_id = Input::get("parent_id");
		$url = Input::get("url");
		$post = Input::get("post");
		$order = Input::get("order");
        
        $field = array (
            'name' => $name,
			'url' => $url,
			'order' => $order,
        );

        $rules = array (
            'name' => 'required',
			'url' => 'required',
			'order' => 'required',
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
                $navigation = $navigation->find($id);
				$navigation->name  = $name;
                $navigation->parent_id = $parent_id;
                $navigation->url = $url;
				$navigation->post = $post;
				$navigation->order = $order;
                $navigation->updated_at = date("Y-m-d H:i:s");
				$navigation->updated_by = Auth::user()->id;
                $navigation->save();
                $message = Lang::get('navigation::message.update successfully');
            } else {
                $navigation->name  = $name;
                $navigation->parent_id = $parent_id;
                $navigation->url = $url;
				$navigation->post = $post;
				$navigation->order = $order;
                $navigation->created_at = date("Y-m-d H:i:s");
                $navigation->created_by = Auth::user()->id;
                $navigation->updated_at = date("Y-m-d H:i:s");
                $navigation->updated_by = Auth::user()->id;
                $navigation->save();
                $message =  Lang::get('navigation::message.insert successfully');
            }
            $params ['success'] =  true;
            $params ['redirect'] = url('/navigation/administrator/view/'.Crypt::encrypt($navigation->id));
            $params ['message'] =  $message;
        }

        return Response::json($params);
    }

    public function delete(Navigation $navigation) {
        $id = Crypt::decrypt(Input::get("id"));
        $is_exists = $navigation->select(['id'])->where('id',$id)->first();
        if($is_exists) {
            $navigation->where(['id' => $id])->delete();
            $params ['id'] =  $is_exists->id;
            $params ['success'] =  true;
            $params ['message'] =  Lang::get('navigation::message.delete successfully');
        }
        return Response::json($params);
    }

}