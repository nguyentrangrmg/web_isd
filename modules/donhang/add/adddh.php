<?php
require '../../../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin từ form themdh.php
    $ten_dh = $_POST['ten_dh'];
    $ngay_xc = $_POST['ngay_xc'];
    $ngay_vn = $_POST['ngay_vn'];
    $ngay_pv = $_POST['ngay_pv'];
    $hinh_thuc_tt = $_POST['hinh_thuc_tt'];
    $so_luong_tuyen = $_POST['so_luong_tuyen'];
    $yeu_cau = $_POST['yeu_cau'];
    $muc_luong = $_POST['muc_luong'];
    $che_do_phu_cap = $_POST['che_do_phu_cap'];
    $thoi_gian_lam_viec = $_POST['thoi_gian_lam_viec'];
    $du_kien_tt = $_POST['du_kien_tt'];
    $trang_thai = $_POST['trang_thai'];
    $nghiep_doan = $_POST['nghiep_doan'];
    $xi_nghiep = $_POST['xi_nghiep'];
    $nganh_nghe = $_POST['nganh_nghe'];
    $gioi_tinh = $_POST['gioi_tinh'];
    $do_tuoi = $_POST['do_tuoi'];
    $type_hv = $_POST['type_hv'];
    $ngay_tt = $_POST['ngay_tt'];

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
    
    $order_index = "001"; // Bắt đầu với số cuối cùng là 001
    
    // Kiểm tra xem đã tồn tại mhv với 3 số cuối cùng là 001 hay chưa
    $query_check_exists = "SELECT COUNT(*) AS count FROM jporder WHERE SUBSTRING(mdh, 1, 2) = '$mdh_prefix' AND SUBSTRING(mdh, 3, 2) = '$year_last_two' AND SUBSTRING(mdh, -3) = '$order_index'";
    $result_check_exists = mysqli_query($mysqli, $query_check_exists);
    
    if ($result_check_exists) {
        $row_check_exists = mysqli_fetch_assoc($result_check_exists);
        $count = intval($row_check_exists['count']);
        
        // Nếu đã tồn tại mhv có 3 số cuối của order-index, tăng giá trị cho đến khi không còn tồn tại
        while ($count > 0) {
            $order_index = sprintf('%03d', intval($order_index) + 1);
            $query_check_exists = "SELECT COUNT(*) AS count FROM jporder WHERE SUBSTRING(mdh, 1, 2) = '$mdh_prefix' AND SUBSTRING(mdh, 3, 2) = '$year_last_two' AND SUBSTRING(mdh, -3) = '$order_index'";
            $result_check_exists = mysqli_query($mysqli, $query_check_exists);
            if ($result_check_exists) {
                $row_check_exists = mysqli_fetch_assoc($result_check_exists);
                $count = intval($row_check_exists['count']);
            } else {
                echo "Error: " . mysqli_error($mysqli);
                break;
            }
        }
    }
    
    // Tạo mã mhv hoàn chỉnh
    $mdh = $mdh_prefix . $year_last_two . $order_index;

    // Thực hiện câu lệnh SQL để chèn dữ liệu vào cơ sở dữ liệu
    $themsql = "INSERT INTO jporder (mdh, ten_dh, ngay_xc, ngay_vn, ngay_pv, hinh_thuc_tt, so_luong_tuyen, yeu_cau, muc_luong, 
    che_do_phu_cap, thoi_gian_lam_viec, du_kien_tt, trang_thai, nghiep_doan, xi_nghiep, nganh_nghe, gioi_tinh, do_tuoi, type_hv, ngay_tt)
    VALUES ('$mdh', '$ten_dh', '$ngay_xc', '$ngay_vn', '$ngay_pv', '$hinh_thuc_tt', '$so_luong_tuyen', '$yeu_cau', '$muc_luong', 
    '$che_do_phu_cap', '$thoi_gian_lam_viec', '$du_kien_tt', '$trang_thai', '$nghiep_doan', '$xi_nghiep', '$nganh_nghe', 
    '$gioi_tinh', '$do_tuoi', '$type_hv', '$ngay_tt')";

    // Thực thi câu lệnh SQL và kiểm tra kết quả
    if(mysqli_query($mysqli, $themsql)) {
        // Chuyển hướng đến trang quản lý đơn hàng sau khi thêm thành công
        header("Location: ../../../index.php?chucnang=donhang");
        exit;
    } else {
        // Xử lý lỗi nếu có
        $error_message = "Lỗi khi thêm đơn hàng: " . mysqli_error($mysqli);
        header("Location: ../../../index.php?chucnang=donhang&error_message=" . urlencode($error_message));
        exit;
    }
} else {
    // Nếu không phải phương thức POST, chuyển hướng về trang gốc
    header("Location: ../../../index.php");
    exit;
}
?>
