<?php $this->view("./customer/Shared/header", $data); ?>

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="<?= htmlspecialchars($data['row']->pimg)?>" alt="">
							</div>

							<div class="product-preview">
								<img src="<?= htmlspecialchars($data['row']->pimg1)?>" alt="">
							</div>

							<div class="product-preview">
								<img src="<?= htmlspecialchars($data['row']->pimg2)?>" alt="">
							</div>
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
						<div class="product-preview">
								<img src="<?= htmlspecialchars($data['row']->pimg)?>" alt="">
							</div>

							<div class="product-preview">
								<img src="<?= htmlspecialchars($data['row']->pimg1)?>" alt="">
							</div>

							<div class="product-preview">
								<img src="<?= htmlspecialchars($data['row']->pimg2)?>" alt="">
							</div>
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h1 class="product-name fs-1"><?=$data['row']->ptitle?></h1>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div>
								<h3 class="product-price"><?=$data['row']->pprice?></h3>
							</div>
							<form action="<?= ROOT ?>detail_product/AddToCart/<?=$data['row']->id?>" method="POST" id="addToCartForm">
								<div class="product-options">
									<!-- Lựa chọn Size -->
									<label>
											Size
											<select class="input-select" name="size">
												<option value="1" selected>1</option>
												<option value="2">2</option>
												<option value="3">3</option>
											</select>
									</label>
									<!-- Lựa chọn Màu sắc -->
									<label>
											Màu sắc
											<select class="input-select" name="color">
												<option value="Red" selected>Red</option>
												<option value="Yellow">Yellow</option>
												<option value="Gray">Gray</option>
											</select>
									</label>
									<!-- Nhập số lượng -->
									<br>
									<br>
									<label class="qty-label">
											Số lượng
											<div class="input-number">
												<input type="number" name="quantity" value="1" min="1" required>
												<span class="qty-up">+</span>
												<span class="qty-down">-</span>
											</div>
									</label>
								</div>
								<!-- Nút thêm vào giỏ hàng -->
								<?php
								// Server-side: xác định trạng thái đăng nhập
								$isLoggedIn = isset($_SESSION['email']) && !empty($_SESSION['email']);
								?>
								<div class="add-to-cart">
									<button type="button" class="add-to-cart-btn" onclick="handleAddToCart(<?= $isLoggedIn ? 'true' : 'false' ?>);">
										<i class="fa fa-shopping-cart"></i> Thêm vào giỏ
									</button>
								</div>
							</form>

							<script>
								function handleAddToCart(isLoggedIn) {
									if (!isLoggedIn) {
											alert("Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.");
											window.location.href = "<?= ROOT ?>login";
									} else {
											// Thực hiện hành động thêm vào giỏ hàng
											alert("Sản phẩm đã được thêm vào giỏ hàng.");
											document.getElementById('addToCartForm').submit();
									}
								}
							</script>


							<ul class="product-links">
								<li><h5>Loại sản phẩm:</h5></li>
								<li><a href="<?= ROOT ?>allproduct?categories=<?php echo $data['row']->pkind ?>"><?php echo $data['row']->pkind ?></a></li>
							</ul>
						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Mô Tả và Chi Tiết</a></li>
								<li><a data-toggle="tab" href="#tab3">Bình Luận(<?= $data['totalRating']?>)</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p><?=$data['row']->pdescription?></p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab3  -->
								<div id="tab3" class="tab-pane fade in">
									<div class="row">
										<!-- Rating -->
										<div class="col-md-3">
											<div id="rating">
												<div class="rating-avg">
													<span><?= $data['averageRating']; ?></span>
													<div class="rating-stars">
														<?php
														$averageRating = $data['averageRating'];
														for ($i = 1; $i <= 5; $i++): ?>
																<?php if ($i <= $averageRating): ?>
																	<i class="fa fa-star"></i>
																<?php else: ?>
																	<i class="fa fa-star-o"></i>
																<?php endif; ?>
														<?php endfor; ?>
													</div>
												</div>

												<ul class="rating">
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
														</div>
														<div class="rating-progress">
															<div style="width:<?= $data['percent5star'] ?>%;"></div>
														</div>
														<span class="sum"><?= $data['countRatingFivestar'];?></span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width:<?= $data['percent4star'] ?>%;"></div>
														</div>
														<span class="sum"><?= $data['countRatingFourstar'];?></span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width:<?= $data['percent3star'] ?>%;"></div>
														</div>
														<span class="sum"><?= $data['countRatingThreestar'];?></span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width:<?= $data['percent2star'] ?>%;"></div>
														</div>
														<span class="sum"><?= $data['countRatingTwostar'];?></span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width:<?= $data['percent1star'] ?>%;"></div>
														</div>
														<span class="sum"><?= $data['countRatingOnestar'];?></span>
													</li>
												</ul>
											</div>
										</div>
										<!-- /Rating -->

										<!-- Reviews -->
										<div class="col-md-6">
											<div id="reviews">
												<ul class="reviews">
													<?php if (is_array($data['comment'])): ?>
													<?php foreach ($data['comment'] as $row): ?>
													<li>
														<div class="review-heading">
															<h5 class="name"><?php echo $row->name?></h5>
															<p class="date"><?php echo $row->time?></p>
															<div class="review-rating">
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star"></i>
																<i class="fa fa-star-o empty"></i>
															</div>
														</div>
														<div class="review-body">
															<p><?php echo $row->comment?></p>
														</div>
													</li>
													<?php endforeach; ?>
													<?php else: ?>
														<p class="text-center">Không có bình luận.</p>
													<?php endif; ?>

												</ul>

												<?php if (is_array($data['comment'])): ?>
												<!-- Nút phân trang -->
												<ul class="reviews-pagination">
													<?php if ($data['total_pages'] > 1): ?>
															<?php for ($i = 1; $i <= $data['total_pages']; $i++): ?>
																<li class="<?php echo $i == $data['current_page']? 'active' : ''; ?>">
																	<a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
																</li>
															<?php endfor; ?>
													<?php endif; ?>
												</ul>
												<?php endif; ?>
											</div>
										</div>
										<!-- /Reviews -->

										<!-- Review Form -->
										<div class="col-md-3">
											<div id="review-form">
												<form class="review-form" action="<?= ROOT ?>detail_product/review/<?= $data['row']->id; ?>" method="GET">
													<input class="input" type="text" placeholder="Tên của bạn" name="username">
													<input class="input" type="email" placeholder="Email" name="email">
													<textarea class="input" placeholder="Bình luận của bạn" name="comment"></textarea>
													<div class="input-rating">
														<span>Đánh Giá: </span>
														<div class="stars">
															<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
															<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
															<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
															<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
															<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
														</div>
													</div>
													<button class="primary-btn">Gửi</button>
												</form>
											</div>
										</div>
										<!-- /Review Form -->
									</div>
								</div>
								<!-- /tab3  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Sản Phẩm Liên Quan</h3>
						</div>
					</div>

					<!-- product -->


					<?php if (is_array($data['relateProduct'])): ?>
					<?php foreach ($data['relateProduct'] as $row): ?>
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="<?php echo $row->pimg?>" alt="">
								<!-- <div class="product-label">
									<span class="sale">-30%</span>
								</div> -->
							</div>
							<div class="product-body">
								<!-- <p class="product-category">Category</p> -->
								<h3 class="product-name"><a href="#"><?php echo $row->ptitle ?></a></h3>
								<h4 class="product-price"><?php echo $row->pprice?><small><u style="color:#cc0000;">đ</u></small></h4>
								<div class="product-rating">
								</div>
							</div>
							<div class="add-to-cart">
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</button>
							</div>
						</div>
					</div>
					<?php endforeach; ?>
					<?php endif; ?>
					<!-- /product -->

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->

<?php $this->view("./customer/Shared/footer"); ?>
