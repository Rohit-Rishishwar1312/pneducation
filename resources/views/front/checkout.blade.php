@extends("front.master")
@section("title",'checkout | Pneducation')

@section("content")

 <!-- page-banner-section 
			================================================== -->
		<section class="page-banner-section">
			<div class="container">
				<h1>Checkout</h1>
				<ul class="page-depth">
					<li><a href="index.html">Pninfosys</a></li>
					<li><a href="checkout.html">Checkout</a></li>
				</ul>
			</div>
		</section>
		<!-- End page-banner-section -->

		<!-- cart-section 
			================================================== -->
		<section class="cart-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<div class="cart-box">
							<h2>Billing details</h2>
							<form class="billing-details" method="post" action="front/checkout/insert_order">
								@csrf
								<div class="row">
									<div class="col-lg-12">
										<label for="first-name">Name *</label>
										<input type="text" id="first-name" name="name" value="{{ Auth::user()->name }}" />
									</div>
									
								</div>

								<input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
								
								<label for="country">Country *</label>
								<input type="text" id="country" name="country" placeholder="Enter Country" />
								<label for="street-name">address *</label>
								<input type="text" name="address" id="street-name" placeholder="Enter complete address" />
								
								<label for="city-name">City *</label>
								<input type="text" name="city" id="city-name" />
								<label for="state-name">State *</label>
								<input type="text" name="state" id="state-name" />
								<label for="postcode-name">Pincode *</label>
								<input type="text" name="pincode" id="postcode-name" />
								<label for="phone-name">Phone *</label>
								<input type="text" name="phone" id="phone-name" />
								<label for="email-address">Email Address *</label>
								<input type="text" name="user_email" value="{{ Auth::user()->email }}" id="email-address" />
								<h2>Additional information</h2>
								<label for="notes">Order notes (optional)</label>
								<textarea id="notes" name="order_note" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
							
						</div>
					</div>
					<div class="col-lg-4">
						<div class="sidebar">
							<div class="widget cart-widget">
								<h2>Your order</h2>
								<table>
									<tbody>
										<tr>
											<td>Course</td>
											<td>Total</td>
										</tr>
										<?php $total_amount=0; ?>
										@foreach($carts as $c)
										<tr>
											<td class="name-pro">{{$c->course_name}}  × {{$c->course_quantity}}</td>
											<td>{{$c->course_price*$c->course_quantity}}</td>
											<?php $total_amount=$total_amount+($c->course_price*$c->course_quantity); ?>
										</tr>
										@endforeach
										
										<tr class="order-total">
											<th>Subtotal</th>
											<td><?php echo $total_amount; ?></td>
										</tr>
										<tr class="order-total">
											<th>Total</th>
											<td class="total-price"><?php echo $total_amount; ?></td>
										</tr>
									</tbody>
								</table>
								<!--<a href="#" class="checkout-button">Proceed to Complete</a>-->
								<input type="submit" name="submit" value="proceed to complete" class="btn" style="background-color:orange;width:330px;border-radius: 35px;margin-bottom:10px;padding: 10px;"></input>

							</div>
						</div>
					</div>

				</div>
				</form>
			</div>
		</section>
		<!-- End cart section -->



@endsection