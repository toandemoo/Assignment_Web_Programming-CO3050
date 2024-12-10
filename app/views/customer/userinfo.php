<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>GlamAura</title>

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
							<li class="active"><a href="<?=ROOT?>home">Trang Chủ</a></li>
							<li><a href="<?=ROOT?>about">Giới Thiệu</a></li>
							<li><a href="<?=ROOT?>contact">Liên Hệ</a></li>
							<li><a href="<?=ROOT?>allproduct">Sản Phẩm</a></li>
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
			<!-- Phần ảnh đại diện -->
			<div class="col-md-4">
			<form id="avatar-form" action="userinfo/UpdateAvatar" method="POST" enctype="multipart/form-data" class="d-flex flex-column align-items-center" style="margin-top: 50px;">
				<img id="avatar-img" src="<?php echo $_SESSION['avatar']; ?>" alt="Avatar" class="img-circle" style="width: 300px; height: 300px; border: 2px solid #ddd; object-fit: cover; margin-bottom:20px">
				<button type="button" id="change-avatar-btn" class="btn btn-primary mt-3" style=" margin-bottom:20px">Thay đổi ảnh đại diện</button>
				<input type="file" id="upload-avatar" name="avatar" accept="image/*" style="display: none;">
				<button type="submit" class="btn btn-danger mt-2">Lưu ảnh</button>
			</form>
			</div>

				<!-- Phần thông tin tài khoản -->
				<div class="col-md-8">
				<div class="content-section">
					<div class="title-info" style="border-bottom: 2px solid red; margin-bottom: 20px;">
						<h2>Thông tin tài khoản</h2>
					</div>
					<form action="userinfo/UpdateInfo" method="post">
						<div class="form-group">
						<label for="name">Họ và tên:</label>
						<input type="text" class="form-control" id="name" name="fullName" value="<?php echo $_SESSION['fullName']; ?>">
						</div>
						<div class="form-group">
						<label for="email">Email:</label>
						<input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['email']; ?>">
						</div>
						<div class="form-group">
						<label for="password">Mật Khẩu:</label>
						<input type="password" class="form-control" id="password" name="password" value="<?php echo $_SESSION['password']; ?>">
						</div>
						<div class="form-group">
						<label for="phone">Số điện thoại:</label>
						<input type="text" class="form-control" id="phone" name="phoneNumber" value="<?php echo $_SESSION['phoneNumber']; ?>">
						</div>
						<div class="form-group">
						<label for="birth">Ngày sinh:</label>
						<input type="text" class="form-control" id="birth" name="birth" value="<?php echo $_SESSION['birth']; ?>">
						</div>
						<div class="form-group">
						<label for="gender">Giới tính:</label>
						<select id="gender" class="form-control" name="gender">
							<option value="male" <?php echo ($_SESSION['gender'] == 'male') ? 'selected' : ''; ?>>Nam</option>
							<option value="female" <?php echo ($_SESSION['gender'] == 'female') ? 'selected' : ''; ?>>Nữ</option>
							<option value="other" <?php echo ($_SESSION['gender'] == 'other') ? 'selected' : ''; ?>>Khác</option>
						</select>
						</div>
						<div class="form-group">
						<label for="address">Địa chỉ:</label>
						<input type="text" class="form-control" id="address" name="address" value="<?php echo $_SESSION['address']; ?>">
						</div>
						<button type="submit" class="btn btn-danger btn-block" onclick="completeUpdateInfo()">Cập nhật thông tin</button>
					</form>
				</div>
				</div>
			</div>
		</div>

		<script>
		function completeUpdateInfo() {
			// Hiển thị thông báo thành công
			alert("Cập nhật thông tin thành công!");
		}
		</script>

		<script>
			// Kích hoạt chọn file khi click "Thay đổi ảnh đại diện"
		document.getElementById('change-avatar-btn').addEventListener('click', function () {
		document.getElementById('upload-avatar').click();
		});

		// Hiển thị ảnh xem trước khi người dùng chọn ảnh
		document.getElementById('upload-avatar').addEventListener('change', function (event) {
		const file = event.target.files[0];
		if (file) {
			const reader = new FileReader();
			reader.onload = function (e) {
				document.getElementById('avatar-img').src = e.target.result;
			};
			reader.readAsDataURL(file);
		}
		});

		</script>


<?php $this->view("./customer/Shared/footer"); ?>