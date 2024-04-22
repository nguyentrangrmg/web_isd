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
<?php
        require 'config.php';
        if(isset($_GET['edit'])) {
            $mhv = $_GET['edit'];
            $query = "SELECT * FROM student WHERE mhv='$mhv'";
            $query2 = "SELECT * FROM baolanh WHERE mhv='$mhv'";
            $result = mysqli_query($mysqli, $query);
            $re=mysqli_query($mysqli,$query2);
        if((mysqli_num_rows($result) > 0) && mysqli_num_rows($re)){
            $row = mysqli_fetch_assoc($result);
            $row2 = mysqli_fetch_assoc($re);
        ?>
    <a>
      <?php if (isset($_GET['error_message'])) {
      $error_message = $_GET['error_message'];
      echo "<p style='color: red;'>$error_message</p>";
      }
      ?>
  <!-- Menu -->
  <div class="loai_hv">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link <?php if ($row['type_hv'] == '1') echo 'active'; ?>" href="#" style="text-decoration: none;color:black" >Thực tập sinh số 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($row['type_hv'] == '3') echo 'active'; ?>" href="#" style="text-decoration: none;color:black" >Thực tập sinh số 3</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($row['type_hv'] == 'dd') echo 'active'; ?>" href="#" style="text-decoration: none;color:black" >Kỹ năng đặc định</a>
            </li>
        </ul>
    </div>
    <div class="function" style="overflow: hidden;">
    <a href="?type=1" style="float: left;"><button class="nut-back"><i class="fas fa-long-arrow-alt-left"></i></button></a>
    <div style="float: right;">
        <a href="?function=them" ><button class="nut-them">Tạo mới</button></a>
        <a href="#"><button class="nut-xoa">Xóa</button></a>
        <a href="#" onclick="xuatfile()"><button class="nut-xuat">Xuất Excel</button></a>  
        <input type="text" class="search-input" placeholder="Search..." style="vertical-align: middle;">
        <i class="fas fa-search search-icon" style="vertical-align: middle;"></i>
    </div>
</div>
<div class="container">
  <div class="edit-form">
    <a style="font-size: 20px; font-weight: bold;color: #374375;">Chỉnh sửa thông tin học viên </a>
    <a style="font-style: italic;margin-left:10px;font-size:12px"> Vui lòng nhập các trường thông tin bắt buộc ( <strong style="color: red;">*</strong> ) </a>
    <br>
    <br>
    
    </a>
    <form action="modules/hocvien/edit/edit.php?edit=sua&mhv=<?php echo $row['mhv']; ?>" method="POST" style="width: 1100px;" enctype="multipart/form-data">
    <!-- <div class="row">
        <div class="col-md-4">
            <label for="ho_ten" class="form-label">Mã học viên:</label>
            <input name="mhv" class="form-control" id="mhv" value="<?php echo $row['mhv']; ?>" disabled>
        </div>
        <div class="col-md-4">
              <label for="type_hv" class="form-label">Kiểu học viên:</label>
              <select class="form-select" id="type_hv" name="type_hv" style="width:180px"disabled>
                    <option value="1" <?php if ($row['type_hv'] == '1') echo 'selected'; ?>>Thực tập sinh số 1</option>
                    <option value="3" <?php if ($row['type_hv'] == '3') echo 'selected'; ?>>Thực tập sinh số 3</option>
                    <option value="dd" <?php if ($row['type_hv'] == 'dd') echo 'selected'; ?>>Kỹ năng đặc định</option>
              </select>
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
    </div> -->
    <div class="row">
    <div class="col-md-4">
            <label for="ho_ten" class="form-label">Mã học viên:</label>
            <input name="mhv" class="form-control" id="mhv" value="<?php echo $row['mhv']; ?>" disabled>
        </div>
        <div class="col-md-4">
              <label for="type_hv" class="form-label">Kiểu học viên:</label>
              <select class="form-select" id="type_hv" name="type_hv" disabled>
                    <option value="1" <?php if ($row['type_hv'] == '1') echo 'selected'; ?>>Thực tập sinh số 1</option>
                    <option value="3" <?php if ($row['type_hv'] == '3') echo 'selected'; ?>>Thực tập sinh số 3</option>
                    <option value="dd" <?php if ($row['type_hv'] == 'dd') echo 'selected'; ?>>Kỹ năng đặc định</option>
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
                                    <input type="text" class="form-control" id="ho_ten" name="ho_ten" maxlength="50" required value="<?php echo $row['ho_ten']; ?>">
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
                                    <select class="form-control" id="gioi_tinh" name="gioi_tinh" required>
                                        <option value="Nam" <?php if ($row['gioi_tinh'] == 'Nam') echo 'selected'; ?>>Nam</option>
                                        <option value="Nữ" <?php if ($row['gioi_tinh'] == 'Nữ') echo 'selected'; ?>>Nữ</option>
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
                                    name="ngay_sinh" value="<?php echo $row['ngay_sinh'] ?>" required/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                                <div class="form-group row">
                                    <label for="sdt" class="col-sm-9">Số điện thoại<code>*</code></label>
                                    <div class="col-sm-12">
                                        <input type="tel" class="form-control" id="sdt" name="sdt" maxlength="10" value="<?php echo $row['sdt'] ?>" pattern="[0-9]{+}" required title="Vui lòng nhập chữ số." />
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label for="ho_chieu" class="col-sm-9">Hộ Chiếu</label>
                                <div class="col-sm-12">
                                <input type="text" class="form-control" value="<?php echo $row['ho_chieu'] ?>" id="ho_chieu" name="ho_chieu" maxlength="8">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label for="ngay_cap_hc" class="col-sm-9">Ngày cấp</label>
                                <div class="col-sm-12">
                                <input type="date" class="form-control" 
                                id="ngay_cap_hc" value="<?php echo $row['ngay_cap_hc'] ?>" name="ngay_cap_hc">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-9" for="noi_cap_hc">Nơi cấp</label>
                                <div class="col-sm-12">
                                      <input type="text" class="form-control" value="<?php echo $row['noi_cap_hc'] ?>" id="noi_cap_hc" name="noi_cap_hc" maxlength="50">
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
                                <input type="text" class="form-control" id="cccd" value="<?php echo $row['CCCD'] ?>" name="cccd" maxlength="12" required title="Vui lòng nhập chữ số.">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label for="ngay_cap_cccd" class="col-sm-9">Ngày cấp<code>*</code></label>
                                <div class="col-sm-12">
                                <input type="date" class="form-control" id="ngay_cap_cccd" value="<?php echo $row['ngay_cap_cccd'] ?>" name="ngay_cap_cccd" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label for="noi_cap_cccd" class="col-sm-9" for="phone_number">Nơi cấp</label>
                                <div class="col-sm-12">
                                <input type="text" class="form-control" id="noi_cap_cccd" value="<?php echo $row['noi_cap_cccd'] ?>"  name="noi_cap_cccd" maxlength="50">
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
                                    <option value="Đang đào tạo" <?php if ($row['status'] == 'Đang đào tạo') echo 'selected'; ?>>Đang đào tạo</option>
                                    <option value="Đang làm việc" <?php if ($row['status'] == 'Đang làm việc') echo 'selected'; ?>>Đang làm việc</option>
                                    <option value="Đã về nước" <?php if ($row['status'] == 'Đã về nước') echo 'selected'; ?>>Đã về nước</option>
                                </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                        <!-- <div class="col-md-4">
                          <label for="file_anh" class="form-label">Chọn file ảnh học viên:</label>
                          <input type="file" class="form-control" id="file_anh" name="file_anh" accept="image/*">
                      </div> -->
                      <div class="col-md-4">
                      <label for="file_anh" class="form-label"></label>
                            <p><?php
                            $anh_path = $row['file_anh'];           
                            $target_dir = "modules/hocvien/anhhv/";
                            $target_file = $target_dir.$anh_path;
                            echo "<img src='".$target_file."' width='80px'>" ?> <?php echo $row['file_anh'] ?></p>

                      </div>
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
                                <input type="text" class="form-control" id="ho_khau" name="ho_khau" value="<?php echo $row['ho_khau'] ?>" maxlength="100" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group row">
                                <label for="dia_chi" class="col-sm-9">Địa chỉ thường trú</label>
                                <div class="col-sm-12">
                                <input type="text" class="form-control" id="dia_chi" name="dia_chi" value="<?php echo $row['dia_chi'] ?>" maxlength="50">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                            <!-- Chưa link form -->
                            <div class="col-14 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 style="font-weight: bold;">Người bảo lãnh</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label for="ten" class="col-sm-9">Họ và tên<code>*</code></label>
                                                        <div class="col-sm-12">
                                                            <input type="text" id="ten" name="ten" value="<?php echo $row2['ten']?>" class="form-control" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label class="col-sm-9">Ngày sinh<code>*</code></label>
                                                        <div class="col-sm-12">
                                                            <input type="date" id="dob" name="dob" class="form-control" value="<?php echo $row2['dob'] ?>" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label class="col-sm-9" for="sdt_bl">Số điện thoại<code>*</code></label>
                                                        <div class="col-sm-12">
                                                            <input type="tel" id="sdt_bl" name="sdt_bl" class="form-control"
                                                                pattern="[0-9]+" value="<?php echo $row2['sdt_bl'] ?>" required />
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
                                                            <input type="text" id="quan_he" name="quan_he" value="<?php echo $row2['quan_he'] ?>" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group row">
                                                        <label for="ho_khau_bl" class="col-sm-9">Hộ khẩu</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" id="ho_khau_bl" name="ho_khau_bl" value="<?php echo $row2['ho_khau_bl']?>" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group row">
                                                        <label for="dia_chi_bl" class="col-sm-9">Địa chỉ thường trú</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" id="dia_chi_bl" name="dia_chi_bl" value="<?php echo $row2['dia_chi_bl']?>" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Bên dưới dùng php nhưng mà lười code quá -->
                            <div class="col-14 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 style="font-weight: bold;">Đơn hàng</h5>
                                            <div class="row">
                                                <div class="col-md-4 col-form-label">
                                                    <div class="form-group row ">
                                                        <label for="order_name" class="form-label">Tên đơn hàng:</label>
                                                        <input style="margin-left:10px" type="text" value="<?php echo $row['order_name'] ?>" class="form-control" id="order_name" name="order_name" maxlength="20" disabled>
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
                                                            <input type="date" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group row"><label class="col-sm-9">Ngày
                                                            dự kiến về nước</label>
                                                        <div class="col-sm-12">
                                                            <input type="date" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group row"><label class="col-sm-9">Ngày
                                                            xuất cảnh</label>
                                                        <div class="col-sm-12">
                                                            <input type="date" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group row"><label class="col-sm-9">Ngành
                                                            nghề</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label class="col-sm-9">Xí
                                                            nghiệp</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label class="col-sm-9">Địa chỉ</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label class="col-sm-9" for="phone_number">Số điện
                                                            thoại</label>
                                                        <div class="col-sm-12">
                                                            <input type="tel" id="phone_number" class="form-control"
                                                                pattern="[0-9]+" required />
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