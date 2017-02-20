@extends('administrator::layout')
@section('content')
    <!-- Panel Header -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel p-xs">
                <div class="panel-heading clearfix">
                    <div class="col-md-2">
                        <h4 class="panel-title pull-left" style="padding-top: 7.5px;"><i class="fa fa-articlepaper-o"></i>  {!! Lang::get('article::app.article') !!}</h4>
                    </div>

                    <div class="col-md-10">
                        <div class="pull-right">
                            <div class="btn-group pull-right">
								<a href="{!! url('article/administrator/create') !!}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {!! Lang::get("action.create") !!}</a>
								<a href="{!! url('article/administrator/status/'.Crypt::encrypt($post->id)) !!}" class="btn btn-primary btn-sm"><i class="fa fa-flag"></i> {!! isset($post) && $post->is_active == 1 ? Lang::get("action.set inactive"): Lang::get("action.set active")!!}</a>
								<a href="{!! url('article/administrator/edit/'.Crypt::encrypt($post->id)) !!}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> {!! Lang::get("action.edit") !!}</a>
								<a href="{!! url('article/administrator') !!}" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> {!! Lang::get("action.back") !!}</a>
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
                                <th>{!! Lang::get('article::app.title') !!}</th>
                            </tr>
							<tr>
                                <td>{!! $post->title !!}</td>
							</tr>
							<tr>
                                <th>{!! Lang::get('category::app.name') !!}</th>
                            </tr>
                            <tr>
                                <th>{!! Lang::get('article::app.content') !!}</th>
                            </tr>
                            <tr>
                                <td>{!! $post->content !!}</td>
                            </tr>
                            <tr>
                                <th>{!! Lang::get('article::app.total view') !!}</th>
                            </tr>
                            <tr>
                                <td>{!! $post->total_view !!}</td>
                            </tr>
						</table>
					</div>
				</div>
            </div>
        </div>
    </div>
@endsection