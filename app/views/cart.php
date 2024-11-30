<?php $this->view("./Shared/header"); ?>

        <!-- CART TABLE -->
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form action="<?= ROOT ?>payment" method="post">    
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                        <th>Xóa</th>
                                        <th>Thanh toán</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($data['product']) && is_array($data['product'])): ?>
                                        <?php foreach ($data['product'] as $item): ?>
                                            <tr>
                                                <td>
                                                    <img src="../public/assets/img/<?php echo htmlspecialchars($item->pimg); ?>" 
                                                        alt="<?php echo htmlspecialchars($item->ptitle); ?>" 
                                                        style="width: 100px; height: auto;">
                                                </td>
                                                <td>
                                                    <input type="number" name="quantities[<?php echo $item->id; ?>]" 
                                                        value="1" 
                                                        min="1" max="<?php echo htmlspecialchars($item->quantity); ?>" 
                                                        style="width: 60px;" 
                                                        onchange="updatePrice(this, <?php echo htmlspecialchars($item->pprice); ?>, '<?php echo $item->id; ?>')">
                                                </td>
                                                <td class="price" id="price-<?php echo $item->id; ?>">
                                                    <?php echo htmlspecialchars($item->pprice); ?> $
                                                </td>
                                                <td>
                                                    <a href="remove_from_cart.php?id=<?php echo $item->id; ?>" 
                                                        class="btn btn-danger">Chọn</a>
                                                </td>
                                                <td>
                                                    <input type="checkbox" name="selected_products[]" 
                                                        value="<?php echo $item->id; ?>" 
                                                        class="product-checkbox" 
                                                        data-price="<?php echo htmlspecialchars($item->pprice); ?>" />
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="text-center">Giỏ hàng trống</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <script>
                                function updatePrice(input, unitPrice, itemId) {
                                    const quantity = input.value;
                                    const totalPrice = (unitPrice * quantity).toFixed(2);
                                    document.getElementById('price-' + itemId).innerHTML = totalPrice + ' $';
                                    updateTotalPrice();
                                }

                                function updateTotalPrice() {
                                    const checkboxes = document.querySelectorAll('.product-checkbox:checked');
                                    let totalPrice = 0;

                                    checkboxes.forEach(checkbox => {
                                        const itemId = checkbox.value;
                                        const priceElement = document.getElementById('price-' + itemId);
                                        totalPrice += parseFloat(priceElement.innerHTML);
                                    });

                                    document.getElementById('total-price').innerHTML = 'TỔNG CỘNG: ' + totalPrice.toFixed(2) + ' $';
                                }
                            </script>
                            <div class="text-right total-price">
                                <div class="cart-summary">
                                    <small id="item-count">
                                        <?php echo !empty($cartItems) ? count($cartItems) : 0; ?> Mặt hàng được chọn
                                    </small>
                                    <h5 id="total-price">TỔNG CỘNG: 0.00 $</h5>
                                </div>
                                <div class="cart-btns">
                                    <a style="margin-right: 5%;" href="all_product.html">Tiếp tục mua sắm</a>
                                    <button type="submit" formaction="<?= ROOT ?>payment" class="btn btn-primary">
                                        Thanh toán <i class="fa fa-arrow-circle-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /CART TABLE -->


        <script>
            const checkboxes = document.querySelectorAll('.product-checkbox');
            const totalPriceElement = document.getElementById('total-price');
            let totalPrice = 0;

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const price = parseFloat(this.getAttribute('data-price'));
                    if (this.checked) {
                        totalPrice += price;
                    } else {
                        totalPrice = totalPrice - price; // sửa lại mất dấu trừ đi
                    }
                    totalPriceElement.innerHTML = 'TỔNG CỘNG: ' + totalPrice.toFixed(2) + ' $';
                });
            });
        </script>

<?php $this->view("./Shared/footer"); ?>