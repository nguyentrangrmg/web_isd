<?php
require '../../../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $xi_nghiep = $_POST['xi_nghiep'];
    $ten_giam_doc = $_POST['ten_giam_doc'];
    $sdt = $_POST['sdt'];
    $dia_chi_xn = $_POST['dia_chi_xn'];
    $nghiep_doan = $_POST['nghiep_doan'];

    $nganh_nghe_values = implode("; ", array_filter($_POST['nganh_nghe'], 'strlen'));
    $noi_lam_viec_values = "(" . implode(")(", array_filter($_POST['noi_lam_viec'], 'strlen')) . ")";

    $mdn = $_POST['mdn'];

    $select_query = "SELECT * FROM enterprise WHERE mdn = '$mdn'";
    $result = mysqli_query($mysqli, $select_query);

    if (mysqli_num_rows($result) > 0) {
        $update_query = "UPDATE enterprise SET xi_nghiep='$xi_nghiep', ten_giam_doc='$ten_giam_doc', nganh_nghe_e='$nganh_nghe_values', 
        nghiep_doan='$nghiep_doan', sdt_xn='$sdt', dia_chi_xn='$dia_chi_xn', noi_lam_viec='$noi_lam_viec_values' 
        WHERE mdn='$mdn'";

        if (mysqli_query($mysqli, $update_query)) {
            $message = "Cập nhật thông tin xí nghiệp thành công.";
            header("Location: ../../../index.php?chucnang=xinghiep&success_message=" . urlencode($message));
        } else {
            $error_message = "Lỗi: " . $update_query . "<br>" . mysqli_error($mysqli);
            header("Location: ../../../index.php?chucnang=xinghiep&error_message=" . urlencode($error_message));
        }
    } else {
        $message = "Xí nghiệp không tồn tại trong cơ sở dữ liệu.";
        header("Location: ../../../index.php?chucnang=xinghiep&error_message=" . urlencode($message));
    }

    mysqli_close($mysqli);
}
?>
