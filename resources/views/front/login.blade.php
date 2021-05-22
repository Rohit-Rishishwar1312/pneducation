@extends("front.master")
@section("title",'login | Pneducation')

@section("content")
<div class="container">
  <div class="row">
  	<div class="col-md-3"></div>
  	<div class="col-md-6" style="margin:20px;padding: 20px;border:2px solid black;">
      <h1 class="text-primary">USER LOGIN HERE</h1>
   <form method="post" action="{{url('addlogin/dologin')}}">
   	@csrf
   	Email:<input type="text" name="email" value="" class="form-control"><br><br>
   	Password:<input type="text" name="password" value="" class="form-control"><br><br>
   	<input type="submit" name="submit" value="submit" class="btn btn-primary" style="margin-bottom: 20px;"><br>
    <!-- <a href="{{ route('password.update') }}" class="btn btn-info">Forgot Password</a> -->
    <a href="{{url('login/google')}}" class="btn btn-google btn-user btn-block col-sm-10 input"> <i class="fab fa-google fa-fw"></i> Login with Google
                               
                               </a>
    <a href="{{url('signup')}}">Create accout</a>
   </form>
   </div><!--end col md 6-->
   <div class="col-md-3"></div>
  </div><!--end row-->
</div><!--end container-->



@endsection