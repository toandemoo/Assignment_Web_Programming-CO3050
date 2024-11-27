<?php $this->view("./Shared/header"); ?>
	<head>
		<style>
			.about{
				display: flex;
				text-align: justify;
				align-items: center;
				background-color: rgb(255, 255, 255);
			}
			.about_1{
				text-align: justify;
				background-color: rgb(255, 255, 255);
			}
			.about-2{
				font-family: Arial, sans-serif;
				margin-left: 50px;
				color:rgb(92, 91, 91);
			}
			.one-part{
				margin-bottom: 20px;
			}
			.about-us{
				padding: 100px 0 20px 0;
				text-align: center;
			}
			.img-about {
				width: 100%;
				height: 300px;
				background-image: url("<?=ASSETS?>img/about.jpg"); 
				background-size: cover;
				background-position: center;
				background-repeat: repeat;
			}
			.social-connect {
				text-align: left;
				margin-top: 30px;
			}

			.social-connect p {
				font-size: 18px;
				font-weight: bold;
				margin-bottom: 10px;
				color: #333;
			}

			.social-icons {
				display: flex;
				justify-content: left;
				gap: 15px;
			}

			.social-icon {
				font-size: 24px;
				color: #555;
				text-decoration: none;
				transition: color 0.3s ease;
			}

			.social-icon:hover {
				color: #007bff;
			}

		</style>
    </head>
	<body>
		
		<!-- NAVIGATION -->
		<nav id="navigation">
			<div class="container">
				<div id="responsive-nav">
						<ul class="main-nav nav navbar-nav">
							<li><a href="<?php echo isset($_SESSION['email']) ? 'home' : 'index'; ?>">Home</a></li>
							<li class="active"><a href="about">About</a></li>
							<li><a href="contact">Contact</a></li>
							<li><a href="allproduct">All Products</a></li>
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
		
		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="breadcrumb">
			<!-- container -->
			<div class="container">
				<div class="img-about col"></div>
				<div class="one-part row">
					<div class="about_1 col">
						<h3 class="about-us">VỀ CHÚNG TÔI</h3>
						<p>Chào mừng bạn đến với ELECTRO – điểm đến đáng tin cậy của bạn cho các sản phẩm điện tử chất lượng cao và dịch vụ tận tâm. Tại ELECTRO, chúng tôi cam kết mang đến cho khách hàng những sản phẩm công nghệ tiên tiến nhất, từ điện thoại, máy tính xách tay, máy tính bảng đến các thiết bị gia dụng thông minh và phụ kiện hiện đại.</p>
					</div>
					<div class="col">
						<img src="<?=ASSETS?>img/about-1.png" alt="About Us Image" style="width: 100%; max-width: 600px;">
					</div>
				</div>
				<div class="one-part row">
					<div class="col">
						<img src="<?=ASSETS?>img/about-2.png" alt="About Us Image" style="width: 100%; max-width: 600px;">
					</div>
					<div class="about col">				
						<p><strong>Sứ Mệnh Của Chúng Tôi</strong><br>
						Chúng tôi không chỉ đơn thuần là cung cấp sản phẩm, mà còn đặt mục tiêu trở thành người đồng hành trong hành trình trải nghiệm công nghệ của bạn. Chúng tôi cam kết cung cấp những sản phẩm chính hãng với chất lượng đảm bảo, giá cả cạnh tranh và các chính sách bảo hành, hỗ trợ tận tâm.</p>
					</div>
				</div>
				<div class="one-part row">
					<div class="about col">
						<p><strong>Dịch Vụ Khách Hàng</strong><br>
							Tại ELECTRO, chúng tôi tự hào với đội ngũ chăm sóc khách hàng chuyên nghiệp, luôn sẵn sàng hỗ trợ bạn. Chính sách đổi trả và dịch vụ bảo hành nhanh chóng là ưu tiên hàng đầu nhằm đem lại trải nghiệm mua sắm hoàn hảo nhất.</p>
					</div>
					<div class="about-2 col">
						<p><strong>Giá Trị Cốt Lõi</strong><br>
							&#10003; <strong>Chất Lượng</strong><br>
							&#10003; <strong>Đáng Tin Cậy</strong><br>
							&#10003; <strong>Công Nghệ Hiện Đại</strong>
						</p>
					</div>
				</div>
				<div class="social-connect">
					<p><strong>Kết nối với chúng tôi</strong></p>
					<div class="social-icons">
						<a href="https://facebook.com" target="_blank" class="social-icon"><i class="fab fa-facebook-f"></i></a>
						<a href="https://instagram.com" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
						<a href="https://tiktok.com" target="_blank" class="social-icon"><i class="fab fa-tiktok"></i></a>
						<a href="https://youtube.com" target="_blank" class="social-icon"><i class="fab fa-youtube"></i></a>
					</div>
				</div>
			</div>
		</div>
		<!-- /BREADCRUMB -->

<?php $this->view("./Shared/footer"); ?>
