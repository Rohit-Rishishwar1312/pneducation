@extends("admin.master")

@section('content')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    @foreach($data as $d)
    @if($id==$d->id)
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> PN-INFOSYS Education System.
                    <small class="float-right">Date: <?php
              $mytime = Carbon\Carbon::now();
              echo $mytime->toDateString();
              ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  @foreach($navf as $n)
                  <address>
                   
                    Name:- <strong> PN-Education || PN-Infosys Pvt.Ltd. </strong><br>
                    Address:- <strong> {{$n->nf_address}} </strong><br>
                    Email:- <strong> {{$n->nf_email}} </strong>

                  </address>
                  @endforeach
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>{{$d->name}}</strong><br>
                    {{$d->address}}<br>
                    {{$d->city}} {{$d->state}} {{$d->pincode}}<br>
                    Email: {{$d->user_email}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice <?php echo uniqid('PN'); ?></b><br>
                  <br>
                  <b>Course ID:</b> {{ $d->course_id }}<br>
                  <b>Order ID:</b> {{ $d->course_order_id }}<br>
                  <b>Payment Status:</b> {{ $d->order_status }}<br>
                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr class="text-center">
                      <th scope="col">Course Qty</th>
                      <th scope="col">Course Name</th>
                      <th scope="col">Course-id</th>
                      <th scope="col">Description</th>
                      <th scope="col">Course Image</th>
                      <th scope="col">Course Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="text-center">
                      <td scope="col"> {{ $d->course_quantity }} </td>
                      <td scope="col"> {{ $d->course_name }} </td>
                      <td scope="col"> {{ $d->course_id }} </td>
                      <td scope="col"> {{ $d->order_note }} </td>
                      <td scope="col"> 
                        <img src="{{ url('/uploade/'.$d->image) }}" style="height: 80px; width: 80px; border-radius: 100%;">
                      </td>
                      <td scope="col">{{ $d->course_price }}</td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                
                <div class="col-6"></div>

                <div class="col-6">
                  
                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>{{$d->course_price}}</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>{{$d->course_price*$d->course_quantity}}</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="#" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @endif
    @endforeach

  </div>
  <!-- /.content-wrapper -->

@endsection