<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 28/09/2016
 * Time: 14:28
 */
namespace App\Modules\Home\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;

use App\Modules\Advertising\Models\Advertising;
use App\Modules\HomeBanner\Models\HomeBanner;
use App\Modules\PopupBanner\Models\PopupBanner;
use App\Modules\Publication\Models\Publication;
use App\Modules\Page\Models\Page;
use App\Modules\Post\Models\Post;
use Auth;
use Crypt;
use Lang;
use Redirect;
use Request;
use Response;
use SEO;
use SEOMeta;
use Setting;
use Theme;
use Validator;

class HomeController extends Controller {
    public function index(HomeBanner $home_banners,PopupBanner $popup_banners,Post $post,Advertising $ads,Publication $publication) {
		SEOMeta::setTitle(Setting::get_key('company_name'))
		->setDescription(Setting::get_key('meta_content'))
		->setCanonical(url('/'))
		->addKeyword(Setting::get_key('meta_keyword'));
		
        return Theme::view ('home::index',array(
			'home_banners' => $home_banners->where(['is_active' => 1])->get(),
			'popup_banners' => $popup_banners->where(['is_active' => 1])->get(),
			'advertisings' => $ads->where(['is_active' => 1])->get(),
			'latest_news' => $post->where(['is_active' => 1,'type' => 'News'])->orderBy('created_at','desc')->limit(10)->get(),
			'latest_article' => $post->where(['is_active' => 1,'type' => 'Article'])->orderBy('created_at','desc')->limit(10)->get(),
			'latest_publications' => $publication->where(['is_active' => 1])->orderBy('created_at','desc')->limit(10)->get(),
			'welcome' => Page::where('id',4)->first(),
        ));
    }
	
	public function popup_banner(PopupBanner $popup_banners) {
		$popup_banners = $popup_banners->where(['is_active' => 1])->first();
		
		if($popup_banners) {
			$params ['is_popup_banner'] =  true;
		} else {
			$params ['is_popup_banner'] =  false;
		}
		
		//response 
		return Response::json($params);
	}

}