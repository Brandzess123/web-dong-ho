<?php
session_start();

if (isset($_SESSION['matk'])) {
    echo '<script language="javascript">alert("Vui Lòng Đăng Xuất!"); window.location="dangnhap.php";</script>';
 }
else
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
        <h2>Đăng Ký</h2>

        <div class="formdky">

            <form method="POST" role="form" name="dky" action = "">
                <table>

                    <tr>
                        <td>
                            <span> Họ và tên </span>
                        </td>
                    </tr>

                    <tr>
                        <td><input type="text" name="hoten" size="20" id=""></td>
                    </tr>

                    <tr>
                        <td>
                            <span>Email</span>
                        </td>
                    </tr>

                    <tr>
                        <td><input type="text" name="email" size="20" id=""></td>
                    </tr>

                    <tr>
                        <td>
                            <span>Mật khẩu</span>
                        </td>
                    </tr>

                    <tr>
                        <td><input type="password" name="mk" size="20" id=""></td>
                    </tr>

                    

                </table>
                <div class="chk">
                    <input type="checkbox" name="st">Chấp nhận Điều khoản Sử dụng * để tạo tài khoản My OMEGA
                    <br>

                </div>

                <button class="button2" type="submit" value="Submit" name="sbt">Thêm tài khoản</button>
            </form>
        </div>
    </div>
    <!-------------------------------------------------------->
    <?php

    if (isset($_POST["sbt"])) 
    {

        include 'connect.php';
        

       // $db = mysqli_connect("localhost", "root", "", "qltv")  or die('Lỗi kết nối');
        mysqli_query($db, "SET NAMES 'UTF8'");

       
        $ht= $_POST['hoten'];  
        $email = $_POST['email'];
        $mk = $_POST['mk'];
        $emailcheck = "@gmail.com";
        $pass = md5($mk);

        //kết nối đến CSDL

        // Dùng isset để kiểm tra Form -> cái này tìm hiểu sau
        if ($ht == "" || $email == "" || $mk == "" ) {                                                  
            echo '<script language="javascript">alert("Vui Lòng Nhập Đầy Đủ Thông Tin!"); window.location="dangky.php";</script>';
        }
        else if (is_numeric($ht) ) 
        {
            echo '<script language="javascript">alert("Vui Lòng Nhập Đúng Tài Khoản!"); window.location="dangky.php";</script>';
        } 
        else if (strlen(strstr($email, $emailcheck)) <= 0) 
        {
            echo '<script language="javascript">alert("Vui lòng nhập đúng gmail!"); window.location="dangky.php";</script>';
        } 
        else if (!isset($_POST['st'])) 
        {
            echo '<script language="javascript">alert("Chưa xác nhận điều khoản sử dụng!"); window.location="dangky.php";</script>';
        } 
        else {
            echo "bạn đã nhập đầy đủ thông tin";
            //thực hiện việc lưu trữ dữ liệu vào db
            // Kiểm tra username hoặc email có bị trùng hay không
            $sql = "SELECT * FROM taikhoan WHERE hoten = '$ht' AND email = '$email' AND mk = '$mk' ";

            //thực thi câu truy vấn
            $check = mysqli_query($db, $sql);
            $usertype = "docgia";

            // Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
            if (mysqli_num_rows($check) > 0) {
                echo '<script language="javascript">alert("tài khoản đã tồn tại!");</script>';
                header("Refresh:0");

                //die();  //dừng chương trình
            } 
            else  //nhập dữ liệu vào CSDL
            {

                $insert_id = $db->insert_id; //su dung id cua database auto increment
                $sql =  "INSERT INTO `taikhoan` VALUES ('$insert_id','$ht','$email','$pass','$usertype')";
                $result = mysqli_query($db, $sql);

                $sql2 = "SELECT `matk` FROM `taikhoan` WHERE email = '$email' ";
                $result2 = mysqli_query($db, $sql2);
                $rowtest = mysqli_fetch_row($result2);
                

                $sqlt = "INSERT INTO `userprivilege`(`iduser`, `matk`, `maquyen`, `chophep`, `them`, `xoa`, `sua`)
                VALUES ('$insert_id','$rowtest[0]','4','true','true','false','false'), ('$insert_id','$rowtest[0]','6','true','false','false','false')";
                $result12 = mysqli_query($db, $sqlt);
                
                echo '<script language="javascript">alert("Thêm thành công!"); window.location="dangnhap.php";</script>';


            }
        }

        
    }
    ?>




    <!------------------------------------------------------->

    <div id="footer">
        <div class="ft">
            <span>
                Nhóm: 5<br>
                MSV: 19103100108 <br>
                Trường: ĐHKT-KT CÔNG NGIỆP<br>


            </span>
        </div>
    </div>
</body>
<?php
}
?>
