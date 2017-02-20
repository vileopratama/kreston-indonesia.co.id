<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 27/09/2016
 * Time: 14:13
 */
namespace App\Modules\User\Http\Controllers\Administrator;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use App\Modules\User\Models\User;
use Config;
use Crypt;
use Lang;
use Request;
use Response;
use SEOMeta;
use Setting;
use Theme;
use Validator;

class UserController extends Controller {
    public function __construct() {
        Theme::setActive("administrator");
    }

    public function index(User $user) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('user::app.user'));
        return Theme::view ('user::Administrator.index',array(
            'users' =>  $user
                ->where("first_name", "like", "%".Request::get("first_name")."%")
                ->where("email", "like", "%".Request::get("email")."%")
                ->sortable()->paginate(Setting::get_key('limit_page') ? Setting::get_key('limit_page') : Config::get('site.limit_page')),
        ));
    }
	
	public function view($id , User $user) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('action.view').' '.Lang::get('user::app.user'));
		$id = Crypt::decrypt($id);
		return Theme::view ('user::Administrator.view',array(
            'user' =>  $user->find($id),
        ));
	}
	
	public function create() {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('action.create').' '.Lang::get('user::app.user'));
		return Theme::view ('user::Administrator.form',array(
            'user' =>  null,
        ));
	}
	
	public function edit($id,User $user) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('action.edit').' '.Lang::get('user::app.user'));
		$id = Crypt::decrypt($id);
		return Theme::view ('user::Administrator.form',array(
            'user' =>  $user->find($id),
        ));
	}
	
	public function update(User $user) {
		$user_id =  Input::has("id") ? Crypt::decrypt(Input::get("id")) : null;
		$first_name = Input::get('first_name');
		$last_name = Input::get('last_name');
		$email = Input::get('email');
		$password = Input::get('password');

        $field = array (
            'first_name' => $first_name,
            'email' => $email,
            'password' => $password,
        );

        $rules = array (
            'first_name' => 'required',
            'email' => (!$user_id ? "required|email|unique:users,email" : "required|email|unique:users,email,$user_id"),
            'password' => (!$user_id ? "required" : ""),
        );

        $validate = Validator::make($field,$rules);

        if($validate->fails()) {
            $params = array(
                'success' => false,
                'message' => $validate->getMessageBag()->toArray()
            );
		} else {
			if(!empty($user_id)) {
				//update user
				$user = $user->find($user_id);
				$user->first_name  = $first_name;
				$user->last_name = $last_name;
				$user->email = $email;
				$user->updated_at = date("Y-m-d H:i:s");
				$user->save();
				$message = Lang::get('user::message.update successfully');
			} else {
				$user->first_name  = $first_name;
				$user->last_name = $last_name;
				$user->email = $email;
				$user->password = bcrypt($password);
                $user->remember_token = "";
				$user->created_at = date("Y-m-d H:i:s");
				$user->created_by = 1;
				$user->updated_at = date("Y-m-d H:i:s");
				$user->updated_by = 1;
				$user->save();
				$message =  Lang::get('user::message.insert successfully');
			}
			$params ['success'] =  true;
			$params ['redirect'] = url('/user/administrator/view/'.Crypt::encrypt($user->id));
			$params ['message'] =  $message;			
		}

        return Response::json($params);
	}
	
	public function reset_password($id,User $user) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('action.reset password').' '.Lang::get('user::app.user'));
		$id = Crypt::decrypt($id);
		return Theme::view ('user::Administrator.reset-password',array(
            'user' =>  $user->find($id),
        ));
	}

	public function update_password(User $user) {
        $user_id =  Input::has("id") ? Crypt::decrypt(Input::get("id")) : null;
        $password = Input::get('password');
        $repeat_password = Input::get('repeat_password');

        $field = array (
            'password' => $password,
            'repeat_password' => $repeat_password,
        );

        $rules = array (
            'password' => "required",
            'repeat_password' => "required|same:password",
        );

        $validate = Validator::make($field,$rules);
        if($validate->fails()) {
            $params = array(
                'success' => false,
                'message' => $validate->getMessageBag()->toArray()
            );
        } else {
            $user = $user->find($user_id);
            $user->password = bcrypt($password);
            $user->updated_at = date("Y-m-d H:i:s");
            $user->updated_by = 1;
            $user->save();

            $params ['success'] =  true;
            $params ['redirect'] = url('/user/administrator/view/'.Crypt::encrypt($user->id));
            $params ['message'] =  Lang::get('user::message.change password successfully');
        }

        return Response::json($params);
    }

    public function delete(User $user) {
        $id = Crypt::decrypt(Input::get("id"));
        $is_exists = $user->select(['id'])->where('id',$id)->first();
        if($is_exists) {
            $user->where(['id' => $id])->delete();
            $params ['id'] =  $is_exists->id;
            $params ['success'] =  true;
            $params ['message'] =  Lang::get('user::message.delete successfully');
        }
        return Response::json($params);
    }

}