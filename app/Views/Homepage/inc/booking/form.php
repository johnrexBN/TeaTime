<!-- contact form -->
<div class="contact-from-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 mb-5 mb-lg-0">
				<div class="form-title">
					<h2>Ready to have your dinner?</h2>
					<p>Regrets comes later so book now in advance and have your dinner sits reserve! We at TeaTime priorities our customers needs before anything else.</p>
				</div>
				<div id="form_status"></div>
				<div class="contact-form">
					<form type="POST" id="fruitkha-contact" onSubmit="return valid_datas( this );">
						<p>
							<input type="text" placeholder="Name" name="name" id="name">
							<input type="email" placeholder="Email" name="email" id="email">
						</p>
						<p>
							<input type="tel" placeholder="Phone" name="phone" id="phone">
							<input type="text" placeholder="Subject" name="subject" id="subject">
						</p>
						<div class="input-group mb-3">
							<select class="custom-select" id="inputGroupSelect02" >
								<option value="1">One</option>
								<option value="2">Two</option>
								<option value="3">Three</option>
								<option value="4">Four</option>
							</select>
							<div class="input-group-append">
								<label class="input-group-text" for="inputGroupSelect02">Tables</label>
							</div>
						</div>

						<p><textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea></p>
						<input type="hidden" name="token" value="FsWga4&@f6aw" />

						<form action="">
							<input class="form-control" type="datetime-local" placeholder="Select date-time">
						</form>
						<br>
						<button type="submit" ><span><b>Submit</b></span></button>
					</form>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="contact-form-wrap">
					<div class="contact-form-box">
						<h4><i class="fas fa-map"></i> Shop Address</h4>
						<p>Santol St. Zone II,<br> Soccoro, Oriental Mindoro, <br> Philippines </p>
					</div>
					<div class="contact-form-box">
						<h4><i class="far fa-clock"></i> Shop Hours</h4>
						<p>MON - FRIDAY: 8 to 9 PM <br> SAT - SUN: 10 to 8 PM </p>
					</div>
					<div class="contact-form-box">
						<h4><i class="fas fa-address-book"></i> Contact</h4>
						<p>Phone: 0936-911-4932 <br> Email: teatimesocorro@gmail.com</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
	config = {
		enableTime: true,
    	dateFormat: "Y-m-d (H:i K)",
	}
	flatpickr("input[type=datetime-local]", config);
</script>
<!-- end contact form -->