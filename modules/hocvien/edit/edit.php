<?php
    require '../../../config.php';

    // Kiểm tra nếu có yêu cầu post từ form chỉnh sửa
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['mhv'])) {
        // Lấy thông tin từ form
        $mhv = $_GET['mhv'];
        $ho_ten = $_POST['ho_ten'];
        $ngay_sinh = $_POST['ngay_sinh'];
        $sdt = $_POST['sdt'];
        $ho_chieu = isset($_POST['ho_chieu']) ? $_POST['ho_chieu'] : null;
        $CCCD = isset($_POST['CCCD']) ? $_POST['CCCD'] : null;
        $gioi_tinh = isset($_POST['gioi_tinh']) ? $_POST['gioi_tinh'] : null;
        $ho_khau = isset($_POST['ho_khau']) ? $_POST['ho_khau'] : null;
        $que_quan = isset($_POST['que_quan']) ? $_POST['que_quan'] : null;
        $ngay_thi = isset($_POST['ngay_thi']) ? $_POST['ngay_thi'] : null;
        $co_quan = isset($_POST['co_quan']) ? $_POST['co_quan'] : null;
        $ngay_DKXC = isset($_POST['ngay_DKXC']) ? $_POST['ngay_DKXC'] : null;
        $ngayXC = isset($_POST['ngayXC']) ? $_POST['ngayXC'] : null;
        $ng_bao_lanh = isset($_POST['ng_bao_lanh']) ? $_POST['ng_bao_lanh'] : null;
        $dukien_venuoc = isset($_POST['dukien_venuoc']) ? $_POST['dukien_venuoc'] : null;
        $nganh_nghe = isset($_POST['nganh_nghe']) ? $_POST['nganh_nghe'] : null;
        $xi_nghiep = isset($_POST['xi_nghiep']) ? $_POST['xi_nghiep'] : null;
        $nghiep_doan = isset($_POST['nghiep_doan']) ? $_POST['nghiep_doan'] : null;
        $noi_lam_viec = isset($_POST['noi_lam_viec']) ? $_POST['noi_lam_viec'] : null;
        $note = isset($_POST['note']) ? $_POST['note'] : null;
        $type_hv = isset($_POST['type_hv']) ? $_POST['type_hv'] : null;
        $ngay_nhaphoc = isset($_POST['ngay_nhaphoc']) ? $_POST['ngay_nhaphoc'] : null;
        $order_name = isset($_POST['order_name']) ? $_POST['order_name'] : null;
        $status = $_POST['status'];

        $sql_select_old_image = "SELECT file_anh FROM student WHERE mhv='$mhv'";
        $result_old_image = mysqli_query($mysqli, $sql_select_old_image);
        //ảnh
        $anh_path=basename($_FILES['file_anh']['name']);
        $target_dir = "../anhhv/";
        $target_file = $target_dir.$anh_path;

        if (!empty($_FILES['file_anh']['name'])) {
            // Nếu có, di chuyển tệp ảnh mới vào thư mục đích
            $anh_path = basename($_FILES['file_anh']['name']);
            $target_dir = "../anhhv/";
            $target_file = $target_dir.$anh_path;
    
            if (move_uploaded_file($_FILES['file_anh']['tmp_name'], $target_file)) {
                // Xóa ảnh cũ nếu có
                if ($result_old_image && mysqli_num_rows($result_old_image) > 0) {
                    $row_old_image = mysqli_fetch_assoc($result_old_image);
                    $old_image_path = $target_dir . $row_old_image['file_anh'];
                    if (file_exists($old_image_path)) {
                        unlink($old_image_path);
                    }
                }
            } else {
                echo "Ảnh bị làm sao ý. Lỗi: " . $_FILES['file_anh']['error'];
            }
        } else {
            // Nếu không có tệp ảnh mới, giữ nguyên tên file ảnh cũ
            if ($result_old_image && mysqli_num_rows($result_old_image) > 0) {
                $row_old_image = mysqli_fetch_assoc($result_old_image);
                $anh_path = $row_old_image['file_anh'];
            } else {
                // Xử lý trường hợp không tìm thấy dữ liệu về file ảnh cũ trong CSDL
                $anh_path = ''; // hoặc gán cho $anh_path bằng giá trị mặc định nếu không tìm thấy
            }
        }
        // Cập nhật thông tin học viên trong CSDL
        $sql = "UPDATE student SET 
            ng_bao_lanh='$ng_bao_lanh',
            gioi_tinh='$gioi_tinh',
            ho_khau='$ho_khau',
            ho_ten='$ho_ten',
            ngay_sinh='$ngay_sinh',
            sdt='$sdt',
            ho_chieu='$ho_chieu',
            CCCD='$CCCD',
            que_quan='$que_quan',
            ngay_thi='$ngay_thi',
            co_quan='$co_quan',
            ngay_DKXC='$ngay_DKXC',
            ngayXC='$ngayXC',
            dukien_venuoc='$dukien_venuoc',
            nganh_nghe='$nganh_nghe',
            xi_nghiep='$xi_nghiep',
            nghiep_doan='$nghiep_doan',
            noi_lam_viec='$noi_lam_viec',
            note='$note',
            type_hv='$type_hv',
            ngay_nhaphoc='$ngay_nhaphoc',
            order_name='$order_name',
            status='$status',
            file_anh='$anh_path'
            WHERE mhv='$mhv'";

        if (mysqli_query($mysqli, $sql)) {
            echo "Cập nhật thông tin thành công.";
        } else {
            echo "Lỗi: " . mysqli_error($mysqli);
        }
    }
    header("Location: ../../../index.php?chucnang=hocvien");
?>
