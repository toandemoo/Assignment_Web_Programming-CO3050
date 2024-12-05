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
                  <img src="<?=ASSETS?>img/login.jpg" alt="login" class="img-fluid img-login">
               </div>
               <!-- img -->

               <!-- Form Login -->
               <div class="col-md-5 border-login">
                  <div class="section-title">
                     <h1 class="title">ĐĂNG NHẬP</h1>
                  </div>
						<?php 
							if (!empty($_SESSION['error'])) {
								$error_message = $_SESSION['error'];
								unset($_SESSION['error']); // Xóa lỗi khỏi session sau khi hiển thị
							} else {
								$error_message = "";
							}
						?>	
						<?php if (!empty($error_message)) : ?>
							<div id="alert" class="alert alert-danger">
								<?php echo $error_message; ?>
							</div>
						<?php else: ?>
							<div id="alert" class="alert alert-danger" style="display: none;"></div>
						<?php endif; ?>
                  <form action="Login/signin" method="post" id="loginform">
							<div class="mb-3">
								<?php
									$controller = new Controller();
									$decryptedEmail = '';
									if (isset($_COOKIE['email'])) {
										$decryptedEmail = $controller->decryptData($_COOKIE['email']); // Giải mã cookie 'email'
									}
								?>
								<label for="email" class="form-label">Email</label>
								<input type="text" class="form-control" id="email" name="email" value="<?php echo $decryptedEmail ?>">
							</div>
							<div class="mb-3">
								<?php
									$controller = new Controller();
									$decryptedPassword = '';
									if (isset($_COOKIE['password'])) {
										$decryptedPassword = $controller->decryptData($_COOKIE['password']); // Giải mã cookie 'email'
									}
								?>
								<label for="password" class="form-label">Mật khẩu</label>
								<input type="password" class="form-control" id="password" name="password" value="<?php echo $decryptedPassword ?>">
							</div>
							<div class="mb-3 form-check d-flex align-items-center" style="margin-top: 20px;"> 
								<input type="checkbox" class="form-check-input" id="check" name="remember">
								<label class="form-check-label ms-2" for="check">Lưu đăng nhập</label>
								<a class="auth-link ms-auto" href="<?= ROOT ?>ForgotPassword">Quên mật khẩu?</a>
							</div>
							<div class="text-center">
								<button id="loginButton" type="button" class="btn btn-primary auth-btn " style="padding: 20px">Xác nhận</button>
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
                  <div class="auth-info text-center">Bạn chưa có tài khoản ?<a class="auth-link--dark" href="<?=ROOT?>signup">Đăng ký</a></div>
               </div>
               <!-- Form Login -->
            </div>
            <!-- /section title -->
         </div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->


		<script>
		document.getElementById('loginButton').addEventListener('click', function () {
			const email = document.getElementById('email').value.trim();
			const password = document.getElementById('password').value.trim();
			const alertBox = document.getElementById('alert');

			// Kiểm tra xem email và password có được nhập không
        if (!email) {
            alertBox.style.display = 'block';
            alertBox.innerText = 'Vui lòng nhập email!';
        } else if (!password) {
            alertBox.style.display = 'block';
            alertBox.innerText = 'Vui lòng nhập mật khẩu!';
        } else {
            alertBox.style.display = 'none';
            document.getElementById('loginform').submit(); // Gửi form nếu hợp lệ
        }
		});
	</script>

<?php $this->view("./customer/Shared/footer",$data); ?>
	
