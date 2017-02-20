@extends('administrator::layout')
@section('content')
    <!-- Panel Header -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel p-xs">
                <div class="panel-heading clearfix">
                    <div class="col-md-2">
                        <h4 class="panel-title pull-left" style="padding-top: 7.5px;"><i class="fa fa-user-md"></i>  {!! Lang::get('people::app.our people') !!}</h4>
                    </div>

                    <div class="col-md-10">
                        <div class="pull-right">
                            <div class="btn-group pull-right">
								<a href="{!! url('people/administrator/create') !!}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {!! Lang::get("action.create") !!}</a>
								<a href="{!! url('people/administrator/status/'.Crypt::encrypt($people->id)) !!}" class="btn btn-primary btn-sm"><i class="fa fa-flag"></i> {!! isset($people) && $people->is_active == 1 ? Lang::get("action.set inactive"): Lang::get("action.set active")!!}</a>
								<a href="{!! url('people/administrator/edit/'.Crypt::encrypt($people->id)) !!}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> {!! Lang::get("action.edit") !!}</a>
								<a href="{!! url('people/administrator/index') !!}" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> {!! Lang::get("action.back") !!}</a>
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
								<th>{!! Lang::get('people::app.photo') !!}</th>
								<td><img class="img-responsive" src="{!!  url($people->photo_storage_location) !!}" /></td>
							</tr>

						</table>
					</div>

                    <div class="col-md-6">
                        <table class="table">
                            <tr>
                                <th>{!! Lang::get('people::app.name') !!}</th>
                                <td>{!! $people->name !!}</td>
                            </tr>
							<tr>
                                <th>{!! Lang::get('people::app.email') !!}</th>
                                <td>{!! $people->email !!}</td>
                            </tr>
							<tr>
                                <th>{!! Lang::get('people::app.url') !!}</th>
                                <td>{!! '/people/'.Str::slug($people->name,'-') !!}</td>
                            </tr>
							<tr>
                                <th>{!! Lang::get('people::app.location') !!}</th>
                                <td>{!! $people->location !!}</td>
                            </tr>
							<tr>
                                <th>{!! Lang::get('people::app.order') !!}</th>
                                <td>{!! $people->order !!}</td>
                            </tr>
                        </table>
                    </div>
				</div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <tr>
                                <th>{!! Lang::get('people::app.description') !!}</th>
                                <td>{!! $people->description !!}</td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection