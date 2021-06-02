@extends("front.master")
@section("title",'signup | Pneducation')

@section("content")
<div class="container register-form mt-4">
            <form method="post" action="{{url('addsignup/save')}}">
              @csrf
            <div class="form">
                <div class="note">
                    <p class="note">New Users Register here for completion of Registration</p>
                </div>

                <div class="form-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Your Name *" value=""/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="Email Address *" value=""/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="password" class="form-control" placeholder="Your Password *" value=""/>
                            </div>
                          
                        </div>
                    </div>
                    <input type="submit" name="submit" value="submit"  id="btnsubmit">
                </div>
            </div>
            </form>
        </div>


@endsection