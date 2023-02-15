<!-- cart -->
<div class="cart-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-12" style="border-radius: 20px;">
				<div class="cart-table-wrap">
					<p style="color: #212529; font-size: 30px; font-weight: bold; font-family: Poppins, sans-serif;">REVIEW ORDER</p>
					<table class="cart-table" style="box-shadow: 5px 5px;">
						<thead class="cart-table-head">
							<tr class="table-head-row" style="background-color: #CB8C58; color: white; font-weight: bolder; border-left: 1px solid black;  border-top: 1px solid black;  ">
								<th class="product-remove" style="font-weight: bold; font-family: Poppins, sans-serif; ">MARK</th>
								<th class="product-image" style="font-weight: bold; font-family: Poppins, sans-serif;">PRODUCT IMAGE</th>
								<th class="product-name" style="font-weight: bold; font-family: Poppins, sans-serif;">NAME</th>
								<th class="product-price" style="font-weight: bold; font-family: Poppins, sans-serif;">PRICE</th>
								<th class="product-quantity" style="font-weight: bold; font-family: Poppins, sans-serif;">QUANTITY</th>
								<th class="product-total" style="font-weight: bold; font-family: Poppins, sans-serif;">TOTAL</th>
								<th style="border-right: 1px solid black; font-weight: bold; font-family: Poppins, sans-serif;">ACTION</th>
							</tr>
						</thead>
						<tbody>
							<form action="checkout" method="post">
								<?php if (count($cart) > 0) : ?>
									<?php foreach ($cart as $item) : ?>
										<tr class="table-body-row">

											<td class="product-remove" style="border-left: 1px solid black; font-family: Poppins, sans-serif; border-bottom: 1px solid black;"><input type="checkbox" value="<?= $item['id'] ?>" name="id[]"></td>
											<td style="color: #000; border-bottom: 1px solid black; font-family: Poppins, sans-serif; " class="product-image"><img src="<?= base_url() . '/' . 'uploads/' . $item['image'] ?>" alt=""></td>
											<td style="color: #000; border-bottom: 1px solid black; font-family: Poppins, sans-serif; " class="product-name"><?= $item['name'] ?></td>
											<td style="color: #000; border-bottom: 1px solid black; font-family: Poppins, sans-serif; " class="product-price">₱<?= number_format($item['prices'], 2) ?></td>
											<td style="color: #000; border-bottom: 1px solid black; font-family: Poppins, sans-serif; " class="product-quantity" value="quantity"><?= $item['order_count'] ?></td>
											<td style="color: #000; border-bottom: 1px solid black; font-family: Poppins, sans-serif; " class="product-total" value="total">₱<?= $item['total'] ?></td>
											<td style="color: #000; border-bottom: 1px solid black; font-family: Poppins, sans-serif; border-right: 1px solid black; border-bottom: 1px solid black "><a href="<?= site_url('delete_cart/' . $item['id']) ?>" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash"></i></a></td>
										</tr>
									<?php endforeach; ?>
								<?php else : ?>

									<tr style="box-shadow: 5px 5px; color: #000; opacity: 0.7;">
										<td colspan='7' style="border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black">
											<p style="color: #212529;">NO ITEMS IN YOUR CART</p>
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
					<table class="total-table" style="margin-top: 70px;">
						<thead class="total-table-head">
							<tr class="table-total-row" style="background-color: #CB8C58; color: white;">
								<th style="border: 1px solid white; font-weight: bold; font-family: Poppins, sans-serif;">TOTAL</th>
								<th style="border: 1px solid white; font-weight: bold; font-family: Poppins, sans-serif;">PRICE</th>
							</tr>
						</thead>
						<tbody>
							<tr class="total-data">
								<td style="border: 1px solid white; font-weight: bold; font-family: Poppins, sans-serif;"><strong>Subtotal: </strong></td>
								<td style="border: 1px solid white;">₱<?php if (empty($total[0]['total'])) {
																			echo ' 0.00';
																		} else {
																			echo ' ' . $total[0]['total'];
																		};  ?></td>
							</tr>
						</tbody>
					</table>
					<div class="cart-buttons">
						<a href="#" id="checkout" class="bordered-btn" style="color: black; border-color: #CB8C58;">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end cart -->