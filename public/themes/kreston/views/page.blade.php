@include('kreston::header')
<div class="breadcrumb-box">
    <div class="container">
        @yield('breadcrumbs')
    </div>
</div>

<section id="main">
    <div class="container">
        @yield('content')
    </div>

</section><!-- #main -->

</div><!-- .page-box-content -->
</div><!-- .page-box -->

@include('kreston::footer')