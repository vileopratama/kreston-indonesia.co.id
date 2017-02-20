@extends('administrator::layout')
@section('content')
    <!-- Panel Header -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel p-xs">
                <div class="panel-heading clearfix">
                    <div class="col-md-2">
                        <h4 class="panel-title pull-left" style="padding-top: 7.5px;"><i class="fa fa-pagepaper-o"></i>  {!! Lang::get('contact-us::app.message') !!}</h4>
                    </div>

                    <div class="col-md-10">
                        <div class="pull-right">
                            <div class="btn-group pull-right">
								<a href="{!! url('contact-us/administrator/messages') !!}" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> {!! Lang::get("action.back") !!}</a>
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
                                <th>{!! Lang::get('contact-us::app.name') !!}</th>
                            </tr>
							<tr>
                                <td>{!! $message->name !!}</td>
							</tr>
							<tr>
                                <th>{!! Lang::get('contact-us::app.email') !!}</th>
                            </tr>
							<tr>
                                <td>{!! $message->email !!}</td>
							</tr>
							<tr>
                                <th>{!! Lang::get('contact-us::app.mobile number') !!}</th>
                            </tr>
							<tr>
                                <td>{!! $message->mobile_number !!}</td>
							</tr>
							<tr>
                                <th>{!! Lang::get('contact-us::app.subject') !!}</th>
                            </tr>
                            <tr>
                                <td>{!! $message->subject !!}</td>
                            </tr>
                            <tr>
                                <th>{!! Lang::get('contact-us::app.message') !!}</th>
                            </tr>
                            <tr>
                                <td>{!! $message->message !!}</td>
                            </tr>

						</table>
					</div>
				</div>
            </div>
        </div>
    </div>
@endsection