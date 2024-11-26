<?php $this->view("header"); ?>

		<!-- NAVIGATION -->
		<nav id="navigation">
			<div class="container">
				<div id="responsive-nav">
						<ul class="main-nav nav navbar-nav">
							<li class="active"><a href="home">Home</a></li>
							<li><a href="about">About</a></li>
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
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Regular Page</h3>
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li class="active">Blank</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
		
<?php $this->view("footer"); ?>
