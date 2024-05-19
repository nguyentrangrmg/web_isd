<?php 
include ('../../../config.php');
if(isset($_POST['checkbox'][0])){
    foreach($_POST['checkbox'] as $list){
        $mhv = mysqli_real_escape_string($mysqli, $list);

        mysqli_query($mysqli,"DELETE from bin_student where mhv='$mhv'");
        mysqli_query($mysqli,"DELETE from baolanh where mhv='$mhv'");
    }
}
if (isset($_POST['delete'])) {
    $mhv = $_POST['delete'];
    $sql = "DELETE FROM bin_student WHERE mhv = ?";
    $sql2 = "DELETE FROM baolanh WHERE mhv = ?";
    $stmt = mysqli_prepare($mysqli, $sql);
    $stmt2 = mysqli_prepare($mysqli, $sql2);
    if ($stmt && $stmt2) {
        mysqli_stmt_bind_param($stmt, "s", $mhv);
        mysqli_stmt_bind_param($stmt2, "s", $mhv);
        if (mysqli_stmt_execute($stmt) && mysqli_stmt_execute($stmt2)) {
            echo "Dữ liệu đã được xóa thành công.";
        } else {
            echo "Đã xảy ra lỗi khi xóa dữ liệu: " . mysqli_error($mysqli);
        }
        mysqli_stmt_close($stmt);
        mysqli_stmt_close($stmt2);
    } else {
        echo "Đã xảy ra lỗi khi chuẩn bị câu lệnh SQL: " . mysqli_error($mysqli);
    }
}


?>