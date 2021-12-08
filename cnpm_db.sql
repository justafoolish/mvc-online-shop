-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th12 08, 2021 lúc 02:07 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cnpm_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bienthe`
--

CREATE TABLE `bienthe` (
  `MaSP` int(10) NOT NULL,
  `MaSize` varchar(3) NOT NULL,
  `SoLuong` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `bienthe`
--

INSERT INTO `bienthe` (`MaSP`, `MaSize`, `SoLuong`) VALUES
(4, 'L', 9),
(4, 'M', 19),
(4, 'XL', 12),
(5, 'L', 10),
(5, 'M', 10),
(5, 'XL', 10),
(6, 'L', 10),
(6, 'M', 10),
(6, 'XL', 10),
(7, 'L', 10),
(7, 'M', 10),
(7, 'XL', 10),
(10, 'L', 10),
(10, 'M', 10),
(10, 'XL', 10),
(11, 'L', 10),
(11, 'M', 10),
(11, 'XL', 10),
(12, 'L', 10),
(12, 'M', 10),
(12, 'XL', 10),
(13, 'L', 10),
(13, 'M', 10),
(13, 'XL', 10),
(14, 'L', 10),
(14, 'M', 10),
(14, 'XL', 10),
(15, 'L', 10),
(15, 'M', 10),
(15, 'XL', 10),
(16, 'L', 10),
(16, 'M', 10),
(16, 'XL', 10),
(17, ' M', 10),
(17, 'L', 10),
(17, 'XL', 10),
(18, 'L', 10),
(18, 'M', 10),
(18, 'XL', 10),
(19, 'L', 10),
(19, 'M', 10),
(19, 'XL', 10),
(20, 'L', 10),
(20, 'M', 10),
(20, 'XL', 10),
(21, 'L', 10),
(21, 'M', 10),
(21, 'XL', 10),
(22, 'L', 10),
(22, 'M', 10),
(22, 'XL', 10),
(23, 'L', 10),
(23, 'M', 10),
(23, 'XL', 10),
(24, 'L', 10),
(24, 'M', 10),
(24, 'XL', 10),
(25, 'L', 10),
(25, 'M', 10),
(25, 'XL', 10),
(26, 'L', 10),
(26, 'M', 10),
(26, 'XL', 10),
(27, 'L', 10),
(27, 'M', 10),
(27, 'XL', 10),
(31, 'L', 10),
(31, 'M', 10),
(31, 'XL', 10),
(32, 'L', 10),
(32, 'M', 10),
(32, 'XL', 10),
(33, 'L', 10),
(33, 'M', 10),
(33, 'XL', 10),
(36, 'L', 10),
(36, 'M', 10),
(36, 'XL', 10),
(37, 'L', 10),
(37, 'M', 10),
(37, 'XL', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MaHoaDon` int(10) NOT NULL,
  `MaSP` int(10) NOT NULL,
  `MaSize` varchar(3) NOT NULL,
  `SoLuong` int(10) NOT NULL,
  `DonGia` int(10) NOT NULL,
  `ChietKhau` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`MaHoaDon`, `MaSP`, `MaSize`, `SoLuong`, `DonGia`, `ChietKhau`) VALUES
(1, 17, 'M', 4, 500000, 0),
(15, 4, 'M', 2, 200000, 10),
(15, 5, 'M', 2, 500000, 10),
(15, 6, 'M', 1, 600000, 5),
(16, 4, 'M', 2, 200000, 10),
(16, 5, 'M', 2, 500000, 10),
(16, 6, 'M', 1, 600000, 5),
(17, 4, 'M', 2, 200000, 10),
(17, 5, 'M', 2, 500000, 10),
(17, 6, 'M', 1, 600000, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `MaDanhMuc` int(11) NOT NULL,
  `TenDanhMuc` varchar(50) NOT NULL,
  `MoTa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`MaDanhMuc`, `TenDanhMuc`, `MoTa`) VALUES
(1, 'Tops', ''),
(2, 'Bottoms', ''),
(3, 'Hats', ''),
(4, 'Bags', 'Các loại tủi vải, balo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHoaDon` int(10) NOT NULL,
  `MaKhachHang` int(10) NOT NULL,
  `MaGiamGia` varchar(50) DEFAULT NULL,
  `NgayTao` date NOT NULL,
  `TongTien` int(10) NOT NULL,
  `TrangThaiThanhToan` int(1) NOT NULL,
  `DiaChiGiaoHang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MaHoaDon`, `MaKhachHang`, `MaGiamGia`, `NgayTao`, `TongTien`, `TrangThaiThanhToan`, `DiaChiGiaoHang`) VALUES
(1, 1, '', '2021-12-01', 500000, 1, '273 An D.Vương, Phường 3, Quận 5'),
(2, 2, '', '2021-12-06', 1300000, 0, '273 An D. Vương, Phường 3, Quận 5'),
(15, 5, '5QZJ4CR', '2021-12-08', 1738500, 0, 'HCM'),
(16, 5, '5QZJ4CR', '2021-12-08', 1738500, 0, 'HCM'),
(17, 5, '5QZJ4CR', '2021-12-08', 1738500, 1, 'HCM');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKhachHang` int(10) NOT NULL,
  `TenKhachHang` varchar(50) NOT NULL,
  `GioiTinh` varchar(50) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `Email` varchar(20) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `DiaChi` varchar(100) DEFAULT NULL,
  `SDT` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKhachHang`, `TenKhachHang`, `GioiTinh`, `NgaySinh`, `Email`, `Password`, `DiaChi`, `SDT`) VALUES
(1, 'Quốc An', '', NULL, 'lyquocan1@gmail.com', '$2y$10$5a4ZAd0u0QvbqhopI8NyCeAeO4OrhB6/k5SRjVriCax/SY/NTar6O', 'tphcm', '0981234513'),
(2, 'Khắc Tuấn', 'Nam', NULL, 'lyquocan171@gmail.co', 'UFyDhH0Qk5YypILf5RNU5eDiRuNwOi9rJk8vM5Xv90eWz5IyQ7zq2', 'ha noi', '0982306613'),
(3, 'annnnn', 'Nữ', NULL, 'lyquocan17@gmail.com', '$2y$10$D6x0M7znwe9hOWu2E1DRz.qa24.Nifz04NM9BZ3kr5Kj8KrR65wWO', 'ha noi', '0982306613'),
(4, 'anh', 'Nam', NULL, 'aa123123@gmail.com', '$2y$10$WJjjlOkuS2ZYSwHkTW48T.p8B6yM9LCyj7dKCnIVYvBuFPsw8BUZi', 'nha trang', '0981234333'),
(5, 'Tuấn', 'Nữ', '2021-12-09', 'tun@tun.com', '$2y$10$0NPDrIQGHpbsvRu8fFzcd.mC8lTBqTLBQcrAHcqd9.Jzk5en7bq26', 'HCM', '09586128566'),
(21, 'Shuhwa', 'Nữ', '2021-12-15', 'shuhwa@id.com', '$2y$10$3DTsi6sVpd5jimO1Zbja5ODvI/aOk0APaZ6sA6qNp/CpwxTqLH9Ma', 'Seoul', '0123321123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `MaKhuyenMai` varchar(10) NOT NULL,
  `SoLuongSuDung` int(10) NOT NULL,
  `NgayBatDau` date NOT NULL,
  `NgayKetThuc` date NOT NULL,
  `ChietKhau` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`MaKhuyenMai`, `SoLuongSuDung`, `NgayBatDau`, `NgayKetThuc`, `ChietKhau`) VALUES
('5QZJ4CR', 10, '2021-12-16', '2021-12-19', 5),
('8AOWO76', 10, '2021-12-14', '2021-12-26', 10),
('IAEP3ZR', 50, '2021-12-08', '2021-12-26', 10),
('PYA5BPK', 50, '2021-12-07', '2021-12-12', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNhanVien` int(10) NOT NULL,
  `TenNhanVien` varchar(50) NOT NULL,
  `Chức vụ` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `SDT` varchar(11) NOT NULL,
  `DiaChi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNhanVien`, `TenNhanVien`, `Chức vụ`, `Email`, `Password`, `SDT`, `DiaChi`) VALUES
(1, 'quocan', '0', 'lyquocan171@gmail.com', 'P@ss123', '0982306613', 'acvbbcv tphcm'),
(2, 'an', '0', 'lyquocan1711@gmail.com', 'P@ss1234', '0982306614', 'q1 tphcm'),
(3, 'aa', '0', 'aa123@gmail.com', 'qweqwe', '098232354', 'go vap tphcm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(10) NOT NULL,
  `TenSP` varchar(50) NOT NULL,
  `Hinh1` varchar(100) NOT NULL,
  `Hinh2` varchar(100) NOT NULL,
  `TongSoLuong` int(5) NOT NULL,
  `DanhMuc` varchar(15) NOT NULL,
  `NgayNhap` date NOT NULL,
  `DonGia` int(10) NOT NULL,
  `ChietKhau` int(5) NOT NULL,
  `MoTa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `Hinh1`, `Hinh2`, `TongSoLuong`, `DanhMuc`, `NgayNhap`, `DonGia`, `ChietKhau`, `MoTa`) VALUES
(4, 'ALPHABETIC MOSS GREEN TEE', 'ALPHABETIC MOSS GREEN TEE.jpg', 'ALPHABETIC MOSS GREEN TEE 1.jpg', 10, '1', '2021-12-01', 200000, 10, ''),
(5, 'BANDANA HOODIE', 'BANDANA HOODIE.jpg', 'BANDANA HOODIE 1.jpg', 10, '1', '2021-12-01', 500000, 10, ''),
(6, 'CORDUROY JACKET', 'CORDUROY JACKET.jpg', 'CORDUROY JACKET 1.jpg', 10, '1', '2021-12-01', 600000, 5, ''),
(7, 'DRUG EXPERIMENT SHIRT', 'DRUG EXPERIMENT SHIRT.jpg', 'DRUG EXPERIMENT SHIRT 1.jpg', 10, '1', '2021-12-01', 400000, 5, ''),
(8, 'EMOJI LONG SLEEVE', 'EMOJI LONG SLEEVE.jpg', 'EMOJI LONG SLEEVE 1.jpg', 10, '1', '2021-12-01', 400000, 0, ''),
(9, 'FLAME GRADIENT TEE', 'FLAME GRADIENT TEE.jpg', 'FLAME GRADIENT TEE 1.jpg', 10, '1', '2021-12-01', 400000, 5, ''),
(10, 'FOOTBALL FANATIC T-SHIRT', 'FOOTBALL FANATIC T-SHIRT.jpg', 'FOOTBALL FANATIC T-SHIRT 1.jpg', 10, '1', '2021-12-01', 500000, 10, ''),
(11, 'GANGSTA TEE', 'GANGSTA TEE.jpg', 'GANGSTA TEE 1.jpg', 10, '1', '2021-12-01', 200000, 0, ''),
(12, 'GLORY ROAD BROWN VARSITY JACKET', 'GLORY ROAD BROWN VARSITY JACKET.jpg', 'GLORY ROAD BROWN VARSITY JACKET 1.jpg', 10, '1', '2021-11-27', 600000, 10, ''),
(13, 'GLORY ROAD GREEN VARSITY JACKET', 'GLORY ROAD GREEN VARSITY JACKET.jpg', 'GLORY ROAD GREEN VARSITY JACKET 1.jpg', 10, '1', '2021-12-01', 600000, 5, ''),
(14, 'HADES NEW BALANCE LONGSLEEVE', 'HADES NEW BALANCE LONGSLEEVE.jpg', 'HADES NEW BALANCE LONGSLEEVE 1.jpg', 10, '1', '2021-12-01', 600000, 10, ''),
(15, 'HADES OVERDYED LAYERED HOODIE', 'HADES OVERDYED LAYERED HOODIE.jpg', 'HADES OVERDYED LAYERED HOODIE 1.jpg', 10, '1', '2021-12-01', 500000, 5, ''),
(16, 'HADES PLAY PINK TEE', 'HADES PLAY PINK TEE.jpg', 'HADES PLAY PINK TEE 1.jpg', 10, '1', '2021-12-01', 400000, 10, ''),
(17, 'HADES SIGNATURE OVERSHIRT', 'HADES SIGNATURE OVERSHIRT.jpg', 'HADES SIGNATURE OVERSHIRT 1.jpg', 10, '1', '2021-12-01', 500000, 0, ''),
(18, 'ICONIC POLO', 'ICONIC POLO.jpg', 'ICONIC POLO 1.jpg', 10, '1', '2021-12-01', 400000, 0, ''),
(19, 'LANDSCAPE HOODIE', 'LANDSCAPE HOODIE.jpg', 'LANDSCAPE HOODIE 1.jpg', 10, '1', '2021-12-01', 600000, 5, ''),
(20, 'LIGHTNING STRIKE JACKET', 'LIGHTNING STRIKE JACKET.jpg', 'LIGHTNING STRIKE JACKET 1.jpg', 10, '1', '2021-12-01', 600000, 5, ''),
(21, 'LOGO PACK GREEN SHIRT ', 'LOGO PACK GREEN SHIRT.jpg', 'LOGO PACK GREEN SHIRT 1.jpg', 10, '1', '2021-12-01', 500000, 0, ''),
(22, 'MONO WASH TEE', 'MONO WASH TEE.jpg', 'MONO WASH TEE 1.jpg', 10, '1', '2021-12-01', 400000, 10, ''),
(23, 'RANDOM LETTER HOODIE', 'RANDOM LETTER HOODIE.jpg', 'RANDOM LETTER HOODIE 1.jpg', 10, '1', '2021-12-01', 500000, 10, ''),
(24, 'SMILEY FACE TEE', 'SMILEY FACE TEE.jpg', 'SMILEY FACE TEE 1.jpg', 10, '1', '2021-12-01', 400000, 0, ''),
(25, 'SMILEY ICE FLAME TEE', 'SMILEY ICE FLAME TEE.jpg', 'SMILEY ICE FLAME TEE 1.jpg', 10, '1', '2021-12-01', 500000, 10, ''),
(26, 'SNAKE BROWN WASH TEE', 'SNAKE BROWN WASH TEE.jpg', 'SNAKE BROWN WASH TEE 1.jpg', 10, '1', '2021-12-01', 600000, 0, ''),
(27, 'WOLF GANG TEE', 'WOLF GANG TEE.jpg', 'WOLF GANG TEE 1.jpg', 10, '1', '2021-12-01', 400000, 1, ''),
(28, 'EMOJI CAP', 'EMOJI CAP.jpg', '', 10, '3', '2021-12-01', 200000, 10, ''),
(29, 'HADES PATTERN BASEBALL CAP', 'HADES PATTERN BASEBALL CAP.jpg', 'HADES PATTERN BASEBALL CAP 1.jpg', 10, '3', '2021-12-01', 200000, 0, ''),
(30, 'LOGO CAP', 'LOGO CAP.jpg', '', 10, '3', '2021-12-01', 200000, 5, ''),
(31, 'ALPHABETIC SHORTS', 'ALPHABETIC SHORTS.jpg', 'ALPHABETIC SHORTS 1.jpg', 10, '2', '2021-12-01', 400000, 5, ''),
(32, 'BANDANA TROUSER PANTS', 'BANDANA TROUSER PANTS.jpg', 'BANDANA TROUSER PANTS 1.jpg', 10, '2', '2021-12-01', 500000, 1, ''),
(33, 'BASIC SHORTS', 'BASIC SHORTS.jpg', 'BASIC SHORTS 1.jpg', 10, '2', '2021-12-01', 500000, 10, ''),
(34, 'HADES NEW BALANCE TROUSER PANTS', 'HADES NEW BALANCE TROUSER PANTS.jpg', 'HADES NEW BALANCE TROUSER PANTS 1.jpg', 10, '2', '2021-12-01', 400000, 0, ''),
(35, 'HADES SIGNATURE CARGO PANTS', 'HADES SIGNATURE CARGO PANTS.jpg', 'HADES SIGNATURE CARGO PANTS 1.jpg', 10, '2', '2021-12-01', 500000, 0, ''),
(36, 'RAZOR PANTS', 'RAZOR PANTS.jpg', 'RAZOR PANTS 1.jpg', 10, '2', '2021-12-01', 600000, 5, ''),
(37, 'SKELETON SHORTS', 'SKELETON SHORTS.jpg', 'SKELETON SHORTS 1.jpg', 10, '2', '2021-12-01', 400000, 0, ''),
(38, 'SS3 BACKPACK', 'SS3 BACKPACK.jpg', 'SS3 BACKPACK 1.jpg', 10, '4', '2021-12-01', 600000, 0, ''),
(39, 'WOLF SYMBOL BACKPACK', 'WOLF SYMBOL BACKPACK.jpg', '', 10, '4', '2021-12-01', 400000, 10, '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bienthe`
--
ALTER TABLE `bienthe`
  ADD PRIMARY KEY (`MaSP`,`MaSize`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`MaHoaDon`,`MaSP`),
  ADD KEY `MaHoaDon` (`MaHoaDon`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`MaDanhMuc`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHoaDon`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKhachHang`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`MaKhuyenMai`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNhanVien`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `MaDanhMuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHoaDon` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKhachHang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNhanVien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
