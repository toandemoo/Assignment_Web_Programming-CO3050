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
									<input type="checkbox" id="category-<?=$cate->id?>" class="filter-category">
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

						<!-- Filter Button -->
						<div class="aside">
							<button class="btn btn-primary btn-block" id="filter-button">Filter</button>
						</div>

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
									<select class="input-select" id="sort-items" onchange="applyFilter()">
										<option value="newest" <?= (isset($_GET['sort']) && $_GET['sort'] == 'newest') ? 'selected' : '' ?>>Newest</option>
										<option value="oldest" <?= (isset($_GET['sort']) && $_GET['sort'] == 'oldest') ? 'selected' : '' ?>>Oldest</option>
									</select>
								</label>

								<label>
									Show:
									<select class="input-select" id="show-items" onchange="applyFilter()">
										<option value="10" <?= (isset($_GET['show']) && $_GET['show'] == '10') ? 'selected' : '' ?>>10</option>
										<option value="20" <?= (isset($_GET['show']) && $_GET['show'] == '20') ? 'selected' : '' ?>>20</option>
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
							// Get the current page number or set it to 1 if not defined
							$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
							$totalPages = $data['totalPages'];
							
							// Get the current filter parameters and append them to the pagination URL
							$urlParams = [
								'show' => $_GET['show'] ?? 10,
								'sort' => $_GET['sort'] ?? 'newest',
								'categories' => $_GET['categories'] ?? '',  // Include categories filter
								'price_min' => $_GET['price_min'] ?? '',  // Include price_min filter
								'price_max' => $_GET['price_max'] ?? '',  // Include price_max filter
								'search' => $_GET['search'] ?? '',
							];

							// Ensure the 'categories' and price filters are removed if they are empty (i.e., not used)
							if (empty($urlParams['categories'])) {
								unset($urlParams['categories']);
							}
							if (empty($urlParams['price_min'])) {
								unset($urlParams['price_min']);
							}
							if (empty($urlParams['price_max'])) {
								unset($urlParams['price_max']);
							}

							// Build the URL query string with the parameters
							$urlParamsString = http_build_query($urlParams);
							if (isset($_GET['search'])) {
								// If the search query exists, construct the base URL with search and page parameters
								$baseUrl = ROOT . "Search?" . $urlParamsString . "&page=";
							} else {
								// If no search query, construct the base URL for "allproduct" page
								$baseUrl = ROOT . "allproduct?" . $urlParamsString . "&page=";
							}
							
							// Display Previous button if not on the first page
							if ($currentPage > 1) {
								echo '<li><a href="' . $baseUrl . ($currentPage - 1) . '"><i class="fa fa-angle-left"></i></a></li>';
							}

							// Display page numbers
							for ($page = 1; $page <= $totalPages; $page++) {
								if ($page == $currentPage) {
									echo '<li class="active">' . $page . '</li>';
								} else {
									echo '<li><a href="' . $baseUrl . $page . '">' . $page . '</a></li>';
								}
							}

							// Display Next button if not on the last page
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

		<script>
		function applyFilter() {
			var sortValue = document.getElementById('sort-items').value;  // Get selected value for sort
			var showValue = document.getElementById('show-items').value;  // Get selected value for show
			var currentUrl = new URL(window.location.href); // Get the current page URL

			// Set the new value for sort without changing the page
			currentUrl.searchParams.set('sort', sortValue);

			// If the 'show' value changes, reset the page to 1
			if (currentUrl.searchParams.get('show') !== showValue) {
				currentUrl.searchParams.set('page', 1);  // Reset page to 1
			}

			// Set the new 'show' value in the URL
			currentUrl.searchParams.set('show', showValue);

			// Reload the page with the updated URL
			window.location.href = currentUrl.toString();
		}

		document.addEventListener("DOMContentLoaded", function() {
		// Retrieve values from the URL
		const urlParams = new URLSearchParams(window.location.search);

		// Set the category checkboxes based on the URL params
		const selectedCategories = urlParams.get('categories') ? urlParams.get('categories').split(',') : [];
		console.log(selectedCategories);
		document.querySelectorAll('.filter-category').forEach(function(checkbox) {
			let label = document.querySelector(`label[for="${checkbox.id}"]`);
			if (label) {
				let categoryName = label.textContent.trim().split('(')[0]; // Extract category name before "("
				checkbox.checked = selectedCategories.map(category => category.trim()).includes(categoryName.trim());
			// Check if it's in the selected categories
					}
				});

			// Set the price range fields based on the URL params
			const priceMin = urlParams.get('price_min') || '';
			const priceMax = urlParams.get('price_max') || '';
			document.getElementById('price-min').value = priceMin;
			document.getElementById('price-max').value = priceMax;

			// Set the 'sort' dropdown based on the URL params
			const sortValue = urlParams.get('sort') || 'newest';  // Default to 'newest' if not set
			document.getElementById('sort-items').value = sortValue;

			// Set the 'show' dropdown based on the URL params
			const showValue = urlParams.get('show') || '10';  // Default to 10 items per page
			document.getElementById('show-items').value = showValue;
		});

		// Event listener for the 'Filter' button
		document.getElementById('filter-button').addEventListener('click', function() {
			// Get selected categories
			let selectedCategories = [];
			document.querySelectorAll('.filter-category:checked').forEach(function(checkbox) {
				// Find the label corresponding to the checkbox and extract its text
				let label = document.querySelector(`label[for="${checkbox.id}"]`);
				if (label) {
					let categoryName = label.textContent.trim().split('(')[0]; // Extract category name before "("
					selectedCategories.push(categoryName.trim());
				}
			});

			// Get price range values
			let priceMin = document.getElementById('price-min').value;
			let priceMax = document.getElementById('price-max').value;

			// Build the URL parameters
			let urlParams = new URLSearchParams(window.location.search);

			// Add selected categories to the URL, or remove them if none are selected
			if (selectedCategories.length > 0) {
				urlParams.set('categories', selectedCategories.join(','));
			} else {
				urlParams.delete('categories');
			}

			// Add price range to the URL, or remove them if empty
			if (priceMin !== "") {
				urlParams.set('price_min', priceMin);
			} else {
				urlParams.delete('price_min');
			}

			if (priceMax !== "") {
				urlParams.set('price_max', priceMax);
			} else {
				urlParams.delete('price_max');
			}

			// Add the current page and other parameters like 'sort' and 'show' to the URL
			let currentPage = new URLSearchParams(window.location.search).get('page') || 1;
			urlParams.set('page', 1); // Reset page to 1 when clicking filter
			urlParams.set('sort', document.getElementById('sort-items').value);
			urlParams.set('show', document.getElementById('show-items').value);

			// Reload the page with the updated filters
			window.location.search = urlParams.toString();
		});

		</script>

<?php $this->view("./customer/Shared/footer",$data); ?>