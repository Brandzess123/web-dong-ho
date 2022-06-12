<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link href="css/dangky.css" rel="stylesheet">
</head>



<body>
    <div id="header">
        <div class="topheader">
            <div class="logo">
                <a href="trangchu.html">OMEGA</a>

            </div>

            <div class="list">
                
                    

                    <ul>

                        <?php
                        include 'connect.php';
                        include 'header.php';
                        ?>
                        <li><a href="dangnhap.php">Tài khoản</a></li>
                    </ul>


                
            </div>
        </div>

    </div>
    <!------------------------------------------------------->
    <div id="content">
        <h2>Thêm Tài Khoản</h2>

        <div class="formdky">

            <form action="dangkyController.php" method="POST" role="form" name="dky">
                <table>


                    <tr>
                        <td><input type="text" name="ht" size="20" placeholder="Họ Tên*" id=""></td>
                    </tr>

                    <tr>
                        <td><input type="text" name="email" size="20" placeholder="Email*s" id=""></td>
                    </tr>

                    <tr>
                        <td><input type="password" name="mk1" size="20" placeholder="Mật khẩu*" id=""></td>
                    </tr>

                    <tr>
                        <td><input type="password" name="mk2" size="20" placeholder="Xác nhận mật khẩu*" id=""></td>
                    </tr>

                    <tr>
                        <!--<td><input type="text" name="usertype" size="20" placeholder="Loại người dùng: quantri,thuthu,docgia hoặc quanli*" id=""></td>-->
                        <td><select name="usertype" id="cars" style="width:100%;height:40px">
                            <option value="thuthu">thuthu</option>
                            <option value="quantri">quantri</option>
                            <option value="docgia">docgia</option>
                            <option value="quanli">quanli</option>
                        </select></td>
                    </tr>
                </table>

                <div class="chk">
                    <input type="checkbox" name="st">Chấp nhận Điều khoản Sử dụng * để tạo tài khoản My OMEGA
                    <br>

                </div>

                <button class="button2" type="submit" value="Submit" name="sbt">Đăng Ký</button>




            </form>
        </div>
    </div>



    <!------------------------------------------------------->

    <div id="footer">
        <div class="ft">
            <span>
                Họ tên:Đặng Minh Hiếu <br>
                MSV: 19103100078 <br>
                Trường: ĐHKT-KT CÔNG NGIỆP<br>


            </span>
        </div>
    </div>
</body>