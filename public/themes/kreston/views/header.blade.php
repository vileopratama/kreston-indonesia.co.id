<!doctype html>
<html>
<head>
    <meta charset="utf-8">
	{!! SEOMeta::generate() !!}
	{!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    <!--<meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Progressive � Responsive Multipurpose HTML Template">
    <meta name="author" content="itembridge.com">-->
    <meta class="viewport" name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Font -->
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Arimo:400,700,400italic,700italic'>
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{!! Theme::asset('kreston::css/bootstrap.css') !!}">
    <link rel="stylesheet" href="{!! Theme::asset('css/font-awesome.min.css') !!} ">
    <link rel="stylesheet" href="{!! Theme::asset('css/animate.css') !!} ">
    <!--<link rel="stylesheet" href="css/jslider.css">
    <link rel="stylesheet" href="css/revslider/settings.css">
    <link rel="stylesheet" href="css/jquery.fancybox.css">

    <link rel="stylesheet" href="css/video-js.min.css">
    <link rel="stylesheet" href="css/morris.css">
    <link rel="stylesheet" href="css/royalslider/royalslider.css">
    <link rel="stylesheet" href="css/royalslider/skins/minimal-white/rs-minimal-white.css">
    <link rel="stylesheet" href="css/layerslider/layerslider.css">
    <link rel="stylesheet" href="css/ladda.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="css/jquery.scrollbar.css">-->
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{!! Theme::asset('css/style.css') !!}">
    <!-- Custom CSS -->
	<link rel="stylesheet" href="{!! asset('vendor/jquery-confirm/jquery-confirm.min.css') !!}" />
    <link rel="stylesheet" href="{!! Theme::asset('css/customizer/pages.css') !!}" />
    <!--<link rel="stylesheet" href="{!! Theme::asset('css/customizer/shop-pages-customizer.css') !!}">-->
    <link rel="stylesheet" href="{!! Theme::asset('css/custom.css') !!}" />
    <!-- IE Styles-->
    <link rel='stylesheet' href="{!! Theme::asset('css/ie/ie.css') !!}">
    @stack('css')

    <!--[if lt IE 9]>
    <script src="{!! Theme::asset('js/html5shiv.js') !!}"></script>
    <script src="{!! Theme::asset('js/respond.min.js') !!}"></script>
    <link rel='stylesheet' href="{!! Theme::asset('css/ie/ie8.css') !!}">
    <![endif]-->
    <link rel="shortcut icon" type="image/x-icon" href="{!! Theme::asset('favicon.ico') !!}" />
    <link rel="icon" type="image/x-icon" href="{!! Theme::asset('favicon.ico') !!}" />

</head>
<body class="fixed-header">
<div class="page-box">
    <div class="page-box-content">

        <header class="header header-two">
            <div class="header-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-6 col-md-2 col-lg-2 logo-box">
                            <div class="logo">
                                <a href="{!! url("/") !!}">
                                    <img src="{!! Theme::asset('img/logo.png') !!}" class="logo-img" alt="">
                                </a>
                            </div>
                        </div><!-- .logo-box -->

                        <div class="col-xs-6 col-md-8 col-lg-8 right-box">
                            <div class="right-box-wrapper">
                                <div class="header-icons">
                                    <div class="search-header hidden-600">
                                        <a href="#">
                                            <svg x="0" y="0" width="16px" height="16px" viewBox="0 0 16 16" enable-background="new 0 0 16 16" xml:space="preserve">
					<path d="M12.001,10l-0.5,0.5l-0.79-0.79c0.806-1.021,1.29-2.308,1.29-3.71c0-3.313-2.687-6-6-6C2.687,0,0,2.687,0,6
					s2.687,6,6,6c1.402,0,2.688-0.484,3.71-1.29l0.79,0.79l-0.5,0.5l4,4l2-2L12.001,10z M6,10c-2.206,0-4-1.794-4-4s1.794-4,4-4
					s4,1.794,4,4S8.206,10,6,10z"></path>
                                                <image src="img/png-icons/search-icon.png" alt="" width="16" height="16" style="vertical-align: top;">
				  </svg>
                                        </a>
                                    </div><!--search-header-->


                                </div><!--header-icons -->

                                <div class="primary">
                                    <div class="navbar navbar-default" role="navigation">
                                        <button type="button" class="navbar-toggle btn-navbar collapsed" data-toggle="collapse" data-target=".primary .navbar-collapse">
                                            <span class="text">Menu</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                        @include('kreston::navbar')
                                    </div>
                                </div><!-- .primary -->
                            </div>
                        </div>

                        <div class="col-md-2 col-lg-2 logo-box hidden-xs">
                            <div class="pull-right">
                                <div class="logo">

                                    <a href="{!! url("/") !!}">
                                        <img src="{!! Theme::asset('img/logo1.png') !!}" class="logo-img" alt="">
                                    </a>
                                </div>
                            </div>
                        </div><!-- .logo-box -->

                        <div class="phone-active col-sm-9 col-md-9">
                            <a href="#" class="close"><span>close</span>�</a>
                            <span class="title">Call Us</span> <strong>+1 (777) 123 45 67</strong>
                        </div>
                        <div class="search-active col-sm-9 col-md-9">
                            <a href="#" class="close"><span>close</span>�</a>
                            <form name="search-form" class="search-form">
                                <input class="search-string form-control" type="search" placeholder="Search here" name="search-string">
                                <button class="search-submit">
                                    <svg x="0" y="0" width="16px" height="16px" viewBox="0 0 16 16" enable-background="new 0 0 16 16" xml:space="preserve">
				<path fill="#231F20" d="M12.001,10l-0.5,0.5l-0.79-0.79c0.806-1.021,1.29-2.308,1.29-3.71c0-3.313-2.687-6-6-6C2.687,0,0,2.687,0,6
				s2.687,6,6,6c1.402,0,2.688-0.484,3.71-1.29l0.79,0.79l-0.5,0.5l4,4l2-2L12.001,10z M6,10c-2.206,0-4-1.794-4-4s1.794-4,4-4
				s4,1.794,4,4S8.206,10,6,10z"></path>
                                        <image src="img/png-icons/search-icon.png" alt="" width="16" height="16" style="vertical-align: top;">
			  </svg>
                                </button>
                            </form>
                        </div>
                    </div><!--.row -->
                </div>
            </div><!-- .header-wrapper -->
        </header><!-- .header -->