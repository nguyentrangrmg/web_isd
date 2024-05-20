<?php
// Kiểm tra xem có dữ liệu gửi từ AJAX không
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["popup1_data"]) && isset($_POST["popup2_data"])) {
    // Lấy dữ liệu được gửi từ AJAX
    $popup1_data = json_decode($_POST["popup1_data"], true);
    $popup2_data = json_decode($_POST["popup2_data"], true);

    // Lưu trữ tất cả các giá trị vào mảng $all_values
    $all_values = array_merge($popup1_data, $popup2_data);

    // Duyệt qua tất cả các giá trị và gán chúng vào các biến tương ứng
    foreach ($all_values as $key => $value) {
        ${'value_' . $key} = $value;
    }

    // In ra tất cả các giá trị đã lưu
    echo "Tất cả các giá trị:<br>";
    foreach ($all_values as $key => $value) {
        echo $key . ": " . $value . "<br>";
    }

    // In ra các biến đã được tạo và gán giá trị
    echo "<br>Các biến đã được tạo:<br>";
    foreach ($all_values as $key => $value) {
        echo '$value_' . $key . " = " . ${'value_' . $key} . "<br>";
    }
} else {
    // Trường hợp không có dữ liệu gửi từ AJAX
    echo "Không có dữ liệu được gửi.";
}
?>
