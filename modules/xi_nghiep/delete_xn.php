<?php 
include ('../../config.php');

if(isset($_POST['checkbox'][0])){
    foreach($_POST['checkbox'] as $list){
        $id = mysqli_real_escape_string($mysqli, $list);

        // Chuyển dữ liệu của học viên từ bảng student sang bảng bin_student
        $insert_query = "INSERT INTO bin_xn (mdn, xi_nghiep, ten_giam_doc, nganh_nghe_e, nghiep_doan, 
        sdt_xn, dia_chi_xn, noi_lam_viec)
                    SELECT mdn, xi_nghiep, ten_giam_doc, nganh_nghe_e, nghiep_doan, 
            sdt_xn, dia_chi_xn, noi_lam_viec
                    FROM enterprise 
                        WHERE mdn = '$id'";
        $insert_result = mysqli_query($mysqli, $insert_query);

        if ($insert_result) {
            // Xóa dữ liệu của học viên từ bảng student sau khi chuyển vào bin_student
            mysqli_query($mysqli, "DELETE FROM enterprise WHERE mdn='$id'");
        } else {
            echo "Đã xảy ra lỗi khi chuyển dữ liệu từ student sang bin_student: " . mysqli_error($mysqli);
        }
    }
}

if (isset($_POST['delete'])) {
    $mdn = $_POST['delete'];
    // Chuyển dữ liệu của học viên bị xóa từ bảng student sang bảng bin_student trước khi xóa
    $insert_query = "INSERT INTO bin_xn (mdn, xi_nghiep, ten_giam_doc, nganh_nghe_e, nghiep_doan, 
    sdt_xn, dia_chi_xn, noi_lam_viec)
                    SELECT mdn, xi_nghiep, ten_giam_doc, nganh_nghe_e, nghiep_doan, 
            sdt_xn, dia_chi_xn, noi_lam_viec
                    FROM enterprise
                    WHERE mdn = ?";
    $insert_stmt = mysqli_prepare($mysqli, $insert_query);
    
    if ($insert_stmt) {
        mysqli_stmt_bind_param($insert_stmt, "s", $mdn);
        if (mysqli_stmt_execute($insert_stmt)) {
            // Xóa dữ liệu của học viên từ bảng student sau khi chuyển vào bin_student
            mysqli_query($mysqli, "DELETE FROM enterprise WHERE mdn='$mdn'");
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
