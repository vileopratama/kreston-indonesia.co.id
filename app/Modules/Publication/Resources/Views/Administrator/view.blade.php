@extends('administrator::layout')
@section('content')
    <!-- Panel Header -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel p-xs">
                <div class="panel-heading clearfix">
                    <div class="col-md-2">
                        <h4 class="panel-title pull-left" style="padding-top: 7.5px;"><i class="fa fa-user"></i>  {!! Lang::get('publication::app.publication') !!}</h4>
                    </div>

                    <div class="col-md-10">
                        <div class="pull-right">
                            <div class="btn-group pull-right">
								<a href="{!! url('publication/administrator/create') !!}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {!! Lang::get("action.create") !!}</a>
								<a href="{!! url('publication/administrator/status/'.Crypt::encrypt($publication->id)) !!}" class="btn btn-primary btn-sm"><i class="fa fa-flag"></i> {!! isset($publication) && $publication->is_active == 1 ? Lang::get("action.set inactive"): Lang::get("action.set active")!!}</a>
								<a href="{!! url('publication/administrator/edit/'.Crypt::encrypt($publication->id)) !!}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> {!! Lang::get("action.edit") !!}</a>
								<a href="{!! url('publication/administrator') !!}" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> {!! Lang::get("action.back") !!}</a>
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
					<div class="col-md-12">
						<table class="table">
							<tr>
								<th>{!! Lang::get('publication::app.title') !!}</th>
								<td>{!! $publication->title !!}</td>
							</tr>
							<tr>
								<th>{!! Lang::get('publication::app.file') !!}</th>
								<td>{!! url($publication->storage_location) !!}</td>
							</tr>
							<tr>
								<th>{!! Lang::get('publication::app.description') !!}</th>
								<td>{!! $publication->description !!}</td>
							</tr>
						</table>
					</div>
					
				</div>
            </div>
        </div>
    </div>
@endsection