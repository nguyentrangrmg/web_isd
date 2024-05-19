<?php
require '../../../config.php';
$xi_nghiep = $_POST['xi_nghiep'];

$query_nganh_nghe = "SELECT DISTINCT nganh_nghe_e FROM enterprise WHERE xi_nghiep = '$xi_nghiep'";
$result_nganh_nghe = mysqli_query($mysqli, $query_nganh_nghe);

$options = "";
while ($row_nganh_nghe = mysqli_fetch_assoc($result_nganh_nghe)) {
    $nganh_nghe_array = explode('; ', $row_nganh_nghe['nganh_nghe_e']);
    foreach ($nganh_nghe_array as $nganh_nghe_value) {
        $options .= '<option value="' . $nganh_nghe_value . '">' . $nganh_nghe_value . '</option>';
    }
}

echo $options;
?>
