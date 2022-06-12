<?php
//session_start();
?>
<?php
include 'connect.php';

if (isset($_SESSION['matk'])) {
    //echo "đoạn này code đã chạy: ";
    $matk =  $_SESSION['matk'];
    //echo $matk;
    //echo "mã là: ".$matk;
    $sql = "SELECT * FROM quyentruycap,userprivilege WHERE userprivilege.matk = $matk  AND userprivilege.maquyen = quyentruycap.maquyen";
    $result2 = mysqli_query($db, $sql);


    //if (isset($_SESSION['user_type'])) {
        while ($row = mysqli_fetch_array($result2)) {
            
            if ($row["chophep"] == "true") {
              //  echo "giá trị".$row["web"]." ";
?>
                <li><a href="<?php echo $row["url"] ?>"><?php echo $row["web"] ?></a></li>
<?php
            }
        }
    //}
}


?>