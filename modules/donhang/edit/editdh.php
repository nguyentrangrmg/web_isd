<?php
require '../../../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin từ form themdh.php
    $mdh = $_POST['mdh']; // Add this line to get the order ID
    
    $ten_dh = $_POST['ten_dh'];
    $nghiep_doan = $_POST['nghiep_doan'];
    $nganh_nghe = $_POST['nganh_nghe'];
    $du_kien_tt = $_POST['du_kien_tt'];
    $ngay_tt = $_POST['ngay_tt'];
    $hinh_thuc_tt = $_POST['hinh_thuc_tt'];
    $otherText = isset($_POST['otherText']) ? $_POST['otherText'] : '';
    if ($hinh_thuc_tt === 'other' || ($hinh_thuc_tt !== 'online' && $hinh_thuc_tt !== 'offline')) {
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
    // Query to update the order information in the database
    $update_query = "UPDATE jporder SET 
    ten_dh = '$ten_dh',
    nghiep_doan = '$nghiep_doan',
    nganh_nghe = '$nganh_nghe',
    du_kien_tt = '$du_kien_tt',
    ngay_tt = '$ngay_tt',
    hinh_thuc_tt = '$hinh_thuc_tt',
    ngay_xc = '$ngay_xc',
    ngay_vn = '$ngay_vn',
    so_luong_tuyen = '$so_luong_tuyen',
    sl_nam = '$sl_nam',
    sl_nu = '$sl_nu',
    do_tuoi_nam = '$do_tuoi_nam',
    do_tuoi_nu = '$do_tuoi_nu',
    noi_lv = '$noi_lv',
    luong_co_ban = '$luong_co_ban',
    luong_thuc_te = '$luong_thuc_te',
    che_do_phu_cap = '$che_do_phu_cap',
    lv_theo_ngay = '$lv_theo_ngay',
    lv_theo_tuan = '$lv_theo_tuan',
    nghi = '$nghi',
    trang_thai = '$trang_thai',
    ghi_chu = '$ghi_chu'
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
