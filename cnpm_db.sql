-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th12 01, 2021 lúc 01:54 PM
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
-- Cơ sở dữ liệu: `mvcphp`
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
(4, 'M', 10),
(4, 'L', 10),
(4, 'XL', 10),
(5, 'M', 10),
(5, 'L', 10),
(5, 'XL', 10),
(6, 'M', 10),
(6, 'L', 10),
(6, 'XL', 10),
(0, '', 0),
(7, 'M', 10),
(7, 'L', 10),
(7, 'XL', 10),
(8, 'M', 10),
(9, 'L', 10),
(9, 'XL', 10),
(8, 'M', 10),
(9, 'L', 10),
(9, 'XL', 10),
(10, 'M', 10),
(10, 'L', 10),
(10, 'XL', 10),
(11, 'M', 10),
(11, 'L', 10),
(11, 'XL', 10),
(12, 'M', 10),
(12, 'L', 10),
(12, 'XL', 10),
(13, 'M', 10),
(13, 'L', 10),
(13, 'XL', 10),
(14, 'M', 10),
(14, 'L', 10),
(14, 'XL', 10),
(15, 'M', 10),
(15, 'L', 10),
(15, 'XL', 10),
(16, 'M', 10),
(16, 'L', 10),
(16, 'XL', 10),
(17, ' M', 10),
(17, 'L', 10),
(17, 'XL', 10),
(18, 'M', 10),
(18, 'L', 10),
(18, 'XL', 10),
(19, 'M', 10),
(19, 'L', 10),
(19, 'XL', 10),
(20, 'M', 10),
(20, 'L', 10),
(20, 'XL', 10),
(21, 'M', 10),
(21, 'L', 10),
(21, 'XL', 10),
(22, 'M', 10),
(22, 'L', 10),
(22, 'XL', 10),
(23, 'M', 10),
(23, 'L', 10),
(23, 'XL', 10),
(24, 'M', 10),
(24, 'L', 10),
(24, 'XL', 10),
(25, 'M', 10),
(25, 'L', 10),
(25, 'XL', 10),
(26, 'M', 10),
(26, 'L', 10),
(26, 'XL', 10),
(27, 'M', 10),
(27, 'L', 10),
(27, 'XL', 10),
(31, 'M', 10),
(31, 'L', 10),
(31, 'XL', 10),
(32, 'M', 10),
(32, 'L', 10),
(32, 'XL', 10),
(33, 'M', 10),
(33, 'L', 10),
(33, 'XL', 10),
(34, 'M', 10),
(34, 'L', 10),
(34, 'XL', 10),
(35, 'M', 10),
(34, 'L', 10),
(34, 'XL', 10),
(35, 'M', 10),
(35, 'L', 10),
(35, 'XL', 10),
(36, 'M', 10),
(36, 'L', 10),
(36, 'XL', 10),
(37, 'M', 10),
(37, 'L', 10),
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
(1, 17, 'M', 1, 500000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHoaDon` int(10) NOT NULL,
  `MaKhachHang` int(10) NOT NULL,
  `NgayTao` date NOT NULL,
  `TongTien` int(10) NOT NULL,
  `TrangThaiThanhToan` varchar(20) NOT NULL,
  `DiaChiGiaoHang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MaHoaDon`, `MaKhachHang`, `NgayTao`, `TongTien`, `TrangThaiThanhToan`, `DiaChiGiaoHang`) VALUES
(1, 1, '2021-12-01', 500000, 'Đã Thanh Toán', 'tphcm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKhachHang` int(10) NOT NULL,
  `TenKhachHang` varchar(50) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `SDT` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKhachHang`, `TenKhachHang`, `Email`, `Password`, `DiaChi`, `SDT`) VALUES
(1, 'an', 'lyquocan1@gmail.com', 'abcabc@12', 'tphcm', '0981234513'),
(2, 'annnnn', 'lyquocan171@gmail.co', 'rtydgfsfsg', 'ha noi', '0982306613'),
(3, 'annnnn', 'lyquocan17@gmail.com', 'rtydgfsfsg', 'ha noi', '0982306613'),
(4, 'anh', 'aa123123@gmail.com', 'qwerty', 'nha trang', '0981234333');

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
('KM001', 10, '2021-12-01', '2021-12-04', 10),
('KM002', 5, '2021-12-05', '2021-12-07', 50);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNhanVien` int(10) NOT NULL,
  `TenNhanVien` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `SDT` varchar(11) NOT NULL,
  `DiaChi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNhanVien`, `TenNhanVien`, `Email`, `Password`, `SDT`, `DiaChi`) VALUES
(1, 'quocan', 'lyquocan171@gmail.com', 'P@ss123', '0982306613', 'acvbbcv tphcm'),
(2, 'an', 'lyquocan1711@gmail.com', 'P@ss1234', '0982306614', 'q1 tphcm'),
(3, 'aa', 'aa123@gmail.com', 'qweqwe', '098232354', 'go vap tphcm');

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
  `ChietKhau` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `Hinh1`, `Hinh2`, `TongSoLuong`, `DanhMuc`, `NgayNhap`, `DonGia`, `ChietKhau`) VALUES
(4, 'ALPHABETIC MOSS GREEN TEE', 'ALPHABETIC MOSS GREEN TEE.jpg', 'ALPHABETIC MOSS GREEN TEE 1.jpg', 10, 'top', '2021-12-01', 200000, 10),
(5, 'BANDANA HOODIE', 'BANDANA HOODIE.jpg', 'BANDANA HOODIE 1.jpg', 10, 'top', '2021-12-01', 500000, 10),
(6, 'CORDUROY JACKET', 'CORDUROY JACKET.jpg', 'CORDUROY JACKET 1.jpg', 10, 'top', '2021-12-01', 600000, 5),
(7, 'DRUG EXPERIMENT SHIRT', 'DRUG EXPERIMENT SHIRT.jpg', 'DRUG EXPERIMENT SHIRT 1.jpg', 10, 'top', '2021-12-01', 400000, 5),
(8, 'EMOJI LONG SLEEVE', 'EMOJI LONG SLEEVE.jpg', 'EMOJI LONG SLEEVE 1.jpg', 10, 'top', '2021-12-01', 400000, 0),
(9, 'FLAME GRADIENT TEE', 'FLAME GRADIENT TEE.jpg', 'FLAME GRADIENT TEE 1.jpg', 10, 'top', '2021-12-01', 400000, 5),
(10, 'FOOTBALL FANATIC T-SHIRT', 'FOOTBALL FANATIC T-SHIRT.jpg', 'FOOTBALL FANATIC T-SHIRT 1.jpg', 10, 'top', '2021-12-01', 500000, 10),
(11, 'GANGSTA TEE', 'GANGSTA TEE.jpg', 'GANGSTA TEE 1.jpg', 10, 'top', '2021-12-01', 200000, 0),
(12, 'GLORY ROAD BROWN VARSITY JACKET', 'GLORY ROAD BROWN VARSITY JACKET.jpg', 'GLORY ROAD BROWN VARSITY JACKET 1.jpg', 10, 'top', '2021-11-27', 600000, 10),
(13, 'GLORY ROAD GREEN VARSITY JACKET', 'GLORY ROAD GREEN VARSITY JACKET.jpg', 'GLORY ROAD GREEN VARSITY JACKET 1.jpg', 10, 'top', '2021-12-01', 600000, 5),
(14, 'HADES NEW BALANCE LONGSLEEVE', 'HADES NEW BALANCE LONGSLEEVE.jpg', 'HADES NEW BALANCE LONGSLEEVE 1.jpg', 10, 'top', '2021-12-01', 600000, 10),
(15, 'HADES OVERDYED LAYERED HOODIE', 'HADES OVERDYED LAYERED HOODIE.jpg', 'HADES OVERDYED LAYERED HOODIE 1.jpg', 10, 'top', '2021-12-01', 500000, 5),
(16, 'HADES PLAY PINK TEE', 'HADES PLAY PINK TEE.jpg', 'HADES PLAY PINK TEE 1.jpg', 10, 'top', '2021-12-01', 400000, 10),
(17, 'HADES SIGNATURE OVERSHIRT', 'HADES SIGNATURE OVERSHIRT.jpg', 'HADES SIGNATURE OVERSHIRT 1.jpg', 10, 'top', '2021-12-01', 500000, 0),
(18, 'ICONIC POLO', 'ICONIC POLO.jpg', 'ICONIC POLO 1.jpg', 10, 'top', '2021-12-01', 400000, 0),
(19, 'LANDSCAPE HOODIE', 'LANDSCAPE HOODIE.jpg', 'LANDSCAPE HOODIE 1.jpg', 10, 'top', '2021-12-01', 600000, 5),
(20, 'LIGHTNING STRIKE JACKET', 'LIGHTNING STRIKE JACKET.jpg', 'LIGHTNING STRIKE JACKET 1.jpg', 10, 'top', '2021-12-01', 600000, 5),
(21, 'LOGO PACK GREEN SHIRT ', 'LOGO PACK GREEN SHIRT.jpg', 'LOGO PACK GREEN SHIRT 1.jpg', 10, 'top', '2021-12-01', 500000, 0),
(22, 'MONO WASH TEE', 'MONO WASH TEE.jpg', 'MONO WASH TEE 1.jpg', 10, 'top', '2021-12-01', 400000, 10),
(23, 'RANDOM LETTER HOODIE', 'RANDOM LETTER HOODIE.jpg', 'RANDOM LETTER HOODIE 1.jpg', 10, 'top', '2021-12-01', 500000, 10),
(24, 'SMILEY FACE TEE', 'SMILEY FACE TEE.jpg', 'SMILEY FACE TEE 1.jpg', 10, 'top', '2021-12-01', 400000, 0),
(25, 'SMILEY ICE FLAME TEE', 'SMILEY ICE FLAME TEE.jpg', 'SMILEY ICE FLAME TEE 1.jpg', 10, 'top', '2021-12-01', 500000, 10),
(26, 'SNAKE BROWN WASH TEE', 'SNAKE BROWN WASH TEE.jpg', 'SNAKE BROWN WASH TEE 1.jpg', 10, 'top', '2021-12-01', 600000, 0),
(27, 'WOLF GANG TEE', 'WOLF GANG TEE.jpg', 'WOLF GANG TEE 1.jpg', 10, 'top', '2021-12-01', 400000, 1),
(28, 'EMOJI CAP', 'EMOJI CAP.jpg', '', 10, 'hat', '2021-12-01', 200000, 10),
(29, 'HADES PATTERN BASEBALL CAP', 'HADES PATTERN BASEBALL CAP.jpg', 'HADES PATTERN BASEBALL CAP 1.jpg', 10, 'hat', '2021-12-01', 200000, 0),
(30, 'LOGO CAP', 'LOGO CAP.jpg', '', 10, 'hat', '2021-12-01', 200000, 5),
(31, 'ALPHABETIC SHORTS', 'ALPHABETIC SHORTS.jpg', 'ALPHABETIC SHORTS 1.jpg', 10, 'bottom', '2021-12-01', 400000, 5),
(32, 'BANDANA TROUSER PANTS', 'BANDANA TROUSER PANTS.jpg', 'BANDANA TROUSER PANTS 1.jpg', 10, 'bottom', '2021-12-01', 500000, 1),
(33, 'BASIC SHORTS', 'BASIC SHORTS.jpg', 'BASIC SHORTS 1.jpg', 10, 'bottom', '2021-12-01', 500000, 10),
(34, 'HADES NEW BALANCE TROUSER PANTS', 'HADES NEW BALANCE TROUSER PANTS.jpg', 'HADES NEW BALANCE TROUSER PANTS 1.jpg', 10, 'bottom', '2021-12-01', 400000, 0),
(35, 'HADES SIGNATURE CARGO PANTS', 'HADES SIGNATURE CARGO PANTS.jpg', 'HADES SIGNATURE CARGO PANTS 1.jpg', 10, 'bottom', '2021-12-01', 500000, 0),
(36, 'RAZOR PANTS', 'RAZOR PANTS.jpg', 'RAZOR PANTS 1.jpg', 10, 'bottom', '2021-12-01', 600000, 5),
(37, 'SKELETON SHORTS', 'SKELETON SHORTS.jpg', 'SKELETON SHORTS 1.jpg', 10, 'bottom', '2021-12-01', 400000, 0),
(38, 'SS3 BACKPACK', 'SS3 BACKPACK.jpg', 'SS3 BACKPACK 1.jpg', 10, 'bag', '2021-12-01', 600000, 0),
(39, 'WOLF SYMBOL BACKPACK', 'WOLF SYMBOL BACKPACK.jpg', '', 10, 'bag', '2021-12-01', 400000, 10);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bienthe`
--
ALTER TABLE `bienthe`
  ADD KEY `MaSP` (`MaSP`);

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD KEY `MaHoaDon` (`MaHoaDon`);

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
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHoaDon` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKhachHang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
