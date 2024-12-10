<?php $this->view("./customer/Shared/header", $data); ?>
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
							<h3 class="title">Sản Phẩm Mới</h3>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
					<div class="row">
						<div class="products-tabs">
							<div id="tab1" class="tab-pane active">
							<div class="products-slick" data-nav="#slick-nav-1">
								<?php if (is_array($data['rows'])): ?>
									<?php foreach ($data['rows'] as $row): ?>
									<!-- product -->
									<div class="product">
										<a href="<?= ROOT ?>detail_product/<?=$row->id?>">
											<div class="product-img">
											<img src="<?=$row->pimg?>" alt="">
											</div>
											<div class="product-body">
											<p class="product-category">Category</p>
											<h3 class="product-name"><a href="detail_product/<?=$row->id?>"><?=$row->ptitle?></a></h3>
											<h4 class="product-price"><?=$row->pprice?></h4>
											<div class="product-rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
											</div>
											</div>
											<div class="add-to-cart">
											<form action="<?= ROOT ?>detail_product/<?=$row->id?>" method="POST" name="addtocart">
												<button type="submit" name="product_id" value="<?=$row->id?>" class="add-to-cart-btn">
													<i class="fa fa-shopping-cart"></i> Add to Cart
												</button>
											</form>
											</div>
										</a>
									</div>
									<!-- /product -->
									<?php endforeach; ?>
								<?php endif; ?>
							</div>
							<div id="slick-nav-1" class="products-slick-nav"></div> <!-- Chứa mũi tên -->
							</div>
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
							<h3 class="title">Sản Phẩm Bán Chạy</h3>
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
													<p class="product-category">Category</p>
													<h3 class="product-name"><a href="detail_product/<?=$row->id?>"><?=$row->ptitle?></a></h3>
													<h4 class="product-price"><?=$row->pprice?> <del class="product-old-price">$990.00</del></h4>
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
																<i class="fa fa-shopping-cart"></i> Add to Cart
														</button>
													</form>
												</div>
											</a>
										</div>
										<!-- /product -->
										<?php endforeach; ?>
										<?php endif; ?>
									</div>
								</div>
								<div id="slick-nav-2" class="products-slick-nav"></div> <!-- Chứa mũi tên -->
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
