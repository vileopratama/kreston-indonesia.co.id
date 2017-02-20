@extends('administrator::layout')
@section('content')
    <!-- Panel Header -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel p-xs">
                <div class="panel-heading clearfix">
                    <div class="col-md-2">
                        <h4 class="panel-title pull-left" style="padding-top: 7.5px;"><i class="fa fa-pagepaper-o"></i>  {!! Lang::get('page::app.page') !!}</h4>
                    </div>

                    <div class="col-md-10">
                        <div class="pull-right">
                            <div class="btn-group pull-right">
								<a href="{!! url('page/administrator/create') !!}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {!! Lang::get("action.create") !!}</a>
								<a href="{!! url('page/administrator/status/'.Crypt::encrypt($page->id)) !!}" class="btn btn-primary btn-sm"><i class="fa fa-flag"></i> {!! isset($page) && $page->is_active == 1 ? Lang::get("action.set inactive"): Lang::get("action.set active")!!}</a>
								<a href="{!! url('page/administrator/edit/'.Crypt::encrypt($page->id)) !!}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> {!! Lang::get("action.edit") !!}</a>
								<a href="{!! url('page/administrator/index') !!}" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> {!! Lang::get("action.back") !!}</a>
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
                                <th>{!! Lang::get('page::app.page name') !!}</th>
                            </tr>
							<tr>
                                <td>{!! $page->name !!}</td>
							</tr>
							
                            <tr>
                                <th>{!! Lang::get('page::app.content') !!}</th>
                            </tr>
                            <tr>
                                <td>{!! $page->content !!}</td>
                            </tr>

						</table>
					</div>
				</div>
            </div>
        </div>
    </div>
@endsection