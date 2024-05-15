<?php
require '../../../config.php';
// Lấy thông tin từ form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ho_ten = $_POST['ho_ten'];
    $ngay_sinh = $_POST['ngay_sinh'];
    $sdt = $_POST['sdt'];
    $gioi_tinh = $_POST['gioi_tinh'];

    $ho_chieu = isset($_POST['ho_chieu']) ? $_POST['ho_chieu'] : null;
    $cccd = isset($_POST['cccd']) ? $_POST['cccd'] : null;
    $ngay_cap_cccd = isset($_POST['ngay_cap_cccd']) ? $_POST['ngay_cap_cccd'] : null;
    $ho_khau = isset($_POST['ho_khau']) ? $_POST['ho_khau'] : null;
    $dia_chi = isset($_POST['dia_chi']) ? $_POST['dia_chi'] : null;
    
    $ngay_thi = isset($_POST['ngay_thi']) ? $_POST['ngay_thi'] : null;
    $co_quan = isset($_POST['co_quan']) ? $_POST['co_quan'] : null;
    $ngay_DKXC = isset($_POST['ngay_DKXC']) ? $_POST['ngay_DKXC'] : null;
    $ngayXC = isset($_POST['ngayXC']) ? $_POST['ngayXC'] : null;
    $dukien_venuoc = isset($_POST['dukien_venuoc']) ? $_POST['dukien_venuoc'] : null;
    $nganh_nghe = isset($_POST['nganh_nghe']) ? $_POST['nganh_nghe'] : null;
    
    $nghiep_doan = isset($_POST['nghiep_doan']) ? $_POST['nghiep_doan'] : null;
    $noi_lam_viec = isset($_POST['noi_lam_viec']) ? $_POST['noi_lam_viec'] : null;
    $note = isset($_POST['note']) ? $_POST['note'] : null;
    $type_hv = $_POST['type_hv'];
    $ngay_nhaphoc = $_POST['ngay_nhaphoc'];
    $status = $_POST['status'];
    //don hang
    $order_name = $_POST['order_name'];
    //xi nghiep
    $xi_nghiep = isset($_POST['xi_nghiep']) ? $_POST['xi_nghiep'] : null;
    $sdt_xn = $_POST['sdt_xn'];
    $dia_chi_xn = $_POST['dia_chi_xn'];
    //bao lanh
    $ten = $_POST['ten'];
    $dob = $_POST['dob'];
    $sdt_bl = $_POST['sdt_bl'];
    $ho_khau_bl = $_POST['ho_khau_bl'];
    $dia_chi_bl = $_POST['dia_chi_bl'];
    $quan_he = $_POST['quan_he'];

    //upload anhhv
    $anh_path=basename($_FILES['file_anh']['name']);
    $target_dir = "../anhhv/";
    $target_file = $target_dir.$anh_path;

    if (move_uploaded_file($_FILES['file_anh']['tmp_name'], $target_file)){
        echo "Hình đã được upload";
    } else {
        echo "Ảnh bị làm sao ý. Lỗi: " . $_FILES['file_anh']['error'];
    }
    if (empty($ngay_sinh)) {
            $error_message = "Ngày sinh không được bỏ trống.";
            header("Location: ../../../index.php?error_message=" . urlencode($error_message));
            exit;
    }
    $mhv_prefix = "";
    $year_last_two = date('y');
    $dob_last_two = substr($ngay_sinh, 2, 2); // trong csdl để dạng yyyy/mm/dd
    
    switch ($type_hv) {
        case '1':
            $mhv_prefix = "T1";
            break;
        case '3':
            $mhv_prefix = "T3";
            break;
        case 'dd':
            $mhv_prefix = "DD";
            break;
        default:
            break;
    }
    
    // $order_index = "001"; // Bắt đầu với số cuối cùng là 001
    
    // // Kiểm tra xem đã tồn tại mhv với 3 số cuối cùng là 001 hay chưa
    // $query_check_exists = "SELECT COUNT(*) AS count FROM student WHERE SUBSTRING(mhv, 1, 2) = '$mhv_prefix' AND SUBSTRING(mhv, 3, 2) = '$year_last_two' AND SUBSTRING(mhv, -3) = '$order_index'";
    // $result_check_exists = mysqli_query($mysqli, $query_check_exists);
    
    // if ($result_check_exists) {
    //     $row_check_exists = mysqli_fetch_assoc($result_check_exists);
    //     $count = intval($row_check_exists['count']);
        
    //     // Nếu đã tồn tại mhv có 3 số cuối của order-index, tăng giá trị cho đến khi không còn tồn tại
    //     while ($count > 0) {
    //         $order_index = sprintf('%03d', intval($order_index) + 1);
    //         $query_check_exists = "SELECT COUNT(*) AS count FROM student WHERE SUBSTRING(mhv, 1, 2) = '$mhv_prefix' AND SUBSTRING(mhv, 3, 2) = '$year_last_two' AND SUBSTRING(mhv, -3) = '$order_index'";
    //         $result_check_exists = mysqli_query($mysqli, $query_check_exists);
    //         if ($result_check_exists) {
    //             $row_check_exists = mysqli_fetch_assoc($result_check_exists);
    //             $count = intval($row_check_exists['count']);
    //         } else {
    //             echo "Error: " . mysqli_error($mysqli);
    //             break;
    //         }
    //     }
    // }
    function getMaxLastThreeDigits($mysqli, $mhv_prefix, $year_last_two)
    {
        $max_last_three_digits = 0;

        // Lấy 3 số cuối lớn nhất từ bảng student
        $query_student = "SELECT MAX(CAST(SUBSTRING(mhv, -3) AS UNSIGNED)) AS max_digits FROM student WHERE SUBSTRING(mhv, 1, 2) = '$mhv_prefix' AND SUBSTRING(mhv, 3, 2) = '$year_last_two'";
        $result_student = mysqli_query($mysqli, $query_student);
        $row_student = mysqli_fetch_assoc($result_student);
        $max_last_three_digits_student = intval($row_student['max_digits']);

        // Lấy 3 số cuối lớn nhất từ bảng bin_student
        $query_bin_student = "SELECT MAX(CAST(SUBSTRING(mhv, -3) AS UNSIGNED)) AS max_digits FROM bin_student WHERE SUBSTRING(mhv, 1, 2) = '$mhv_prefix' AND SUBSTRING(mhv, 3, 2) = '$year_last_two'";
        $result_bin_student = mysqli_query($mysqli, $query_bin_student);
        $row_bin_student = mysqli_fetch_assoc($result_bin_student);
        $max_last_three_digits_bin_student = intval($row_bin_student['max_digits']);

        // So sánh và lấy số lớn hơn
        $max_last_three_digits = max($max_last_three_digits_student, $max_last_three_digits_bin_student);

        return $max_last_three_digits;
    }
    $order_index = getMaxLastThreeDigits($mysqli, $mhv_prefix, $year_last_two) + 1;
    
    // Nếu không tìm thấy bản ghi nào thỏa mãn điều kiện, gán giá trị mặc định là "001"
    if ($order_index === null || $order_index < 1) {
        $order_index = 1;
    }
    $order_index = sprintf('%03d', $order_index);
    // Tạo mã mhv hoàn chỉnh
    $mhv = $mhv_prefix . $year_last_two . $dob_last_two . $order_index;
}    
// Kiểm tra xem học viên đã tồn tại trong cơ sở dữ liệu chưa
$result = mysqli_query($mysqli, "SELECT * FROM student WHERE mhv = '$mhv'");

if(mysqli_num_rows($result) > 0) {
    echo "exists";
    exit;
}

$themsql = "INSERT INTO student (mhv, ho_ten, ngay_sinh, gioi_tinh, sdt, ho_chieu, CCCD, ngay_cap_cccd, 
            ho_khau, dia_chi, ngay_thi, co_quan, ngay_DKXC, ngayXC, dukien_venuoc, 
            nganh_nghe, xi_nghiep, nghiep_doan, noi_lam_viec, note, type_hv, 
            ngay_nhaphoc, order_name, status, file_anh)
            VALUES ('$mhv', '$ho_ten', '$ngay_sinh', '$gioi_tinh', '$sdt', '$ho_chieu', '$cccd', '$ngay_cap_cccd',
            '$ho_khau', '$dia_chi', '$ngay_thi', '$co_quan', '$ngay_DKXC', '$ngayXC', '$dukien_venuoc',
            '$nganh_nghe', '$xi_nghiep', '$nghiep_doan','$noi_lam_viec', '$note', '$type_hv', 
            '$ngay_nhaphoc', '$order_name', '$status','$anh_path')";

$thembl = "INSERT INTO baolanh (mhv, ten, dob, sdt_bl, ho_khau_bl, dia_chi_bl, quan_he)
        VALUES ('$mhv','$ten', '$dob', '$sdt_bl','$ho_khau_bl', '$dia_chi_bl', '$quan_he') ";

$themxn = "INSERT INTO enterprise (mdn, xi_nghiep, nganh_nghe, sdt_xn, dia_chi_xn)
        VALUES ('$mdn','$xi_nghiep', '$nganh_nghe', '$sdt_xn','$dia_chi_xn') ";
$result = mysqli_query($mysqli, "SELECT * FROM student");
$re = mysqli_query($mysqli, "SELECT * FROM baolanh");
$res = mysqli_query($mysqli, "SELECT * FROM enterprise");

if((mysqli_query($mysqli, $themsql)) && mysqli_query($mysqli,$thembl) && mysqli_query($mysqli,$themxn) ){
    // Chuyển hướng đến trang hiển thị thông tin học viên sau khi tạo thành công
    header("Location: ../../../index.php?action=view&mhv=$mhv");
    exit;
} else {
    $error_message = "Lỗi khi thêm học viên: " . mysqli_error($mysqli);
    header("Location: ../../../index.php?chucnang=hocvien&error_message=" . urlencode($error_message));
    exit;
}

?>
