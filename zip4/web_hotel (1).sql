-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 13, 2024 lúc 12:51 PM
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
-- Cơ sở dữ liệu: `web_hotel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booking`
--

CREATE TABLE `booking` (
  `ID_booking` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `Check_in` date DEFAULT NULL,
  `Check_out` date DEFAULT NULL,
  `adult` int(11) DEFAULT NULL,
  `children` int(11) DEFAULT NULL,
  `name_room` varchar(1000) DEFAULT NULL,
  `star` varchar(15) DEFAULT NULL,
  `nodays` int(11) DEFAULT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `booking`
--

INSERT INTO `booking` (`ID_booking`, `Name`, `email`, `Check_in`, `Check_out`, `adult`, `children`, `name_room`, `star`, `nodays`, `room_id`, `user_id`) VALUES
(1, 'DaoTrung', 'lpma7358@gmail.com', '2024-04-27', '2024-04-29', 2, 1, 'Phòng 1', 'Đã hủy', 2, 1, 1),
(2, 'Nguyen van A', 'jungkior1@gmail.com', '2024-05-01', '2024-05-02', 2, 2, 'Phòng 1', 'Đã xác nhận', 1, 1, 3),
(3, 'TrUNG', 'jungkior1@gmail.com', '2024-05-11', '2024-05-15', 1, 0, 'Phòng 1', 'Đã xác nhận', 4, 1, 3),
(4, 'Khanh Linh', 'mia1410@gmail.com', '2024-05-11', '2024-05-18', 1, 1, 'Phòng 3', 'Đợi Xác Nhận', 7, 3, 1),
(5, 'Khánh Linh', 'mia1410@gmail.com', '2024-05-16', '2024-05-18', 2, 0, 'Phòng 2', 'Đợi Xác Nhận', 2, 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `booking_details`
--

CREATE TABLE `booking_details` (
  `ID_booking_details` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `SDT` int(11) NOT NULL,
  `Ngày đặt` date NOT NULL,
  `room_id` int(11) NOT NULL,
  `Status` varchar(100) NOT NULL,
  `Thanh Toán` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `ID_category` int(11) NOT NULL,
  `name_category` varchar(50) NOT NULL,
  `mota` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`ID_category`, `name_category`, `mota`) VALUES
(1, 'Phòng standard (STD)', 'Phòng thường khá nhỏ, được bố trí ở các tầng thấp, không có view đẹp và chỉ gồm những vật dụng cơ bản nhất.'),
(3, 'Phòng Superior (SUP)', 'Đây là loại phòng có chất lượng cao hơn STD với diện tích lớn hơn, được trang bị nhiều trang thiết bị tiện nghi, có view đẹp. '),
(4, 'Phòng Deluxe (DLX)', 'Loại phòng này thường ở trên tầng cao với chất lượng tốt hơn phòng Superior. Phòng Deluxe có diện tích rộng, có tầm nhìn đẹp với các trang thiết bị cao cấp.'),
(5, 'Phòng Suite (SUT)', 'SUT là loại phòng cao cấp nhất trong khách sạn. Phòng suite thường ở trên tầng cao, được trang bị những thiết bị cao cấp và các dịch vụ đặc biệt kèm theo. Thường thì các khách sạn sẽ thiết kế phòng Suite có phòng khách và phòng ngủ riêng biệt, có ban công với view đẹp nhất khách sạn.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(10) NOT NULL,
  `Full_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` int(11) NOT NULL,
  `Message` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`contact_id`, `Full_name`, `password`, `Email`, `Phone`, `Message`) VALUES
(5, 'Trung', '', 'trungnguyen7358@gmail.com', 976982240, 'Đặt Phòng'),
(11, 'Trungnguyen57358@gmail.com', '', 'trungnguyen57358@gmail.com', 2147483647, 'LLL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `newsletter`
--

CREATE TABLE `newsletter` (
  `letter_id` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `newsletter`
--

INSERT INTO `newsletter` (`letter_id`, `Email`) VALUES
(1, 'trungnguyen@gmail.com'),
(2, 'jungki@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `name_room` varchar(50) NOT NULL,
  `type_room` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `category` varchar(50) NOT NULL,
  `Hinh_Anh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `room`
--

INSERT INTO `room` (`room_id`, `name_room`, `type_room`, `price`, `category`, `Hinh_Anh`) VALUES
(1, 'Phòng 1', 'slt1', 10, 'Phòng standard (STD)', 'Room1_standard.png'),
(2, 'Phòng 2', 'slt2', 12, 'Phòng standard (STD)', 'room1_STD_TWN.png'),
(3, 'Phòng 3', 'slt2', 20, 'Phòng Superior (SUP)', 'Room_SUP_TWN.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Phone` int(11) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `avatar_path` varchar(150) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `Phone`, `gender`, `avatar_path`, `address`) VALUES
(1, 'admin', '1', 'trungnguyen7358@gmail.com', 97, 'male', 'soohyun.jpg', 'Hải Phòng'),
(2, 'PL', '1', 'MK@GMAIL.COM', 88, 'male', 'ji.jpg', 'Tỉnh Cà Mau'),
(3, 'trung', '1', 'QT@gmail.com', 976982240, 'male', '', 'Thành phố Quảng Ninh');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`ID_booking`);

--
-- Chỉ mục cho bảng `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`ID_booking_details`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID_category`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Chỉ mục cho bảng `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`letter_id`);

--
-- Chỉ mục cho bảng `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `booking`
--
ALTER TABLE `booking`
  MODIFY `ID_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `ID_booking_details` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `ID_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `letter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
