<?php
session_start();

if (isset($_SESSION['matk']) ) 
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
    <?php
        //khởi chạy phiên từ trang xử lý đăng nhập
        include 'connect.php';
        $matk = $_GET['id'];

        $result = mysqli_query($db, "SELECT * FROM `taikhoan` WHERE matk = '$matk' ");
        //$nameuser = mysqli_fetch_row ( $sqltest );
        
        if (!isset($matk)) {
            echo '<script language="javascript">alert("Vui lòng đăng nhập!"); window.location="dangnhap.php";</script>';
        }
        
        while ($row = mysqli_fetch_array($result)) {
        
        ?>
    <!-------------------------------------------------->
    <div id="content">
        <h2>sửa tài khoản</h2>

        <div class="formdky">

            <form method="POST" role="form" name="dky" action = "">
                <table>

                    <tr>
                        <td>
                            <span> Họ và tên </span>
                        </td>
                    </tr>

                    <tr>
                        <td><input type="text" name="hoten" size="20" id="" value="<?php echo $row["name"]?>"></td>
                    </tr>

                    <tr>
                        <td>
                            <span>Email</span>
                        </td>
                    </tr>

                    <tr>
                        <td><input type="text" name="email" size="20" id="" value="<?php echo $row["email"]?>"></td>
                    </tr>

                
                    <tr>
                        <td>
                            <span>Mật khẩu</span>
                        </td>
                    </tr>

                    <tr>
                        <td><input type="text" name="password" size="20" id="" ></td>
                    </tr>

                </table>

                <button class="button2" type="submit" value="Submit" name="sbt">Sửa tài khoản</button>
            </form>
        </div>
    </div>

    <?php
      }
    ?>
    <!-------------------------------------------------------->
    <?php

    if (isset($_POST["sbt"])) 
    {

        include 'connect.php';
        

       // $db = mysqli_connect("localhost", "root", "", "qltv")  or die('Lỗi kết nối');
        mysqli_query($db, "SET NAMES 'UTF8'");

       
        $ht= $_POST['hoten'];  
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $md5pass = md5($pass);
        $emailcheck = "@gmail.com";
        //kết nối đến CSDL

        // Dùng isset để kiểm tra Form -> cái này tìm hiểu sau
        if ($ht == "" || $email == "" || $pass == "") {                                                  
            echo '<script language="javascript">alert("Vui Lòng Nhập Đầy Đủ Thông Tin!"); </script>';
            header("Refresh:0");
        } 
        else if (strlen(strstr($email, $emailcheck)) <= 0)
        {
            echo '<script language="javascript">alert("Vui lòng nhập đúng gmail!"); </script>';
            header("Refresh:0");
        }
        else if (is_numeric($ht))
        {
            echo '<script language="javascript">alert("Vui Lòng Nhập Đúng Trường Dữ liệu!"); </script>';
            header("Refresh:0");

        }
        else {
            echo "bạn đã nhập đầy đủ thông tin";
            //thực hiện việc lưu trữ dữ liệu vào db
            $sql = "UPDATE `taikhoan` SET  name = '$ht', email = '$email',password = '$md5pass' WHERE matk = '$matk'";
            $result = mysqli_query($db,$sql);
            echo '<script language="javascript">alert("Sửa thành công!"); window.location="qltk.php";</script>';
        
        }


            //$insert_id = $db->insert_id; //su dung id cua database auto increment
            //$sql =  "INSERT INTO  VALUES ('$insert_id','$ht','$email','$mk','$ut')";

         
        
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
else
echo '<script language="javascript">alert("Vui Lòng Đăng Nhập!"); window.location="dangnhap.php";</script>';
?>