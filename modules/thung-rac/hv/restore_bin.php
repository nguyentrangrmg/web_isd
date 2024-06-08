<?php 
include ('../../../config.php');

if(isset($_POST['checkbox'][0])){
    foreach($_POST['checkbox'] as $list){
        $mhv = mysqli_real_escape_string($mysqli, $list);
        
        $insert_query = "INSERT INTO student (mhv, ho_ten, ngay_sinh, gioi_tinh, sdt, ho_chieu, ngay_cap_hc, noi_cap_hc, CCCD, ngay_cap_cccd, 
        ho_khau, dia_chi, ngay_thi, ngay_DKXC, ngayXC, dukien_venuoc, noi_cap_cccd,
        note, type_hv, ngay_nhaphoc, mdh, status, file_anh, lich_su_xk, ten_dh)
                        SELECT '$mhv', ho_ten, ngay_sinh, gioi_tinh, sdt, ho_chieu, ngay_cap_hc, noi_cap_hc, CCCD, ngay_cap_cccd, 
        ho_khau, dia_chi, ngay_thi, ngay_DKXC, ngayXC, dukien_venuoc, noi_cap_cccd,
        note, type_hv, ngay_nhaphoc, mdh, status, file_anh, lich_su_xk, ten_dh
                        FROM bin_student
                        WHERE mhv = '$mhv'";

        $insert_result = mysqli_query($mysqli, $insert_query);

        if ($insert_result) {
            // Xóa dữ liệu khỏi bảng bin_student sau khi chuyển vào student
            mysqli_query($mysqli, "DELETE FROM bin_student WHERE mhv = '$mhv'");
            echo "success";
        } else {
            echo "Đã xảy ra lỗi khi chuyển dữ liệu từ student sang bin_student: " . mysqli_error($mysqli);
        }
    }
} 
if (isset($_POST['restore'])) {
    $mhv = $_POST['restore'];
  
        $insert_query = "INSERT INTO student (mhv, ho_ten, ngay_sinh, gioi_tinh, sdt, ho_chieu, ngay_cap_hc, noi_cap_hc, CCCD, ngay_cap_cccd, 
        ho_khau, dia_chi, ngay_thi, ngay_DKXC, ngayXC, dukien_venuoc, noi_cap_cccd,
        note, type_hv, ngay_nhaphoc, mdh, status, file_anh, lich_su_xk, ten_dh)
                        SELECT '$mhv', ho_ten, ngay_sinh, gioi_tinh, sdt, ho_chieu, ngay_cap_hc, noi_cap_hc, CCCD, ngay_cap_cccd, 
        ho_khau, dia_chi, ngay_thi, ngay_DKXC, ngayXC, dukien_venuoc, noi_cap_cccd,
        note, type_hv, ngay_nhaphoc, mdh, status, file_anh, lich_su_xk, ten_dh
                        FROM bin_student
                        WHERE mhv = '$mhv'";

        $insert_result = mysqli_query($mysqli, $insert_query);

        if ($insert_result) {
            // Xóa dữ liệu khỏi bảng bin_student sau khi chuyển vào student
            mysqli_query($mysqli, "DELETE FROM bin_student WHERE mhv = '$mhv'");
            echo "success";
        } else {
            echo "Đã xảy ra lỗi khi chuyển dữ liệu từ student sang bin_student: " . mysqli_error($mysqli);
        }
    }





?>
