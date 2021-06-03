<!doctype html>


<html lang="en" class="no-js">
<head>
	<link rel="icon" href="https://firebasestorage.googleapis.com/v0/b/pn-images.appspot.com/o/logo%2Fcolorlogo.png?alt=media&token=0386f0aa-e1e1-4950-924f-3eedaa82d967">
	<title>@yield("title")</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	

	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,400i,500,500i,600,700&display=swap" rel="stylesheet">
	
	<link rel="stylesheet" href="{{url('css/studiare-assets.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('css/fonts/font-awesome/font-awesome.min.css')}}" media="screen">
	<link rel="stylesheet" href="{{url('backend/plugins/fontawesome-free/css/all.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('css/fonts/elegant-icons/style.css')}}" media="screen">
	<link rel="stylesheet" type="text/css" href="{{url('css/fonts/iconfont/material-icons.css')}}" media="screen">
	<link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}">

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script> $(document).ready(function(){ $('#mymodel').modal('show');}); </script>
    

</head>
<body>

	<!-- Container -->
	<div id="container">
		<!-- Header
		    ================================================== -->
		<header class="clearfix">

			<div class="top-line">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							@foreach($navf as $n)
							<p><i class="material-icons">phone</i> <span>{{$n->nf_phone}}</span></p>
							<p><i class="material-icons">email</i> <span>{{$n->nf_email}}</span></p>
							@endforeach

							@if(Auth::check())
							<p><i class="fa fa-user" aria-hidden="true"></i> <span>{{Auth::user()->name }}</span></p>
							@endif
							
						</div>
						<div class="col-lg-6">
							<div class="right-top-line">
								<ul class="top-menu">
									@if(Auth::check())
									<li><a href="{{url('front/profile')}}">Account</a></li>
									@endif
									@if(Auth::check())
									<button class="shop-icon">
									<a href="{{url('front/logout')}}" class="text-white">logout</a>
								    </button>
									@endif
									<li><a href="{{url('aboutus')}}">About</a></li>
									<li><a href="{{url('index')}}">Home</a></li>
								</ul>

								
								<button class="search-icon">
									<i class="material-icons open-search">search</i> 
									<i class="material-icons close-search">close</i>
								</button>
					
                                @if(Auth::check())
                                <a href="{{url('goto_cart')}}">
								<button class="shop-icon">
									<i class="material-icons">shopping_cart</i>
									<?php $count=0; ?>
									@foreach($cart as $car)
									@if(Auth::user()->email==$car->user_email)
									<?php $count+=1; ?>
									<span class="studiare-cart-number"><?php echo $count;?></span>
									@endif
									@endforeach
									@if(($cart!=null)||($cart==null))
									<span class="studiare-cart-number"><?php echo $count;?></span>
									@endif
								</button>
								</a>
								@endif
								
								@if(Auth::check())

								@else
								<?php $session_id = Session::getId(); ?>
								<a href="{{url('goto_cart')}}">
								<button class="shop-icon">
									<i class="material-icons">shopping_cart</i>
									<?php $countt=0; ?>
									@foreach($cart as $car)
									@if($car->session_id==$session_id)
									<?php $countt+=1; ?>
									<span class="studiare-cart-number"><?php echo $countt;?></span>
									@endif
									@endforeach
									@if(($cart!=null)||($cart!=null))
									<span class="studiare-cart-number"><?php echo $countt;?></span>
									@endif
								</button>
							    </a>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>

			<form class="search_bar" method="post" action="{{url('front/search')}}">
				@csrf
				<div class="container">
					<input type="search" name="search" class="search-input" placeholder="What are you looking for...">
					<button type="submit" class="btn btn-primary" class="submit">
						<i class="material-icons">search</i>
					</button>
				</div>
			</form>
			@if(session('message'))

         <p class ="alert alert-success text-center">
          {{session('message')}}
         </p>
          
            @endif


			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container">

					<a class="navbar-brand" href="">
						@foreach($navf as $n)
						
						<img src="{{ url('/uploade/'.$n->nf_logo_image) }}" alt="" style="width:250px;">
						@endforeach
				
					</a>

					<a href="#" class="mobile-nav-toggle"> 
						<span></span>
					</a>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li class="drop-link">
								<a class="active" href="{{url('index')}}">Home</a>
							</li>
							
							<li class="drop-link">
								<a href="{{url('courses')}}">Courses</a>
							</li>
							<li><a href="{{url('team')}}">Team</a></li>
							<li class="drop-link">
								<a href="#">Workshop <i class="fa fa-angle-down"></i></a>
								<ul class="dropdown">
									<li>
										<a href="{{url('front/Xiaomi')}}">Xiaomi MI Company</a>
									</li>
									<li>
										<a href="{{url('front/Bentchair')}}">Bentchair Company</a>
									</li>
									<li>
										<a href="{{url('front/MPCT')}}">MPCT College</a>
									</li>
									<li>
										<a href="{{url('front/RJIT')}}">RJIT College</a>
									</li>
								</ul>
							</li>
							<li><a href="{{url('intern')}}">Intern</a></li>
							<li><a href="{{url('placement')}}">Placement</a></li>
							<li><a href="{{url('contact')}}">Contact</a></li>
						</ul>
						<a href="{{url('signup')}}" class="login-button"><button class="btn text-white" style="border-radius: 20px;">Signup</button></a>
						<a href="{{url('front/login')}}" class="login-button"><button class="btn text-white" style="border-radius: 20px;">Login</button></a>
					</div>
				</div>
			</nav>

			<div class="mobile-menu">
				<div class="search-form-box">
					<form class="search-form" method="post" action="{{url('front/search')}}">
						@csrf
						<input type="search" name="search" class="search-field" placeholder="Enter keyword...">
						<button type="submit" class="search-submit">
							<i class="material-icons open-search">search</i> 
						</button>
					</form>
				</div>
				<div class="shopping-cart-box">
					@if(Auth::check())
					<a class="shop-icon" href="{{url('goto_cart')}}">
						<i class="material-icons">shopping_cart</i>
						Cart
						<?php $count=0; ?>
									@foreach($cart as $car)
									@if(Auth::user()->email==$car->user_email)
									<?php $count+=1; ?>
									@endif
									@endforeach
									<span class="studiare-cart-number"><?php echo $count;?></span>
					</a>
					@endif
					@if(Auth::check())

								@else
								<?php $session_id = Session::getId(); ?>
								<a class="shop-icon" href="{{url('goto_cart')}}">
						<i class="material-icons">shopping_cart</i>
						Cart
						<?php $countt=0; ?>
									@foreach($cart as $car)
									@if($car->session_id==$session_id)
									<?php $countt+=1; ?>
									@endif
									@endforeach
									<span class="studiare-cart-number"><?php echo $countt;?></span>
								</a>
					@endif
				</div>
				<nav class="mobile-nav">
					<ul class="mobile-menu-list">
						<li>
							<a href="{{url('index')}}">Home</a>
						</li>
						<li>
							<a href="{{url('courses')}}">Courses</a>
						</li>
                        <li>
							<a href="{{url('team')}}">Our Team</a>

						</li>
						<li>
							<a href="{{url('intern')}}">Intern</a>
						</li>
						<li>
								<a href="{{url('placement')}}">Placement</a>
						</li>
						<li>
							<a href="{{url('contact')}}">Contact</a>
						</li>
						<li>
							<a href="{{url('aboutus')}}">About</a>
						</li>
						<li>
						<button class="btn btn-primary">
						<a href="{{url('signup')}}">Signup</a>
					    </button>
					    </li>
					    <li>
					    @if(Auth::check())
									<button class="btn btn-primary mt-2">
									<a href="{{url('front/logout')}}" class="text-white">logout</a>
								    </button>
						@endif
					    </li>
					    <li>
					    <button class="btn btn-primary mt-2">
						<a href="{{url('front/login')}}">Login</a>
					    </button>
					    </li>
					</ul>
				</nav>
			</div>

		</header>
		<!-- End Header -->





    @section("content")
 
    @show







    <!-- footer 
			================================================== -->
		<footer>
			<div class="container">

				<div class="up-footer">
					<div class="row">
						@foreach($navf as $n)
						

						<div class="col-lg-4 col-md-6">
							<div class="footer-widget text-widget">
								<a href="" class="footer-logo"><img src="{{ url('/uploade/'.$n->nf_logo_image) }}" alt=""></a>
								<p>{{$n->nf_des}}</p>
								<ul>
									<li>
										<div class="contact-info-icon">
											<i class="material-icons">location_on</i>
										</div>
										<div class="contact-info-value">{{$n->nf_address}}</div>
									</li>
									<li>
										<div class="contact-info-icon">
											<i class="material-icons">phone_android</i>
										</div>
										<div class="contact-info-value">{{$n->nf_phone}}</div>
									</li>
								</ul>
							</div>
						</div>
						

						<div class="col-lg-4 col-md-6">
							<div class="footer-widget quick-widget">
								<h2>Quick Links</h2>
								<ul class="quick-list">
									<li><a href="{{url('contact')}}">Contact</a></li>
									<li><a href="{{url('placement')}}">Placements</a></li>
									<li><a href="{{url('aboutus')}}">About Us</a></li>
									<li><a href="{{url('courses')}}">Courses</a></li>
									<li><a href="{{url('intern')}}">Intern</a></li>
									<li><a href="{{url('index')}}">Home</a></li>
									<li><a href="{{url('team')}}">Team</a></li>
								</ul>
							</div>
						</div>

						<div class="col-lg-4 col-md-6">
							<div class="footer-widget subscribe-widget">
								<h2>Newsletter</h2>
								<p>Don’t miss anything, sign up now and keep informed about our company.</p>
								<div class="newsletter-form">
									<input class="form-control" type="email" name="EMAIL" placeholder="Enter Your E-mail" required="">
									<input type="submit" value="Subscribe">
								</div>
							</div>
						</div>
						@endforeach

					</div>
				</div>

			</div>

			<div class="footer-copyright copyrights-layout-default">
				<div class="container">
					<div class="copyright-inner">
						<div class="copyright-cell"> &copy; 2021 <span class="highlight">pninfosys</span>. Created by Rohit Rishishwar.</div>
						<div class="copyright-cell">
							<ul class="studiare-social-links">
								<li><a href="#" class="facebook"><i class="fa fa-facebook-f"></i></a></li>
								<li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

		</footer>
		<!-- End footer -->

	</div>
	<!-- End Container -->


	
	<script src="{{url('js/studiare-plugins.min.js')}}"></script>
	<script src="{{url('js/jquery.countTo.js')}}"></script>
	<script src="{{url('js/popper.js')}}"></script>
	<script src="{{url('js/bootstrap.min.js')}}"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyCiqrIen8rWQrvJsu-7f4rOta0fmI5r2SI&amp;sensor=false&amp;language=en"></script>
	<script src="{{url('js/gmap3.min.js')}}"></script>
	<script src="{{url('js/script.js')}}"></script>

	<script>
		var tpj=jQuery;
		var revapi202;
		tpj(document).ready(function() {
			if (tpj("#rev_slider_202_1").revolution == undefined) {
				revslider_showDoubleJqueryError("#rev_slider_202_1");
			} else {
				revapi202 = tpj("#rev_slider_202_1").show().revolution({
					sliderType: "standard",
					jsFileLocation: "js/",
					dottedOverlay: "none",
					delay: 5000,
					navigation: {
						keyboardNavigation: "off",
						keyboard_direction: "horizontal",
						mouseScrollNavigation: "off",
						onHoverStop: "off",
						arrows: {
					        enable: true,
					        style: 'gyges',
					        left: {
					            container: 'slider',
					            h_align: 'left',
					            v_align: 'center',
					            h_offset: 20,
					            v_offset: -60
					        },
					 
					        right: {
					            container: 'slider',
					            h_align: 'right',
					            v_align: 'center',
					            h_offset: 20,
					            v_offset: -60
					        }
					    },
						touch: {
							touchenabled: "on",
							swipe_threshold: 75,
							swipe_min_touches: 50,
							swipe_direction: "horizontal",
							drag_block_vertical: false
						},
						bullets: {
 
					        enable: false,
					        style: 'persephone',
					        tmp: '',
					        direction: 'horizontal',
					        rtl: false,
					 
					        container: 'slider',
					        h_align: 'center',
					        v_align: 'bottom',
					        h_offset: 0,
					        v_offset: 55,
					        space: 7,
					 
					        hide_onleave: false,
					        hide_onmobile: false,
					        hide_under: 0,
					        hide_over: 9999,
					        hide_delay: 200,
					        hide_delay_mobile: 1200
 						}
					},
					responsiveLevels: [1210, 1024, 778, 480],
					visibilityLevels: [1210, 1024, 778, 480],
					gridwidth: [1210, 1024, 778, 480],
					gridheight: [700, 700, 600, 600],
					lazyType: "none",
					parallax: {
						type: "scroll",
						origo: "slidercenter",
						speed: 1000,
						levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 46, 47, 48, 49, 50, 100, 55],
						type: "scroll",
					},
					shadow: 0,
					spinner: "off",
					stopLoop: "off",
					stopAfterLoops: -1,
					stopAtSlide: -1,
					shuffle: "off",
					autoHeight: "off",
					fullScreenAutoWidth: "off",
					fullScreenAlignForce: "off",
					fullScreenOffsetContainer: "",
					fullScreenOffset: "0px",
					disableProgressBar: "on",
					hideThumbsOnMobile: "off",
					hideSliderAtLimit: 0,
					hideCaptionAtLimit: 0,
					hideAllCaptionAtLilmit: 0,
					debugMode: false,
					fallbacks: {
						simplifyAll: "off",
						nextSlideOnWindowFocus: "off",
						disableFocusListener: false,
					}
				});
			}
		}); /*ready*/
	</script>

	<script>
        function select_payment_method()
        {
        if($('.stripe').is(':checked') || $('.cod').is(':checked') || $('.Paytm').is(':checked') || $('.razorpay').is(':checked') ){
        alert('checked');
        }
        else{
        alert('Please select payment method');
        return false;
         }
        }

    </script>	

	
</body>
</html>