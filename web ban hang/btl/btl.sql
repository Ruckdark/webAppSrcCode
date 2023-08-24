-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 10, 2021 lúc 07:49 AM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `btl`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ad`
--

CREATE TABLE `ad` (
  `ad_id` int(11) NOT NULL,
  `ad_email` text NOT NULL,
  `ad_pass` text NOT NULL,
  `permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ad`
--

INSERT INTO `ad` (`ad_id`, `ad_email`, `ad_pass`, `permission`) VALUES
(2, 'phuonghole121201@gmail.com', '4a8a08f09d37b73795649038408b5f33', 3),
(3, 'phuong@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 1),
(4, 'a@gmail.com', '4a8a08f09d37b73795649038408b5f33', 1),
(5, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `box`
--

CREATE TABLE `box` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `icon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `box`
--

INSERT INTO `box` (`id`, `title`, `icon`) VALUES
(1, 'Phục vụ tốt nhất', 'heart'),
(3, 'Giá tốt nhất', 'tag'),
(4, 'Chính hãng 100%', 'thumbs-up');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `p_id` int(11) NOT NULL,
  `ip_add` text NOT NULL,
  `qty` int(11) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(11, 'Quần', 'quần'),
(12, 'Áo', 'áo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chatbox`
--

CREATE TABLE `chatbox` (
  `id` int(11) NOT NULL,
  `mess` int(11) NOT NULL,
  `res` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `name`, `subject`, `message`, `email`) VALUES
(10, 'z', 'a', 'a', 'phuonghole121201@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `network`
--

CREATE TABLE `network` (
  `id` int(11) NOT NULL,
  `icon` text NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `network`
--

INSERT INTO `network` (`id`, `icon`, `link`) VALUES
(1, 'facebook', 'https://www.facebook.com/yenna0110'),
(2, 'instagram', 'https://www.instagram.com/yenyoona2k1/');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  `receipt` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `size` text NOT NULL,
  `date` date NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`order_id`, `user_id`, `money`, `receipt`, `qty`, `size`, `date`, `status`) VALUES
(6, 14, 0, 1264737008, 1, 'S', '2021-12-08', 'Đã trả'),
(7, 14, 230002, 881084604, 1, 'S', '2021-12-08', 'pending');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pay`
--

CREATE TABLE `pay` (
  `pay_id` int(11) NOT NULL,
  `receipt` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  `mode` text NOT NULL,
  `code` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `pay`
--

INSERT INTO `pay` (`pay_id`, `receipt`, `money`, `mode`, `code`, `date`) VALUES
(1, 0, 0, 'BIDV', 0, '0002-02-12'),
(2, 0, 0, 'BIDV', 0, '0001-01-21'),
(4, 0, 0, 'BIDV', 0, '0033-12-31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pending`
--

CREATE TABLE `pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `receipt` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `size` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `pending`
--

INSERT INTO `pending` (`order_id`, `user_id`, `receipt`, `product_id`, `qty`, `size`, `status`) VALUES
(1, 9, 641369955, 11, 1, 'S', 'pending'),
(2, 9, 641369955, 12, 1, 'S', 'Complete'),
(3, 9, 641369955, 13, 1, 'S', 'pending'),
(4, 9, 641369955, 14, 1, 'S', 'pending'),
(5, 9, 641369955, 16, 1, 'S', 'pending'),
(6, 9, 1658482237, 16, 1, 'S', 'Đã trả'),
(7, 9, 7283551, 15, 1, 'S', 'pending'),
(8, 9, 94525791, 16, 1, 'S', 'pending'),
(9, 0, 1150215334, 15, 1, 'S', 'pending'),
(10, 0, 1150215334, 16, 1, 'S', 'pending'),
(11, 14, 1264737008, 17, 1, 'S', 'pending'),
(12, 14, 881084604, 15, 1, 'S', 'pending');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `p_cat_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img` text NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_keywords` text NOT NULL,
  `product_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img`, `product_price`, `product_keywords`, `product_desc`) VALUES
(23, 5, 11, '2021-12-10 06:05:45', 'Quần vải nhung pha lụa', 'product_1.jpg', 1990000, 'Quần vải nhung pha lụa', ' Quần vải nhung pha lụa'),
(24, 4, 11, '2021-12-10 06:09:04', 'Quần kèm thắt lưng ', 'product_2.jpg', 1299000, 'Quần kèm thắt lưng ', ' Quần kèm thắt lưng \r\n'),
(27, 4, 11, '2021-12-10 06:10:40', 'Quần legging giả da ', 'product_3.jpg', 899000, 'Quần legging giả da ', ' Quần legging giả da '),
(28, 5, 11, '2021-12-10 06:11:51', 'Quần dệt kim đính kim sa ', 'product_4.jpg', 1990000, 'Quần dệt kim đính kim sa ', ' Quần dệt kim đính kim sa '),
(29, 5, 11, '2021-12-10 06:13:04', 'Quần full length ', 'product_5.jpg', 999000, 'Quần full length ', ' Quần full length '),
(32, 5, 11, '2021-12-10 06:15:01', 'Quần âu', 'product_6.jpg', 1859000, 'Quần âu', 'Quần âu '),
(33, 5, 11, '2021-12-10 06:21:14', 'Quần jogger lót lông ', 'product_7.jpg', 1340000, 'Quần jogger lót lông ', ' Quần jogger lót lông '),
(34, 5, 11, '2021-12-10 06:21:45', 'Quần Jogger dệt kim', 'product_8.jpg', 999000, 'Quần Jogger dệt kim', 'Quần Jogger dệt kim '),
(35, 5, 11, '2021-12-10 06:22:50', 'Quần nhung tăm', 'product_9.jpg', 1329000, 'Quần nhung tăm', 'Quần nhung tăm '),
(36, 4, 11, '2021-12-10 06:32:22', 'Quần CHINO ', 'product_10.jpg', 519000, 'Quần CHINO ', ' Quần CHINO '),
(37, 4, 12, '2021-12-10 06:38:11', 'Áo hoạ tiết spalding', 'product_11.jpg', 519000, 'Áo hoạ tiết spalding', 'Áo hoạ tiết spalding '),
(38, 4, 12, '2021-12-10 06:38:01', 'Áo polo trơn green ', 'product_12.jpg', 339000, 'Áo polo trơn green ', 'Áo polo trơn green \r\n '),
(39, 4, 12, '2021-12-10 06:39:12', 'Áo polo trơn black ', 'product_13.jpg', 449000, 'Áo polo trơn black ', 'Áo polo trơn black  '),
(40, 4, 12, '2021-12-10 06:39:47', 'Áo sơ mi hoạ tiết disney', 'product_14.jpg', 799000, 'Áo sơ mi hoạ tiết disney', 'Áo sơ mi hoạ tiết disney '),
(41, 4, 12, '2021-12-10 06:40:37', 'Áo polo kẻ', 'product_15.jpg', 579000, 'Áo polo kẻ', ' Áo polo kẻ'),
(42, 4, 12, '2021-12-10 06:41:47', 'Áo phông xanh mạ', 'product_16.jpg', 329000, 'Áo phông xanh mạ', 'Áo phông xanh mạ '),
(43, 4, 12, '2021-12-10 06:42:13', 'Áo polo phối 2 màu', 'product_17.jpg', 449000, 'Áo polo phối 2 màu', 'Áo polo phối 2 màu '),
(44, 5, 12, '2021-12-10 06:44:32', 'Áo phông hoạ tiết disney ', 'product_18.jpg', 439000, 'Áo phông hoạ tiết disney ', 'Áo phông hoạ tiết disney  '),
(45, 5, 12, '2021-12-10 06:43:08', 'Áo Báo Pink ', 'product_19.jpg', 689000, 'Áo Báo Pink ', 'Áo Báo Pink  '),
(46, 5, 12, '2021-12-10 06:43:45', 'Áo phông vẽ disney', 'product_20.jpg', 559000, 'Áo phông vẽ disney', ' Áo phông vẽ disney'),
(47, 5, 12, '2021-12-10 06:44:20', 'Áo in hình ', 'product_21.jpg', 779000, 'Áo in hình ', ' Áo in hình '),
(48, 5, 12, '2021-12-10 06:45:22', 'Áo vằn', 'product_22.jpg', 229000, 'Áo vằn', 'Áo vằn '),
(49, 5, 12, '2021-12-10 06:45:52', 'Áo in số ', 'product_23.jpg', 259000, 'Áo in số ', 'Áo in số  '),
(50, 5, 12, '2021-12-10 06:46:25', 'Áo pha lê', 'product_24.jpg', 439000, 'Áo pha lê', 'Áo pha lê '),
(51, 5, 12, '2021-12-10 06:47:11', 'Áo phông thêu hình cô gái ', 'product_25.jpg', 629000, 'Áo phông thêu hình cô gái ', 'Áo phông thêu hình cô gái  '),
(52, 6, 12, '2021-12-10 06:48:14', 'Áo phối áo gile ', 'product_26.jpg', 799000, 'Áo phối áo gile ', 'Áo phối áo gile  '),
(53, 6, 12, '2021-12-10 06:48:04', 'Áo cut out phối vải .', 'product_27.jpg', 899000, 'Áo cut out phối vải .', 'Áo cut out phối vải . ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(11) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(4, 'Nam giới', 'nam tính'),
(5, 'Nữ giới', 'nữ tính'),
(6, 'Trẻ em', '=)'),
(7, 'Khác', 'khác');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_name` text NOT NULL,
  `slider_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_name`, `slider_image`) VALUES
(1, 'a', 'slide_3.jpg'),
(2, 'b', 'slide_1.jpg'),
(3, 'c\r\n', 'slide_3.gif');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `user_email` text NOT NULL,
  `user_pass` text NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_ip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_phone`, `user_ip`) VALUES
(14, 'a', 'phuonghole121201@gmail.com', 'c70bd98bef0223f17484058f500a92fb', 347957458, '::1'),
(15, '', 'phuonghole121201@gmail.com', 'c70bd98bef0223f17484058f500a92fb', 347957458, '::1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ad`
--
ALTER TABLE `ad`
  ADD PRIMARY KEY (`ad_id`);

--
-- Chỉ mục cho bảng `box`
--
ALTER TABLE `box`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `network`
--
ALTER TABLE `network`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `pay`
--
ALTER TABLE `pay`
  ADD PRIMARY KEY (`pay_id`);

--
-- Chỉ mục cho bảng `pending`
--
ALTER TABLE `pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `p_cat_id` (`p_cat_id`);

--
-- Chỉ mục cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `ad`
--
ALTER TABLE `ad`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `box`
--
ALTER TABLE `box`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `network`
--
ALTER TABLE `network`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `pay`
--
ALTER TABLE `pay`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `pending`
--
ALTER TABLE `pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `product` (`product_id`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`p_cat_id`) REFERENCES `product_categories` (`p_cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
