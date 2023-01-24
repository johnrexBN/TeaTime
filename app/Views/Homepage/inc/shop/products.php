
	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".Milktea">Milktea</li>
                            <li data-filter=".Foods">Foods</li>
                            <li data-filter=".Adds">Adds On</li>
                        </ul>
                    </div>
                </div>
            </div>
			<div class="row product-lists">
			<?php foreach($products as $prod): ?>
				<div class="col-lg-4 col-md-6 text-center <?=$prod['category'] ?>">
					<div class="single-product-item">
						<div class="product-image">
							<a href="<?= site_url('single_product/'.$prod['id'])?>"><img src="<?= base_url().'/'.'uploads/'.$prod['image'] ?>" alt=""></a>
							
						</div>
						<h3><?=$prod['name'] ?></h3>
						<p class="product-price"><span></span>₱<?= number_format( $prod['prices'],2) ?> </p>
						<a href="<?= site_url('single_product/'.$prod['id'])?>" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				<?php endforeach; ?>
			</div>

			<div class="row">
				<div class="col-lg-12 text-center mb-5">
					<div class="pagination-wrap">
						<ul>
							<li><a href="#">Prev</a></li>
							<li><a class="active" href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">Next</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end products -->
