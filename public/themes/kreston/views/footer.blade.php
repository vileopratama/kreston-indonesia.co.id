<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row sidebar">
                <aside class="col-xs-12 col-sm-6 col-md-3 widget social">
                    <div class="title-block">
                        <h3 class="title">Follow Us</h3>
                    </div>
                    <p>Follow us in social media</p>
                    <div class="social-list">
                        <a class="icon rounded icon-facebook" href="{!! 'https://www.facebook.com/'.Setting::get_key('social_facebook') !!}"><i class="fa fa-facebook"></i></a>
                        <a class="icon rounded icon-twitter" href="{!! 'https://twitter.com/'.Setting::get_key('social_twitter') !!}"><i class="fa fa-twitter"></i></a>
                        <a class="icon rounded icon-linkedin" href="{!! 'https://www.linkedin.com/company/'.Setting::get_key('social_linkedin') !!}"><i class="fa fa-linkedin"></i></a>
                    </div>
                    <div class="clearfix"></div>
                </aside>
				<!--
                <aside class="col-xs-12 col-sm-6 col-md-3 widget newsletter">
                    <div class="title-block">
                        <h3 class="title">Newsletter Signup</h3>
                    </div>
                    <div>
                        <p>Sign up for newsletter</p>
                        <div class="clearfix"></div>
                        <form class="subscribe-form" method="post" action="php/subscribe.php">
                            <input class="form-control email" type="email" name="subscribe">
                            <button class="submit">
                                <span class="glyphicon glyphicon-arrow-right"></span>
                            </button>
                            <span class="form-message" style="display: none;"></span>
                        </form>
                    </div>
                </aside>newsletter -->

                <aside class="col-xs-12 col-sm-6 col-md-3 widget links">
                    <div class="title-block">
                        <h3 class="title">Information</h3>
                    </div>
                    <nav>
                        <ul>
                            <li><a href="{!! url('page/about-us') !!}">About us</a></li>
                            <li><a href="{!! url('page/services') !!}">Services</a></li>
							<li><a href="{!! url('job-vacancy') !!}">Career</a></li>
							<li><a href="{!! url('contact-us') !!}">Contact Us</a></li>
                        </ul>
                    </nav>
                </aside>

                <aside class="col-xs-12 col-sm-6 col-md-3 widget links">
                    <div class="title-block">
                        <h3 class="title">Newsletter</h3>
                    </div>
                    <nav>
                        <ul>
                            <li><a href="{!! url('news') !!}">News</a></li>
                            <li><a href="{!! url('article') !!}">Article</a></li>
                        </ul>
                    </nav>
                </aside>
				<aside class="col-xs-12 col-sm-6 col-md-3 widget links">
					<div class="title-block">
                        <h3 class="title">Our Office</h3>
					 </div>	
					<div>
						{!! Setting::get_key('company_address') !!} <br/>
						Phone : {!! Setting::get_key('company_phone_number') !!}<br/>
						Fax : {!! Setting::get_key('company_fax_number') !!}<br/>
					</div>
                   
				</aside>
            </div>
        </div>
    </div><!-- .footer-top -->

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="copyright col-xs-12 col-sm-3 col-md-3">
                    &copy; Copyright {!! date('Y') !!} {!! Setting::get_key('company_name') !!}
                </div>
				
				<div class="col-xs-12 col-sm-6 col-md-6">
					People do business with people they know, like and trus
				</div>

                <!--<div class="phone col-xs-6 col-sm-3 col-md-3">
                    <strong class="title">Call:</strong> {!! Setting::get_key('company_phone_number') !!} <br>
                    <strong class="title">Fax :</strong> {!! Setting::get_key('company_fax_number') !!}<br>
                </div>

                <div class="address col-xs-6 col-sm-3 col-md-3">
                    <i class="fa fa-map-marker"></i> {!! Setting::get_key('company_address') !!} {!! Setting::get_key('company_city') !!} {!! Setting::get_key('company_country') !!}
                </div>-->

                <div class="col-xs-12 col-sm-3 col-md-3">
                    <a href="#" class="up">
                        <span class="glyphicon glyphicon-arrow-up"></span>
                    </a>
                </div>
            </div>
        </div>
    </div><!-- .footer-bottom -->
</footer>
<div class="clearfix"></div>

<!--[if (!IE)|(gt IE 8)]><!-->
<script src="{!! asset('vendor/jquery/jquery-2.1.4.min.js') !!}"></script>
<!--<![endif]-->

<!--[if lte IE 8]>
<script src="{!! Theme::asset('js/jquery-1.9.1.min.js') !!}"></script>
<![endif]-->
<script src="{!! asset('vendor/jquery-confirm/jquery-confirm.min.js') !!}"></script>
<script src="{!! Theme::asset('js/bootstrap.min.js') !!}"></script>
@stack('scripts')
<script src="{!! Theme::asset('js/main.js') !!}"></script>
<!--
<script src="js/bootstrap.min.js"></script>
<script src="js/price-regulator/jshashtable-2.1_src.js"></script>
<script src="js/price-regulator/jquery.numberformatter-1.2.3.js"></script>
<script src="js/price-regulator/tmpl.js"></script>
<script src="js/price-regulator/jquery.dependClass-0.1.js"></script>
<script src="js/price-regulator/draggable-0.1.js"></script>
<script src="js/price-regulator/jquery.slider.js"></script>
<script src="js/jquery.carouFredSel-6.2.1-packed.js"></script>
<script src="js/jquery.touchwipe.1.1.1.js"></script>
<script src="js/jquery.elevateZoom-3.0.8.min.js"></script>
<script src="js/jquery.imagesloaded.min.js"></script>
<script src="js/jquery.appear.js"></script>
<script src="js/jquery.sparkline.min.js"></script>
<script src="js/jquery.easypiechart.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/isotope.pkgd.min.js"></script>
<script src="js/jquery.knob.js"></script>
<script src="js/jquery.selectBox.min.js"></script>
<script src="js/jquery.royalslider.min.js"></script>
<script src="js/jquery.tubular.1.0.js"></script>
<script src="js/SmoothScroll.js"></script>
<script src="js/country.js"></script>
<script src="js/spin.min.js"></script>
<script src="js/ladda.min.js"></script>
<script src="js/masonry.pkgd.min.js"></script>
<script src="js/morris.min.js"></script>
<script src="js/raphael.min.js"></script>
<script src="js/video.js"></script>
<script src="js/pixastic.custom.js"></script>
<script src="js/livicons-1.4.min.js"></script>
<script src="js/layerslider/greensock.js"></script>
<script src="js/layerslider/layerslider.transitions.js"></script>
<script src="js/layerslider/layerslider.kreaturamedia.jquery.js"></script>
<script src="js/revolution/jquery.themepunch.tools.min.js"></script>
<script src="js/revolution/jquery.themepunch.revolution.min.js"></script>
<!-- SLIDER REVOLUTION 5.0 EXTENSIONS
(Load Extensions only on Local File Systems !
The following part can be removed on Server for On Demand Loading)
<script src="js/revolution/extensions/revolution.extension.actions.min.js"></script>
<script src="js/revolution/extensions/revolution.extension.carousel.min.js"></script>
<script src="js/revolution/extensions/revolution.extension.kenburn.min.js"></script>
<script src="js/revolution/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="js/revolution/extensions/revolution.extension.migration.min.js"></script>
<script src="js/revolution/extensions/revolution.extension.navigation.min.js"></script>
<script src="js/revolution/extensions/revolution.extension.parallax.min.js"></script>
<script src="js/revolution/extensions/revolution.extension.slideanims.min.js"></script>
<script src="js/revolution/extensions/revolution.extension.video.min.js"></script>
<script src="js/bootstrapValidator.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jplayer/jquery.jplayer.min.js"></script>
<script src="js/jplayer/jplayer.playlist.min.js"></script>
<script src="js/jquery.scrollbar.min.js"></script>
<script src="js/main.js"></script>-->
</body>
</html>