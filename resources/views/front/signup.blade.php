@extends("front.master")
@section("title",'signup | Pneducation')

@section("content")
<div class="container">
  <div class="row">
  	<div class="col-md-3"></div>
  	<div class="col-md-6" style="margin:20px;padding: 30px;border:2px solid black;">
    <h1 class="text-primary">USER SIGN UP</h1>
   <form method="post" action="{{url('addsignup/save')}}">
   	@csrf
   	Full Name:<input type="text" name="name" value="" class="form-control"><br><br>
   	Email:<input type="text" name="email" value="" class="form-control"><br><br>
   	Password:<input type="text" name="password" value="" class="form-control"><br><br>
   	<input type="submit" name="submit" value="submit"  class="btn btn-primary" style="margin-bottom: 20px;">
   </form>
   </div><!--end col md 6-->
   <div class="col-md-3"></div>
  </div><!--end row-->
</div><!--end container-->



@endsection