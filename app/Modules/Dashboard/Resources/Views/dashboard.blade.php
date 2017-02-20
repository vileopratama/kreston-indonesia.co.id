@extends('administrator::layout')
@section('content')
	<div class="row">
        <div class="col-md-6 col-xs-12">
            <div class="panel panel-primary">
				<div class="panel-heading"><i class="fa fa-history"></i> {!! Lang::get('action.latest posting') !!}</div>
				<div class="panel-body">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#news">{!! Lang::get('action.news') !!}</a></li>
						<li><a data-toggle="tab" href="#article">{!! Lang::get('action.article') !!}</a></li>
						<li><a data-toggle="tab" href="#job">{!! Lang::get('action.jobs career') !!}</a></li>
					</ul>
					
					<div class="tab-content">
						<div id="news" class="tab-pane fade in active">
							<table class="table ">
								<thead>
									<tr>
										<th class="col-md-12">{!! Lang::get('action.title') !!}</th>
										
									</tr>
								</thead>
								<tbody>
									@if($news)
										@foreach($news as $key => $row)
											<tr>
												<td><a href="{!! url('administrator/news/view/'.Crypt::encrypt($row->id)) !!}">{!! $row->title !!}<a/></td>
												
											</tr>
										@endforeach
									@endif
										
								</tbody>
								<tfoot>
									<tr>
										<th class="text-center"><a class="btn btn-primary" href="{!! url('/administrator/news') !!}">{!! Lang::get('action.read more') !!}</a></th>
										
									</tr>
								</tfoot>
							</table>
						</div>
						
						<div id="article" class="tab-pane">
							<table class="table ">
								<thead>
									<tr>
										<th class="col-md-12">{!! Lang::get('action.title') !!}</th>
										
									</tr>
								</thead>
								<tbody>
									@if($articles)
										@foreach($articles as $key => $row)
											<tr>
												<td><a href="{!! url('administrator/news/view/'.Crypt::encrypt($row->id)) !!}">{!! $row->title !!}<a/></td>
												
											</tr>
										@endforeach
									@endif
										
								</tbody>
								<tfoot>
									<tr>
										<th class="text-center"><a class="btn btn-primary" href="{!! url('/administrator/article') !!}">{!! Lang::get('action.read more') !!}</a></th>
										
									</tr>
								</tfoot>
							</table>
						</div>
						
						<div id="job" class="tab-pane">
							<table class="table ">
								<thead>
									<tr>
										<th class="col-md-3">{!! Lang::get('action.due date') !!}</th>
										<th class="col-md-9">{!! Lang::get('action.position') !!}</th>
									</tr>
								</thead>
								<tbody>
									@if($job_vacancies)
										@foreach($job_vacancies as $key => $row)
											<tr>
												<td><a href="{!! url('administrator/job-vacancy/view/'.Crypt::encrypt($row->id)) !!}">{!! $row->due_date !!}<a/></td>
												<td><a href="{!! url('administrator/job-vacancy/view/'.Crypt::encrypt($row->id)) !!}">{!! $row->position !!}<a/></td>
											</tr>
										@endforeach
									@endif
										
								</tbody>
								<tfoot>
									<tr>
										<th class="text-center"><a class="btn btn-primary" href="{!! url('/administrator/job-vacancy') !!}">{!! Lang::get('action.read more') !!}</a></th>
										
									</tr>
								</tfoot>
							</table>
						</div>
						
					</div>
				</div>
			</div>
        </div>
		
		<div class="col-md-6 col-xs-12">
			<div class="panel panel-primary">
				<div class="panel-heading"><i class="fa fa-list"></i> {!! Lang::get('action.summary') !!}</div>
				<div class="panel-body">
					<div class="widget">
						<div class="widget-body row">
							<div class="col-xs-4">
								<div class="text-center p-h-md" style="border-right: 2px solid #eee">
									<h2 class="fz-xl fw-400 m-0" data-plugin="counterUp">{!! $count_news !!}</h2>
									<small>{!! Lang::get('action.news') !!}</small>
								</div>	
							</div>
							<div class="col-xs-4">
								<div class="text-center p-h-md" style="border-right: 2px solid #eee">
									<h2 class="fz-xl fw-400 m-0" data-plugin="counterUp">{!! $count_article !!}</h2>
									<small>{!! Lang::get('action.article') !!}</small>
								</div>	
							</div>
							<div class="col-xs-4">
								<div class="text-center p-h-md" style="border-right: 2px solid #eee">
									<h2 class="fz-xl fw-400 m-0" data-plugin="counterUp">{!! $count_job_vacancy !!}</h2>
									<small>{!! Lang::get('action.jobs career') !!}</small>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>	
    </div>
@endsection
