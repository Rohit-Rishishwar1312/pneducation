@extends("front.master")
@section("title",'corse detail | pneducation')

@section("content")

   <!-- page-banner-section 
			================================================== -->
		<section class="page-banner-section">
			<div class="container">
				<h1>{{$course->c_name}}</h1>
				<ul class="page-depth">
					<li><a href="index.html">PNINFOSYS</a></li>
					<li><a href="courses.html">Courses</a></li>
					<li><a href="single-course.html">{{$course->c_name}}</a></li>
				</ul>
			</div>
		</section>
		<!-- End page-banner-section -->

		<!-- single-course-section 
			================================================== -->
		<section class="single-course-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">

						<div class="single-course-box">

							<!-- single top part -->
							<div class="product-single-top-part">
								<div class="product-info-before-gallery">
									<div class="course-author before-gallery-unit">
										<div class="icon">
											<i class="material-icons">account_box</i>
										</div>
										<div class="info">
											<span class="label">Teacher</span>
											<div class="value">
												<a href="single-teacher.html">Vikas Jain</a>
											</div>
										</div>
									</div>
									<div class="course-category before-gallery-unit">
										<div class="icon">
											<i class="material-icons">bookmark_border</i>
										</div>
										<div class="info">
											<span class="label">Category</span>
											<div class="value">
												<a href="#">{{$course->c_category}}</a>
											</div>
										</div>
									</div>
									<div class="course-rating before-gallery-unit">
										<div class="star-rating has-ratings">
											<span class="rating">Price</span>
											<span class="votes-number">{{$course->c_price}}</span>
										</div>
									</div>
								</div>
								<div class="course-single-gallery">
									<img src="{{ url('/uploade/'.$course->c_image) }}" alt="">
								</div>

							</div>

							<!-- single course content -->
							<div class="single-course-content">
								<h2>Course Description</h2>
								<p>{{$course->c_des}}</p>
								<h2>Course Detail</h2>
								<div class="row">
									<div class="col-md-12">
										<p>{{$course->c_detail}}</p>
									</div>
									
								</div>
								

							</div>
							<!-- end single course content -->

							<!-- course reviews -->
							<div class="course-reviews">
								<div class="course-review-title">
									<h3>
										<i class="material-icons">chat_bubble_outline</i>
										Student Reviews
									</h3>
								</div>
								<div class="course-reviews-inner">
									<div class="ratings-box">
										<div class="rating-average">
											<p>Average rating</p>
											<div class="average-box">
												<span class="num">4.5</span>
												<span class="ratings">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-half-o"></i>
												</span>
												<span class="txt">2 Ratings</span>
											</div>
										</div>
										<div class="detailed-rating">
											<p>Detailed Rating</p>
											<div class="detailed-box">
												<ul class="detailed-lines">
													<li>
														<span>5 Stars</span>
														<div class="outer">
															<span class="inner-fill" style="width: 50%"></span>
														</div>
														<span>1</span>
													</li>
													<li>
														<span>4 Stars</span>
														<div class="outer">
															<span class="inner-fill" style="width: 50%"></span>
														</div>
														<span>1</span>
													</li>
													<li>
														<span>3 Stars</span>
														<div class="outer">
															<span class="inner-fill"></span>
														</div>
														<span>0</span>
													</li>
													<li>
														<span>2 Stars</span>
														<div class="outer">
															<span class="inner-fill"></span>
														</div>
														<span>0</span>
													</li>
													<li>
														<span>1 Stars</span>
														<div class="outer">
															<span class="inner-fill"></span>
														</div>
														<span>0</span>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<ul class="comments">
										<li>
											<div class="image-holder">
												<img src="upload/blog/avatar4.jpg" alt="">
											</div>
											<div class="comment-content">
												<h2>
													Steven Smith
													<span class="rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
													</span>
												</h2>
												<p>top design</p>
											</div>
										</li>
										<li>
											<div class="image-holder">
												<img src="upload/blog/avatar4.jpg" alt="">
											</div>
											<div class="comment-content">
												<h2>
													Margaret
													<span class="rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</span>
												</h2>
												<p>Easy to install, reasonable price!</p>
											</div>
										</li>
									</ul>
									<form class="add-review">
										<h1>Add a Review</h1>
										<label>Your rating</label>
										<select>
											<option>Rate...</option>
											<option>Perfect</option>
											<option>Good</option>
											<option>Average</option>
											<option>Not that bad</option>
											<option>Very Poor</option>
										</select>
										<label>Your Review</label>
										<textarea></textarea>
										<button type="submit">Submit</button>
									</form>
								</div>
							</div>
							<!-- end course reviews -->

						</div>

					</div>

					<div class="col-lg-4">
						<form method="post" action="{{url('addtocart')}}"><!--addtocart work-->
                         @csrf
                    <input type="hidden" name="course_id" value="{{$course->id}}">
                    <input type="hidden" name="course_name" value="{{$course->c_name}}">
                    <input type="hidden" name="course_price" value="{{$course->c_price}}">
                    <input type="hidden" name="course_image" value="{{$course->c_image}}">
						<div class="sidebar">
							<div class="widget course-widget">
								<p class="price">
									<span class="price-label">Price</span>
									<span class="amount"><del>RS 1000</del> Rs {{$course->c_price}}</span>
								</p>
								<input type="submit" name="submit" value="Gotocart" class="btn btn-primary" style="width:330px;border-radius: 35px;margin-bottom:10px;padding: 10px;"></input>
								<a class="button-one" href="#">Take this course</a>
								<div class="product-meta-info-list">
									<h3>Course Includes</h3>
									<p class="text-justify" style="line-height: 30px;">{{$course->c_include}}</p>
								</div>
								<ul class="share-list">
									<li><span>Share:</span></li>
									<li><a href="#" class="facebook"><i class="fa fa-facebook-f"></i></a></li>
									<li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
								</ul>
							</div>
							<div class="widget profile-widget">
								<div class="top-part">
									<img src="{{ url('/uploade/'.$course->c_image) }}" alt="pn">
									<div class="name">
										<h3>Course Content</h3>
										<span class="job-title">{{$course->c_name}}</span>
									</div>
								</div>
								<div class="content">
									<p>{{$course->c_content}}</p>
									
								</div>
							</div>
						</div>
					</form><!--end form-->
					</div>
				</div>
						
			</div>
		</section>
		<!-- End single-course section -->


@endsection