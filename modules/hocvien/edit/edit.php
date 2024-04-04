<?php
    require '../../../config.php';

    // Kiểm tra nếu có yêu cầu post từ form chỉnh sửa
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy thông tin từ form
        $mhv = $_POST['mhv'];
        $ho_ten = $_POST['ho_ten'];
        $ngay_sinh = $_POST['ngay_sinh'];
        $sdt = $_POST['sdt'];
        $ho_chieu = isset($_POST['ho_chieu']) ? $_POST['ho_chieu'] : null;
        $cmnd = isset($_POST['CCCD']) ? $_POST['CCCD'] : null;
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
        $type_hv = isset($_POST['type_hv']) ? $_POST['type_hv'] : null; // Kiểm tra xem type_hv có tồn tại trong $_POST không
        $ngay_nhaphoc = isset($_POST['ngay_nhaphoc']) ? $_POST['ngay_nhaphoc'] : null; // Kiểm tra xem ngay_nhaphoc có tồn tại trong $_POST không
        $order_name = isset($_POST['order_name']) ? $_POST['order_name'] : null; // Kiểm tra xem order_name có tồn tại trong $_POST không
        $status = $_POST['status'];

        // Cập nhật thông tin học viên trong CSDL
        $sql = "UPDATE student SET ho_ten='$ho_ten', ngay_sinh='$ngay_sinh', sdt='$sdt', ho_chieu='$ho_chieu', CCCD='$cmnd', que_quan='$que_quan', ngay_thi='$ngay_thi', co_quan='$co_quan', ngay_DKXC='$ngay_DKXC', ngayXC='$ngayXC', dukien_venuoc='$dukien_venuoc', nganh_nghe='$nganh_nghe', xi_nghiep='$xi_nghiep', nghiep_doan='$nghiep_doan', noi_lam_viec='$noi_lam_viec', note='$note', type_hv='$type_hv', ngay_nhaphoc='$ngay_nhaphoc', order_name='$order_name', status='$status' WHERE mhv='$mhv'";

        if (mysqli_query($mysqli, $sql)) {
            echo "Cập nhật thông tin thành công.";
        } else {
            echo "Lỗi: " . mysqli_error($mysqli);
        }
    }
    header("Location: ../../../index.php?chucnang=hocvien");
?>
