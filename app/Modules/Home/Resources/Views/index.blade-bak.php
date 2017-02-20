@extends('kreston::home')
@section('home-banner')
	<div class="slider progressive-slider load">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-12">
							<!--<ul class="pgwSlideshow">
								@foreach($home_banners as $key => $row)
									<li><img src="{!! url($row->storage_location) !!}" alt="{!! $row->name !!}" data-description="{!! $row->description !!}"></li>
								@endforeach
							</ul>-->
								<div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 800px; height: 530px; overflow: hidden; visibility: hidden; background-color: #24262e;">
									<!-- Loading Screen -->
									<div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
										<div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
										<div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
									</div>
									<div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 800px; height: 450px; overflow: hidden;">
										<a data-u="any" href="http://www.kreston-indonesia.co.id" style="display:none">{!! Lang::get('global.armada') !!}</a>
										@foreach($home_banners as $key => $row)
										<div data-p="144.50">
											<img data-u="image" src="{!! url($row->storage_location) !!}" alt="{!! $row->name !!}" data-description="{!! $row->description !!}" />
											<img data-u="thumb" src="{!! url($row->storage_location) !!}" alt="{!! $row->name !!}" data-description="{!! $row->description !!}" />
										</div>
										@endforeach
									</div>
									<!-- Thumbnail Navigator -->
									<div data-u="thumbnavigator" class="jssort01" style="position:absolute;left:0px;bottom:0px;width:800px;height:80px;" data-autocenter="1">
										<!-- Thumbnail Item Skin Begin -->
										<div data-u="slides" style="cursor: default;">
											<div data-u="prototype" class="p">
												<div class="w">
													<div data-u="thumbnailtemplate" class="t"></div>
												</div>
												<div class="c"></div>
											</div>
										</div>
										<!-- Thumbnail Item Skin End -->
									</div>
									<!-- Arrow Navigator -->
									<span data-u="arrowleft" class="jssora05l" style="top:158px;left:8px;width:40px;height:40px;"></span>
									<span data-u="arrowright" class="jssora05r" style="top:158px;right:8px;width:40px;height:40px;"></span>
								</div>
								<!-- #endregion Jssor Slider End -->
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="content" style="background:#fff;padding:15px;margin-top:20px;margin-bottom:10px">
								<h1 class="title">Welcome to Kreston Indonesia</h1>
								{!! isset($welcome) ? $welcome->short_content : null !!}
							</div>
						</div>
					</div>	
					
				</div>
				<div class="col-md-3 latest-post">
					<!-- Nav tabs -->
					<div class="card">
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#news" aria-controls="news" role="tab" data-toggle="tab">{!! Lang::get('action.news') !!}</a></li>
                            <li role="presentation"><a href="#article" aria-controls="article" role="tab" data-toggle="tab">{!! Lang::get('action.article') !!}</a></li>
							<li role="presentation"><a href="#publication" aria-controls="publication" role="tab" data-toggle="tab">{!! Lang::get('action.publication') !!}</a></li>
                        </ul>
						<!-- Tab panes -->
                       <div class="tab-content" style="padding:5px 10px;">
                           <div role="tabpanel" class="tab-pane active" id="news">
								<ul class="most__wrap clearfix">
									
									@foreach($latest_news as $key => $news)
									<li class="most__item">
										<div class="most__num">{!! ($key + 1) !!}</div>
										<div class="most__title">
											<a target="_blank" class="latest-post" href="{!! url('news/read/'.$news->id.'/'.Str::slug($news->title,'-')) !!}" data-toggle="tooltip" title="{!! $news->title !!}"> {!! str_limit($news->title,35,'') !!} </a>
										</div>	
										
									</li>
									@endforeach
								</ul>
							</div>
                            <div role="tabpanel" class="tab-pane" id="article">
								<ul class="most__wrap clearfix">
									@foreach($latest_article as $key => $article)
									<li class="most__item">
										<div class="most__num">{!! ($key + 1) !!}</div>
										<div class="most__title">
											<a class="latest-post" href="{!! url('article/read/'.$article->id.'/'.Str::slug($article->title,'-')) !!}" data-toggle="tooltip" title="{!! $article->title !!}"> {!! str_limit($article->title,35,'') !!} </a>
										</div>	
										<!--<span class="most__info">Reading : {!! $article->total_view !!} viewer</span>-->
									</li>
									@endforeach
								</ul>
							</div>
							<div role="tabpanel" class="tab-pane" id="publication">
								<ul class="most__wrap clearfix">
									@foreach($latest_publications as $key => $pub)
									<li class="most__item">
										<div class="most__num">{!! ($key + 1) !!}</div>
										<div class="most__title">
											<a target="_blank" class="latest-post" href="{!! url($pub->storage_location) !!}" data-toggle="tooltip" title="{!! $pub->title !!}"> {!! str_limit($pub->title,35,'') !!} </a>
										</div>	
										
									</li>
									@endforeach
								</ul>
							</div>
                        </div>
					</div>
					
					<div class="banner" style="margin-top:20px;">
						<div class="row">
							@foreach($advertisings as $key => $row)
							<div class="col-md-12">
								<div class="panel panel-primary">
									<div class="panel-heading">{!! $row->name !!}</div>
									<div class="panel-body" style="padding:0px">
										<img class="img-responsive" style="width:100%" src="{!! asset($row->storage_location) !!}" />
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					
				</div>
			</div>			
		</div>
	</div>
	@include('home::popup-banner')
@endsection


@push('css')
	<!--<link rel='stylesheet' href="{!! asset('vendor/pgwslideshow/pgwslideshow.min.css') !!}">
	<link rel='stylesheet' href="{!! asset('vendor/pgwslideshow/pgwslideshow_light.min.css') !!}">-->
	<link rel="stylesheet" href="{!! asset('vendor/perfect-scrollbar/css/perfect-scrollbar.min.css') !!}">
	<style>
		/* jssor slider arrow navigator skin 05 css */
		/*
		.jssora05l                  (normal)
		.jssora05r                  (normal)
		.jssora05l:hover            (normal mouseover)
		.jssora05r:hover            (normal mouseover)
		.jssora05l.jssora05ldn      (mousedown)
		.jssora05r.jssora05rdn      (mousedown)
		.jssora05l.jssora05lds      (disabled)
		.jssora05r.jssora05rds      (disabled)
		*/
		.jssora05l, .jssora05r {
			display: block;
			position: absolute;
			/* size of arrow element */
			width: 40px;
			height: 40px;
			cursor: pointer;
			background: url('{!! asset("vendor/jslider/img/a17.png") !!}') no-repeat;
			overflow: hidden;
		}
		.jssora05l { background-position: -10px -40px; }
		.jssora05r { background-position: -70px -40px; }
		.jssora05l:hover { background-position: -130px -40px; }
		.jssora05r:hover { background-position: -190px -40px; }
		.jssora05l.jssora05ldn { background-position: -250px -40px; }
		.jssora05r.jssora05rdn { background-position: -310px -40px; }
		.jssora05l.jssora05lds { background-position: -10px -40px; opacity: .3; pointer-events: none; }
		.jssora05r.jssora05rds { background-position: -70px -40px; opacity: .3; pointer-events: none; }
		/* jssor slider thumbnail navigator skin 01 css *//*.jssort01 .p            (normal).jssort01 .p:hover      (normal mouseover).jssort01 .p.pav        (active).jssort01 .p.pdn        (mousedown)*/.jssort01 .p {    position: absolute;    top: 0;    left: 0;    width: 125px;    height: 75px;}.jssort01 .t {    position: absolute;    top: 0;    left: 0;    width: 100%;    height: 100%;    border: none;}.jssort01 .w {    position: absolute;    top: 0px;    left: 0px;    width: 100%;    height: 100%;}.jssort01 .c {    position: absolute;    top: 0px;    left: 0px;    width: 125px;    height: 87px;    border: #000 2px solid;    box-sizing: content-box;    background: url('{!! asset("vendor/jslider/img/t01.png") !!}') -800px -800px no-repeat;    _background: none;}.jssort01 .pav .c {    top: 2px;    _top: 0px;    left: 2px;    _left: 0px;    width: 68px;    height: 68px;    border: #000 0px solid;    _border: #fff 2px solid;    background-position: 50% 50%;}.jssort01 .p:hover .c {    top: 0px;    left: 0px;    width: 70px;    height: 70px;    border: #fff 1px solid;    background-position: 50% 50%;}.jssort01 .p.pdn .c {    background-position: 50% 50%;    width: 68px;    height: 68px;    border: #000 2px solid;}* html .jssort01 .c, * html .jssort01 .pdn .c, * html .jssort01 .pav .c {    /* ie quirks mode adjust */    width /**/: 72px;    height /**/: 72px;}
	</style>
@endpush
@push('scripts')
	<!--<script src="{!! asset('vendor/pgwslideshow/pgwslideshow.min.js') !!}"></script>
	-->
	<script src="{!! asset('vendor/jslider/jssor.slider-22.0.6.mini.js') !!}" type="text/javascript"></script>
	<script src="{!! asset('vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js') !!}"></script>
	<script>
	$(document).ready(function() {
		var jssor_1_SlideshowTransitions = [
			{$Duration:1200,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
			{$Duration:1200,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
			{$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
			{$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
			{$Duration:1200,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
			{$Duration:1200,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
			//{$Duration:1200,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
			//{$Duration:1200,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
			//{$Duration:1200,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},

		];

		var jssor_1_options = {
			$AutoPlay: true,
			$SlideshowOptions: {
				$Class: $JssorSlideshowRunner$,
				$Transitions: jssor_1_SlideshowTransitions,
				$TransitionsOrder: 1
			},
			$ArrowNavigatorOptions: {
				$Class: $JssorArrowNavigator$
			},
			$ThumbnailNavigatorOptions: {
				$Class: $JssorThumbnailNavigator$,
				$Cols: 10,
				$SpacingX: 8,
				$SpacingY: 8,
				$Align: 360
			}
		};

		var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

		/*responsive code begin*/
		/*you can remove responsive code if you don't want the slider scales while window resizing*/
		function ScaleSlider() {
			var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
			if (refSize) {
				refSize = Math.min(refSize, 800);
				jssor_1_slider.$ScaleWidth(refSize);
			}
			else {
				window.setTimeout(ScaleSlider, 30);
			}
		}
		ScaleSlider();
		$(window).bind("load", ScaleSlider);
		$(window).bind("resize", ScaleSlider);
		$(window).bind("orientationchange", ScaleSlider);

		$.get("{!! url('/home/popup-banner') !!}", function(response) {
			if(response.is_popup_banner == true) {
				$('#popup-banner').modal('show');
			} else {
				$('#popup-banner').modal('hide');
			}
		},"json");


		/*$('.pgwSlideshow').pgwSlideshow({
		 maxHeight:550,
		 autoSlide:true,
		 });*/

		$('[data-toggle="tooltip"]').tooltip({
			placement:"bottom",
		});
		$('.tab-content').perfectScrollbar();
	});
</script
@endpush


