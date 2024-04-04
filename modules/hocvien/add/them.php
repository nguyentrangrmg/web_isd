<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm học viên</title>
  <!-- Link CSS Bootstrap -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
  <div class="add-form">
    <a href="?type=1" class="btn btn-primary mb-3">Trở về</a><br>
    <a style="font-size: 25px;">Tạo Mới Học Viên</a>
    <a>
      <?php if (isset($_GET['error_message'])) {
      $error_message = $_GET['error_message'];
      echo "<p style='color: red;'>$error_message</p>";
      }
      ?>
    </a>
    <form action="modules/hocvien/add/add.php" method="POST">
      <div class="row">
        <div class="col-md-4">
          <div class="mb-3">
            <label for="ho_ten" class="form-label">Họ và tên:</label>
            <input type="text" class="form-control" id="ho_ten" name="ho_ten">
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label for="ngay_sinh" class="form-label">Ngày sinh:</label>
            <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh">
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label for="sdt" class="form-label">Số điện thoại:</label>
            <input type="tel" class="form-control" id="sdt" name="sdt">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="mb-3">
            <label for="ho_chieu" class="form-label">Hộ chiếu:</label>
            <input type="text" class="form-control" id="ho_chieu" name="ho_chieu">
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
            <label for="cmnd" class="form-label">Căn cước công dân:</label>
            <input type="text" class="form-control" id="cmnd" name="cmnd">
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label for="ngay_cap_cmnd" class="form-label">Ngày cấp CMND:</label>
            <input type="date" class="form-control" id="ngay_cap_cmnd" name="ngay_cap_cmnd">
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label for="noi_cap_cmnd" class="form-label">Nơi cấp CMND:</label>
            <input type="text" class="form-control" id="noi_cap_cmnd" name="noi_cap_cmnd">
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
            <div class="col-md-4">
              <label for="status" class="form-label">Trạng thái:</label>
              <select class="form-select" id="status" name="status">
                <option value="option1">Trạng thái 1</option>
                <option value="option2">Trạng thái 2</option>
                <option value="option3">Đã trốn học</option>
                <option value="option4">Đang đào tạo</option>
              </select>
            </div>
            <div class="col-md-4">
              <label for="type_hv" class="form-label">Kiểu học viên:</label>
              <select class="form-select" id="type_hv" name="type_hv">
                <option value="1">Thực tập sinh số 1</option>
                <option value="3">Thực tập sinh số 3</option>
                <option value="dd">Kỹ năng đặc định</option>
              </select>
            </div>
            <div class="col-md-4">
              <label for="file_anh" class="form-label">Chọn file ảnh học viên:</label>
              <input type="file" class="form-control" id="file_anh" name="file_anh">
            </div>
          </div>
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
            <input type="text" class="form-control" id="order_name" name="order_name">
        </div>
    </div>
    </div>
      <button type="submit" class="btn btn-success">Thêm</button>
    </form>
  </div>
</div>

<!-- Link JS Bootstrap (nếu cần) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>
