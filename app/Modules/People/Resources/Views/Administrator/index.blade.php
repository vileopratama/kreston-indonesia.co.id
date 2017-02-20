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
                            {!! $people->appends(\Request::except('page'))->render() !!}
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#search_modal"><i class="fa fa-search"></i>  {!! Lang::get("action.search") !!}</button>
								<a href="{!! url('people/administrator/index') !!}" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i> {!! Lang::get("action.refresh") !!}</a>
                                <a href="{!! url('people/administrator/create') !!}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> {!! Lang::get("action.add new") !!}</a>
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
                        <th class="col-sm-2 text-center">{!! Lang::get('people::app.photo') !!}</th>
                        <th class="col-sm-2">@sortablelink('name')</th>
						<th class="col-sm-2">@sortablelink('email')</th>
						<th class="col-sm-2">@sortablelink('contact_id',Lang::get("people::app.location"))</th>
                        <th class="col-sm-2 text-center">{!! Lang::get('action.active') !!}</th>
						<th class="col-sm-1 text-center">@sortablelink('order')</th>
                        <th class="col-sm-1">{!! Lang::get('action.edit') !!}</th>
                    </tr>

                    @foreach ($people as $key => $user)
                        <tr class="row-{!! $user->id !!}">
                            <td>{!! ($key + 1 + (Request::has("page")? Request::get("page") : 0)) !!}</td>
                            <td><img src="{{ url(ImageManager::getImagePath($user->photo_storage_location, 70, 50, 'crop')) }}" alt=""></td>
                            <td>{!! $user->name !!}</td>
							<td><a href="mailto:{!! $user->email !!}"><i class="fa fa-envelope"></i> {!! $user->email !!}</a></td>
							<td>{!! $user->location !!}</td>
                            <td class="text-center">{!! $user->is_active == 1 ? Lang::get("action.yes"):Lang::get("action.no") !!}</td>
							<td>{!! $user->order !!}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                        <i class="fa fa-pencil"> {!! Lang::get('action.edit') !!}</i>
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="{!! url('people/administrator/view/'.Crypt::encrypt($user->id)) !!}"> {!! Lang::get('action.view') !!}</a></li>
                                        <li><a href="{!! url('people/administrator/edit/'.Crypt::encrypt($user->id)) !!}"> {!! Lang::get('action.edit') !!}</a></li>
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
                {!! Form::open(['url' => 'people/administrator','role' => 'form','id'=>'people_search_form','method'=>'GET']) !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{!! Lang::get("action.search") !!}</h4>
                </div>
                <div class="modal-body">
                    <div class="row-fluid">
                        <div class="form-group">
                            {!! Form::text('name',Request::get('name'),['class' => 'form-control input-md','id'=>'first_name','placeholder'=>lang::get('people::app.name'),'maxlength'=>100]) !!}
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
                        url   : "{!! url('people/administrator/delete') !!}",
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