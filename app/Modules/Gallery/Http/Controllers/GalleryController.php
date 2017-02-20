<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 04/10/2016
 * Time: 16:53
 */
namespace App\Modules\Gallery\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Modules\Gallery\Models\GalleryEvent;
use App\Modules\Gallery\Models\GalleryPhoto;
use Breadcrumbs;
use Lang;
use Request;
use SEOMeta;
use Setting;
use Theme;

class GalleryController extends Controller {
    public function __construct() {
		// Home > [Page]
		Breadcrumbs::register('gallery', function($breadcrumbs) {
			$breadcrumbs->parent('home');
			$breadcrumbs->push(Lang::get('gallery::app.gallery'), url('gallery/collection'));
		});
		
		Breadcrumbs::register('gallery_event', function($breadcrumbs) {
			$breadcrumbs->parent('gallery');
			$gid = Request::segment(3);
			$event = GalleryEvent::find($gid);
			$breadcrumbs->push($event->name, url('gallery/collection'));
		});
    }

    public function index(GalleryPhoto $photo,GalleryEvent $event) {
		SEOMeta::setTitle(Setting::get_key('company_name').' '.Lang::get('gallery::app.gallery'))
		->setDescription(Setting::get_key('company_name').' '.Lang::get('gallery::app.gallery'))
		->setCanonical(url('/'))
		->addKeyword(Setting::get_key('company_name').' '.Lang::get('gallery::app.gallery'));
		
        return Theme::view ('gallery::index',array(
			'index' => 'gallery',
			'page_title' => Lang::get('gallery::app.gallery'),	
            'photos' => $photo->paginate(20),
			'link_events' => $event->get(),
        ));
    }
	
	public function event($id,$slug = null,GalleryPhoto $photo,GalleryEvent $event) {
		$xevent = $event->where(['id' => $id])->first();
		
		SEOMeta::setTitle(Setting::get_key('company_name').' '.$xevent->name)
		->setDescription($xevent->name)
		->setCanonical(url('/'))
		->addKeyword($xevent->name);
		
        return Theme::view ('gallery::index',array(
			'index' => 'gallery_event',
			'page_title' => $xevent->name,	
            'photos' => $photo->where('gallery_event_id',$id)->paginate(20),
			'link_events' => $event->get(),
        ));
    }
}
