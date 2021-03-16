@extends("front.master")
@section("title",'Home | Pneducation')

@section("content")
   <!-- page-banner-section 
			================================================== -->
		<section class="page-banner-section">
			<div class="container">
				<h1>Courses</h1>
				<ul class="page-depth">
					<li><a href="index.html">Home</a></li>
					<li><a href="courses.html">Courses</a></li>
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
								<a href="courses.html" class="grid-btn active">
									<i class="fa fa-th-large" aria-hidden="true"></i>
								</a>
								<a href="courses-list.html" class="grid-btn">
									<i class="fa fa-bars" aria-hidden="true"></i>
								</a>
								<span>Showing all Possible results</span>
							</div>
							<form class="search-course">
								<input type="search" name="search" id="search_course" placeholder="Search Courses..." />
								<button type="submit">
									<i class="material-icons">search</i>
								</button>
							</form>
						</div>

						<div class="row">
							@foreach($course as $cours)
							@if($catego->name==$cours->c_category)
							  <div class="col-lg-4 col-md-6 col-sm-6">
								<div class="course-post">
									<div class="course-thumbnail-holder">
										<a href="single-course.html">
											<img src="{{ url('/uploade/'.$cours->c_image)}}" alt="" style="height: 150px;">
										</a>
									</div>
									<div class="course-content-holder">
										<div class="course-content-main">
											<h2 class="course-title">
												<a href="single-course.html">{{$cours->c_name}}</a>
											</h2>
											<p>{{$cours->c_des}}</p>
										</div>
										<div class="course-content-bottom">
						
											<div class="course-price">
												<span>Rs{{$cours->c_price}}</span>
											</div>
										</div>
									</div>
								</div>
							  </div>
							@else
							  @continue
							@endif

							@endforeach

						</div>
					</div>

					<div class="col-lg-4">
						<div class="sidebar">

							<div class="category-widget widget">
								<h2>course categories</h2>
								<ul class="category-list">
									<li><a href="#">{{$catego->name}}</a></li>
								</ul>
							</div>

							<div class="products-widget widget">
								<h2>courses</h2>
								<ul class="products-list">
									@foreach($course as $cours)
							        @if($catego->name==$cours->c_category)
									  <li>
										<a href="single-course.html"><img src="{{ url('/uploade/'.$cours->c_image)}}" alt=""></a>
										<div class="list-content">
											<h3><a href="single-course.html">{{$cours->c_name}}</a></h3>
											<span>Rs{{$cours->c_price}}</span>
										</div>
									  </li>
									@else
							           @continue
							        @endif

							        @endforeach
								</ul>
							</div>

							<div class="ads-widget widget">
								<a href="#">
									<img src="{{url('upload/blog/ad-banner.jpg')}}" alt="">
								</a>
							</div>

						</div>
					</div>

				</div>
						
			</div>
		</section>
		<!-- End courses section -->




@endsection