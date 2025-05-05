create database ql_banhang;

use ql_banhang;

create table NHASANXUAT (
    mansx varchar(2) primary key,
    tennsx varchar(40),
    quocgia varchar(20)
);


create table HANGHOA (
    mahang varchar(4) primary key,
    tenhang varchar(40),
    mansx varchar(2),
    namsx int,
    gia int,
    foreign key (mansx) references NHASANXUAT (mansx)
);

create table KHACHHANG (
    makh varchar(4) primary key,
    tenkh varchar(30),
    namsinh int,
    dienthoai varchar(10),
    diachi varchar(50)
);

create table HOADON (
    mahd varchar(3),
    makh varchar(4),
    mahang varchar(4),
    soluong int,
    thanhtien int DEFAULT NULL,
    primary key (mahd, mahang),
    foreign key (makh) references KHACHHANG (makh),
    foreign key (mahang) references HANGHOA (mahang)
);

insert into NHASANXUAT (mansx, tennsx, quocgia) values
('DE', 'DELL', 'Hoa Kỳ'),
('AS', 'ASUS', 'Đài Loan'),
('LE', 'LENOVO', 'Trung Quốc'),
('TO', 'TOSHIBA', 'Nhật bản');

insert into HANGHOA (mahang, tenhang, mansx, gia, namsx) values
('DE01', 'Dell Vostro', 'DE', 650, 2015),
('DE02', 'Dell Inspiron', 'DE', 650, 2017),
('AS01', 'Asus Vivobook', 'AS', 580, 2015),
('AS02', 'Asus TUF', 'AS', 500, 2017),
('TO01', 'Toshiba Satellite', 'TO', 630, 2014),
('LE01', 'Lenovo Thinkpad', 'LE', 750, 2019),
('LE02', 'Lenovo Legion', 'LE', 540, 2020),
('LE03', 'Lenovo Yoga', 'LE', 600, 2020);

insert into KHACHHANG (makh, tenkh, namsinh, dienthoai, diachi) values
('K001', 'Nguyễn Thị Lan', 2001, '0909000112', 'Giá Rai'),
('K002', 'Ngô Q. Thanh Minh', 1980, '0909000111', 'Vĩnh Lợi'),
('K003', 'Lâm Văn Thanh', 1985, '0944119999', 'Phước Long'),
('K004', 'Dương Thị Thủy', 1979, '0989221112', 'Bạc Liêu'),
('K005', 'Nguyễn Mỹ Xuân', 1975, '0913024357', 'Bạc Liêu'),
('K006', 'Huỳnh Mẫn Đạt', 1988, '0913024356', 'Vĩnh Lợi'),
('K007', 'Hồ Trung Tín', 1995, '0913123457', 'Giá Rai'),
('K008', 'Trương Xuân Thi', 1997, '0913123456', 'Hồng Dân'),
('K009', 'Ngô Văn Nam', 1998, '0913223344', 'Phước Long'),
('K010', 'Ngô Văn Nam', 2001, '0913223344', 'Giá Rai');

insert into HOADON (mahd, makh, mahang, soluong) values
('001', 'K001', 'DE01', 2),
('001', 'K001', 'DE02', 1),
('002', 'K002', 'LE01', 5),
('002', 'K002', 'LE02', 3),
('003', 'K002', 'TO01', 1),
('004', 'K003', 'DE01', 2),
('005', 'K004', 'AS01', 4),
('005', 'K004', 'LE01', 6),
('005', 'K004', 'LE02', 8),
('006', 'K005', 'AS01', 5);



create table TONKHO (
    mahang varchar(4),
    tenhang varchar(40),
    mansx varchar(2),
    namsx int,
    gia int,
    soluong int,
    primary key (mahang, mansx),
    foreign key (mahang) references HANGHOA (mahang),
    foreign key (mansx) references NHASANXUAT (mansx)
);

insert into TONKHO (mahang, tenhang, mansx, namsx, gia, soluong) values 
('DE01', 'Dell Vostro', 'DE', 2015, 650, 20),
('DE02', 'Dell Inspiron', 'DE', 2015, 550, 30);


update KHACHHANG
set dienthoai = '0912131415'
where makh = 'K007';

delete from KHACHHANG
where makh = 'K010';

select *
from HANGHOA
where mansx = 'DELL';