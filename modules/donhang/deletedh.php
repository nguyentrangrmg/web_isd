<?php 
include ('../../config.php');

if(isset($_POST['checkbox'][0])){
    foreach($_POST['checkbox'] as $list){
        $id = mysqli_real_escape_string($mysqli, $list);

        // Chuyển dữ liệu của học viên từ bảng student sang bảng bin_student
        $insert_query = "INSERT INTO bin_order (mdh, ten_dh, ngay_xc, ngay_vn, ngay_pv, hinh_thuc_tt, so_luong_tuyen, yeu_cau, muc_luong, 
        che_do_phu_cap, thoi_gian_lam_viec, du_kien_tt, trang_thai, nghiep_doan, xi_nghiep, nganh_nghe, gioi_tinh, do_tuoi, 
        type_hv, ngay_tt)
                        SELECT mdh, ten_dh, ngay_xc, ngay_vn, ngay_pv, hinh_thuc_tt, so_luong_tuyen, yeu_cau, muc_luong, 
                        che_do_phu_cap, thoi_gian_lam_viec, du_kien_tt, trang_thai, nghiep_doan, xi_nghiep, nganh_nghe, gioi_tinh, do_tuoi, 
                        type_hv, ngay_tt
                        FROM jporder
                        WHERE mdh = '$id'";
        $insert_result = mysqli_query($mysqli, $insert_query);

        if ($insert_result) {
            // Xóa dữ liệu của học viên từ bảng student sau khi chuyển vào bin_student
            mysqli_query($mysqli, "DELETE FROM jporder WHERE mdh='$id'");
        } else {
            echo "Đã xảy ra lỗi khi chuyển dữ liệu từ student sang bin_student: " . mysqli_error($mysqli);
        }
    }
}

if (isset($_POST['delete'])) {
    $mdh = $_POST['delete'];
    
    // Chuyển dữ liệu của học viên bị xóa từ bảng student sang bảng bin_student trước khi xóa
    $insert_query = "INSERT INTO bin_order (mdh, ten_dh, ngay_xc, ngay_vn, ngay_pv, hinh_thuc_tt, so_luong_tuyen, yeu_cau, muc_luong, 
    che_do_phu_cap, thoi_gian_lam_viec, du_kien_tt, trang_thai, nghiep_doan, xi_nghiep, nganh_nghe, gioi_tinh, do_tuoi, 
    type_hv, ngay_tt)
                    SELECT mdh, ten_dh, ngay_xc, ngay_vn, ngay_pv, hinh_thuc_tt, so_luong_tuyen, yeu_cau, muc_luong, 
                        che_do_phu_cap, thoi_gian_lam_viec, du_kien_tt, trang_thai, nghiep_doan, xi_nghiep, nganh_nghe, gioi_tinh, do_tuoi, 
                        type_hv, ngay_tt
                    FROM jporder
                    WHERE mdh = ?";
    $insert_stmt = mysqli_prepare($mysqli, $insert_query);
    
    if ($insert_stmt) {
        mysqli_stmt_bind_param($insert_stmt, "s", $mhv);
        if (mysqli_stmt_execute($insert_stmt)) {
            // Xóa dữ liệu của học viên từ bảng student sau khi chuyển vào bin_student
            mysqli_query($mysqli, "DELETE FROM jporder WHERE mdh='$mdh'");
            echo "Dữ liệu đã được xóa thành công.";
        } else {
            echo "Đã xảy ra lỗi khi chuyển dữ liệu từ student sang bin_student: " . mysqli_error($mysqli);
        }

        mysqli_stmt_close($insert_stmt);
    } else {
        echo "Lỗi khi chuẩn bị câu lệnh chèn: " . mysqli_error($mysqli);
    }
}


?>
