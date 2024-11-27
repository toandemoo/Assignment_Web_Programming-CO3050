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

		<script>
			// Hàm hiển thị alert yêu cầu đăng nhập
			function alertLogin() {
				alert("Vui lòng đăng nhập để xem giỏ hàng.");
				window.location.href = "<?= ROOT ?>login"; // Chuyển hướng đến trang đăng nhập
			}
		</script>

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<div class="header-links pull-right">
						<?php
						if (isset($_SESSION['email'])) {
							echo '
							<div class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
										<i class="fa fa-user-o"></i> ' . $_SESSION['email'] . ' <span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
										<li><a href="' . ROOT . 'userinfo">Thông tin cá nhân</a></li>
										<li><a href="' . ROOT . 'logout">Đăng xuất</a></li>
								</ul>
							</div>
							';
						} else {
							echo '
							<a href="' . ROOT . 'login"><i class="fa fa-user-o"></i> Đăng nhập</a>
							<span style="color: white;">/</span>
							<a href="' . ROOT . 'signup">Đăng Ký</a>
							';
						}
						?>
					</div>
				</div>
			</div>
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
									<img src="<?= ASSETS?>img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form action="<?= ROOT ?>allproduct/index" method="POST">
									<input type="text" class="input" placeholder="Search here" id="search" name="search">
									<button type="submit" class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Cart -->
								<?php
								if (isset($_SESSION['email'])) {
									// Nếu đã đăng nhập
									echo '
									<div>
										<a href="Cart">
												<i class="fa fa-shopping-cart"></i>
												<span>Your Cart</span>
												<div class="qty">3</div>
										</a>
									</div>
									';
								} else {
									// Nếu chưa đăng nhập
									echo '
									<div>
										<a href="#" onclick="alertLogin();">
											<i class="fa fa-shopping-cart"></i>
											<span>Your Cart</span>
										</a>
									</div>
									';
								}
								?>
								<!-- /Cart -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->