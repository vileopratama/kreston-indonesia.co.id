<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 04/10/2016
 * Time: 16:53
 */
namespace App\Modules\People\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use App\Modules\ContactUs\Models\ContactUs;
use App\Modules\People\Models\People;
use Breadcrumbs;
use Lang;
use Menu;
use SEOMeta;
use Session;
use Setting;
use Theme;

class PeopleController extends Controller {
    public function __construct() {
		// Home > [People]
		Breadcrumbs::register('people-index', function($breadcrumbs) {
			$breadcrumbs->parent('home');
			$breadcrumbs->push(Lang::get('people::app.people'), url('/people'));
		});
		
		Breadcrumbs::register('people-office', function($breadcrumbs, $slug) {
			$contact = ContactUs::where(['slug' => $slug])->first();
			$breadcrumbs->parent('home');
			$breadcrumbs->push($contact->name, url('people/office/'.$contact->slug));
		});
		
		Breadcrumbs::register('people-single', function($breadcrumbs, $slug) {
			$people = People::where(['slug' => $slug])->first();
			$breadcrumbs->parent('home');
			$breadcrumbs->push($people->name, url('people/'.$people->slug));
		});
		
		Menu::make('our_partner_links', function($menu) {
			$Contact = new ContactUs();
			$groups  = $Contact->getNavigation();
			foreach($groups as $xkey => $nav_item) {
				$sub_menu_contact = $menu->add($nav_item->name, url('/people/office/'.$nav_item->slug));
				$People = new People();
				$sub_menu_people  = $People->where(['is_active' => 1,'contact_id' => $nav_item->id])->orderBy('name','asc')->get();
				foreach($sub_menu_people as $xkey => $sub_nav) {
					$sub_menu_contact->add($sub_nav->name, url('/people/'.$sub_nav->slug));
				}
			} 
		});
    }
	
	public function index(People $people) {
		SEOMeta::setTitle(Setting::get_key('company_name').' '.Lang::get('people::app.people'))
		->setDescription(Setting::get_key('company_name').' '.Lang::get('people::app.people'))
		->setCanonical(url('/'))
		->addKeyword(Setting::get_key('company_name').' '.Lang::get('people::app.people'));
		
		return Theme::view ('people::index',array(
            'peoples' => $people->leftJoin('contact_us','contact_us.id','=','people.contact_id')->select(['people.*'])->where('people.is_active',1)->orderBy('order','asc')->get(),
			'our_peoples' => $people->where('is_active',1)->orderBy('order','asc')->get(),
        ));
		
	}
	
	public function group($slug,ContactUs $contact,People $people) {
		SEOMeta::setTitle(Setting::get_key('company_name').' '.Lang::get('people::app.people'))
		->setDescription(Setting::get_key('company_name').' '.Lang::get('people::app.people'))
		->setCanonical(url('/'))
		->addKeyword(Setting::get_key('company_name').' '.Lang::get('people::app.people'));
		
		return Theme::view ('people::group',array(
			'slug' => $slug,
            'peoples' => $people->leftJoin('contact_us','contact_us.id','=','people.contact_id')->select(['people.*'])->where('people.is_active',1)->where('contact_us.slug',$slug)->orderBy('people.order','asc')->get(),
			'our_contacts' => $contact->getNavigation(),
        ));
		
	}

    public function show($slug,People $people,ContactUs $contact) {
		$xpeople = $people->where(['slug' => $slug])->first();
		SEOMeta::setTitle(Setting::get_key('company_name').' '.$people->name)
		->setDescription($people->description)
		->setCanonical(url('/'))
		->addKeyword($people->name);
		
		//get slug
		$contact = $contact->where('id',$xpeople->contact_id)->first();
		if($contact) {
			Session::put('people_office_url', url('/people/office/'.$contact->slug));
		}
		
        return Theme::view ('people::single',array(
            'people' => $xpeople,
			'our_peoples' => $people->where('is_active',1)->orderBy('order','asc')->get(),
        ));
    }
}
