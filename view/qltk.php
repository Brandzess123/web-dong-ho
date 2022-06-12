<?php
session_start();

if (isset($_SESSION['user_type'])) {
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
        <?php
        //khởi chạy phiên từ trang xử lý đăng nhập
        //$matk = $_SESSION['matk'];
        //echo $matk;
        include 'connect.php';


        $result = mysqli_query($db, "SELECT * FROM `taikhoan`");
        $product = mysqli_fetch_assoc($result);
        ?>

        <?php

        $search = isset($_GET['name']) ? $_GET['name'] : "";
        if ($search) {
            $where = "WHERE `name` LIKE '%" . $search . "%'";
        }

        if ($search) {
            $products = mysqli_query($db, "SELECT * FROM `taikhoan` WHERE `name` LIKE '%" . $search . "%' ORDER BY `matk` ");
            // $totalRecords = mysqli_query($db, "SELECT * FROM `docgia` WHERE `hotendg` LIKE '%" . $search . "%'");
        } else {
            $products = mysqli_query($db, "SELECT * FROM `taikhoan` ORDER BY `matk` ");
            //$totalRecords = mysqli_query($db, "SELECT * FROM `docgia`");
        }
        ?>




        <?php
        if (isset($_GET['action'])) {

            switch ($_GET['action']) {  //BÊN NÀY NÓ NHẬN ACTION


                case "delete":    //TRƯỜNG HỢP NÓ NHẬN CASE DELETE

                    if (isset($_GET['id'])) {              //

                        $delete = mysqli_query($db, "DELETE FROM `taikhoan` WHERE `matk` = " . $_GET['id']); //xóa sản phẩm 
                    }
                    header('Location: ./qltk.php'); //reset lại trang
                    break;
            }
        }

        ?>
        <!-------------------------------------------------------------->
        <div id="content">
            <div class="text">
                <h2>QUẢN LÝ TÀI KHOẢN</h2>



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

            <!---------------------------------PHÂN QUYỀN SỬA XÓA ---------------------------------------->
            <?php
            $sql = "SELECT * FROM userprivilege WHERE matk = $matk  AND maquyen = 1";
            $resultp = mysqli_query($db, $sql);
            $roww = mysqli_fetch_row($resultp);
            //echo $roww[0];
            //echo $roww[1];
            //echo $roww[2];
            ?>
            <!--------------------------------------------------------------------------------------------->


            <div class="product">
                <form id="cart-form" action="" method="POST">
                    <div class="giohang">
                        <table>
                            <tr style="font-weight: bold">

                                <td>MÃ TÀI KHOẢN</td>
                                <td>HỌ TÊN</td>
                                <td>EMAIL</td>

                                <td>MẬT KHẨU</td>
                                <td>LOẠI NGƯỜI DÙNG</td>
                                <?php
                                if ($roww[5] == "true") {
                                ?>
                                    <td>XÓA</td>
                                <?php
                                }
                                ?>
                                <td>PHÂN QUYỀN</td>
                                <?php
                                if ($roww[6] == "true") {
                                ?>
                                    <td>SỬA</td>
                                <?php } ?>
                            </tr>

                            <?php

                            //$resultw = mysqli_query($db,  "SELECT * FROM `taikhoan`");

                            while ($row = mysqli_fetch_array($products)) {

                            ?>

                                <tr>
                                    <td><?php echo $row["matk"] ?></td>
                                    <td><?php echo $row["name"] ?></td>
                                    <td><?php echo $row["email"] ?></td>
                                    <td><?php echo $row["password"] ?></td>
                                    <td><?php echo $row["user_type"] ?></td>
                                    <?php
                                    if ($roww[5] == "true") {
                                    ?>
                                        <td><a href="qltk.php?action=delete&id=<?= $row['matk'] ?>">Xóa</a></td>
                                    <?php
                                    }
                                    ?>

                                    <form method="GET">
                                        <td><a href="qktkPhanQuyen.php?id=<?= $row['matk'] ?>">Phân Quyền</a></td>
                                    </form>

                                    <?php
                                    if ($roww[6] == "true") {
                                    ?>
                                        <td><a href="suatkController.php?id=<?= $row['matk'] ?>">Sửa</a></td>
                                    <?php
                                    }
                                    ?>
                                </tr>

                            <?php
                            }
                            ?>

                        </table>
                    </div>
                </form>

                <!-------------------------------------------------------------------------->
                <?php
                //if (isset($_GET['id']))
                //    {
                //$id = $_GET['id'];
                //   $_SESSION['maid'] = $id;

                // header('Location: qltkPhanQuyen.php');
                //   }
                //  
                ?>

                <!-------------------------------------------------------------------------->

                <?php
                if ($roww[4] =="true" )
                {
                ?>
                <div class="btn">
                    <a href="themtkController.php">thêm mới</a>
                    <!--chỗ này-->
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
} else
    echo '<script language="javascript">alert("Vui Lòng Đăng Nhập!"); window.location="dangnhap.php";</script>';
?>