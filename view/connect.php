<?php
 $db = mysqli_connect("localhost", "root", "wertyui01", "qltv",3307)  or die('Lỗi kết nối');
 mysqli_query($db, "SET NAMES 'UTF8'");

 if (mysqli_connect_errno()) {
     echo "Connection Fail: " . mysqli_connect_errno();
     exit;
 }

?>