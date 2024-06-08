<?php
require '../../../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin từ form
    $type_hv = isset($_POST['type_hv']) ? $_POST['type_hv'] : 1;
    $ten_dh = $_POST['ten_dh'];
    $nghiep_doan = $_POST['nghiep_doan'];
    $nganh_nghe = $_POST['nganh_nghe'];
    $xi_nghiep = $_POST['xi_nghiep'];
    $du_kien_tt = $_POST['du_kien_tt'];
    $ngay_tt = $_POST['ngay_tt'];
    $hinh_thuc_tt = $_POST['hinh_thuc_tt'];
    $otherText = isset($_POST['otherText']) ? $_POST['otherText'] : '';
    if ($hinh_thuc_tt === 'other') {
        $hinh_thuc_tt = $otherText;
    }
    $ngay_xc = $_POST['ngay_xc'];
    $ngay_vn = $_POST['ngay_vn'];
    $so_luong_tuyen = $_POST['so_luong_tuyen'];
    $sl_nam = $_POST['sl_nam'];
    $tuoi_nam1 = $_POST['tuoi_nam1'];
    $tuoi_nam2 = $_POST['tuoi_nam2'];
    $sl_nu = $_POST['sl_nu'];
    $tuoi_nu1 = $_POST['tuoi_nu1'];
    $tuoi_nu2 = $_POST['tuoi_nu2'];
    $noi_lv = $_POST['noi_lv'];
    $luong_co_ban = $_POST['luong_co_ban'];
    $luong_thuc_te = $_POST['luong_thuc_te'];
    $che_do_phu_cap = $_POST['che_do_phu_cap'];
    $lv_theo_ngay = $_POST['lv_theo_ngay'];
    $lv_theo_tuan = $_POST['lv_theo_tuan'];
    $nghi = $_POST['nghi'];
    $trang_thai = $_POST['trang_thai'];
    $ghi_chu = $_POST['ghi_chu'];

    $do_tuoi_nam = $tuoi_nam1 . ' đến ' . $tuoi_nam2;
    $do_tuoi_nu = $tuoi_nu1 . ' đến ' . $tuoi_nu2;
    // Tạo mã đơn hàng tự động
    $mdh_prefix = "";
    $year_last_two = date('y');
    
    switch ($type_hv) {
        case '1':
            $mdh_prefix = "T1";
            break;
        case '3':
            $mdh_prefix = "T3";
            break;
        case 'dd':
            $mdh_prefix = "DD";
            break;
        default:
            break;
    }
    
    function getMaxLastThreeDigits($mysqli, $mdh_prefix, $year_last_two)
    {
        $max_last_three_digits = 0;

        // Lấy 3 số cuối lớn nhất
        $query_order = "SELECT MAX(CAST(SUBSTRING(mdh, -3) AS UNSIGNED)) AS max_digits FROM jporder WHERE SUBSTRING(mdh, 1, 2) = '$mdh_prefix' AND SUBSTRING(mdh, 3, 2) = '$year_last_two'";
        $result_order = mysqli_query($mysqli, $query_order);
        $row_order = mysqli_fetch_assoc($result_order);
        $max_last_three_digits_order = intval($row_order['max_digits']);

        // Lấy 3 số cuối lớn nhất
        $query_bin_order = "SELECT MAX(CAST(SUBSTRING(mdh, -3) AS UNSIGNED)) AS max_digits FROM bin_order WHERE SUBSTRING(mdh, 1, 2) = '$mdh_prefix' AND SUBSTRING(mdh, 3, 2) = '$year_last_two'";
        $result_bin_order = mysqli_query($mysqli, $query_bin_order);
        $row_bin_order = mysqli_fetch_assoc($result_bin_order);
        $max_last_three_digits_bin_order = intval($row_bin_order['max_digits']);

        // So sánh và lấy số lớn hơn
        $max_last_three_digits = max($max_last_three_digits_order, $max_last_three_digits_bin_order);

        return $max_last_three_digits;
    }
    $order_index = getMaxLastThreeDigits($mysqli, $mdh_prefix, $year_last_two) + 1;
    
    if ($order_index === null || $order_index < 1) {
        $order_index = 1;
    }
    $order_index = sprintf('%03d', $order_index);
    // Tạo mã
    $mdh = $mdh_prefix . $year_last_two . $order_index;

    // Thực hiện câu lệnh SQL để chèn dữ liệu vào cơ sở dữ liệu
    $themsql = "INSERT INTO jporder (mdh, ten_dh, ngay_xc, ngay_vn, hinh_thuc_tt, so_luong_tuyen, 
    yeu_cau, luong_co_ban, luong_thuc_te, che_do_phu_cap, 
    du_kien_tt, trang_thai, nghiep_doan, xi_nghiep, nganh_nghe, sl_nam, sl_nu, 
    do_tuoi_nam, do_tuoi_nu, type_hv, ngay_tt, 
    noi_lv, lv_theo_ngay, lv_theo_tuan, nghi, ghi_chu) 
    VALUES ('$mdh', '$ten_dh', '$ngay_xc', '$ngay_vn', '$hinh_thuc_tt', '$so_luong_tuyen', 
    '$yeu_cau', '$luong_co_ban', '$luong_thuc_te', '$che_do_phu_cap', 
    '$du_kien_tt', '$trang_thai', '$nghiep_doan', '$xi_nghiep', '$nganh_nghe', '$sl_nam', '$sl_nu', 
    '$do_tuoi_nam', '$do_tuoi_nu', '$type_hv', '$ngay_tt', 
    '$noi_lv', '$lv_theo_ngay', '$lv_theo_tuan', '$nghi', '$ghi_chu')";

    // Thực thi câu lệnh SQL và kiểm tra kết quả
    if(mysqli_query($mysqli, $themsql)) {
        // Chuyển hướng đến trang quản lý đơn hàng sau khi thêm thành công
        header("Location: ../../../index.php?action=view&mdh=$mdh");
        exit;
    } else {
        // Xử lý lỗi nếu có
        $error_message = "Lỗi khi thêm đơn hàng: " . mysqli_error($mysqli);
        header("Location: ../../../index.php?chucnang=donhang&error_message=" . urlencode($error_message));
        exit;
    }
} 
?>