@extends("front.master")
@section("title",'login | Pneducation')

@section("content")
<div class="container-fluid bg-info p-2">
        <div class="card card-container">
            
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="post" action="{{url('addlogin/dologin')}}">
              @csrf
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                
                <button class="btn btn-lg btn-primary btn-block btn-signin btt" type="submit">Sign in</button>
            </form><!-- /form -->
            <div class="text-center p-t-12">
            <span class="txt1">
              Forgot
            </span>
            <a class="txt2" href="{{url('front/forgot_password')}}">
              Username / Password?
            </a>
          </div>
            <a href="{{url('login/google')}}" class="btn btn-google btn-user btn-block col-sm-10 input"> <i class="fab fa-google fa-fw"></i> Login with Google
                               
                               </a>
            <a href="{{url('signup')}}">
                Don't have account? Create now
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
<!-- <div class="container">
  <div class="row">
  	<div class="col-md-3"></div>
  	<div class="col-md-6" style="margin:20px;padding: 20px;border:2px solid black;">
      <h1 class="text-primary">USER LOGIN HERE</h1>
   <form method="post" action="{{url('addlogin/dologin')}}">
   	@csrf
   	Email:<input type="text" name="email" value="" class="form-control"><br><br>
   	Password:<input type="password" name="password" value="" class="form-control"><br><br>
   	<input type="submit" name="submit" value="submit" class="btn btn-primary" style="margin-bottom: 20px;"><br> -->
    <!-- <a href="{{ route('password.update') }}" class="btn btn-info">Forgot Password</a> -->
    <!-- <a href="{{url('login/google')}}" class="btn btn-google btn-user btn-block col-sm-10 input"> <i class="fab fa-google fa-fw"></i> Login with Google
                               
                               </a>
    <a href="{{url('signup')}}">Create accout</a> -->
   <!-- </form>
   </div> --><!--end col md 6-->
  <!--  <div class="col-md-3"></div>
  </div> --><!--end row-->
<!-- </div> --><!--end container-->



@endsection