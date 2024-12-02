<?php $this->view("./customer/Shared/header", $data); ?>		

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-8">
						<h1>All PRODUCTS</h1>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!--  /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Categories</h3>
							
							<?php if (is_array($data['categories'])): ?>
							<?php foreach ($data['categories'] as $cate): ?>
							<div class="checkbox-filter">
								<div class="input-checkbox">
									<input type="checkbox" id="category-<?=$cate->id?>">
									<label for="category-<?=$cate->id?>">
										<span></span>
										<?=$cate->name?>
										<small>(<?=$cate->total?>)</small>
									</label>
								</div>
							</div>
							<?php endforeach; ?>
							<?php endif; ?>
								
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Price</h3>
							<div class="price-filter row">
								<div id="price-slider"></div>
								<div class="input-number price-min col">
									<input id="price-min" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>

								<div class="col-md-1">
									<i class="fa fa-minus"></i>
								</div>
								
								<div class="input-number price-max col">
									<input id="price-max" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Brand</h3>
							<div class="checkbox-filter">
								<div class="input-checkbox">
									<input type="checkbox" id="brand-1">
									<label for="brand-1">
										<span></span>
										SAMSUNG
										<small>(578)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-2">
									<label for="brand-2">
										<span></span>
										LG
										<small>(125)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-3">
									<label for="brand-3">
										<span></span>
										SONY
										<small>(755)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-4">
									<label for="brand-4">
										<span></span>
										SAMSUNG
										<small>(578)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-5">
									<label for="brand-5">
										<span></span>
										LG
										<small>(125)</small>
									</label>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-6">
									<label for="brand-6">
										<span></span>
										SONY
										<small>(755)</small>
									</label>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Top selling</h3>
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product01.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">product name goes here</a></h3>
									<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
								</div>
							</div>

							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product02.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">product name goes here</a></h3>
									<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
								</div>
							</div>

							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product03.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">product name goes here</a></h3>
									<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Sort By:
									<select class="input-select">
										<option value="0">Popular</option>
										<option value="1">Position</option>
									</select>
								</label>

								<label>
									Show:
									<select class="input-select" id="show-items" onchange="applyFilter()">
										<option value="20" <?= (isset($_GET['show']) && $_GET['show'] == '10') ? 'selected' : '' ?>>10</option>
										<option value="50" <?= (isset($_GET['show']) && $_GET['show'] == '20') ? 'selected' : '' ?>>20</option>
									</select>
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row">
							<!-- product -->
							<?php if (is_array($data['rows'])): ?>
										<?php foreach ($data['rows'] as $row): ?>
										<!-- <div class="row"> -->
										<!-- product -->
										<div class="col-md-4 col-xs-6">
										<div class="product">
											<a href="<?= ROOT ?>detail_product/<?=$row->id?>">
												<div class="product-img">
													<img src="<?=$row->pimg?>" alt="">
													<div class="product-label">
														<span class="sale">-30%</span>
														<span class="new">NEW</span>
													</div>
												</div>
												<div class="product-body">
													<p class="product-category"><?=$row->pkind?></p>
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
										</div>
										<!-- /product -->
										<?php endforeach; ?>
										<?php else: ?>
										<div class="col-md-12">
											<p class="text-center">Không tìm thấy sản phẩm nào.</p>
										</div>
										<?php endif; ?>
							<!-- /product -->
						</div>

						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">

							<ul class="store-pagination">
							<?php
								$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
								$totalPages = $data['totalPages'];
								$urlParams = http_build_query([
									'show' => $_GET['show'] ?? 10,
									'sort' => $_GET['sort'] ?? 0
								]);
								$baseUrl = ROOT . "allproduct?" . $urlParams . "&page=";

								// Hiển thị nút Previous
								if ($currentPage > 1) {
									echo '<li><a href="' . $baseUrl . ($currentPage - 1) . '"><i class="fa fa-angle-left"></i></a></li>';
								}

								// Hiển thị các số trang
								for ($page = 1; $page <= $totalPages; $page++) {
									if ($page == $currentPage) {
										echo '<li class="active">' . $page . '</li>';
									} else {
										echo '<li><a href="' . $baseUrl . $page . '">' . $page . '</a></li>';
									}
								}

								// Hiển thị nút Next
								if ($currentPage < $totalPages) {
									echo '<li><a href="' . $baseUrl . ($currentPage + 1) . '"><i class="fa fa-angle-right"></i></a></li>';
								}
								?>
							</ul>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

<?php $this->view("./customer/Shared/footer"); ?>