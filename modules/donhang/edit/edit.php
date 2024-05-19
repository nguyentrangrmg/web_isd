<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm đơn hàng</title>
  <!-- Link CSS Bootstrap -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
        require 'config.php';
        if(isset($_GET['edit_dh'])) {
            $mdh = $_GET['edit_dh'];
            $query = "SELECT * FROM jporder WHERE mdh='$mdh'";
            // $query2 = "SELECT * FROM baolanh WHERE mhv='$mhv'";
            $result = mysqli_query($mysqli, $query);
            // $re=mysqli_query($mysqli,$query2);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            // $row2 = mysqli_fetch_assoc($re);
        ?>
    <a>
      <?php if (isset($_GET['error_message'])) {
      $error_message = $_GET['error_message'];
      echo "<p style='color: red;'>$error_message</p>";
      }
      ?>
      <div class="function" style="overflow: hidden;">
    <a href="?typedh=1" style="float: left;"><button class="nut-back"><i class="fas fa-long-arrow-alt-left"></i></button></a>
    <div style="float: right;">
        <a href="?function=themdh" ><button class="nut-them">Tạo mới</button></a>
        <a href="#"><button class="nut-xoa">Xóa</button></a>
        <a href="#" onclick="xuatfile()"><button class="nut-xuat">Xuất Excel</button></a>  
        <input type="text" class="search-input" placeholder="Search..." style="vertical-align: middle;">
        <i class="fas fa-search search-icon" style="vertical-align: middle;"></i>
    </div>
</div>
<div class="container">
  <div class="add-form">
    <a style="font-size: 25px; font-weight: bold;color: #374375;">Tạo Mới Đơn Hàng</a>
    <a style="font-style: italic;margin-left:10px;font-size:12px"> Vui lòng nhập các trường thông tin bắt buộc ( <strong style="color: red;">*</strong> ) </a>
    <br>
    <br>
    <form action="modules/donhang/add/adddh.php" method="POST" enctype="multipart/form-data">
    <div class="row">
       <div class="col-md-4">
              <label for="type_hv" class="form-label">Chọn loại đơn hàng:</label>
              <select class="form-select" id="type_hv" name="type_hv">
                <option value="1" <?php if($row['type_hv']='1'){echo "selected";} ?>>Thực tập sinh số 1</option>
                <option value="3" <?php if($row['type_hv']='3'){echo "selected";} ?>>Thực tập sinh số 3</option>
                <option value="dd" <?php if($row['type_hv']='dd'){echo "selected";} ?>>Kỹ năng đặc định</option>
              </select>
            </div>
    </div>
    <div class="row">
        <div class="col-md-4">
          <div class="mb-3">
            <label for="ten_dh" class="form-label">Tên đơn hàng:</label>
            <input type="text" class="form-control" id="ten_dh" name="ten_dh" maxlength="50" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label for="nghiep_doan" class="form-label">Nghiệp đoàn:</label>
            <input type="text" class="form-control" id="nghiep_doan" name="nghiep_doan" required title="Nghiệp đoàn không được bỏ trống!">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="mb-3">
            <label for="xi_nghiep" class="form-label">Xí nghiệp:</label>
            <input type="text" class="form-control" id="xi_nghiep" name="xi_nghiep" maxlength="50" require title="Xí nghiệp không được bỏ trống!">
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label for="ngay_cap_hc" class="form-label">Giám đốc:</label>
            <input type="text" class="form-control" id="ngay_cap_hc" name="ngay_cap_hc">
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label for="sdt_gd" class="form-label">SĐT:</label>
            <input type="tel" class="form-control" id="sdt_gd" name="sdt_gd" maxlength="10" pattern="[0-9]{+}" required title="Vui lòng nhập chữ số.">
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label for="dia_chi" class="form-label">Địa chỉ:</label>
            <input type="text" class="form-control" id="dia_chi" name="dia_chi">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="mb-3">
            <label for="cccd" class="form-label">Căn cước công dân:</label>
            <input type="text" class="form-control" id="cccd" name="cccd" maxlength="12"  title="Vui lòng nhập chữ số.">
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
            <input type="text" class="form-control" id="noi_cap_cccd" name="noi_cap_cccd" maxlength="50">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="mb-3">
            <label for="nganh_nghe" class="form-label">Ngành nghề:</label>
            <input type="text" class="form-control" id="nganh_nghe" name="nganh_nghe" maxlength="50">
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label for="dia_chi" class="form-label">Dự kiến thi tuyển:</label>
            <input type="text" class="form-control" id="dia_chi" name="dia_chi" maxlength="50">
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label for="dia_chi" class="form-label">Ngày thi tuyển:</label>
            <input type="date" class="form-control" id="nganh_nghe" name="nganh_nghe" maxlength="50">
          </div>
        </div>
        <div class="col-md-4">
              <label for="status" class="form-label">Trạng thái:</label>
              <select class="form-select" id="status" name="status">
                <option value="Đang đào tạo">Đang đào tạo</option>
                <option value="Đang làm việc">Đang làm việc</option>
                <option value="Đã về nước">Đã về nước</option>
              </select>
        </div>
      </div>
      <div class="row">
    <div class="col-md-4">
        <div class="mb-3">
            <label for="ngay_thi" class="form-label">Ngày thi tuyển:</label>
            <input type="date" class="form-control" id="ngay_thi" name="ngay_thi">
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="ngay_nhaphoc" class="form-label">Ngày nhập học:</label>
            <input type="date" class="form-control" id="ngay_nhaphoc" name="ngay_nhaphoc">
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3">
            <label for="order_name" class="form-label">Tên đơn hàng:</label>
            <input type="text" class="form-control" id="order_name" name="order_name" maxlength="20">
        </div>
    </div>
    </div>
    <div style="text-align: right; margin-top: 10px;">
    <button type="submit" class="btn btn-primary" style="font-size: 15px;">Tạo</button>
    </div>
    </form>
    <?php
        }} else {
            echo "Không tìm thấy đơn hàng.";
        }
        ?>
  </div>
</div>

<!-- Link JS Bootstrap (nếu cần) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>
