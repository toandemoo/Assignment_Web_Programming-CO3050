

CREATE DATABASE IF NOT EXISTS web_database;
USE web_database;
-- --------------------------------------------------------

CREATE TABLE `cart` (
  `id` int(50) NOT NULL,
  `soluong` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `product_id` int(50) NOT NULL,
  `size` int(50) NOT NULL,
  `status` varchar(250) NOT NULL
);


-- --------------------------------------------------------
CREATE TABLE `categories` (
  `id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL
);

INSERT INTO `categories` (`id`, `name`) VALUES
(0, 'Áo'),
(1, 'Quần'),
(2, 'Mũ');

-- --------------------------------------------------------

CREATE TABLE `comment` (
  `id` int(50) NOT NULL ,
  `user_id` int(50) NOT NULL,
  `time` date NOT NULL,
  `comment` varchar(250) NOT NULL,
  `product_id` int(50) NOT NULL
);

INSERT INTO `comment` (`id`, `user_id`, `time`, `comment`, `product_id`) VALUES
(1, 1, '2024-11-11', 'Sản phẩm rất tốt!', 101),
(2, 1, '2024-11-11', 'Chất lượng tuyệt vời!', 102);

-- --------------------------------------------------------


CREATE TABLE `orders` (
  `order_id` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `totalAmount` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `recipient_name` varchar(255) DEFAULT NULL,
  `recipient_phone` varchar(15) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `shipping_type` enum('pickup','delivery') DEFAULT 'pickup',
  `id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT 1,
  `status` varchar(255) NOT NULL DEFAULT 'pending' --chờ, đang giao, thành công
);


-- --------------------------------------------------------
CREATE TABLE `detailorders` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `size` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1
);

--
-- Cơ sở dữ liệu: `web_database`
--
CREATE TABLE `products` (
  `id` int(50) NOT NULL,
  `ptitle` varchar(250) NOT NULL,
  `pprice` varchar(250) NOT NULL,
  `pkind` varchar(100) NOT NULL,
  `pimg` varchar(250) NOT NULL,
  `pgender` varchar(100) NOT NULL,
  `pdescription` text DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `pimg1` varchar(255) DEFAULT NULL,
  `pimg2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

  `pdescription` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
);


CREATE TABLE `subimage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
);

INSERT INTO `subimage` (`id`, `product_id`, `img`) VALUES
(1, 101, 'link_to_subimage1.jpg'),
(2, 102, 'link_to_subimage2.jpg');

-- --------------------------------------------------------

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  'address' VARCHAR(255) NOT NULL,
  'img' VARCHAR(255)
);

-- --------------------------------------------------------

ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);


--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `ptitle`, `pprice`, `pkind`, `pimg`, `pgender`, `pdescription`, `create_at`, `pimg1`, `pimg2`) VALUES
(0, 'áo 104', '400000', 'Áo', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nam', '<p><strong>THÔNG TIN CHI TIẾT:</strong></p>\r\n<ul>\r\n    <li><strong>Chất vải:</strong> Cotton 95%, 5% spandex nên vải giữ được đặc tính tự nhiên, mềm mại, thoáng mát, co dãn 2 chiều, đứng form, công nghệ in lụa sắc nét, độ bền màu cao</li>\r\n    <li><strong>Form dáng:</strong> Form áo rộng, phù hợp với nhiều phong cách và dáng người khác nhau</li>\r\n    <li><strong>Màu sắc:</strong> Đen - Trắng</li>\r\n    <li><strong>Size:</strong> S - M – L – XL</li>\r\n</ul>\r\n<p><strong>HƯỚNG DẪN BẢO QUẢN:</strong></p>\r\n<ul>\r\n    <li>Không chà vải quá mạnh, trực tiếp lên hình in để không bị bong tróc và sờn áo</li>\r\n    <li>Lộn trái áo trước khi giặt để hình in bền màu lâu hơn</li>\r\n    <li>Hạn chế ngâm áo lâu trong nước hoặc dùng chất tẩy mạnh, đặc biệt đối với áo có màu</li>\r\n    <li>Phơi nắng hoặc ủi áo dưới nhiệt độ vừa phải giúp hạn chế tình trạng sờn vải, giữ màu áo luôn như mới</li>\r\n</ul>\r\n<p><strong>** Lưu ý:</strong> Nhớ nhắn tin cho shop để tư vấn size chính xác hơn nhé!</p>\r\n<div style=\"text-align:center; margin-top:20px;\">\r\n    <img src=\"https://cf.shopee.vn/file/vn-11134208-7qukw-liiohr32urbmc4\" alt=\"Product Image\" style=\"max-width:100%; height:auto;\">\r\n</div>\r\n', '2024-11-27 09:37:30', 'https://product.hstatic.net/1000088324/product/untitled-5_4363fbfbb58e429987154bccd8927e21_master.jpg', 'https://product.hstatic.net/1000088324/product/web__4__784fd35f90af466e892b3b24efa7ea7f_master.png'),
(1, 'áo 103', '300000', 'Áo', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nam', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30', 'https://product.hstatic.net/1000088324/product/untitled-5_4363fbfbb58e429987154bccd8927e21_master.jpg', 'https://product.hstatic.net/1000088324/product/web__4__784fd35f90af466e892b3b24efa7ea7f_master.png'),
(2, 'áo 101', '100000', 'Quần', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nữ', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30', 'https://product.hstatic.net/1000088324/product/untitled-5_4363fbfbb58e429987154bccd8927e21_master.jpg', 'https://product.hstatic.net/1000088324/product/web__4__784fd35f90af466e892b3b24efa7ea7f_master.png'),
(3, 'áo 102', '200000', 'Áo', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nữ', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30', 'https://product.hstatic.net/1000088324/product/untitled-5_4363fbfbb58e429987154bccd8927e21_master.jpg', 'https://product.hstatic.net/1000088324/product/web__4__784fd35f90af466e892b3b24efa7ea7f_master.png'),
(4, 'áo 105', '500000', 'Quần', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nam', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30', 'https://product.hstatic.net/1000088324/product/untitled-5_4363fbfbb58e429987154bccd8927e21_master.jpg', 'https://product.hstatic.net/1000088324/product/web__4__784fd35f90af466e892b3b24efa7ea7f_master.png'),
(5, 'áo 106', '600000', 'Áo', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nữ', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30', 'https://product.hstatic.net/1000088324/product/untitled-5_4363fbfbb58e429987154bccd8927e21_master.jpg', 'https://product.hstatic.net/1000088324/product/web__4__784fd35f90af466e892b3b24efa7ea7f_master.png'),
(6, 'áo 109', '200000', 'Áo', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nữ', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30', 'https://product.hstatic.net/1000088324/product/untitled-5_4363fbfbb58e429987154bccd8927e21_master.jpg', 'https://product.hstatic.net/1000088324/product/web__4__784fd35f90af466e892b3b24efa7ea7f_master.png'),
(7, 'Mũ 104', '400000', 'Mũ', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nam', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30', 'https://product.hstatic.net/1000088324/product/untitled-5_4363fbfbb58e429987154bccd8927e21_master.jpg', 'https://product.hstatic.net/1000088324/product/web__4__784fd35f90af466e892b3b24efa7ea7f_master.png'),
(8, 'Mũ 103', '300000', 'Mũ', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nam', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30', 'https://product.hstatic.net/1000088324/product/untitled-5_4363fbfbb58e429987154bccd8927e21_master.jpg', 'https://product.hstatic.net/1000088324/product/web__4__784fd35f90af466e892b3b24efa7ea7f_master.png'),
(9, 'Quần 101', '100000', 'Quần', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nữ', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30', 'https://product.hstatic.net/1000088324/product/untitled-5_4363fbfbb58e429987154bccd8927e21_master.jpg', 'https://product.hstatic.net/1000088324/product/web__4__784fd35f90af466e892b3b24efa7ea7f_master.png'),
(10, 'Quần 102', '200000', 'Quần', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nữ', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30', 'https://product.hstatic.net/1000088324/product/untitled-5_4363fbfbb58e429987154bccd8927e21_master.jpg', 'https://product.hstatic.net/1000088324/product/web__4__784fd35f90af466e892b3b24efa7ea7f_master.png'),
(11, 'áo 112', '500000', 'Áo', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nam', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30', 'https://product.hstatic.net/1000088324/product/untitled-5_4363fbfbb58e429987154bccd8927e21_master.jpg', 'https://product.hstatic.net/1000088324/product/web__4__784fd35f90af466e892b3b24efa7ea7f_master.png'),
(12, 'Quần 106', '600000', 'Quần', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nữ', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30', 'https://product.hstatic.net/1000088324/product/untitled-5_4363fbfbb58e429987154bccd8927e21_master.jpg', 'https://product.hstatic.net/1000088324/product/web__4__784fd35f90af466e892b3b24efa7ea7f_master.png'),
(13, 'Mũ 109', '200000', 'Mũ', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nữ', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30', 'https://product.hstatic.net/1000088324/product/untitled-5_4363fbfbb58e429987154bccd8927e21_master.jpg', 'https://product.hstatic.net/1000088324/product/web__4__784fd35f90af466e892b3b24efa7ea7f_master.png');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);
COMMIT;

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subimage`
--
ALTER TABLE `subimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_tokens`
--
ALTER TABLE `available`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;


ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;


ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;


ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;


ALTER TABLE `detailorders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

ALTER TABLE `subimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;



