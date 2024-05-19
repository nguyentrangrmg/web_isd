<?php
require '../../../config.php';
$xi_nghiep = $_POST['xi_nghiep'];

$query_noi_lam_viec = "SELECT DISTINCT noi_lam_viec FROM enterprise WHERE xi_nghiep = '$xi_nghiep'";
$result_noi_lam_viec = mysqli_query($mysqli, $query_noi_lam_viec);

$options = "";
while ($row_noi_lam_viec = mysqli_fetch_assoc($result_noi_lam_viec)) {
    $noi_lam_viec_array = explode(')(', $row_noi_lam_viec['noi_lam_viec']);
    foreach ($noi_lam_viec_array as $noi_lam_viec_value) {
        // Xóa dấu ngoặc đơn từ phần tử
        $noi_lam_viec_value = trim($noi_lam_viec_value, '()');
        $options .= '<option value="' . $noi_lam_viec_value . '">' . $noi_lam_viec_value . '</option>';
    }
}

echo $options;
?>
