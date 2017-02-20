@extends('kreston::contact-us')
@section('breadcrumbs', Breadcrumbs::render($index))
@section('content')
	<div id="full-width-box-pricing-second" class="full-width-box">
	  <div class="fwb-bg fwb-fixed band-2"><div class="overlay"></div></div>
	  
	  <div class="container">
		<div class="row">
			@foreach($contacts as $key => $contact)
			 <div class="col-sm-4 col-md-4 contact-list">
				<div class="package">
				  <div class="title"><a href="#">{!! $contact->name !!}</a></div>
					<div class="price-box">
						<div class="icon bg-white rounded pull-right"><i class="fa fa-map-marker"></i></div>
						<div class="description">
							{!! $contact->address !!} 
						</div>	
					
						<!--<div class="price">$contact->contact_name </div>-->
					
						<div class="starting"><i class="fa fa-map-marker"></i> {!! $contact->city !!} {!! $contact->zip_code !!}</div>
						<div class="starting"><i class="fa fa-flag"></i> {!! $contact->country !!} </div>
						<div class="starting"><i class="fa fa-phone"></i> {!! $contact->phone_number !!} </div>
						<div class="starting"><i class="fa fa-fax"></i> {!! $contact->fax_number !!} </div>
						<div class="starting"><i class="fa fa-envelope"></i> {!! $contact->email !!} </div>
						<div class="starting"><i class="fa fa-globe"></i> {!! $contact->website !!} </div>
						
						<p style="margin-top:5px" class="text-center">
							<a class="btn btn-sm btn-primary" href="mailto:{!! $contact->email !!}"><i class="fa fa-envelope"></i> {!! Lang::get('people::app.send email') !!}</a>
						</p>
					
					</div>
				</div><!-- .package -->
			 </div>
			@endforeach 
		  
		  
		</div>
	  </div>
	</div><!-- .full-width-box -->
	
	<div class="slider progressive-slider load">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div id="map" style="width: 100%; height: 900px;"></div>
				</div>
			</div>
		</div>
	</div>		
	
	
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
			$("#map").googleMap();
			$("#map").addMarker({
				coords: [-6.296486,106.829910], // GPS coords
				title: '{!! "Jakarta - Simatupang Office" !!}', // Title
				text:  '<a class="btn btn-sm btn-primary" href="mailto:hest-tbsimatupang@kreston-indonesia.co.id">{!! Lang::get("contact-us::app.send email") !!}</a>' // HTML content
			});
			
			$("#map").addMarker({
				coords: [-6.213998, 106.817567], // GPS coords
				title: '{!! "Jakarta - Sudirman Office" !!}', // Title
				text:  '<a class="btn btn-sm btn-primary" href="mailto:hes-sudirman@kreston-indonesia.co.id">{!! Lang::get("contact-us::app.send email") !!}</a>' // HTML content
			});
			
			$("#map").addMarker({
				coords: [3.584931, 98.677776], // GPS coords
				title: '{!! "Medan - Medan Office" !!}', // Title
				text:  '<a class="btn btn-sm btn-primary" href="mailto:hes-medan@kreston-indonesia.co.id">{!! Lang::get("contact-us::app.send email") !!}</a>' // HTML content
			});
			
			$("#map").addMarker({
				coords: [-7.291325, 112.717398], // GPS coords
				title: '{!! "Surabaya - Surabaya Office" !!}', // Title
				text:  '<a class="btn btn-sm btn-primary" href="mailto:hes-surabaya@kreston-indonesia.co.id">{!! Lang::get("contact-us::app.send email") !!}</a>' // HTML content
			});
			
			$("#map").addMarker({
				coords: [-7.771829, 110.408861], // GPS coords
				title: '{!! "Yogyakarta - Yogyakarta Office" !!}', // Title
				text:  '<a class="btn btn-sm btn-primary" href="mailto:hes-yogyakarta@kreston-indonesia.co.id">{!! Lang::get("contact-us::app.send email") !!}</a>' // HTML content
			});
			
			$("#map").addMarker({
				coords: [22.281317, 114.158269], // GPS coords
				title: '{!! "Asia Pasific - Asia Pasific Office" !!}', // Title
				text:  '<a class="btn btn-sm btn-primary" href="mailto:edmon_chan@kreston.com">{!! Lang::get("contact-us::app.send email") !!}</a>' // HTML content
			});
			
			$("#map").addMarker({
				coords: [51.747947, 0.510950], // GPS coords
				title: '{!! "International - International Office" !!}', // Title
				text:  '<a class="btn btn-sm btn-primary" href="mailto:jon@kreston.com">{!! Lang::get("contact-us::app.send email") !!}</a>' // HTML content
			});
			
			$("#map").addMarker({
				coords: [42.368371, -83.373096], // GPS coords
				title: '{!! "America - America Office" !!}', // Title
				text:  '' // HTML content
			});
			
			
		});
	</script>
@endpush


