<?php 
require '../../config.php';
//lấy thông tin từ form
$mhv = $_POST['mhv'];
$ht = $_POST['ho_ten'];
$dob = $_POST['ngay_sinh'];
$cccd = $_POST['cccd'];
$quequan = $_POST['que_quan'];
$hochieu = $_POST['ho_chieu'];

$result = mysqli_query($mysqli, "SELECT * FROM student WHERE mhv = '$mhv'");
// xét học viên đã tồn tại
if(mysqli_num_rows($result) > 0) {
    echo "exists";
    exit;
}
$themsql = "INSERT INTO student (mhv,ho_ten,ngay_sinh,ho_chieu,CCCD,que_quan)
            VALUES ('$mhv','$ht','$dob','$hochieu','$cccd','$quequan')";
// thông báo thêm thành công
if(mysqli_query($mysqli, $themsql)) {
    echo "success";
    exit;
} else {
    echo "error";
}
header("Location: ../../index.php?chucnang=hocvien");

?>
