@extends('administrator::layout')
@section('content')
    <!-- Panel Header -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel p-xs">
                <div class="panel-heading clearfix">
                    <div class="col-md-2">
                        <h4 class="panel-title pull-left" style="padding-top: 7.5px;"><i class="fa fa-user-md"></i>  {!! Lang::get('job-vacancy::app.job vacancy') !!}</h4>
                    </div>

                    <div class="col-md-10">
                        <div class="pull-right">
                            <div class="btn-group pull-right">
								<a href="{!! url('job-vacancy/administrator/create') !!}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {!! Lang::get("action.create") !!}</a>
								<a href="{!! url('job-vacancy/administrator/status/'.Crypt::encrypt($job->id)) !!}" class="btn btn-primary btn-sm"><i class="fa fa-flag"></i> {!! isset($job) && $job->is_active == 1 ? Lang::get("action.set inactive"): Lang::get("action.set active")!!}</a>
								<a href="{!! url('job-vacancy/administrator/edit/'.Crypt::encrypt($job->id)) !!}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> {!! Lang::get("action.edit") !!}</a>
								<a href="{!! url('job-vacancy/administrator/index') !!}" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> {!! Lang::get("action.back") !!}</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Panel Header -->
    <div class="row">
        <div class="col-md-12">
            <div class="widget p-lg">
				<div class="row">
					<div class="col-md-6">
						<table class="table">
							<tr>
								<th>{!! Lang::get('job-vacancy::app.name') !!}</th>
								<td>{!!  $job->name !!}</td>
							</tr>
							<tr>
								<th>{!! Lang::get('job-vacancy::app.due date') !!}</th>
								<td>{!! $job->due_date !!}</td>
							</tr>
							<tr>
								<th>{!! Lang::get('job-vacancy::app.location') !!}</th>
								<td>{!! $job->location !!}</td>
							</tr>

						</table>
					</div>

                    <div class="col-md-6">
                        <table class="table">
                            <tr>
                                <th>{!! Lang::get('job-vacancy::app.position') !!}</th>
                                <td>{!! $job->position !!}</td>
                            </tr>
							<tr>
                                <th>{!! Lang::get('job-vacancy::app.description') !!}</th>
                                <td>{!! $job->description !!}</td>
                            </tr>
                        </table>
                    </div>
				</div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <tr>
                                <th class="col-md-2">{!! Lang::get('job-vacancy::app.responsibilities') !!}</th>
                                <td class="col-md-10">{!! $job->responsibilities !!}</td>
                            </tr>
							<tr>
                                <th>{!! Lang::get('job-vacancy::app.requirements') !!}</th>
                                <td>{!! $job->requirements !!}</td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection