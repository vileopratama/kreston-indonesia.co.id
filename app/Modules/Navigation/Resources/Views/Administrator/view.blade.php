@extends('administrator::layout')
@section('content')
    <!-- Panel Header -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel p-xs">
                <div class="panel-heading clearfix">
                    <div class="col-md-2">
                        <h4 class="panel-title pull-left" style="padding-top: 7.5px;"><i class="fa fa-pagepaper-o"></i>  {!! Lang::get('navigation::app.navigation') !!}</h4>
                    </div>

                    <div class="col-md-10">
                        <div class="pull-right">
                            <div class="btn-group pull-right">
								<a href="{!! url('navigation/administrator/create') !!}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {!! Lang::get("action.create") !!}</a>
								<a href="{!! url('navigation/administrator/status/'.Crypt::encrypt($navigation->id)) !!}" class="btn btn-primary btn-sm"><i class="fa fa-flag"></i> {!! isset($navigation) && $navigation->is_active == 1 ? Lang::get("action.set inactive"): Lang::get("action.set active")!!}</a>
								<a href="{!! url('navigation/administrator/edit/'.Crypt::encrypt($navigation->id)) !!}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> {!! Lang::get("action.edit") !!}</a>
								<a href="{!! url('navigation/administrator') !!}" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> {!! Lang::get("action.back") !!}</a>
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
                                <th>{!! Lang::get('navigation::app.name') !!}</th>
								<td>{!! $navigation->name !!}</td>
                            </tr>
                            <tr>
                                <th>{!! Lang::get('navigation::app.url') !!}</th>
								<td>{!! $navigation->url !!}</td>
                            </tr>
                          

						</table>
					</div>
					<div class="col-md-6">
						<table class="table">
                            <tr>
                                <th>{!! Lang::get('action.order') !!}</th>
								<td>{!! $navigation->order !!}</td>
                            </tr>
							<tr>
                                <th>{!! Lang::get('navigation::app.post') !!}</th>
								<td>{!! $navigation->post !!}</td>
                            </tr>
							
						</table>
					</div>
				</div>
            </div>
        </div>
    </div>
@endsection