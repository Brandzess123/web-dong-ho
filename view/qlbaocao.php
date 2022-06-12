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
    <title>Document</title>
    <link href="css/qltest.css" rel="stylesheet">
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
                 <li><a href="dangnhap.php">Tài Khoản</a></li>

                </ul>
            </div>
        </div>

    </div>
    <!------------------------------------------------------->
    <?php
    //khởi chạy phiên từ trang xử lý đăng nhập
    //$matk = $_SESSION['matk'];
    //echo $matk;
    include 'connect.php';


    $result = mysqli_query($db, "SELECT * FROM `baocao`");
    $product = mysqli_fetch_assoc($result);
    ?>

    <?php

    $search = isset($_GET['name']) ? $_GET['name'] : "";
    if ($search) {
        $where = "WHERE `name` LIKE '%" . $search . "%'";
    }

    if ($search) {
        $products = mysqli_query($db, "SELECT * FROM `baocao` WHERE `mabaocao` LIKE '%" . $search . "%' ORDER BY `mabaocao` ");
        // $totalRecords = mysqli_query($db, "SELECT * FROM `docgia` WHERE `hotendg` LIKE '%" . $search . "%'");
    } else {
        $products = mysqli_query($db, "SELECT * FROM `baocao` ORDER BY `mabaocao` ");
        //$totalRecords = mysqli_query($db, "SELECT * FROM `docgia`");
    }
    ?>




    <?php
    if (isset($_GET['action'])) {

        switch ($_GET['action']) {  //BÊN NÀY NÓ NHẬN ACTION


            case "delete":    //TRƯỜNG HỢP NÓ NHẬN CASE DELETE

                if (isset($_GET['id'])) {              //

                    $delete = mysqli_query($db, "DELETE FROM `baocao` WHERE `mabaocao` = " . $_GET['id']); //xóa sản phẩm 
                }
                header('Location: ./qlbaocao.php'); //reset lại trang
                break;
        }
    }

    ?>
    <!-------------------------------------------------------------->
     <!---------------------------------PHÂN QUYỀN SỬA XÓA ---------------------------------------->
     <?php
        $sql = "SELECT * FROM userprivilege WHERE matk = $matk  AND maquyen = 2";
        $resultp = mysqli_query($db, $sql);
        $roww = mysqli_fetch_row($resultp);
        //echo $roww[4];
        //echo $roww[5];
        //echo $roww[6];
        //echo $roww[] ;  //3 - là cho phép  4 là thêm - 5 là xoa - 6 là sua
        ?>
        <!--------------------------------------------------------------------------------------------->

    <div id="content">
        <div class="text">
            <h2>QUẢN LÝ BÁO CÁO</h2>



        </div>

        <div class="timkiem">
            <form  method="GET"  role="form" name="timkiem">
            
                <input type="text" value="<?= isset($_GET['name']) ? $_GET['name'] : "" ?>" name="name" />
                <button type="submit" value="Tìm kiếm" >Tìm kiếm</button>
             
            </form>
        </div>


        <div class="product">
            <form id="cart-form" action="qlbaocao.php?action=submit" method="POST">
                <div class="giohang">
                    <table>
                        <tr style="font-weight: bold">

                            <td>MÃ BÁO CÁO</td>
                            <td>LỢI NHUẬN</td>
                            <td>NGÀY LẬP</td>
                            <td>MÃ NHÂN VIÊN</td>
                            <?php
                                if ($roww[5] == "true") {
                            ?>
                                <td>XÓA</td>
                            <?php
                             }
                             if ($roww[6] == "true") {
                             ?>
                                <td>SỬA</td>
                            <?php } ?>

                        </tr>

                        <?php
                        //$resultw = mysqli_query($db,  "SELECT * FROM `baocao`");

                        while ($row = mysqli_fetch_array($products)) {

                        ?>

                            <tr>
                                <td><?php echo $row["mabaocao"] ?></td>
                                <td><?php echo $row["loinhuan"] ?></td>
                                <td><?php echo $row["ngaylap"] ?></td>
                                <td><?php echo $row["manv"] ?></td>

                                <?php
                                       if ($roww[5] == "true") {
                                ?>
                                <td><a href="qlbaocao.php?action=delete&id=<?= $row['mabaocao'] ?>">Xóa</a></td>
                                <?php
                                }
                                if ($roww[6] == "true") {
                                ?>
                                <td><a href="suabaocaoController.php?action=delete&id=<?= $row['mabaocao'] ?>">Sửa</a></td>
                                <?php }?>


                            </tr>

                        <?php
                        }
                        ?>

                        

                    </table>
                </div>
            </form>

            <?php
                if ($roww[4] =="true" )
                {
            ?>
            <div class="btn" >
               <a href="thembaocaoController.php" >thêm mới</a> <!--chỗ này-->
            </div>
            <?php } ?>


        </div>
    </div>


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

</html>

<?php
}
else
echo '<script language="javascript">alert("Vui Lòng Đăng Nhập!"); window.location="dangnhap.php";</script>';
?>