<?php
// Kết nối CSDL và lấy giá trị đã gửi từ JavaScript
require '../../../config.php';
$xi_nghiep = $_POST['xi_nghiep'];

// Truy vấn CSDL để lấy danh sách các ngành nghề dựa trên giá trị đã chọn
$query_nganh_nghe = "SELECT DISTINCT nganh_nghe_e FROM enterprise WHERE xi_nghiep = '$xi_nghiep'";
$result_nganh_nghe = mysqli_query($mysqli, $query_nganh_nghe);

// Tạo các tùy chọn cho dropdown select tiếp theo dựa trên kết quả của truy vấn
$options = "";
while ($row_nganh_nghe = mysqli_fetch_assoc($result_nganh_nghe)) {
    // Tách chuỗi ngành nghề thành các phần tử và đưa vào dropdown
    $nganh_nghe_array = explode('; ', $row_nganh_nghe['nganh_nghe_e']);
    foreach ($nganh_nghe_array as $nganh_nghe_value) {
        $options .= '<option value="' . $nganh_nghe_value . '">' . $nganh_nghe_value . '</option>';
    }
}

// Trả về các tùy chọn để JavaScript có thể sử dụng để cập nhật dropdown select
echo $options;
?>
