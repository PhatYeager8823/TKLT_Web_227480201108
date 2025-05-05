-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 05, 2025 lúc 07:37 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlynhansu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_vi`
--

CREATE TABLE `don_vi` (
  `MaDonVi` int(11) NOT NULL,
  `TenDonVi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `don_vi`
--

INSERT INTO `don_vi` (`MaDonVi`, `TenDonVi`) VALUES
(1, 'Khoa KT & CN'),
(2, 'Khoa Sư phạm'),
(3, 'Khoa NN & TS'),
(4, 'Khoa Kinh tế và Luật');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luong`
--

CREATE TABLE `luong` (
  `MaLuong` int(11) NOT NULL,
  `MaNhanVien` int(11) DEFAULT NULL,
  `Thang` int(11) DEFAULT NULL,
  `Nam` int(11) DEFAULT NULL,
  `SoGioLam` int(11) DEFAULT NULL,
  `LuongCoBan` decimal(15,2) DEFAULT NULL,
  `HeSo` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `luong`
--

INSERT INTO `luong` (`MaLuong`, `MaNhanVien`, `Thang`, `Nam`, `SoGioLam`, `LuongCoBan`, `HeSo`) VALUES
(1, 1, 4, 2025, 160, 5000000.00, 1.20),
(2, 2, 4, 2025, 155, 4800000.00, 1.10),
(3, 3, 4, 2025, 165, 5200000.00, 1.30),
(5, 4, 4, 2025, 165, 5400000.00, 1.30);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `MaNhanVien` int(11) NOT NULL,
  `HoTen` varchar(255) DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `GioiTinh` enum('Nam','Nữ') DEFAULT NULL,
  `DiaChi` varchar(255) DEFAULT NULL,
  `Sdt` varchar(255) DEFAULT NULL,
  `MaDonVi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhan_vien`
--

INSERT INTO `nhan_vien` (`MaNhanVien`, `HoTen`, `NgaySinh`, `GioiTinh`, `DiaChi`, `Sdt`, `MaDonVi`) VALUES
(1, 'Nguyễn Văn A', '1995-05-20', 'Nam', 'Bạc Liêu', '0912345678', 1),
(2, 'Trần Thị B', '1997-08-15', 'Nữ', 'Bạc Liêu', '0923456789', 2),
(3, 'Lê Văn C', '1993-12-05', 'Nam', 'Cà Mau', '0934567890', 3),
(4, 'Dương Thịnh Phát', '2003-08-08', 'Nam', 'Bạc Liêu', '091979426', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `TenDangNhap` varchar(255) NOT NULL,
  `MatKhau` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tai_khoan`
--

INSERT INTO `tai_khoan` (`TenDangNhap`, `MatKhau`) VALUES
('admin', '@123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuong`
--

CREATE TABLE `thuong` (
  `MaThuong` int(11) NOT NULL,
  `MaNhanVien` int(11) DEFAULT NULL,
  `Thang` int(11) DEFAULT NULL,
  `Nam` int(11) DEFAULT NULL,
  `LoaiThuong` varchar(255) DEFAULT NULL,
  `SoTienThuong` decimal(15,2) DEFAULT NULL,
  `NgayTraThuong` date DEFAULT NULL,
  `GhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `don_vi`
--
ALTER TABLE `don_vi`
  ADD PRIMARY KEY (`MaDonVi`);

--
-- Chỉ mục cho bảng `luong`
--
ALTER TABLE `luong`
  ADD PRIMARY KEY (`MaLuong`),
  ADD KEY `MaNhanVien` (`MaNhanVien`);

--
-- Chỉ mục cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`MaNhanVien`),
  ADD KEY `MaDonVi` (`MaDonVi`);

--
-- Chỉ mục cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`TenDangNhap`);

--
-- Chỉ mục cho bảng `thuong`
--
ALTER TABLE `thuong`
  ADD PRIMARY KEY (`MaThuong`),
  ADD KEY `MaNhanVien` (`MaNhanVien`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `don_vi`
--
ALTER TABLE `don_vi`
  MODIFY `MaDonVi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `luong`
--
ALTER TABLE `luong`
  MODIFY `MaLuong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `MaNhanVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `thuong`
--
ALTER TABLE `thuong`
  MODIFY `MaThuong` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `luong`
--
ALTER TABLE `luong`
  ADD CONSTRAINT `luong_ibfk_1` FOREIGN KEY (`MaNhanVien`) REFERENCES `nhan_vien` (`MaNhanVien`);

--
-- Các ràng buộc cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD CONSTRAINT `nhan_vien_ibfk_1` FOREIGN KEY (`MaDonVi`) REFERENCES `don_vi` (`MaDonVi`);

--
-- Các ràng buộc cho bảng `thuong`
--
ALTER TABLE `thuong`
  ADD CONSTRAINT `thuong_ibfk_1` FOREIGN KEY (`MaNhanVien`) REFERENCES `nhan_vien` (`MaNhanVien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
