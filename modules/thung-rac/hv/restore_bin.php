<?php 
include ('../../../config.php');

if(isset($_POST['checkbox']) && isset($_POST['created_at']) && isset($_POST['mhv'])) {
    // Lặp qua mảng checkbox để lấy các giá trị tương ứng
    foreach($_POST['checkbox'] as $key => $created_at) {
        // Lấy giá trị mhv và created_at tương ứng với $key
        $mhv = mysqli_real_escape_string($mysqli, $_POST['mhv'][$key]);
        $created_at = mysqli_real_escape_string($mysqli, $created_at);
        
        // Kiểm tra xem mhv đã tồn tại trong bảng student hay không
        $check_result = mysqli_query($mysqli, "SELECT COUNT(*) AS count FROM student WHERE mhv = '$mhv'");
        $row = mysqli_fetch_assoc($check_result);
        $mhv_exists = ($row['count'] > 0);

        if ($mhv_exists) {
            $order_index = "001"; // Bắt đầu với số cuối cùng là 001

            // Kiểm tra xem đã tồn tại mhv với 3 số cuối cùng là 001 hay chưa
            $query_check_exists = "SELECT COUNT(*) AS count FROM student WHERE SUBSTRING(mhv, 1, 2) = SUBSTRING('$mhv', 1, 2) AND SUBSTRING(mhv, 3, 2) = SUBSTRING('$mhv', 3, 2) AND SUBSTRING(mhv, -3) = '$order_index'";
            $result_check_exists = mysqli_query($mysqli, $query_check_exists);
            
            if ($result_check_exists) {
                $row_check_exists = mysqli_fetch_assoc($result_check_exists);
                $count = intval($row_check_exists['count']);
                
                // Nếu đã tồn tại mhv có 3 số cuối của order-index, tăng giá trị cho đến khi không còn tồn tại
                while ($count > 0) {
                    $order_index = sprintf('%03d', intval($order_index) + 1);
                    $query_check_exists = "SELECT COUNT(*) AS count FROM student WHERE SUBSTRING(mhv, 1, 2) = SUBSTRING('$mhv', 1, 2) AND SUBSTRING(mhv, 3, 2) = SUBSTRING('$mhv', 3, 2) AND SUBSTRING(mhv, -3) = '$order_index'";
                    $result_check_exists = mysqli_query($mysqli, $query_check_exists);
                    if ($result_check_exists) {
                        $row_check_exists = mysqli_fetch_assoc($result_check_exists);
                        $count = intval($row_check_exists['count']);
                    } else {
                        echo "Error: " . mysqli_error($mysqli);
                        break;
                    }
                }
                $new_mhv = substr($mhv, 0, 6) . $order_index;
            }
           
        } else {
            // Nếu mhv chưa tồn tại trong student, sử dụng mhv cũ
            $new_mhv = $mhv;
        }
        
        //chuyển dữ liệu từ bin_student sang student
        $insert_query = "INSERT INTO student (mhv, ho_ten, ngay_sinh, gioi_tinh, file_anh, ho_chieu, CCCD, ho_khau, que_quan, ng_bao_lanh, sdt, ngay_thi, co_quan, ngay_DKXC, ngayXC, dukien_venuoc, nganh_nghe, xi_nghiep, nghiep_doan, noi_lam_viec, note, type_hv, ngay_nhaphoc, order_name, status, tinh)
                        SELECT '$new_mhv', ho_ten, ngay_sinh, gioi_tinh, file_anh, ho_chieu, CCCD, ho_khau, que_quan, ng_bao_lanh, sdt, ngay_thi, co_quan, ngay_DKXC, ngayXC, dukien_venuoc, nganh_nghe, xi_nghiep, nghiep_doan, noi_lam_viec, note, type_hv, ngay_nhaphoc, order_name, status, tinh
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
     // Kiểm tra xem mhv đã tồn tại trong bảng student hay không
     $check_result = mysqli_query($mysqli, "SELECT COUNT(*) AS count FROM student WHERE mhv = '$mhv'");
        $row = mysqli_fetch_assoc($check_result);
        $mhv_exists = ($row['count'] > 0);

        if ($mhv_exists) {
            $order_index = "001"; // Bắt đầu với số cuối cùng là 001

            // Kiểm tra xem đã tồn tại mhv với 3 số cuối cùng là 001 hay chưa
            $query_check_exists = "SELECT COUNT(*) AS count FROM student WHERE SUBSTRING(mhv, 1, 2) = SUBSTRING('$mhv', 1, 2) AND SUBSTRING(mhv, 3, 2) = SUBSTRING('$mhv', 3, 2) AND SUBSTRING(mhv, -3) = '$order_index'";
            $result_check_exists = mysqli_query($mysqli, $query_check_exists);
            
            if ($result_check_exists) {
                $row_check_exists = mysqli_fetch_assoc($result_check_exists);
                $count = intval($row_check_exists['count']);
                
                // Nếu đã tồn tại mhv có 3 số cuối của order-index, tăng giá trị cho đến khi không còn tồn tại
                while ($count > 0) {
                    $order_index = sprintf('%03d', intval($order_index) + 1);
                    $query_check_exists = "SELECT COUNT(*) AS count FROM student WHERE SUBSTRING(mhv, 1, 2) = SUBSTRING('$mhv', 1, 2) AND SUBSTRING(mhv, 3, 2) = SUBSTRING('$mhv', 3, 2) AND SUBSTRING(mhv, -3) = '$order_index'";
                    $result_check_exists = mysqli_query($mysqli, $query_check_exists);
                    if ($result_check_exists) {
                        $row_check_exists = mysqli_fetch_assoc($result_check_exists);
                        $count = intval($row_check_exists['count']);
                    } else {
                        echo "Error: " . mysqli_error($mysqli);
                        break;
                    }
                }
                $new_mhv = substr($mhv, 0, 6) . $order_index;
            }
           
        } else {
            // Nếu mhv chưa tồn tại trong student, sử dụng mhv cũ
            $new_mhv = $mhv;
        }
        
        //chuyển dữ liệu từ bin_student sang student
        $insert_query = "INSERT INTO student (mhv, ho_ten, ngay_sinh, gioi_tinh, file_anh, ho_chieu, CCCD, ho_khau, que_quan, ng_bao_lanh, sdt, ngay_thi, co_quan, ngay_DKXC, ngayXC, dukien_venuoc, nganh_nghe, xi_nghiep, nghiep_doan, noi_lam_viec, note, type_hv, ngay_nhaphoc, order_name, status, tinh)
                        SELECT '$new_mhv', ho_ten, ngay_sinh, gioi_tinh, file_anh, ho_chieu, CCCD, ho_khau, que_quan, ng_bao_lanh, sdt, ngay_thi, co_quan, ngay_DKXC, ngayXC, dukien_venuoc, nganh_nghe, xi_nghiep, nghiep_doan, noi_lam_viec, note, type_hv, ngay_nhaphoc, order_name, status, tinh
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
