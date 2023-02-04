<!-- single product -->
<div class="single-product mt-150 mb-150">
	<div class="container">

		<div class="row">

			<input type="hidden" name="productid" value="<?= $products['id']; ?>">
			<div class="col-md-4">
				<div class="single-product-img">
					<img style="height: 500px; weight: 300px;" src="<?= base_url() . '/' . 'uploads/' . $products['image'] ?>" alt="">
				</div>
			</div>
			<div class="col-md-6">
				<div class="single-product-content">
					<h3 style="font-size: 50px; margin-top: 20px;"><?= $products['name'] ?></h3>
					<p class="single-product-pricing">₱ <?= $products['prices'] ?>.00</p>
					<p style="font-size: 20px;"><?= $products['description'] ?></p>
					<p ><strong>Categories: </strong><?= $products['category'] ?></p> 
					<strong style="opacity: 0.9;">Select Size: </strong><select style="margin-top: 10px; margin-bottom: 10px;" class="selectpicker" title="Choose Sizes" data-style="btn-info">
							<option value="Small">Small</option>
							<option value="Medium">Medium</option>
							<option value="Large">Large</option>
						</select>
					<div class="single-product-form">
						<form action="<?= site_url('userCart') ?>" method="post" >
						<strong style="opacity: 0.9;">Select Quantity: </strong><input type="number"  min="1" max="<?= $products['stocks'] ?>" name="quantity" style=" width: 50px;"
							value="1"> 	
							<input type="hidden" value="<?= $products['id']?>" name="id"><br>
							<button style="font-family: 'Poppins', sans-serif; background-color: #cb8c58; color: #fff; padding: 10px 20px; border-color: #cb8c58; margin-top: 100px;" type="submit" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
						</form>
						
					</div>
				</div>
			</div>

		</div>


	</div>
</div>
<!-- end single product -->

<!-- more products -->
<div class="more-products mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="section-title">
					<h3><span class="orange-text">Related</span> Products</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-md-6 text-center">
				<div class="single-product-item">
					<div class="product-image">
						<a href="single-product.html"><img src="assets/img/products/product-img-1.jpg" alt=""></a>
					</div>
					<h3>Strawberry</h3>
					<p class="product-price"><span>Per Kg</span> 85$ </p>
					<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 text-center">
				<div class="single-product-item">
					<div class="product-image">
						<a href="single-product.html"><img src="assets/img/products/product-img-2.jpg" alt=""></a>
					</div>
					<h3>Berry</h3>
					<p class="product-price"><span>Per Kg</span> 70$ </p>
					<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3 text-center">
				<div class="single-product-item">
					<div class="product-image">
						<a href="single-product.html"><img src="assets/img/products/product-img-3.jpg" alt=""></a>
					</div>
					<h3>Lemon</h3>
					<p class="product-price"><span>Per Kg</span> 35$ </p>
					<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end more products -->