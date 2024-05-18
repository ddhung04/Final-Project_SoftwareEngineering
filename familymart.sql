-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2023 at 01:27 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `familymart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `tennguoidung` varchar(50) NOT NULL,
  `taikhoan` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `sdt` int(20) NOT NULL,
  `diachi` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`tennguoidung`, `taikhoan`, `matkhau`, `sdt`, `diachi`, `email`) VALUES
('admin1', 'admin1', '202cb962ac59075b964b07152d234b70', 123445, 'hanoi', 'rebijif618@dewareff.com'),
('admin2', 'admin2', 'e10adc3949ba59abbe56e057f20f883e', 123123123, 'hanoi', 'tvu07@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `stt` int(11) NOT NULL,
  `mabaiviet` int(11) NOT NULL,
  `taikhoan` varchar(50) NOT NULL,
  `noidung` varchar(5000) NOT NULL,
  `thoigian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`stt`, `mabaiviet`, `taikhoan`, `noidung`, `thoigian`) VALUES
(1, 1, 'admin', 'bài viết rất hay', '2023-12-26'),
(2, 1, 'admin', 'test', '2023-12-26');

-- --------------------------------------------------------

--
-- Table structure for table `danhgiasanpham`
--

CREATE TABLE `danhgiasanpham` (
  `stt` int(11) NOT NULL,
  `tensanpham` varchar(50) NOT NULL,
  `taikhoan` varchar(50) NOT NULL,
  `noidung` varchar(5000) NOT NULL,
  `thoigian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhgiasanpham`
--

INSERT INTO `danhgiasanpham` (`stt`, `tensanpham`, `taikhoan`, `noidung`, `thoigian`) VALUES
(1, 'Mỳ Hảo Hảo', 'admin', 'Mỳ rất ngon', '2023-12-25'),
(2, 'Mỳ Cung Đình', 'admin', 'cực kỳ chất lượng', '2023-12-25');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `stt` int(11) NOT NULL,
  `mahoadon` int(11) NOT NULL,
  `taikhoan` varchar(50) NOT NULL,
  `nguoinhan` text NOT NULL,
  `diachinhanhang` varchar(100) NOT NULL,
  `sdt` int(20) NOT NULL,
  `giatri` int(50) NOT NULL,
  `thoigian` date NOT NULL,
  `trangthai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`stt`, `mahoadon`, `taikhoan`, `nguoinhan`, `diachinhanhang`, `sdt`, `giatri`, `thoigian`, `trangthai`) VALUES
(1, 2023120000, 'admin', 'vu', 'Ha Noi', 123456789, 120000, '2023-12-26', 'Hủy'),
(2, 2023120001, 'admin', 'vu', 'Ha Noi', 123456789, 200000, '2023-12-26', 'Đang vận chuyển'),
(3, 2023120002, 'admin', 'vu', 'Ha Noi', 123456789, 78000, '2023-12-26', 'Đã nhận hàng'),
(4, 2023120003, 'admin', 'vu', 'Ha Noi', 123456789, 600000, '2023-12-26', 'Đã nhận hàng'),
(5, 2023120004, 'admin', 'vu', 'Ha Noi', 123456789, 170000, '2023-12-26', 'Hủy'),
(6, 2023120005, 'admin', 'vu', 'Ha Noi', 123456789, 200000, '2023-12-26', 'Đang vận chuyển'),
(7, 2023120006, 'admin', 'vu', 'Ha Noi', 123456789, 240000, '2023-12-26', 'Đang vận chuyển'),
(8, 2023120007, 'admin', 'vu', 'Ha Noi', 123456789, 180000, '2023-12-26', 'Đang vận chuyển'),
(9, 2023120008, 'admin', 'vu', 'Ha Noi', 123456789, 40000, '2023-12-26', 'Đang vận chuyển'),
(10, 2023120009, 'admin', 'vu', 'Ha Noi', 123456789, 56000, '2023-12-26', 'Đã nhận hàng'),
(11, 2023120010, 'admin', 'vu', 'Ha Noi', 123456789, 9100, '2023-12-26', 'Đã nhận hàng'),
(12, 2023120011, 'kh1', 'abcd', 'hanoi', 1234456, 184000, '2023-12-26', 'Đã nhận hàng');

-- --------------------------------------------------------

--
-- Table structure for table `hoadonchitiet`
--

CREATE TABLE `hoadonchitiet` (
  `stt` int(11) NOT NULL,
  `mahoadon` int(11) NOT NULL,
  `taikhoan` varchar(50) NOT NULL,
  `sanpham` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL,
  `giatien` int(50) NOT NULL,
  `thoigianban` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoadonchitiet`
--

INSERT INTO `hoadonchitiet` (`stt`, `mahoadon`, `taikhoan`, `sanpham`, `soluong`, `giatien`, `thoigianban`) VALUES
(1, 2023120000, 'admin', 'Mỳ Hảo Hảo', 30, 4000, '2023-12-26'),
(2, 2023120001, 'admin', 'Mỳ Hảo Hảo', 20, 4000, '2023-12-26'),
(3, 2023120001, 'admin', 'Pate mèo', 5, 24000, '2023-12-26'),
(4, 2023120002, 'admin', 'Dầu gội đầu', 1, 50000, '2023-12-26'),
(5, 2023120002, 'admin', 'Mỳ Cung Đình', 5, 5600, '2023-12-26'),
(6, 2023120003, 'admin', 'Giấy dán tường', 6, 100000, '2023-12-26'),
(7, 2023120004, 'admin', 'Sandal', 1, 100000, '2023-12-26'),
(8, 2023120004, 'admin', 'Mỳ ly', 10, 7000, '2023-12-26'),
(9, 2023120005, 'admin', 'Kem dưỡng ẩm', 1, 200000, '2023-12-26'),
(10, 2023120006, 'admin', 'Kem dưỡng ẩm', 1, 200000, '2023-12-26'),
(11, 2023120006, 'admin', 'Tăm bông', 2, 20000, '2023-12-26'),
(12, 2023120007, 'admin', 'Sữa tắm', 1, 180000, '2023-12-26'),
(13, 2023120008, 'admin', 'Mỳ Hảo Hảo', 10, 4000, '2023-12-26'),
(14, 2023120009, 'admin', 'Mỳ Cung Đình', 10, 5600, '2023-12-26'),
(15, 2023120010, 'admin', 'Mỳ Giấy', 1, 3500, '2023-12-26'),
(16, 2023120010, 'admin', 'Mỳ Cung Đình', 1, 5600, '2023-12-26'),
(17, 2023120011, 'kh1', 'Sữa tắm', 1, 180000, '2023-12-26'),
(18, 2023120011, 'kh1', 'Mỳ Hảo Hảo', 1, 4000, '2023-12-26');

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE `lienhe` (
  `stt` int(11) NOT NULL,
  `tennguoidung` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `noidung` varchar(1000) NOT NULL,
  `trangthai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lienhe`
--

INSERT INTO `lienhe` (`stt`, `tennguoidung`, `email`, `noidung`, `trangthai`) VALUES
(1, 'vũ', 'abc@gmail.com', '1234', 'Đã tiếp nhận'),
(2, 'abc', 'tvu0700@gmail.com', 'abcs', 'Đã xử lý'),
(3, 'vũ', 'votuanvu3511665@gmail.com', 'trang web rất tốt', 'Đã tiếp nhận');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `mabaiviet` int(11) NOT NULL,
  `tieude` varchar(100) NOT NULL,
  `noidung` varchar(1000) NOT NULL,
  `taikhoan` varchar(50) NOT NULL,
  `hinhanh` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`mabaiviet`, `tieude`, `noidung`, `taikhoan`, `hinhanh`) VALUES
(1, 'Galaxy Z Fold 3 sẽ có giá rẻ hơn', ' Hai smartphone đắt nhất của Samsung sẽ có gHai smartphone đắt nhất của Samsung sẽ có giá rẻ hơn 400 USD so với thế hệ trước. Theo báo cáo của SamMobile&nbHai smartphone đắt nhất của Samsung sẽ có giá rẻ hơn 400 USD so với thế hệ trước. Theo báo cáo của SamMobile&nbHai smartphone đắt nhất của Samsung sẽ có giá rẻ hơn 400 USD so với thế hệ trước. Theo báo cáo của SamMobile&nbHai smartphone đắt nhất của Samsung sẽ có giá rẻ hơn 400 USD so với thế hệ trước. Theo báo cáo của SamMobile&nbHai smartphone đắt nhất của Samsung sẽ có giá rẻ hơn 400 USD so với thế hệ trước. Theo báo cáo của SamMobile&nbHai smartphone đắt nhất của Samsung sẽ có giá rẻ hơn 400 USD so với thế hệ trước. Theo báo cáo của SamMobile&nbHai smartphone đắt nhất của Samsung sẽ có giá rẻ hơn 400 USD so với thế hệ trước. Theo báo cáo của SamMobile&nbHai smartphone đắt nhất của Samsung sẽ có giá rẻ hơn 400 USD so với thế hệ trước. Theo báo cáo của SamMobile&nbHai smartphone đắt nhất của Samsung sẽ có giá rẻ hơn 400 USD so với ', 'admin', '../img/news1.webp'),
(2, 'Galaxy Tab A7 Lite - máy tính bảng nhỏ gọn, tiện dụng', 'Galaxy Tab A7 Lite có kích thước màn hình mở rộng đến 8,7 inch nhưng vẫn nhỏ gọn trong tay, trọng lượng chỉ 371 gram,...\r\n\r\n', 'admin', '../img/news2.webp');

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `stt` int(11) NOT NULL,
  `ncc` varchar(50) NOT NULL,
  `diachi` varchar(50) NOT NULL,
  `sdt` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `thongtin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`stt`, `ncc`, `diachi`, `sdt`, `email`, `thongtin`) VALUES
(1, 'Masan Consumer', 'Ha Noi', 123456789, 'vu@gmail.com', 'là nhà cung cấp số một của cửa hàng'),
(2, ' Acecook VN', 'Ha Noi', 123456789, 'vu@gmail.com', 'là nhà cung cấp số ba của cửa hàng'),
(3, 'Vifon', 'Ha Noi', 123456789, 'vu@gmail.com', 'là nhà cung cấp số hai của cửa hàng');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `stt` int(11) NOT NULL,
  `taikhoan` varchar(50) NOT NULL,
  `noidung` varchar(1000) NOT NULL,
  `thoigian` date NOT NULL,
  `trangthai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`stt`, `taikhoan`, `noidung`, `thoigian`, `trangthai`) VALUES
(1, 'admin', 'Bạn đã đặt thành công đơn hàng có giá trị 120000(VNĐ).', '2023-12-26', 'Đã đọc'),
(2, 'admin', 'Đơn hàng 2023120000 đã bị hủy.', '2023-12-26', 'Đã đọc'),
(3, 'admin', 'Bạn đã đặt thành công đơn hàng có giá trị 200000(VNĐ).', '2023-12-26', 'Đã đọc'),
(4, 'admin', 'Bạn đã đặt thành công đơn hàng có giá trị 78000(VNĐ).', '2023-12-26', 'Đã đọc'),
(5, 'admin', 'Bạn đã đặt thành công đơn hàng có giá trị 600000(VNĐ).', '2023-12-26', 'Đã đọc'),
(6, 'admin', 'Bạn đã đặt thành công đơn hàng có giá trị 170000(VNĐ).', '2023-12-26', 'Đã đọc'),
(7, 'admin', 'Đơn hàng 2023120002 đã được giao thành công.', '2023-12-26', 'Đã đọc'),
(8, 'admin', 'Đơn hàng 2023120003 đã được giao thành công.', '2023-12-26', 'Đã đọc'),
(9, 'admin', 'Bạn đã đặt thành công đơn hàng có giá trị 200000(VNĐ).', '2023-12-26', 'Đã đọc'),
(10, 'admin', 'Bạn đã đặt thành công đơn hàng có giá trị 240000(VNĐ).', '2023-12-26', 'Đã đọc'),
(11, 'admin', 'Bạn đã đặt thành công đơn hàng có giá trị 180000(VNĐ).', '2023-12-26', 'Đã đọc'),
(12, 'admin', 'Bạn đã đặt thành công đơn hàng có giá trị 40000(VNĐ).', '2023-12-26', 'Đã đọc'),
(13, 'admin2', 'Bạn đã trở thành nhân viên.', '2023-12-26', ''),
(14, 'admin', 'Bạn đã đặt thành công đơn hàng có giá trị 56000(VNĐ).', '2023-12-26', 'Đã đọc'),
(15, 'admin', 'Đơn hàng 2023120009 đã được giao thành công.', '2023-12-26', ''),
(16, 'admin', 'Đơn hàng 2023120004 đã bị hủy.', '2023-12-26', ''),
(17, 'admin', 'Bạn đã đặt thành công đơn hàng có giá trị 9100(VNĐ).', '2023-12-26', ''),
(18, 'admin', 'Đơn hàng 2023120010 đã được giao thành công.', '2023-12-26', ''),
(19, 'kh1', 'Bạn đã đặt thành công đơn hàng có giá trị 184000(VNĐ).', '2023-12-26', ''),
(20, 'admin', 'Đơn hàng 2023120011 đã được giao thành công.', '2023-12-26', '');

-- --------------------------------------------------------

--
-- Table structure for table `phanloai`
--

CREATE TABLE `phanloai` (
  `loaisp` varchar(20) NOT NULL,
  `masp` varchar(10) NOT NULL,
  `hinhanh` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phanloai`
--

INSERT INTO `phanloai` (`loaisp`, `masp`, `hinhanh`) VALUES
('Làm đẹp', 'LD', '../img/ld.webp'),
('Mỳ ăn liền', 'MT', '../img/myanlien.jpg'),
('Phụ kiện thời trang', 'PK', '../img/pktt.webp'),
('Phụ kiện điện tử', 'DT', '../img/sp10.webp'),
('Thú nuôi', 'TN', '../img/tn.webp'),
('Thực phẩm', 'TP', '../img/sp12.webp'),
('Vệ sinh hằng ngày', 'VS', '../img/vshn.webp'),
('Đồ gia dụng', 'GD', '../img/dgd.webp');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `masp` varchar(10) NOT NULL,
  `tensp` varchar(50) NOT NULL,
  `loaisp` varchar(20) NOT NULL,
  `gia` int(100) NOT NULL,
  `info` varchar(1000) NOT NULL,
  `ncc` varchar(50) NOT NULL,
  `hinh anh` varchar(1000) NOT NULL,
  `soluong` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `masp`, `tensp`, `loaisp`, `gia`, `info`, `ncc`, `hinh anh`, `soluong`) VALUES
(1, 'LD1', 'Son môi', 'Làm đẹp', 120000, 'Son môi', 'B', '../img/fs3.webp', 59),
(2, 'MT1', 'Mỳ Hảo Hảo', 'Mỳ ăn liền', 5000, 'Mỳ ăn liền hảo hảo', 'A', '../img/myanlien.jpg', 19),
(3, 'MT2', 'Mỳ Giấy', 'Mỳ ăn liền', 5000, 'Mỳ Giấy hảo hạng', 'A', '../img/mygiay.jpg', 30),
(4, 'MT3', 'Mỳ Cung Đình', 'Mỳ ăn liền', 7000, 'Mỳ ăn liền Cung Đình', 'A', '../img/mycungdinh.jpg', 9),
(5, 'TN1', 'Pate mèo', 'Thú nuôi', 30000, 'Pate cho mèo', 'A', '../img/sp8.webp', 23),
(6, 'VS1', 'Dầu gội đầu', 'Vệ sinh hằng ngày', 100000, 'Dầu gội ngăn ngừa gàu', 'B', '../img/sp14.webp', 46),
(7, 'PK1', 'Sandal', 'Phụ kiện thời trang', 100000, 'dép Sandal', 'B', '../img/fs1.webp', 20),
(8, 'GD1', 'Giấy dán tường', 'Đồ gia dụng', 100000, 'Giấy dán tường ', 'B', '../img/sp15.webp', 20),
(9, 'VS2', 'Sữa tắm', 'Vệ sinh hằng ngày', 200000, 'Sữa tắm', 'C', '../img/sp14.webp', 24),
(10, 'VS3', 'Tăm bông', 'Vệ sinh hằng ngày', 20000, 'Tăm bông', 'C', '../img/sp7.webp', 28),
(11, 'DT1', 'Dây xạc', 'Phụ kiện điện tử', 100000, 'Dây xạc cho điện thoại', 'C', '../img/sp10.webp', 30),
(12, 'MT4', 'Mỳ xưa và nay', 'Mỳ ăn liền', 6000, 'Mỳ ăn liền xưa và nay', 'C', '../img/my xuavanay.jpg', 30),
(14, 'MT9', 'Mỳ omaichi', 'Mỳ ăn liền', 5000, 'Mỳ omaichi', 'A', '../img/phoga.jpg', 20),
(15, 'LD2', 'Kem dưỡng ẩm', 'Làm đẹp', 200000, 'Kem dưỡng ẩm', 'c', '../img/Kemduongam.webp', 18),
(16, 'MT6', 'Mỳ ly', 'Mỳ ăn liền', 7000, 'Mỳ ly', 'a', '../img/mily.webp', 50),
(17, 'TP1', 'Trà', 'Thực phẩm', 30000, 'Trà thơm ngon', 'A', '../img/sp12.webp', 23),
(18, 'GD2', 'Rèm cửa', 'Đồ gia dụng', 500000, 'Rèm cửa', 'B', '../img/sp9.webp', 10);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `stt` int(11) NOT NULL,
  `tensp` varchar(50) NOT NULL,
  `giamgia` int(10) NOT NULL,
  `ngaybatdau` date NOT NULL,
  `ngayketthuc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`stt`, `tensp`, `giamgia`, `ngaybatdau`, `ngayketthuc`) VALUES
(1, 'Son môi', 30, '2023-12-24', '2023-12-24'),
(2, 'Pate mèo', 20, '2023-12-24', '2023-12-26'),
(3, 'Mỳ Hảo Hảo', 20, '2023-12-25', '0000-00-00'),
(4, 'Dầu gội đầu', 50, '2023-12-25', '2023-12-26'),
(5, 'Mỳ Cung Đình', 20, '2023-12-25', '0000-00-00'),
(6, 'Sữa tắm', 10, '2023-12-25', '0000-00-00'),
(7, 'Dầu gội đầu', 20, '2023-12-26', '0000-00-00'),
(8, 'Mỳ Giấy', 30, '2023-12-26', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `spbanchay`
--

CREATE TABLE `spbanchay` (
  `stt` int(11) NOT NULL,
  `tensp` varchar(20) NOT NULL,
  `soluongban` int(10) NOT NULL,
  `thoigian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spbanchay`
--

INSERT INTO `spbanchay` (`stt`, `tensp`, `soluongban`, `thoigian`) VALUES
(1, 'Mỳ Hảo Hảo', 31, '2023-12-26'),
(2, 'Pate mèo', 5, '2023-12-26'),
(3, 'Dầu gội đầu', 1, '2023-12-26'),
(4, 'Mỳ Cung Đình', 16, '2023-12-26'),
(5, 'Giấy dán tường', 6, '2023-12-26'),
(6, 'Sandal', 0, '2023-12-26'),
(7, 'Mỳ ly', 0, '2023-12-26'),
(8, 'Kem dưỡng ẩm', 2, '2023-12-26'),
(9, 'Tăm bông', 2, '2023-12-26'),
(10, 'Sữa tắm', 2, '2023-12-26'),
(11, 'Mỳ Giấy', 1, '2023-12-26');

-- --------------------------------------------------------

--
-- Table structure for table `spyeuthich`
--

CREATE TABLE `spyeuthich` (
  `stt` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `taikhoan` varchar(50) NOT NULL,
  `masp` varchar(10) NOT NULL,
  `tensp` varchar(50) NOT NULL,
  `loaisp` varchar(20) NOT NULL,
  `gia` int(100) NOT NULL,
  `info` varchar(1000) NOT NULL,
  `ncc` varchar(50) NOT NULL,
  `hinhanh` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spyeuthich`
--

INSERT INTO `spyeuthich` (`stt`, `id`, `taikhoan`, `masp`, `tensp`, `loaisp`, `gia`, `info`, `ncc`, `hinhanh`) VALUES
(5, 6, 'kh1', 'VS1', 'Dầu gội đầu', 'Vệ sinh hằng ngày', 100000, 'Dầu gội ngăn ngừa gàu', 'B', '../img/sp14.webp'),
(6, 8, 'kh1', 'GD1', 'Giấy dán tường', 'Đồ gia dụng', 100000, 'Giấy dán tường ', 'B', '../img/sp15.webp'),
(7, 4, 'admin', 'MT3', 'Mỳ Cung Đình', 'Mỳ ăn liền', 7000, 'Mỳ ăn liền Cung Đình', 'A', '../img/mycungdinh.jpg'),
(18, 1, 'admin', 'LD1', 'Son môi', 'Làm đẹp', 120000, 'Son môi', 'B', '../img/fs3.webp'),
(20, 2, 'admin', 'MT1', 'Mỳ Hảo Hảo', 'Mỳ ăn liền', 5000, 'Mỳ ăn liền hảo hảo', 'A', '../img/myanlien.jpg'),
(21, 5, 'admin', 'TN1', 'Pate mèo', 'Thú nuôi', 24000, 'Pate cho mèo', 'A', '../img/sp8.webp');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `tennguoidung` varchar(50) NOT NULL,
  `taikhoan` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `sdt` int(20) NOT NULL,
  `diachi` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ad` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`tennguoidung`, `taikhoan`, `matkhau`, `sdt`, `diachi`, `email`, `ad`) VALUES
('vu', 'admin', '202cb962ac59075b964b07152d234b70', 123456789, 'Ha Noi', 'votuanvu@gmail.com', 2),
('admin1', 'admin1', '202cb962ac59075b964b07152d234b70', 123445, 'hanoi', 'rebijif618@dewareff.com', 1),
('admin2', 'admin2', 'e10adc3949ba59abbe56e057f20f883e', 123123123, 'hanoi', 'tvu07@gmail.com', 1),
('abcd', 'kh1', '202cb962ac59075b964b07152d234b70', 1234456, 'hanoi', 'tvu0700@gmail.com', 0),
('kh2', 'kh2', 'e10adc3949ba59abbe56e057f20f883e', 123123123, 'hanoi', 'tvu07@gmail.com', 0),
('kh3', 'kh3', 'e10adc3949ba59abbe56e057f20f883e', 123123123, 'hanoi', 'tvu07@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`taikhoan`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`stt`);

--
-- Indexes for table `danhgiasanpham`
--
ALTER TABLE `danhgiasanpham`
  ADD PRIMARY KEY (`stt`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`stt`);

--
-- Indexes for table `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  ADD PRIMARY KEY (`stt`);

--
-- Indexes for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`stt`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`mabaiviet`);

--
-- Indexes for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`ncc`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`stt`);

--
-- Indexes for table `phanloai`
--
ALTER TABLE `phanloai`
  ADD PRIMARY KEY (`loaisp`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loaisp` (`loaisp`),
  ADD KEY `ncc` (`ncc`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`stt`);

--
-- Indexes for table `spbanchay`
--
ALTER TABLE `spbanchay`
  ADD PRIMARY KEY (`stt`);

--
-- Indexes for table `spyeuthich`
--
ALTER TABLE `spyeuthich`
  ADD PRIMARY KEY (`stt`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`taikhoan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `danhgiasanpham`
--
ALTER TABLE `danhgiasanpham`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `mabaiviet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `spbanchay`
--
ALTER TABLE `spbanchay`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `spyeuthich`
--
ALTER TABLE `spyeuthich`
  MODIFY `stt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`loaisp`) REFERENCES `phanloai` (`loaisp`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`ncc`) REFERENCES `nhacungcap` (`ncc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
