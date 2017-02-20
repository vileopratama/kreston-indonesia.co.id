@extends('administrator::layout')
@section('content')
	{!! Form::open(['url' => 'setting/administrator/update','id'=>'setting_form','class'=>'form-horizontal']) !!}
	{!! Form::hidden('id', isset($setting) ?  Crypt::encrypt($setting->id) : null, ['id' => 'id']) !!}
    <!-- Panel Header -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel p-xs">
                <div class="panel-heading clearfix">
                    <div class="col-md-2">
                        <h4 class="panel-title pull-left" style="padding-top: 7.5px;"><i class="fa fa-gear"></i>  {!! Lang::get('setting::app.setting') !!}</h4>
                    </div>

                    <div class="col-md-10">
                        <div class="pull-right">
                            <div class="btn-group pull-right">
								<button class="btn btn-primary btn-sm" type="submit" id="btn-submit"><i class="fa fa-save"></i> {!! Lang::get('action.save') !!}</button>
								<a href="{!! url('setting/administrator') !!}" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> {!! Lang::get("action.back") !!}</a>
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
							<label for="#" class="col-sm-2 control-label text-left">{!! Lang::get('setting::app.site name') !!}</label>
							<div class="col-sm-10">
								{!! Form::text('site_name',Setting::get_key('site_name'), ['class' => 'form-control input-md','id'=>'name','placeholder'=>lang::get('setting::app.site name'),'maxlength'=>100]) !!}
							</div>
						</div>
						<div class="form-group">
							<label for="#" class="col-sm-2 control-label text-left">{!! Lang::get('setting::app.company name') !!}</label>
							<div class="col-sm-10">
								{!! Form::text('company_name',Setting::get_key('company_name'), ['class' => 'form-control input-md','id'=>'company_name','placeholder'=>lang::get('setting::app.company name'),'maxlength'=>100]) !!}
							</div>
						</div>
						<div class="form-group">
							<label for="#" class="col-sm-2 control-label text-left">{!! Lang::get('setting::app.address') !!}</label>
							<div class="col-sm-10">
								{!! Form::textarea('company_address',Setting::get_key('company_address'), ['class' => 'form-control input-md','id'=>'company_address','placeholder'=>lang::get('setting::app.address'),'maxlength'=>100,'rows' => 5]) !!}
							</div>
						</div>
						<div class="form-group">
							<label for="#" class="col-sm-2 control-label text-left">{!! Lang::get('setting::app.city') !!}</label>
							<div class="col-sm-10">
								{!! Form::text('company_city',Setting::get_key('company_city'), ['class' => 'form-control input-md','id'=>'company_city','placeholder'=>lang::get('setting::app.city'),'maxlength'=>100]) !!}
							</div>
						</div>
						<div class="form-group">
							<label for="#" class="col-sm-2 control-label text-left">{!! Lang::get('setting::app.country') !!}</label>
							<div class="col-sm-10">
								{!! Form::text('company_country',Setting::get_key('company_country'), ['class' => 'form-control input-md','id'=>'company_country','placeholder'=>lang::get('setting::app.country'),'maxlength'=>100]) !!}
							</div>
						</div>
						<div class="form-group">
							<label for="#" class="col-sm-2 control-label text-left">{!! Lang::get('setting::app.phone') !!}</label>
							<div class="col-sm-10">
								{!! Form::text('company_phone_number',Setting::get_key('company_phone_number'), ['class' => 'form-control input-md','id'=>'company_phone_number','placeholder'=>lang::get('setting::app.phone'),'maxlength'=>100]) !!}
							</div>
						</div>
						<div class="form-group">
							<label for="#" class="col-sm-2 control-label text-left">{!! Lang::get('setting::app.fax') !!}</label>
							<div class="col-sm-10">
								{!! Form::text('company_fax_number',Setting::get_key('company_fax_number'), ['class' => 'form-control input-md','id'=>'company_fax_number','placeholder'=>lang::get('setting::app.fax'),'maxlength'=>100]) !!}
							</div>
						</div>
						<div class="form-group">
							<label for="#" class="col-sm-2 control-label text-left">{!! Lang::get('setting::app.email') !!}</label>
							<div class="col-sm-10">
								{!! Form::text('company_email',Setting::get_key('company_email'), ['class' => 'form-control input-md','id'=>'company_email','placeholder'=>lang::get('setting::app.email'),'maxlength'=>100]) !!}
							</div>
						</div>
						<div class="form-group">
							<label for="#" class="col-sm-2 control-label text-left">{!! Lang::get('setting::app.facebook account') !!}</label>
							<div class="col-sm-10">
								{!! Form::text('social_facebook',Setting::get_key('social_facebook'), ['class' => 'form-control input-md','id'=>'social_facebook','placeholder'=>lang::get('setting::app.facebook account'),'maxlength'=>100]) !!}
							</div>
						</div>
						<div class="form-group">
							<label for="#" class="col-sm-2 control-label text-left">{!! Lang::get('setting::app.gplus account') !!}</label>
							<div class="col-sm-10">
								{!! Form::text('social_gplus',Setting::get_key('social_gplus'), ['class' => 'form-control input-md','id'=>'social_gplus','placeholder'=>lang::get('setting::app.gplus account'),'maxlength'=>100]) !!}
							</div>
						</div>
						<div class="form-group">
							<label for="#" class="col-sm-2 control-label text-left">{!! Lang::get('setting::app.linkedin account') !!}</label>
							<div class="col-sm-10">
								{!! Form::text('social_linkedin',Setting::get_key('social_linkedin'), ['class' => 'form-control input-md','id'=>'social_linkedin','placeholder'=>lang::get('setting::app.linkedin account'),'maxlength'=>100]) !!}
							</div>
						</div>
						<div class="form-group">
							<label for="#" class="col-sm-2 control-label text-left">{!! Lang::get('setting::app.twitter account') !!}</label>
							<div class="col-sm-10">
								{!! Form::text('social_twitter',Setting::get_key('social_twitter'), ['class' => 'form-control input-md','id'=>'social_twitter','placeholder'=>lang::get('setting::app.twitter account'),'maxlength'=>100]) !!}
							</div>
						</div>
						<div class="form-group">
							<label for="#" class="col-sm-2 control-label text-left">{!! Lang::get('setting::app.meta author') !!}</label>
							<div class="col-sm-10">
								{!! Form::text('meta_author',Setting::get_key('meta_author'), ['class' => 'form-control input-md','id'=>'meta_author','placeholder'=>lang::get('setting::app.meta author'),'maxlength'=>100]) !!}
							</div>
						</div>
						<div class="form-group">
							<label for="#" class="col-sm-2 control-label text-left">{!! Lang::get('setting::app.meta keyword') !!}</label>
							<div class="col-sm-10">
								{!! Form::text('meta_keyword',Setting::get_key('meta_keyword'), ['class' => 'form-control input-md','id'=>'meta_keyword','placeholder'=>lang::get('setting::app.meta keyword'),'maxlength'=>255]) !!}
							</div>
						</div>
						<div class="form-group">
							<label for="#" class="col-sm-2 control-label text-left">{!! Lang::get('setting::app.meta content') !!}</label>
							<div class="col-sm-10">
								{!! Form::textarea('meta_content',Setting::get_key('meta_content'), ['class' => 'form-control input-md','id'=>'meta_content','placeholder'=>lang::get('setting::app.meta content'),'maxlength'=>255]) !!}
							</div>
						</div>
						<div class="form-group">
							<label for="#" class="col-sm-2 control-label text-left">{!! Lang::get('setting::app.limit page') !!}</label>
							<div class="col-sm-2">
								{!! Form::text('limit_page',Setting::get_key('limit_page'), ['class' => 'form-control input-md','id'=>'limit_page','placeholder'=>lang::get('setting::app.limit page'),'maxlength'=>255]) !!}
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
			$('#setting_form').on('submit', function(event) {
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
