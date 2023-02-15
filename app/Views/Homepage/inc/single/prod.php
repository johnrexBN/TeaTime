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
					<h3><span class="orange-text">Other</span> Products</h3>
					<p>Some other products you may like.</p>
				</div>
			</div>
		</div>
		
		<div class="row">
		<?php  shuffle($related); ?>
		<?php $i = 0; foreach($related as $prod): ?>
			<?php  $i++; 
					if($i <= 6):?>
			<div class="col-lg-4 col-md-6 text-center">
				<div class="single-product-item">
					<div class="product-image">
						<a href="<?= site_url('single_product/'.$prod['id'])?>"><img src="<?= base_url().'/'.'uploads/'.$prod['image'] ?>" alt=""></a>
					</div>
					<h3><?= $prod['name'] ?></h3>
					<p class="product-price"><span><?= $prod['description'] ?></span>₱<?=number_format( $prod['prices'],2)?></p>
					<a href="<?= site_url('single_product/'.$prod['id'])?>" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
				</div>
			</div>
			<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<!-- end more products -->