<?php
require '../../../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin từ form themdh.php
    $mdh = $_POST['mdh']; // Add this line to get the order ID
    $ten_dh = $_POST['ten_dh'];
    $ngay_xc = isset($_POST['ngay_xc']) ? $_POST['ngay_xc'] : null;
    $ngay_vn = isset($_POST['ngay_vn']) ? $_POST['ngay_vn'] : null;
    $ngay_pv = isset($_POST['ngay_pv']) ? $_POST['ngay_pv'] : null;
    $hinh_thuc_tt = isset($_POST['hinh_thuc_tt']) ? $_POST['hinh_thuc_tt'] : null;
    $so_luong_tuyen = isset($_POST['so_luong_tuyen']) ? $_POST['so_luong_tuyen'] : null;
    $yeu_cau = isset($_POST['yeu_cau']) ? $_POST['yeu_cau'] : null;
    $muc_luong= isset($_POST['muc_luong']) ? $_POST['muc_luong'] : null;
    $che_do_phu_cap= isset($_POST['che_do_phu_cap']) ? $_POST['che_do_phu_cap'] : null;
    $thoi_gian_lam_viec = $_POST['thoi_gian_lam_viec'];
    $du_kien_tt = $_POST['du_kien_tt'];
    $trang_thai = $_POST['trang_thai'];
    $nghiep_doan = $_POST['nghiep_doan'];
    $xi_nghiep = $_POST['xi_nghiep'];
    $nganh_nghe = $_POST['nganh_nghe'];
    $gioi_tinh = $_POST['gioi_tinh'];
    $do_tuoi = $_POST['do_tuoi'];
    $ngay_tt = $_POST['ngay_tt'];

    // Query to update the order information in the database
    $update_query = "UPDATE jporder SET 
                    ten_dh = '$ten_dh',
                    ngay_xc = '$ngay_xc',
                    ngay_vn = '$ngay_vn',
                    ngay_pv = '$ngay_pv',
                    hinh_thuc_tt = '$hinh_thuc_tt',
                    so_luong_tuyen = '$so_luong_tuyen',
                    yeu_cau = '$yeu_cau',
                    muc_luong = '$muc_luong',
                    che_do_phu_cap = '$che_do_phu_cap',
                    thoi_gian_lam_viec = '$thoi_gian_lam_viec',
                    du_kien_tt = '$du_kien_tt',
                    trang_thai = '$trang_thai',
                    nghiep_doan = '$nghiep_doan',
                    xi_nghiep = '$xi_nghiep',
                    nganh_nghe = '$nganh_nghe',
                    gioi_tinh = '$gioi_tinh',
                    do_tuoi = '$do_tuoi',
                    ngay_tt = '$ngay_tt'
                    WHERE mdh = '$mdh'";
    
    // Execute the update query
    if (mysqli_query($mysqli, $update_query)) {
        header("Location: ../../../index.php?typedh=".$type_hv."");
        exit;
    } else {
        echo "Lỗi: " . mysqli_error($mysqli);
    }
}
?>
