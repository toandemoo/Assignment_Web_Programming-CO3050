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

		<style>
			.change-info {
				max-width: 500px;
				margin: 20px auto;
			}

			.change-info label {
				display: block;
				font-weight: bold;
				margin-bottom: 5px;
				color: #333;
			}

			.change-info .form-control,
			.change-info select {
				width: 100%;
				padding: 8px;
				margin-bottom: 15px;
				border: 1px solid #ccc;
				border-radius: 4px;
				box-sizing: border-box;
				font-size: 14px;
			}

			.change-info input[type="date"] {
				color: #555;
				margin-bottom: 15px;
			}

			.change-info .submit-button {
				text-align: center;
				margin-top: 15px;
			}
			.tab-buttons {
				display: left;
				flex-direction: column;
				gap: 10px;
				height: 75px;
			}
			.tab-buttons button{
				font-size: 20px;
			}

			.content-section {
				margin-top: 20px;
				padding: 15px;
			}
			.section-button{
				background-color: #f1f1f1 ;
			}
			.icon-img{
				width: 100%;
				max-width: 30px;
				height: auto;
			}
			.title-info{
				text-align: center;
			}
			.btn {
				display: flex;
				width: 100%;
				align-items: center; 
			}
			.btn.active {
				background-color: #fae7ec;
				color: #ff0019;
				border-color: #f8012a;
			}
		</style>
    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<div class="header-links pull-right">
							<a href="login"><i class="fa fa-user-o"></i>Đăng nhập</a>
							<span>/</span>
							<a href="signup"><i class="fa fa-user-o"></i>Đăng Ký</a>
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
								<a href="Home.html" class="logo">
									<img src="./img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form>
									<input class="input" placeholder="Search here">
									<button class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<a href="my_favorite.html">
										<i class="fa fa-heart-o"></i>
										<span>Your Wishlist</span>
										<div class="qty">2</div>
									</a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div>
									<a href="Cart.html">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty">3</div>
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
				<div id="responsive-nav">
						<ul class="main-nav nav navbar-nav">
							<li class="active"><a href="Home.html">Home</a></li>
							<li><a href="About.html">About</a></li>
							<li><a href="Contact.html">Contact</a></li>
							<li><a href="all_product.html">All Products</a></li>
							<li class="dropdown">
								<a href="#">Danh mục sản phẩm</a>
								<ul class="dropdown">
										<li><a href="#">Laptop</a></li>
										<li><a href="#">Smartphones</a></li>
										<li><a href="#">Cameras</a></li>
										<li><a href="#">Accessories</a></li>
								</ul>
							</li>
						</ul>
				</div>
			</div>
		</nav>
		<!-- /NAVIGATION -->
		
		<div class="container">
			<div class="row">
				<div class="section-button col-3">    
					<div class="tab-buttons col">
						<button class="btn active" onclick="setActiveButton(this); showSection('accountInfo')">
							<img src="<?=ASSETS?>icon/person.png" alt="icon" class="icon-img"> 
							Thông tin tài khoản
						</button>
					</div>
				
					<div class="tab-buttons col">
						<button class="btn" onclick="setActiveButton(this); showSection('changePassword')">
							<img src="<?=ASSETS?>icon/change-password.png" alt="icon" class="icon-img">
							Đổi mật khẩu
						</button>
					</div>
				
					<div class="tab-buttons col">
						<button class="btn" onclick="setActiveButton(this); showSection('purchaseHistory')">
							<img src="<?=ASSETS?>icon/history.png" alt="icon" class="icon-img">
							Lịch sử mua hàng
						</button>
					</div>
				
					<div class="tab-buttons col">
						<button class="btn" onclick="setActiveButton(this); window.location.href='#'">
							<img src="<?=ASSETS?>icon/logout.png" alt="icon" class="icon-img">
							Đăng xuất
						</button>
					</div>
				</div>
		
				<div class="col">
					<div class="content-section" id="accountInfo">
						<div class="title-info border-2 border-bottom border-danger">
							<h2>Thông tin tài khoản</h2>
						</div>
						<div class="change-info">
							<form action="User_info.html">
								<label for="name">Họ và tên:</label>
								<input type="text" class="form-control" id="name">
								<label for="email">Email:</label>
								<input type="email" class="form-control" id="email">
								<label for="gender">Giới tính:</label>
								<select id="gender" name="gender">
									<option value="male">Nam</option>
									<option value="female">Nữ</option>
									<option value="other">Khác</option>
								</select>

								<label for="phone">Số điện thoại người nhận:</label>
								<input type="text" class="form-control" id="phone">

								<label for="birthday">Ngày sinh:</label>
								<input type="date" id="birthday" name="birthday">

								<label for="provinceFilter">Tỉnh/Thành phố:</label>
								<select id="provinceFilter" class="form-control">
									<option value=""></option>
								</select>

								<label for="districtFilter">Quận/Huyện:</label>
								<select id="districtFilter" class="form-control">
									<option value=""></option>
								</select>
								<div class="submit-button">
									<button class="btn btn-danger" onclick="completeUpdateInfo()">Cập nhật thông tin</button>
								</div>
							</form>
						</div>
					</div>
		
					<div class="content-section" id="changePassword" style="display: none;">
						<div class="title-info border-2 border-bottom border-danger">
							<h2>Đổi mật khẩu</h2>
						</div>
						<form action="Change_password.html">
							<label for="currentPassword">Mật khẩu hiện tại:</label>
							<input type="password" class="form-control" id="currentPassword">
							<label for="newPassword">Mật khẩu mới:</label>
							<input type="password" class="form-control" id="newPassword">
							<label for="confirmPassword">Xác nhận mật khẩu mới:</label>
							<input type="password" class="form-control" id="confirmPassword">
							<div class="submit-button">
								<button class="btn btn-danger" onclick="changePassword()">Đổi mật khẩu</button>
							</div>
						</form>
					</div>
		
					<div class="content-section" id="purchaseHistory" style="display: none;">
						<div class="title-info border-2 border-bottom border-danger">
							<h2>Lịch sử mua hàng</h2>
						</div>
						<p>Danh sách các đơn hàng đã mua sẽ hiển thị ở đây.</p>
					</div>
				</div>
			</div>
		</div>

<?php $this->view("footer"); ?>
