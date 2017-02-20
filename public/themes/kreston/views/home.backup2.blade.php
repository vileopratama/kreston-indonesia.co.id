@include('kreston::header')
@yield("home-banner")
<section id="main">
  <article class="content">	
	<div class="container">
		@yield('content')

	</div>
  </article>
</section><!-- #main -->

@yield("latest-post")

</div><!-- .page-box-content -->
</div><!-- .page-box -->

@include('kreston::footer')