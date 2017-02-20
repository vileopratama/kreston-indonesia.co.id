@extends('administrator::layout')
@section('content')
    <!-- Panel Header -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel p-xs">
                <div class="panel-heading clearfix">
                    <div class="col-md-2">
                        <h4 class="panel-title pull-left" style="padding-top: 7.5px;"><i class="fa fa-arrow-up"></i>  {!! Lang::get('job-vacancy::app.job vacancy') !!}</h4>
                    </div>

                    <div class="col-md-10">
                        <div class="pull-right">
                            {!! $jobs->appends(\Request::except('page'))->render() !!}
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#search_modal"><i class="fa fa-search"></i>  {!! Lang::get("action.search") !!}</button>
								<a href="{!! url('job-vacancy/administrator/index') !!}" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i> {!! Lang::get("action.refresh") !!}</a>
                                <a href="{!! url('job-vacancy/administrator/create') !!}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> {!! Lang::get("action.add new") !!}</a>
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
                        <th class="col-sm-2">@sortablelink('name')</th>
                        <th class="col-sm-2">@sortablelink('due_date')</th>
						<th class="col-sm-2">@sortablelink('position')</th>
						<th class="col-sm-2">@sortablelink('location')</th>
                        <th class="col-sm-1 text-center">{!! Lang::get('action.active') !!}</th>
                        <th class="col-sm-1">{!! Lang::get('action.edit') !!}</th>
                    </tr>

                    @foreach ($jobs as $key => $job)
                        <tr class="row-{!! $job->id !!}">
                            <td>{!! ($key + 1 + (Request::has("page")? Request::get("page") : 0)) !!}</td>
							<td>{!! $job->name !!}</td>
                            <td>{!! $job->due_date !!}</td>
                            <td>{!! $job->position !!}</td>
							<td>{!! $job->location !!}</td>
                            <td class="text-center">{!! $job->is_active == 1 ? Lang::get("action.yes"):Lang::get("action.no") !!}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                        <i class="fa fa-pencil"> {!! Lang::get('action.edit') !!}</i>
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="{!! url('job-vacancy/administrator/view/'.Crypt::encrypt($job->id)) !!}"> {!! Lang::get('action.view') !!}</a></li>
                                        <li><a href="{!! url('job-vacancy/administrator/edit/'.Crypt::encrypt($job->id)) !!}"> {!! Lang::get('action.edit') !!}</a></li>
                                        <li><a href="#" id="{!! Crypt::encrypt($job->id) !!}" class="delete"> {!! Lang::get('action.remove') !!}</a></li>
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
                {!! Form::open(['url' => 'job-vacancy/administrator','role' => 'form','id'=>'job_search_form','method'=>'GET']) !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{!! Lang::get("action.search") !!}</h4>
                </div>
                <div class="modal-body">
                    <div class="row-fluid">
                        <div class="form-group">
                            {!! Form::text('name',Request::get('name'),['class' => 'form-control input-md','id'=>'name','placeholder'=>lang::get('job-vacancy::app.name'),'maxlength'=>100]) !!}
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
                        url   : "{!! url('job-vacancy/administrator/delete') !!}",
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