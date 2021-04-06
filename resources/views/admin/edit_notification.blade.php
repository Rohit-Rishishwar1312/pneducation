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

    <h1 style="padding-left: 20px;">Edit Notification Details</h1><br><br>
    <div style="padding-left: 20px;padding-right: 70px;">
      <form method="post" action="{{url('addnotification/update')}}">
      @csrf
      <input type="hidden" name="id" value="{{$edit->id}}">
      Notification:
      <textarea name="notification" class="form-control">{{$edit->notification}}</textarea><br><br>
      Start Date:
      <input type="date" name="s_date" class="form-control" value="{{$edit->s_date}}"><br><br>
      End Date:
      <input type="date" name="e_date" class="form-control" value="{{$edit->e_date}}"><br><br>
  

        <input type="submit" class="btn-btn-primary" name="update" value="update"><br><br>

 </form>
    
    </div>

  </div>
  <!-- /.content-wrapper -->


@endsection