@extends('administrator::layout')
@section('content')
	{!! Form::open(['url' => 'gallery/administrator/update','id'=>'gallery_form','class'=>'form-horizontal']) !!}
	{!! Form::hidden('id', isset($event) ?  Crypt::encrypt($event->id) : null, ['id' => 'id']) !!}
    <!-- Panel Header -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel p-xs">
                <div class="panel-heading clearfix">
                    <div class="col-md-2">
                        <h4 class="panel-title pull-left" style="padding-top: 7.5px;"><i class="fa fa-flag"></i>  {!! Lang::get('gallery::app.event name') !!}</h4>
                    </div>

                    <div class="col-md-10">
                        <div class="pull-right">
                            <div class="btn-group pull-right">
								<button class="btn btn-primary btn-sm" type="submit" id="btn-submit"><i class="fa fa-save"></i> {!! Lang::get('action.save') !!}</button>
								<a href="{!! url('gallery/administrator') !!}" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> {!! Lang::get("action.back") !!}</a>
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
							<label for="#" class="col-sm-3 control-label text-left">{!! Lang::get('gallery::app.name') !!}</label>
							<div class="col-sm-9">
								{!! Form::text('name',isset($event)?$event->name:null, ['class' => 'form-control input-md','id'=>'name','placeholder'=>lang::get('gallery::app.name'),'maxlength'=>100]) !!}
							</div>
						</div>

						
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="#" class="col-sm-3 control-label text-left">{!! Lang::get('gallery::app.from date') !!}</label>
							<div class="col-sm-4">
								<div class="input-group date" id="datetimepicker2" data-plugin="datetimepicker">
									<input name="date_from" id="date_from" type="text" class="form-control" value="{!! isset($event) ? $event->date_from : null !!}" data-date-format="DD/MM/YYYY" />
									<span class="input-group-addon bg-info text-white">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="#" class="col-sm-3 control-label text-left">{!! Lang::get('gallery::app.to date') !!}</label>
							<div class="col-sm-4">
								<div class="input-group date" id="datetimepicker2" data-plugin="datetimepicker">
									<input name="date_to" id="date_to" type="text" class="form-control" value="{!! isset($event) ? $event->date_to : null !!}" data-date-format="DD/MM/YYYY" />
									<span class="input-group-addon bg-info text-white">
											<span class="glyphicon glyphicon-calendar"></span>
										</span>
								</div>
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
			$('#gallery_form').on('submit', function(event) {
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
