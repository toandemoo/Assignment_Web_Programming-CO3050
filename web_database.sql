
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



