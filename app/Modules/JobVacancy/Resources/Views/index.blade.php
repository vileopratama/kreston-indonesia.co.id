@extends('kreston::page')
@section('breadcrumbs', Breadcrumbs::render($index))
@section('content')
	<div class="row">
      <div id="catalog" class="content col-sm-12 col-md-9">
		<!--<div class="toolbar clearfix">
		  <div class="sort-catalog">
			<div class="btn-group sort-by btn-select">
			  <a class="btn dropdown-toggle btn-default" role="button" data-toggle="dropdown" href="#">Sort by: <span>Rating</span> <span class="caret"></span></a>
			  <ul class="dropdown-menu">
				<li><a href="#">Rating</a></li>
				<li><a href="#">Name</a></li>
			  </ul>
			</div><!-- .sort-by
			<button type="button" class="btn up-down btn-default" data-toggle="button"><span></span></button>
		  </div><!-- .sort-catalog 
		  
		  <div class="sort-catalog">
			<div class="btn-group show-by btn-select">
			  <a class="btn dropdown-toggle btn-default" role="button" data-toggle="dropdown" href="#">Show: <span>12</span> <span class="caret"></span></a>
			  <ul class="dropdown-menu">
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#">6</a></li>
				<li><a href="#">7</a></li>
				<li><a href="#">8</a></li>
				<li><a href="#">9</a></li>
				<li><a href="#">10</a></li>
				<li><a href="#">11</a></li>
				<li><a href="#">12</a></li>
			  </ul>
			</div><!-- .show 
			<span class="per-page">per page</span>
		  </div><!-- .sort-catalog 
		  
		  
		</div>
		
		<div class="clearfix"></div>-->
		
		<div class="products list row">
			@foreach($jobs as $key => $job)
			<div class="product">
				<div class="col-sm-12 col-md-12">
				  <h3 class="product-name"><a href="{!! url('job-vacancy/read/'.$job->id.'/'.Str::slug($job->name,'-')) !!}">{!! $job->name !!}</a></h3>
				  <div class="reviews-box">
					<span> <i class="fa fa-calendar"> </i> {!! $job->due_date !!}</span>
					<span class="separator">|</span>
					<span> <i class="fa fa-map-marker"> </i> {!! $job->location !!}</span>
					<span class="separator">|</span>
					<a href="{!! url('job-vacancy/read/'.$job->id.'/'.Str::slug($job->name,'-')) !!}" class="add-review"> <i class="fa fa-user"> </i> {!! $job->position !!}</a>
				  </div>
				  <div class="excerpt">
				  {!! str_limit($job->description,500,'...') !!}	
				  </div>
				</div>
			</div><!-- .product -->
			@endforeach
		 
		</div><!-- .products -->
		
		<div class="pagination-box">
		  {!! $jobs->appends(\Request::except('page'))->render() !!}
		</div><!-- .pagination-box -->
      </div><!-- .content -->
      
      <div id="sidebar" class="sidebar col-sm-12 col-md-3">
		<aside class="widget menu">
		 <header>
			<h3 class="title">Search Criteria</h3>
		  </header>
		  <div class="row">
			<div class="col-md-12">
				 {!! Form::open(['url' => '/job-vacancy','role' => 'form','id'=>'search_form','method'=>'get']) !!}
					  <div class="form-group">
						{!! Form::text('q',Request::get('q'),['class' => 'form-control input-md','id'=>'q','placeholder'=>lang::get('action.keyword'),'maxlength'=>100]) !!}
					  </div>
					  <div class="form-group">
						{!! Form::text('location',Request::get('location'),['class' => 'form-control input-md','id'=>'location','placeholder'=>lang::get('action.location'),'maxlength'=>100]) !!}
					  </div>
					  <button type="submit" class="btn btn-default btn-block"><i class="fa fa-search"></i> {!! Lang::get('action.search') !!}</button>
				{!! Form::close() !!}
			</div>
		  </div>
		</aside><!-- .menu-->
		
		
		<!--<aside class="widget menu">
		  <header>
			<h3 class="title">Division</h3>
		  </header>
		  <nav>
			<ul>
			  <li><a href="#">Divisi Audit</a></li>
			  <li><a href="#">Administrasi Umum</a></li>
			  <li><a href="#">Finance & Accounting</a></li>
			</ul>
		  </nav>
		</aside>menu-->
		
	  </div>
    </div>
@endsection

@push('css')
	<link rel="stylesheet" href="{!! Theme::asset('css/jquery.fancybox.css') !!}">
@endpush
@push('scripts')
	<script src="{!! Theme::asset('js/jquery.fancybox.pack.js') !!}"></script>
@endpush


