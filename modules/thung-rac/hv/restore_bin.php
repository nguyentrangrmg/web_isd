<?php 
include ('../../../config.php');

if(isset($_POST['checkbox']) && isset($_POST['created_at']) && isset($_POST['mhv'])) {
    // Lặp qua mảng checkbox để lấy các giá trị tương ứng
    foreach($_POST['checkbox'] as $key => $created_at) {
        // Lấy giá trị mhv và created_at tương ứng với $key
        $mhv = mysqli_real_escape_string($mysqli, $_POST['mhv'][$key]);
        $created_at = mysqli_real_escape_string($mysqli, $created_at);
        
        $insert_query = "INSERT INTO student (mhv, ho_ten, ngay_sinh, gioi_tinh, sdt, ho_chieu, CCCD, ngay_cap_cccd, 
            ho_khau, dia_chi, ngay_thi, co_quan, ngay_DKXC, ngayXC, dukien_venuoc, 
            nganh_nghe, xi_nghiep, nghiep_doan, noi_lam_viec, note, type_hv, 
            ngay_nhaphoc, order_name, status, file_anh)
                        SELECT '$mhv', ho_ten, ngay_sinh, gioi_tinh, sdt, ho_chieu, CCCD, ngay_cap_cccd, 
            ho_khau, dia_chi, ngay_thi, co_quan, ngay_DKXC, ngayXC, dukien_venuoc, 
            nganh_nghe, xi_nghiep, nghiep_doan, noi_lam_viec, note, type_hv, 
            ngay_nhaphoc, order_name, status, file_anh
                        FROM bin_student
                        WHERE mhv = '$mhv' AND created_at = '$created_at'";

        $insert_result = mysqli_query($mysqli, $insert_query);

        if ($insert_result) {
            // Xóa dữ liệu khỏi bảng bin_student sau khi chuyển vào student
            mysqli_query($mysqli, "DELETE FROM bin_student WHERE mhv = '$mhv' AND created_at = '$created_at'");
            echo "success";
        } else {
            echo "Đã xảy ra lỗi khi chuyển dữ liệu từ student sang bin_student: " . mysqli_error($mysqli);
        }
    }
} 
if (isset($_POST['restore']) && isset($_POST['created_at'])) {
    $mhv = $_POST['restore'];
    $created_at = $_POST['created_at'];
  
        $insert_query = "INSERT INTO student (mhv, ho_ten, ngay_sinh, gioi_tinh, sdt, ho_chieu, CCCD, ngay_cap_cccd, 
            ho_khau, dia_chi, ngay_thi, co_quan, ngay_DKXC, ngayXC, dukien_venuoc, 
            nganh_nghe, xi_nghiep, nghiep_doan, noi_lam_viec, note, type_hv, 
            ngay_nhaphoc, order_name, status, file_anh)
                        SELECT '$mhv', ho_ten, ngay_sinh, gioi_tinh, sdt, ho_chieu, CCCD, ngay_cap_cccd, 
            ho_khau, dia_chi, ngay_thi, co_quan, ngay_DKXC, ngayXC, dukien_venuoc, 
            nganh_nghe, xi_nghiep, nghiep_doan, noi_lam_viec, note, type_hv, 
            ngay_nhaphoc, order_name, status, file_anh
                        FROM bin_student
                        WHERE mhv = '$mhv' AND created_at = '$created_at'";

        $insert_result = mysqli_query($mysqli, $insert_query);

        if ($insert_result) {
            // Xóa dữ liệu khỏi bảng bin_student sau khi chuyển vào student
            mysqli_query($mysqli, "DELETE FROM bin_student WHERE mhv = '$mhv' AND created_at = '$created_at'");
            echo "success";
        } else {
            echo "Đã xảy ra lỗi khi chuyển dữ liệu từ student sang bin_student: " . mysqli_error($mysqli);
        }
    }





?>
