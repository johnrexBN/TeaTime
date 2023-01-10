<!-- cart -->
<div class="cart-section mt-80 mb-80">
	<div class="container">
		<div class="row">
			
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row" style="background-color: black; color: white; opacity: 0.7;">
						
									<th class="product-remove" style="border: 2px solid black;"></th>
									<th class="product-image" style="border: 2px solid black;">Product Image</th>
									<th class="product-name" style="border: 2px solid black;">Name</th>
									<th class="product-price" style="border: 2px solid black;">Price</th>
									<th class="product-quantity" style="border: 2px solid black;">Quantity</th>
									<th class="product-total" style="border: 2px solid black;">Total</th>
									<th style="border: 2px solid black;">Remove</th>
								</tr>
							</thead>
							<tbody>
							<form action="checkout" method="post">
								<?php if (count($cart) > 0) : ?>
									<?php foreach ($cart as $item) : ?>
										<tr class="table-body-row">
											
											<td class="product-remove" style="border: 2px solid black;"><input type="checkbox" value="<?= $item['id'] ?>" name="id[]"></td>
											<td style="color: #000; border: 2px solid black;" class="product-image"><img src="<?= base_url() . '/' . 'uploads/' . $item['image'] ?>" alt=""></td>
											<td style="color: #000; border: 2px solid black;" class="product-name"><?= $item['name'] ?></td>
											<td style="color: #000; border: 2px solid black;" class="product-price">₱<?= number_format($item['prices'], 2) ?></td>
											<td style="color: #000; border: 2px solid black;" class="product-quantity" value="quantity"><?= $item['order_count'] ?></td>
											<td style="color: #000; border: 2px solid black;" class="product-total" value="total">₱<?= number_format($item['total'], 2) ?></td>
											<td style="color: #000; border: 2px solid black;"><a href="<?= site_url('delete_cart/' . $item['id']) ?>" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10">Remove</a></td>
										</tr>
									<?php endforeach; ?>
								<?php else : ?>

									<tr>
										<td>
											<p style="color: #212529;">No Items In Your Cart!!</p>
										</td>
									</tr>

								<?php endif; ?>
								</form>
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row" style="background-color: black; color: white; opacity: 0.7;">
									<th style="border: 2px solid black;">Total</th>
									<th style="border: 2px solid black;">Price</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td style="border: 2px solid black;"><strong>Subtotal: </strong></td>
									<td style="border: 2px solid black;">₱<?php if (empty($total[0]['total'])) {
																				echo ' 0.00';
																			} else {
																				echo ' ' . $total[0]['total'];
																			};  ?></td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
							<a href="cart" class="boxed-btn">Update Cart</a>
							<a href="checkout" class="boxed-btn black">Check Out</a>
						</div>
					</div>

					<div class="coupon-section mb-80	 mt-0">
						<h3>Apply Coupon</h3>
						<div class="coupon-form-wrap">
							<form action="index.html">
								<p style="border: 2px solid black;"><input type="text" placeholder="Coupon"></p>
								<p><input type="submit" value="Apply"></p>
							
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- end cart -->