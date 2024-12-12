

CREATE DATABASE IF NOT EXISTS shopDb;
USE shopDb;
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
  `time` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `comment` varchar(250) NOT NULL,
  `product_id` int(50) NOT NULL,
  `rating` varchar(250) NOT NULL 
);

INSERT INTO `comment` (`id`, `user_id`, `comment`, `product_id`, `rating`) VALUES
(8, 31, 'Good value.', 93, '4'),
(9, 32,'Satisfied.', 94, '3'),
(10, 34, 'Worth the money.', 95, '5'),
(11, 35,  'Amazing product!', 96, '5'),
(12, 36, 'Absolutely loved it.', 97, '4'),
(13, 37, 'Great value for money.', 98, '5'),
(14, 38, 'Would buy again.', 93, '5'),
(15, 40, 'Highly satisfied.', 94, '4'),
(16, 41, 'Perfect choice!', 95, '5'),
(17, 42,  'Exceeded expectations.', 96, '4'),
(18, 43,  'Very happy with the purchase', 97, '5'),
(19, 44,  'Fantastic quality.', 98, '4'),
(20, 3,  'Impressive product.', 2, '5'),
(21, 8,  'Will definitely recommend.', 3, '4'),
(22, 9,  'Five stars!', 7, '5'),
(23, 26, 'Love it!', 21, '5'),
(24, 27, 'Excellent quality.', 27, '4'),
(25, 28, 'Totally worth it.', 90, '5'),
(26, 29,  'Great experience.', 91, '5'),
(27, 31,  'Exceptional value.', 94, '5'),
(29, 34,  'Highly recommend this!', 95, '4'),
(141, 36,  'Really good!', 94, '4'),
(142, 37,  'High quality.', 96, '5'),
(143, 38,  'Fantastic!', 97, '5'),
(144, 40,  'Great experience.', 98, '4'),
(145, 41, 'Perfect.', 93, '5'),
(146, 42, 'Not satisfied.', 96, '2'),
(147, 43,  'Poor quality.', 97, '1'),
(148, 44,  'Disappointed.', 98, '2'),
(149, 3,  'Could be better.', 2, '3'),
(150, 8, 'Not worth it.', 3, '2'),
(151, 9,  'Bad experience.', 7, '1'),
(152, 26, 'Low quality.', 21, '2'),
(153, 27,  'Unsatisfied.', 27, '3'),
(154, 28,  'Not great.', 90, '2'),
(155, 29,  'Terrible.', 91, '1'),
(156, 31,  'Bad experience.', 7, '1'),
(157, 32, 'Low quality.', 21, '2'),
(158, 34,  'Unsatisfied.', 27, '3'),
(159, 36,  'Not great.', 90, '2'),
(160, 37,  'Terrible.', 91, '1'),
(161, 38,  'Unhappy.', 94, '2'),
(162, 40, 'Wouldn’t recommend.', 95, '3'),
(163, 41, 'Unsatisfactory.', 96, '2'),
(164, 42,  'Bad choice.', 97, '1'),
(165, 43, 'Displeased.', 98, '2');


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
  `status` varchar(255) NOT NULL DEFAULT 'pending'
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
  `id` int(11) NOT NULL,
  `ptitle` varchar(250) NOT NULL,
  `pprice` varchar(250) NOT NULL,
  `pkind` varchar(100) NOT NULL,
  `pimg` varchar(250) NOT NULL,
  `pgender` varchar(100) NOT NULL,
  `pdescription` text DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `pimg1` varchar(255) DEFAULT NULL,
  `pimg2` varchar(255) DEFAULT NULL
);
INSERT INTO `products` (`id`, `ptitle`, `pprice`, `pkind`, `pimg`, `pgender`, `pdescription`, `create_at`, `pimg1`, `pimg2`) VALUES
(98, 'Bad Rabbit Fleece Shorts - WAVE RABBIT SHORT BLACK - Genuine Local Brand', '350000', 'Quần', 'https://localbrandviet.com/cdn/shop/files/vn-11134207-7r98o-lqvvd6yqa6c9b9.jpg?v=1718754862&width=713', 'Nam', '<div style=\"text-align:left; font-family: Arial, sans-serif; line-height: 1.6; color: #333;\">\r\n    <h2 style=\"font-size: 24px; color: #333; font-weight: bold;\">OVERSIZED FIT</h2>\r\n    <p style=\"font-size: 18px; color: #555; margin-top: 10px;\">\r\n        <strong>Features:</strong><br>\r\n        • Material: Felt<br>\r\n        • Technique: Embroidery<br>\r\n        • Fitting: Oversized Fit\r\n    </p>\r\n\r\n    <div style=\"text-align:center; margin-top:20px;\">\r\n        <img src=\"https://cf.shopee.vn/file/vn-11134208-7r98o-lqvw0i3nwzvd88\" alt=\"Oversized Fit\" style=\"width: 80%; max-width: 500px; border-radius: 8px;\"/>\r\n    </div>\r\n</div>\r\n', '2024-12-11 07:25:00', 'https://localbrandviet.com/cdn/shop/files/vn-11134207-7r98o-lqvvd6yq8rrtd9.jpg?v=1718754864&width=713', 'https://localbrandviet.com/cdn/shop/files/vn-11134207-7r98o-lqvvd6yqh77o89.jpg?v=1718754870&width=713'),
(97, 'Quần Âu Dài Dáng Suông Nữ Màu Ghi Basic LUMI PANTS_ DXQ150062', '250000', 'Quần', 'https://localbrandviet.com/cdn/shop/files/sg-11134201-7rdwf-lyoetpi9uwavb2.jpg?v=1727059127&width=713', 'Nữ', '<div style=\"text-align:left; font-family: Arial, sans-serif; line-height: 1.6; color: #333;\">\r\n    <h2 style=\"font-size: 24px; color: #333; font-weight: bold;\">Áo Polo Cộc Tay Nữ SUZY TOP Siêu Tôn Dáng _DXA140522</h2>\r\n\r\n    <div style=\"font-size: 18px; color: #555; margin-top: 10px;\">\r\n        <strong>Thông tin sản phẩm:</strong><br>\r\n        <strong>Màu sắc:</strong> Đen, Trắng, Xám (hoặc tùy chọn màu bạn có)<br>\r\n        <strong>Size:</strong> S / M / L / XL<br>\r\n        <strong>Chất liệu:</strong><br>\r\n        - Chất Tuypsi Hàn nhập khâu cao cấp, dày dặn, mềm mại, lên form đẹp tôn dáng.<br>\r\n        - Vải đều được xử lí trước khi đưa vào sản xuất nên mặc thoải mái, không bị kích ứng da.\r\n    </div>\r\n\r\n    <h3 style=\"font-size: 20px; margin-top: 20px;\">Bảng Size sản phẩm:</h3>\r\n    <div style=\"text-align:center; margin-top:10px;\">\r\n        <img src=\"https://cf.shopee.vn/file/vn-11134208-7r98o-lynyofy21g0d5c\" alt=\"Size chart\" style=\"width: 80%; max-width: 500px; border-radius: 8px;\"/>\r\n    </div>\r\n\r\n    <div style=\"text-align:center; margin-top: 20px;\">\r\n        <img src=\"https://cf.shopee.vn/file/vn-11134208-7r98o-lynyofy21g0d5c\" alt=\"Áo Polo Cộc Tay Nữ SUZY\" style=\"width: 80%; max-width: 500px; border-radius: 8px;\"/>\r\n    </div>\r\n</div>\r\n', '2024-12-11 07:20:00', 'https://localbrandviet.com/cdn/shop/files/sg-11134201-7rdwl-lyoetpt3f2wkf8.jpg?v=1727059129&width=713', 'https://localbrandviet.com/cdn/shop/files/sg-11134201-7rdyg-lyoetqf0izgn12.jpg?v=1727059135&width=713'),
(96, 'BLANKESPACE Quần Dài Folder Pants Màu Nâu Xám Chất Liệu Kaki Mềm Nam Nữ Unisex', '400000', 'Quần', 'https://localbrandviet.com/cdn/shop/files/vn-11134207-7r98o-m0b605obzoun27.jpg?v=1726776565&width=713', 'Nam', '<div style=\"font-family: Arial, sans-serif; line-height: 1.6; color: #333; padding: 20px;\">\r\n    <h2 style=\"font-size: 24px; color: #333; font-weight: bold;\">Quần Dài</h2>\r\n    \r\n    <div style=\"font-size: 18px; color: #555;\">\r\n        <strong>Chất liệu:</strong> Cotton, họa tiết in trực tiếp vào vải không bong tróc khi giặt.\r\n    </div>\r\n\r\n    <h3 style=\"font-size: 20px; margin-top: 20px;\">Lưu ý khi sử dụng sản phẩm:</h3>\r\n    <ul style=\"font-size: 16px; color: #555; margin-top: 10px;\">\r\n        <li>Đồ trắng, đen giặt riêng với các loại đồ màu khác.</li>\r\n        <li>Ủi và giặt nên lật mặt trái của sản phẩm, không ủi trực tiếp lên hình in/thêu.</li>\r\n        <li>Phơi quần áo ở nhiệt độ trung bình (30 độ C).</li>\r\n        <li>Không giặt quần áo với nước tẩy.</li>\r\n        <li>Đối với sản phẩm chất liệu len, lụa, vải đan, dệt kim, lông hoặc bộ blazer nên giặt tay hoặc giặt hấp để sản phẩm bền và giữ đúng chất lượng.</li>\r\n    </ul>\r\n\r\n    <h3 style=\"font-size: 20px; margin-top: 20px;\">Quy định đổi trả:</h3>\r\n    <ul style=\"font-size: 16px; color: #555; margin-top: 10px;\">\r\n        <li>Đối với mặt hàng giảm giá, vui lòng không đổi trả.</li>\r\n        <li>Để đảm bảo quyền lợi cho khách hàng cũng như tránh kẻ gian, xin quý khách lúc nhận hàng quay lại video khi khui kiện hàng. Shop chỉ giải quyết khi có video đổi với hàng mới, shop chỉ nhận đổi các sản phẩm bị lỗi sản xuất còn nguyên tag chưa qua sử dụng và đủ túi vải đi kèm trong vòng 3 ngày kể từ ngày nhận được hàng.</li>\r\n        <li>Nhận đổi trả size trong vòng 3 ngày kể từ ngày nhận hàng, phí ship đổi size quý khách vui lòng thanh toán 2 chiều.</li>\r\n        <li>Khách hàng liên hệ phần chat để được nhân viên chăm sóc khách hàng giải quyết nhanh chóng đối với đơn đổi size hoặc lỗi từ nhà sản xuất.</li>\r\n    </ul>\r\n\r\n    <h3 style=\"font-size: 20px; margin-top: 20px;\">Cam kết thương hiệu:</h3>\r\n    <ul style=\"font-size: 16px; color: #555; margin-top: 10px;\">\r\n        <li>Tư vấn hỗ trợ khách hàng nhanh chóng, nhiệt tình.</li>\r\n        <li>Thời gian chuẩn bị hàng tối ưu nhất.</li>\r\n        <li>Đổi trả hàng theo đúng quy định của Shopee khi có video kèm theo.</li>\r\n        <li>Màu sắc sản phẩm có thể chênh lệch thực tế một phần nhỏ, do ảnh hưởng về độ lệch màu của ánh sáng nhưng vẫn đảm bảo chất lượng.</li>\r\n        <li>Blanke đồng hành cùng bạn trên mọi quyền lợi của khách hàng và hành trình khám phá phong cách cá nhân riêng của mình.</li>\r\n    </ul>\r\n\r\n    <h3 style=\"font-size: 18px; color: #777; margin-top: 30px;\">#aothun #blanksoul #unisex #aophong #streetwear #aolocalbrand #aounisex #aoblanke #aothunlocalbrand #aothunblanksoul #aophongnam #aophongnu #oversize #aothunnamnu #aothuntaylo #aongantay</h3>\r\n</div>\r\n', '2024-12-11 07:15:00', 'https://localbrandviet.com/cdn/shop/files/vn-11134207-7r98o-m0b5zl561danb4.jpg?v=1726776569&width=713', 'https://localbrandviet.com/cdn/shop/files/vn-11134207-7r98o-m0b5zuq20o0f47.jpg?v=1726776575&width=713'),
(95, 'RECHIC Áo kiểu Nara sát nách bo cổ nhẹ cách điệu thanh lịch', '400000', 'Áo', 'https://localbrandviet.com/cdn/shop/files/vn-11134201-7r98o-lyhfgjdyz9up3d.jpg?v=1723098058&width=713', 'Nữ', '<div style=\"font-family: Arial, sans-serif; line-height: 1.6; color: #333; padding: 20px;\">\r\n    <h2 style=\"font-size: 24px; color: #333; font-weight: bold;\">RECHIC Áo kiểu Nara sát nách bo cổ nhẹ cách điệu thanh lịch</h2>\r\n\r\n    <div style=\"text-align: center; margin-top: 20px;\">\r\n        <img src=\"https://localbrandviet.com/cdn/shop/files/vn-11134201-7r98o-lyhfgislxcip0b.jpg?v=1723098054&width=713\" alt=\"RECHIC Áo kiểu Nara\" style=\"max-width: 100%; height: auto; margin-bottom: 20px;\">\r\n    </div>\r\n\r\n    <h3 style=\"font-size: 20px; margin-top: 20px;\">Thông tin sản phẩm</h3>\r\n    <div style=\"font-size: 18px; color: #555;\">\r\n        <p><strong>Chất liệu:</strong> Chéo ý</p>\r\n        <p><strong>Mô tả chất liệu:</strong> Form vải đứng, ít nhăn, nhẹ và dễ giặt.</p>\r\n        <p><strong>Đặc điểm:</strong> Áo sát nách, phần cổ cách điệu bo nhẹ.</p>\r\n        <p><strong>Họa tiết:</strong> Trơn</p>\r\n    </div>\r\n\r\n    <h3 style=\"font-size: 20px; margin-top: 20px;\">Thông số sản phẩm (ĐVT: CM)</h3>\r\n    <div style=\"font-size: 18px; color: #555;\">\r\n        <p><strong>Số đo ngực:</strong> 84(S) - 88(M) - 92(L) - 96(XL)</p>\r\n        <p><strong>Số đo eo:</strong> 64(S) - 68(M) - 72(L) - 76(XL)</p>\r\n        <p><strong>Số đo mông:</strong> 92(S) - 94(M) - 98(L) - 102(XL)</p>\r\n    </div>\r\n\r\n    <h3 style=\"font-size: 20px; margin-top: 20px;\">Hướng dẫn bảo quản</h3>\r\n    <ul style=\"font-size: 16px; color: #555; margin-top: 10px;\">\r\n        <li>Giặt máy ở nhiệt độ tối đa 30°C, giặt bên trong túi giặt và vắt ở tốc độ thấp để sản phẩm được bảo vệ tốt hơn.</li>\r\n        <li>Không sử dụng nước tẩy, thuốc tẩy, bột giặt có chất tẩy mạnh. Không giặt chung sản phẩm màu trắng với các sản phẩm khác màu tránh tình trạng loang màu.</li>\r\n        <li>Phơi ngay sau khi giặt giúp sản phẩm đỡ nhăn, phơi mặt trái ở bóng râm giúp sản phẩm lưu giữ màu tốt hơn.</li>\r\n        <li>Là sản phẩm ở nhiệt độ dưới 110°C, ưu tiên dùng bàn là hơi nước.</li>\r\n    </ul>\r\n</div>\r\n', '2024-12-11 07:10:00', 'https://localbrandviet.com/cdn/shop/files/vn-11134202-7r98o-lyn83ejs99y957.jpg?v=1723098061&width=713', 'https://localbrandviet.com/cdn/shop/files/vn-11134202-7r98o-lyn83mvg2r0tf3.jpg?v=1723098076&width=713'),
(94, '[SMAKER] Unisex Cardigan for men and women, high quality wool, genuine local brand - KNIT CARDIGAN IN GREY', '650000', 'Áo', 'https://localbrandviet.com/cdn/shop/files/sg-11134201-22100-7j5hzoahhdiv51.jpg?v=1719343308&width=713', 'Nam', 'Áo khoác jeans nam màu xanh, thiết kế thời trang, hợp xu hướng với các chi tiết phá cách.', '2024-12-11 07:05:00', 'https://localbrandviet.com/cdn/shop/files/bd968830c0e4e9790419cf37fb17a816.jpg?v=1719343312&width=713', 'https://localbrandviet.com/cdn/shop/files/sg-11134201-22100-c348870ghdiv9a.jpg?v=1719343316&width=713'),
(93, 'Genuine HADES Brand Unisex HOCKEY Fleece Long Sleeve T-Shirt', '500000', 'Áo', 'https://localbrandviet.com/cdn/shop/files/vn-11134201-7r98o-lmpsgt3y190f11.jpg?v=1719027378&width=713', 'Nam', '<div style=\"font-family: Arial, sans-serif; line-height: 1.6; color: #fff; background-color: #333; padding: 20px;\">\r\n    <h2 style=\"font-size: 24px; color: #fff; font-weight: bold;\">HADES Streetwear Long Sleeve Shirt</h2>\r\n\r\n    <h3 style=\"font-size: 20px; color: #fff; margin-top: 20px;\">PRODUCT INFORMATION</h3>\r\n    <div style=\"font-size: 16px; color: #ccc;\">\r\n        <p><strong>Style:</strong> Streetwear</p>\r\n        <p><strong>Pattern:</strong> Silk screen printing</p>\r\n        <p><strong>Design:</strong> Long Sleeve Shirt</p>\r\n        <p><strong>Sleeve length:</strong> Long sleeve</p>\r\n        <p><strong>Fabric type:</strong> Crab Leg Felt</p>\r\n    </div>\r\n\r\n    <h3 style=\"font-size: 20px; color: #fff; margin-top: 20px;\">SIZE CHART</h3>\r\n    <div style=\"font-size: 16px; color: #ccc;\">\r\n        <p><strong>Size:</strong> S, M, L, XL</p>\r\n        <p><strong>Width:</strong> 54, 56, 58, 60</p>\r\n        <p><strong>Height:</strong> 68, 72, 74, 78</p>\r\n        <p><strong>Fit:</strong>\r\n            <ul>\r\n                <li>&lt;1m6, 1m6-1m7, 1m7-1m8, &gt;1m8</li>\r\n                <li>&lt;55kg, 55kg-70kg, 70kg-85kg, 85kg-95kg</li>\r\n            </ul>\r\n        </p>\r\n    </div>\r\n\r\n    <h3 style=\"font-size: 20px; color: #fff; margin-top: 20px;\">INSTRUCTIONS FOR USE & MAINTENANCE</h3>\r\n    <ul style=\"font-size: 16px; color: #ccc;\">\r\n        <li>Do not use bleach.</li>\r\n        <li>Wash at normal temperature (with similar colors).</li>\r\n        <li>Hand wash and turn shirt inside out to keep print lasting.</li>\r\n        <li>Avoid ironing directly on the print, only iron on fabric or use a steam iron at the appropriate temperature.</li>\r\n    </ul>\r\n\r\n    <h3 style=\"font-size: 20px; color: #fff; margin-top: 20px;\">RETURN AND EXCHANGE POLICY</h3>\r\n    <div style=\"font-size: 16px; color: #ccc;\">\r\n        <p>Products can be returned or exchanged once within 3 days of purchase (only size can be exchanged, no other models or colors accepted).</p>\r\n        <p>Free exchange for customers buying at HADES in case of manufacturer\'s defect or wrong delivery within 1 month.</p>\r\n        <p>Returned products must be new with original labels, tags, and purchase receipt, and not damaged by external factors after purchase.</p>\r\n    </div>\r\n\r\n    <h3 style=\"font-size: 20px; color: #fff; margin-top: 20px;\">SOCIAL MEDIA HASHTAGS</h3>\r\n    <p style=\"font-size: 16px; color: #ccc; margin-top: 20px;\">#hades #sweaterhades #Localbrand #Hoodie #aoam #aohoodie #aokhoacni #aokhoacconon #aokhoac #unisex #hoodienam #hoodienu #aokhoacnam #aokhoacnu #aokhoacthoitrang #aothun #hades #unisex #aophong #streetwear #aolocalbrand #aounisex #aohades #aothunlocalbrand #aothunhades #aophongnam #aophongnu #oversized #aothunoversize #aothunnamnu #aothunnam #aothunnu #aothununisex #aothuntaydai #aothuncotron</p>\r\n</div>\r\n', '2024-12-11 07:00:00', 'https://localbrandviet.com/cdn/shop/files/vn-11134201-7r98o-lmpsgsz86qxrb1.jpg?v=1719027385&width=713', 'https://localbrandviet.com/cdn/shop/files/vn-11134201-7r98o-lmpsgswqaeovb3.jpg?v=1719027358&width=713'),
(2, 'Áo thun Teeworld Chê T-shirt', '199000', 'Áo', 'https://product.hstatic.net/1000088324/product/mock_up_ao_che_ban_to_ao_mau_xam_beac96461fea47f081ce590092cf415a_master.png', 'Nữ', '<p><strong>THÔNG TIN CHI TIẾT:</strong></p>\r\n<ul>\r\n    <li><strong>Chất vải:</strong> Cotton 95%, 5% spandex nên vải giữ được đặc tính tự nhiên, mềm mại, thoáng mát, co dãn 2 chiều, đứng form, công nghệ in lụa sắc nét, độ bền màu cao</li>\r\n    <li><strong>Form dáng:</strong> Form áo rộng, phù hợp với nhiều phong cách và dáng người khác nhau</li>\r\n    <li><strong>Màu sắc:</strong> Đen - Trắng</li>\r\n    <li><strong>Size:</strong> S - M – L – XL</li>\r\n</ul>\r\n<p><strong>HƯỚNG DẪN BẢO QUẢN:</strong></p>\r\n<ul>\r\n    <li>Không chà vải quá mạnh, trực tiếp lên hình in để không bị bong tróc và sờn áo</li>\r\n    <li>Lộn trái áo trước khi giặt để hình in bền màu lâu hơn</li>\r\n    <li>Hạn chế ngâm áo lâu trong nước hoặc dùng chất tẩy mạnh, đặc biệt đối với áo có màu</li>\r\n    <li>Phơi nắng hoặc ủi áo dưới nhiệt độ vừa phải giúp hạn chế tình trạng sờn vải, giữ màu áo luôn như mới</li>\r\n</ul>\r\n<p><strong>** Lưu ý:</strong> Nhớ nhắn tin cho shop để tư vấn size chính xác hơn nhé!</p>\r\n<div style=\"text-align:center; margin-top:20px;\">\r\n    <img src=\"https://cf.shopee.vn/file/vn-11134208-7qukw-liiohr32urbmc4\" alt=\"Product Image\" style=\"max-width:100%; height:auto;\">\r\n</div>', '2024-11-27 02:37:30', 'https://product.hstatic.net/1000088324/product/che_78645c075702406d910e02d8ebab3c7c_master.png', 'https://product.hstatic.net/1000088324/product/tiktokshop_967cae121a1b416d9de6387107ca3d04_master.png'),
(3, 'Áo thun Teeworld Secret Of Liquid T-shirt', '200000', 'Áo', 'https://product.hstatic.net/1000088324/product/mock_up_mat_sau_4b374fe7011b4c7cbcd6cc611b89673e_master.png', 'Nam', '<p><strong>THÔNG TIN CHI TIẾT:</strong></p>\r\n<ul>\r\n    <li><strong>Chất vải:</strong> Cotton 95%, 5% spandex nên vải giữ được đặc tính tự nhiên, mềm mại, thoáng mát, co dãn 2 chiều, đứng form, công nghệ in lụa sắc nét, độ bền màu cao</li>\r\n    <li><strong>Form dáng:</strong> Form áo rộng, phù hợp với nhiều phong cách và dáng người khác nhau</li>\r\n    <li><strong>Màu sắc:</strong> Đen - Trắng</li>\r\n    <li><strong>Size:</strong> S - M – L – XL</li>\r\n</ul>\r\n<p><strong>HƯỚNG DẪN BẢO QUẢN:</strong></p>\r\n<ul>\r\n    <li>Không chà vải quá mạnh, trực tiếp lên hình in để không bị bong tróc và sờn áo</li>\r\n    <li>Lộn trái áo trước khi giặt để hình in bền màu lâu hơn</li>\r\n    <li>Hạn chế ngâm áo lâu trong nước hoặc dùng chất tẩy mạnh, đặc biệt đối với áo có màu</li>\r\n    <li>Phơi nắng hoặc ủi áo dưới nhiệt độ vừa phải giúp hạn chế tình trạng sờn vải, giữ màu áo luôn như mới</li>\r\n</ul>\r\n<p><strong>** Lưu ý:</strong> Nhớ nhắn tin cho shop để tư vấn size chính xác hơn nhé!</p>\r\n<div style=\"text-align:center; margin-top:20px;\">\r\n    <img src=\"https://cf.shopee.vn/file/vn-11134208-7qukw-liiohr32urbmc4\" alt=\"Product Image\" style=\"max-width:100%; height:auto;\">\r\n</div>', '2024-11-27 02:37:30', 'https://product.hstatic.net/1000088324/product/img_2100_3055280c92b242bcb648b6b58ebefcd2_master.jpg', 'https://product.hstatic.net/1000088324/product/img_2104_004282e488b94ac1b0415758274ee1b2_master.jpg'),
(7, 'Mũ Lưỡi Trai Đen Trơn Classic Khóa Đồng Cao Cấp Cho Nam và Nữ', '145000', 'Mũ', 'https://zerdio.com.vn/wp-content/uploads/2020/12/mu-luoi-trai-den-tron-9.jpg', 'Nam', ' <p>\r\n        <strong>Mũ lưỡi trai đen trơn</strong> thể hiện lối sống của đa số người trẻ đương đại – \r\n        <span class=\"highlight\">TỐI GIẢN</span>. \r\n    </p>\r\n    <p>\r\n        Chiếc nón kết đen trơn là một trong những xu hướng thời trang năm 2025 được nhiều người theo đuổi.\r\n    </p>\r\n    <p>\r\n        Thiết kế mũ lưỡi trai đen trơn chất liệu cao cấp không chỉ mang đến cho bạn sự \r\n        <span class=\"highlight\">thanh lịch, cuốn hút</span> mà còn thể hiện \r\n        <span class=\"highlight\">đẳng cấp thời thượng</span>.\r\n    </p>\r\n    <img \r\n        src=\"https://zerdio.com.vn/wp-content/uploads/2020/12/mu-nam-den-1.jpg\" \r\n        alt=\"Mũ lưỡi trai đen trơn\" \r\n        class=\"product-image\"\r\n    />', '2024-11-27 02:37:30', 'https://zerdio.com.vn/wp-content/uploads/2020/12/mu-luoi-trai-nam-den-1.jpg', 'https://zerdio.com.vn/wp-content/uploads/2020/12/non-ket-den-tron-1.jpg'),
(20, 'QUẦN JEANS LIDER NEXUS CARGO DENIM PANTS', '500000', 'Quần', 'https://localbrandviet.com/cdn/shop/files/vn-11134207-7r98o-lv2z4qz6lce1d6.jpg?v=1720254330&width=713', 'Nữ', '<div style=\"margin-top:20px; font-family: Arial, sans-serif;\">\r\n    <h2 style=\"color: #333; text-align: left;\">LIDER JEANS - Quần Suông Thẳng Wash Xào Phun Phối Trắng</h2>\r\n    <p style=\"color: #555; font-size: 18px; margin: 10px 0; text-align: left;\">\r\n        <strong>Chất liệu:</strong> Denim\r\n    </p>\r\n    <p style=\"color: #555; font-size: 18px; margin: 10px 0; text-align: left;\">\r\n        <strong>Màu:</strong> Wash xào phun phối trắng trang trí\r\n    </p>\r\n    <p style=\"color: #555; font-size: 18px; margin: 10px 0; text-align: left;\">\r\n        <strong>Đặc điểm:</strong> \r\n        Ống quần suông thẳng, ống rộng, quần có thiết kế sáu túi với độ dài phủ gót. Nổi bật bởi vết mài mòn được làm thủ công, rã thân trước, rã gối trước. \r\n        Quần có hai túi mổ sâu phía trước, hai túi hộp đắp chồng độc đáo và được kết nối bởi khóa nhựa PVC, và khóa kéo, và 2 túi hộp phía sau được thêu chạy chỉ trang trí logo LIDER.\r\n    </p>\r\n    <p style=\"color: #555; font-size: 18px; margin: 10px 0; text-align: left;\">\r\n        <strong>Thiết kế thuộc dòng sản phẩm:</strong> LIDER JEANS - ra mắt 7/2023.\r\n    </p>\r\n    <p style=\"color: #555; font-size: 18px; margin: 10px 0; text-align: left;\">\r\n        <strong>Về thương hiệu:</strong> LIDER là thương hiệu nội địa được ra đời ngẫu nhiên vào năm 2014 tại Sài Gòn. Các sản phẩm đều được thiết kế bởi LIDER và sản xuất tại Việt Nam, với tiêu chí luôn cân bằng giữa xu hướng thời trang thế giới và thị hiếu của thị trường thời trang nội địa.\r\n    </p>\r\n    <div style=\"text-align:center; margin-top:20px;\">\r\n        <img src=\"https://cf.shopee.vn/file/vn-11134208-7qukw-ljf5dkyoc4wicd\" alt=\"Product Image\" style=\"width: 500px; height: auto; margin: 10px;\" />\r\n    </div>\r\n</div>\r\n', '2024-11-27 02:37:30', 'https://localbrandviet.com/cdn/shop/files/vn-11134207-7qukw-ljb2czmh5nv06d.jpg?v=1720254336&width=713', 'https://localbrandviet.com/cdn/shop/files/vn-11134207-7qukw-ljb2czmqu18yf5.jpg?v=1720254339&width=713'),
(21, 'Unisex Parachute Fabric Pants WAVELENGTH PARACHUTE PANTS BLACK - Genuine HADES Brand', '650000', 'Quần', 'https://localbrandviet.com/cdn/shop/files/vn-11134207-7r98o-lrycs3ylt96s76.jpg?v=1719029701&width=713', 'Nữ', '<div style=\"font-family: Arial, sans-serif; color: #dddddd;\">\r\n    <h2 style=\"color: #ffffff; text-align: left;\">WAVELENGTH PARACHUTE PANTS - BLACK</h2>\r\n    <p style=\"font-size: 16px; color: #cccccc; text-align: left;\">\r\n        <strong>Material:</strong> Parachute\r\n    </p>\r\n    <p style=\"font-size: 16px; color: #cccccc; text-align: left;\">\r\n        Wide leg pants, low waistband, heel length. 6 3D stylized pockets design running along the leg. Drawstring and metal details create highlights.\r\n    </p>\r\n    <p style=\"font-size: 16px; color: #cccccc; text-align: left;\">\r\n        <strong>Size:</strong> S/M/L\r\n    </p>\r\n    <p style=\"font-size: 16px; color: #cccccc; text-align: left;\">\r\n        Designed and manufactured by HADES.\r\n    </p>\r\n    <h3 style=\"color: #ffffff; text-align: left;\">SIZE CHART</h3>\r\n    <p style=\"font-size: 16px; color: #cccccc; text-align: left;\">\r\n        <strong>Size S:</strong> Height from 1m5 - 1m62, weight from 45 - 60kg\r\n    </p>\r\n    <p style=\"font-size: 16px; color: #cccccc; text-align: left;\">\r\n        <strong>Size M:</strong> Height from 1m62 - 1m75, weight from 60 - 75kg\r\n    </p>\r\n    <p style=\"font-size: 16px; color: #cccccc; text-align: left;\">\r\n        <strong>Size L:</strong> Height from 1m75 and above, weight from 75kg and above\r\n    </p>\r\n    <h3 style=\"color: #ffffff; text-align: left;\">WARRANTY POLICY | RETURN</h3>\r\n    <p style=\"font-size: 16px; color: #cccccc; text-align: left;\">\r\n        HADES is currently applying the following warranty and return policy:\r\n        - Within 03 days from the date of receipt, HADES supports you to change the size, does not accept color/product exchange.\r\n        - Returned products must be new, unused, unwashed, with original labels, tags and accompanying invoice.\r\n        - All products are only accepted for exchange once.\r\n    </p>\r\n    <p style=\"font-size: 16px; color: #cccccc; text-align: left;\">\r\n        <strong>Note:</strong>\r\n        - Products included in promotional and discount programs will not be accepted for return.\r\n        - Free exchange in case of manufacturer\'s defect, wrong delivery within 1 month.\r\n    </p>\r\n    <h3 style=\"color: #ffffff; text-align: left;\">CARE INSTRUCTIONS</h3>\r\n    <p style=\"font-size: 16px; color: #cccccc; text-align: left;\">\r\n        - Should use detergent (say NO to bleach).\r\n    </p>\r\n    <p style=\"font-size: 16px; color: #cccccc; text-align: left;\">\r\n        - Wash at normal temperature.\r\n    </p>\r\n    <p style=\"font-size: 16px; color: #cccccc; text-align: left;\">\r\n        - Absolutely do not dry clean or tumble dry.\r\n    </p>\r\n    <p style=\"font-size: 16px; color: #cccccc; text-align: left;\">\r\n        - Dry in a cool place.\r\n    </p>\r\n    <p style=\"font-size: 16px; color: #cccccc; text-align: left;\">\r\n        - Should turn clothes inside out when washing to keep the durability of the printed material as well as the product at its best.\r\n    </p>\r\n    <p style=\"font-size: 16px; color: #cccccc; text-align: left;\">\r\n        - Do not iron directly on the printed image.\r\n    </p>\r\n    <h3 style=\"color: #ffffff; text-align: left;\">CONTACT</h3>\r\n    <p style=\"font-size: 16px; color: #cccccc; text-align: left;\">\r\n        Hotline: 02873011021 (10am - 6pm)\r\n    </p>\r\n    <p style=\"font-size: 16px; color: #cccccc; text-align: left;\">\r\n        Facebook: <a href=\"https://www.facebook.com/hadesvietnam\" style=\"color: #cccccc;\">HADES Vietnam</a>\r\n    </p>\r\n    <p style=\"font-size: 16px; color: #cccccc; text-align: left;\">\r\n        Instagram: <a href=\"https://www.instagram.com/hades.studio\" style=\"color: #cccccc;\">@hades.studio</a>\r\n    </p>\r\n    <h3 style=\"color: #ffffff; text-align: left;\">ABOUT THE BRAND</h3>\r\n    <p style=\"font-size: 16px; color: #cccccc; text-align: left;\">\r\n        HADES - Streetwear fashion brand leading Gen Z style with a unique, stylish, and different positioning in every way.\r\n    </p>\r\n    <p style=\"font-size: 16px; color: #cccccc; text-align: left;\">\r\n        hades.vn\r\n    </p>\r\n</div>\r\n', '2024-11-27 02:37:30', 'https://localbrandviet.com/cdn/shop/files/vn-11134207-7r98o-lp7nta4xp172bc_07d0056c-268b-48b6-a48f-ed6360d440ae.jpg?v=1719029709&width=713', 'https://localbrandviet.com/cdn/shop/files/vn-11134207-7r98o-lp7nta4xnmmm17.jpg?v=1719029712&width=713'),
(27, 'Mũ Lancelot-TRUST ME BRO', '200000', 'Mũ', 'https://localbrandviet.com/cdn/shop/files/sg-11134201-7rdxm-lxr2gv4td10m11.jpg?v=1724392859&width=713', 'Nữ', ' <h2 style=\"font-family: Arial, sans-serif; color: #333;\">SMAKER CLUB TRUCK HAT IN DARK BLACK</h2>\r\n    <p style=\"font-family: Arial, sans-serif; color: #555; font-size: 18px; margin: 10px 0;\">\r\n        <strong>Unisex</strong>\r\n    </p>\r\n    <p style=\"font-family: Arial, sans-serif; color: #555; font-size: 18px; margin: 10px 0;\">\r\n        <strong>Kích cỡ:</strong> Free size - có nút nới rộng ở phía sau\r\n    </p>\r\n    <p style=\"font-family: Arial, sans-serif; color: #555; font-size: 18px; margin: 10px 0;\">\r\n        <strong>Chất liệu:</strong> 100% Polyester\r\n    </p>', '2024-11-27 02:37:30', 'https://localbrandviet.com/cdn/shop/files/sg-11134201-7rdww-lxr2gvq6j61ybc.jpg?v=1724392862&width=713', 'https://localbrandviet.com/cdn/shop/files/sg-11134201-7rdxg-lxr2gw87rdgpd5.jpg?v=1724392865&width=713'),
(90, 'Áo thun Teeworld Premium Illusion - Dream T-shirt', '400000', 'Áo', 'https://product.hstatic.net/1000088324/product/rong_mau_81521776407641da9221a7cfaf04a0c3_master.png', 'Nam', '<p><strong>THÔNG TIN CHI TIẾT:</strong></p>\r\n<ul>\r\n    <li><strong>Chất vải:</strong> Cotton 95%, 5% spandex nên vải giữ được đặc tính tự nhiên, mềm mại, thoáng mát, co dãn 2 chiều, đứng form, công nghệ in lụa sắc nét, độ bền màu cao</li>\r\n    <li><strong>Form dáng:</strong> Form áo rộng, phù hợp với nhiều phong cách và dáng người khác nhau</li>\r\n    <li><strong>Màu sắc:</strong> Đen - Trắng</li>\r\n    <li><strong>Size:</strong> S - M – L – XL</li>\r\n</ul>\r\n<p><strong>HƯỚNG DẪN BẢO QUẢN:</strong></p>\r\n<ul>\r\n    <li>Không chà vải quá mạnh, trực tiếp lên hình in để không bị bong tróc và sờn áo</li>\r\n    <li>Lộn trái áo trước khi giặt để hình in bền màu lâu hơn</li>\r\n    <li>Hạn chế ngâm áo lâu trong nước hoặc dùng chất tẩy mạnh, đặc biệt đối với áo có màu</li>\r\n    <li>Phơi nắng hoặc ủi áo dưới nhiệt độ vừa phải giúp hạn chế tình trạng sờn vải, giữ màu áo luôn như mới</li>\r\n</ul>\r\n<p><strong>** Lưu ý:</strong> Nhớ nhắn tin cho shop để tư vấn size chính xác hơn nhé!</p>\r\n<div style=\"text-align:center; margin-top:20px;\">\r\n    <img src=\"https://cf.shopee.vn/file/vn-11134208-7qukw-liiohr32urbmc4\" alt=\"Product Image\" style=\"max-width:100%; height:auto;\">\r\n</div>', '2024-11-27 02:37:30', 'https://product.hstatic.net/1000088324/product/untitled-5_4363fbfbb58e429987154bccd8927e21_master.jpg', 'https://product.hstatic.net/1000088324/product/web__4__784fd35f90af466e892b3b24efa7ea7f_master.png'),
(91, 'Nón Snapback Levents Baseball Caps Chất Khaki Unisex', '200000', 'Mũ', 'https://localbrandviet.com/cdn/shop/files/vn-11134207-7r98o-lz67zarhszt92a.jpg?v=1733391754&width=713', 'Nữ', '<div style=\"text-align:center; margin-top:20px;\">\r\n    <img src=\"https://cf.shopee.vn/file/vn-11134208-7r98o-lz67u2rkyf652b\" alt=\"Product Image 1\" style=\"width: 900px; height: auto; margin: 10px;\" />\r\n    <img src=\"https://cf.shopee.vn/file/vn-11134208-7r98o-lz67u2rkztql9d\" alt=\"Product Image 2\" style=\"width: 900px; height: auto; margin: 10px;\" />\r\n    <img src=\"https://cf.shopee.vn/file/vn-11134208-7r98o-lz67u2rl18b135\" alt=\"Product Image 3\" style=\"width: 900px; height: auto; margin: 10px;\" />\r\n</div>\r\n', '2024-11-27 02:37:30', 'https://localbrandviet.com/cdn/shop/files/vn-11134207-7r98o-lz67ze32y00x35.jpg?v=1733391757&width=713', 'https://localbrandviet.com/cdn/shop/files/vn-11134207-7r98o-lz67ubdsb2qp15.jpg?v=1733391742&width=713');



CREATE TABLE `available` (
  `id` int(50) NOT NULL,
  `product_id` varchar(250) NOT NULL,
  `size` int(50) NOT NULL,
  `quantity` int(11) NOT NULL
);

-- --------------------------------------------------------

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `img` varchar(225) DEFAULT NULL
);

INSERT INTO `users` (`id`, `name`, `email`, `password`, `gender`, `phone`, `birthday`, `created_at`, `role`, `address`, `img`) VALUES
(3, 'Lý Mạc Sầu', 'macmac@gmail.com', 'macnetroioi', 'male', '0690678890', '0000-00-00', '2024-11-26 14:48:58', 'user', '123 Trần Não, TP Hồ Chí Minh', 'http://localhost/Assignment_Web_Programming-CO3050/public/uploads/f7a7021c-c885-4926-9eb4-b94b42d55c02.jpg'),
(8, 'NGUYỄN THÀNH ĐẠT', 'dat@gmail.com', 'jhsda', 'male', '0368173053', '0000-00-00', '2024-12-01 02:54:08', 'user', '234 Lý Thường Kiệt, Quận 10, TP Hồ Chí Minh', NULL),
(9, 'Trịnh Văn Tới', 'toitrinh@gmail.com', '0893345678', 'male', '123213', '0000-00-00', '2024-12-02 05:42:37', 'user', 'Nam Từ Liêm, Hà Nội', NULL),
(26, 'Nguyễn Văn A', 'nguyenvana@gmail.com', 'password123', 'male', '0987654321', '1990-02-14', '2024-12-11 14:00:27', 'user', '123 Nguyễn Trãi, Hà Nội', NULL),
(27, 'Trần Thị B', 'tranthib@gmail.com', 'password123', 'female', '0987654322', '1992-05-10', '2024-12-11 14:00:27', 'user', '456 Lê Lợi, Đà Nẵng', NULL),
(28, 'Phạm Văn C', 'phamvanc@gmail.com', 'password123', 'male', '0987654323', '1994-09-21', '2024-12-11 14:00:27', 'user', '789 Trần Phú, Hồ Chí Minh', NULL),
(29, 'Lê Minh D', 'leminhd@gmail.com', 'password123', 'male', '0987654324', '1995-12-15', '2024-12-11 14:00:27', 'admin', '12 Nguyễn Huệ, Nha Trang', NULL),
(31, 'Đinh Thị F', 'dinhthif@gmail.com', 'password123', 'female', '0987654326', '1989-11-02', '2024-12-11 14:00:27', 'user', '56 Hùng Vương, Đà Nẵng', NULL),
(32, 'Bùi Văn G', 'buivang@gmail.com', 'password123', 'male', '0987654327', '1993-06-18', '2024-12-11 14:00:27', 'user', '78 Lý Thường Kiệt, Hồ Chí Minh', NULL),
(34, 'Nguyễn Minh I', 'nguyenminhi@gmail.com', 'password123', 'male', '0987654329', '1997-03-12', '2024-12-11 14:00:27', 'user', '23 Phạm Văn Đồng, Nha Trang', NULL),
(35, 'Trần Văn J', 'tranvanj@gmail.com', 'password123', 'male', '0987654330', '1990-07-25', '2024-12-11 14:00:27', 'user', '67 Cao Thắng, Đà Nẵng', NULL),
(36, 'Lê Thị K', 'lethik@gmail.com', 'password123', 'female', '0987654331', '1988-02-04', '2024-12-11 14:00:27', 'user', '45 Hai Bà Trưng, Hà Nội', NULL),
(37, 'Hoàng Văn L', 'hoangvanl@gmail.com', 'password123', 'male', '0987654332', '1992-10-11', '2024-12-11 14:00:27', 'user', '98 Pasteur, Hồ Chí Minh', NULL),
(38, 'Đỗ Minh M', 'dohminhm@gmail.com', 'password123', 'male', '0987654333', '1995-09-19', '2024-12-11 14:00:27', 'admin', '14 Võ Văn Kiệt, Đà Nẵng', NULL),
(40, 'Vũ Văn O', 'vuvano@gmail.com', 'password123', 'male', '0987654335', '1994-08-17', '2024-12-11 14:00:27', 'user', '36 Cộng Hòa, Hồ Chí Minh', NULL),
(41, 'Ngô Thị P', 'ngothip@gmail.com', 'password123', 'female', '0987654336', '1991-12-30', '2024-12-11 14:00:27', 'user', '58 Điện Biên Phủ, Đà Nẵng', NULL),
(42, 'Phạm Văn Q', 'phamvanq@gmail.com', 'password123', 'male', '0987654337', '1993-11-14', '2024-12-11 14:00:27', 'user', '72 Đinh Tiên Hoàng, Nha Trang', NULL),
(43, 'Nguyễn Thị R', 'nguyenthir@gmail.com', 'password123', 'female', '0987654338', '1990-01-01', '2024-12-11 14:00:27', 'user', '41 Trường Chinh, Hà Nội', NULL),
(44, 'Lý Minh S', 'lyminhs@gmail.com', 'password123', 'male', '0987654339', '1987-07-19', '2024-12-11 14:00:27', 'admin', '11 Nguyễn Văn Cừ, Hồ Chí Minh', NULL);

-- --------------------------------------------------------
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `detailorders`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `available`
  ADD PRIMARY KEY (`id`);

--

ALTER TABLE `orders`
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

ALTER TABLE `available`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;




