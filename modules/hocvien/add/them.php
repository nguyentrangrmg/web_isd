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
    <form action="modules/hocvien/add/add.php" method="POST" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-4">
                <label for="file_anh" class="form-label">Chọn file ảnh học viên:</label>
                <input type="file" class="form-control" name="file_anh" id="file_anh">
       </div>
       <div class="col-md-4">
              <label for="type_hv" class="form-label">Kiểu học viên:</label>
              <select class="form-select" id="type_hv" name="type_hv">
                <option value="1">Thực tập sinh số 1</option>
                <option value="3">Thực tập sinh số 3</option>
                <option value="dd">Kỹ năng đặc định</option>
              </select>
            </div>
    </div>
    <div class="row">
        <div class="col-md-4">
          <div class="mb-3">
            <label for="ho_ten" class="form-label">Họ và tên:</label>
            <input type="text" class="form-control" id="ho_ten" name="ho_ten" maxlength="50">
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label for="ngay_sinh" class="form-label">Ngày sinh:</label>
            <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh" required title="Ngày sinh không được bỏ trống!">
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label for="sdt" class="form-label">Số điện thoại:</label>
            <input type="tel" class="form-control" id="sdt" name="sdt" maxlength="10" pattern="[0-9]{+}" required title="Vui lòng nhập chữ số.">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="mb-3">
            <label for="ho_chieu" class="form-label">Hộ chiếu:</label>
            <input type="text" class="form-control" id="ho_chieu" name="ho_chieu" maxlength="8">
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
            <input type="text" class="form-control" id="noi_cap_hc" name="noi_cap_hc" maxlength="50">
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
            <label for="ho_khau" class="form-label">Hộ khẩu:</label>
            <input type="text" class="form-control" id="ho_khau" name="ho_khau" maxlength="50">
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label for="dia_chi" class="form-label">Địa chỉ thường trú:</label>
            <input type="text" class="form-control" id="dia_chi" name="dia_chi" maxlength="50">
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
      <button type="submit" class="btn btn-success">Thêm</button>
    </form>
  </div>
</div>

<!-- Link JS Bootstrap (nếu cần) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>
