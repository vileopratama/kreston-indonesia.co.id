<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 04/10/2016
 * Time: 16:53
 */
namespace App\Modules\Page\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Modules\Navigation\Models\Navigation;
use App\Modules\Page\Models\Page;
use Breadcrumbs;
use Menu;
use Redirect;
use Request;
use SEOMeta;
use Setting;
use Theme;

class PageController extends Controller {
    public function __construct() {
		// Home > [Page]
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

    public function show($slug,Page $page,Navigation $navigation) {
		$xpage = $page->where(['slug' => $slug,'is_active' => 1])->first();
		if(!$xpage)
			return Redirect::intended('/',301);
		
		$related_page = explode(";",$xpage->related_page);
		$related_nav = explode(";",$xpage->related_navigation);
		$link_related_page = $related_page ? $related_page : null; 
		$link_related_navigation = $related_nav ? $related_nav : null; 
		
		SEOMeta::setTitle(Setting::get_key('company_name').' '.$page->name)
		->setDescription($page->meta_description)
		->setCanonical(url('/'))
		->addKeyword($page->meta_keyword);
		
        return Theme::view ('page::index',array(
            'page' => $xpage,
			//'link_related_page' => $page->whereIn('id',$link_related_page)->get(),
			//'link_related_navigation' => $navigation->whereIn('id',$link_related_navigation)->get(),
        ));
    }
}
