
	<!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text" >Our</span> Products</h3>
						<p style="font-family: Open Sans, sans-serif; font-size: 18px;">Our best seller products are here for you! Regrets come later so what are you waiting for? Let's dig in!</p>
					</div>
				</div>
			</div>
			<div class="row">
			<?php $i = 0; foreach($products as $prod): ?>
				<?php  $i++; 
					if($i <= 3):?>
				<div class="col-lg-4 col-md-6 text-center">
						<div class="single-product-item">
							<div class="product-image">
								<a href="<?= site_url('single_product/'.$prod['id'])?>"><img src="<?= base_url() . '/' . 'uploads/' . $prod['image'] ?>" alt=""></a>
							</div>
							<h3><?= $prod['name']?></h3>
							<p class="product-price"><span>₱<?=number_format( $prod['prices'],2)?></span></p>
							<p><?= $prod['description']?></p>
							<a href="<?= site_url('single_product/'.$prod['id'])?>" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
						</div>
					</div>
					<?php endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<!-- end product section -->
	<!-- shop banner -->
	<section class="shop-banner">
    	<div class="container">
        	<h3>Summer sale is on! <br> with big <span class="orange-text">Discount...</span></h3>
            <div class="sale-percent"><span>Sale! <br> Upto</span>50% <span>off</span></div>
            <a href="shop" class="cart-btn btn-lg">Order Now</a>
        </div>
    </section>
	<!-- end shop banner -->

