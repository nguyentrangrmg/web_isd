<?php 
include ('../../../config.php');

if(isset($_POST['checkbox'][0])){
    foreach($_POST['checkbox'] as $list){
        $id = mysqli_real_escape_string($mysqli, $list);

        $insert_query = "INSERT INTO jporder (mdh, ten_dh, ngay_xc, ngay_vn, ngay_pv, hinh_thuc_tt, so_luong_tuyen, 
                yeu_cau, muc_luong, che_do_phu_cap, thoi_gian_lam_viec, du_kien_tt, trang_thai, nghiep_doan, xi_nghiep, 
                nganh_nghe, gioi_tinh, do_tuoi, type_hv, ngay_tt)
                SELECT mdh, ten_dh, ngay_xc, ngay_vn, ngay_pv, hinh_thuc_tt, so_luong_tuyen, yeu_cau, muc_luong, 
                che_do_phu_cap, thoi_gian_lam_viec, du_kien_tt, trang_thai, nghiep_doan, xi_nghiep, nganh_nghe, 
                gioi_tinh, do_tuoi, type_hv, ngay_tt
                FROM bin_order
                WHERE mdh = '$id'";
        $insert_result = mysqli_query($mysqli, $insert_query);
        
        if ($insert_result) {
            mysqli_query($mysqli, "DELETE FROM bin_order WHERE mdh='$id'");
        } else {
            echo "Đã xảy ra lỗi khi chuyển dữ liệu từ student sang bin_student: " . mysqli_error($mysqli);
        }
    }
}

    if (isset($_POST['restore'])) {
        $mdh = $_POST['restore'];
        $insert_query = "INSERT INTO jporder (mdh, ten_dh, ngay_xc, ngay_vn, ngay_pv, hinh_thuc_tt, so_luong_tuyen, 
                    yeu_cau, muc_luong, che_do_phu_cap, thoi_gian_lam_viec, du_kien_tt, trang_thai, nghiep_doan, xi_nghiep, 
                    nganh_nghe, gioi_tinh, do_tuoi, type_hv, ngay_tt)
                    SELECT mdh, ten_dh, ngay_xc, ngay_vn, ngay_pv, hinh_thuc_tt, so_luong_tuyen, yeu_cau, muc_luong, 
                    che_do_phu_cap, thoi_gian_lam_viec, du_kien_tt, trang_thai, nghiep_doan, xi_nghiep, nganh_nghe, 
                    gioi_tinh, do_tuoi, type_hv, ngay_tt
                    FROM bin_order
                    WHERE mdh = ?";
        $insert_stmt = mysqli_prepare($mysqli, $insert_query);
        
        if ($insert_stmt) {
            mysqli_stmt_bind_param($insert_stmt, "s", $mdh);
            if (mysqli_stmt_execute($insert_stmt)) {
                mysqli_query($mysqli, "DELETE FROM bin_order WHERE mdh='$mdh'");
            } else {
                echo "Đã xảy ra lỗi khi chuyển dữ liệu: " . mysqli_error($mysqli);
            }
    
            mysqli_stmt_close($insert_stmt);
        } else {
            echo "Lỗi khi chuẩn bị câu lệnh chèn: " . mysqli_error($mysqli);
        }
    }
    
?>
