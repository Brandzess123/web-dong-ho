<?php
session_start();

if (isset($_SESSION['user_type'])) 
{
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới</title>
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
        <h2>Thêm nhân viên mới</h2>

        <div class="formdky">

            <form method="POST" role="form" name="dky">
                <table>

                    <tr>
                        <td>
                            <span>Họ và tên</span>
                        </td>
                    </tr>

                    <tr>
                        <td><input type="text" name="hoten" size="20" id=""></td>
                    </tr>

                    <tr>
                        <td>
                            <span>Ngày sinh</span>
                        </td>
                    </tr>

                    <tr>
                        <td><input type="date" name="ngaysinh" size="20" id=""></td>
                    </tr>

                    <tr>
                        <td>
                            <span>Số điện thoại</span>
                        </td>
                    </tr>

                    <tr>
                        <td><input type="text" name="sdt" size="20" id=""></td>
                    </tr>

                    <tr>
                        <td>
                            <span>Địa chỉ</span>
                        </td>
                    </tr>

                    <tr>
                        <td><input type="text" name="diachi" size="20" id="" ></td>
                    </tr>



                </table>

                <button class="button2" type="submit" value="Submit" name="sbt">Thêm nhân viên</button>
            </form>
        </div>
    </div>
    <!-------------------------------------------------------->
    <?php

    if (isset($_POST["sbt"]))  //khi bấm vào submit là chạy
    {
        include 'connect.php';

       // $db = mysqli_connect("localhost", "root", "", "qltv")  or die('Lỗi kết nối');
        mysqli_query($db, "SET NAMES 'UTF8'");

        //lấy dữ liệu từ form gọi lên
        $ht = $_POST['hoten'];  //cái này lấy từ database -> loinhuan .... //cái còn lại là biến $ln
        $ns = $_POST['ngaysinh'];
        $sdt = $_POST['sdt'];
        $diachi =  $_POST['diachi'];

        //kết nối đến CSDL


        // Dùng isset để kiểm tra Form -> cái này tìm hiểu sau
        if ($ht == "" || $ns == "" || $sdt == "" || $diachi == "") {                                                  
            echo '<script language="javascript">alert("Vui Lòng Nhập Đầy Đủ Thông Tin!"); </script>';
            header("Refresh:0");
        } else {
            echo "bạn đã nhập đầy đủ thông tin";
            //thực hiện việc lưu trữ dữ liệu vào db
        }

        // Kiểm tra username hoặc email có bị trùng hay không
        $sql = "SELECT * FROM nhanvien WHERE hoten = '$ht' AND ngaysinh = '$ns' AND sdt = '$sdt' ";

        //thực thi câu truy vấn
        $check = mysqli_query($db, $sql);


        // Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
        if (mysqli_num_rows($check) > 0) {
            echo '<script language="javascript">alert("Nhân viên đã tồn tại!"); </script>';
            header("Refresh:0");

            die();  //dừng chương trình
        }
        else if (is_numeric($diachi) || !is_numeric($sdt) || strlen($sdt) <= 8 || is_numeric($ht))
        {
            echo '<script language="javascript">alert("Vui Lòng Nhập Đúng Trường Thông Tin!"); </script>';
            header("Refresh:0");
            

        } 
        else  //nhập dữ liệu vào CSDL
        {

            $insert_id = $db->insert_id; //su dung id cua database auto increment
            $sql =  "INSERT INTO `nhanvien`(`manv`, `hoten`, `ngaysinh`, `sdt`,`diachi`) VALUES ('$insert_id','$ht','$ns','$sdt','$diachi')";
            $result = mysqli_query(
                $db,
                $sql
            );
            echo '<script language="javascript">alert("Thêm thành công!"); window.location="qlnv.php";</script>';
        }
    }



    ?>




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

<?php
}
else
echo '<script language="javascript">alert("Vui Lòng Đăng Nhập!"); window.location="dangnhap.php";</script>';
?>