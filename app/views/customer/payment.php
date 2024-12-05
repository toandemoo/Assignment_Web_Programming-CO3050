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
										<img src="../public/assets/img/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
									</div>
									<div class="product-body">
										<h3 class="product-name"><?= htmlspecialchars($product['name']) ?></h3>
										<p class="product-description">Số lượng: <?= htmlspecialchars($product['quantity']) ?></p>
										<h4 class="product-price">
											<?= htmlspecialchars($product['price']) ?> $
										</h4>
										<p><strong>Tổng cộng:</strong> <?= htmlspecialchars($product['subTotal']) ?> $</p>
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
							<div><strong class="order-total" id="payment-total-amount"><?= htmlspecialchars($data['totalAmount']) ?> $</strong></div>
						</div>
					</div>
				</div>
				<!-- Form thông tin khách hàng -->
				<div id="payment-cus-info" class="payment">
					<h3>Thông tin khách hàng</h3>
					<form id="customerForm">
						<label for="name">Họ và Tên:</label>
						<input type="text" class="form-control" id="name" value="Trịnh Đình Khải" required readonly>
						
						<label for="phone">Số điện thoại:</label>
						<input type="text" class="form-control" id="phone" value="0394481457" required readonly>
						
						<label for="email">Email:</label>
						<input type="email" class="form-control" id="email" aria-describedby="emailHelp" required>
						
						<input type="checkbox" id="subscribe">
						<label for="subscribe">Nhận email thông báo và ưu đãi từ Electro</label>
					</form>
				</div>
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
						<form id="pickupForm">
							<p>Bạn đã chọn hình thức <strong>Nhận tại cửa hàng</strong>.</p>
							<label for="pickupLocation">Chọn cửa hàng:</label>
							<select id="pickupLocation" class="form-ct">
								<option value="store1">Cửa hàng 1</option>
								<option value="store2">Cửa hàng 2</option>
							</select>
						</form>
					<?php elseif ($shippingType === 'delivery') : ?>
						<!-- Form giao hàng tận nơi -->
						<form id="shippingForm" method="POST">
							<!-- Họ và Tên người nhận -->
							<label for="recipientName">Họ và Tên người nhận:</label>
							<input type="text" class="form-ct" id="recipientName" name="recipientName" placeholder="Nhập tên người nhận" required>
							
							<!-- Số điện thoại người nhận -->
							<label for="recipientPhone">Số điện thoại người nhận:</label>
							<input type="text" class="form-ct" id="recipientPhone" name="recipientPhone" placeholder="Nhập số điện thoại người nhận" required>

							<!-- Chọn Tỉnh/Thành phố -->
							<label for="provinceFilter">Tỉnh/Thành phố:</label>
							<select id="provinceFilter" class="form-ct" name="province" required onchange="this.form.submit()">
								<option value="">Chọn tỉnh/thành phố</option>
								<?php foreach ($locations as $province): ?>
									<option value="<?= $province['Id'] ?>" <?= (isset($_POST['province']) && $_POST['province'] === $province['Id']) ? 'selected' : '' ?>>
										<?= $province['Name'] ?>
									</option>
								<?php endforeach; ?>
							</select>

							<!-- Chọn Quận/Huyện -->
							<label for="districtFilter">Quận/Huyện:</label>
							<select id="districtFilter" class="form-ct" name="district" required>
								<option value="">Chọn quận/huyện</option>
								<?php if (!empty($districts)) : ?>
									<?php foreach ($districts as $district): ?>
										<option value="<?= $district['Id'] ?>"><?= $district['Name'] ?></option>
									<?php endforeach; ?>
								<?php endif; ?>
							</select>

							<!-- Ghi chú -->
							<label for="notes">Ghi chú:</label>
							<textarea class="form-control" id="notes" name="notes" rows="3" placeholder="Nhập ghi chú nếu cần thiết"></textarea>
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
				<form id="paymentForm">
					<!-- Các phương thức thanh toán, thông tin thêm -->
					<label for="paymentMethod">Phương thức thanh toán:</label>
					<select id="paymentMethod" class="form-ct" onchange="handlePaymentMethodChange(<?= $_SESSION['totalAmount'] ?? 0 ?>, 1)">
						<option value="credit-card">Thẻ tín dụng</option>
						<option value="bank-transfer">Chuyển khoản ngân hàng</option>
						<option value="cash-on-delivery">Thanh toán khi nhận hàng</option>
					</select>

					<!-- Container for QR code -->
					<div id="qr-container" style="display: none; text-align: center; margin-top: 20px;">
						<!-- QR code will be inserted here -->
					</div>
					
					<div class="submit-button" style="margin-bottom: 20px;">
						<button type="button" class="btn btn-success" onclick="completeOrder(event)">Hoàn tất đặt hàng</button>
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
				<!-- Nội dung thanh toán sẽ được thêm vào đây qua JavaScript -->
			</div>
			<div class="success-icon" id="successIcon" style="display: none;">
				<i class="fa fa-check-circle"></i>
				<p>Thanh toán thành công!</p>
			</div>
		</div>
	
<?php $this->view("./customer/Shared/footer",$data); ?>