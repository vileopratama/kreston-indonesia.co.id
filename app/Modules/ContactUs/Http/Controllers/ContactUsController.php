<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 04/10/2016
 * Time: 16:53
 */
namespace App\Modules\ContactUs\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use App\Modules\ContactUs\Models\ContactUs;
use App\Modules\ContactUs\Models\ContactMessage;
use Breadcrumbs;
use Lang;
use Mail;
use Request;
use Response;
use SEOMeta;
use Setting;
use Theme;
use Validator;

class ContactUsController extends Controller {
    public function __construct() {
		// Home > [Career]
		Breadcrumbs::register('contact-us', function($breadcrumbs) {
			$breadcrumbs->parent('home');
			$breadcrumbs->push(Lang::get('contact-us::app.contact us'),url('/contact-us'));
		});
		
		Breadcrumbs::register('contact-us-office', function($breadcrumbs,$slug) {
			$breadcrumbs->parent('contact-us');
			$page = ContactUs::where(['slug' => $slug])->first();
			$breadcrumbs->push($page->name,url('/contact-us/office/'.$slug));
		});
    }

    public function index(ContactUs $contact) {
		SEOMeta::setTitle(Setting::get_key('company_name').' '.Lang::get('contact-us::app.contact us'))
		->setDescription(Setting::get_key('company_name').' '.Lang::get('contact-us::app.contact us'))
		->setCanonical(url('/'))
		->addKeyword(Setting::get_key('company_name').' '.Lang::get('contact-us::app.contact us'));
		
        return Theme::view ('contact-us::index',array(
			'index' => 'contact-us',
			'page_title' => Lang::get('contact-us::app.contact us'),	
            'contacts' => $contact->where('is_active','=',1)->orderBy('order','asc')->get()
        ));
    }
	
	public function office($slug,ContactUs $contact_us) {
		$xcontact = $contact_us->where('is_active',1)->where('slug',$slug)->first(); 
		SEOMeta::setTitle(Setting::get_key('company_name').' '.Lang::get('contact-us::app.contact us').' '.$xcontact->name)
		->setDescription(Setting::get_key('company_name').' '.Lang::get('contact-us::app.contact us').' '.$xcontact->name)
		->setCanonical(url('/'))
		->addKeyword(Setting::get_key('company_name').' '.Lang::get('contact-us::app.contact us').' '.$xcontact->name);
		return Theme::view ('contact-us::single',array(
			'index' => 'contact-us-office',
			'page_title' => Lang::get('contact-us::app.contact us').' '.$xcontact->name,
			'contact' => $xcontact,			
            'contacts' => $contact_us->where('is_active','=',1)->orderBy('order','asc')->get()
        ));
	}
	
	public function do_sent_message() {
	    $contact_id  = Input::get("contact_id");
        $name = Input::get("name");
		$mobile_number = Input::get("mobile_number");
        $email = Input::get("email");
        $subject = Input::get("subject");
        $message = Input::get("message");
        $g_recaptcha_response = Input::get('g-recaptcha-response');
        
        $field = array (
            'contact_id' => $contact_id,
            'name' => $name,
            'email' => $email,
			'mobile_number' => $mobile_number,
			'subject' => $subject,
			'message' => $message,
            'g-recaptcha-response' => $g_recaptcha_response,
			
        );

        $rules = array (
            'contact_id' => 'required',
            'name' => 'required',
			'email' => 'required|email',
			'mobile_number' => 'required',
            'subject' => 'required',
            'message' => 'required|min:1',
            'g-recaptcha-response' => 'required|captcha',
        );

        $validate = Validator::make($field,$rules);
        if($validate->fails()) {
            $params = array(
                'success' => false,
                'message' => $validate->getMessageBag()->toArray()
            );
        } else {
                $contact = ContactUs::where(['id' => $contact_id])->first();
                $field['bcc'] = 'wedy.nababan@gmail.com';
                if($contact) {
                    $field['email'] = $contact->email;
                } else {
                    $field['email'] = $field['bcc'];
                }

				//sent email 
				Mail::send('contact-us::Emails.contact-us-message',array('field' => $field),function($message) use($field) {
					$message->from('noreply@kreston-indonesia.co.id', 'No Reply Kreston indonesia');
					$message->to($field['email']);
					$message->bcc($field['bcc']);
					$message->subject($field['subject']);
				});
				//sent email
				
                $contact_message = new ContactMessage();
                $contact_message->name  = $name;
				$contact_message->email = $email;
				$contact_message->mobile_number  = $mobile_number;
				$contact_message->subject = $subject;
				$contact_message->message = $message;
				$contact_message->ip_address = Request::ip();
                $contact_message->created_at = date("Y-m-d H:i:s");
                $contact_message->save();
                $message = Lang::get('contact-us::message.sent message been successfully');
           
            $params ['success'] =  true;
            //$params ['redirect'] = url('/contact-us/');
            $params ['message'] =  $message;
        }

        return Response::json($params);
    }
	
	
}
