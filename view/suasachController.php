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
        $masach = $_GET['id'];

        $result = mysqli_query($db, "SELECT * FROM `sach` WHERE masach = '$masach' ");
        //$nameuser = mysqli_fetch_row ( $sqltest );
        
        if (!isset($masach)) {
            echo '<script language="javascript">alert("Vui lòng đăng nhập!"); window.location="dangnhap.php";</script>';
        }
        
        while ($row = mysqli_fetch_array($result)) {
        
        ?>
    <!------------------------------------------------------->
    <div id="content">
        <h2>sửa sách </h2>

        <div class="formdky">

            <form method="POST" role="form" name="dky">
                <table>

                    <tr>
                        <td>
                            <span> Tên sách </span>
                        </td>
                    </tr>

                    <tr>
                        <td><input type="text" name="tensach" size="20" id="" value="<?php echo $row["tensach"]?>"></td>
                    </tr>

                    <tr>
                        <td>
                            <span>tác giả</span>
                        </td>
                    </tr>

                    <tr>
                        <td><input type="text" name="matg" size="20" id="" value="<?php echo $row["matacgia"]?>"></td>
                    </tr>

                    <tr>
                        <td>
                            <span>thể loại</span>
                        </td>
                    </tr>

                    <tr>
                            <!--<td><input type="text" name="matl" size="20" id=""></td>-->
                            <td><select name="matl" id="sach" style="width:100%;height:40px">
                                    <option value="bài giảng">Bài giảng</option>
                                    <option value="Luận Văn">Luận Văn</option>
                                    <option value="Tài liệu học tập">Tài liệu học tập</option>
                                    <option value="Báo cáo tạp chí">Báo cáo tạp chí</option>
                                    <option value="Khoa học công nghệ – Kinh tế">Khoa học công nghệ – Kinh tế</option>
                                    <option value="Văn hóa xã hội – Lịch sử">Văn hóa xã hội – Lịch sử</option>
                                    <option value="Chính trị – pháp luật">Chính trị – pháp luật</option>
                                    <option value="Truyện-tiểu thuyết">Truyện-tiểu thuyết</option>
                                    <option value="Tâm lý, tâm linh, tôn giáo">Tâm lý, tâm linh, tôn giáo</option>
                                    <option value="Sách thiếu nhi">Sách thiếu nhi</option>
                                    <option value="Ngoại ngữ">Ngoại ngữ</option>
                                    <option value="Thể loại khác">Thể loại khác</option>


                                </select></td>
                        </tr>

                    <tr>
                        <td>
                            <span>nhà xuất bản</span>
                        </td>
                    </tr>

                    <tr>
                        <td><input type="text" name="manxb" size="20" id="" value="<?php echo $row["manxb"]?>"></td>
                    </tr>

                    <tr>
                        <td>
                            <span>Số lượng</span>
                        </td>
                    </tr>

                    <tr>
                        <td><input type="text" name="soluong" size="20" id="" value="<?php echo $row["soluong"]?>"></td>
                    </tr>

                    <tr>
                        <td>
                            <span>Số tiền mượn</span>
                        </td>
                    </tr>

                    <tr>
                        <td><input type="text" name="tienmuon" size="20" id="" value="<?php echo $row["tienmuon"]?>"></td>
                    </tr>

                </table>

                <button class="button2" type="submit" value="Submit" name="sbt">sửa thông tin sách</button>
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

        //$db = mysqli_connect("localhost", "root", "", "qltv")  or die('Lỗi kết nối');
        mysqli_query($db, "SET NAMES 'UTF8'");

        //lấy dữ liệu từ form gọi lên
        $tensach= $_POST['tensach'];  //cái này lấy từ database -> loinhuan .... //cái còn lại là biến $ln
        $matg = $_POST['matg'];
        $matl = $_POST['matl'];
        $manxb = $_POST['manxb'];
        $soluong = $_POST['soluong'];
        $tienmuon = $_POST['tienmuon'];


        //kết nối đến CSDL

        // Dùng isset để kiểm tra Form -> cái này tìm hiểu sau
        if ($tensach == "" || $matg == "" || $matl == "" || $manxb == "" || $soluong == "" ||$tienmuon =="") {                                                  
            echo '<script language="javascript">alert("Vui Lòng Nhập Đầy Đủ Thông Tin!"); </script>';
            header("Refresh:0");
        }
        else if (!is_numeric($soluong) ||!is_numeric($tienmuon)  )
        {
            echo '<script language="javascript">alert("Vui Lòng Nhập Đúng định dạng sách!"); </script>';
            header("Refresh:0");
        } 
        else if (is_numeric($matg) || is_numeric($manxb))
        {
            echo '<script language="javascript">alert("Vui Lòng Nhập Đúng Trường Dữ Liệu!"); </script>';
            header("Refresh:0");

        }
        else {
            echo "bạn đã nhập đầy đủ thông tin";
            //thực hiện việc lưu trữ dữ liệu vào db
            $sql =  "INSERT INTO `sach` VALUES ('$insert_id','$tensach','$matg','$matl','$manxb','$soluong','$tienmuon')";
            $sql =  "UPDATE `sach` SET  tensach = '$tensach', matacgia = '$matg',matheloai = '$matl',manxb = '$manxb',soluong = '$soluong',tienmuon = '$tienmuon'  WHERE masach = '$masach'";
            $result = mysqli_query(
                $db,
                $sql
            );
            echo '<script language="javascript">alert("Thêm thành công!"); window.location="qlsach.php";</script>';
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