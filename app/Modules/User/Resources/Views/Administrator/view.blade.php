@extends('administrator::layout')
@section('content')
    <!-- Panel Header -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel p-xs">
                <div class="panel-heading clearfix">
                    <div class="col-md-2">
                        <h4 class="panel-title pull-left" style="padding-top: 7.5px;"><i class="fa fa-user"></i>  {!! Lang::get('app.user') !!}</h4>
                    </div>

                    <div class="col-md-10">
                        <div class="pull-right">
                            <div class="btn-group pull-right">
								<a href="{!! url('user/administrator/create') !!}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> {!! Lang::get("action.create") !!}</a>
								<a href="{!! url('user/administrator/edit/'.Crypt::encrypt($user->id)) !!}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> {!! Lang::get("action.edit") !!}</a>
								<a href="{!! url('user/administrator') !!}" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> {!! Lang::get("action.back") !!}</a>
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
								<th>{!! Lang::get('user::app.first name') !!}</th>
								<td>{!! $user->first_name !!}</td>
							</tr>
							<tr>
								<th>{!! Lang::get('user::app.email') !!}</th>
								<td>{!! $user->email !!}</td>
							</tr>
						</table>
					</div>
					<div class="col-md-6">
						<table class="table">
							<tr>
								<th>{!! Lang::get('user::app.last name') !!}</th>
								<td>{!! $user->last_name !!}</td>
							</tr>
							<tr>
								<th>{!! Lang::get('user::app.password') !!}</th>
								<td><a href="{!! url('user/administrator/reset-password/'.Crypt::encrypt($user->id)) !!}" class="btn btn-default btn-sm"><i class="fa fa-key"></i> {!! Lang::get("action.reset password") !!}</a></td>
							</tr>
						</table>
					</div>
				</div>
            </div>
        </div>
    </div>
@endsection