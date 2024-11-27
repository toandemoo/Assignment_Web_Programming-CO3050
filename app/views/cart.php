<?php $this->view("./Shared/header"); ?>

		<!-- NAVIGATION -->
		<nav id="navigation">
			<div class="container">
				<div id="responsive-nav">
						<ul class="main-nav nav navbar-nav">
							<li><a href="<?php echo isset($_SESSION['email']) ? 'home' : 'index'; ?>">Home</a></li>
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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Giỏ hàng</h3>
                <ul class="breadcrumb-tree">
                    <li><a href="#">Home</a></li>
                    <li class="active">Giỏ hàng</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /BREADCRUMB -->

<!-- CART TABLE -->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Mô tả</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                           <td>1</td>
                            <td><img src="img/product01.png" alt="Tên sản phẩm 1" style="width: 50px; height: auto;">Tên sản phẩm 1</td>
                            <td>Mô tả sản phẩm 1</td>
                            <td>
                                <input type="number" value="1" min="1" style="width: 60px;">
                            </td>
                            <td>$980.00</td>
                            <td>
                              <button class="btn btn-secondary">Mua sau</button>
                              <button class="btn btn-secondary" onclick="removeProduct(this)"><i class="fa fa-close"></i> Xóa</button>
                            </td>
                        </tr>
                        <tr>
                           <td>2</td>
                            <td><img src="img/product02.png" alt="Tên sản phẩm 2" style="width: 50px; height: auto;">Tên sản phẩm 2</td>
                            <td>Mô tả sản phẩm 2</td>
                            <td>
                                <input type="number" value="2" min="1" style="width: 60px;">
                            </td>
                            <td>$1960.00</td>
                            <td>
                              <button class="btn btn-secondary">Mua sau</button>
                              <button class="btn btn-secondary" onclick="removeProduct(this)"><i class="fa fa-close"></i> Xóa</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-right total-price">
                  <div class="cart-summary">
                    <small id="item-count">2 Mặt hàng được chọn</small>
                    <h5 id="total-price">TỔNG CỘNG: $2940.00</h5>
                  </div>
                  <div class="cart-btns">
                     <a  style="margin-right: 5%;" href="all_product.html">Tiếp tục mua sắm</a>
                     <a href="Payment.html">Thanh toán <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /CART TABLE -->


		
<?php $this->view("./Shared/footer"); ?>