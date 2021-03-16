@extends("admin.master")
@section("content")

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <h1 style="padding-left: 20px;">Edit Contact Details</h1><br><br>
    <div style="padding-left: 20px;padding-right: 70px;">
      <form method="post" action="{{url('addcontact/update')}}">
      @csrf
      <input type="hidden" name="id" value="{{$edit->id}}">
  Phone:
      <input type="text" name="phone" value="{{$edit->phone}}" class="form-control"><br><br>
  Email:
      <input type="text" name="email" value="{{$edit->email}}" class="form-control"><br><br>
  Address:
      <input type="text" name="address" value="{{$edit->address}}" class="form-control"><br><br>
  Office:
      <input type="text" name="office" value="{{$edit->office}}" class="form-control"><br><br>
  

        <input type="submit" class="btn-btn-primary" name="update" value="update"><br><br>

 </form>
    
    </div>

  </div>
  <!-- /.content-wrapper -->


@endsection