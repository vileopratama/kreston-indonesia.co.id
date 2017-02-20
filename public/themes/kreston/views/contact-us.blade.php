@include('kreston::header')
<div class="breadcrumb-box">
    <div class="container">
        @yield('breadcrumbs')
    </div>
</div>

<section id="main">
    @yield('content')
</section><!-- #main -->

</div><!-- .page-box-content -->
</div><!-- .page-box -->

@include('kreston::footer')