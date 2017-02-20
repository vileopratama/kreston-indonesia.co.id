@extends('kreston::post')
@section('breadcrumbs', Breadcrumbs::render('article'))
@section('content')
    <div class="row">
      <div class="content blog col-sm-9 col-md-9">
		@foreach($posts as $key => $post)
			<article class="post">
			  <h2 class="entry-title"><a href="{!! url('article/read/'.$post->id.'/'.Str::slug($post->title,'-')) !!}">{!! $post->title !!}</a></h2>
			  <div class="entry-content">
				<div class="row">
					<div class="col-md-3">
						<img src="{!! \App\Helpers\Img::show($post->content) !!}"  class="img-responsive"/>
					</div>
					<div class="col-md-9">
					{!! str_limit(App\Helpers\Text::only_text($post->content), $limit = 600, $end = '...') !!}
					</div>
				</div>	
			  </div>
			  <!--<footer class="entry-meta">
				<span class="autor-name">Mike Example</span>,
				<span class="time">03.11.2012</span>
				<span class="separator">|</span>
				<span class="meta">Posted in <a href="#">Sports</a>, <a href="#">Movies</a></span>
				<span class="comments-link pull-right">
				  <a href="#"><i class="fa fa-comment"></i> 3 comment(s)</a>
				</span>
			  </footer>-->
			</article><!-- .post -->
		@endforeach
		
		

		<div class="pagination-box">
		  {!! $posts->appends(\Request::except('page'))->render() !!}
		</div><!-- .pagination-box -->
      </div><!-- .content -->
	  
      <div id="sidebar" class="sidebar col-sm-3 col-md-3">
		<aside class="widget list">
		  <header>
			<h3 class="title">{!! Lang::get('article::app.category') !!}</h3>
		  </header>
		  <ul>
			@foreach($categories as $key => $category)
				<li><a href="{!! url('article/category/'.$category->slug) !!}">{!! $category->name !!}</a></li>
			@endforeach
		  </ul>
		</aside><!-- .list -->
		
		
		<aside class="widget list">
		  <header>
			<h3 class="title">{!! Lang::get('news::app.archieves') !!}</h3>
		  </header>
		  <ul>
			@foreach($post_archieves as $key => $row)
				<li class="active"><a href="{!! url('article/archieve/'.$row->url) !!}">{!! $row->periode !!}</a></li>
			@endforeach

		  </ul>
		</aside><!-- .list -->
		
		
	  </div><!-- .sidebar -->
    </div>
@endsection


