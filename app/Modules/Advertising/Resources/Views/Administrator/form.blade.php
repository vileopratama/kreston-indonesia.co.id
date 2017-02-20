@extends('administrator::layout')
@section('content')
	{!! Form::open(['url' => 'advertising/administrator/update','id'=>'advertising_form','class'=>'form-horizontal']) !!}
	{!! Form::hidden('id', isset($advertising) ?  Crypt::encrypt($advertising->id) : null, ['id' => 'id']) !!}
    <!-- Panel Header -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel p-xs">
                <div class="panel-heading clearfix">
                    <div class="col-md-2">
                        <h4 class="panel-title pull-left" style="padding-top: 7.5px;"><i class="fa fa-flag"></i>  {!! Lang::get('advertising::app.advertising') !!}</h4>
                    </div>

                    <div class="col-md-10">
                        <div class="pull-right">
                            <div class="btn-group pull-right">
								<button class="btn btn-primary btn-sm" type="submit" id="btn-submit"><i class="fa fa-save"></i> {!! Lang::get('action.save') !!}</button>
								<a href="{!! url('advertising/administrator') !!}" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> {!! Lang::get("action.back") !!}</a>
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
							<label for="first_name" class="col-sm-2 control-label text-left">{!! Lang::get('advertising::app.name') !!}</label>
                            <div class="col-sm-10">
								{!! Form::text('name',isset($advertising)?$advertising->name:null, ['class' => 'form-control input-md','id'=>'name','placeholder'=>lang::get('advertising::app.name'),'maxlength'=>100]) !!}
							</div>
                        </div>
						<div class="form-group">
							<label for="#" class="col-sm-2 control-label text-left">{!! Lang::get('advertising::app.image') !!}</label>
                            <div class="col-sm-10">
								<div class="input-group">
									  <span class="input-group-btn">
										<a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
										  <i class="fa fa-picture-o"></i> {!! Lang::get('action.choose') !!}
										</a>
									  </span>
									<input id="thumbnail" class="form-control" type="text" value="{!! isset($advertising)?url($advertising->storage_location):null !!}" name="filepath">
								</div>
								<img id="holder" @if(isset($advertising)) src="{!! url($advertising->storage_location) !!}" @endif style="margin-top:15px;">
							</div>
                        </div>
						<div class="form-group">
							<label for="first_name" class="col-sm-2 control-label text-left">{!! Lang::get('advertising::app.link') !!}</label>
                            <div class="col-sm-10">
								{!! Form::text('link',isset($advertising)?$advertising->link:"http://", ['class' => 'form-control input-md','id'=>'link','placeholder'=>lang::get('advertising::app.link'),'maxlength'=>255]) !!}
							</div>
                        </div>
						<div class="form-group">
							<label for="description" class="col-sm-2 control-label text-left">{!! Lang::get('advertising::app.description') !!}</label>
							<div class="col-sm-10">
								{!! Form::textarea('description',isset($advertising)?$advertising->description:null, ['class' => 'form-control input-md','id'=>'description','placeholder'=>lang::get('advertising::app.description')]) !!}
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
	<script src="{!! asset('vendor/laravel-filemanager/js/lfm.js') !!}"></script>
    <script type="text/javascript">
		$(function() {
			$('#lfm').filemanager('image','{!! url("/") !!}');
			$('#advertising_form').on('submit', function(event) {
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
