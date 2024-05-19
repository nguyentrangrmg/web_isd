<?php 
include ('../../../config.php');
if(isset($_POST['checkbox'][0])){
    foreach($_POST['checkbox']as $list){
        $id = mysqli_real_escape_string($mysqli, $list);

        // Truy vấn SQL để lấy ra cột 'xi_nghiep' từ bảng 'bin_xn' dựa trên 'mdn'
        $bin_xn_query = "SELECT xi_nghiep FROM bin_xn WHERE mdn = '$id'";
        $bin_xn_result = mysqli_query($mysqli, $bin_xn_query);

        if ($bin_xn_result) {
            while ($row = mysqli_fetch_assoc($bin_xn_result)) {
                $xi_nghiep = $row['xi_nghiep'];
                
                // Truy vấn SQL để xóa dữ liệu từ 'bin_xn' dựa trên 'xi_nghiep'
                mysqli_query($mysqli, "DELETE FROM bin_xn WHERE mdn = '$id'");
                
                // Truy vấn SQL để xóa dữ liệu từ 'jporder' dựa trên 'xi_nghiep'
                mysqli_query($mysqli, "DELETE FROM jporder WHERE xi_nghiep = '$xi_nghiep'");
            }
            // Giải phóng bộ nhớ sau khi sử dụng kết quả truy vấn
            mysqli_free_result($bin_xn_result);
        } else {
            echo "Error: " . mysqli_error($mysqli);
        }
    }
}
if (isset($_POST['delete'])) {
    $mdn = $_POST['delete'];
    
    // Xóa dữ liệu từ bảng bin_xn
    $sql_bin_xn = "DELETE FROM bin_xn WHERE mdn = ?";
    $stmt_bin_xn = mysqli_prepare($mysqli, $sql_bin_xn);
    
    // Xóa dữ liệu từ bảng jporder
    $sql_jporder = "DELETE jporder FROM jporder 
                    INNER JOIN bin_xn ON jporder.xi_nghiep = bin_xn.xi_nghiep 
                    WHERE bin_xn.mdn = ?";
    $stmt_jporder = mysqli_prepare($mysqli, $sql_jporder);
    
    if ($stmt_bin_xn && $stmt_jporder) {
        mysqli_stmt_bind_param($stmt_bin_xn, "s", $mdn);
        mysqli_stmt_bind_param($stmt_jporder, "s", $mdn);
        
        if (mysqli_stmt_execute($stmt_bin_xn) && mysqli_stmt_execute($stmt_jporder)) {
            echo "Dữ liệu từ bảng 'bin_xn' và 'jporder' đã được xóa thành công.";
        } else {
            echo "Đã xảy ra lỗi khi xóa dữ liệu từ bảng 'bin_xn' và 'jporder': " . mysqli_error($mysqli);
        }

        mysqli_stmt_close($stmt_bin_xn);
        mysqli_stmt_close($stmt_jporder);
    } else {
        echo "Đã xảy ra lỗi khi chuẩn bị câu lệnh SQL: " . mysqli_error($mysqli);
    }
}



?>