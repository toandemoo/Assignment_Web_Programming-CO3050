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
							<a href="' . ROOT . 'Login"><i class="fa fa-user-o"></i> Đăng nhập</a>
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
								<a href="<?= ROOT ?>index" class="logo">
									<img src="<?= ASSETS?>img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form action="<?= ROOT ?>Search" method="POST" onsubmit="return validateSearch()">
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
										<a href="' . ROOT .'Cart">
												<i class="fa fa-shopping-cart"></i>
												<span>Giỏ Hàng</span>
												<div class="qty">' . $_SESSION['product'] . '</div>
										</a>
									</div>

									<div>
										<a href="order">
											<i class="fa fa-shopping-bag"></i>
											<span>Đơn Hàng</span>
											<div class="qty">' . $_SESSION['order'] . '</div>
										</a>
									</div>
									';
								} else {
									// Nếu chưa đăng nhập
									echo '
									<div>
										<a href="#" onclick="alertLogin();">
											<i class="fa fa-shopping-cart"></i>
											<span>Gió Hàng</span>
										</a>
									</div>
									<div>
										<a href="#" onclick="alertLogin();">
											<i class="fa fa-shopping-bag"></i>
											<span>Đơn Hàng</span>
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


		<!-- NAVIGATION -->
		<nav id="navigation">
				<div class="container">
				<button class="menu-toggle">☰</button>
					<div id="responsive-nav">
						<ul class="main-nav nav navbar-nav">
							<?php
							$currentPage = pathinfo($_SERVER['REQUEST_URI'], PATHINFO_BASENAME);
							$isSearchActive = isset($_GET['search']) || isset($_GET['categories']);
							?>
							<li class="<?= ($currentPage == 'home') ? 'active' : ''; ?>"><a href="<?=ROOT?><?php echo isset($_SESSION['email']) ? 'home' : 'index'; ?>">Trang Chủ</a></li>
							<li class="<?= ($currentPage == 'about') ? 'active' : ''; ?>"><a href="<?=ROOT?>about">Giới Thiệu</a></li>
							<li class="<?= ($currentPage == 'contact') ? 'active' : ''; ?>"><a href="<?=ROOT?>contact">Liên Hệ</a></li>
							<li class="<?= ($currentPage == 'allproduct' || $isSearchActive) ? 'active' : ''; ?>"><a href="<?=ROOT?>allproduct">Sản Phẩm</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									Danh Mục<span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
								<?php if (is_array($data['categories'])): ?>
								<?php foreach ($data['categories'] as $cate): ?>
									<li style="padding: 0%;"><a href="<?=ROOT?>allproduct?categories=<?=$cate->name?>"><b><?=$cate->name?></b></a></li>
								<?php endforeach; ?>
								<?php endif; ?>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		<!-- /NAVIGATION -->

		<script>
			document.querySelector('.menu-toggle').addEventListener('click', function() {
				document.getElementById('responsive-nav').classList.toggle('active');
			});
			document.addEventListener('click', function (event) {
				const menu = document.getElementById('responsive-nav');
				const isClickInsideMenu = menu.contains(event.target);
				const isClickToggle = event.target.classList.contains('menu-toggle');
				
				// Đóng menu nếu click ra ngoài và không phải nút toggle
				if (!isClickInsideMenu && !isClickToggle && menu.classList.contains('active')) {
						menu.classList.remove('active');
				}
			});


			function validateSearch() {
				const searchInput = document.getElementById('search').value.trim();
				if (searchInput === "") {
					alert("Vui lòng nhập từ khóa tìm kiếm.");
					return false; // Ngăn không gửi form
				}
				return true; // Cho phép gửi form nếu hợp lệ
			}

		</script>