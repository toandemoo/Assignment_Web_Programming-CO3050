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
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<div class="header-links pull-right">
						<div class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-user-o"></i> <?= $_SESSION['email'] ?> <span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li><a href="<?= ROOT ?>userinfo">Thông tin cá nhân</a></li>
								<li><a href="<?= ROOT ?>logout">Đăng xuất</a></li>
							</ul>
						</div>
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
								<a href="home" class="logo">
									<img src="<?=ASSETS ?>img/logo.png" alt="">
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
								<div>
									<a href="Cart">
										<i class="fa fa-shopping-cart"></i>
										<span>Giỏ Hàng</span>
										<div class="qty"><?= $data['product']?></div>
									</a>
								</div>

								<div>
									<a href="order">
										<i class="fa fa-shopping-bag"></i>
										<span>Đơn Hàng</span>
										<div class="qty"><?= $data['order']?></div>
									</a>
								</div>
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
		</script>
		
		<!-- bannerSlider -->
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				<div class="item active">
						<img src="<?= ASSETS?>img/banner1.jpg" alt="Slide 1">
						<div class="carousel-caption">
							Caption for Slide 1
						</div>
				</div>
				<div class="item">
						<img src="<?= ASSETS?>img/banner2.jpg" alt="Slide 2">
						<div class="carousel-caption">
							Caption for Slide 2
						</div>
				</div>
				<div class="item">
						<img src="<?= ASSETS?>img/banner3.jpg" alt="Slide 3">
						<div class="carousel-caption">
							Caption for Slide 3
						</div>
				</div>
			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				<span aria-hidden="true"></span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				<span aria-hidden="true"></span>
			</a>
		</div>
		<!-- bannerSlider -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">SẢN PHẨM MỚI</h3>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<?php if (is_array($data['rows'])): ?>
										<?php foreach ($data['rows'] as $row): ?>
										<div class="product">
											<a href="<?= ROOT ?>detail_product/<?=$row->id?>">
												<div class="product-img">
													<img src="<?=$row->pimg?>" alt="">
													<!-- <div class="product-label">
														<span class="sale">-30%</span>
														<span class="new">NEW</span>
													</div> -->
												</div>
												<div class="product-body">
													<!-- <p class="product-category">Category</p> -->
													<h3 class="product-name" style="width: auto; height:5rem;"><a href="detail_product/<?=$row->id?>"><?=$row->ptitle?></a></h3>
													<h4 class="product-price"><?=$row->pprice?><small><u style="color:#cc0000;">đ</u></small></h4>
													<div class="product-rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
													<div class="product-btns">
														<!-- <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button> -->
														<!-- <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button> -->
													</div>
												</div>
												<div class="add-to-cart">
													<form action="<?= ROOT ?>detail_product/<?=$row->id?>" method="POST" name="addtocart">
														<button type="submit" name="product_id" value="<?=$row->id?>" class="add-to-cart-btn">
																<i class="fa fa-shopping-cart"></i> Thêm vào giỏ
														</button>
													</form>
												</div>
											</a>
										</div>
										<?php endforeach; ?>
										<?php endif; ?>
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
							
						<a href="<?= ROOT ?>allproduct">
							<div class="hot-deal" style="height: 40rem;">
								<!-- <ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Days</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Hours</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Mins</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Secs</span>
									</div>
								</li>
							</ul> -->
							</div>
						</a>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">SẢN PHẨM BÁN CHẠY</h3>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-2">
										<?php if (is_array($data['rows'])): ?>
										<?php foreach ($data['rows'] as $row): ?>
										<!-- product -->
										
										<div class="product">
											<a href="<?= ROOT ?>detail_product/<?=$row->id?>">
												<div class="product-img">
													<img src="<?=$row->pimg?>" alt="">
													<!-- <div class="product-label">
														<span class="sale">-30%</span>
														<span class="new">NEW</span>
													</div> -->
												</div>
												<div class="product-body">
													<!-- <p class="product-category">Category</p> -->
													<h3 class="product-name" style="width: auto; height:5rem;"><a href="detail_product/<?=$row->id?>"><?=$row->ptitle?></a></h3>
													<h4 class="product-price"><?=$row->pprice?><small><u style="color:#cc0000;">đ</u></small></h4>
													<div class="product-rating">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</div>
													<div class="product-btns">
														<!-- <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button> -->
														<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
													</div>
												</div>
												<div class="add-to-cart">
													<form action="<?= ROOT ?>detail_product/<?=$row->id?>" method="POST" name="addtocart">
														<button type="submit" name="product_id" value="<?=$row->id?>" class="add-to-cart-btn">
																<i class="fa fa-shopping-cart"></i> Thêm vào giỏ
														</button>
													</form>
												</div>
											</a>
										</div>
										
										<!-- /product -->
										<?php endforeach; ?>
										<?php endif; ?>
									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

<?php $this->view("./customer/Shared/footer"); ?>