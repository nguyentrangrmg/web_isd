<?php 
include ('../../../config.php');

if(isset($_POST['checkbox'][0])){
    foreach($_POST['checkbox'] as $list){
        $id = mysqli_real_escape_string($mysqli, $list);

        $insert_query = "INSERT INTO enterprise (mdn, xi_nghiep, ten_giam_doc, nganh_nghe_e, nghiep_doan, 
        sdt_xn, dia_chi_xn, noi_lam_viec)
                SELECT mdn, xi_nghiep, ten_giam_doc, nganh_nghe_e, nghiep_doan, 
            sdt_xn, dia_chi_xn, noi_lam_viec
                FROM bin_xn
                WHERE mdn = '$id'";
        $insert_result = mysqli_query($mysqli, $insert_query);
        
        if ($insert_result) {
            mysqli_query($mysqli, "DELETE FROM bin_xn WHERE mdn='$id'");
        } else {
            echo "Đã xảy ra lỗi: " . mysqli_error($mysqli);
        }
    }
}

    if (isset($_POST['restore'])) {
        $mdn = $_POST['restore'];
        $insert_query = "INSERT INTO enterprise (mdn, xi_nghiep, ten_giam_doc, nganh_nghe_e, nghiep_doan, 
        sdt_xn, dia_chi_xn, noi_lam_viec)
                    SELECT mdn, xi_nghiep, ten_giam_doc, nganh_nghe_e, nghiep_doan, 
        sdt_xn, dia_chi_xn, noi_lam_viec
                    FROM bin_xn
                    WHERE mdn = ?";
        $insert_stmt = mysqli_prepare($mysqli, $insert_query);
        
        if ($insert_stmt) {
            mysqli_stmt_bind_param($insert_stmt, "s", $mdn);
            if (mysqli_stmt_execute($insert_stmt)) {
                mysqli_query($mysqli, "DELETE FROM bin_xn WHERE mdn='$mdn'");
            } else {
                echo "Đã xảy ra lỗi khi chuyển dữ liệu: " . mysqli_error($mysqli);
            }
    
            mysqli_stmt_close($insert_stmt);
        } else {
            echo "Lỗi khi chuẩn bị câu lệnh chèn: " . mysqli_error($mysqli);
        }
    }
    
?>
