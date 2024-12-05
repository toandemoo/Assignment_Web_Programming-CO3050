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
								<input type="text" class="form-control" id="birth" name="birth" placeholder="01/01/2024" required>
							</div>
							<div class="mb-3">
								<label for="gender">Giới tính:</label>
								<select id="gender" name="gender">
									<option value="male">Nam</option>
									<option value="female">Nữ</option>
									<option value="other">Khác</option>
								</select>
							</div>
							<div class="mb-3">
								<label for="address" class="form-label">Địa chỉ</label>
								<input type="text" class="form-control" id="address" name="address" >
							</div>
							<div class="text-center mt-4">
								<button type="submit" class="btn btn-primary auth-btn">Xác nhận</button>
							</div>
							<div class="auth-info text-center">
								Bạn đã có tài khoản?
								<a class="auth-link--dark" href="<?=ROOT?>login">Đăng nhập</a>
							</div>
						</form>

                  <div class="row mt-5 show-me">
                    <div class="col text-center">
                        <span style="text-transform: capitalize;font-family: Arial, Helvetica, sans-serif;font-size:15px;font-weight:600;color:rgb(148, 141, 141)">Hoặc đăng ký bằng</span>
                        <div style="margin-top: 20px;">
                           <span class="facebook-icon"><i class="fa fa-facebook" aria-hidden="true"></i></span>
                           <span class="twitter-icon"><i class="fa fa-twitter" aria-hidden="true"></i></span>
                           <span class="google-icon"><i class="fa fa-google" aria-hidden="true"></i></span>
                        </div>
                    </div>  
                  </div>
               </div>
               <!-- Form Login -->
            </div>
            <!-- /section title -->
         </div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
<?php $this->view("./customer/Shared/footer",$data); ?>