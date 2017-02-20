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
                            {!! $users->appends(\Request::except('page'))->render() !!}
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#search_modal"><i class="fa fa-search"></i>  {!! Lang::get("action.search") !!}</button>
								<a href="{!! url('user/administrator/') !!}" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i> {!! Lang::get("action.refresh") !!}</a>
                                <a href="{!! url('user/administrator/create') !!}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> {!! Lang::get("action.add new") !!}</a>
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
                <table class="table">
                    <tr>
                        <th class="col-sm-1">#</th>
                        <th class="col-sm-2">@sortablelink('first_name')</th>
                        <th class="col-sm-2">@sortablelink('last_name')</th>
                        <th class="col-sm-2">@sortablelink('email')</th>
                        <th class="col-sm-1">{!! Lang::get('action.edit') !!}</th>
                    </tr>

                    @foreach ($users as $key => $user)
                    <tr class="row-{!! $user->id !!}">
                        <td>{!! $key + 1 !!}</td>
                        <td>{!! $user->first_name !!}</td>
                        <td>{!! $user->last_name !!}</td>
                        <td>{!! $user->email !!}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                    <i class="fa fa-pencil"> {!! Lang::get('action.edit') !!}</i>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="{!! url('user/administrator/view/'.Crypt::encrypt($user->id)) !!}"> {!! Lang::get('action.view') !!}</a></li>
                                    <li><a href="{!! url('user/administrator/edit/'.Crypt::encrypt($user->id)) !!}"> {!! Lang::get('action.edit') !!}</a></li>
                                    <li><a href="#" id="{!! Crypt::encrypt($user->id) !!}" class="delete"> {!! Lang::get('action.remove') !!}</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="search_modal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                {!! Form::open(['url' => 'user/administrator','role' => 'form','id'=>'user_search_form','method'=>'GET']) !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{!! Lang::get("action.search") !!}</h4>
                </div>
                <div class="modal-body">
                    <div class="row-fluid">
                        <div class="form-group">
                            {!! Form::text('first_name',Request::get('first_name'),['class' => 'form-control input-md','id'=>'first_name','placeholder'=>lang::get('user::app.first name'),'maxlength'=>100]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::text('email',Request::get('email'),['class' => 'form-control input-md','id'=>'email','placeholder'=>lang::get('user::app.email'),'maxlength'=>100]) !!}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{!! Lang::get("action.search") !!}</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">{!! Lang::get("action.close") !!}</button>
                </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
@endsection
@push("scripts")
    <script type="text/javascript">
        $(function() {
            $('.delete').on('click', function(event) {
                event.preventDefault();
                $("div#divLoading").addClass('show');
                var id = $(this).attr("id");
                $.confirm({
                    title: '{!! Lang::get("action.confirm") !!}',
                    content: '{!! Lang::get("action.confirm delete") !!}',
                    confirm: function(){
                        $.ajax({
                            type  : "post",
                            url   : "{!! url('user/administrator/delete') !!}",
                            data  : {id : id},
                            dataType: "json",
                            cache : false,
                            beforeSend: function(xhr) {xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf_token"]').attr('content'))},
                            success : function(response) {
                                $("div#divLoading").removeClass('show');
                                if(response.success == true) {
                                    $(".row-" + response.id).remove();

                                }

                                $.alert(response.message);
                            },
                            error : function() {
                                $("div#divLoading").removeClass('show');
                            }
                        });

                    },
                    cancel: function(){
						$("div#divLoading").removeClass('show');
                    }
                });
            });
        });
    </script>
@endpush