<!DOCTYPE html>
<html lang="en">
<head>
	{!! SEOMeta::generate() !!}
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui" />
    <meta name="csrf_token" content="{!! csrf_token() !!}" />
    <link rel="shortcut icon" sizes="196x196" href="{!! Theme::asset('administrator::images/logo.png') !!}" />
    <link rel="stylesheet" href="{!! Theme::asset('libs/bower/font-awesome/css/font-awesome.min.css') !!}" />
    <link rel="stylesheet" href="{!! Theme::asset('libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.css') !!}" />
    <link rel="stylesheet" href="{!! Theme::asset('css/app.min.css') !!}" />
    <link rel="stylesheet" href="{!! Theme::asset('libs/bower/jquery-confirm/jquery-confirm.min.css') !!}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300" />
    @stack('css')
    <script src="{!! Theme::asset('libs/bower/breakpoints.js/dist/breakpoints.min.js') !!}"></script>
    <script>Breakpoints();</script>
</head>
<body class="menubar-left menubar-unfold menubar-light theme-primary">
<nav id="app-navbar" class="navbar navbar-inverse navbar-fixed-top primary">
    <div class="navbar-header">
        <button type="button" id="menubar-toggle-btn"
                class="navbar-toggle visible-xs-inline-block navbar-toggle-left hamburger hamburger--collapse js-hamburger">
            <span class="sr-only">Toggle navigation</span> <span class="hamburger-box"><span
                        class="hamburger-inner"></span></span></button>
        <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse"
                data-target="#app-navbar-collapse" aria-expanded="false"><span class="sr-only">Toggle navigation</span>
            <span class="zmdi zmdi-hc-lg zmdi-more"></span></button>
        <button type="button" class="navbar-toggle navbar-toggle-right collapsed" data-toggle="collapse"
                data-target="#navbar-search" aria-expanded="false"><span class="sr-only">Toggle navigation</span> <span
                    class="zmdi zmdi-hc-lg zmdi-search"></span></button>
        <a href="{!! url('/') !!}" class="navbar-brand">
			<img src="{!! Theme::asset('images/small-logo.png') !!}" />
		</a>
    </div>

    <div class="navbar-container container-fluid">
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-toolbar navbar-toolbar-left navbar-left">
                <li class="hidden-float hidden-menubar-top"><a href="javascript:void(0)" role="button"
                                                               id="menubar-fold-btn"
                                                               class="hamburger hamburger--arrowalt is-active js-hamburger"><span
                                class="hamburger-box"><span class="hamburger-inner"></span></span></a></li>
                <li><h5 class="page-title hidden-menubar-top hidden-float"></h5></li>
            </ul>
            <ul class="nav navbar-toolbar navbar-toolbar-right navbar-right">
				<li class="nav-item dropdown hidden-float"><a href="{!! url('/') !!}" target="_blank" aria-expanded="false"><i class="fa fa-globe"></i> {!! Lang::get('app.visit frontend') !!}</a></li>
                <li class="nav-item dropdown hidden-float"><a href="javascript:void(0)" data-toggle="collapse"
                                                              data-target="#navbar-search" aria-expanded="false"><i
                                class="zmdi zmdi-hc-lg zmdi-search"></i></a></li>
                <!--
				<li class="dropdown"><a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false"><i
                                class="zmdi zmdi-hc-lg zmdi-notifications"></i></a>
                    <div class="media-group dropdown-menu animated flipInY">
					
					<a href="javascript:void(0)"
                                                                               class="media-group-item">
                            <div class="media">
                                <div class="media-left">
                                    <div class="avatar avatar-xs avatar-circle"><img src="assets/images/221.jpg" alt="">
                                        <i class="status status-online"></i></div>
                                </div>
                                <div class="media-body"><h5 class="media-heading">John Doe</h5>
                                    <small class="media-meta">Active now</small>
                                </div>
                            </div>
                        </a> <a href="javascript:void(0)" class="media-group-item">
                            <div class="media">
                                <div class="media-left">
                                    <div class="avatar avatar-xs avatar-circle"><img src="assets/images/205.jpg" alt="">
                                        <i class="status status-offline"></i></div>
                                </div>
                                <div class="media-body"><h5 class="media-heading">{!! Auth::user()->first_name !!}</h5>
                                    <small class="media-meta">2 hours ago</small>
                                </div>
                            </div>
                        </a> <a href="javascript:void(0)" class="media-group-item">
                            <div class="media">
                                <div class="media-left">
                                    <div class="avatar avatar-xs avatar-circle"><img src="assets/images/207.jpg" alt="">
                                        <i class="status status-away"></i></div>
                                </div>
                                <div class="media-body"><h5 class="media-heading">Sara Smith</h5>
                                    <small class="media-meta">idle 5 min ago</small>
                                </div>
                            </div>
                        </a> <a href="javascript:void(0)" class="media-group-item">
                            <div class="media">
                                <div class="media-left">
                                    <div class="avatar avatar-xs avatar-circle"><img src="assets/images/211.jpg" alt="">
                                        <i class="status status-away"></i></div>
                                </div>
                                <div class="media-body"><h5 class="media-heading">Donia Dyab</h5>
                                    <small class="media-meta">idle 5 min ago</small>
                                </div>
                            </div>
                        </a></div>
                </li>-->
                <li class="dropdown"><a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"
                                        role="button" aria-haspopup="true" aria-expanded="false"><i
                                class="zmdi zmdi-hc-lg zmdi-settings"></i></a>
                    <ul class="dropdown-menu animated flipInY">
                        <li><a href="{!! url('/profile') !!}"><i class="fa fa-user fa-md"></i> {!! Lang::get('action.my profile') !!}</a></li>
						<li><a href="{!! url('/profile/change-password') !!}"><i class="fa fa-key fa-md"></i> {!! Lang::get('action.change password') !!}</a></li>
                        <li><a href="{!! url('/setting') !!}"><i class="fa fa-gear fa-md"></i> {!! Lang::get('action.setting') !!}</a></li>
                        <li><a href="{!! url('/session/logout') !!}"><i class="fa fa-power-off fa-md"></i> {!! Lang::get('action.logout') !!}</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>
<aside id="menubar" class="menubar light">
    <div class="app-user">
        <div class="media">
            <div class="media-left">
                <div class="avatar avatar-md avatar-circle">
                    <a href="javascript:void(0)">
                        <img class="img-responsive" src="{!! Theme::asset('images/221.jpg') !!}" alt="avatar">
                    </a>
                </div>
            </div>
            <div class="media-body">
                <div class="foldable">
                    <h5><a href="javascript:void(0)" class="username">{!! Auth::user()->first_name !!}</a></h5>
                    <ul>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle usertitle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <small>{!! Auth::user()->email!!}</small> <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu animated flipInY">
                                <li><a class="text-color" href="{!! url('/dashboard') !!}"><span class="m-r-xs"><i class="fa fa-home"></i></span> <span>{!! Lang::get('action.dashboard') !!}</span></a></li>
                                <li><a class="text-color" href="{!! url('/profile') !!}"><span class="m-r-xs"><i class="fa fa-user"></i></span> <span>{!! Lang::get('action.my profile') !!}</span></a></li>
								<li><a class="text-color" href="{!! url('/profile/change-password') !!}"><span class="m-r-xs"><i class="fa fa-key"></i></span> <span>{!! Lang::get('action.change password') !!}</span></a></li>
                                <li><a class="text-color" href="{!! url('/setting') !!}"><span class="m-r-xs"><i class="fa fa-gear"></i></span> <span>{!! Lang::get('action.setting') !!}</span></a></li>
                                <li role="separator" class="divider"></li>
                                <li><a class="text-color" href="{!! url('session/logout') !!}"><span class="m-r-xs"><i class="fa fa-power-off"></i></span> <span>{!! Lang::get("action.logout") !!}</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="menubar-scroll">
        <div class="menubar-scroll-inner">
            <ul class="app-menu">
                <li class="has-submenu"><a href="javascript:void(0)" class="submenu-toggle"><i
                                class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i> <span
                                class="menu-text">{!! Lang::get("action.dashboard") !!}</span> <i
                                class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i></a>
                    <ul class="submenu">
                        <li><a href="{!! url('/dashboard') !!}"><span class="menu-text">{!! Lang::get("action.web statistic") !!}</span></a></li>
                    </ul>
                </li>

                <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle"  >
                        <i class="menu-icon zmdi zmdi-puzzle-piece zmdi-hc-lg"></i> <span class="menu-text">{!! Lang::get("action.home page") !!}</span>
                        <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i></a>
                    <ul class="submenu">
						<li><a class="popup_banner" href="{!! url("popup-banner/administrator") !!}"><span class="menu-text">{!! Lang::get("action.popup banner") !!}</span></a></li>
                        <li><a class="home_banner" href="{!! url("home-banner/administrator") !!}"><span class="menu-text">{!! Lang::get("action.banner") !!}</span></a></li>
						<li><a class="advertising" href="{!! url("advertising/administrator") !!}"><span class="menu-text">{!! Lang::get("action.advertising") !!}</span></a></li>
					</ul>
                </li>
                <li>
                    <a class="job_vacancy" href="{!! url("job-vacancy/administrator/index") !!}"><i class="menu-icon zmdi zmdi-search zmdi-hc-lg"></i> <span class="menu-text">{!! Lang::get("action.job vacancy") !!}</span></a>
                </li>
                <li class="has-submenu">
                    <a href="javascript:void(0)" class="submenu-toggle"><i class="menu-icon zmdi zmdi-pages zmdi-hc-lg"></i>
                        <span class="menu-text">{!! Lang::get("action.pages") !!}</span> <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i></a>
                    <ul class="submenu">
                        <li><a class="navigation" href="{!! url("navigation/administrator") !!}"><span class="menu-text">{!! Lang::get("action.navigation") !!}</span></a></li>
                        <li><a class="news" href="{!! url("news/administrator") !!}"><span class="menu-text">{!! Lang::get("action.news") !!}</span></a></li>
                        <li><a class="page" href="{!! url("page/administrator/index") !!}"><span class="menu-text">{!! Lang::get("action.page") !!}</span></a></li>
                        <li><a class="article" href="{!! url("article/administrator") !!}"><span class="menu-text">{!! Lang::get("action.article") !!}</span></a></li>
						<li><a class="category" href="{!! url("category/administrator/index") !!}"><span class="menu-text">{!! Lang::get("action.category") !!}</span></a></li>
					</ul>
                </li>
                <li class="has-submenu"><a href="javascript:void(0)" class="submenu-toggle"><i
                                class="menu-icon zmdi zmdi-check zmdi-hc-lg"></i> <span class="menu-text">{!! Lang::get("action.company profile") !!}</span> <i
                                class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i></a>
                    <ul class="submenu">
                        <li><a class="people" href="{!! url("people/administrator/index") !!}"><span class="menu-text">{!! Lang::get("action.our people") !!}</span></a></li>
						<li><a class="messages" href="{!! url("contact-us/administrator/messages") !!}"><span class="menu-text">{!! Lang::get("action.messages") !!}</span></a></li>
                        <li><a class="contact" href="{!! url("contact-us/administrator/index") !!}"><span class="menu-text">{!! Lang::get("action.contact us") !!}</span></a></li>
                        <li><a class="publication" href="{!! url("publication/administrator") !!}"><span class="menu-text">{!! Lang::get("action.publication") !!}</span></a></li>
                    </ul>
                </li>
                <li class="has-submenu"><a href="javascript:void(0)" class="submenu-toggle"><i
                                class="menu-icon zmdi zmdi-storage zmdi-hc-lg"></i> <span class="menu-text">{!! Lang::get("action.media") !!}</span> <i
                                class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i></a>
                    <ul class="submenu">
                        <li><a class="gallery" href="{!! url("gallery/administrator") !!}"><span class="menu-text">{!! Lang::get("action.gallery") !!}</span></a></li>

                    </ul>
                </li>
                <li class="has-submenu"><a href="javascript:void(0)" class="submenu-toggle"><i class="menu-icon zmdi zmdi-settings zmdi-hc-lg"></i> <span class="menu-text">{!! Lang::get("action.administration") !!}</span> <span
                                <i class="menu-caret zmdi zmdi-hc-sm zmdi-chevron-right"></i></a>
                    <ul class="submenu">
                        <li><a class="user" href="{!! url('user/administrator') !!}"><span class="menu-text">{!! Lang::get("app.user")!!}</span></a></li>
                        <li><a class="setting" href="{!! url('setting/administrator') !!}"><span class="menu-text">{!! Lang::get("app.setting")!!}</span></a></li>
                    </ul>
                </li>


            </ul>
        </div>
    </div>
</aside>
<div id="navbar-search" class="navbar-search collapse">
    <div class="navbar-search-inner">
        <form action="#"><span class="search-icon"><i class="fa fa-search"></i></span> <input class="search-field"
                                                                                              type="search"
                                                                                              placeholder="search...">
        </form>
        <button type="button" class="search-close" data-toggle="collapse" data-target="#navbar-search"
                aria-expanded="false"><i class="fa fa-close"></i></button>
    </div>
    <div class="navbar-search-backdrop" data-toggle="collapse" data-target="#navbar-search" aria-expanded="false"></div>
</div>
<main id="app-main" class="app-main">
    <div class="wrap">
        <section class="app-content">
        @yield("content")
		<div id="divLoading"></div>
        </section>
    </div>
    <div class="wrap p-t-0">
        <footer class="app-footer">
            <div class="clearfix">
                <ul class="footer-menu pull-right">
                    <li><a href="{!! url('/dashboard') !!}"> {!! Lang::get('action.dashboard') !!}</a></li>
                    <li><a href="{!! url('/job-vacancy') !!}"> {!! Lang::get('action.jobs career') !!}</a></li>
                    <li><a href="{!! url('/setting') !!}"> {!! Lang::get('action.setting') !!} <i class="fa fa-angle-up m-l-md"></i></a></li>
                </ul>
                <div class="copyright pull-left">Copyright &copy; {!! date('Y') !!}</div>
            </div>
        </footer>
    </div>
</main>

<script src="{!! Theme::asset('js/core.min.js') !!}"></script>
<script src="{!! Theme::asset('libs/bower/jquery-cookie/jquery.cookie.js') !!}"></script>
<script type="text/javascript">
    $(function(){
        var menu_active = '.' + $.cookie('menu_active');
        //alert(menu_active);
        $(menu_active).closest('li').addClass('active');
        $(menu_active).closest('ul').css("display","block");
        //$.removeCookie('menu_active'); // remove cookie

        $('.app-menu a').on('click', function(event) {
            event.preventDefault();
            $.cookie('menu_active',$(this).attr("class"));
            $(location).attr('href',$(this).attr("href"));
        });
    });
</script>
<script src="{!! Theme::asset('libs/bower/moment/moment.js') !!}"></script>
<script src="{!! Theme::asset('libs/bower/fullcalendar/dist/fullcalendar.min.js') !!}"></script>
<script src="{!! Theme::asset('assets/js/fullcalendar.js') !!}"></script>
<script src="{!! Theme::asset('libs/bower/jquery-confirm/jquery-confirm.min.js') !!}"></script>
<script src="{!! Theme::asset('js/app.min.js') !!}"></script>
@stack('scripts')
</body>
</html>