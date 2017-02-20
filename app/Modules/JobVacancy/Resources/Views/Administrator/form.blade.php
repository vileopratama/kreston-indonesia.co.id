@extends('administrator::layout')
@section('content')
	{!! Form::open(['url' => 'job-vacancy/administrator/update','id'=>'job-vacancy_form','class'=>'form-horizontal']) !!}
	{!! Form::hidden('id', isset($job) ?  Crypt::encrypt($job->id) : null, ['id' => 'id']) !!}
    <!-- Panel Header -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel p-xs">
                <div class="panel-heading clearfix">
                    <div class="col-md-2">
                        <h4 class="panel-title pull-left" style="padding-top: 7.5px;"><i class="fa fa-flag"></i>  {!! Lang::get('job-vacancy::app.job vacancy') !!}</h4>
                    </div>

                    <div class="col-md-10">
                        <div class="pull-right">
                            <div class="btn-group pull-right">
								<button class="btn btn-primary btn-sm" type="submit" id="btn-submit"><i class="fa fa-save"></i> {!! Lang::get('action.save') !!}</button>
								<a href="{!! url('job-vacancy/administrator/index') !!}" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> {!! Lang::get("action.back") !!}</a>
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
							<label for="#" class="col-sm-3 control-label text-left">{!! Lang::get('job-vacancy::app.name') !!}</label>
							<div class="col-sm-9">
								{!! Form::text('name',isset($job)?$job->name:null, ['class' => 'form-control input-md','id'=>'name','placeholder'=>lang::get('job-vacancy::app.name'),'maxlength'=>100]) !!}
							</div>
						</div>
						<div class="form-group">
							<label for="#" class="col-sm-3 control-label text-left">{!! Lang::get('job-vacancy::app.due date') !!}</label>
							<div class="col-sm-4">
								<div class="input-group date" id="datetimepicker2" data-plugin="datetimepicker">
									<input name="due_date" id="due_date" type="text" class="form-control" value="{!! isset($job) ? $job->due_date : null !!}" data-date-format="DD/MM/YYYY" />
										<span class="input-group-addon bg-info text-white">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
								</div>
							</div>
						</div>
						
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="name" class="col-sm-3 control-label text-left">{!! Lang::get('job-vacancy::app.position') !!}</label>
                            <div class="col-sm-9">
								{!! Form::text('position',isset($job)?$job->position:null, ['class' => 'form-control input-md','id'=>'position','placeholder'=>lang::get('job-vacancy::app.position'),'maxlength'=>100]) !!}
							</div>
                        </div>
						<div class="form-group">
							<label for="#" class="col-sm-3 control-label text-left">{!! Lang::get('job-vacancy::app.location') !!}</label>
							<div class="col-sm-9">
								{!! Form::text('location',isset($job)?$job->location:null, ['class' => 'form-control input-md','id'=>'location','placeholder'=>lang::get('job-vacancy::app.location'),'maxlength'=>100]) !!}
							</div>
						</div>
						
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="#" class="control-label text-left">{!! Lang::get('job-vacancy::app.description') !!}</label>
							{!! Form::textarea('description',isset($job)?$job->description:null, ['class' => 'form-control input-md','id'=>'description','placeholder'=>lang::get('job-vacancy::app.description')]) !!}
						</div>
						<div class="form-group">
							<label for="#" class="control-label text-left">{!! Lang::get('job-vacancy::app.responsibilities') !!}</label>
							{!! Form::textarea('responsibilities',isset($job)?$job->responsibilities:null, ['class' => 'form-control input-md','id'=>'responsibilities','placeholder'=>lang::get('job-vacancy::app.responsibilities')]) !!}
						</div>
						<div class="form-group">
							<label for="#" class="control-label text-left">{!! Lang::get('job-vacancy::app.requirements') !!}</label>
							{!! Form::textarea('requirements',isset($job)?$job->requirements:null, ['class' => 'form-control input-md','id'=>'requirements','placeholder'=>lang::get('job-vacancy::app.requirements')]) !!}
						</div>
					</div>
					
				</div>
            </div>
        </div>
    </div>
	{!! Form::close() !!}
@endsection

@push('scripts')
	<script src="{!! url('vendor/unisharp/laravel-ckeditor/ckeditor.js') !!}"></script>
    <script>
        CKEDITOR.replace('description');
		CKEDITOR.replace('responsibilities');
		CKEDITOR.replace('requirements');
    </script>
    <script type="text/javascript">
		$(function() {
			$('#job-vacancy_form').on('submit', function(event) {
				event.preventDefault();
				//ckeditor
				for ( instance in CKEDITOR.instances ) {
					CKEDITOR.instances[instance].updateElement();
				}
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
