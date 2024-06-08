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
            $mhv_prefix = substr($mhv, 0, 2);
            $query = "SELECT student.*, jporder.* 
              FROM student 
              LEFT JOIN jporder ON student.mdh = jporder.mdh 
              WHERE student.mhv = '$mhv'";
            $query2 = "SELECT * FROM baolanh WHERE mhv='$mhv'";
            $result = mysqli_query($mysqli, $query);
            $re=mysqli_query($mysqli,$query2);
        if((mysqli_num_rows($result) > 0) && mysqli_num_rows($re)){
            $row = mysqli_fetch_assoc($result);
            $row2 = mysqli_fetch_assoc($re);
            $lich_su_xk = isset($row['lich_su_xk']) ? $row['lich_su_xk'] : '';
        $parts = explode('/', $lich_su_xk);
        $xn1 = $thoi_gian_ld1 = $thoi_gian_ld2 = $xn2 = $thoi_gian_ld3 = $thoi_gian_ld4 = '';

        if (isset($parts[0])) {
            list($xn1, $time1) = explode(',', $parts[0]);
            $xn1 = trim(str_replace('Xí nghiệp', '', $xn1)); // Remove 'Xí nghiệp'
            preg_match('/từ(.*?)đến(.*)/', $time1, $matches1);
            if (isset($matches1[1])) $thoi_gian_ld1 = trim($matches1[1]);
            if (isset($matches1[2])) $thoi_gian_ld2 = trim($matches1[2]);
        }

        if (isset($parts[1])) {
            list($xn2, $time2) = explode(',', $parts[1]);
            $xn2 = trim(str_replace('Xí nghiệp', '', $xn2)); // Remove 'Xí nghiệp'
            preg_match('/từ(.*?)đến(.*)/', $time2, $matches2);
            if (isset($matches2[1])) $thoi_gian_ld3 = trim($matches2[1]);
            if (isset($matches2[2])) $thoi_gian_ld4 = trim($matches2[2]);
        }
        
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
                <a class="nav-link <?php if ($mhv_prefix == 'T1') echo 'active'; ?>" href="#" style="text-decoration: none;color:black" >Thực tập sinh số 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($mhv_prefix == 'T3') echo 'active'; ?>" href="#" style="text-decoration: none;color:black" >Thực tập sinh số 3</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($mhv_prefix == 'DD') echo 'active'; ?>" href="#" style="text-decoration: none;color:black" >Kỹ năng đặc định</a>
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
    
    <div class="row">
    <div class="col-md-4">
            <label for="ho_ten" class="form-label">Mã học viên:</label>
            <input name="mhv" class="form-control" id="mhv" value="<?php echo $row['mhv']; ?>" readonly>
        </div>
        <div class="col-md-4">
              <label for="type_hv" class="form-label">Kiểu học viên:</label>
              <select class="form-select" id="type_hv" name="type_hv" disabled>
                    <option value="1" <?php if ($mhv_prefix == 'T1') echo 'selected'; ?>>Thực tập sinh số 1</option>
                    <option value="3" <?php if ($mhv_prefix == 'T3') echo 'selected'; ?>>Thực tập sinh số 3</option>
                    <option value="dd" <?php if ($mhv_prefix == 'DD') echo 'selected'; ?>>Kỹ năng đặc định</option>
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
                                        <div class="anh"><input type="file" class="form-control" name="file_anh" id="file_anh"></div>
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
        <br>
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
                            <br>
                            <!-- Bên dưới dùng php nhưng mà lười code quá -->
                            <div class="col-14 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 style="font-weight: bold;">Đơn hàng</h5>
                                            <div class="row">
                                                <div class="col-md-4 col-form-label">
                                                    <div class="form-group row ">
                                                        <label for="order_name" class="form-label">Tên đơn hàng:</label>
                                                        <input style="margin-left:10px" type="text" value="<?php echo $row['ten_dh'] ?>" class="form-control" id="order_name" name="order_name" maxlength="20" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group row"><label for="ngay_thi" class="col-sm-9">Ngày
                                                            thi tuyển</label>
                                                        <div class="col-sm-12">
                                                        <input type="date" class="form-control" id="ngay_thi" name="ngay_thi" value="<?php echo $row['ngay_thi'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group row"><label for="ngay_nhaphoc" class="col-sm-9">Ngày
                                                            nhập học<code>*</code></label>
                                                        <div class="col-sm-12">
                                                        <input type="date" class="form-control" id="ngay_nhaphoc" name="ngay_nhaphoc" value="<?php echo $row['ngay_nhaphoc'] ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group row"><label class="col-sm-9">Ngày
                                                            dự kiến xuất cảnh</label>
                                                        <div class="col-sm-12">
                                                            <input type="date" class="form-control" id="ngay_DKXC" name="ngay_DKXC" value="<?php echo $row['ngay_DKXC'] ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group row"><label class="col-sm-9">Ngày
                                                            dự kiến về nước</label>
                                                        <div class="col-sm-12">
                                                            <input type="date" class="form-control" id="dukien_venuoc" name="dukien_venuoc" value="<?php echo $row['dukien_venuoc'] ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group row"><label class="col-sm-9">Ngày
                                                            xuất cảnh</label>
                                                        <div class="col-sm-12">
                                                            <input type="date" class="form-control" id="ngayXC" name="ngayXC" value="<?php echo $row['ngayXC'] ?>"/>
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
                        <label class="col-sm-9">Xí nghiệp 1</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="xn1" name="xn1" value="<?php echo htmlspecialchars($xn1); ?>"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group row">
                        <label class="col-sm-9">Thời gian lao động từ</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="thoi_gian_ld1" name="thoi_gian_ld1" value="<?php echo htmlspecialchars($thoi_gian_ld1); ?>"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label class="col-sm-9">Đến</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="thoi_gian_ld2" name="thoi_gian_ld2" value="<?php echo htmlspecialchars($thoi_gian_ld2); ?>"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group row">
                        <label class="col-sm-9">Xí nghiệp 2</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="xn2" name="xn2" value="<?php echo htmlspecialchars($xn2); ?>"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group row">
                        <label class="col-sm-9">Thời gian lao động từ</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="thoi_gian_ld3" name="thoi_gian_ld3" value="<?php echo htmlspecialchars($thoi_gian_ld3); ?>"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label class="col-sm-9">Đến</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="thoi_gian_ld4" name="thoi_gian_ld4" value="<?php echo htmlspecialchars($thoi_gian_ld4); ?>"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="Textarea">Ghi chú</label>
                <textarea class="form-control" id="note" name="note" rows="5" maxlength="200"><?php echo $row['note']; ?></textarea>
            </div>
        </div>
                                </div>
                            </div>
                            <div style="text-align: right; margin-top: 10px;">
                        <a href="?chucnang=hocvien" class="btn btn-light" type="button" style="font-size: 15px; margin-right:5px">Huỷ</a>
                        <button type="submit" class="btn btn-primary" style="font-size: 15px;">Tạo mới</button>
                    </div>
        
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