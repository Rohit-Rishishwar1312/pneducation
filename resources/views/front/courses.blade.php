@extends("front.master")
@section("title",'courses | pneducation')

@section("content")


      <!-- page-banner-section 
			================================================== -->
		<section class="page-banner-section">
			<div class="container">
				<h1>Courses</h1>
				<ul class="page-depth">
					<li><a href="">Home</a></li>
					<li><a href="">Courses</a></li>
				</ul>
			</div>
		</section>
		<!-- End page-banner-section -->

		<!-- courses-section 
			================================================== -->
		<section class="courses-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<div class="courses-top-bar">
							<div class="courses-view">
								<a href="{{url('courses')}}" class="grid-btn active">
									<i class="fa fa-th-large" aria-hidden="true"></i>
								</a>
								<a href="" class="grid-btn">
									<i class="fa fa-bars" aria-hidden="true"></i>
								</a>
								<span>Showing all Possible results</span>
							</div>
							<form class="search-course" method="post" action="{{url('front/search')}}">
								@csrf
								<input type="text" name="search" id="search_course" placeholder="Search Courses..." />
								<button type="submit">
									<i class="material-icons">search</i>
								</button>
							</form>
						</div>

						<div class="row">
                            @foreach($course as $cours)
                          
							<div class="col-lg-4 col-md-6 col-sm-6">
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
							@endforeach


						</div>
					</div>

					<div class="col-lg-4">
						<div class="sidebar">

							<div class="category-widget widget">
								<h2>Course categories</h2>
								<ul class="category-list">
									@foreach($catego as $cat)
									<li><a href="#">{{$cat->name}}</a></li>
									@endforeach
								</ul>
							</div>

							<div class="products-widget widget">
								<h2>Courses</h2>
								<ul class="products-list">
									@foreach($course as $cours)
									<li>
										<a href="{{url('course_detail/'.$cours->id)}}"><img src="{{ url('/uploade/'.$cours->c_image) }}" alt=""></a>
										<div class="list-content">
											<h3><a href="{{url('course_detail/'.$cours->id)}}">{{$cours->c_name}}</a></h3>
											<span>Rs{{$cours->c_price}}</span>
										</div>
									</li>
									@endforeach
								</ul>
							</div>

							<div class="ads-widget widget">
								<a href="#">
									<img src="https://inspiria.edu.in/wp-content/uploads/2018/07/best-courses-to-study-for-the-future.jpg" alt="">
								</a>
							</div>

						</div>
					</div>

				</div>
						
			</div>
		</section>
		<!-- End courses section -->




@endsection