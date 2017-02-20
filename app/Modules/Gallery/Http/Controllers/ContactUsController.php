<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 04/10/2016
 * Time: 16:53
 */
namespace App\Modules\ContactUs\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Modules\ContactUs\Models\ContactUs;
use Breadcrumbs;
use Lang;
use Request;
use SEOMeta;
use Setting;
use Theme;

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
	
	
	
	
}
