<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sửa thông tin học viên</title>
  <!-- Link CSS Bootstrap -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
  <div class="edit-form">
    <a href="?type=1" class="btn btn-primary mb-3">Trở về</a><br>
    <a style="font-size: 25px;">Chỉnh sửa thông tin học viên </a>
    <?php
        require 'config.php';
        if(isset($_GET['edit'])) {
            $mhv = $_GET['edit'];
            $query = "SELECT * FROM student WHERE mhv='$mhv'";
            $result = mysqli_query($mysqli, $query);
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        ?>
    <a>
      <?php if (isset($_GET['error_message'])) {
      $error_message = $_GET['error_message'];
      echo "<p style='color: red;'>$error_message</p>";
      }
      ?>
    </a>
    <form action="modules/hocvien/edit/edit.php?edit=sua&mhv=<?php echo $row['mhv']; ?>" method="POST" style="width: 1100px;" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-4">
            <label for="ho_ten" class="form-label">Mã học viên:</label>
            <input name="mhv" class="form-control" id="mhv" value="<?php echo $row['mhv']; ?>" disabled>
        </div>
        <div class="col-md-4">
            <label for="file_anh" class="form-label">Chọn file ảnh học viên:</label>
            <input type="file" class="form-control" id="file_anh" name="file_anh" accept="image/*">
        </div>
        <div class="col-md-4">
        <label for="file_anh" class="form-label"></label>
              <p><?php
              $anh_path = $row['file_anh'];           
              $target_dir = "modules/hocvien/anhhv/";
              $target_file = $target_dir.$anh_path;
               echo "<img src='".$target_file."' width='80px'>" ?></p>
        </div>
        <div class="col-md-4">
            <label for="ng_bao_lanh" class="form-label">Người bảo lãnh:</label>
            <input type="text" class="form-control" id="ng_bao_lanh" name="ng_bao_lanh">
        </div>
        <div class="col-md-4">
            <label for="gioi_tinh" class="form-label">Giới tính</label>
            <input type="text" class="form-control" id="gioi_tinh" name="gioi_tinh" maxlength="10">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
          <div class="mb-3">
            <label for="ho_ten" class="form-label">Họ và tên:</label>
            <input type="text" class="form-control" id="ho_ten" name="ho_ten" value="<?php echo $row['ho_ten']; ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label for="ngay_sinh" class="form-label">Ngày sinh:</label>
            <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh" value="<?php echo $row['ngay_sinh']; ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label for="sdt" class="form-label">Số điện thoại:</label>
            <input type="text" class="form-control" id="sdt" name="sdt" value="<?php echo $row['sdt']; ?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="mb-3">
            <label for="ho_chieu" class="form-label">Hộ chiếu:</label>
            <input type="text" class="form-control" id="ho_chieu" name="ho_chieu" value="<?php echo $row['ho_chieu']; ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label for="ngay_cap_hc" class="form-label">Ngày cấp Hộ chiếu:</label>
            <input type="date" class="form-control" id="ngay_cap_hc" name="ngay_cap_hc">
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label for="noi_cap_hc" class="form-label">Nơi cấp Hộ chiếu:</label>
            <input type="text" class="form-control" id="noi_cap_hc" name="noi_cap_hc">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="mb-3">
            <label for="CCCD" class="form-label">Căn cước công dân:</label>
            <input type="text" class="form-control" id="CCCD" name="CCCD" value="<?php echo $row['CCCD']; ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label for="ngay_cap_cccd" class="form-label">Ngày cấp CCCD:</label>
            <input type="date" class="form-control" id="ngay_cap_cccd" name="ngay_cap_cccd">
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label for="noi_cap_cccd" class="form-label">Nơi cấp CCCD:</label>
            <input type="text" class="form-control" id="noi_cap_cccd" name="noi_cap_cccd">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="mb-3">
            <label for="ho_khau" class="form-label">Hộ khẩu:</label>
            <input type="text" class="form-control" id="ho_khau" name="ho_khau">
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label for="dia_chi" class="form-label">Địa chỉ thường trú:</label>
            <input type="text" class="form-control" id="dia_chi" name="dia_chi">
          </div>
        </div>
        <div class="col-md-4">
          <div class="row">
            <div class="col-md-5">
              <label for="status" class="form-label">Trạng thái:</label>
              <select class="form-select" id="status" name="status" style="width:130px">
                <option value="Đang đào tạo" <?php if ($row['status'] == 'Đang đào tạo') echo 'selected'; ?>>Đang đào tạo</option>
                <option value="Đang làm việc" <?php if ($row['status'] == 'Đang làm việc') echo 'selected'; ?>>Đang làm việc</option>
                <option value="Đã về nước" <?php if ($row['status'] == 'Đã về nước') echo 'selected'; ?>>Đã về nước</option>
              </select>
            </div>
            <div class="col-md-4">
              <label for="type_hv" class="form-label">Kiểu học viên:</label>
              <select class="form-select" id="type_hv" name="type_hv" style="width:180px">
                    <option value="1" <?php if ($row['type_hv'] == '1') echo 'selected'; ?>>Thực tập sinh số 1</option>
                    <option value="3" <?php if ($row['type_hv'] == '3') echo 'selected'; ?>>Thực tập sinh số 3</option>
                    <option value="dd" <?php if ($row['type_hv'] == 'dd') echo 'selected'; ?>>Kỹ năng đặc định</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
    <div class="col-md-4">
        <div class="mb-3">
            <label for="ngay_thi" class="form-label">Ngày thi tuyển:</label>
            <input type="date" class="form-control" id="ngay_thi" name="ngay_thi" value="<?php echo $row['ngay_thi']; ?>">
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="ngay_nhaphoc" class="form-label">Ngày nhập học:</label>
            <input type="date" class="form-control" id="ngay_nhaphoc" name="ngay_nhaphoc" value="<?php echo $row['ngay_nhaphoc']; ?>">
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="order_name" class="form-label">Tên đơn hàng:</label>
            <input type="text" class="form-control" id="order_name" name="order_name" value="<?php echo $row['order_name']; ?>">
        </div>
    </div>
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
</div>

<!-- Link JS Bootstrap (nếu cần) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>