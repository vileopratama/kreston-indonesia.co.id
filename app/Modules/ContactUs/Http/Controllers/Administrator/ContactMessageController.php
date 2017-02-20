<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 28/09/2016
 * Time: 14:28
 */
namespace App\Modules\ContactUs\Http\Controllers\Administrator;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use App\Modules\ContactUs\Models\ContactMessage;
use Auth;
use Config;
use Crypt;
use Lang;
use Redirect;
use Request;
use Response;
use Setting;
use SEOMeta;
use Str;
use Theme;
use Validator;

class ContactMessageController extends Controller {
    public function __construct() {
        Theme::setActive("administrator");
    }

    public function index(ContactMessage $contact_message) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('contact-us::app.messages'));
        return Theme::view ('contact-us::Administrator.ContactMessage.index',array(
            'messages' =>  $contact_message
                ->selectRaw("*,DATE_FORMAT(created_at,'%d/%m/%Y %H:%i:%s') as created_at")
				->whereRaw("CONCAT(name,' ',email,' ',subject) like '%".Request::get("query")."%'")
                ->sortable(['created_at' => 'desc'])
				->paginate(Setting::get_key('limit_page') ? Setting::get_key('limit_page') : Config::get('site.limit_page')),
        ));
    }

    public function view($id,ContactMessage $contact_message) {
		SEOMeta::setTitle(Config::get('site.admin_page_title').' '.Lang::get('action.view').' '.Lang::get('contact-us::app.messages'));
        $id = Crypt::decrypt($id);
        return Theme::view ('contact-us::Administrator.ContactMessage.view',array(
            'message' =>  $contact_message->selectRaw("*")->find($id),
        ));
    }

    public function do_delete(ContactMessage $contact_message) {
        $id = Crypt::decrypt(Input::get("id"));
        $is_exists = $contact_message->select(['id'])->where('id',$id)->first();
        if($is_exists) {
            $contact_message->where(['id' => $id])->delete();
            $params ['id'] =  $is_exists->id;
            $params ['success'] =  true;
            $params ['message'] =  Lang::get('contact-us::message.delete successfully');
        } else {
			$params ['id'] = 0;
			$params ['success'] =  false;
			$params ['message'] =  Lang::get('contact-us::message.delete failed');
		}
		//return response
        return Response::json($params);
    }

}