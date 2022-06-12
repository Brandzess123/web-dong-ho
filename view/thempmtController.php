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
       include 'connect.php';

       $result = mysqli_query($db, "SELECT tensach FROM `sach`");
       //$nameuser = mysqli_fetch_row ( $sqltest );
       $result2 = mysqli_query($db, "SELECT tensach FROM `sach`");
       
       
       

    ?>
     <!------------------------------------------------------->

    <div id="content">
        <h2>Thêm phiếu mượn trả mới</h2>

        <div class="formdky">

            <form method="POST" role="form" name="dky">
                <table>

                    <tr>
                        <td>
                            <span> Mã Tài Khoản </span>
                        </td>
                    </tr>

                    <tr>
                        <td><input type="text" name="madg" size="20" id="" value="<?php echo $_SESSION['matk'] ?>" disabled></td>
                    </tr>
<!--
                    <tr>
                        <td>
                            <span>Mã nhân viên</span>
                        </td>
                    </tr>

                    <tr>
                        <td><input type="text" name="manv" size="20" id=""></td>
                    </tr>
-->
                    <tr>
                        <td>
                            <span>Ngày mượn</span>
                        </td>
                    </tr>

                    <tr>
                        <td><input type="text" name="ngaymuon" size="20" id="" value = "<?php echo $today = date("d/m/Y");?>" disabled></td>
                    </tr>

                    <tr>
                        <td>
                            <span>Ngày trả</span>
                        </td>
                    </tr>

                    <tr>
                        <td><input type="date" name="ngaytra" size="20" id=""></td>
                    </tr>

                    <tr>
                        <td>
                            <span>Số lượng</span>
                        </td>
                    </tr>

                    <tr>
                        <td><input type="text" name="soluong" size="20" id="" ></td>
                    </tr>

                    
                    <tr>
                        <td>
                            <span>tên sách</span>
                        </td>
                    </tr>

                    <tr>
                            <td><select name="tensach" id="sach" style="width:100%;height:40px">
                            <?php while ($row = mysqli_fetch_array($result)) { ?>
                                <option value="<?php echo $row["tensach"]?>"><?php echo $row["tensach"]?></option>
                            <?php } ?>
                            </select></td>
                    </tr>



                   

                    

                </table>

                <button class="button2" type="submit" value="Submit" name="sbt">Thêm phiếu mượn trả</button>
            </form>
        </div>
    </div>
    <!-------------------------------------------------------->
    
    <?php
       
    if (isset($_POST["sbt"]))  //khi bấm vào submit là chạy
    {
        

       // $db = mysqli_connect("localhost", "root", "", "qltv")  or die('Lỗi kết nối');
        mysqli_query($db, "SET NAMES 'UTF8'");

        //lấy dữ liệu từ form gọi lên
        $madg= $_SESSION['matk'];  //cái này lấy từ database -> loinhuan .... //cái còn lại là biến $ln
        $ngaym = date("Y/m/d");
        $ngayt = $_POST['ngaytra'];
        //$sotien = $_POST['sotien'];
        $slht =  $_POST['soluong'];
        $ten = $_POST['tensach'];
        

        $sql11 = "SELECT soluong FROM sach WHERE tensach = '$ten'  ";
        $resultxy = mysqli_query($db,$sql11);
        $testx = mysqli_fetch_row ( $resultxy);
        $sl = $testx[0];

        
        $sql1 = "SELECT tienmuon FROM sach WHERE tensach = '$ten'  ";
        $resultx = mysqli_query($db,$sql1);
        $test = mysqli_fetch_row ( $resultx);
        $sotien = $test[0];

        //kết nối đến CSDL

        // Dùng isset để kiểm tra Form -> cái này tìm hiểu sau
        if ($madg == ""  || $ngaym == "" || $ngayt == "" || $sotien == ""  || $ten == "") {                                                  
            echo '<script language="javascript">alert("Vui Lòng Nhập Đầy Đủ Thông Tin!"); </script>';
            header("Refresh:0");
        } 
        else if ( !is_numeric($sotien) )
        {
            echo '<script language="javascript">alert("Vui Lòng Nhập Đúng Trường Dữ Liệu!"); </script>';
            header("Refresh:0");

        }
        else if ($slht > $sl)
        {
            header("Refresh:0");
            echo '<script language="javascript">alert("Số lượng sách vượt quá cho phép,vui lòng chọn sách khác!"); </script>';
           
        }
        else if (strtotime($ngaym) > strtotime($ngayt))
        {
            header("Refresh:0");
            echo '<script language="javascript">alert("Vui lòng nhập ngày hợp lệ!"); </script>';

        }
        else {
            echo "bạn đã nhập đầy đủ thông tin";
            //thực hiện việc lưu trữ dữ liệu vào db
            // Kiểm tra username hoặc email có bị trùng hay không
            $sqltt = "SELECT * FROM phieumuon WHERE madocgia = '$madg'  AND ngaymuon = '$ngaym' AND ngaytra = '$ngayt' AND tien = '$sotien'";

            //thực thi câu truy vấn
            $check = mysqli_query($db, $sqltt);


            // Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
                $slcl = $sl - $slht;
                $sql11 = "UPDATE `sach` SET  soluong ='$slcl' WHERE tensach = '$ten'";
                $result11 = mysqli_query($db,$sql11);

                $money = $sotien*$slht;
                $insert_id = $db->insert_id; //su dung id cua database auto increment
                $sql =  "INSERT INTO `phieumuon` VALUES ('$insert_id','$madg','$ngaym','$ngayt','$money','$ten','$slht')";
                $result = mysqli_query(
                    $db,
                    $sql
                );
               
                echo '<script language="javascript">alert("Thêm thành công!"); window.location="qlpmt.php";</script>';
                
        }
    }



    ?>




    <!------------------------------------------------------->

    <div id="footer">
        <div class="ft">
            <span>
                Nhóm: 5 <br>
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