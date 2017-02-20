<?php
/**
 * Created by PhpStorm.
 * User: BDO-IT
 * Date: 04/10/2016
 * Time: 16:53
 */
namespace App\Modules\JobVacancy\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Modules\JobVacancy\Models\JobVacancy;
use Breadcrumbs;
use Lang;
use Request;
use SEOMeta;
use Setting;
use Theme;

class JobVacancyController extends Controller {
    public function __construct() {
		// Home > [Career]
		Breadcrumbs::register('job_vacancy', function($breadcrumbs) {
			$breadcrumbs->parent('home');
			$breadcrumbs->push(Lang::get('job-vacancy::app.career'), url('job-vacancy'));
		});
		
		Breadcrumbs::register('job_vacancy_detail', function($breadcrumbs) {
			$breadcrumbs->parent('job_vacancy');
			$jid = Request::segment(3);
			$job = JobVacancy::find($jid);
			$breadcrumbs->push($job->name);
		});
    }

    public function index(JobVacancy $job) {
		SEOMeta::setTitle(Setting::get_key('company_name').' '.Lang::get('job-vacancy::app.career'))
		->setDescription(Setting::get_key('company_name').' '.Lang::get('job-vacancy::app.career'))
		->setCanonical(url('/'))
		->addKeyword(Setting::get_key('company_name').' '.Lang::get('job-vacancy::app.career'));
		
        return Theme::view ('job-vacancy::index',array(
			'index' => 'job_vacancy',
			'page_title' => Lang::get('job-vacancy::app.career'),	
            'jobs' => $job->where('is_active','=',1)
			->where('due_date','>=',date('Y-m-d'))
			->whereRaw("CONCAT(name,' ',position) like '%".Request::get("q")."%'")
			->whereRaw("location like '%".Request::get("location")."%'")
			->paginate(20),
        ));
    }
	
	public function read($id,$slug = null,JobVacancy $job) {
		$xjob = $job->where(['id' => $id])->first();
		SEOMeta::setTitle(Setting::get_key('company_name').' '.$xjob->name)
		->setDescription($xjob->name)
		->setCanonical(url('/'))
		->addKeyword($xjob->name);
		
        return Theme::view ('job-vacancy::read',array(
			'index' => 'job_vacancy_detail',
			'page_title' => $xjob->name,	
            'job' => $xjob,
        ));
    }
}
