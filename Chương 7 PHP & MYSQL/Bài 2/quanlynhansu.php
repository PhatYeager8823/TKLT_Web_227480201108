<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý nhân sự</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            background-color: #f0f8ff; 
            /* min-height: 100vh;*/
        }

        .header {
            display: flex;
            /* background-color: aqua; */
            border-bottom: 3px solid black;
        }

        .header-left {
            border-right: 3px solid black;
            width: 20%;
        }

        .header-right {
            display: flex;
            width: 70%;
            justify-content: space-evenly;
            align-items: center;
        }

        .img-1 {
            width: 300px;
            height: 150px;
            padding: 3px;
        }

        .img-2 {
            width: 300px;
            height: 150px;
            padding: 3px;
        }

        .body {
            display: flex;
            /* background-color: pink; */
        }

        .body-left {
            width: 20%;
            border-right: 3px solid black;
            padding: 10px 5px;
        }

        .trangchu, .donvi, .hoso, .luong {
            border: 3px solid black;
            margin-bottom: 5px;
            padding: 10px;
            text-align: center;
            cursor: pointer;
            background-color: white;
            transition: background-color 0.3s;
        }

        .trangchu:hover, .donvi:hover, .hoso:hover, .luong:hover {
            background-color: #eee;
        }

        .submenu {
            display: none;
            margin-top: 5px;
            padding-left: 10px;
            text-align: center;
        }

        .submenu div {
            padding: 5px;
            margin: 3px 0;
            background-color: #f1f1f1;
            border-radius: 5px;
            cursor: pointer;
            border: 3px solid black;
        }

        .submenu div:hover {
            background-color: #ccc;
        }

        .body-right {
            flex: 1;
            padding: 20px;
        }

        .img-3 {
            width: 400px;
            height: auto;
            float: right; /* hoặc float: left */
            margin: 10px;
        }

        .fooder {
            background-color: lightgray;
            padding: 10px;
            /* text-align: center; */
            border-top: 3px solid black;
            border-bottom: 3px solid black;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <div class="header-left">
            <img src="Dai-Hoc-Bac-Lieu.jpg" alt="Logo 1" class="img-1">
        </div>
        <div class="header-right">
            <img src="logo.jpg" alt="Logo 2" class="img-2">
            <h1>QUẢN LÝ NHÂN SỰ</h1>
        </div>
    </div>

    <div class="body">
        <div class="body-left">
            <div class="trangchu">
                <a href="https://blu.edu.vn/" style="text-decoration: none; color: black;">Trang chủ</a>
            </div>

            <div class="donvi" onclick="toggleSubmenu()">Đơn vị trực thuộc</div>
            <div class="submenu" id="submenu-donvi">
                <div>
                    <a href="https://kythuatcongnghe.blu.edu.vn/" style="text-decoration: none; color: black;">Khoa KT & CN</a>
                </div>
                <div>
                    <a href="https://supham.blu.edu.vn/" style="text-decoration: none; color: black;">Khoa Sư phạm</a>
                </div>
                <div>
                    <a href="https://nongnghiepthuysan.blu.edu.vn/" style="text-decoration: none; color: black;">Khoa NN & TS</a>
                </div>
                <div>
                    <a href="https://kinhteluat.blu.edu.vn/" style="text-decoration: none; color: black;">Khoa Kinh tế và Luật</a>
                </div>
            </div>

            <div class="hoso" onclick="toggleSubmenu()">Hồ sơ nhân viên</div>
            <div class="submenu" id="submenu-hoso">
                <div>
                    <a href="Xem_hoso/danhsach.php" style="text-decoration: none; color: black;">Danh sách</a>
                </div>
                <div>
                    <a href="Xem_hoso/xem_hoso.php" style="text-decoration: none; color: black;">Xem hồ sơ</a>
                </div>
                <div>
                    <a href="Them_hoso/them_hoso.php" style="text-decoration: none; color: black;">Thêm hồ sơ</a>
                </div>
                <div>
                    <a href="Sua_hoso/sua_hoso.php" style="text-decoration: none; color: black;">Sửa hồ sơ</a>
                </div>
                <div>Xóa hồ sơ</div>
                <div>Tìm hồ sơ</div>
            </div>
            <div class="luong">Quản lý tiền lương</div>
            <div class="submenu" id="submenu-luong">
                <div>Bảng lương</div>
                <div>Cập nhật hồ sơ</div>
                <div>Tìm kiếm</div>
                <div>Tính lương</div>
                <div>Tính thưởng</div>
            </div>
        </div>

        <div class="body-right">
            <p style="font-weight: bold; margin-bottom: 10px;">Tên tiếng Anh: BAC LIEU UNIVERSITY <br>
                Tên viết tắt: Tiếng việt ĐHBL - Tiếng Anh BLU <br>
            </p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Autem corrupti tempore iure labore beatae asperiores at, 
                optio delectus cumque a tempora error doloremque molestias fugit, laboriosam ducimus quam quod quibusdam!
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic tempore pariatur nam earum esse consequuntur sapiente veniam, quaerat voluptatum mollitia 
                natus architecto ad voluptatibus neque ex temporibus voluptates quibusdam tenetur?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis tenetur cum consequuntur iure facilis delectus error dolor at? Et saepe, 
                consequuntur dolorum nobis impedit deserunt incidunt provident corrupti voluptates ducimus!
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia, qui quaerat, laboriosam saepe facere provident quod repellendus non natus iste quos 
                eius at deserunt sapiente nihil itaque quasi veritatis libero.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. <img src="daihocbl.jpg" alt="" class="img-3">Officiis assumenda iure incidunt magnam, laborum, delectus sint quos excepturi, sed molestias sequi 
                mollitia harum placeat! Quam rem voluptate autem nulla ut.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil magnam exercitationem corporis beatae aspernatur, natus voluptates sed, laudantium saepe earum similique. 
                Error quos maiores vitae aspernatur, modi amet dolor laborum.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum, dolorum blanditiis ea nihil assumenda illum deleniti tempora error aut earum explicabo eum necessitatibus nisi, 
                facilis quibusdam praesentium recusandae fugit animi.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo ratione amet doloribus quo velit iure illum aspernatur aliquam ut, voluptate dolore porro, 
                tempore eius maxime error blanditiis laboriosam suscipit iusto.
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Delectus deleniti facere ex non esse voluptatibus a, maiores velit, neque reprehenderit deserunt, 
                quisquam aliquam suscipit temporibus minus quas adipisci possimus atque!
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quasi adipisci eius minima molestiae repellendus eveniet. Odit laudantium repudiandae alias adipisci harum cupiditate quo, 
                quae voluptatibus, odio inventore, id blanditiis possimus!
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur labore quas nemo corporis modi neque dicta possimus ex natus. 
                Natus vitae omnis architecto consectetur repellat fugiat provident assumenda amet optio.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae corrupti doloremque autem temporibus laudantium delectus mollitia quidem aspernatur 
                culpa animi iusto totam, ipsam laboriosam fuga sequi fugit dolorem tempore? Hic.
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis hic quia nostrum velit dolores at expedita eum ea 
                officia neque inventore ipsa modi aut minima perspiciatis, quae laborum. Nostrum, atque!
            </p>
        </div>
    </div>

    <div class="fooder">
        <p style="font-weight: bold">TRƯỜNG ĐẠI HỌC BẠC LIÊU</p>
        <p style="font-weight: bold">Chất lượng - Sáng tạo - Trách nhiệm - Hội nhập</p>
        <p>Điện thoại: 02913822653 <br>
        Email: mail@blue.edu.vn <br>
        Địa chỉ: Số 178 đường Võ Thị Sáu, P.8, TP.Bạc Liêu, Tỉnh Bạc Liêu
        </p>

    </div>
</div>

<script>
    document.querySelector('.donvi').addEventListener('click', function() {
        var submenu = document.getElementById('submenu-donvi');
        submenu.style.display = (submenu.style.display === 'none') ? 'block' : 'none';
    });

    document.querySelector('.hoso').addEventListener('click', function() {
        var submenuHoso = document.getElementById('submenu-hoso');
        submenuHoso.style.display = (submenuHoso.style.display === 'none') ? 'block' : 'none';
    });

    document.querySelector('.luong').addEventListener('click', function() {
        var submenuHoso = document.getElementById('submenu-luong');
        submenuHoso.style.display = (submenuHoso.style.display === 'none') ? 'block' : 'none';
    });
</script>

</body>
</html>
