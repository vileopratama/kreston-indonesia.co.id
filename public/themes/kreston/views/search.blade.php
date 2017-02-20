@include('kreston::header')
<div class="breadcrumb-box">
    <div class="container">
        @yield('breadcrumbs')
    </div>
</div>

<section id="main">
	<header class="page-header">
    <div class="container">
      <h3 class="title">{!! Lang::get('app.search result') !!}</h3>
    </div>	
  </header>
    <div class="container">
        @yield('content')
    </div>

</section><!-- #main -->

</div><!-- .page-box-content -->
</div><!-- .page-box -->

@include('kreston::footer')