<?php
session_start();

//$_SESSION['matk'] = "test";

//lấy dữ liệu từ form gọi lên
if (isset($_SESSION['matk'])) {
    echo '<script language="javascript">alert("Vui Lòng Đăng Xuất!"); window.location="dangnhap.php";</script>';
} 

else {
    $u = $_POST['taikhoan'];
    $p = $_POST['matkhau'];

    //kết nối đến CSDL
    include 'connect.php';
    $pass = md5($p);

    //truy vấn dữ liệu - tìm username và password có nhận được từ dữ liệu ko ?
    $sql = "SELECT * FROM `taikhoan` WHERE `email` = '$u' AND `password` = '$pass'";

    //thực thi truy vấn
    $rs = mysqli_query($db, $sql);

    if (
        $u == "" || $p == ""
    ) {
        echo '<script language="javascript">alert("Vui Lòng Nhập Đầy Đủ Thông Tin!"); window.location="dangnhap.php";</script>';
    }





    if (mysqli_num_rows($rs) > 0) {

        //-------------------------LƯU TÀI KHOẢN VÀ MẬT KHẨU VÀO SESSION (PHIÊN - BỘ NHỚ TẠM) --------------------------//
        //bắt đầu phiên
        while ($row = mysqli_fetch_array($rs)) {
            $_SESSION['matk'] = $row['matk'];
            $_SESSION['user_type'] = $row['user_type'];
            $_SESSION['name'] = $row['name'];
        }
        echo '<script language="javascript">alert("Đăng Nhập thành công!" ); window.location="dangnhap.php";</script>';
    } else {
        echo '<script language="javascript">alert("Tài khoản hoặc mật khẩu không đúng!"); window.location="dangnhap.php";</script>';
    }
}
