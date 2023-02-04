<!-- Sweet alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <?php if(!empty(session()->getFlashdata('home'))) : ?>
      <script>swal("Welcome!", "You successfully login your account.", "success");</script>
      <?php endif ?>
<!-- /Sweet alert -->

	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						
						<div class="search-bar-tablecell">
							<form action="<?= site_url('search') ?>" method="post">
							<h3>Search For:</h3>
							<input type="text" name="search"  placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
							</form>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search area -->
	<!-- hero area -->
	<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle">Give life more flavours</p>
							<h1 style="text-align: center;">Tea Time Socorro</h1>
							<div class="hero-btns">
								<a href="<?= site_url('shop');?>" class="boxed-btn">Food Collection</a>
								<a href="<?= site_url('book');?>" class="bordered-btn">Reserve Now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end hero area -->
