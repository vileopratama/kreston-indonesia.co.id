<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 04/10/2016
 * Time: 16:53
 */
namespace App\Modules\Search\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Modules\Page\Models\Page;
use Breadcrumbs;
use DB;
use Menu;
use Request;
use SEOMeta;
use Setting;
use Theme;

class SearchController extends Controller {
	public function __construct() {
		// Home > [Search]
		Breadcrumbs::register('page', function($breadcrumbs, $slug) {
			$page = Page::where(['slug' => $slug])->first();
			$breadcrumbs->parent('home');
			$breadcrumbs->push($page->name, url($page->slug));
		});
		
		Menu::make('page_links', function($menu) {
			$xpage = Page::where(['slug' => Request::segment(2),'is_active' => 1])->first();
			if($xpage) {
				$related_page = explode(";",$xpage->related_page);
				$related_nav = explode(";",$xpage->related_navigation);
				$link_related_page = $related_page ? $related_page : null; 
			
				$navs = Page::whereIn('id',$link_related_page)->where(['is_active' => 1])->orderBy('order','asc')->get();
				foreach($navs as $key => $nav) {
					$nav_sub = $menu->add($nav->name, url('/page/'.$nav->slug));
					$parents = Page::where(['is_active' => 1,'parent_id' => $nav->id])->orderBy('order','asc')->get();
					foreach($parents as $pkey => $item) {
						$nav_sub->add($item->name, url('/page/'.$item->slug));
					}
				}
			}	
		});
    }
	
	public function index() {
		SEOMeta::setTitle(Setting::get_key('company_name').' '.Request::get('q'))
		->setDescription(Request::get('q'))
		->setCanonical(url('/'))
		->addKeyword('');
		
		//posts
		$posts = DB::table('posts')
			->selectRaw("title,content,concat(LOWER(type),'/read/',id,'/',slug) as url")
            ->whereRaw("title like '%".Request::get('q')."%'");
			
		
		//contact us
		$contact_us = DB::table('contact_us')
			->selectRaw("name as title,concat(name,' ',address) as content,concat('contact-us/office/',slug) as url")
			->whereRaw("concat(name,' ',address) like '%".Request::get('q')."%'");
			
		
		//people
		$people = DB::table('people')
			->selectRaw("name as title,description as content,concat('/people/',slug) as url")
            ->whereRaw("name like '%".Request::get('q')."%'");	
		
		//$query = $posts->union->$people;
		$query = $posts->union($contact_us)->union($people)->get();
		
		return Theme::view('search::index',array(
            'posts' => Request::get('q') ? $query : null,
        ));
	}
}
