<?php

    //$db = mysqli_connect("localhost" , "root", "" , "quanlidongho")  or die ('Lỗi kết nối'); 
    include 'connect.php';
    mysqli_query($db,"SET NAMES 'UTF8'");
 
    //lấy dữ liệu từ form gọi lên
    $ht = $_POST['ht'];
    $email = $_POST['email'];
    $mk2 = $_POST['mk2'];
    $mk1 = $_POST['mk1'];
    $usertype = $_POST['usertype'];

    $emailcheck = "@gmail.com";
   
    //kết nối đến CSDL
  

    // Dùng isset để kiểm tra Form -> cái này tìm hiểu sau
    if ( $ht == ""  || $email == "" || $mk2 == "" || $mk1 == ""  || $usertype == "") 
    {
        echo '<script language="javascript">alert("Vui Lòng Nhập Đầy Đủ Thông Tin!"); window.location="themtkController.php";</script>';
    }else if ($mk2 != $mk1 )
    {
        echo '<script language="javascript">alert("Mật khẩu và xác nhận mật khẩu không trùng nhau!"); window.location="themtkController.php";</script>';
    }
    else if (strlen(strstr($email, $emailcheck)) <= 0)
    {
        echo '<script language="javascript">alert("Vui lòng nhập đúng gmail!"); window.location="themtkController.php";</script>';
    }
    else if (is_numeric($ht))
    {
        echo '<script language="javascript">alert("Vui lòng nhập đúng trường dữ liệu"); window.location="themtkController.php";</script>';
    }
    else if (!isset( $_POST['st']))
    {
        echo '<script language="javascript">alert("Chưa xác nhận điều khoản sử dụng!"); window.location="themtkController.php";</script>';
    }
   
     else
    {
    echo "bạn đã nhập đầy đủ thông tin";
    //thực hiện việc lưu trữ dữ liệu vào db
    // Kiểm tra username hoặc email có bị trùng hay không
    $sql = "SELECT * FROM taikhoan WHERE  email = '$email'";

    //thực thi câu truy vấn
    $check = mysqli_query($db, $sql);


    // Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
    if (mysqli_num_rows($check) > 0) {
        echo '<script language="javascript">alert("Tài khoản đã tồn tại!"); window.location="themtkController.php";</script>';

        die();  //dừng chương trình
    } else {

        $insert_id = $db->insert_id;
        $pass = md5($mk2);
      
        $sql =  "INSERT INTO `taikhoan` VALUES ('$insert_id','$ht','$email','$pass','$usertype')";
        $result = mysqli_query($db, $sql);

        $sql2 = "SELECT `matk` FROM `taikhoan` WHERE email = '$email' ";
        $result2 = mysqli_query($db, $sql2);
        $rowtest = mysqli_fetch_row($result2);
        //echo "gia tri".$rowtest[0];


        if ($usertype == "quantri") {
            //$insert_id2 = $db->insert_id2; 
            $sql = "INSERT INTO `userprivilege`(`iduser`, `matk`, `maquyen`, `chophep`, `them`, `xoa`, `sua`)
            VALUES ('$insert_id','$rowtest[0]','1','true','true','true','true')";
            $result = mysqli_query($db, $sql);
        } else if ($usertype == "thuthu") {
            //$insert_id2 = $db->insert_id2; 
            $sql = "INSERT INTO `userprivilege`(`iduser`, `matk`, `maquyen`, `chophep`, `them`, `xoa`, `sua`)
            VALUES ('$insert_id','$rowtest[0]','3','true','true','true','true'), ('$insert_id','$rowtest[0]','6','true','true','true','true')";
            $result = mysqli_query($db, $sql);
        } else if ($usertype == "docgia") {
            //$insert_id2 = $db->insert_id2; 
            $sql = "INSERT INTO `userprivilege`(`iduser`, `matk`, `maquyen`, `chophep`, `them`, `xoa`, `sua`)
            VALUES ('$insert_id','$rowtest[0]','4','true','true','false','false'), ('$insert_id','$rowtest[0]','6','true','false','false','false')";
            $result = mysqli_query($db, $sql);
        } else if ($usertype == "quanli") {
            //$insert_id2 = $db->insert_id2; 
            $sql = "INSERT INTO `userprivilege`(`iduser`, `matk`, `maquyen`, `chophep`, `them`, `xoa`, `sua`)
            VALUES ('$insert_id','$rowtest[0]','2','true','true','true','true'),('$insert_id','$rowtest[0]','3','true','true','true','true'),('$insert_id','$rowtest[0]','4','true','true','true','true')
            ,('$insert_id','$rowtest[0]','5','true','true','true','true'),('$insert_id','$rowtest[0]','6','true','true','true','true')";
            //$result($db,$sql);
            $result = mysqli_query($db, $sql);
        }
        echo '<script language="javascript">alert("Tạo tài khoản thành công!"); window.location="qltk.php";</script>';
    }
}

    

?>
