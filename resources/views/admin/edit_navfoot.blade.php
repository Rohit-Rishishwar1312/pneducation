@extends("admin.master")
@section("content")

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Edit</a></li>
              <li class="breadcrumb-item active">Dashboard Admin</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <h1 style="padding-left: 20px;">Edit Navbar/Footer Details</h1><br><br>
    <div style="padding-left: 20px;padding-right: 150px;">
     <form method="post" action="{{url('addnavfoot/update')}}" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="id" value="{{$edit->id}}">
  Email:
   <input type="text" name="nf_email" value="{{$edit->nf_email}}" class="form-control"><br><br>
  Phone No:
   <input type="text" name="nf_phone" value="{{$edit->nf_phone}}" class="form-control"><br><br>
  Description:
   <textarea name="nf_des" class="form-control">{{$edit->nf_des}}</textarea><br><br>
  Address:
   <input type="text" name="nf_address" value="{{$edit->nf_address}}" class="form-control"><br><br>
  Logo:
   <input type="file" name="nf_logo_image" class="form-control"><br><br>
   <img src="{{ url('/uploade/'.$edit->nf_logo_image) }}" style="height: 150px; width: 150px; border-radius: 100%;"><br><br>
  

  
   <input type="submit" class="btn-btn-primary bg-primary" name="update" value="update"><br><br>

 </form>   

   </div>

  </div>
  <!-- /.content-wrapper -->


@endsection