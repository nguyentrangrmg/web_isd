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
  <!-- Menu -->
  <div class="loai_hv">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#" style="text-decoration: none;color:black" >Thực tập sinh số 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" style="text-decoration: none;color:black" >Thực tập sinh số 3</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" style="text-decoration: none;color:black" >Kỹ năng đặc định</a>
            </li>
        </ul>
    </div>
    <div class="function" style="overflow: hidden;">
    <a href="?type=1" style="float: left;"><button class="nut-back"><i class="fas fa-long-arrow-alt-left"></i></button></a>
    <div style="float: right;">
        <a href="?function=them" ><button class="nut-them">Tạo mới</button></a>
        <a href="javascript:void(0)" onclick="delete_all()"><button class="nut-xoa">Xóa</button></a>
        <a href="javascript:void(0)" onclick="xuatfile()"><button class="nut-xuat">Xuất Excel</button></a>  
        <input type="text" class="search-input" placeholder="Search..." style="vertical-align: middle;">
        <i class="fas fa-search search-icon" style="vertical-align: middle;"></i>
    </div>
</div>

<div class="container">
  <div class="add-form">
    <a style="font-size: 20px; font-weight: bold;color: #374375;">Tạo Mới Học Viên</a>
    <a style="font-style: italic;margin-left:10px;font-size:12px"> Vui lòng nhập các trường thông tin bắt buộc ( <strong style="color: red;">*</strong> ) </a>
    <br>
    <br>
    <form action="modules/hocvien/add/add.php" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-4">
              <label for="type_hv" class="form-label">Chọn loại học viên:<code>*</code></label>
              <select class="form-select" id="type_hv" name="type_hv">
                <option value="1">Thực tập sinh số 1</option>
                <option value="3">Thực tập sinh số 3</option>
                <option value="dd">Kỹ năng đặc định</option>
              </select>
        </div>
      </div>
      <br>
    <div class="col-14 grid-margin">
        <div class="card">
            <div class="card-body">
                <h6 style="font-weight: bold; color: #374375;">Học viên</h6>
                    <p class="card-description col-form-label">
                        Thông tin cơ bản
                    </p>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-9" for="ho_ten">Họ và tên<code>*</code></label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="ho_ten" name="ho_ten" maxlength="50" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label for="gioi_tinh" class="col-sm-9">Giới
                                    tính<code>*</code></label>
                                <div class="col-sm-12">
                                    <select class="form-select" id="gioi_tinh" name="gioi_tinh" required>
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label for="ngay_sinh" class="col-sm-9">Ngày
                                    Sinh<code>*</code></label>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control" id="ngay_sinh"
                                    name="ngay_sinh" required title="Ngày sinh không được bỏ trống!"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="sdt" class="col-sm-9">Số điện thoại<code>*</code></label>
                                    <div class="col-sm-12">
                                        <input type="tel" class="form-control" id="sdt" name="sdt" maxlength="10" pattern="[0-9]+" required title="Vui lòng điền đúng định dạng số!"/>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label for="ho_chieu" class="col-sm-9">Hộ Chiếu</label>
                                <div class="col-sm-12">
                                <input type="text" class="form-control" id="ho_chieu" name="ho_chieu" maxlength="8">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label for="ngay_cap_hc" class="col-sm-9">Ngày cấp</label>
                                <div class="col-sm-12">
                                <input type="date" class="form-control" 
                                id="ngay_cap_hc" name="ngay_cap_hc">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-9" for="noi_cap_hc">Nơi cấp</label>
                                <div class="col-sm-12">
                                      <input type="text" class="form-control" id="noi_cap_hc" name="noi_cap_hc" maxlength="50">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label for="cccd" class="col-sm-9">Căn cước công
                                    dân<code>*</code></label>
                                <div class="col-sm-12">
                                <input type="text" class="form-control" id="cccd" name="cccd" maxlength="12" required title="Vui lòng nhập chữ số.">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label for="ngay_cap_cccd" class="col-sm-9">Ngày cấp<code>*</code></label>
                                <div class="col-sm-12">
                                <input type="date" class="form-control" id="ngay_cap_cccd" name="ngay_cap_cccd" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label for="noi_cap_cccd" class="col-sm-9" for="phone_number">Nơi cấp</label>
                                <div class="col-sm-12">
                                <input type="text" class="form-control" id="noi_cap_cccd" name="noi_cap_cccd" maxlength="50">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-9" for="status">Trạng
                                    thái<code>*</code></label>
                                <div class="col-sm-12">
                                <select class="form-select" id="status" name="status">
                                    <option value="Đang đào tạo">Đang đào tạo</option>
                                    <option value="Đang làm việc">Đang làm việc</option>
                                    <option value="Đã về nước">Đã về nước</option>
                                </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group row ">
                                <label for="file_anh" class="col-sm-9">Ảnh học viên <code>*</code> <span
                                        class="card-description"
                                        style="font-style: italic;">(Ảnh 4x6, kích thước tối đa
                                        50MB)</span></label>
                                        <div class="anh"><input type="file" class="form-control" name="file_anh" id="file_anh" required></div>
                            </div>
                        </div>
                    </div>
                    <p class="card-description col-form-label">
                        Địa chỉ
                    </p>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group row">
                                <label for="ho_khau" class="col-sm-9">Hộ khẩu<code>*</code></label>
                                <div class="col-sm-12">
                                <input type="text" class="form-control" id="ho_khau" name="ho_khau" maxlength="100" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group row">
                                <label for="dia_chi" class="col-sm-9">Địa chỉ thường trú</label>
                                <div class="col-sm-12">
                                <input type="text" class="form-control" id="dia_chi" name="dia_chi" maxlength="50">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-14 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h5 style="font-weight: bold;">Người bảo lãnh</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="ten" class="col-sm-9">Họ và tên<code>*</code></label>
                                    <div class="col-sm-12">
                                        <input type="text" id="ten" name="ten" class="form-control" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-9">Ngày sinh<code>*</code></label>
                                    <div class="col-sm-12">
                                        <input type="date" id="dob" name="dob" class="form-control" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-9" for="sdt_bl">Số điện thoại<code>*</code></label>
                                    <div class="col-sm-12">
                                        <input type="tel" id="sdt_bl" name="sdt_bl" class="form-control"
                                            pattern="[0-9]+" required />
                                        <!-- require number -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row">
                                    <label for="quan_he" class="col-sm-9">Quan hệ học viên</label>
                                    <div class="col-sm-12">
                                        <input type="text" id="quan_he" name="quan_he" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row">
                                    <label for="ho_khau_bl" class="col-sm-9">Hộ khẩu</label>
                                    <div class="col-sm-12">
                                        <input type="text" id="ho_khau_bl" name="ho_khau_bl" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row">
                                    <label for="dia_chi_bl" class="col-sm-9">Địa chỉ thường trú</label>
                                    <div class="col-sm-12">
                                        <input type="text" id="dia_chi_bl" name="dia_chi_bl" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <?php 
        require 'config.php';
        $res = mysqli_query($mysqli, "SELECT * FROM jporder ORDER BY CONCAT(SUBSTRING(mdh, 1, 2), SUBSTRING(mdh, 3, 2), SUBSTRING(mdh, -3)) ASC;");
        
        if ($res === false) {
            echo "Error: " . mysqli_error($mysqli);
        } else {
        ?>
                            <!-- Chỗ chọn đơn hàng cần sửa lại 1 chút, chỉ hiển thị đơn hàng vẫn đang hoạt động -->
                            <div class="col-14 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 style="font-weight: bold;">Đơn hàng</h5>
                                            <div class="row">
                                                <div class="col-md-4 col-form-label">
                                                    <div class="form-group row ">
                                                        <label class="col-sm-9">Chọn đơn hàng hiện
                                                            có<code>*</code></label>
                                                        <div class="col-sm-12">
                                                        <select class="form-select" id="order_name" name="order_name" >
                                                            <?php 
                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                            ?>
                                                                <option value="<?php echo $row['mdh']?>"><?php echo $row['mdh']?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group row"><label for="ngay_thi" class="col-sm-9">Ngày
                                                            thi tuyển</label>
                                                        <div class="col-sm-12">
                                                        <input type="date" class="form-control" id="ngay_thi" name="ngay_thi">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group row"><label for="ngay_nhaphoc" class="col-sm-9">Ngày
                                                            nhập học<code>*</code></label>
                                                        <div class="col-sm-12">
                                                        <input type="date" class="form-control" id="ngay_nhaphoc" name="ngay_nhaphoc" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group row"><label class="col-sm-9">Ngày
                                                            dự kiến xuất cảnh</label>
                                                        <div class="col-sm-12">
                                                            <input type="date" class="form-control" id="ngay_DKXC" name="ngay_DKXC" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group row"><label class="col-sm-9">Ngày
                                                            dự kiến về nước</label>
                                                        <div class="col-sm-12">
                                                            <input type="date" class="form-control" id="dukien_venuoc" name="dukien_venuoc"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group row"><label class="col-sm-9">Ngày
                                                            xuất cảnh</label>
                                                        <div class="col-sm-12">
                                                            <input type="date" class="form-control" id="ngayXC" name="ngayXC" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group row"><label class="col-sm-9">Ngành
                                                            nghề</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="nganh_nghe" name="nganh_nghe"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <!-- Cái này chắc đợi xong xí nghiệp thì cho select -->
                                                        <label class="col-sm-9">Xí
                                                            nghiệp<code>*</code></label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="xi_nghiep" name="xi_nghiep" required/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label class="col-sm-9">Địa chỉ <code>*</code></label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="dia_chi_xn" name="dia_chi_xn" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label class="col-sm-9" for="phone_number">Số điện
                                                            thoại <code>*</code></label>
                                                        <div class="col-sm-12">
                                                            <input type="tel" id="phone_number" class="form-control"
                                                                pattern="[0-9]+" id="sdt_xn" name="sdt_xn" required />
                                                            <!-- require number -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label class="col-sm-9">Nghiệp đoàn</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group row">
                                                        <label class="col-sm-9">Nơi làm việc</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-14 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 style="font-weight: bold;">Lịch sử xuất khẩu lao động</h5>
                                            <div class="row">
                                                <div class="col-md-8 col-form-label">
                                                    <div class="form-group row">
                                                        <label class="col-sm-9">Nơi làm việc</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group row"><label class="col-sm-9">Thời gian lao
                                                            động từ</label>
                                                        <div class="col-sm-12">
                                                            <input type="date" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row"><label class="col-sm-9">Đến</label>
                                                        <div class="col-sm-12">
                                                            <input type="date" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group row">
                                                        <label class="col-sm-9">Nơi làm việc</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group row"><label class="col-sm-9">Thời gian lao
                                                            động từ</label>
                                                        <div class="col-sm-12">
                                                            <input type="date" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row"><label class="col-sm-9">Đến</label>
                                                        <div class="col-sm-12">
                                                            <input type="date" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Textarea">Ghi chú</label>
                                                <textarea class="form-control" id="Textarea" rows="5" maxlength="200"></textarea>
                                            </div>
                                    </div>
                                </div>
                            </div>
                    <div style="text-align: right; margin-top: 10px;">
                        <a href="#" class="btn btn-light" type="button" style="font-size: 15px; margin-right:5px">Huỷ</a>
                        <button type="submit" class="btn btn-primary" style="font-size: 15px;">Tạo mới</button>
                    </div>
                    <br>
                    <br>
                </div>
        </div>
    </form>
  </div>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>