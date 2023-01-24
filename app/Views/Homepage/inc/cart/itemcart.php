<!-- cart -->
<div class="cart-section mt-80 mb-80">
	<div class="container">
		<div class="row">
			
				<div class="col-lg-8 col-md-12" style="border-radius: 20px;">
					<div class="cart-table-wrap">
						<table class="cart-table" >
							<thead class="cart-table-head" >
								<tr class="table-head-row" style="background-color: #CB8C58; color: white; ">
									<th class="product-remove"></th>
									<th class="product-image" >Product Image</th>
									<th class="product-name" >Name</th>
									<th class="product-price" >Price</th>
									<th class="product-quantity" >Quantity</th>
									<th class="product-total">Total</th>
									<th>Action</th>
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
											<td style="color: #000; border: 2px solid black;" class="product-total" value="total">₱<?= $item['total'] ?></td>
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
								<button type="submit" id="submit" style="display:none"></button>
								</form>
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row" style="background-color: #CB8C58; color: white;">
									<th style="border: 1px solid white;">Total</th>
									<th style="border: 1px solid white;">Price</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td style="border: 1px solid white;"><strong>Subtotal: </strong></td>
									<td style="border: 1px solid white;">₱<?php if (empty($total[0]['total'])) {
																				echo ' 0.00';
																			} else {
																				echo ' ' . $total[0]['total'];
																			};  ?></td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
							<a href="#" id="checkout" class="bordered-btn" style="color: black; border-color: black;">Check Out</a>
						</div>
					</div>
				</div>
		</div>
	</div>
</div>
<!-- end cart -->