<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
	return redirect("/home");
});

Route::get('/administrator', function () {
	return redirect("/session/login");
});

Route::get('/photo/{filename}/{w?}/{h?}', function($filename,$w=100,$h=100) {
    $cacheimage = Image::cache(function($image) use($filename, $w, $h){
        return $image->make($filename)->resize($w,$h);
    },10); // cache for 10 minutes
    return Response::make($cacheimage, 200, array('Content-Type' => 'image/jpeg'));
});

use App\Modules\Navigation\Models\Navigation;
use App\Modules\Post\Models\Post;
use App\Modules\Category\Models\Category;
use App\Modules\ContactUs\Models\ContactUs;
use App\Modules\People\Models\People;
$NavBar = new Navigation();


Menu::make('MyNavBar', function($menu) use($NavBar)  {
    $navs = $NavBar->where(['is_active' => 1,'parent_id' => 0])->orderBy('order','asc')->get();
    foreach ($navs as $key => $nav) {
        $nav_bar = $menu->add($nav->name, url($nav->url));
		if($nav->post == 'People') {
			$Contact = new ContactUs();
			$nav_items = $Contact->getNavigation();
			foreach($nav_items as $xkey => $nav_item) {
				$sub_menu_contact = $nav_bar->add($nav_item->name, url($nav->url.'/office/'.$nav_item->slug));
				$People = new People();
				$sub_menu_people  = $People->where(['is_active' => 1,'contact_id' => $nav_item->id])->orderBy('name','asc')->get();
				foreach($sub_menu_people as $xkey => $sub_nav) {
					$sub_menu_contact->add($sub_nav->name, url($nav->url.'/'.$sub_nav->slug));
				}
			} 
			
		} else if($nav->post == 'News' || $nav->post == 'Article') {
			$Category = new Category();
			$nav_items = $Category->where('is_active',1)->orderBy('order','asc')->get();
			foreach($nav_items as $xkey => $nav_item) {
				$sub_menu_category = $nav_bar->add($nav_item->name, url($nav->url.'/category/'.$nav_item->slug));
				$Post = new Post();
				$sub_menu_post  = $Post->selectRaw("id,title,CONCAT(LOWER(type),'/read/',id,'/',slug) as url")
				->where(['is_active' => 1,'type' => $nav->post,'category_id' => $nav_item->id])->orderBy('created_at','desc')->get(10);
				foreach($sub_menu_post as $xkey => $sub_nav) {
					$sub_menu_category->add($sub_nav->title, url($sub_nav->url));
				}
			} 
		} else if($nav->post == 'Contact Us') {
			$Contact = new ContactUs();
			$nav_items = $Contact->where('is_active',1)->orderBy('order','asc')->get();
			foreach($nav_items as $xkey => $nav_item) {
				$sub_menu_contact = $nav_bar->add($nav_item->name, url($nav->url.'/office/'.$nav_item->slug));
			} 
			
		} else {
			$nav_items = $NavBar->where(['is_active' => 1,'parent_id' => $nav->id])->orderBy('order','asc')->get();
			foreach ($nav_items as $xkey => $nav_item) {
				$nav = $nav_bar->add($nav_item->name, url($nav_item->url));
				$nav_child_items = $NavBar->where(['is_active' => 1,'parent_id' => $nav_item->id])->orderBy('order','asc')->get();
				foreach($nav_child_items as $xkey => $sub_nav) {
					$nav->add($sub_nav->name,url($sub_nav->url));
				}
			}
		}
		
	}	
});






