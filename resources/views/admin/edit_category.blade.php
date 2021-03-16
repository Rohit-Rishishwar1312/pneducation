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

    <h1 style="padding-left: 20px;">Edit category Details</h1><br><br>
    <div style="padding-left: 20px;padding-right: 70px;">
      <form method="post" action="{{url('addcategory/update')}}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{$ed->id}}">
      Name:
        <input type="text" name="name" class="form-control" value="{{$ed->name}}"><br><br>
      Image:
        <input type="file" name="ca_image" class="form-control"><br><br>
        <img src="{{ url('/uploade/'.$ed->ca_image) }}" style="height: 150px; width: 150px; border-radius: 100%;"><br><br>

        <input type="submit" class="btn-btn-primary" name="update" value="update">

 </form>
    
    </div>

  </div>
  <!-- /.content-wrapper -->


@endsection