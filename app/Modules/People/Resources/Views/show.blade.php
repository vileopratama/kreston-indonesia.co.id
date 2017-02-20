@extends('kreston::page')
@section('breadcrumbs', Breadcrumbs::render('people-single',$people->slug))
@section('content')
    <div class="row">
		<article class="content col-sm-12 col-md-9">
			<h1 class="title">{!! isset($people) ? $people->name : null !!}</h1>
			<img src="{!! url($people->photo_storage_location ? $people->photo_storage_location : Config::get('site.no-image')) !!}" style="float:left;margin:0 20px 20px" />
			{!! $people->description !!}
			
			@if($people->email)
			<p style="margin-top:5px">
				<a class="btn btn-sm btn-primary" href="mailto:{!! $people->email !!}"><i class="fa fa-envelope"></i> {!! Lang::get('people::app.send email') !!}</a>
			</p>
			@endif
			
		  </article><!-- .content -->
		  
        <div id="sidebar" class="sidebar col-sm-12 col-md-3">
            <aside class="widget menu">
                <header>
                    <h3 class="title">{!! Lang::get('people::app.our people') !!}</h3>
                </header>
                <nav>
                    <ul>
						@include('kreston::our-people-links', array('items' => $our_partner_links->roots()))
                    </ul>
                </nav>
            </aside><!-- .menu-->
        </div><!-- .sidebar -->
    </div>
@endsection


