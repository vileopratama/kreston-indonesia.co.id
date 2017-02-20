@extends('administrator::layout')
@section('content')
	{!! Form::open(['url' => 'category/administrator/update','id'=>'category_form','class'=>'form-horizontal']) !!}
	{!! Form::hidden('id', isset($category) ?  Crypt::encrypt($category->id) : null, ['id' => 'id']) !!}
    <!-- Panel Header -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel p-xs">
                <div class="panel-heading clearfix">
                    <div class="col-md-2">
                        <h4 class="panel-title pull-left" style="padding-top: 7.5px;"><i class="fa fa-flag"></i>  {!! Lang::get('category::app.category') !!}</h4>
                    </div>

                    <div class="col-md-10">
                        <div class="pull-right">
                            <div class="btn-group pull-right">
								<button class="btn btn-primary btn-sm" type="submit" id="btn-submit"><i class="fa fa-save"></i> {!! Lang::get('action.save') !!}</button>
								<a href="{!! url('category/administrator/index') !!}" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> {!! Lang::get("action.back") !!}</a>
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
						<div class="form-group">
							<label for="first_name" class="col-sm-2 control-label text-left">{!! Lang::get('category::app.name') !!}</label>
                            <div class="col-sm-10">
								{!! Form::text('name',isset($category)?$category->name:null, ['class' => 'form-control input-md','id'=>'name','placeholder'=>lang::get('category::app.name'),'maxlength'=>100]) !!}
							</div>
                        </div>
						<div class="form-group">
							<label for="first_name" class="col-sm-2 control-label text-left">{!! Lang::get('category::app.order') !!}</label>
                            <div class="col-sm-2">
								{!! Form::text('order',isset($category)?$category->order:0, ['class' => 'form-control input-md','id'=>'order','placeholder'=>'0','maxlength'=>3]) !!}
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
			$('#category_form').on('submit', function(event) {
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
