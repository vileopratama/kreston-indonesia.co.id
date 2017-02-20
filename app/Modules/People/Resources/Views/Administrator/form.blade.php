@extends('administrator::layout')
@section('content')
	{!! Form::open(['url' => 'people/administrator/update','id'=>'people_form','class'=>'form-horizontal']) !!}
	{!! Form::hidden('id', isset($people) ?  Crypt::encrypt($people->id) : null, ['id' => 'id']) !!}
    <!-- Panel Header -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel p-xs">
                <div class="panel-heading clearfix">
                    <div class="col-md-2">
                        <h4 class="panel-title pull-left" style="padding-top: 7.5px;"><i class="fa fa-flag"></i>  {!! Lang::get('people::app.our people') !!}</h4>
                    </div>

                    <div class="col-md-10">
                        <div class="pull-right">
                            <div class="btn-group pull-right">
								<button class="btn btn-primary btn-sm" type="submit" id="btn-submit"><i class="fa fa-save"></i> {!! Lang::get('action.save') !!}</button>
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
						<div class="form-group">
							<label for="#" class="col-sm-2 control-label text-left">{!! Lang::get('people::app.photo') !!}</label>
							<div class="col-sm-10">
								<div class="input-group">
									  <span class="input-group-btn">
										<a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
										  <i class="fa fa-picture-o"></i> {!! Lang::get('action.choose') !!}
										</a>
									  </span>
									<input id="thumbnail" class="form-control" type="text" value="{!! isset($people)?url($people->photo_storage_location):null !!}" name="filepath">
								</div>
								<img id="holder" src="{!! isset($people)?url($people->photo_storage_location):null !!}" style="margin-top:15px;">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="name" class="col-sm-2 control-label text-left">{!! Lang::get('people::app.name') !!}</label>
                            <div class="col-sm-10">
								{!! Form::text('name',isset($people)?$people->name:null, ['class' => 'form-control input-md','id'=>'name','placeholder'=>lang::get('people::app.name'),'maxlength'=>100]) !!}
							</div>
                        </div>
						<div class="form-group">
							<label for="name" class="col-sm-2 control-label text-left">{!! Lang::get('people::app.email') !!}</label>
                            <div class="col-sm-10">
								{!! Form::text('email',isset($people)?$people->email:null, ['class' => 'form-control input-md','id'=>'email','placeholder'=>lang::get('people::app.email'),'maxlength'=>100]) !!}
							</div>
                        </div>
						<div class="form-group">
							<label for="name" class="col-sm-2 control-label text-left">{!! Lang::get('people::app.location') !!}</label>
                            <div class="col-sm-10">
								{!! Form::select('contact_id',$contact_dropdown,isset($people)?$people->contact_id:null, ['class' => 'form-control input-md','id'=>'contact_id','placeholder'=>lang::get('people::app.please select a location'),'maxlength'=>100]) !!}
							</div>
                        </div>
						<div class="form-group">
							<label for="name" class="col-sm-2 control-label text-left">{!! Lang::get('people::app.order') !!}</label>
                            <div class="col-sm-3">
								{!! Form::text('order',isset($people)?$people->order:null, ['class' => 'form-control input-md','id'=>'order','placeholder'=>lang::get('people::app.order'),'maxlength'=>100]) !!}
							</div>
                        </div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="description" class="col-sm-1 control-label text-left">{!! Lang::get('people::app.description') !!}</label>
							<div class="col-sm-11">
								{!! Form::textarea('description',isset($people)?$people->description:null, ['class' => 'form-control input-md','id'=>'description','placeholder'=>lang::get('people::app.description')]) !!}
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
			$('#people_form').on('submit', function(event) {
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
