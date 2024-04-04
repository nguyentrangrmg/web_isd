<?php
require '../../../config.php';

// Lấy thông tin từ form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin từ form
    $ho_ten = $_POST['ho_ten'];
    $ngay_sinh = $_POST['ngay_sinh'];
    $sdt = $_POST['sdt'];
    $ho_chieu = isset($_POST['ho_chieu']) ? $_POST['ho_chieu'] : null;
    $cmnd = isset($_POST['cmnd']) ? $_POST['cmnd'] : null;
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

    // Tạo mã mhv tự động
    $mhv_prefix = ""; // Khởi tạo prefix mã mhv
    $year_last_two = date('y'); // Lấy 2 số cuối của năm hiện tại
    $dob_last_two = substr($ngay_sinh, -2); // Lấy 2 số cuối của năm sinh học viên
    
    // Tạo mã mhv dựa trên giá trị của type_hv
    switch ($type_hv) {
        case '1':
            $mhv_prefix = "T1"; // Thiết lập prefix cho type_hv = 1
            break;
        case '3':
            $mhv_prefix = "T3"; // Thiết lập prefix cho type_hv = 3
            break;
        case 'dd':
            $mhv_prefix = "DD"; // Thiết lập prefix cho type_hv = dd
            break;
        default:
            // Xử lý nếu giá trị type_hv không hợp lệ
            break;
    }
    
    // Lấy số thứ tự vào từ CSDL
    $query_count = "SELECT COUNT(*) AS count FROM student WHERE type_hv = '$type_hv'";
    $result_count = mysqli_query($mysqli, $query_count);
    if ($result_count) {
        $row_count = mysqli_fetch_assoc($result_count);
        $order_index = sprintf('%03d', $row_count['count'] + 1);
        // Tiếp tục xử lý dữ liệu hoặc thêm vào cơ sở dữ liệu
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

// Thêm học viên vào cơ sở dữ liệu
$themsql = "INSERT INTO student (mhv, ho_ten, ngay_sinh, sdt, ho_chieu, CCCD, que_quan, ngay_thi, co_quan, ngay_DKXC, ngayXC, dukien_venuoc, nganh_nghe, xi_nghiep, nghiep_doan, noi_lam_viec, note, type_hv, ngay_nhaphoc, order_name, status)
    VALUES ('$mhv', '$ho_ten', '$ngay_sinh', '$sdt', '$ho_chieu', '$cmnd', '$que_quan', '$ngay_thi', '$co_quan', '$ngay_DKXC', '$ngayXC', '$dukien_venuoc', '$nganh_nghe', '$xi_nghiep', '$nghiep_doan', '$noi_lam_viec', '$note', '$type_hv', '$ngay_nhaphoc', '$order_name', '$status')";

$result = mysqli_query($mysqli, "SELECT * FROM student");

// Kiểm tra xem truy vấn SQL đã thành công hay không
if(mysqli_query($mysqli, $themsql)) {
    header("Location: ../../../index.php?chucnang=hocvien&success=1");
    exit;
} else {
    $error_message = "Lỗi khi thêm học viên: " . mysqli_error($mysqli);
    header("Location: ../../../index.php?chucnang=hocvien&error_message=" . urlencode($error_message));
    exit;
}

// Chuyển hướng trở lại trang danh sách học viên
header("Location: ../../../index.php?chucnang=hocvien");
?>
