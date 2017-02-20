@extends('kreston::search')

@section('content')
    <div class="row">
      <div class="content search-result list col-sm-12 col-md-12">
		<form class="search-form" method="GET" action="{!! url('search/') !!}">
		  <input class="search-string form-control" type="search" placeholder="Search here" name="q" value="{!! Request::get('q') !!}">
		  <button class="search-submit">
			<svg x="0" y="0" width="16px" height="16px" viewBox="0 0 16 16" enable-background="new 0 0 16 16" xml:space="preserve">
			  <path fill="#231F20" d="M12.001,10l-0.5,0.5l-0.79-0.79c0.806-1.021,1.29-2.308,1.29-3.71c0-3.313-2.687-6-6-6C2.687,0,0,2.687,0,6
			  s2.687,6,6,6c1.402,0,2.688-0.484,3.71-1.29l0.79,0.79l-0.5,0.5l4,4l2-2L12.001,10z M6,10c-2.206,0-4-1.794-4-4s1.794-4,4-4
			  s4,1.794,4,4S8.206,10,6,10z"></path>
			</svg>
		  </button>
		</form>
		
		<div class="filter-box">
		  <div class="filter-elements">
			@if($posts)
				@foreach($posts as $key => $post)
				<article class="post item">
				  <h2 class="entry-title"><a href="{!! url($post->url) !!}">{!! $post->title !!}</a></h2>
				  <div class="entry-content">
					{!! str_limit(App\Helpers\Text::only_text($post->content), $limit = 600, $end = '...') !!}  
				</div>
				  
				</article><!-- .post -->
				@endforeach
			@endif
		  </div>
		</div><!-- .filter-box -->
		
		<div class="pagination-box">
			
		</div><!-- .pagination-box -->
      </div><!-- .content -->
    </div>
@endsection


