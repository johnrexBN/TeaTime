<!-- cart -->
<div class="cart-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-12">
				<div class="cart-table-wrap">
					<table class="cart-table">
						<thead class="cart-table-head">
							<tr class="table-head-row">
								<th class="product-remove"></th>
								<th class="product-image">Product Image</th>
								<th class="product-name">Name</th>
								<th class="product-price">Price</th>
								<th class="product-quantity">Quantity</th>
								<th class="product-total">Total</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach($cart as $item) : ?>
							<tr class="table-body-row">
								
									<td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a></td>
									<td style="color: #000;" class="product-image" ><img src="<?= base_url() . '/' . 'uploads/' . $item['image'] ?>" alt=""></td>
									<td style="color: #000;" class="product-name"><?=$item['name'] ?></td>
									<td style="color: #000;" class="product-price">₱<?= number_format( $item['prices'],2 )?></td>
									<td style="color: #000;" class="product-quantity" value="quantity"><?= $item['quantity'] ?></td>
									<td style="color: #000;" class="product-total" value="total">₱<?= number_format( $item['total'],2) ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="total-section">
					<table class="total-table">
						<thead class="total-table-head">
							<tr class="table-total-row">
								<th>Total</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
							<tr class="total-data">
								<td><strong>Subtotal: </strong></td>
								<?php foreach($total as $subtotal) : ?>
								<td>₱<?= number_format( $subtotal['total'],2) ?></td>
								<?php endforeach;?>
							</tr>
						</tbody>
					</table>
					<div class="cart-buttons">
						<a href="cart" class="boxed-btn">Update Cart</a>
						<a href="checkout" class="boxed-btn black">Check Out</a>
					</div>
				</div>

				<div class="coupon-section">
					<h3>Apply Coupon</h3>
					<div class="coupon-form-wrap">
						<form action="index.html">
							<p><input type="text" placeholder="Coupon"></p>
							<p><input type="submit" value="Apply"></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end cart -->