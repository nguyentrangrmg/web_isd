<?php
    require '../../../config.php';

    // Kiểm tra nếu có yêu cầu post từ form chỉnh sửa
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['mhv'])) {
        // Lấy thông tin từ form
        $mhv=$_GET['mhv'];
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
        $ngay_nhaphoc = $_POST['ngay_nhaphoc'];
        $status = $_POST['status'];

        //bao lanh
        $ten = $_POST['ten'];
        $dob = $_POST['dob'];
        $sdt_bl = $_POST['sdt_bl'];
        $ho_khau_bl = $_POST['ho_khau_bl'];
        $dia_chi_bl = $_POST['dia_chi_bl'];
        $quan_he = $_POST['quan_he'];

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
        ho_ten = '$ho_ten', 
        ngay_sinh = '$ngay_sinh', 
        gioi_tinh = '$gioi_tinh', 
        sdt = '$sdt', 
        ho_chieu = '$ho_chieu', 
        ngay_cap_hc = '$ngay_cap_hc', 
        noi_cap_hc = '$noi_cap_hc', 
        CCCD = '$cccd', 
        ngay_cap_cccd = '$ngay_cap_cccd', 
        ho_khau = '$ho_khau', 
        dia_chi = '$dia_chi', 
        ngay_thi = '$ngay_thi', 
        ngay_DKXC = '$ngay_DKXC', 
        ngayXC = '$ngayXC', 
        dukien_venuoc = '$dukien_venuoc', 
        noi_cap_cccd = '$noi_cap_cccd', 
        note = '$note', 
        ngay_nhaphoc = '$ngay_nhaphoc', 
        status = '$status', 
        file_anh = '$anh_path', 
        lich_su_xk = '$lich_su_xk' 
        WHERE mhv = '$mhv'";
    

        $sql1="UPDATE baolanh SET 
        ten='$ten',
        dob='$dob',
        sdt_bl='$sdt_bl',
        ho_khau_bl='$ho_khau_bl',
        dia_chi_bl='$dia_chi_bl',
        quan_he='$quan_he'
        WHERE mhv='$mhv'";

        if ((mysqli_query($mysqli, $sql))&& (mysqli_query($mysqli, $sql1))) {
            echo "Cập nhật thông tin thành công.";
        } else {
            echo "Lỗi: " . mysqli_error($mysqli);
        }
    }
    header("Location: ../../../index.php?chucnang=hocvien");
?>
