create database QUANLYNHANSU;

use QUANLYNHANSU;

create table tai_khoan (
    TenDangNhap varchar(255) primary key,
    MatKhau varchar(255)
);

create table don_vi (
    MaDonVi int auto_increment primary key,
    TenDonVi varchar(255)
);

create table nhan_vien (
    MaNhanVien int auto_increment primary key,
    HoTen varchar(255),
    NgaySinh date,
    GioiTinh enum('Nam', 'Nữ'),
    DiaChi varchar(255),
    Sdt varchar(255),
    MaDonVi int,
    foreign key (MaDonVi) references don_vi(MaDonVi)
);

create table luong (
    MaLuong int auto_increment primary key,
    MaNhanVien int,
    Thang int,
    Nam int,
    SoGioLam int,
    LuongCoBan decimal(15,2),
    HeSo decimal(15,2),
    foreign key (MaNhanVien) references nhan_vien(MaNhanVien) 
);

CREATE TABLE thuong (
    MaThuong INT AUTO_INCREMENT PRIMARY KEY,
    MaNhanVien INT,
    Thang INT,
    Nam INT,
    LoaiThuong VARCHAR(255),
    SoTienThuong DECIMAL(15, 2),
    NgayTraThuong DATE,
    GhiChu TEXT,
    FOREIGN KEY (MaNhanVien) REFERENCES nhan_vien(MaNhanVien)
);

insert into tai_khoan (TenDangNhap, MatKhau) values ('admin', '@123456');

insert into don_vi (TenDonVi) values 
('Khoa KT & CN'),
('Khoa Sư phạm'),
('Khoa NN & TS'),
('Khoa Kinh tế và Luật');

insert into nhan_vien (HoTen, NgaySinh, GioiTinh, DiaChi, Sdt, MaDonVi) values
('Nguyễn Văn A', '1995-05-20', 'Nam', 'Bạc Liêu', '0912345678', 1),
('Trần Thị B', '1997-08-15', 'Nữ', 'Bạc Liêu', '0923456789', 2),
('Lê Văn C', '1993-12-05', 'Nam', 'Cà Mau', '0934567890', 3),
('Phạm Thị D', '1998-03-22', 'Nữ', 'Sóc Trăng', '0945678901', 4);

insert into luong (MaNhanVien, Thang, Nam, SoGioLam, LuongCoBan, HeSo) values
(1, 4, 2025, 160, 5000000, 1.2),
(2, 4, 2025, 155, 4800000, 1.1),
(3, 4, 2025, 165, 5200000, 1.3),
(4, 4, 2025, 150, 4700000, 1.0);