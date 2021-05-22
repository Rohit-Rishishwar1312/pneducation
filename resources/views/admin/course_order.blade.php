@extends("admin.master");
@section("content")

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Course Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Course Order</li>
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
                <h3 class="card-title">Course Order</h3>

                <div class="card-tools">
                  
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
                   
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Order Course Image</th>
                  <th>Order Course Name</th>  
                  <th>Order Course Price</th>  
                  <th>Order Course Quantity</th>
                  <th>Order Note</th>
                  <th>Action</th>         
                </tr>
                </thead>
                <tbody>
                  @foreach($data as $d)
                    <tr class="bg-light">
                      <td>{{$d->name}}</td>
                      <td>{{$d->user_email}}</td>
                      <td>{{$d->address}} {{$d->city}} {{$d->state}} {{$d->pincode}} {{$d->country}}</td>
                      <td><img src="{{ url('/uploade/'.$d->image) }}" style="height: 100px; width: 120px; border-radius: 100%;"></td>
                      <td>{{$d->course_name}}</td>
                      <td>{{$d->course_price}}</td>
                      <td>{{$d->course_quantity}}</td>
                      <td>{{$d->order_note}}</td>
                      <td><a href="{{url('admin/invoice/'.$d->id)}}">
                            <input class="btn-danger" type="submit" name="submit" value="Invoice">
                          </a>
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


    <h1>Dashboard</h1>

  </div>
  <!-- /.content-wrapper -->


@endsection