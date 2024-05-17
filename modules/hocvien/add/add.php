<?php
require '../../../config.php';
// Lấy thông tin từ form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ho_ten = $_POST['ho_ten'];
    $ngay_sinh = $_POST['ngay_sinh'];
    $sdt = $_POST['sdt'];
    $gioi_tinh = $_POST['gioi_tinh'];

    $ho_chieu = isset($_POST['ho_chieu']) ? $_POST['ho_chieu'] : null;
    $ngay_cap_hc = isset($_POST['ngay_cap_hc']) ? $_POST['ngay_cap_hc'] : null;
    $noi_cap_hc = isset($_POST['noi_cap_hc']) ? $_POST['noi_cap_hc'] : null;
    $cccd = isset($_POST['cccd']) ? $_POST['cccd'] : null;
    $ngay_cap_cccd = isset($_POST['ngay_cap_cccd']) ? $_POST['ngay_cap_cccd'] : null;
    $noi_cap_cccd = isset($_POST['noi_cap_cccd']) ? $_POST['noi_cap_cccd'] : null;
    $ho_khau = isset($_POST['ho_khau']) ? $_POST['ho_khau'] : null;
    $dia_chi = isset($_POST['dia_chi']) ? $_POST['dia_chi'] : null;
    
    $ngay_thi = isset($_POST['ngay_thi']) ? $_POST['ngay_thi'] : null;
    $ngay_DKXC = isset($_POST['ngay_DKXC']) ? $_POST['ngay_DKXC'] : null;
    $ngayXC = isset($_POST['ngayXC']) ? $_POST['ngayXC'] : null;
    $dukien_venuoc = isset($_POST['dukien_venuoc']) ? $_POST['dukien_venuoc'] : null;
    
    $xn1 = $_POST['xn1'];
    $thoi_gian_ld1 = $_POST['thoi_gian_ld1'];
    $thoi_gian_ld2 = $_POST['thoi_gian_ld2'];
    $xn2 = $_POST['xn2'];
    $thoi_gian_ld3 = $_POST['thoi_gian_ld3'];
    $thoi_gian_ld4 = $_POST['thoi_gian_ld4'];

    $ls_lan1 = "Xí nghiệp $xn1, từ $thoi_gian_ld1 đến $thoi_gian_ld2";
    $ls_lan2 = "Xí nghiệp $xn2, từ $thoi_gian_ld3 đến $thoi_gian_ld4";
    $lich_su_xk = $ls_lan1 . " / " . $ls_lan2;

    $note = isset($_POST['note']) ? $_POST['note'] : null;
    $type_hv = $_POST['type_hv'];
    $ngay_nhaphoc = $_POST['ngay_nhaphoc'];
    $status = $_POST['status'];
    //don hang
    $mdh = $_POST['mdh'];
    $ten_dh = $_POST['ten_dh'];
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
    
    function getMaxLastThreeDigits($mysqli, $mhv_prefix, $year_last_two)
    {
        $max_last_three_digits = 0;

        $query_student = "SELECT MAX(CAST(SUBSTRING(mhv, -3) AS UNSIGNED)) AS max_digits FROM student WHERE SUBSTRING(mhv, 1, 2) = '$mhv_prefix' AND SUBSTRING(mhv, 3, 2) = '$year_last_two'";
        $result_student = mysqli_query($mysqli, $query_student);
        $row_student = mysqli_fetch_assoc($result_student);
        $max_last_three_digits_student = intval($row_student['max_digits']);

        $query_bin_student = "SELECT MAX(CAST(SUBSTRING(mhv, -3) AS UNSIGNED)) AS max_digits FROM bin_student WHERE SUBSTRING(mhv, 1, 2) = '$mhv_prefix' AND SUBSTRING(mhv, 3, 2) = '$year_last_two'";
        $result_bin_student = mysqli_query($mysqli, $query_bin_student);
        $row_bin_student = mysqli_fetch_assoc($result_bin_student);
        $max_last_three_digits_bin_student = intval($row_bin_student['max_digits']);

        $max_last_three_digits = max($max_last_three_digits_student, $max_last_three_digits_bin_student);
        return $max_last_three_digits;
    }
    $order_index = getMaxLastThreeDigits($mysqli, $mhv_prefix, $year_last_two) + 1;
    
    // Nếu không tìm thấy bản ghi nào thỏa mãn điều kiện, gán giá trị mặc định là "001"
    if ($order_index === null || $order_index < 1) {
        $order_index = 1;
    }
    $order_index = sprintf('%03d', $order_index);
    $mhv = $mhv_prefix . $year_last_two . $dob_last_two . $order_index;
}    
// Kiểm tra xem học viên đã tồn tại trong cơ sở dữ liệu chưa
$result = mysqli_query($mysqli, "SELECT * FROM student WHERE mhv = '$mhv'");

if(mysqli_num_rows($result) > 0) {
    echo "exists";
    exit;
}

$themsql = "INSERT INTO student (mhv, ho_ten, ngay_sinh, gioi_tinh, sdt, ho_chieu, ngay_cap_hc, noi_cap_hc, CCCD, ngay_cap_cccd, 
            ho_khau, dia_chi, ngay_thi, ngay_DKXC, ngayXC, dukien_venuoc, noi_cap_cccd,
            note, type_hv, ngay_nhaphoc, mdh, status, file_anh, lich_su_xk, ten_dh)
            VALUES ('$mhv', '$ho_ten', '$ngay_sinh', '$gioi_tinh', '$sdt', '$ho_chieu','$ngay_cap_hc','$noi_cap_hc', '$cccd', '$ngay_cap_cccd',
            '$ho_khau', '$dia_chi', '$ngay_thi', '$ngay_DKXC', '$ngayXC', '$dukien_venuoc', '$noi_cap_cccd',
            '$note', '$type_hv', '$ngay_nhaphoc', '$mdh', '$status','$anh_path','$lich_su_xk','$ten_dh')";

$thembl = "INSERT INTO baolanh (mhv, ten, dob, sdt_bl, ho_khau_bl, dia_chi_bl, quan_he)
        VALUES ('$mhv','$ten', '$dob', '$sdt_bl','$ho_khau_bl', '$dia_chi_bl', '$quan_he') ";

$result = mysqli_query($mysqli, "SELECT * FROM student");
$re = mysqli_query($mysqli, "SELECT * FROM baolanh");

if((mysqli_query($mysqli, $themsql)) && mysqli_query($mysqli,$thembl)){
    // Chuyển hướng đến trang hiển thị thông tin học viên sau khi tạo thành công
    header("Location: ../../../index.php?action=view&mhv=$mhv");
    exit;
} else {
    $error_message = "Lỗi khi thêm học viên: " . mysqli_error($mysqli);
    header("Location: ../../../index.php?chucnang=hocvien&error_message=" . urlencode($error_message));
    exit;
}

?>
