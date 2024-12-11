document.addEventListener('DOMContentLoaded', () => {
    fetchCartItems();

    function fetchCartItems() {
        fetch('controller/cart_api.php?action=fetch_cart')
            .then(response => response.json())
            .then(data => renderCartItems(data))
            .catch(error => console.error('Error fetching cart items:', error));
    }

    function renderCartItems(cartItems) {
        const tableBody = document.querySelector('table tbody');
        const totalPriceElement = document.getElementById('total-price');
        const itemCountElement = document.getElementById('item-count');

        tableBody.innerHTML = '';
        let totalPrice = 0;

        if (cartItems.length === 0) {
            tableBody.innerHTML = '<tr><td colspan="6" class="text-center">Giỏ hàng trống</td></tr>';
        } else {
            cartItems.forEach((item, index) => {
                totalPrice += parseFloat(item.price) * item.quantity;

                const row = document.createElement('tr');
                row.dataset.cartId = item.cart_id;

                row.innerHTML = `
                    <td>${index + 1}</td>
                    <td>
                        <img src="${item.image}" alt="${item.name}" style="width: 50px; height: auto;">
                        ${item.name}
                    </td>
                    <td>${item.description}</td>
                    <td>
                        <input type="number" value="${item.quantity}" min="1" style="width: 60px;" onchange="updateQuantity(${item.cart_id}, this.value)">
                    </td>
                    <td>$${(item.price * item.quantity).toFixed(2)}</td>
                    <td>
                        <button class="btn btn-secondary" onclick="moveToWishlist(${item.cart_id})">Mua sau</button>
                        <button class="btn btn-secondary" onclick="removeProduct(${item.cart_id})"><i class="fa fa-close"></i> Xóa</button>
                    </td>
                `;

                tableBody.appendChild(row);
            });
        }

        itemCountElement.textContent = `${cartItems.length} Mặt hàng được chọn`;
        totalPriceElement.textContent = `TỔNG CỘNG: $${totalPrice.toFixed(2)}`;
    }

    window.removeProduct = function (cartId) {
        fetch(`../Assignment_Web_Programming-CO3050/controller/cart_api.php?action=remove_product`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ cart_id: cartId })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) fetchCartItems();
                else alert('Lỗi khi xóa sản phẩm');
            })
            .catch(error => console.error('Error removing product:', error));
    };

    window.moveToWishlist = function (cartId) {
        fetch(`../Assignment_Web_Programming-CO3050/controller/cart_api.php?action=move_to_wishlist`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ cart_id: cartId })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) fetchCartItems();
                else alert('Lỗi khi chuyển sản phẩm sang mua sau');
            })
            .catch(error => console.error('Error moving product to wishlist:', error));
    };

    window.updateQuantity = function (cartId, quantity) {
        console.log(`Update cart ID ${cartId} với số lượng ${quantity}`);
    };
});
