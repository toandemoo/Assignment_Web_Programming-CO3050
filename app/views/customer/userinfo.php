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
				justify-content: center;
    			align-items: center;
				margin-top: 15px;
				width: 50%;
				height: 100%;
				margin: auto;
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
									<img src="<?=ASSETS?>img/logo.png" alt="">
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
							<li class="active"><a href="<?=ROOT?>home">Home</a></li>
							<li><a href="<?=ROOT?>about">About</a></li>
							<li><a href="<?=ROOT?>contact">Contact</a></li>
							<li><a href="<?=ROOT?>allproduct">All Products</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Danh mục sản phẩm <span class="caret"></span></a>
								<ul class="dropdown-menu">
								<?php if (is_array($data['categories'])): ?>
								<?php foreach ($data['categories'] as $cate): ?>
									<li><a href="<?=ROOT?>allproduct/<?=$cate->name?>"><?=$cate->name?></a></li>
								<?php endforeach; ?>
								<?php endif; ?>
								</ul>
							</li>
						</ul>
				</div>
			</div>
		</nav>
		<!-- /NAVIGATION -->
		
		<div class="container">
			<div class="row">
		
				<div class="col">
					<div class="content-section" id="accountInfo">
						<div class="title-info border-2 border-bottom border-danger">
							<h2>Thông tin tài khoản</h2>
						</div>
						<div class="change-info">
							<form action="userinfo/UpdateInfo" method="post">
								<label for="name">Họ và tên:</label>
								<input type="text" class="form-control" id="name" value="<?php echo $_SESSION['fullName'] ?>" name="fullName">
								<label for="email">Email:</label>
								<input type="email" class="form-control" id="email" value="<?php echo $_SESSION['email'] ?>" name="email">
								<label for="password">Mật Khẩu</label>
								<input type="text" class="form-control" id="password" value="<?php echo $_SESSION['password'] ?>" name="password">
								<label for="phone">Số điện thoại</label>
								<input type="text" class="form-control" id="phone" value="<?php echo $_SESSION['phoneNumber'] ?>" name="phoneNumber">
								
								<label for="birth">Ngày sinh:</label>
								<input type="text" class="form-control" id="birth" value="<?php echo $_SESSION['birth'] ?>" name="birth" >
								
								<label for="gender">Giới tính:</label>
								<select id="gender" name="gender">
									<option value="male" <?php echo (isset($_SESSION['gender']) && $_SESSION['gender'] == 'male') ? 'selected' : ''; ?>>Nam</option>
									<option value="female" <?php echo (isset($_SESSION['gender']) && $_SESSION['gender'] == 'female') ? 'selected' : ''; ?>>Nữ</option>
									<option value="other" <?php echo (isset($_SESSION['gender']) && $_SESSION['gender'] == 'other') ? 'selected' : ''; ?>>Khác</option>
								</select>
								<label for="address">Địa chỉ</label>
								<input type="text" class="form-control" id="address" name="address">
								<div class="submit-button">
									<button type="submit" class="btn btn-danger" style="padding-left: 25%;" onclick="completeUpdateInfo()">Cập nhật thông tin</button>
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

<?php $this->view("./customer/Shared/footer",$data); ?>