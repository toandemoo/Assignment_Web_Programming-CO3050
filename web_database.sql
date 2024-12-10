-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 10, 2024 lúc 06:27 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_database`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
