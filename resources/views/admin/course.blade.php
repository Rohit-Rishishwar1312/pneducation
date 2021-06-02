@extends("admin.master");
@section("content")

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">course</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">course</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!--data table-->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Add course</h3>

                <div class="card-tools">
                  <a class="btn btn-info btn-sm" href="" data-toggle="modal" data-target="#exampleModal">Add course</a>
</div>
              </div>
              <div class="card-body">
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
                 @endif
            @if(session('message'))

         <p class ="alert alert-success">
          {{session('message')}}
         </p>
          
            @endif
                   
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Detail</th>
                  <th>Includes</th>
                  <th>Content</th>
                  <th>Image</th>
                  <th>Category</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                  @foreach($data as $d)
                    <tr class="bg-light">
                      <td>{{$d->c_name}}</td>
                      <td>{{$d->c_des}}</td>
                      <td>{{$d->c_price}}</td>
                      <td>{{$d->c_detail}}</td>
                      <td>{{$d->c_include}}</td>
                      <td>{{$d->c_content}}</td>
                      <td><img src="{{ url('/uploade/'.$d->c_image) }}" style="height: 100px; width: 120px; border-radius: 100%;"></td>
                      <td>{{$d->c_category}}</td>
                      <td>
                        <a href="{{url('addcourse/edit/'.$d->id)}}">Edit</a>
                        <a href="{{url('addcourse/delete/'.$d->id)}}">Delete</a>
                      </td>
                    </tr>
                  @endforeach
                  
                </tbody>
                
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

    <!--modal form-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
 <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<h1>Add course</h1>
<form method="post" action="{{url('addcourse/insert')}}" enctype="multipart/form-data">
  @csrf
  Name:
   <input type="text" name="c_name" class="form-control"><br><br>
  Description:
   <textarea name="c_des" class="form-control">Enter here..</textarea><br><br>
  Price:
   <input type="text" name="c_price" class="form-control"><br><br>
  Detail:
   <textarea name="c_detail" class="form-control">Enter here..</textarea><br><br>
  Include:
   <textarea name="c_include" class="form-control">Enter here..</textarea><br><br>
  Content:
   <textarea name="c_content" class="form-control">Enter here..</textarea><br><br>
  Image:
   <input type="file" name="c_image" class="form-control"><br><br>
   <select class="form-control" name="c_category">
    <option>Select Category</option>
    @foreach($cour as $c)
    <option>{{$c->name}}</option>
    @endforeach
    
     
   </select><br><br>

  
   <input type="submit" class="btn-btn-primary bg-primary" name="submit" value="submit">

 </form>
</div>
  </div>
</div>
   </div>

    <h1>Dashboard</h1>

  </div>
  <!-- /.content-wrapper -->


@endsection