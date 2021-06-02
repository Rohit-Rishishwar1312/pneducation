@extends("front.master")
@section("title",'Home | Pneducation')

@section("content")
    <div class="modal fade" id="mymodel" style="margin-top: 325px;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info lg">
        <h5 class="modal-title" >Notifications</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	
      	@foreach($notific as $no)
        
        <ul>
			<li>
			    <h3 style="font-weight: bold;"><img src="https://www.rgpv.ac.in/Images/new_icon_blink.gif">{{$no->notification}}</h3>
			    <p style="font-weight: bold;color:green;">Registration starts: {{$no->s_date}}</p>
			    <p style="font-weight: bold;color:red;">Registration Ends: {{$no->e_date}}</p>
			</li>
		</ul>

		@endforeach

      </div>
      
    </div>
  </div>
</div>
   

     <!-- home-section 
			================================================== -->
		<section id="home-section">
			<div id="rev_slider_202_1_wrapper" class="rev_slider_wrapper" data-alias="concept1" style="background-color:#000000;padding:0px;">
				<!-- START REVOLUTION SLIDER 5.1.1RC fullscreen mode -->
				<div id="rev_slider_202_1" class="rev_slider" data-version="5.1.1RC">

					<ul>
						<!-- SLIDE  -->
						@foreach($bann as $b)
						<li data-index="rs-672" data-transition="fade" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="default"  data-thumb="{{ url('/uploade/'.$b->b_image) }}" data-rotate="0" data-saveperformance="off" data-title="unique" data-description="">
							<!-- MAIN IMAGE -->
							<img src="{{ url('/uploade/'.$b->b_image) }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
							<!-- LAYERS -->

							<!-- LAYER NR. 1 -->
							<div class="tp-caption tp-shape tp-shapewrapper tp-resizeme"
								id="slide-672-layer-1" 
								data-x="['left','left','left','left']" 
								data-hoffset="['0','0','0','0']" 
								data-y="['top','top','top','top']" 
								data-voffset="['130','130','130','130']" 
								data-width="['530','530','430','420']" 
								data-height="330" 
								data-whitespace="nowrap" 
								data-transform_idle="o:1;" 
								data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeOut;" 
								data-transform_out="x:left;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
								data-start="500" 
								data-responsive_offset="on" 
								style="z-index: 5;background-color:rgba(255, 255, 255, 1.00);border-color:rgba(0, 0, 0, 0);">
							</div>

							<!-- LAYER NR. 2 -->
							<div class="tp-caption Woo-TitleLarge tp-resizeme" 
								id="slide-672-layer-2" 
								data-x="['left','left','left','left']" 
								data-hoffset="['40','40','40','35']" 
								data-y="['top','top','top','top']" 
								data-voffset="['170','170','170','170']" 
								data-width="450" 
								data-height="none" 
								data-whitespace="normal" 
								data-transform_idle="o:1;" 
								data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeOut;" 
								data-transform_out="x:left;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
								data-start="700" 
								data-splitin="none" 
								data-splitout="none" 
								data-responsive_offset="on" 
								style="z-index: 6; min-width: 370px; max-width: 450px; white-space: normal;text-align:left;">{{$b->b_title}}
							</div>

							<!-- LAYER NR. 3 -->
							<div class="tp-caption tp-shape tp-shapewrapper tp-line-shape tp-resizeme"
								id="slide-672-layer-3" 
								data-x="['left','left','left','left']" 
								data-hoffset="['0','0','0','0']" 
								data-y="['top','top','top','top']" 
								data-voffset="['165','165','165','165']" 
								data-width="['3','3','3','3']" 
								data-height="100" 
								data-whitespace="nowrap" 
								data-transform_idle="o:1;" 
								data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeOut;" 
								data-transform_out="x:left;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
								data-start="700" 
								data-responsive_offset="on" 
								style="z-index: 6;">
							</div>

							<!-- LAYER NR. 4 -->
							<div class="tp-caption Woo-Rating tp-resizeme" 
								id="slide-672-layer-4" 
								data-x="['left','left','left','left']" 
								data-hoffset="['40','40','40','35']" 
								data-y="['top','top','top','top']" 
								data-voffset="['286','286','286','286']" 
								data-width="450" 
								data-height="none" 
								data-whitespace="normal" 
								data-transform_idle="o:1;" 
								data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeOut;" 
								data-transform_out="x:left;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
								data-start="800" 
								data-splitin="none" 
								data-splitout="none" 
								data-responsive_offset="on" 
								style="z-index: 8; min-width: 370px; max-width: 450px; white-space: normal; text-align:left;">
								{{$b->b_des}}
							</div>

							<!-- LAYER NR. 5 -->
							<div class="tp-caption tp-resizeme"
								id="slide-672-layer-5" 
								data-x="['left','left','left','left']" 
								data-hoffset="['407','407','407','407']" 
								data-y="['top','top','top','top']" 
								data-voffset="['337','337','337','337']" 
								data-width="120" 
								data-height="none" 
								data-whitespace="normal" 
								data-transform_idle="o:1;" 
								data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeOut;" 
								data-transform_out="x:left;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
								data-start="1100" 
								data-splitin="none" 
								data-splitout="none" 
								data-responsive_offset="on" 
								style="z-index: 10; min-width: 100px; max-width: 100px; white-space: normal; text-align:center;">
								<img src="upload/slider/price-1.png" alt="">
							</div>

							<!-- LAYER NR. 6 -->
							<a class="tp-caption Woo-ProductInfo rev-btn tp-resizeme" 
								href="http://server.local/revslider/product/premium-computer-hardware/" 
								target="_self" 
								id="slide-672-layer-6" 
								data-x="['left','left','left','left']" 
								data-hoffset="['40','40','40','35']" 
								data-y="['top','top','top','top']" 
								data-voffset="['370','370','370','370']" 
								data-width="none" 
								data-height="none" 
								data-whitespace="nowrap" 
								data-transform_idle="o:1;" 
								data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:200;e:Power1.easeInOut;" 
								data-style_hover="c:rgba(0, 0, 0, 1.00);bg:rgba(221, 221, 221, 1.00);cursor:pointer;" 
								data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeOut;" 
								data-transform_out="x:left;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
								data-start="1100" 
								data-splitin="none" 
								data-splitout="none" 
								data-actions='' 
								data-responsive_offset="on">
								Learn More
							</a>
                        @endforeach
						</li>
						
						
						

					</ul>
					<div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
				</div>
			</div>
			<!-- END REVOLUTION SLIDER -->
		</section>
		<!-- End home section -->

		<!-- feature-section 
			================================================== -->
		<section class="feature-section">
			<div class="container">
				<div class="feature-box">
					<div class="row">
						@foreach($lear as $le)
						<div class="col-lg-4 col-md-6">
							<div class="feature-post">
								<div class="icon-holder">
									<img src="{{ url('/uploade/'.$le->l_image) }}" style="height: 100px; width: 120px; border-radius: 100%;">
								</div>
								<div class="feature-content">
									<h2>{{$le->l_title}}</h2>
									<p>{{$le->l_des}}</p>
								</div>
							</div>
						</div>
						@endforeach
						
					</div>
				</div>
			</div>
		</section>
		<!-- End feature section -->

		<!-- collection-section 
			================================================== -->
		<section class="collection-section">
			<div class="container">
				<div class="title-section">
					<div class="left-part">
						<span>Categories</span>
						<h1>Trending Collection</h1>
					</div>
					<div class="right-part">
						<a class="button-one" href="{{url('categories')}}">View All Categories</a>
					</div>
				</div>
				<div class="collection-box">
					<div class="row">
						@foreach($catego as $cat)
						<div class="col-lg-6 col-md-12">
							<div class="collection-post">
								<div class="inner-collection">
									<a href="{{url('category_courses/'.$cat->id)}}"><img src="{{ url('/uploade/'.$cat->ca_image)}}" alt="" style="height: 400px;" width="100%"></a>
									<a href="{{url('category_courses/'.$cat->id)}}" class="hover-post">
										<span class="title">{{$cat->name}}</span>
										<?php $count=0; ?>
										@foreach($course as $crs)
										@if($cat->name==$crs->c_category)
										<?php $count+=1; ?>
										@endif
										@endforeach
										<span class="numb-courses"><?php echo $count; ?> Courses</span>
									</a>
								</div>
							</div>
						</div>
						@endforeach
					</div>
						
				</div>
			</div>
		</section>
		<!-- End collection section -->

		<!-- countdown-section 
			================================================== -->
		<section class="countdown-section">
			<div class="container">
				<div class="countdown-box">
					<h1>Limited Time: Get My Book For Free!</h1>
					<p>Learn anytime, anywhere. Best Courses. Top Instituion.</p>
					<div class="countdown-item" data-date="2019/12/14">
						<div class="countdown-col">
							<span class="countdown-unit countdown-days">
								<span class="number" id="days"></span>
								<span class="text">days</span>
							</span>
						</div>
						<div class="countdown-col">
							<span class="countdown-unit countdown-hours">
								<span class="number" id="hours"></span>
								<span class="text">hours</span>
							</span>
						</div>
						<div class="countdown-col">
							<span class="countdown-unit countdown-min">
								<span class="number" id="minutes"></span>
								<span class="text">minutes</span>
							</span>
						</div>
						<div class="countdown-col">
							<span class="countdown-unit countdown-sec">
								<span class="number" id="seconds"></span>
								<span class="text">seconds</span>
							</span>
						</div>
					</div>
					<p>We offer professional SEO services that help websites increase their organic search score drastically in order to compete for the highest rankings.</p>
					<a class="button-two" href="#">Get my free book</a>
				</div>
			</div>
		</section>
		<!-- End countdown section -->

		<!-- popular-courses-section 
			================================================== -->
		<section class="popular-courses-section">
			<div class="container">
				<div class="title-section">
					<div class="left-part">
						<span>Education</span>
						<h1>Popular Courses</h1>
					</div>
					<div class="right-part">
						<a class="button-one" href="{{url('courses')}}">View All Courses</a>
					</div>
				</div>
				<div class="popular-courses-box">
					<div class="row">
						<?php $count=0; ?>
                        @foreach($course as $cours)
                        <?php $count+=1; ?>
						<div class="col-lg-3 col-md-6">
							<div class="course-post">
								<div class="course-thumbnail-holder">
									<a href="{{url('course_detail/'.$cours->id)}}">
										<img src="{{ url('/uploade/'.$cours->c_image) }}" alt="" style="height: 150px;">
									</a>
								</div>
								<div class="course-content-holder">
									<div class="course-content-main">
										<h2 class="course-title">
											<a href="{{url('course_detail/'.$cours->id)}}">{{$cours->c_name}}</a>
										</h2>
										<p class="text-justify">{{$cours->c_des}}</p>
										
									</div>
									<div class="course-content-bottom">
										
										<div class="course-price">
											<span>Rs{{$cours->c_price}}</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						@if($count==4)
						 @break;
						@endif
						@endforeach

					</div>
				</div>
			</div>
		</section>
		<!-- End popular-courses section -->

		

		<!-- testimonial-section 
			================================================== -->
		<section class="testimonial-section">
			<div class="container">
				<div class="testimonial-box owl-wrapper">
					
					<div class="owl-carousel" data-num="1">
					
						<div class="item">
							<div class="testimonial-post">
								<p> “Design-driven, customized and reliable solution for your token development and management system to automate sales processes.”</p>
								<div class="profile-test">
									<div class="avatar-holder">
										<img src="upload/testimonials/testimonial-avatar-1.jpg" alt="">
									</div>
									<div class="profile-data">
										<h2>Nicole Alatorre</h2>
										<p>Designer</p>
									</div>
								</div>
							</div>
						</div>
					
						<div class="item">
							<div class="testimonial-post">
								<p> “Design-driven, customized and reliable solution for your token development and management system to automate sales processes.”</p>
								<div class="profile-test">
									<div class="avatar-holder">
										<img src="upload/testimonials/testimonial-avatar-2.jpg" alt="">
									</div>
									<div class="profile-data">
										<h2>Nicole Alatorre</h2>
										<p>Designer</p>
									</div>
								</div>
							</div>
						</div>
					
						<div class="item">
							<div class="testimonial-post">
								<p> “Design-driven, customized and reliable solution for your token development and management system to automate sales processes.”</p>
								<div class="profile-test">
									<div class="avatar-holder">
										<img src="upload/testimonials/testimonial-avatar-3.jpg" alt="">
									</div>
									<div class="profile-data">
										<h2>Nicole Alatorre</h2>
										<p>Designer</p>
									</div>
								</div>
							</div>
						</div>
					
						<div class="item">
							<div class="testimonial-post">
								<p> “Design-driven, customized and reliable solution for your token development and management system to automate sales processes.”</p>
								<div class="profile-test">
									<div class="avatar-holder">
										<img src="upload/testimonials/testimonial-avatar-4.jpg" alt="">
									</div>
									<div class="profile-data">
										<h2>Nicole Alatorre</h2>
										<p>Designer</p>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>
		<!-- End testimonial section -->



@endsection
