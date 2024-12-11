<?php $this->view("./customer/Shared/header", $data); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<div class="container mt-5">
    <?php if (isset($message)) : ?>
        <div class="alert alert-info"><?php echo htmlspecialchars($message); ?></div>
    <?php else: ?>
        <?php 
        $groupedOrders = [];
        // Nhóm các đơn hàng theo order_id
        foreach ($orders as $order) {
            $groupedOrders[$order->order_id][] = $order;
        }

        // Kiểm tra nếu groupedOrders trống
        if (empty($groupedOrders)): ?>
            <div class="alert alert-default-danger" style="height: 50rem;"><h3>Không có đơn hàng nào.</h3></div>
        <?php else: ?>
            <!-- Duyệt qua các đơn hàng đã nhóm -->
            <?php foreach ($groupedOrders as $orderId => $orderGroup): 
                // Tính tổng tiền cho từng đơn hàng
                $totalOrderAmount = 0;
                foreach ($orderGroup as $order) {
                    $totalOrderAmount += $order->quantity * $order->product->pprice; // Tính tổng cho mỗi đơn hàng
                }
            ?>
                <div class="order-details mb-4">
                    <!-- Khung cho đơn hàng -->
                    <div class="order-summary" style="border: 1px solid #ddd; padding: 15px; cursor: pointer;" data-bs-toggle="collapse" data-bs-target="#order-<?php echo $orderId; ?>" aria-expanded="false" aria-controls="order-<?php echo $orderId; ?>">
                        <h4 class="text-primary">Đơn hàng #<?php echo htmlspecialchars($orderId); ?></h4>
                        <p>Tổng tiền: <?php echo number_format($totalOrderAmount, 0, ',', '.'); ?> VND</p>
                    </div>

                    <!-- Thông tin chi tiết đơn hàng (ẩn khi không nhấn vào) -->
                    <div class="collapse" id="order-<?php echo $orderId; ?>">
                        <div class="order-full-details mt-3">
                            <table class="table table-bordered">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    // Duyệt qua tất cả sản phẩm trong nhóm đơn hàng
                                    foreach ($orderGroup as $order): 
                                        $itemTotal = $order->quantity * $order->product->pprice; // Tính thành tiền cho sản phẩm
                                    ?>
                                        <tr>
                                            <td>
                                                <img src="<?php echo htmlspecialchars($order->product->pimg); ?>" 
                                                            alt="<?php echo htmlspecialchars($order->product->ptitle); ?>" 
                                                            style="width: 50px; height: 50px;" 
                                                />
                                                <?php echo htmlspecialchars($order->product->ptitle); ?></td>
                                            <td><?php echo htmlspecialchars($order->quantity); ?></td>
                                            <td><?php echo number_format($order->product->pprice, 0, ',', '.'); ?> VND</td>
                                            <td><?php echo number_format($itemTotal, 0, ',', '.'); ?> VND</td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                            <h5 class="mt-4">Thông tin người nhận</h5>
                            <p><strong>Người nhận:</strong> <?php echo htmlspecialchars($orderGroup[0]->recipient_name); ?></p>
                            <p><strong>Số điện thoại:</strong> <?php echo htmlspecialchars($orderGroup[0]->recipient_phone); ?></p>
                            <p><strong>Địa chỉ nhận hàng:</strong> <?php echo htmlspecialchars($orderGroup[0]->province . ", " . $orderGroup[0]->district); ?></p>
                            <p><strong>Ghi chú:</strong> <?php echo htmlspecialchars($orderGroup[0]->notes); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    <?php endif; ?>
</div>


<?php $this->view("./customer/Shared/footer"); ?>
