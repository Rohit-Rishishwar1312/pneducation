<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bill Print | PN-Education</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('backend/dist/css/adminlte.min.css')}}">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <i class="fas fa-globe"></i> PN-Education || PN-Infosys Pvt.Ltd.
          <small class="float-right">Date: <?php
              $mytime = Carbon\Carbon::now();
              echo $mytime->toDateString();
              ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
                  @foreach($navbar as $a)
                  <address>
                    <strong>PN-Education || PN-Infosys Pvt.Ltd.</strong><br>
                    {{$a->nf_address}}<br>
                    Phone: {{$a->nf_phone}}<br>
                    Email: {{$a->nf_email}}<br>
                  </address>
                  @endforeach
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
                  @foreach($corder as $a)
                  @if($id==$a->id)
                  <address>
                    <strong>{{$a->name}}</strong><br>
                    {{$a->address}}<br>
                    {{$a->city}}, {{$a->state}}, {{$a->country}}, {{$a->pincode}}<br>
                    Phone: {{$a->phone}}<br>
                    Email: {{$a->user_email}}
                  </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Bill ID: <?php echo uniqid('PN'); ?></b><br>
                  <br>
                  <b>Order ID:</b> {{$a->id}}<br>
                  <b>Payment Date:</b> {{$a->created_at}}<br>
                  <b>Payment Methode:</b> {{$a->payment_method}}<br>
                  <b>Coupan Code:</b> {{$a->coupon_code}}
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped table-bordered">
          <thead>
          <tr>
            <th>Id #</th>
                      <th>Product</th>
                      <th>Qty</th>
                      <th>Price</th>
                      <th>Description</th>
                      <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
            <?php $total=0; ?>
          @foreach($corderd as $d)
                    @if($id==$d->course_order_id)
                    <tr>
                      <td>{{$d->course_id}}</td>
                      <td>{{$d->course_name}}</td>
                      <td>{{$d->course_quantity}}</td>
                      <td>₹{{$d->course_price}}</td>
                      <td>₹{{$d->course_price}}×{{$d->course_quantity}}</td>
                      <?php
                      $sub=($d->course_price)*($d->course_quantity);
                      ?>
                      <td>₹<?php echo $sub; ?></td>
                      <?php $total= $total+$sub; ?>
                    </tr>
                    @endif
                    @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">
        <p class="lead">Payment Methods:</p>
        
        <img src="https://image3.mouthshut.com/images/imagesp/925860650s.png" alt="Paytym" style="height:200px;width:300px;">
        <img src="https://png.pngtree.com/png-vector/20210502/ourmid/pngtree-cash-on-delivery-png-png-image_3257801.jpg" alt="cod" style="height:200px;width:300px;">

        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
          Something which makes PN INFOSYS different from other IT companies is that we train novice students and also make them work on Live projects
        </p>
        <h1>Thank You for your order!</h1>
      </div>
      <!-- /.col -->
      <div class="col-6">
        <p class="lead">Amount Due: {{$a->created_at}}</p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td>₹<?php echo $total; ?></td>
            </tr>
            <tr>
              <th>Coupan Code:</th>
              <td>{{$a->coupan_code}}</td>
            </tr>
            <tr>
              <th>Coupan Amount:</th>
              <td>{{$a->coupan_amount}}</td>
            </tr>
            <tr>
              <th>Total:</th>
              <td>₹{{$a->total}}</td>
            </tr>
          </table>
        </div>
      </div>
      @endif
      @endforeach
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>