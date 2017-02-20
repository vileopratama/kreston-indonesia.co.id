<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 28/09/2016
 * Time: 14:28
 */
namespace App\Modules\People\Http\Controllers\Administrator;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use App\Modules\ContactUs\Models\ContactUs;
use App\Modules\People\Models\People;
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

class PeopleController extends Controller {
    public function __construct() {
        Theme::setActive("administrator");
    }

    public function index(People $people) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('people::app.people'));
        return Theme::view ('people::Administrator.index',array(
            'people' =>  $people
				->select(["people.*","contact_us.name as location"])
				->leftJoin("contact_us","contact_us.id","=","people.contact_id")
                ->where("people.name", "like", "%".Request::get("name")."%")
                ->where("photo_storage_location", "like", "%".Request::get("location")."%")
                ->sortable(['order'=>'asc'])->paginate(Setting::get_key('limit_page') ? Setting::get_key('limit_page') : Config::get('site.limit_page')),
        ));
    }

    public function create(ContactUs $contact) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('action.create').' '.Lang::get('people::app.people'));
        return Theme::view ('people::Administrator.form',array(
            'people' =>  null,
			'contact_dropdown' => $contact->dropdown(),
        ));
    }

    public function view($id,People $people) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('action.view').' '.Lang::get('people::app.people'));
        $id = Crypt::decrypt($id);
        return Theme::view ('people::Administrator.view',array(
            'people' =>  $people->leftJoin('contact_us','contact_us.id','people.contact_id')->select(['people.*','contact_us.name as location'])->find($id),
        ));
    }

    public function status($id,People $people) {
        $ids = Crypt::decrypt($id);
        $people = $people->find($ids);
        if($people) {
            if($people->is_active == 1) {
                $is_active = 0;
            } else {
                $is_active = 1;
            }
            $people->is_active = $is_active;
            $people->updated_at = date("Y-m-d H:i:s");
            $people->save();
        }

        return Redirect::intended ( '/people/administrator/view/'.$id);
    }

    public function edit($id,People $people,ContactUs $contact) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('action.edit').' '.Lang::get('people::app.people'));
        $id = Crypt::decrypt($id);
        return Theme::view ('people::Administrator.form',array(
            'people' =>  $people->find($id),
			'contact_dropdown' => $contact->dropdown(),
        ));
    }

    public function update(People $people) {
        $id =  Input::has("id") ? Crypt::decrypt(Input::get("id")) : null;
        $name = Input::get("name");
		$email = Input::get("email");
		$contact_id = Input::get("contact_id");
        $photo_storage_location = str_replace(url("/")."/","",Input::get('filepath'));
        $description = Input::get('description');
		$order = Input::get('order');

        $field = array (
            'name' => $name,
			'email' => $email,
			'contact_id' => $contact_id,
            //'photo_storage_location' => $photo_storage_location,
            'description' => $description,
			'order' => $order,
        );

        $rules = array (
            'name' => 'required',
			'email' => "required|email",
			'contact_id' => 'required',
            //'photo_storage_location' => "required",
            'description' => "required",
			'order' => "required",
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
                $people = $people->find($id);
                $people->name  = $name;
				$people->email  = $email;
				$people->contact_id  = $contact_id;
				$people->slug = Str::slug($name,"-");
                $people->photo_storage_location = $photo_storage_location;
                $people->description = $description;
				$people->order = $order;
                $people->updated_at = date("Y-m-d H:i:s");
                $people->save();
                $message = Lang::get('people::message.update successfully');
            } else {
                $people->name  = $name;
				$people->email  = $email;
				$people->contact_id  = $contact_id;
				$people->slug = Str::slug($name,"-");
                $people->photo_storage_location = $photo_storage_location;
                $people->description = $description;
				$people->order = $order;
                $people->created_at = date("Y-m-d H:i:s");
                $people->created_by = Auth::user()->id;
                $people->updated_at = date("Y-m-d H:i:s");
                $people->updated_by = Auth::user()->id;
                $people->save();
                $message =  Lang::get('people::message.insert successfully');
            }
            $params ['success'] =  true;
            $params ['redirect'] = url('/people/administrator/view/'.Crypt::encrypt($people->id));
            $params ['message'] =  $message;
        }

        return Response::json($params);
    }

    public function delete(People $people) {
        $id = Crypt::decrypt(Input::get("id"));
        $is_exists = $people->select(['id'])->where('id',$id)->first();
        if($is_exists) {
            $people->where(['id' => $id])->delete();
            $params ['id'] =  $is_exists->id;
            $params ['success'] =  true;
            $params ['message'] =  Lang::get('people::message.delete successfully');
        }
        return Response::json($params);
    }

}