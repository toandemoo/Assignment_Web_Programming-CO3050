
CREATE DATABASE IF NOT EXISTS web_database;
USE web_database;
-- --------------------------------------------------------

CREATE TABLE `cart` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `soluong` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `product_id` int(50) NOT NULL,
  `size` int(50) NOT NULL,
  `status` varchar(250) NOT NULL
);

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `soluong`, `user_id`, `product_id`, `size`, `status`) VALUES
(1, 2, 1, 101, 42, 'active'),
(2, 1, 1, 102, 40, 'active');

-- --------------------------------------------------------
CREATE TABLE `categories` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL
);

INSERT INTO `categories` (`id`, `name`) VALUES
(0, 'Áo'),
(1, 'Quần'),
(2, 'Mũ');

-- --------------------------------------------------------

CREATE TABLE `comment` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT 1,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `size` varchar(100) DEFAULT NULL
);

INSERT INTO `orders` (`id`, `user_id`, `product_name`, `quantity`, `order_date`, `size`) VALUES
(1, 7, 'áo 103', 1, '2024-11-27 00:38:59', 'M'),
(2, 6, 'áo 103', 2, '2024-11-27 00:38:59', 'L'),
(3, 3, 'áo 103', 3, '2024-11-27 00:38:59', 'S'),
(4, 4, 'áo 103', 4, '2024-11-27 00:38:59', 'XL'),
(5, 5, 'áo 103', 5, '2024-11-27 00:38:59', 'XXL');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `ptitle` varchar(250) NOT NULL,
  `pprice` varchar(250) NOT NULL,
  `pkind` varchar(100) NOT NULL,
  `pimg` varchar(250) NOT NULL,
  `pgender` varchar(100) NOT NULL,
  `pdescription` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
);

--
-- Dumping data for table `products`
--

INSERT INTO products (id, ptitle, pprice, pkind, pimg, pgender,pdescription, create_at) 
VALUES
(0, 'áo 104', '400000', 'Áo', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nam', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30'),
(1, 'áo 103', '300000', 'Áo', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nam', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30'),
(2, 'áo 101', '100000', 'Quần', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nữ', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30'),
(3, 'áo 102', '200000', 'Áo', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nữ', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30'),
(4, 'áo 105', '500000', 'Quần', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nam', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30'),
(5, 'áo 106', '600000', 'Áo', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nữ', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30'),
(6, 'áo 109', '200000', 'Áo', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nữ', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30'),
(7, 'Mũ 104', '400000', 'Mũ', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nam', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30'),
(8, 'Mũ 103', '300000', 'Mũ', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nam', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30'),
(9, 'Quần 101', '100000', 'Quần', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nữ', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30'),
(10, 'Quần 102', '200000', 'Quần', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nữ', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30'),
(11, 'áo 112', '500000', 'Áo', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nam', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30'),
(12, 'Quần 106', '600000', 'Quần', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nữ', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30'),
(13, 'Mũ 109', '200000', 'Mũ', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nữ', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30'),
(14, 'Quần 105', '100000', 'Quần', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nữ', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30'),
(15, 'Quần 106', '200000', 'Quần', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nữ', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30'),
(16, 'Quần 107', '100000', 'Quần', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nữ', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30'),
(17, 'Quần 108', '200000', 'Quần', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nữ', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30'),
(18, 'Quần 109', '100000', 'Quần', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nữ', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30'),
(19, 'Quần 1000', '200000', 'Quần', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nữ', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30'),
(20, 'Quần 134', '100000', 'Quần', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nữ', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30'),
(21, 'Quần 12', '200000', 'Quần', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nữ', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30'),
(22, 'Mũ 144', '200000', 'Mũ', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nữ', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30'),
(23, 'Mũ 155', '200000', 'Mũ', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nữ', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30'),
(24, 'Mũ 166', '200000', 'Mũ', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nữ', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30'),
(25, 'Mũ 177', '200000', 'Mũ', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nữ', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30'),
(26, 'Mũ 18', '200000', 'Mũ', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nữ', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30'),
(27, 'Mũ 189', '200000', 'Mũ', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nữ', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30'),
(28, 'Mũ 132', '200000', 'Mũ', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nữ', 'mô tả sản phẩm xxxxxxx', '2024-11-27 09:37:30');

-- --------------------------------------------------------

CREATE TABLE `size` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `size` int(11) NOT NULL
);


INSERT INTO `size` (`id`, `product_id`, `soluong`, `size`) VALUES
(1, 101, 10, 42),
(2, 102, 15, 40);

-- --------------------------------------------------------
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
  `role` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
);


INSERT INTO `users` (`id`, `name`, `email`, `password`, `gender`, `phone`, `birthday`, `created_at`, `role`) VALUES
(3, 'ton33', '12@gmail.com', '12', 'male', '123', '0000-00-00', '2024-11-26 14:48:58', 'user'),
(4, 'ton4', 'ton4@gmail.com', 'ton4', 'male', '124', '0000-00-00', '2024-11-26 14:48:58', 'user'),
(5, 'phạm đức toản', 'ton1@gmail.com', '123', 'female', '0339747813', '0000-00-00', '2024-11-26 16:39:48', 'user'),
(6, 'phạm đức toản', 'ton2@gmail.com', '123', 'male', '0339747813', '0000-00-00', '2024-11-26 16:40:54', 'user'),
(7, 'phạm đức toản12312', 'ton0@gmail.com', '123', 'male', '0339747813', '0000-00-00', '2024-11-26 16:41:29', 'user'),
(8, 'NGUYỄN THÀNH ĐẠT', 'dat@gmail.com', 'jhsda', 'male', '0368173053', '0000-00-00', '2024-12-01 02:54:08', 'user');

-- --------------------------------------------------------

ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

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
ALTER TABLE `user_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);



