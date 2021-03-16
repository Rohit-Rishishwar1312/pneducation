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
              <li class="breadcrumb-item"><a href="#">Show</a></li>
              <li class="breadcrumb-item active">Dashboard Admin</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <h1 style="padding-left: 20px;">Edit Course Details</h1><br><br>
    <div style="padding-left: 20px;padding-right: 150px;">
     <form method="post" action="{{url('addcourse/update')}}" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="id" value="{{$edit->id}}">
  Name:
   <input type="text" name="c_name" value="{{$edit->c_name}}" class="form-control"><br><br>
  Description:
   <textarea name="c_des" class="form-control">{{$edit->c_des}}</textarea><br><br>
  Price:
   <input type="text" name="c_price" value="{{$edit->c_price}}" class="form-control"><br><br>
  Detail:
   <textarea name="c_detail" class="form-control">{{$edit->c_detail}}</textarea><br><br>
  Include:
   <textarea name="c_include" class="form-control">{{$edit->c_include}}</textarea><br><br>

  Content:
   <textarea name="c_content" class="form-control">{{$edit->c_content}}</textarea><br><br>
  Image:
   <input type="file" name="c_image" class="form-control"><br><br>
   <img src="{{ url('/uploade/'.$edit->c_image) }}" style="height: 150px; width: 150px; border-radius: 100%;"><br><br>

   <select class="form-control" name="c_category">
    <option>Select Category</option>
    @foreach($cate as $cat)
    <option>{{$cat->name}}</option>
    @endforeach
  
     
   </select><br><br>

  
   <input type="submit" class="btn-btn-primary bg-primary" name="update" value="update"><br>

 </form>   

   </div>

  </div>
  <!-- /.content-wrapper -->


@endsection