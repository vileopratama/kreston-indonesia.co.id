@extends('administrator::layout')
@section('content')
	{!! Form::open(['url' => 'contact-us/administrator/update','id'=>'contact_form','class'=>'form-horizontal']) !!}
	{!! Form::hidden('id', isset($contact) ?  Crypt::encrypt($contact->id) : null, ['id' => 'id']) !!}
    <!-- Panel Header -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel p-xs">
                <div class="panel-heading clearfix">
                    <div class="col-md-2">
                        <h4 class="panel-title pull-left" style="padding-top: 7.5px;"><i class="fa fa-envelope"></i>  {!! Lang::get('contact-us::app.contact us') !!}</h4>
                    </div>

                    <div class="col-md-10">
                        <div class="pull-right">
                            <div class="btn-group pull-right">
								<button class="btn btn-primary btn-sm" type="submit" id="btn-submit"><i class="fa fa-save"></i> {!! Lang::get('action.save') !!}</button>
								<a href="{!! url('contact-us/administrator/index') !!}" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> {!! Lang::get("action.back") !!}</a>
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
							<label for="#" class="col-sm-3 control-label text-left">{!! Lang::get('contact-us::app.name') !!}</label>
							<div class="col-sm-9">
								{!! Form::text('name',isset($contact)?$contact->name:null, ['class' => 'form-control input-md','id'=>'name','placeholder'=>lang::get('contact-us::app.name'),'maxlength'=>100]) !!} 
							</div>
						</div>
						<div class="form-group">
							<label for="#" class="col-sm-3 control-label text-left">{!! Lang::get('contact-us::app.order') !!}</label>
							<div class="col-sm-3">
								{!! Form::text('order',isset($contact)?$contact->order:null, ['class' => 'form-control input-md','id'=>'order','placeholder'=>0,'maxlength'=>100]) !!} 
							</div>
						</div>
						<div class="form-group">
							<label for="#" class="col-sm-3 control-label text-left">{!! Lang::get('contact-us::app.address') !!}</label>
							<div class="col-sm-9">
								{!! Form::textarea('address',isset($contact)?$contact->address:null, ['class' => 'form-control input-md','id'=>'address','placeholder'=>lang::get('contact-us::app.address'),'maxlength'=>255,'rows' => 5]) !!}
							</div>
						</div>
						<div class="form-group">
							<label for="#" class="col-sm-3 control-label text-left">{!! Lang::get('contact-us::app.city') !!}</label>
							<div class="col-sm-9">
								{!! Form::text('city',isset($contact)?$contact->city:null, ['class' => 'form-control input-md','id'=>'city','placeholder'=>lang::get('contact-us::app.city'),'maxlength'=>100]) !!}
							</div>
						</div>
						<div class="form-group">
							<label for="#" class="col-sm-3 control-label text-left">{!! Lang::get('contact-us::app.zip code') !!}</label>
							<div class="col-sm-9">
								{!! Form::text('zip_code',isset($contact)?$contact->zip_code:null, ['class' => 'form-control input-md','id'=>'zip_code','placeholder'=>lang::get('contact-us::app.zip code'),'maxlength'=>15]) !!}
							</div>
						</div>
						<div class="form-group">
							<label for="#" class="col-sm-3 control-label text-left">{!! Lang::get('contact-us::app.country') !!}</label>
							<div class="col-sm-9">
								{!! Form::text('country',isset($contact)?$contact->country:null, ['class' => 'form-control input-md','id'=>'country','placeholder'=>lang::get('contact-us::app.country'),'maxlength'=>100]) !!}
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<!--<div class="form-group">
							<label for="#" class="col-sm-3 control-label text-left">{!! Lang::get('contact-us::app.contact name') !!}</label>
							<div class="col-sm-9">
								Form::text('contact_name',isset($contact)?$contact->contact_name:null, ['class' => 'form-control input-md','id'=>'contact_name','placeholder'=>lang::get('contact-us::app.contact name'),'maxlength'=>100])
							</div>
						</div>-->
						<div class="form-group">
							<label for="#" class="col-sm-3 control-label text-left">{!! Lang::get('contact-us::app.phone number') !!}</label>
							<div class="col-sm-9">
								{!! Form::text('phone_number',isset($contact)?$contact->phone_number:null, ['class' => 'form-control input-md','id'=>'phone_number','placeholder'=>lang::get('contact-us::app.phone number'),'maxlength'=>30]) !!}
							</div>
						</div>
						<div class="form-group">
							<label for="#" class="col-sm-3 control-label text-left">{!! Lang::get('contact-us::app.fax number') !!}</label>
							<div class="col-sm-9">
								{!! Form::text('fax_number',isset($contact)?$contact->fax_number:null, ['class' => 'form-control input-md','id'=>'fax_number','placeholder'=>lang::get('contact-us::app.fax number'),'maxlength'=>30]) !!}
							</div>
						</div>
						<div class="form-group">
							<label for="#" class="col-sm-3 control-label text-left">{!! Lang::get('contact-us::app.email') !!}</label>
							<div class="col-sm-9">
								{!! Form::text('email',isset($contact)?$contact->email:null, ['class' => 'form-control input-md','id'=>'email','placeholder'=>lang::get('contact-us::app.email'),'maxlength'=>50]) !!}
							</div>
						</div>
						<div class="form-group">
							<label for="#" class="col-sm-3 control-label text-left">{!! Lang::get('contact-us::app.website') !!}</label>
							<div class="col-sm-9">
								{!! Form::text('website',isset($contact)?$contact->website:null, ['class' => 'form-control input-md','id'=>'website','placeholder'=>lang::get('contact-us::app.website'),'maxlength'=>100]) !!}
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
			$('#contact_form').on('submit', function(event) {
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
