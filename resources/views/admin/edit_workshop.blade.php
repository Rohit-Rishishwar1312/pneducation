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

    <h1 style="padding-left: 20px;">Edit Workshop Details</h1><br><br>
    <div style="padding-left: 20px;padding-right: 70px;">
      <form method="post" action="{{url('addworkshop/update')}}" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="id" value="{{$edit->id}}">

                     Workshop Title:
                    <select class="form-control" name="w_title">
                        <option value="Xiaomi MI Company"
                        @if($edit->w_title=='Xiaomi MI Company')selected
                           @endif
                           >Xiaomi MI Company</option>
                        <option value="Bentchair Company"
                        @if($edit->w_title=='Bentchair Company')selected
                           @endif
                           >Bentchair Company</option>
                        <option value="MPCT College"
                        @if($edit->w_title=='MPCT College')selected
                           @endif
                           >MPCT College</option>
                        <option value="RJIT College"
                        @if($edit->w_title=='RJIT College')selected
                           @endif
                           >RJIT College</option>
                    </select>
  Image:
      <input type="file" name="w_image" class="form-control"><br><br>

      <img src="{{ url('/uploade/'.$edit->w_image) }}" style="height: 150px; width: 150px; border-radius: 100%;"><br><br>

        <input type="submit" class="btn-btn-primary" name="update" value="update"><br><br>

 </form>
    
    </div>

  </div>
  <!-- /.content-wrapper -->


@endsection