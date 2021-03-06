@extends("front.master")
@section("title",'Team | Pneducation')

@section("content")

  <!-- page-banner-section 
			================================================== -->
		<section class="page-banner-section">
			<div class="container">
				<h1>Our Team</h1>
				<ul class="page-depth">
					<li><a href="">Pninfosys</a></li>
					<li><a href="">Our Team</a></li>
				</ul>
			</div>
		</section>
		<!-- End page-banner-section -->

		<!-- teachers-section 
			================================================== -->
		<section class="teachers-section">
			<div class="container">
				<div class="teachers-box">
					<div class="row">
						@foreach($tm as $t)
						<div class="col-lg-3 col-md-6">
							<div class="teacher-post">
								<a href="">
									<img src="{{ url('/uploade/'.$t->ot_image)}}" alt="" style="height: 300px;">
									<div class="hover-post">
										<h2>{{$t->ot_name}}</h2>
										<span>{{$t->ot_des}}</span>
									</div>
								</a>
							</div>
						</div>
						@endforeach
						
					</div>
				</div>	
			</div>
		</section>
		<!-- End teachers section -->


@endsection