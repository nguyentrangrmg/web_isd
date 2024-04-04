<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa thông tin học viên</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Chỉnh sửa thông tin học viên</h2>
        <?php
        // Include file cấu hình
        require 'config.php';

        // Kiểm tra xem biến $_GET['edit'] đã được truyền hay chưa
        if(isset($_GET['edit'])) {
            $mhv = $_GET['edit'];

            // Truy vấn thông tin học viên từ CSDL
            $query = "SELECT * FROM student WHERE mhv='$mhv'";
            $result = mysqli_query($mysqli, $query);
        // Kiểm tra kết quả truy vấn và hiển thị form chỉnh sửa
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        ?>
        <form action="modules/hocvien/edit/edit.php" method="POST">
            <input type="hidden" name="mhv" value="<?php echo $row['mhv']; ?>">
            <div class="form-group">
                <label for="ho_ten">Họ và Tên:</label>
                <input type="text" class="form-control" id="ho_ten" name="ho_ten" value="<?php echo $row['ho_ten']; ?>">
            </div>
            <div class="form-group">
                <label for="ngay_sinh">Ngày Sinh:</label>
                <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh" value="<?php echo $row['ngay_sinh']; ?>">
            </div>
            <div class="form-group">
                <label for="sdt">Số điện thoại:</label>
                <input type="text" class="form-control" id="sdt" name="sdt" value="<?php echo $row['sdt']; ?>">
            </div>
            <div class="form-group">
                <label for="ho_chieu">Hộ chiếu:</label>
                <input type="text" class="form-control" id="ho_chieu" name="ho_chieu" value="<?php echo $row['ho_chieu']; ?>">
            </div>
            <div class="form-group">
                <label for="CCCD">CCCD:</label>
                <input type="text" class="form-control" id="CCCD" name="CCCD" value="<?php echo $row['CCCD']; ?>">
            </div>
            <div class="form-group">
                <label for="que_quan">Quê quán:</label>
                <input type="text" class="form-control" id="que_quan" name="que_quan" value="<?php echo $row['que_quan']; ?>">
            </div>
            
            <div class="form-group">
                <input type="hidden" name="type_hv" value="<?php echo $row['type_hv']; ?>">
            </div>

            <div class="form-group">
                <input type="hidden" name="ngay_nhaphoc" value="<?php echo $row['ngay_nhaphoc']; ?>">
            </div>

            <div class="form-group">
                <label for="status">Trạng thái:</label>
                <input type="text" class="form-control" id="order_name" name="order_name" value="<?php echo $row['order_name']; ?>">
            </div>
            <div class="form-group">
                <label for="status">Trạng thái:</label>
                <input type="text" class="form-control" id="status" name="status" value="<?php echo $row['status']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="index.php" class="btn btn-secondary">Quay lại</a>
        </form>
        <?php
        }} else {
            echo "Không tìm thấy học viên.";
        }
        ?>
    </div>
</body>
</html>
