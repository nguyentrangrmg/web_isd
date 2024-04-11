<?php
require '../../../config.php';
// Lấy thông tin từ form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ho_ten = $_POST['ho_ten'];
    $ngay_sinh = $_POST['ngay_sinh'];
    $sdt = $_POST['sdt'];
    $ho_chieu = isset($_POST['ho_chieu']) ? $_POST['ho_chieu'] : null;
    $cccd = isset($_POST['cccd']) ? $_POST['cccd'] : null;
    $que_quan = isset($_POST['que_quan']) ? $_POST['que_quan'] : null;
    $ngay_thi = isset($_POST['ngay_thi']) ? $_POST['ngay_thi'] : null;
    $co_quan = isset($_POST['co_quan']) ? $_POST['co_quan'] : null;
    $ngay_DKXC = isset($_POST['ngay_DKXC']) ? $_POST['ngay_DKXC'] : null;
    $ngayXC = isset($_POST['ngayXC']) ? $_POST['ngayXC'] : null;
    $dukien_venuoc = isset($_POST['dukien_venuoc']) ? $_POST['dukien_venuoc'] : null;
    $nganh_nghe = isset($_POST['nganh_nghe']) ? $_POST['nganh_nghe'] : null;
    $xi_nghiep = isset($_POST['xi_nghiep']) ? $_POST['xi_nghiep'] : null;
    $nghiep_doan = isset($_POST['nghiep_doan']) ? $_POST['nghiep_doan'] : null;
    $noi_lam_viec = isset($_POST['noi_lam_viec']) ? $_POST['noi_lam_viec'] : null;
    $note = isset($_POST['note']) ? $_POST['note'] : null;
    $type_hv = $_POST['type_hv'];
    $ngay_nhaphoc = $_POST['ngay_nhaphoc'];
    $order_name = $_POST['order_name'];
    $status = $_POST['status'];

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
    $dob_last_two = substr($ngay_sinh,2, 2); // vì trong csdl bị để theo dạng yyyy/mm/dd
    
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
    
    $query_last_three = "SELECT SUBSTRING(mhv, 8) AS last_three FROM student WHERE SUBSTRING(mhv, 1, 2) = '$mhv_prefix' AND SUBSTRING(mhv, 3, 2) = '$year_last_two' ORDER BY last_three DESC LIMIT 1";
    $result_last_three = mysqli_query($mysqli, $query_last_three);
    
    if ($result_last_three) {
        if(mysqli_num_rows($result_last_three) > 0) {
            $row_last_three = mysqli_fetch_assoc($result_last_three);
            $last_three = $row_last_three['last_three'];
            $order_index = sprintf('%03d', intval($last_three) + 1);
        } else {
            $order_index = "001";
        }
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }
    
    // Tạo mã mhv hoàn chỉnh
    $mhv = $mhv_prefix . $year_last_two . $dob_last_two . $order_index;
}
// Kiểm tra xem học viên đã tồn tại trong cơ sở dữ liệu chưa
$result = mysqli_query($mysqli, "SELECT * FROM student WHERE mhv = '$mhv'");

if(mysqli_num_rows($result) > 0) {
    echo "exists";
    exit;
}

$themsql = "INSERT INTO student (mhv, ho_ten, ngay_sinh, sdt, ho_chieu, CCCD, que_quan, ngay_thi, 
co_quan, ngay_DKXC, ngayXC, dukien_venuoc, nganh_nghe, xi_nghiep, nghiep_doan, noi_lam_viec, note, type_hv, 
ngay_nhaphoc, order_name, status, file_anh)
    VALUES ('$mhv', '$ho_ten', '$ngay_sinh', '$sdt', '$ho_chieu', '$cccd', '$que_quan', '$ngay_thi', 
    '$co_quan', '$ngay_DKXC', '$ngayXC', '$dukien_venuoc', '$nganh_nghe', '$xi_nghiep', '$nghiep_doan', 
    '$noi_lam_viec', '$note', '$type_hv', '$ngay_nhaphoc', '$order_name', '$status','$anh_path')";

$result = mysqli_query($mysqli, "SELECT * FROM student");

if(mysqli_query($mysqli, $themsql)) {
    // Chuyển hướng đến trang hiển thị thông tin học viên sau khi tạo thành công
    header("Location: ../../../index.php?action=view&mhv=$mhv");
    exit;
} else {
    $error_message = "Lỗi khi thêm học viên: " . mysqli_error($mysqli);
    header("Location: ../../../index.php?chucnang=hocvien&error_message=" . urlencode($error_message));
    exit;
}

// header("Location: modules/hocvien/add/them.php");
?>
