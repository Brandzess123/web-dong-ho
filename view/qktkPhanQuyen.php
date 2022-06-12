<?php
session_start();

//if (isset($_SESSION['matk'])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="css/qltkpq.css" rel="stylesheet">
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
                        //include 'connect.php';
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
        $matk = $_GET['id'];
        $matks = $matk;

        $sqltest = mysqli_query($db, "SELECT name FROM `taikhoan` WHERE matk = '$matk' ");
        $nameuser = mysqli_fetch_row ( $sqltest );
        //$name = $_SESSION['name'];
        //echo "mã tk là: ".$matks;
        if (!isset($matk)) {
            echo '<script language="javascript">alert("Vui lòng đăng nhập!"); window.location="dangnhap.php";</script>';
        }
        //echo $matk." là: ";
        //echo $matk;
        include 'connect.php';


        $result = mysqli_query($db, "SELECT * FROM `quyentruycap`"); //chạy bảng quyền truy cập


        ?>





        <!--http://hocweb123.com/nhan-du-lieu-tu-checkbox-trong-php.html-->

        <!-------------------------------------------------------------->
        <div id="content">
            <div class="text">
                <h2>PHÂN QUYỀN TÀI KHOẢN : <?php echo $nameuser[0] ?> </h2>
            </div>

            <div class="product"  >
               
                <form action="" id="checkform" method="POST">
                    <div class="giohang">
                        <table>
                            <tr style="font-weight: bold">

                                <td></td>
                                <td>CHO PHÉP</td>
                                <td>SỬA </td>
                                <td>THÊM </td>
                                <td>XÓA</td>

                                <!--id sẽ tăng dần-> tư tưởng tạo mảng checkbox rồi sử dụng -->
                            </tr>

                            <?php
                            $bchop = 1;
                            $bthem = 11;
                            $bsua = 21;
                            $bxoa = 31;


                            while ($row = mysqli_fetch_array($result)) {
                          



                            ?>
                                <tr>
                                    <td><?php echo $row["web"] ?></td>
                                    <td><input type="checkbox" value="<?php echo $row["maquyen"] ?>" id="<?php echo $bchop ?>"  name="chophep[]" <?php if (isset($_POST['chophep'])) { if (in_array(($row["maquyen"] ), $_POST['chophep'])) {echo "checked='checked' "; } } ?> size="10"></td>
                                    <td><input type="checkbox" value="<?php echo $row["maquyen"]  ?>" id="<?php echo $bsua ?>"  name="sua[]" <?php if (isset($_POST['sua'])) { if (in_array(($row["maquyen"] ), $_POST['sua'])) {echo "checked='checked' "; } } ?> size="10"></td>
                                    <td><input type="checkbox" value="<?php echo $row["maquyen"] ?>" id="<?php echo $bthem?>"  name="them[]" <?php if (isset($_POST['them'])) { if (in_array(($row["maquyen"] ), $_POST['them'])) {echo "checked='checked' "; } } ?> size="10"></td>
                                    <td><input type="checkbox" value="<?php echo $row["maquyen"] ?>" id="<?php echo $bxoa ?>"  name="xoa[]" <?php if (isset($_POST['xoa'])) { if (in_array(($row["maquyen"] ), $_POST['xoa'])) {echo "checked='checked' "; } } ?> size="10"></td>
                                  <!---tạo mảng checkbox với id dùng từ bảng quyentruycap -->
                                                                 

                                </tr>
                            <?php
                                //   }
                                $bchop++;
                                $bthem++;
                                $bsua++;
                                $bxoa++;

                                //echo $bchop."cho phép: ";
                                //echo $bthem."thêm: ";
                                //echo $bxoa."xóa: ";
                                //echo $bsua."sửa: ";



                            }
                            ?>



                        </table>

                    </div>

                    <div class="btn">
                        <button  type="submit" name="sbt" value="Submit">Phân Quyền</button>
                        <!--chỗ này onclick="myfunction()"-->
                    </div>


                </form>

            </div>
        </div>
        <!-------------------------------------------------------------------------------->


                 
        <script>
            /*
            function myfunction() {
                <?php
                {

               // $resultuser = mysqli_query($db, "SELECT * FROM `userprivilege` WHERE matk = $matk ");

               // while ($user = mysqli_fetch_array($resultuser)) {

                  //  echo "matk la: " . $user['maquyen'];
                    //if ($user['chophep'] == "true")
                    //   {
                    //   echo "giá trị là".$user["maquyen"];
                ?>
                    //   var x = "<// echo $user["maquyen"]; ?>"; //nhớ thêm ngoặc
                    // var y = "<o $matk; ?>";
                    //   alert("ddawng minhhs hswiwhaef");
                    // document.getElementById(x).checked = true;

                <?php
                    // }
                }
                ?>
            }
        </script>





        <!------------------------------CHO PHEP  ------------------------------------------>
        <?php
        if (isset($_POST["sbt"]))  //khi bấm vào submit là chạy
        {
            $matk = $_GET['id'];
            $matks = $matk;

            $array = array(
                1 => array(
                    'name' => 1,
                    'bool' =>  "true"
                ),
                2 => array(
                    'name' => 2,
                    'bool' =>  "true"
                ),
                3 => array(
                    'name' => 3,
                    'bool' =>  "true"
                ),
                4 => array(
                    'name' => 4,
                    'bool' =>  "true"
                ),
                5 => array(
                    'name' => 5,
                    'bool' => "true"
                ),
                 6 => array(
                  'name' => 6,
                'bool' => "true"
                )
            );

            // foreach($myArray as $key=>$value)

            /*$phims = array(0 => "One Piece",
                    1 => "Dragon Ball",
                    2 => "Doremon",
                    3 => "One-Punch Man",
                    4 => "Naruto" );
                    cho $phims[4];
                    */

            $insert_id = $db->insert_id; //su dung id cua database auto increment

            if (isset($_POST['chophep']))
            {
                foreach ($_POST['chophep'] as $value) {
                     //echo $value;

                   // echo '<script type="text/javascript">check(1);</scripdocument.getElementById>';

                    $sql2 = "SELECT * FROM `userprivilege` WHERE  maquyen = '$value' AND matk= '$matks' ";
                    $check2 = mysqli_query($db, $sql2);

                    // Nếu kết quả trả về lớn hơn 1 thì nghĩa là đã từng được phân quyền
                    if (mysqli_num_rows($check2) > 0) {
                        //echo "hàm if ở thêm" .$value;

                        $lenh = "UPDATE `userprivilege` SET `chophep` = 'true' WHERE maquyen = '$value' AND matk= '$matks';";
                        $test = mysqli_query($db, $lenh);
                    } else {
                        // echo "chạy vòng else";
                        //$insert_check = $db->insert_check; //su dung id cua database auto increment
                        $them =  "INSERT INTO `userprivilege`(`iduser`, `matk`, `maquyen`, `chophep`, `them`, `xoa`, `sua`)
                                VALUES ('$insert_id','$matks','$value','true','','','')";
                        $themkq = mysqli_query($db, $them);
                    }

                    foreach ($array as $item) {
                        if ($item['name'] == $value) {
                            //echo "kêt quả bằng";
                            //echo " bằng:  ".$item['name'].'<br>';

                            $item['bool'] = "false";
                            $array[$item['name']]['bool'] = "false";
                            //echo "giá trị".$item['name']."-".$item['bool']."<br>";
                        }
                        //$item['name'];
                        //$item['bool'];
                    }
                }
            }



                /*-----------------------trường hợp sai --------------------------------*/
                foreach ($array as $item) 
                {
                    //echo "giá trị".$item['name']."-".$item['bool']."<br>";
                    
                    if ($item['bool'] == "true") {
                        $check = $item['name'];
                        //echo " " . $check;


                        //$check = $item['name'];

                        //$check = $item2['name'];
                        $sql = "SELECT * FROM `userprivilege` WHERE  maquyen = '$check'  AND matk= '$matks' ";

                        $checking = mysqli_query($db, $sql);
                        // Nếu kết quả trả về lớn hơn 1 thì nghĩa là đã từng được phân quyền

                        if (mysqli_num_rows($checking) > 0) {
                         //   echo "hàm if ở thêm";

                            $lenh = "UPDATE `userprivilege` SET `chophep` = 'false' WHERE maquyen = '$check'  AND matk= '$matks'";
                            $test = mysqli_query($db, $lenh);
                        } else {
                         //   echo "chạy vòng else";
                            //$insert = $db->insert; //su dung id cua database auto increment
                            $sql =  "INSERT INTO `userprivilege`(`iduser`, `matk`, `maquyen`, `chophep`, `them`, `xoa`, `sua`)
                                VALUES ('$insert_id','$matks','$check','false','','','')";
                            $result2 = mysqli_query($db, $sql);
                        }
                    }
                    
                
                }



            /*---------------------------------------------------------*/






            //echo "giá trị của thêm";


            /*------------------------------------THÊM------------------------------------------*/
            $array3 = array(
                1 => array(
                    'name' => 1,
                    'bool' =>  "true"
                ),
                2 => array(
                    'name' => 2,
                    'bool' =>  "true"
                ),
                3 => array(
                    'name' => 3,
                    'bool' =>  "true"
                ),
                4 => array(
                    'name' => 4,
                    'bool' =>  "true"
                ),
                5 => array(
                    'name' => 5,
                    'bool' => "true"
                ),
                6 => array(
                 'name' => 6,
                'bool' => "true"
                )
            );


            if (isset($_POST['them'])) 
            {

                $matk = $_GET['id'];
                $matks = $matk;

                foreach ($_POST['them'] as $value) 
                {

                    $sql2 = "SELECT * FROM `userprivilege` WHERE  maquyen = '$value' AND matk= '$matks' ";
                    $check2 = mysqli_query($db, $sql2);

                    // Nếu kết quả trả về lớn hơn 1 thì nghĩa là đã từng được phân quyền
                    if (mysqli_num_rows($check2) > 0) {
                        // echo "hàm if ở thêm";

                        $lenh = "UPDATE `userprivilege` SET `them` = 'true' WHERE maquyen = '$value' AND matk= '$matks';";
                        $test = mysqli_query($db, $lenh);
                    } else {
                        // echo "chạy vòng else";
                        //$insert_check = $db->insert_check; //su dung id cua database auto increment
                        $them =  "INSERT INTO `userprivilege`(`iduser`, `matk`, `maquyen`, `chophep`, `them`, `xoa`, `sua`)
                                VALUES ('$insert_id','$matks','$value','','true','','')";
                        $themkq = mysqli_query($db, $them);
                    }


                    foreach ($array3 as $item) {
                        if ($item['name'] == $value) { //mang1 = mang2 -> gan false
                            //echo "kêt quả bằng";
                            //echo " bằng:  ".$item['name'].'<br>';

                            $item['bool'] = "false";
                            $array3[$item['name']]['bool'] = "false";
                            //echo "giá trị".$item['bool'];
                        }
                        //$item['name'];
                        //$item['bool'];
                    }
                }
            }

                /*-----------------------trường hợp sai --------------------------------*/
                foreach ($array3 as $item) 
                {

                    if ($item['bool'] == "true") {
                        $check2 = $item['name'];
                        //echo " " . $check;


                        //$check = $item['name'];

                        //$check = $item2['name'];
                        $sql = "SELECT * FROM `userprivilege` WHERE  maquyen = '$check2'  AND matk= '$matks' ";

                        $checking = mysqli_query($db, $sql);
                        // Nếu kết quả trả về lớn hơn 1 thì nghĩa là đã từng được phân quyền

                        if (mysqli_num_rows($checking) > 0) {
                          //  echo "hàm if ở thêm";

                            $lenh = "UPDATE `userprivilege` SET `them` = 'false' WHERE maquyen = '$check2'  AND matk= '$matks'";
                            $test = mysqli_query($db, $lenh);
                        } 
                        else {
                          //  echo "chạy vòng else";
                            //$insert = $db->insert; //su dung id cua database auto increment
                            $sql =  "INSERT INTO `userprivilege`(`iduser`, `matk`, `maquyen`, `chophep`, `them`, `xoa`, `sua`)
                                      VALUES ('$insert_id','$matks','$check2','','false','','')";
                            $result2 = mysqli_query($db, $sql);
                        }
                    }
                }
            


            /*--------------------------------------XOA -----------------------------------*/
           // echo "giá trị của xóa";
           $array2 = array(
            1 => array(
                'name' => 1,
                'bool' =>  "true"
            ),
            2 => array(
                'name' => 2,
                'bool' =>  "true"
            ),
            3 => array(
                'name' => 3,
                'bool' =>  "true"
            ),
            4 => array(
                'name' => 4,
                'bool' =>  "true"
            ),
            5 => array(
                'name' => 5,
                'bool' => "true"
            ),
            6 => array(
             'name' => 6,
             'bool' => "true"
            )
        );

            if (isset($_POST['xoa'])) {

                $matk = $_GET['id'];
                $matks = $matk;

                foreach ($_POST['xoa'] as $value) {

                    $sql3 = "SELECT * FROM `userprivilege` WHERE  maquyen = '$value' AND matk= '$matks' ";
                    $check3 = mysqli_query($db, $sql3);

                    // Nếu kết quả trả về lớn hơn 1 thì nghĩa là đã từng được phân quyền
                    if (mysqli_num_rows($check3) > 0) {

                        $lenhxoa = "UPDATE `userprivilege` SET `xoa` = 'true' WHERE maquyen = '$value' AND matk= '$matks';";
                        $testxoa = mysqli_query($db, $lenhxoa);
                    } else {
                        echo "chạy vòng else";
                        //su dung id cua database auto increment
                        $insert_xoa = $db->insert_xoa;
                        $xoa =  "INSERT INTO `userprivilege`(`iduser`, `matk`, `maquyen`, `chophep`, `them`, `xoa`, `sua`)
                                 VALUES ('$insert_id','$matks','$value','','','true','')";
                        $xoakq = mysqli_query($db, $xoa);
                    }

                    foreach ($array2 as $item) {
                        if ($item['name'] == $value) {
                            //echo "kêt quả bằng";
                            //echo " bằng:  ".$item['name'].'<br>';

                            $item['bool'] = "false";
                            $array2[$item['name']]['bool'] = "false";
                            //echo "giá trị".$item['bool'];
                        }
                        //$item['name'];
                        //$item['bool'];
                    }
                }
            }
                /*---------------------------------------------------------*/
                foreach ($array2 as $item) {

                    if ($item['bool'] == "true") {
                        $check = $item['name'];
                       // echo " " . $check;


                        //$check = $item['name'];

                        //$check = $item2['name'];
                        $sql = "SELECT * FROM `userprivilege` WHERE  maquyen = '$check'  AND matk= '$matks' ";

                        $checking = mysqli_query($db, $sql);
                        // Nếu kết quả trả về lớn hơn 1 thì nghĩa là đã từng được phân quyền

                        if (mysqli_num_rows($checking) > 0) {
                            //echo "hàm if ở thêm";

                            $lenh = "UPDATE `userprivilege` SET `xoa` = 'false' WHERE maquyen = '$check'  AND matk= '$matks'";
                            $test = mysqli_query($db, $lenh);
                        } else {
                           // echo "chạy vòng else";
                            //$insert = $db->insert; //su dung id cua database auto increment
                            $sql =  "INSERT INTO `userprivilege`(`iduser`, `matk`, `maquyen`, `chophep`, `them`, `xoa`, `sua`)
                                      VALUES ('$insert_id','$matks','$check','','','false','')";
                            $result2 = mysqli_query($db, $sql);
                        }
                    }
                }
           


            /*--------------------------------------------SUA --------------------------------------------------*/
            $array1 = array(
                1 => array(
                    'name' => 1,
                    'bool' =>  "true"
                ),
                2 => array(
                    'name' => 2,
                    'bool' =>  "true"
                ),
                3 => array(
                    'name' => 3,
                    'bool' =>  "true"
                ),
                4 => array(
                    'name' => 4,
                    'bool' =>  "true"
                ),
                5 => array(
                    'name' => 5,
                    'bool' => "true"
                ),
                6 => array(
                'name' => 6,
                 'bool' => "true"
                )
            );

            
            //echo "giá trị của sửa";
            if (isset($_POST['sua'])) {

                $matk = $_GET['id'];
                $matks = $matk;

               

                foreach ($_POST['sua'] as $value) {

                    $sql4 = "SELECT * FROM `userprivilege` WHERE  maquyen = '$value' AND matk= '$matks' ";
                    $check4 = mysqli_query($db, $sql4);

                    // Nếu kết quả trả về lớn hơn 1 thì nghĩa là đã từng được phân quyền
                    if (mysqli_num_rows($check4) > 0) {
                        $lenhsua = "UPDATE `userprivilege` SET `sua` = 'true' WHERE maquyen = '$value' AND matk= '$matks';";
                        $testsua = mysqli_query($db, $lenhsua);
                    } else {

                        //$insert_sua = $db -> insert_sua; //su dung id cua database auto increment
                        $sua =  "INSERT INTO `userprivilege`(`iduser`, `matk`, `maquyen`, `chophep`, `them`, `xoa`, `sua`)
                                VALUES ('$insert_id','$matks','$value','','','','true')";
                        $suakq = mysqli_query($db, $sua);
                    }

                    foreach ($array1 as $item) {
                        if ($item['name'] == $value) {
                            //echo "kêt quả bằng";
                            //echo " bằng:  ".$item['name'].'<br>';

                            $item['bool'] = "false";
                            $array1[$item['name']]['bool'] = "false";
                            //echo "giá trị".$item['bool'];
                        }
                        //$item['name'];
                        //$item['bool'];
                    }
                }
            }
                /*---------------------------------------------------------*/
                foreach ($array1 as $item) {

                    if ($item['bool'] == "true") {
                        $check = $item['name'];
                        //echo " " . $check;


                        //$check = $item['name'];

                        //$check = $item2['name'];
                        $sql = "SELECT * FROM `userprivilege` WHERE  maquyen = '$check'  AND matk= '$matks' ";

                        $checking = mysqli_query($db, $sql);
                        // Nếu kết quả trả về lớn hơn 1 thì nghĩa là đã từng được phân quyền

                        if (mysqli_num_rows($checking) > 0) {
                         //   echo "hàm if ở thêm";

                            $lenh = "UPDATE `userprivilege` SET `sua` = 'false' WHERE maquyen = '$check'  AND matk= '$matks'";
                            $test = mysqli_query($db, $lenh);
                        } else {
                         //   echo "chạy vòng else";
                            //$insert = $db->insert; //su dung id cua database auto increment
                            $sql =  "INSERT INTO `userprivilege`(`iduser`, `matk`, `maquyen`, `chophep`, `them`, `xoa`, `sua`)
                                      VALUES ('$insert_id','$matks','$check','','','','false')";
                            $result2 = mysqli_query($db, $sql);

                           
                                //$insert_id2 = $db->insert_id2; 
                           
                            
                        }
                    }
                }
            


            echo "phân quyền thành công";
            
}



        ?>

        <!-------------------------------------------------------------------------->

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
//} else
  // echo '<script language="javascript">alert("Vui Lòng Đăng Nhập!"); window.location="dangnhap.php";</>';
?>