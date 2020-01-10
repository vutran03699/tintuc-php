-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 08, 2020 lúc 07:33 PM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `website`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(150) DEFAULT NULL,
  `category_slug` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category_hide` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_slug`, `category_hide`) VALUES
(0, 'Uncategory', 'uncategory', 1),
(1, 'Chuyện code', 'chuyen-code', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `img_id` int(11) NOT NULL,
  `img_name` varchar(200) DEFAULT NULL,
  `img_path` varchar(300) DEFAULT NULL,
  `img_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `img_size` int(10) NOT NULL,
  `img_alt` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `is_thumb` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`img_id`, `img_name`, `img_path`, `img_type`, `img_size`, `img_alt`, `is_thumb`) VALUES
(25, 'cong nghe.jpg', '/uploads/thumbnail/cong nghe.jpg', '', 0, '', 1),
(26, '1802160214samsung-oreo.jpg', '/uploads/thumbnail/1802160214samsung-oreo.jpg', 'image/jpeg', 84355, 'samsung-cong-bo-ly-do-dung-cap-nhat-android-8-oreo-cho-galaxy-s8-va-s8-samsung-androi', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `post_id` int(10) NOT NULL,
  `post_title` varchar(500) DEFAULT NULL,
  `post_content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `img_id` int(11) NOT NULL,
  `is_public` tinyint(4) DEFAULT 0,
  `createdate` datetime DEFAULT NULL,
  `updatedate` datetime DEFAULT NULL,
  `seo_title` varchar(500) DEFAULT NULL,
  `post_description` text DEFAULT NULL,
  `key_word` varchar(500) DEFAULT NULL,
  `post_slug` varchar(350) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_content`, `category_id`, `id`, `img_id`, `is_public`, `createdate`, `updatedate`, `seo_title`, `post_description`, `key_word`, `post_slug`) VALUES
(60, 'Có thể đây chính là HTC U12 với chip Snapdragon 845, màn hình 18:9', '<p>Tuy nhiều khả năng HTC kh&ocirc;ng ra mắt bất kỳ flagship mới n&agrave;o tại MWC 2018, nhưng điều n&agrave;y kh&ocirc;ng c&oacute; nghĩa l&agrave; h&atilde;ng kh&ocirc;ng nghi&ecirc;n cứu một sản phẩm mới, ch&iacute;nh l&agrave; HTC U12, hay c&ograve;n biết đến với t&ecirc;n m&atilde; Imagine.<br />\r\n&nbsp;</p>\r\n\r\n<p><img alt=\"[​IMG]\" src=\"http://techrum.vn/chevereto/images/2018/02/06/fYaHR.jpg\" />​</p>\r\n\r\n<p><br />\r\nChiếc điện thoại n&agrave;y được h&atilde;ng giới thiệu tại sự kiện 5G ở Đ&agrave;i Loan. Tuy nhi&ecirc;n, HTC vẫn chưa x&aacute;c nh&acirc;n đ&acirc;y l&agrave; HTC U12. Thật kh&ocirc;ng may, HTC đ&atilde; che mọi mặt trừ m&agrave;n h&igrave;nh, do đ&oacute; rất kh&oacute; để h&igrave;nh dung thiết kế thật sự của chiếc smartphone n&agrave;y.<br />\r\n<br />\r\nTuy nhi&ecirc;n, &quot;chuy&ecirc;n gia r&ograve; rỉ&quot; Evan Blass đ&atilde; x&aacute;c nhận đ&acirc;y l&agrave; HTC U12 (t&ecirc;n m&atilde; HTC Imagine), l&agrave; sản phẩm kế thừa của flagship HTC U11 ra mắt v&agrave;o năm ngo&aacute;i.<br />\r\n&nbsp;</p>\r\n\r\n<p>HTC U12 được cho l&agrave; sẽ sở hữu m&agrave;n h&igrave;nh tr&agrave;n viền mỏng tỉ lệ 18:9, c&oacute; k&iacute;ch thước m&agrave;n h&igrave;nh khoảng 6 inch giống như HTC U11+.<br />\r\n<br />\r\nHTC U12 đ&atilde; được chứng minh đạt tốc độ truyền tải l&ecirc;n đến 809,58 Mbps, gần 1 Gbps tương đương 1Gb/gi&acirc;y. C&oacute; thể l&agrave; do U12 được trang bị bộ chip vi xử l&yacute; Snapdragon 845 của Qualcomm gồm một modem Qualcomm X20 LTE hỗ trợ tốc độ truyền tải l&ecirc;n tới 1,2 Gbps. C&aacute;c th&ocirc;ng số cấu h&igrave;nh c&ograve;n lại của m&aacute;y hiện vẫn chưa được tiết lộ.<br />\r\n&nbsp;</p>\r\n\r\n<p><img alt=\"[​IMG]\" src=\"http://techrum.vn/chevereto/images/2018/02/06/fYxiT.jpg\" />​</p>\r\n\r\n<p><br />\r\nTheo th&ocirc;ng tin từ trang web Sogi của Đ&agrave;i Loan, HTC cho biết chiếc smartphone mới của h&atilde;ng sẽ được giới thiệu trong năm nay. Thế nhưng, c&ocirc;ng ty từ chối tiết lộ t&ecirc;n gọi của chiếc điện thoại n&agrave;y, v&igrave; vậy vẫn chưa chắc chắn rằng chiếc flagship sắp được tung ra sẽ l&agrave; HTC U12.<br />\r\n&nbsp;</p>\r\n\r\n<p><img alt=\"[​IMG]\" src=\"http://techrum.vn/chevereto/images/2018/02/06/fYhl0.jpg\" /></p>\r\n', 0, 16, 25, 1, '2018-02-06 10:02:26', '2018-02-21 20:12:12', 'Có thể đây chính là HTC U12 với chip Snapdragon 845, màn hình 18:9', 'Tuy nhiều khả năng HTC không ra mắt bất kỳ flagship mới nào tại MWC 2018, nhưng điều này không có nghĩa là hãng không nghiên cứu một sản phẩm mới, chính là HTC U12, hay còn biết đến với tên mã Imagine.', 'HTC mobie', 'co-the-day-chinh-la-htc-u12-voi-chip-snapdragon-845-man-hinh-189'),
(61, 'Samsung công bố lý do dừng cập nhật Android 8 Oreo cho Galaxy S8 và S8+', '<p>Chỉ một tuần sau khi ph&aacute;t h&agrave;nh bản cập nhật Android 8 Oreo cho Galaxy S8 v&agrave; S8+, Samsung đ&atilde; tạm ho&atilde;n bản cập nhật n&agrave;y lại. Chuyện g&igrave; đ&atilde; xảy ra?<br />\r\n<br />\r\nSamsung vừa đăng th&ocirc;ng b&aacute;o, cho biết nguy&ecirc;n nh&acirc;n l&agrave; do lỗi reboot bất ngờ xuất hiện tr&ecirc;n những m&aacute;y nhận cập nhật ch&iacute;nh thức, lỗi n&agrave;y kh&ocirc;ng xảy ra trong qu&aacute; tr&igrave;nh thử nghiệm beta.<br />\r\n<br />\r\n<em>&quot;Sau một số trường hợp Galaxy S8 v&agrave; S8+ bị reboot đột ngột sau khi cập nhật Android 8.0 Oreo, ch&uacute;ng t&ocirc;i tạm thời dừng ph&aacute;t h&agrave;nh bản update. Ch&uacute;ng t&ocirc;i đang điều tra để đảm bảo c&oacute; &iacute;t m&aacute;y bị ảnh hưởng nhất c&oacute; thể v&agrave; sẽ tiếp tục ph&aacute;t h&agrave;nh bản cập nhật trong thời gian sớm nhất&quot;.</em><br />\r\n<br />\r\nNếu m&aacute;y của bạn đ&atilde; download bản update nhưng bạn chưa nhấn n&uacute;t cập nhật th&igrave; file download sẽ bị xo&aacute;. Hiện tại, Samsung vẫn chưa cho biết thời gian dự t&iacute;nh tiếp tục ph&aacute;t h&agrave;nh Android 8 Oreo.</p>\r\n', 0, 1, 26, 1, '2018-02-16 14:14:23', '2018-02-21 20:12:27', 'Samsung công bố lý do dừng cập nhật Android 8 Oreo cho Galaxy S8 và S8+', 'Samsung công bố lý do dừng cập nhật Android 8 Oreo cho Galaxy S8 và S8+', 'samsung, androi', 'samsung-cong-bo-ly-do-dung-cap-nhat-android-8-oreo-cho-galaxy-s8-va-s8');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `active` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `gender`, `email`, `level`, `active`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', NULL, 'admin@gmail.com', 1, 0),
(16, 'vu', '0730b75e96c0453b1b196be7ff4fa194', 'tran huu vu', 'female', 'huyen@gmail.com', 1, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`img_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `fk_post` (`id`),
  ADD KEY `fk_category` (`category_id`),
  ADD KEY `fk_img_id` (`img_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `fk_img_id` FOREIGN KEY (`img_id`) REFERENCES `images` (`img_id`),
  ADD CONSTRAINT `fk_post` FOREIGN KEY (`id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
