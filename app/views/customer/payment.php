<?php $this->view("./customer/Shared/header", $data); ?>

		<!--PAYMENT-->
		<?php
			// Nhận giá trị từ controller
			$currentTab = isset($data['currentTab']) ? $data['currentTab'] : 'info';
			$shippingType = isset($data['shippingType']) ? $data['shippingType'] : 'pickup';
		?>
		<div class="container">
			<!-- Section tiêu đề -->
			<div class="container text-center">
				<div class="row">
					<div class="col-sm-6">
							<h2 id="info-tab" 
								class="tab <?= $currentTab === 'info' ? 'active-tab' : 'text-dark'; ?> border-bottom">
								<a href="?tab=info" class="<?= $currentTab === 'info' ? 'text-danger' : ''; ?>">1. Thông tin</a>
							</h2>
					</div>
					<div class="col-sm-6">
							<h2 id="payment-tab" 
								class="tab <?= $currentTab === 'payment' ? 'active-tab' : 'text-dark'; ?> border-bottom">
								<a href="?tab=payment" class="<?= $currentTab === 'payment' ? 'text-danger' : ''; ?>">2. Thanh toán</a>
							</h2>
					</div>
				</div>
			</div>


			<?php if ($currentTab === 'info') : ?>
				<!-- Nội dung thông tin sản phẩm và khách hàng -->
				<div id="payment-product" class="payment">
					<h3>Sản phẩm đã chọn</h3>
					<div class="cart-list" id="payment-cart-items">
						<?php if (!empty($data['selectedProducts'])): ?>
							<?php foreach ($data['selectedProducts'] as $product): ?>
								<div class="product-widget">
									<div class="product-img">
										<img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
									</div>
									<div class="product-body">
										<h3 class="product-name"><?= htmlspecialchars($product['name']) ?></h3>
										<p class="product-description">Số lượng: <?= htmlspecialchars($product['quantity']) ?></p>
										<h4 class="product-price">
											<?= htmlspecialchars($product['price']) ?> đ
										</h4>
										<p><strong>Tổng cộng:</strong> <?= htmlspecialchars($product['subTotal']) ?> đ</p>
									</div>
								</div>
							<?php endforeach; ?>
						<?php else: ?>
							<p>Không có sản phẩm nào được chọn.</p>
						<?php endif; ?>
					</div>
					<div class="cart-summary">
						<div class="order-col">
							<div><strong>TỔNG TIỀN</strong></div>	
							<div><strong class="order-total" id="payment-total-amount"><?= htmlspecialchars($data['totalAmount']) ?> đ</strong></div>
						</div>
					</div>
				</div>
				<!-- Form thông tin khách hàng -->
				<div id="payment-cus-info" class="payment">
					<h3>Thông tin khách hàng</h3>
					<form id="customerForm">
						<label for="name">Họ và Tên:</label>
						<input type="text" class="form-control" id="name" 
							value="<?= $_SESSION['user_name'] ?? 'Tên người dùng chưa có'; ?>" required readonly>
						
						<label for="phone">Số điện thoại:</label>
						<input type="text" class="form-control" id="phone" 
							value="<?= $_SESSION['user_phone'] ?? 'Số điện thoại chưa có'; ?>" required readonly>
						
						<label for="email">Email:</label>
						<input type="email" class="form-control" id="email" 
							value="<?= $_SESSION['user_email'] ?? ''; ?>" aria-describedby="emailHelp" required readonly>
							
						<input type="checkbox" id="subscribe" 
							<?= isset($_SESSION['subscribe']) && $_SESSION['subscribe'] == true ? 'checked' : ''; ?>>
						<label for="subscribe">Nhận email thông báo và ưu đãi từ Electro</label>
					</form>
				</div>
				<?php
					// Kiểm tra và xử lý hình thức giao hàng
					if (isset($_GET['shippingType'])) {
						$shippingType = $_GET['shippingType'];

						// Nếu chọn 'pickup', xóa thông tin của hình thức 'delivery'
						if ($shippingType === 'pickup') {
							unset($_SESSION['recipientName']);
							unset($_SESSION['recipientPhone']);
							unset($_SESSION['province']);
							unset($_SESSION['district']);
							unset($_SESSION['notes']);
						}
						// Nếu chọn 'delivery', xóa thông tin của hình thức 'pickup'
						if ($shippingType === 'delivery') {
							unset($_SESSION['pickupLocation']);
						}

						// Lưu lại loại hình thức giao hàng được chọn vào session
						$_SESSION['shippingType'] = $shippingType;
					}
				?>
				<!--Form thông tin nhận hàng-->
				<div id="payment-ship-info" class="payment">
				<h3>Thông tin nhận hàng</h3>
					<div class="row">
						<div class="col form-check pickup-option">
							<a href="?tab=info&shippingType=pickup"<?= $shippingType === 'pickup' ? 'active' : '' ?>" style="<?= $shippingType === 'pickup' ? 'color: red;' : '' ?>">Nhận tại cửa hàng</a>
						</div>
						<div class="col form-check delivery-option">
							<a href="?tab=info&shippingType=delivery"<?= $shippingType === 'delivery' ? 'active' : '' ?>" style="<?= $shippingType === 'delivery' ? 'color: red;' : '' ?>">Giao hàng tận nơi</a>
						</div>
					</div>
					<?php if ($shippingType === 'pickup') : ?>
						<!-- Form nhận tại cửa hàng -->
						<form id="pickupForm" method="POST" action="">
							<label for="pickupLocation">Chọn cửa hàng:</label>
							<select id="pickupLocation" class="form-ct" name="pickupLocation" required onchange="this.form.submit()">
								<option value="store1" <?= (isset($_SESSION['pickupLocation']) && $_SESSION['pickupLocation'] === 'store1') ? 'selected' : '' ?>>Electro, 123 Đường Nguyễn Văn Cừ, Quận 5, TP.HCM</option>
								<option value="store2" <?= (isset($_SESSION['pickupLocation']) && $_SESSION['pickupLocation'] === 'store2') ? 'selected' : '' ?>>Electro, 125 Đường Phạm Văn Đồng, Quận 9, TP.HCM</option>
							</select>
						</form>
					<?php elseif ($shippingType === 'delivery') : ?>
						<!-- Form giao hàng tận nơi -->
						<form id="shippingForm" method="POST">
							<!-- Họ và Tên người nhận -->
							<label for="recipientName">Họ và Tên người nhận:</label>
							<input type="text" class="form-ct" id="recipientName" name="recipientName" placeholder="Nhập tên người nhận" value="<?= $_SESSION['recipientName'] ?? '' ?>" required>

							<!-- Số điện thoại người nhận -->
							<label for="recipientPhone">Số điện thoại người nhận:</label>
							<input type="text" class="form-ct" id="recipientPhone" name="recipientPhone" placeholder="Nhập số điện thoại người nhận" value="<?= $_SESSION['recipientPhone'] ?? '' ?>" required>

							<!-- Chọn Tỉnh/Thành phố -->
							<label for="provinceFilter">Tỉnh/Thành phố:</label>
							<select id="provinceFilter" class="form-ct" name="province" required onchange="this.form.submit()">
								<option value="">Chọn tỉnh/thành phố</option>
								<?php foreach ($locations as $province): ?>
									<option value="<?= $province['Id'] ?>" <?= (isset($_POST['province']) && $_POST['province'] === $province['Id']) || ($_SESSION['province'] ?? '') === $province['Id'] ? 'selected' : '' ?>>
										<?= $province['Name'] ?>
									</option>
								<?php endforeach; ?>
							</select>

							<!-- Chọn Quận/Huyện -->
							<label for="districtFilter">Quận/Huyện:</label>
							<select id="districtFilter" class="form-ct" name="district" required onchange="this.form.submit()">
								<option value="">Chọn quận/huyện</option>
								<?php if (!empty($districts)) : ?>
									<?php foreach ($districts as $district): ?>
										<option value="<?= $district['Id'] ?>" <?= (isset($_POST['district']) && $_POST['district'] === $district['Id']) || ($_SESSION['district'] ?? '') === $district['Id'] ? 'selected' : '' ?>>
											<?= $district['Name'] ?>
										</option>
									<?php endforeach; ?>
								<?php endif; ?>
							</select>

							<!-- Ghi chú -->
							<label for="notes">Ghi chú:</label>
							<textarea class="form-control" id="notes" name="notes" rows="3" placeholder="Nhập ghi chú nếu cần thiết"><?= $_SESSION['notes'] ?? '' ?></textarea>
						</form>
					<?php endif; ?>
				</div>

				<!-- Phần tiếp tục và kiểm tra thông tin -->
				<div id="payment-total" class="payment" style="margin-bottom: 20px;">
					<p id="provisional-total"></p>
					<div class="submit-button">
					<button type="submit" class="btn btn-danger" onclick="window.location.href='?tab=payment'">Tiếp tục</button>
					</div>
				</div>
			<?php endif; ?>
			
			<?php if ($currentTab === 'payment') : ?>
			<!-- Phần nội dung của Thanh toán -->
			<div id="payment-section" class="payment-section">
				<h3>Thanh toán</h3>
				<form id="paymentForm" method="POST" >
					<!-- Các phương thức thanh toán, thông tin thêm -->
					<label for="paymentMethod">Phương thức thanh toán:</label>
					<select id="paymentMethod" class="form-ct" name="paymentMethod" require onchange="handlePaymentMethodChange(<?= $_SESSION['totalAmount'] ?? 0 ?>, '<?= $_SESSION['order_id']?>')">
						<option value="bank-transfer" <?= (isset($_POST['paymentMethod']) && $_POST['paymentMethod'] === 'bank-transfer') ? 'selected' : '' ?>>Chuyển khoản ngân hàng</option>
						<option value="cash-on-delivery" <?= (isset($_POST['paymentMethod']) && $_POST['paymentMethod'] === 'cash-on-delivery') ? 'selected' : '' ?>>Thanh toán khi nhận hàng</option>
					</select>
										
					<!-- Container for QR code -->
					<div id="qr-container" style="display: none; text-align: center; margin-top: 20px;">
						<!-- QR code will be inserted here -->
					</div>
					
					<div class="submit-button" style="margin-bottom: 20px;">
						<button type="submit" class="btn btn-success">Hoàn tất đặt hàng</button>
					</div>
				</form>
			</div>
			<?php endif; ?>

		</div>
		<!--PAYMENT-->
		<!-- Payment Modal -->
		<div class="modal-overlay" id="modalOverlay"></div>
		<div class="payment-modal" id="paymentModal">
			<span class="modal-close" onclick="closePaymentModal()">&times;</span>
			<h3>Thanh toán đơn hàng</h3>
			<div class="timer" id="paymentTimer">10:00</div>
			<div id="paymentContent">
			</div>
			<div class="success-icon" id="successIcon" style="display: none;">
				<i class="fa fa-check-circle"></i>
				<p>Thanh toán thành công!</p>
			</div>
		</div>

		<!-- Connect to JavaScript -->
		<script src="../public/assets/js/payment.js"></script>
	
<?php $this->view("./customer/Shared/footer"); ?>