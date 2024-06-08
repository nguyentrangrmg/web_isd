<?php
require '../../../config.php';
    // Kiểm tra nếu có dữ liệu được gửi từ form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy giá trị của các trường input từ biến POST
        $xi_nghiep = $_POST['xi_nghiep'];
        $ten_giam_doc = $_POST['ten_giam_doc'];
        $sdt = $_POST['sdt'];
        $dia_chi_xn = $_POST['dia_chi_xn'];
        $nghiep_doan = $_POST['nghiep_doan'];

        // Lọc bỏ các giá trị trống từ mảng ngành nghề và nơi làm việc
    $nganh_nghe_values = implode("; ", array_filter($_POST['nganh_nghe'], 'strlen'));
    $noi_lam_viec_values = "(" . implode(")(", array_filter($_POST['noi_lam_viec'], 'strlen')) . ")";

    function getMaxLastThreeDigits($mysqli)
    {
        $max_last_three_digits = 0;

        // Lấy 3 số cuối lớn nhất
        $query_order = "SELECT MAX(CAST(SUBSTRING(mdn, -3) AS UNSIGNED)) AS max_digits FROM enterprise";
        $result_order = mysqli_query($mysqli, $query_order);
        $row_order = mysqli_fetch_assoc($result_order);
        $max_last_three_digits_order = intval($row_order['max_digits']);

        // Lấy 3 số cuối lớn nhất
        $query_bin_order = "SELECT MAX(CAST(SUBSTRING(mdn, -3) AS UNSIGNED)) AS max_digits FROM bin_xn";
        $result_bin_order = mysqli_query($mysqli, $query_bin_order);
        $row_bin_order = mysqli_fetch_assoc($result_bin_order);
        $max_last_three_digits_bin_order = intval($row_bin_order['max_digits']);

        // So sánh và lấy số lớn hơn
        $max_last_three_digits = max($max_last_three_digits_order, $max_last_three_digits_bin_order);

        return $max_last_three_digits;
    }
      $order_index = getMaxLastThreeDigits($mysqli) + 1;
      $first_three_chars = strtoupper(substr($xi_nghiep, 0, 3));
      if ($order_index === null || $order_index < 1) {
        $order_index = 1;
    }
    $order_index = sprintf('%03d', $order_index);
    $mdn = $first_three_chars . $order_index;

    $select_query = "SELECT * FROM enterprise WHERE xi_nghiep = '$xi_nghiep'";

    // Thực thi câu truy vấn SELECT
    $result = mysqli_query($mysqli, $select_query);
    if (mysqli_num_rows($result) > 0) {
        // Nếu có, xi_nghiep đã tồn tại trong bảng enterprise
        $message = "Xí nghiệp đã tồn tại.";
        header("Location: ../../../index.php?chucnang=xinghiep");
    }else {
    // Nếu không, tiến hành thực hiện câu truy vấn INSERT
        $insert_query = "INSERT INTO enterprise (mdn, xi_nghiep, ten_giam_doc, nganh_nghe_e, nghiep_doan, 
        sdt_xn, dia_chi_xn, noi_lam_viec) 
        VALUES ('$mdn', '$xi_nghiep', '$ten_giam_doc', '$nganh_nghe_values', '$nghiep_doan', '$sdt', 
        '$dia_chi_xn', '$noi_lam_viec_values')";

        // Thực thi truy vấn INSERT
        if (mysqli_query($mysqli, $insert_query)) {
            $message = "Thêm xí nghiệp thành công.";
            header("Location: ../../../index.php?chucnang=xinghiep&success_message=" . urlencode($success_message));
        } else {
            $error_message = "Lỗi: " . $insert_query . "<br>" . mysqli_error($mysqli);
            header("Location: ../../../index.php?chucnang=xinghiep");
        }
    }
        // Đóng kết nối với cơ sở dữ liệu
        mysqli_close($mysqli);
    }
    ?>