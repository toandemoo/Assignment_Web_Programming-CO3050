<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Electro</title>
		<link rel="icon" href="<?=ASSETS ?>img/favicon.png" type="image/png">

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="<?=ASSETS ?>css/bootstrap.min.css"/>
		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="<?=ASSETS ?>css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="<?=ASSETS ?>css/slick-theme.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="<?=ASSETS ?>css/font-awesome.min.css"/>

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="<?=ASSETS ?>css/style.css"/>

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- /TOP HEADER -->
			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="index" class="logo">
									<img src="<?=ASSETS?>img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
            <!-- section title -->
            <div class="row d-flex align-items-center">
               <!-- img -->
               <div class="col-md-7">
                  <img src="<?=ASSETS?>img/login.jpg" alt="login" class="img-fluid img-login">
               </div>
               <!-- img -->

               <!-- Form Login -->
               <div class="col-md-5">
                  <div class="section-title">
                     <h1 class="title">ĐĂNG KÝ</h1>
                  </div>

						<?php check_message() ?>

                  <form action="Signup" method="post">
							<div class="mb-3">
								<label for="fullName" class="form-label">Họ tên</label>
								<input type="text" class="form-control" id="fullName" name="fullName" required>
							</div>
							<div class="mb-3">
								<label for="email" class="form-label">Email</label>
								<input type="email" class="form-control" id="email" name="email" required>
							</div>
							<div class="mb-3">
								<label for="password" class="form-label">Mật khẩu</label>
								<input type="password" class="form-control" id="password" name="password" required>
							</div>
							<div class="mb-3">
								<label for="phoneNumber" class="form-label">Số điện thoại</label>
								<input type="text" class="form-control" id="phoneNumber" name="phoneNumber" required>
							</div>
							<div class="mb-3">
								<label for="birth" class="form-label">Ngày sinh</label>
								<input type="date" class="form-control" id="birth" name="birth" placeholder="01/01/2024" required>
							</div>
							<div class="mb-3" style="margin-top: 1rem;">
								<label for="gender">Giới tính:</label>
								<select id="gender" name="gender">
									<option value="male">Nam</option>
									<option value="female">Nữ</option>
									<option value="other">Khác</option>
								</select>
							</div>
							<div class="mb-3">
								<label for="address" class="form-label">Địa chỉ</label>
								<input type="text" class="form-control" id="address" name="address" required>
							</div>
							<div class="text-center mt-4" style="margin-top: 1rem;">
								<button type="submit" class="btn btn-primary auth-btn">Xác nhận</button>
							</div>
							<div class="auth-info text-center">
								Bạn đã có tài khoản?
								<a class="auth-link--dark" href="<?=ROOT?>login">Đăng nhập</a>
							</div>
						</form>

                  <div class="row mt-5 show-me">
                    <!-- <div class="col text-center">
                        <span style="text-transform: capitalize;font-family: Arial, Helvetica, sans-serif;font-size:15px;font-weight:600;color:rgb(148, 141, 141)">Hoặc đăng ký bằng</span>
                        <div style="margin-top: 20px;">
                           <span class="facebook-icon"><i class="fa fa-facebook" aria-hidden="true"></i></span>
                           <span class="twitter-icon"><i class="fa fa-twitter" aria-hidden="true"></i></span>
                           <span class="google-icon"><i class="fa fa-google" aria-hidden="true"></i></span>
                        </div>
                    </div>   -->
                  </div>
               </div>
               <!-- Form Login -->
            </div>
            <!-- /section title -->
         </div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">About Us</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
									<li><a href="#">Hot deals</a></li>
									<li><a href="#">Laptops</a></li>
									<li><a href="#">Smartphones</a></li>
									<li><a href="#">Cameras</a></li>
									<li><a href="#">Accessories</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Information</h3>
								<ul class="footer-links">
									<li><a href="#">About Us</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Orders and Returns</a></li>
									<li><a href="#">Terms & Conditions</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Service</h3>
								<ul class="footer-links">
									<li><a href="#">My Account</a></li>
									<li><a href="#">View Cart</a></li>
									<li><a href="#">Wishlist</a></li>
									<li><a href="#">Track My Order</a></li>
									<li><a href="#">Help</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								 <a href="https://templatespoint.net" target="_blank">TemplatesPoint</a>
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>
