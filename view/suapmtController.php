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
    <?php
        //khởi chạy phiên từ trang xử lý đăng nhập
        include 'connect.php';
        $mamt = $_GET['id'];

        $result = mysqli_query($db, "SELECT * FROM `phieumuon` WHERE mamt = '$mamt' ");
        //$nameuser = mysqli_fetch_row ( $sqltest );
        
        if (!isset($mamt)) {
            echo '<script language="javascript">alert("Vui lòng đăng nhập!"); window.location="dangnhap.php";</script>';
        }
        $result12 = mysqli_query($db, "SELECT tensach FROM `sach`");
        
        while ($row = mysqli_fetch_array($result)) {
        
        ?>
     <!------------------------------------------------------->
    <div id="content">
        <h2>sửa phiếu mượn trả</h2>

        <div class="formdky">

            <form method="POST" role="form" name="dky">
                <table>

                    <tr>
                        <td>
                            <span> Mã Tài Khoản </span>
                        </td>
                    </tr>

                    <tr>
                        <td><input type="text" name="madg" size="20" id="" value="<?php echo $row["madocgia"]?>" disabled></td>
                    </tr>

                   

                    <tr>
                        <td>
                            <span>Ngày mượn</span>
                        </td>
                    </tr>

                    <tr>
                        <td><input type="date" name="ngaymuon" size="20" id="" value="<?php echo $row["ngaymuon"]?>" ></td>
                    </tr>

                    <tr>
                        <td>
                            <span>Ngày trả</span>
                        </td>
                    </tr>

                    <tr>
                        <td><input type="date" name="ngaytra" size="20" id="" value="<?php echo $row["ngaytra"]?>"></td>
                    </tr>

                    <tr>
                        <td>
                            <span>Số tiền</span>
                        </td>
                    </tr>

                    <tr>
                        <td><input type="text" name="sotien" size="20" id="" value="<?php echo $row["tien"]?>" disabled></td>
                    </tr>


                    <tr>
                        <td>
                            <span>tên sách</span>
                        </td>
                    </tr>

                    <tr>
                            <td><select name="tensach" id="sach" style="width:100%;height:40px" disabled>
                            <?php while ($row = mysqli_fetch_array($result12)) { ?>
                                <option value="<?php echo $row["tensach"]?>"><?php echo $row["tensach"]?></option>
                            <?php } ?>
                            </select></td>
                    </tr>


                    <tr>
                        <td>
                            <span>Số lượng</span>
                        </td>
                    </tr>

                    <tr>
                        <td><input type="text" name="soluong" size="20" id=""  disabled></td>
                    </tr>

                  

                    
                </table>

                <button class="button2" type="submit" value="Submit" name="sbt">sửa phiếu mượn trả</button>
            </form>
        </div>
    </div>
    <!-------------------------------------------------------->
    <?php
        }
    ?>
    <?php

    if (isset($_POST["sbt"]))  //khi bấm vào submit là chạy
    {
        include 'connect.php';

     
        mysqli_query($db, "SET NAMES 'UTF8'");

       
        $ngaym = $_POST['ngaymuon'];
        $ngayt = $_POST['ngaytra'];
       
        // Dùng isset để kiểm tra Form -> cái này tìm hiểu sau
        if ( $ngaym == "" || $ngayt == "" ) {                                                  
            echo '<script language="javascript">alert("Vui Lòng Nhập Đầy Đủ Thông Tin!"); </script>';
            header("Refresh:0");
        }
        else
         {
            echo "bạn đã nhập đầy đủ thông tin";
            //thực hiện việc lưu trữ dữ liệu vào db
            //$sql =  "INSERT INTO `phieumuon` VALUES ('$insert_id','$madg','$manv','$ngaym','$ngayt','$sotien')";
            $sql = "UPDATE `phieumuon` SET ngaymuon = '$ngaym',ngaytra = '$ngayt' WHERE mamt = '$mamt'";
            $result = mysqli_query(
                $db,
                $sql
            );
            echo '<script language="javascript">alert("sửa thành công!"); window.location="qlpmt.php";</script>';
        
        }
 
    }



    ?>




    <!------------------------------------------------------->

    <div id="footer">
        <div class="ft">
            <span>
                Họ tên: Lê Vũ Bảo <br>
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