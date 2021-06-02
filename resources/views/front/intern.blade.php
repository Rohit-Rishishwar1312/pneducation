@extends("front.master")
@section("title",'Intern | Pneducation')

@section("content")

  <!-- page-banner-section 
			================================================== -->
		<section class="page-banner-section">
			<div class="container">
				<h1>Intern</h1>
				<ul class="page-depth">
					<li><a href="">Pninfosys</a></li>
					<li><a href="">Intern</a></li>
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
						@foreach($in as $i)
						<div class="col-lg-3 col-md-6">
							<div class="teacher-post">
								<a href="">
									<img src="{{ url('/uploade/'.$i->i_image)}}" alt="" style="height: 300px;">
									<div class="hover-post">
										<h2>{{$i->i_name}}</h2>
										<h2>{{$i->i_designation}}</h2>
										<h2>{{$i->i_company}}</h2>
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