<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 04/10/2016
 * Time: 16:53
 */
namespace App\Modules\Article\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use App;
use App\Modules\Category\Models\Category;
use App\Modules\Post\Models\Post;
use Breadcrumbs;
use Config;
use DB;
use Lang;
use SEOMeta;
use Setting;
use Theme;

class ArticleController extends Controller {
    public function __construct() {
		// Home > [People]
		Breadcrumbs::register('article', function($breadcrumbs) {
			$breadcrumbs->parent('home');
			$breadcrumbs->push(Lang::get('article::app.article'), url('article/'));
		});

    }
	
	public function index(Post $post,Category $category) {
		SEOMeta::setTitle(Setting::get_key('company_name').' '.Lang::get('article::app.article'))
		->setDescription('Kreston Article')
		->setCanonical(url('/'))
		->addKeyword('kreston','kreston article','article');
		
		return Theme::view ('article::index',array(
			'posts' =>  $post
                ->where('is_active',1)->where('type','Article')
				->orderBy('created_at','desc')
                ->sortable()->paginate(Setting::get_key('limit_page') ? Setting::get_key('limit_page') : Config::get('site.limit_page')),
			'post_archieves' => $post->selectRaw("CONCAT(YEAR(created_at),'/',MONTH(created_at)) as url,CONCAT(MONTHNAME(created_at),' ',YEAR(created_at)) as periode")
			->where('is_active',1)
			->groupBy(DB::raw("YEAR(created_at),MONTH(created_at)"))
			->orderBy("created_at",SORT_DESC)->get(),
			'categories' => $category->where('is_active',1)->orderBy('order','asc')->get(),		
        ));
	}
	
	public function category($slug,Category $category,Post $post) {
		$xcategory = $category->where('slug',$slug)->first();
		SEOMeta::setTitle(Setting::get_key('company_name').' '.Lang::get('news::app.news').' '.$xcategory->name)
		->setDescription('Kreston News')
		->setCanonical(url('/'))
		->addKeyword('kreston','kreston news','news');
		
		return Theme::view ('article::index',array(
			'posts' =>  $post
				->leftJoin('categories','categories.id','=','posts.category_id')
				->select(['posts.*'])
                ->where('posts.is_active',1)->where('type','Article')->where('categories.slug',$slug)
                ->sortable(['created_at' =>'desc'])->paginate(Setting::get_key('limit_page') ? Setting::get_key('limit_page') : Config::get('site.limit_page')),
			'post_archieves' => $post
			->selectRaw("CONCAT(YEAR(created_at),'/',MONTH(created_at)) as url,CONCAT(MONTHNAME(created_at),' ',YEAR(created_at)) as periode")
			->where('is_active',1)
			->groupBy(DB::raw("YEAR(created_at),MONTH(created_at)"))
			->orderBy("created_at",SORT_DESC)->get(),	
			'categories' => $category->where('is_active',1)->orderBy('order','asc')->get(),
			//'latest_posts' => $post->where('is_active',1)->orderBy('created_at','desc')->get(10),

        ));
	}

    public function read($id,Post $post,Category $category) {
		Breadcrumbs::register('article_read', function($breadcrumbs) use ($id) {
			$post = Post::where(['id' => $id])->first();
			$breadcrumbs->parent('home');
			$breadcrumbs->push($post->title,url('/'));
		});
		
		//increment views 
		$increment = $post->where(['id' => $id])->increment('total_view');
		$xpost = $post->where(['id' => $id])->first();
		SEOMeta::setTitle(Setting::get_key('company_name').' '.$xpost->title)
		->setDescription(str_limit($xpost->description,100))
		->setCanonical(url('/'))
		->addKeyword($xpost->meta_keyword);
		
        return Theme::view ('article::read',array(
            'post' => $xpost,
			'post_archieves' => $post->selectRaw("CONCAT(YEAR(created_at),'/',MONTH(created_at)) as url,CONCAT(MONTHNAME(created_at),' ',YEAR(created_at)) as periode")
			->where('is_active',1)
			->groupBy(DB::raw("YEAR(created_at),MONTH(created_at)"))
			->orderBy("created_at",SORT_DESC)->get(),
			'categories' => $category->where('is_active',1)->orderBy('order','asc')->get(),		
        ));
    }
	
	
	
	public function archieve($year,$month,Post $post) {
		SEOMeta::setTitle(Setting::get_key('company_name').' '.Lang::get('article::app.article'))
		->setDescription('Kreston Article')
		->setCanonical(url('/'))
		->addKeyword('kreston','kreston article','article');
		
		return Theme::view ('article::index',array(
			'posts' =>  $post
                ->where('is_active',1)
				->whereRaw("MONTH(created_at) = $month AND YEAR(created_at) = $year ")
				->orderBy('created_at','desc')
                ->sortable()->paginate(Setting::get_key('limit_page') ? Setting::get_key('limit_page') : Config::get('site.limit_page')),
			'post_archieves' => $post->selectRaw("CONCAT(YEAR(created_at),'/',MONTH(created_at)) as url,CONCAT(MONTHNAME(created_at),' ',YEAR(created_at)) as periode")
			->where('is_active',1)
			->groupBy(DB::raw("YEAR(created_at),MONTH(created_at)"))
			->orderBy("created_at",SORT_DESC)->get(),
			'categories' => $category->where('is_active',1)->orderBy('order','asc')->get(),			
        ));	
	}
	
	public function feed() {
		$feed = App::make("feed");
		$feed->setCache(60, 'abcdefghijklmnopqrstu');
		// check if there is cached feed and build new only if is not
		if (!$feed->isCached()) {
			//creating rss feed with our most recent 20 posts
			$posts = \DB::table('posts')->where('is_active',1)->where('type','Article')->orderBy('created_at', 'desc')->take(10)->get();
			foreach ($posts as $post){
				// set item's title, author, url, pubdate, description, content, enclosure (optional)*
				$feed->add($post->title, $post->created_by, url($post->slug), $post->created_at,"", $post->content);
			}
		}
		return $feed->render('atom');
	}
}
