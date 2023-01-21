<!-- check out section -->
<div class="checkout-section mt-80 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="checkout-accordion-wrap">
					<div class="accordion" id="accordionExample">
						<div class="card single-accordion">
							<div class="card-header" id="headingOne">
								<h5 class="mb-0">
									<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="background-color: black; color: white; opacity: 0.7;">
										Customer Info
									</button>
								</h5>
							</div>

							<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
								<div class="card-body">
									<div class="billing-address-form">
										<form action="index.html">
											<p><input type="text" placeholder="Name"></p>
											<p><input type="email" placeholder="Email"></p>
											<p><input type="tel" placeholder="Phone"></p>
											<p><textarea name="bill" id="bill" cols="30" rows="10" placeholder="Say Something"></textarea></p>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="card single-accordion">
							<div class="card-header" id="headingTwo">
								<h5 class="mb-0">
									<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="background-color: black; color: white; opacity: 0.7;">
										Orders
									</button>
								</h5>
							</div>
							<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
								<div class="card-body">
									<div class="shipping-address-form">
										<div class="cart-table-wrap">
											<table class="cart-table">
												<thead class="cart-table-head">
													<tr class="table-head-row" style="background-color: black; color: white; opacity: 0.7;">
														<th class="product-image" style="border: 2px solid black;">Product Image</th>
														<th class="product-name" style="border: 2px solid black;">Name</th>
														<th class="product-price" style="border: 2px solid black;">Price</th>
														<th class="product-quantity" style="border: 2px solid black;">Quantity</th>
														<th class="product-total" style="border: 2px solid black;">Total</th>
													</tr>
												</thead>
												<tbody>
													<form action="checkout" method="post">
														<?php if (count($cart) > 0) : ?>
															<?php foreach ($cart as $item) : ?>
																<tr class="table-body-row">
																	<td style="color: #000; border: 2px solid black;" class="product-image"><img src="<?= base_url() . '/' . 'uploads/' . $item['image'] ?>" alt=""></td>
																	<td style="color: #000; border: 2px solid black;" class="product-name"><?= $item['name'] ?></td>
																	<td style="color: #000; border: 2px solid black;" class="product-price">₱<?= number_format($item['prices'], 2) ?></td>
																	<td style="color: #000; border: 2px solid black;" class="product-quantity" value="quantity"><?= $item['order_count'] ?></td>
																	<td style="color: #000; border: 2px solid black;" class="product-total" value="total">₱<?= $item['total'] ?></td>
																</tr>
															<?php endforeach; ?>

														<?php endif; ?>
													</form>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="order-details-wrap">
					<table class="order-details">
						<thead>
							<tr style="border: 2px solid black;">
								<th style="border: 2px solid black; background-color: black; color: white; opacity: 0.7;">Your Order Total</th>
								<th style="background-color: black; color: white; opacity: 0.7;">Price</th>
							</tr>
						</thead>
						<tbody class="order-details-body">
							<tr>
								<td style="border: 2px solid black;">Subtotal</td>
								<td style="border: 2px solid black;">₱<?= $total[0]['total']?></td>
							</tr>
							

						</tbody>
						
					</table>
					<a href="" class="boxed-btn">Place Order</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end check out section -->