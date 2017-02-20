@extends('kreston::contact-us')
@section('breadcrumbs', Breadcrumbs::render($index,$contact->slug))
@section('content')
	<header class="page-header">
    <div class="container">
      <h1 class="title">{!! $contact->name !!}</h1>
    </div>	
  </header>
  
	  <div class="container">
		<div class="row">
		  <div class="content col-sm-9 col-md-9">
			<div class="row">
				<div class="col-sm-12 col-md-12 contact-info">
					<div id="map" style="width: 100%; height: 250px;"></div>
				</div>
			</div>
			
			<div class="row">
			  <div class="col-sm-12 col-md-12 contact-info">
				<address>
				  <div class="title">{!! Lang::get('contact-us::app.address') !!}</div>
					  {!! $contact->address !!} {!! $contact->city !!} {!! $contact->zip_code !!} {!! $contact->country !!}
				</address>
				<div class="row">
				  <address class="col-sm-6 col-md-6">
					<div class="title">{!! Lang::get('contact-us::app.contact') !!}</div>
					<div>{!! Lang::get('contact-us::app.phone number') !!} : {!! $contact->phone_number !!}</div>
					<div>{!! Lang::get('contact-us::app.fax number') !!} : {!! $contact->fax_number !!}</div>
				  </address>
				  
				  <address class="col-sm-6 col-md-6">
					<div class="title">{!! Lang::get('contact-us::app.other contact') !!}</div>
					<div>{!! Lang::get('contact-us::app.email') !!} : {!! $contact->email !!}</div>
					<div>{!! Lang::get('contact-us::app.website') !!} : {!! $contact->website !!}</div>
				  </address>
				</div>
			</div>
			  
			  
			</div>
			
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<div id="divLoading"></div>
					<div class="panel panel-primary">
						<div class="panel-heading">{!! Lang::get('contact-us::app.contact us') !!}</div>
						<div class="panel-body">
							{!! Form::open(['url' => 'contact-us/sent-message','id'=>'sent_message_form','class'=>'form-horizontal']) !!}
								<div class="form-group">
									<label class="control-label col-sm-3 " for="email">{!! Lang::get('contact-us::app.message to') !!}</label>
									<div class="col-sm-9 ">
										{!! Form::select('contact_id',\App\Modules\ContactUs\Models\ContactUs::dropdown(),null, ['class' => 'form-control input-md','id'=>'contact_id']) !!}
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-sm-3 " for="email">{!! Lang::get('contact-us::app.name') !!}</label>
									<div class="col-sm-9 ">
										{!! Form::text('name',null, ['class' => 'form-control input-md','id'=>'name','placeholder'=>lang::get('contact-us::app.contact name'),'maxlength'=>100]) !!}
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-sm-3 " for="email">{!! Lang::get('contact-us::app.mobile number') !!}</label>
									<div class="col-sm-9 ">
										{!! Form::text('mobile_number',null, ['class' => 'form-control input-md','id'=>'mobile_number','placeholder'=>lang::get('contact-us::app.mobile number'),'maxlength'=>18]) !!}
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-sm-3 " for="email">{!! Lang::get('contact-us::app.email') !!}</label>
									<div class="col-sm-9 ">
										{!! Form::text('email',null, ['class' => 'form-control input-md','id'=>'email','placeholder'=>lang::get('contact-us::app.email'),'maxlength'=>100]) !!}
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-sm-3 " for="email">{!! Lang::get('contact-us::app.subject') !!}</label>
									<div class="col-sm-9">
										{!! Form::text('subject',null, ['class' => 'form-control input-md','id'=>'subject','placeholder'=>lang::get('contact-us::app.subject'),'maxlength'=>100]) !!}
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-sm-3" for="email">{!! Lang::get('contact-us::app.message') !!}</label>
									<div class="col-sm-9">
										{!! Form::textarea('message',null, ['class' => 'form-control input-md','id'=>'message','rows' => 4,'placeholder'=>lang::get('contact-us::app.message')]) !!}
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-12">
										<div class="pull-right">
											{!! app('captcha')->display() !!}
										</div>
									</div>
								</div>

								<div class="form-group"> 
									<div class="col-sm-12">
										<div class="pull-right">
											<button type="submit" class="btn btn-primary">{!! Lang::get('contact-us::app.sent message') !!}</button>
										</div>
									</div>
								</div>
							{!! Form::close() !!}
						</div>
					</div>
					
				</div>
			</div>
				
		  </div>
		  
		  <div id="sidebar" class="sidebar col-sm-3 col-md-3">
			<aside class="widget list">
			  <header>
				<h3 class="title">{!! Lang::get('contact-us::app.contact us') !!}</h3>
			  </header>
			  <ul>
				@foreach($contacts as $key => $row)
					<li class="{!! Request::segment(3) == $row->slug ? 'active' : '' !!}"><a href="{!! url('contact-us/office/'.$row->slug) !!}">{!! $row->name !!}</a></li>
				@endforeach

			  </ul>
			</aside><!-- .list -->
	  </div><!-- .sidebar -->
	  
    </div>
  </div><!-- .container -->
@endsection

@push('css')
	<link rel="stylesheet" href="{!! Theme::asset('css/jquery.fancybox.css') !!}">
@endpush
@push('scripts')
	<script src="{!! Theme::asset('js/jquery.fancybox.pack.js') !!}"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVfOh9VeewmtadNfwyNKDFDIMH5-D3ACU"></script>
	<script src="{!! asset('vendor/jquery-googlemap/jquery.googlemap.js') !!}"></script>
	<script type="text/javascript">
		$(function() {
			$('#sent_message_form').on('submit', function(event) {
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
						$("#divLoading").removeClass('show');
						if(response.success == false) {
							$(".help-block").remove();
							$.each(response.message, function( index,message) {
								var element = $('<p>' + message + '</p>').attr({'class' : 'help-block text-danger'}).css({display: 'none'});
								$('#'+index).after(element);
								$(element).fadeIn();
							});
						} else {
							$(".help-block").remove();
							$("input[type='text']").val('');
							$('textarea').val('');
							$.alert(response.message);
						}
						
					},
					error : function() {
						$("#divLoading").removeClass('show');
					}
				});
				return false;
			});
			
			$("#map").googleMap();
			var url      = "{!! Request::segment(3) !!}";    
			
			if(url == 'jakarta-simatupang-office') {
				$("#map").addMarker({
					zoom: 50, // Initial zoom level (optional)
					coords: [-6.296486,106.829910], // GPS coords
					title: '{!! "Jakarta - Simatupang Office" !!}', // Title
					text:  '<a class="btn btn-sm btn-primary" href="mailto:hest-tbsimatupang@kreston-indonesia.co.id">{!! Lang::get("contact-us::app.send email") !!}</a>' // HTML content
				});
			}
			
			if(url == 'jakarta-sudirman-office') {
				$("#map").addMarker({
					coords: [-6.213998, 106.817567], // GPS coords
					title: '{!! "Jakarta - Sudirman Office" !!}', // Title
					text:  '<a class="btn btn-sm btn-primary" href="mailto:hes-sudirman@kreston-indonesia.co.id">{!! Lang::get("contact-us::app.send email") !!}</a>' // HTML content
				});
			}
			
			if(url == 'medan-office') {
				$("#map").addMarker({
					coords: [3.584931, 98.677776], // GPS coords
					title: '{!! "Medan - Medan Office" !!}', // Title
					text:  '<a class="btn btn-sm btn-primary" href="mailto:hes-medan@kreston-indonesia.co.id">{!! Lang::get("contact-us::app.send email") !!}</a>' // HTML content
				});
			}
			
			if(url == 'surabaya-office') {
				$("#map").addMarker({
					coords: [-7.291325, 112.717398], // GPS coords
					title: '{!! "Surabaya - Surabaya Office" !!}', // Title
					text:  '<a class="btn btn-sm btn-primary" href="mailto:hes-surabaya@kreston-indonesia.co.id">{!! Lang::get("contact-us::app.send email") !!}</a>' // HTML content
				});
			}
			
			if(url == 'yogyakarta-office') {
				$("#map").addMarker({
					coords: [-7.771829, 110.408861], // GPS coords
					title: '{!! "Yogyakarta - Yogyakarta Office" !!}', // Title
					text:  '<a class="btn btn-sm btn-primary" href="mailto:hes-yogyakarta@kreston-indonesia.co.id">{!! Lang::get("contact-us::app.send email") !!}</a>' // HTML content
				});
			}
			
			if(url == 'asia-pacific') {
				$("#map").addMarker({
					coords: [22.281317, 114.158269], // GPS coords
					title: '{!! "Asia Pasific - Asia Pasific Office" !!}', // Title
					text:  '<a class="btn btn-sm btn-primary" href="mailto:edmon_chan@kreston.com">{!! Lang::get("contact-us::app.send email") !!}</a>' // HTML content
				});
			}
			
			if(url == 'international-office') {
				$("#map").addMarker({
					coords: [51.747947, 0.510950], // GPS coords
					title: '{!! "International - International Office" !!}', // Title
					text:  '<a class="btn btn-sm btn-primary" href="mailto:jon@kreston.com">{!! Lang::get("contact-us::app.send email") !!}</a>' // HTML content
				});
			}	
			
			if(url == 'americas') {	
				$("#map").addMarker({
					coords: [42.368371, -83.373096], // GPS coords
					title: '{!! "America - America Office" !!}', // Title
					text:  '' // HTML content
				});
			}
			
			
		});
	</script>
@endpush


