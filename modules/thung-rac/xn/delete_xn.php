<?php 
include ('../../../config.php');
if(isset($_POST['checkbox'][0])){
    foreach($_POST['checkbox']as $list){
        $id=mysqli_real_escape_string($mysqli,$list);
        mysqli_query($mysqli,"DELETE from bin_xn where mdn='$id'");
    }
}
if (isset($_POST['delete'])) {
    $mdn = $_POST['delete'];
    $sql = "DELETE FROM bin_xn WHERE mdn = ?";
    $stmt = mysqli_prepare($mysqli, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $mdn);
        if (mysqli_stmt_execute($stmt)) {
            echo "Dữ liệu đã được xóa thành công.";
        } else {
            echo "Đã xảy ra lỗi khi xóa dữ liệu: " . mysqli_error($mysqli);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Đã xảy ra lỗi khi chuẩn bị câu lệnh SQL: " . mysqli_error($mysqli);
    }
}

?>