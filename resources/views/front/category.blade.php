@extends("front.master")
@section("title",'categories | pneducation')

@section("content")

  <!-- collection-section 
			================================================== -->
		<section class="collection-section">
			<div class="container">
				<div class="title-section">
					<div class="left-part">
						<span>Categories</span>
						<h1>See all the categories</h1>
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



@endsection