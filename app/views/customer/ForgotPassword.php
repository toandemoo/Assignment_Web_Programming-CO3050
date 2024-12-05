<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Electro - HTML Ecommerce Template</title>

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
                  <img src="<?= ASSETS?>img/login.jpg" alt="login" class="img-fluid img-login">
               </div>
               <!-- img -->

               <!-- Form Login -->
               <div class="col-md-5 border-login">
				<div class="section-title">
					<h1 class="title">QUÊN MẬT KHẨU</h1>
				</div>
				<form onsubmit="return validateCaptcha()" action="sign_in.html">
					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Nhập Email</label>
						<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
					</div>
					<br>
					<!-- CAPTCHA Section -->
					<div id="captcha"></div>
					<br>
					<button type="button"class="btn btn-success" style="margin-bottom: 20px;"  onclick="generateCaptcha()">Đổi CAPTCHA</button>
					<br>
					<div>
						<input type="text" class="form-control" id="captchaInput" placeholder="Nhập mã CAPTCHA" required>
					</div>
					<br>
					<p id="result" style="color: red;"></p>
					<div class="text-center" style="margin-top: 20px;">
						<button type="submit" class="btn btn-primary auth-btn">Xác nhận</button>
					</div>
				</form>
                  <div class="row mt-5 show-me">
                    <div class="col text-center">
                        <div style="margin-top: 20px;">
                           <span style="text-transform: capitalize;font-family: Arial, Helvetica, sans-serif;font-size:15px;font-weight:600;color:rgb(148, 141, 141)">Hoặc đăng nhập bằng</span>
                           <div  style="margin-top: 20px;">
                              <span class="facebook-icon"><i class="fa fa-facebook" aria-hidden="true"></i></span>
                              <span class="twitter-icon"><i class="fa fa-twitter" aria-hidden="true"></i></span>
                              <span class="google-icon"><i class="fa fa-google" aria-hidden="true"></i></span>
                           </div>
                        </div>
                    </div>  
                  </div>
                  <div class="auth-info text-center">Bạn chưa có tài khoản ?<a class="auth-link--dark" href="sign_up.html">Đăng ký</a></div>
               </div>
               <!-- Form Login -->
            </div>
            <!-- /section title -->
         </div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

<?php $this->view("./customer/Shared/footer",$data); ?>
