@extends('administrator::layout')
@section('content')
	{!! Form::open(['url' => 'navigation/administrator/update','id'=>'navigation_form','class'=>'form-horizontal']) !!}
	{!! Form::hidden('id', isset($navigation) ?  Crypt::encrypt($navigation->id) : null, ['id' => 'id']) !!}
    <!-- Panel Header -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel p-xs">
                <div class="panel-heading clearfix">
                    <div class="col-md-2">
                        <h4 class="panel-title pull-left" style="padding-top: 7.5px;"><i class="fa fa-newspaper-o"></i>  {!! Lang::get('navigation::app.navigation') !!}</h4>
                    </div>

                    <div class="col-md-10">
                        <div class="pull-right">
                            <div class="btn-group pull-right">
								<button class="btn btn-primary btn-sm" type="submit" id="btn-submit"><i class="fa fa-save"></i> {!! Lang::get('action.save') !!}</button>
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
						<div class="form-group">
							<label for="name" class="col-sm-2 control-label text-left">{!! Lang::get('navigation::app.name') !!}</label>
							<div class="col-sm-10">
								{!! Form::text('name',isset($navigation)?$navigation->name:null, ['class' => 'form-control input-md','id'=>'name','placeholder'=>Lang::get('navigation::app.name'),'maxlength'=>100]) !!}
							</div>
						</div>
						<div class="form-group">
							<label for="parent_id" class="col-sm-2 control-label text-left">{!! Lang::get('navigation::app.parent') !!}</label>
							<div class="col-sm-10">
								{!! Form::select('parent_id',$navigation_dropdown,isset($navigation)?$navigation->parent_id:0, ['class' => 'form-control input-md','id'=>'parent_id']) !!}
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="url" class="col-sm-2 control-label text-left">{!! Lang::get('navigation::app.url') !!}</label>
							<div class="col-sm-10">
								{!! Form::text('url',isset($navigation)?$navigation->url:null, ['class' => 'form-control input-md','id'=>'url','placeholder'=>Lang::get('navigation::app.url'),'maxlength'=>100]) !!}
							</div>
						</div>
						<div class="form-group">
							<label for="url" class="col-sm-2 control-label text-left">{!! Lang::get('navigation::app.post') !!}</label>
							<div class="col-sm-10">
								{!! Form::select('post',$post_dropdown,isset($navigation)?$navigation->post:null, ['class' => 'form-control input-md','id'=>'post']) !!}
							</div>
						</div>
						<div class="form-group">
							<label for="order" class="col-sm-2 control-label text-left">{!! Lang::get('action.order') !!}</label>
							<div class="col-sm-10">
								{!! Form::text('order',isset($navigation)?$navigation->order:null, ['class' => 'form-control numeric input-md','id'=>'order','placeholder'=>Lang::get('action.order'),'maxlength'=>5]) !!}
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
	{!! Form::close() !!}
@endsection

@push('scripts')
    <script type="text/javascript">
		$(function() {
			$('#navigation_form').on('submit', function(event) {
				event.preventDefault();
				$("#divLoading").addClass('show');
				
				$.ajax({
					type : $(this).attr('method'),
					url : $(this).attr('action'),
					data : $(this).serialize(),
					dataType : "json",
					cache : false,
					beforeSend : function() { console.log($(this).serialize());},
					success : function(response) {
						if(response.success == false) {
							$(".help-block").remove();
							$.each(response.message, function( index,message) {
								var element = $('<p>' + message + '</p>').attr({'class' : 'help-block text-danger'}).css({display: 'none'});
								$('#'+index).after(element);
								$(element).fadeIn();
							});
						}
						else {
							$.alert(response.message);
							$(".help-block").remove();
							window.location = response.redirect;
						}
						
						$("#divLoading").removeClass('show');
					},
					error : function() {
						$("#divLoading").removeClass('show');
					}
				});
				return false;
			});
		});
	</script>
@endpush
