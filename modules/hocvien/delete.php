<?php 
include ('../../config.php');

if(isset($_POST['checkbox'][0])){
    foreach($_POST['checkbox'] as $list){
        $id = mysqli_real_escape_string($mysqli, $list);

        // Chuyển dữ liệu của học viên từ bảng student sang bảng bin_student
        $insert_query = "INSERT INTO bin_student (mhv, ho_ten, ngay_sinh, gioi_tinh, sdt, ho_chieu, CCCD, ngay_cap_cccd, 
    ho_khau, dia_chi, ngay_thi, co_quan, ngay_DKXC, ngayXC, dukien_venuoc, 
    nganh_nghe, xi_nghiep, nghiep_doan, noi_lam_viec, note, type_hv, 
    ngay_nhaphoc, order_name, status, file_anh)
                    SELECT mhv, ho_ten, ngay_sinh, gioi_tinh, sdt, ho_chieu, CCCD, ngay_cap_cccd, 
            ho_khau, dia_chi, ngay_thi, co_quan, ngay_DKXC, ngayXC, dukien_venuoc, 
            nganh_nghe, xi_nghiep, nghiep_doan, noi_lam_viec, note, type_hv, 
            ngay_nhaphoc, order_name, status, file_anh
                    FROM student
                        WHERE mhv = '$id'";
        $insert_result = mysqli_query($mysqli, $insert_query);

        if ($insert_result) {
            // Xóa dữ liệu của học viên từ bảng student sau khi chuyển vào bin_student
            mysqli_query($mysqli, "DELETE FROM student WHERE mhv='$id'");
        } else {
            echo "Đã xảy ra lỗi khi chuyển dữ liệu từ student sang bin_student: " . mysqli_error($mysqli);
        }
    }
}

if (isset($_POST['delete'])) {
    $mhv = $_POST['delete'];
    // Chuyển dữ liệu của học viên bị xóa từ bảng student sang bảng bin_student trước khi xóa
    $insert_query = "INSERT INTO bin_student (mhv, ho_ten, ngay_sinh, gioi_tinh, sdt, ho_chieu, CCCD, ngay_cap_cccd, 
    ho_khau, dia_chi, ngay_thi, co_quan, ngay_DKXC, ngayXC, dukien_venuoc, 
    nganh_nghe, xi_nghiep, nghiep_doan, noi_lam_viec, note, type_hv, 
    ngay_nhaphoc, order_name, status, file_anh)
                    SELECT mhv, ho_ten, ngay_sinh, gioi_tinh, sdt, ho_chieu, CCCD, ngay_cap_cccd, 
            ho_khau, dia_chi, ngay_thi, co_quan, ngay_DKXC, ngayXC, dukien_venuoc, 
            nganh_nghe, xi_nghiep, nghiep_doan, noi_lam_viec, note, type_hv, 
            ngay_nhaphoc, order_name, status, file_anh
                    FROM student
                    WHERE mhv = ?";
    $insert_stmt = mysqli_prepare($mysqli, $insert_query);
    
    if ($insert_stmt) {
        mysqli_stmt_bind_param($insert_stmt, "s", $mhv);
        if (mysqli_stmt_execute($insert_stmt)) {
            // Xóa dữ liệu của học viên từ bảng student sau khi chuyển vào bin_student
            mysqli_query($mysqli, "DELETE FROM student WHERE mhv='$mhv'");
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
