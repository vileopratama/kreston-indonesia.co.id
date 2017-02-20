@extends('kreston::page')
@section('breadcrumbs', Breadcrumbs::render($index))
@section('content')
     <div class="row">
      <article class="content product-page col-sm-12 col-md-12">
		<div class="row">
		  <div class="col-sm-12 col-md-12">
			<h4 class="title">{!! $job->name !!}</h4>
			<div class="reviews-box">
				<span> <i class="fa fa-calendar"> </i> {!! $job->due_date !!}</span>
				<span class="separator">|</span>
				<span> <i class="fa fa-map-marker"> </i> {!! $job->location !!}</span>
				<span class="separator">|</span>
				<a href="{!! url('job-vacancy/read/'.$job->id.'/'.Str::slug($job->name,'-')) !!}" class="add-review"> <i class="fa fa-user"> </i> {!! $job->position !!}</a>
			  </div>
			<div class="description">
			  {!! $job->description !!}			
			 </div>
			
		  </div>
		</div>
		
		<div class="product-tab">
		  <ul class="nav nav-tabs">
			<li class="active"><a href="#description">Requirements</a></li>
			<li><a href="#reviews">Responsibilites</a></li>
			
		  </ul><!-- .nav-tabs -->	
		  <div class="tab-content">
			<div class="tab-pane active" id="description">
				{!! $job->requirements !!}	
			</div>
			<div class="tab-pane" id="reviews">
				{!! $job->responsibilities !!}	
			</div><!-- #reviews -->
			
		  </div><!-- .tab-content -->
		</div>
		  
		<div class="clearfix"></div>
		  
		
      </article><!-- .content -->
    </div>
@endsection


