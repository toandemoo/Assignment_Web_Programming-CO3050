<?php $this->view("./customer/Shared/header", $data); ?>

		<!-- section -->
		<section class="py-3 py-md-5 py-xl-8 mb-5" style="margin: 3em;">
			<div class="container">
				<div>
					<div	div class="col-12 col-lg-7">
						<h2 class="mb-3 text-light">Get in touch</h2>
						<p style="width: 80%;">We're always on the lookout to work with new clients. If you're interested in working with us, please get in touch in one of the following ways.</p>		
						<div class="col-12 col-xxl-6 mb-3">
							<h4 class="ml-3 mb-0 text-light">Phone</h4>
							<p class="mb-3">
								<a class="link-light link-opacity-75 link-opacity-100-hover text-decoration-none" href="tel:+15057922430">(505) 792-2430</a>
							</p>
						</div>
						<div class="col-12 col-xxl-6">
							<div class="d-flex mb-0">
								<div>
									<h4 class="mb-0 text-light">E-Mail</h4>
									<p>
										<a class="link-light link-opacity-75 link-opacity-100-hover text-decoration-none" href="mailto:demo@yourdomain.com">demo@yourdomain.com</a>
									</p>
								</div>
							</div>
						</div>
						<div class="d-flex">
							<div>
								<h4 class="mb-0 text-light">Opening Hours</h4>
								<div class="d-flex mb-2">
									<p class="text-light fw-bold mb-0 me-5">Mon - Fri</p>
									<p class="text-light opacity-75 mb-0">9am - 5pm</p>
								</div>
								<div class="d-flex">
									<p class="text-light fw-bold mb-0 me-5">Sat - Sun</p>
									<p class="text-light opacity-75 mb-0">9am - 2pm</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-lg-5">
							<div class="row align-items-lg-center h-100">
								<div class="col-12">
									<form action="#!">
										<div class="row gy-4 gy-xl-5 p-4 p-xl-5">
											<div class="col-12">
												<label for="fullname" class="form-label">Full Name <span class="text-danger">*</span></label>
												<input type="text" class="form-control" id="fullname" name="fullname" value="" required>
											</div>
											<div class="col-12">
												<label for="email" class="form-label">Email <span class="text-danger">*</span></label>
												<input type="email" class="form-control" id="email" name="email" value="" required>
											</div>
											<div class="col-12">
												<label for="phone" class="form-label">Phone Number</label>
												<input type="tel" class="form-control" id="phone" name="phone" value="">
											</div>
											<div class="col-12">
												<label for="subject" class="form-label">Subject <span class="text-danger">*</span></label>
												<input type="text" class="form-control" id="subject" name="subject" value="" required>
											</div>
											<div class="col-12 mb-5">
												<label for="message" class="form-label">Message <span class="text-danger">*</span></label>
												<textarea class="form-control" style="max-width: 100%;height: 30%;" id="message" name="message" rows="3" required></textarea>
											</div>
											<div class="col-12" style="margin-top: 3%; margin-bottom: 5%;">
												<div class="d-grid">
													<button class="btn btn-primary btn-lg" type="submit">Send Message</button>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
					</div>
				</div>						
			</div>
		</section>
		<!-- section -->
		
<?php $this->view("./customer/Shared/footer",$data); ?>
