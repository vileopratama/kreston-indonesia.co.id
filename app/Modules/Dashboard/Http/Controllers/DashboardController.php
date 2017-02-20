<?php
namespace App\Modules\Dashboard\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Modules\JobVacancy\Models\JobVacancy;
use App\Modules\Post\Models\Post;
use Auth;
use Lang;
use Setting;
use Theme;

class DashboardController extends Controller {
	public function __construct() {
        Theme::setActive("administrator");
    }
	
	public function index(Post $post,JobVacancy $job) {
        return Theme::view('dashboard::dashboard',array(
			'news' => $post->where('type','News')->orderBy('created_at','desc')->limit(Setting::get_key('limit_page') ? Setting::get_key('limit_page') : Config::get('site.limit_page'))->get(),
			'articles' => $post->where('type','Article')->orderBy('created_at','desc')->limit(Setting::get_key('limit_page') ? Setting::get_key('limit_page') : Config::get('site.limit_page'))->get(),
			'job_vacancies' => $job->selectRaw("*,DATE_FORMAT(due_date,'%d/%m/%Y') as due_date")->orderBy('due_date','desc')->limit(Setting::get_key('limit_page') ? Setting::get_key('limit_page') : Config::get('site.limit_page'))->get(),
			'count_news' => $post->where('type','News')->count(),
			'count_article' => $post->where('type','Article')->count(),
			'count_job_vacancy' => $job->count(),
        ));
    }
}