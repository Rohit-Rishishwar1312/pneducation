@extends("admin.master");
@section("content")

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Coupan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">Coupan</li>
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
                <h3 class="card-title">Add Coupan</h3>

                <div class="card-tools">
                  <a class="btn btn-info btn-sm" href="" data-toggle="modal" data-target="#exampleModal">Add Coupan</a>
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
                  <th>Coupan code</th>
                  <th>Amount</th>
                  <th>Amount type</th>
                  <th>Status</th>
                  <th>Expiry date</th>
                  <th>Action</th>             
                </tr>
                </thead>
                <tbody>
                  @foreach($data as $d)
                    <tr class="bg-light">
                      <td>{{$d->coupan_code}}</td>
                      <td>{{$d->amount}}</td>
                      <td>{{$d->amount_type}}</td>
                      <td>{{$d->status}}</td>
                      <td>{{$d->expiry_date}}</td>
                      <td>
                        <a href="{{url('addcoupan/edit/'.$d->id)}}">Edit</a>
                        <a href="{{url('addcoupan/delete/'.$d->id)}}">Delete</a>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Coupan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
 <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<h1>Add Coupan</h1>
<form method="post" action="{{url('addcoupan/insert')}}">
  @csrf
  Coupan Code:
   <input type="text" name="coupan_code" class="form-control"><br><br>
  Amount:
   <input type="text" name="amount" class="form-control"><br><br>
  Amount Type: 
                    <select class="form-control" name="amount_type">
                        <option value="0">Select Type</option>
                        <option value="percentage">Percentage</option>
                        <option value="fixed">Fixed</option>
                    </select><br><br>
  
  Expiry Date:
   <input type="date" name="expiry_date" class="form-control"><br><br>
   
  
  
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