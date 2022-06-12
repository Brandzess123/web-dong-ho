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
    <link href="css/ql.css" rel="stylesheet">
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
     <!---------------------------------PHÂN QUYỀN SỬA XÓA ---------------------------------------->
     <?php
        $sql = "SELECT * FROM userprivilege WHERE matk = $matk  AND maquyen = 4";
        $resultp = mysqli_query($db, $sql);
        $roww = mysqli_fetch_row($resultp);
        //echo $roww[4];
        //echo $roww[5];
        //echo $roww[6];
        //echo $roww[] ;  //3 - là cho phép  4 là thêm - 5 là xoa - 6 là sua
        ?>
        <!--------------------------------------------------------------------------------------------->
    <?php
  
    include 'connect.php';


    $result = mysqli_query($db, "SELECT * FROM `phieumuon`");
    $product = mysqli_fetch_assoc($result);
    ?>

    <?php

    $search = isset($_GET['name']) ? $_GET['name'] : "";
    if ($search) {
        $where = "WHERE `name` LIKE '%" . $search . "%'";
    }

    if ($search) {
        $products = mysqli_query($db, "SELECT * FROM `phieumuon` WHERE `mamt` LIKE '%" . $search . "%' ORDER BY `mamt` ");
        // $totalRecords = mysqli_query($db, "SELECT * FROM `docgia` WHERE `hotendg` LIKE '%" . $search . "%'");
    } else {
        $products = mysqli_query($db, "SELECT * FROM `phieumuon` ORDER BY `mamt` ");
        //$totalRecords = mysqli_query($db, "SELECT * FROM `docgia`");
    }
    ?>




    <?php
    if (isset($_GET['action'])) {

        switch ($_GET['action']) {  //BÊN NÀY NÓ NHẬN ACTION


            case "delete":    //TRƯỜNG HỢP NÓ NHẬN CASE DELETE

               
                $sql11 = "SELECT tensach,soluong FROM `phieumuon`  WHERE `mamt` = " . $_GET['id'];
                $resultxy = mysqli_query($db,$sql11);
                $testx = mysqli_fetch_row ( $resultxy);
                $ten = $testx[0];
                $sls = $testx[1];
               
                
                $sql11 = "UPDATE `sach` SET  soluong = soluong + '$sls' WHERE tensach = '$ten' ";
                $result11 = mysqli_query($db,$sql11);

                
                if (isset($_GET['id'])) {              //

                    $delete = mysqli_query($db, "DELETE FROM `phieumuon` WHERE `mamt` = " . $_GET['id']); //xóa sản phẩm 
                }
                header('Location: ./qlpmt.php'); //reset lại trang
                
                break;

        }
    }

    ?>
    <!-------------------------------------------------------------->
    <div id="content">
        <div class="text">
            <h2>QUẢN LÝ PHIẾU MƯỢN TRẢ</h2>



        </div>

        <div class="timkiem">
            <form method="GET" role="form" name="timkiem">
                <table>
                    <tr>
                        <td><input type="text" value="<?= isset($_GET['name']) ? $_GET['name'] : "" ?>" name="name" /></td>
                        <td><input type="submit" value="Tìm kiếm" /></td>
                    </tr>
                </table>
            </form>
        </div>

        <div class="product">
            <form id="cart-form" action="qlpmt.php?action=submit" method="POST">
                <div class="giohang">
                    <table>
                        <tr style="font-weight: bold">

                            <td>MÃ MƯỢN TRẢ</td>
                            <td>MÃ ĐỘC GIẢ</td>
                            
                            <td>NGÀY MƯỢN</td>
                            <td>NGÀY TRẢ</td>
                            <td>TIỀN</td>
                            <td>TÊN SÁCH</td>
                            <td>SỐ LƯỢNG</td>
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


                        while ($row = mysqli_fetch_array($products)) {

                        ?>

                            <tr>
                                <td><?php echo $row["mamt"] ?></td>
                                <td><?php echo $row["madocgia"] ?></td>
                               
                                <td><?php echo $row["ngaymuon"] ?></td>
                                <td><?php echo $row["ngaytra"] ?></td>
                                <td><?php echo $row["tien"] ?></td>
                                <td><?php echo $row["tensach"] ?></td>
                                <td><?php echo $row["soluong"] ?></td>


                                <?php
                                       if ($roww[5] == "true") {
                                ?>
                                <td><a href="qlpmt.php?action=delete&id=<?= $row['mamt'] ?>">Xóa</a></td>
                                <?php
                                }
                                if ($roww[6] == "true") {
                                ?>
                                <td><a href="suapmtController.php?action=delete&id=<?= $row['mamt'] ?>">Sửa</a></td>
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
               <a href="thempmtController.php" >thêm mới</a> <!--chỗ này-->
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