<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin học viên</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php 
    require 'config.php';
    if(isset($_GET['mhv'])){
        $mhv = $_GET['mhv'];
        $res = mysqli_query($mysqli,"SELECT type_hv FROM student WHERE mhv='$mhv'");
        if ($res === false) {
            echo "Error: " . mysqli_error($mysqli);
        } else {
            // Fetch the result from the query
            $row = mysqli_fetch_assoc($res);
            $type_hv = $row['type_hv'];
?>

<div class="loai_hv">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link <?php if ($type_hv == 1) echo "active"; ?>" style="text-decoration: none;color:black" href="#">Thực tập sinh số 1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($type_hv == 3) echo "active"; ?>" style="text-decoration: none;color:black" href="#">Thực tập sinh số 3</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if ($type_hv == 'dd') echo "active"; ?>" style="text-decoration: none;color:black" href="#">Kỹ năng đặc định</a>
        </li>
    </ul>
</div>

<?php
        }
    }
?>

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

<div>
<?php
        require 'config.php';
        if(isset($_GET['mhv'])) {
            $mhv = $_GET['mhv'];
            $query = "SELECT * FROM student WHERE mhv='$mhv'";
            $query2 = "SELECT * FROM baolanh WHERE mhv='$mhv'";
            $result = mysqli_query($mysqli, $query); 
            $re = mysqli_query($mysqli, $query2);} 
            if((mysqli_num_rows($result) > 0)&&(mysqli_num_rows($re))) {
                while(($row = mysqli_fetch_assoc($result))&&($row2 = mysqli_fetch_assoc($re))) {
                    $anh_path = $row['file_anh'];           
                    $target_dir = "modules/hocvien/anhhv/";
                    $target_file = $target_dir.$anh_path;
        ?>
        <div class="student-image">
            <img src="<?php echo $target_file; ?>" width="100px"><br>
        </div>
        <div class="in4-below-img">
            <div class="ho-va-ten"><?php echo $row['ho_ten']; ?></div>
            <div class="mhv-title">Mã học viên</div>
            <div class="mhv"><?php echo $row['mhv']; ?></div>
            <div class="trang-thai-title">Trạng thái</div>
            <div class="trang-thai"><?php echo $row['status']; ?></div>
        </div>
    </div>
    <div class="boxes">
      <div class="thong-tin-co-ban-box">
        <div class="background-container">
          <div class="info-container expanded" id="info-container">
            <div class="info-title" onclick="toggleContent('info-container')">Thông tin cơ bản
              <span class="down-arrow"></span>
            </div>
            <div class="info-content-wrapper">
              <div class="info-content">
                <div class="info-item">
                  <div class="field-name">Họ và tên</div>
                  <div class="information"><?php echo $row['ho_ten'] ?></div>
                </div>
                <div class="info-item">
                  <div class="field-name">Ngày sinh</div>
                  <div class="information"><?php echo date('d/m/Y', strtotime($row['ngay_sinh'])) ?></div>
                </div>
                <div class="info-item">
                  <div class="field-name">Giới tính</div>
                  <div class="information"><?php echo $row['gioi_tinh'] ?></div>
                </div>
                <div class="info-item">
                  <div class="field-name">Số điện thoại</div>
                  <div class="information"><?php echo $row['sdt'] ?></div>
                </div>
                <div class="info-item" style="padding: top 0px;">
                    <div class="row">
                        <div class="field-name">Hộ chiếu</div>
                        <div class="field-name" style="margin-left:30px">Nơi cấp</div>
                        <div class="field-name" style="margin-left:30px">Ngày cấp</div>
                    </div>
                  <div class="information" style="text-align: right; margin:0;padding:0">
                    <div class="row" style="text-align:right;">
                    <div class="sub-field" style="margin-top:10px; height:26.78px"><?php echo $row['ho_chieu'] ?></div>
                    <div class="sub-field" style="margin-top:10px; height:26.78px"><?php echo $row['noi_cap_hc'] ?></div>
                    <div class="sub-field" style="margin-top:10px; height:26.78px"><?php echo $row['ngay_cap_hc'] ?></div>
                  </div>
                </div>
                </div>
                <div class="info-item" style="padding: top 0px;">
                    <div class="row">
                        <div class="field-name">Căn cước công dân</div>
                        <div class="field-name" style="margin-left:30px">Nơi cấp</div>
                        <div class="field-name" style="margin-left:30px">Ngày cấp</div>
                    </div>
                  <div class="information" style="text-align: right; margin:0;padding:0">
                    <div class="row" style="text-align:right;">
                    <div class="sub-field" style="margin-top:10px; height:26.78px"><?php echo $row['CCCD'] ?></div>
                    <div class="sub-field" style="margin-top:10px; height:26.78px"><?php echo $row['noi_cap_cccd'] ?></div>
                    <div class="sub-field" style="margin-top:10px; height:26.78px"><?php echo $row['ngay_cap_cccd'] ?></div>
                  </div>
                </div>
                </div>
                <div class="info-item">
                  <div class="field-name">Hộ khẩu</div>
                  <div class="information"><?php echo $row['ho_khau'] ?></div>
                </div>
                <div class="info-item">
                  <div class="field-name">Địa chỉ thường trú</div>
                  <div class="information"><?php echo $row['dia_chi'] ?></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="nguoi-bao-lanh-box">
        <div class="background-container">
          <div class="info-container expanded" id="info-container-2">
            <div class="info-title" onclick="toggleContent('info-container-2')">Người bảo lãnh
              <span class="down-arrow"></span>
            </div>
            <div class="info-content-wrapper">
              <div class="info-content">
                <div class="info-item">
                  <div class="field-name">Họ và tên người bảo lãnh</div>
                  <div class="information"><?php echo $row2['ten'] ?></div>
                </div>
                <div class="info-item">
                  <div class="field-name">Ngày sinh</div>
                  <div class="information"><?php echo date('d/m/Y', strtotime($row2['dob'])) ?></div>
                </div>
                <div class="info-item">
                  <div class="field-name">Quan hệ với học viên</div>
                  <div class="information"><?php echo $row2['quan_he'] ?></div>
                </div>
                <div class="info-item">
                  <div class="field-name">Số điện thoại</div>
                  <div class="information"><?php echo $row2['sdt_bl'] ?></div>
                </div>
                <div class="info-item">
                  <div class="field-name">Hộ khẩu</div>
                  <div class="information"><?php echo $row2['ho_khau_bl'] ?></div>
                </div>
                <div class="info-item">
                  <div class="field-name">Địa chỉ thường trú</div>
                  <div class="information"><?php echo $row2['dia_chi_bl'] ?></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     <!-- luoi lam qua -->
      <div class="don-hang-box">
        <div class="background-container">
          <div class="info-container expanded" id="info-container-3">
            <div class="info-title" onclick="toggleContent('info-container-3')">Đơn hàng
              <span class="down-arrow"></span>
            </div>
            <div class="info-content-wrapper">
              <div class="info-content">
                <div class="info-item">
                <div class="field-name">Ngày thi tuyển</div>
                  <div class="information"><?php echo date('d/m/Y', strtotime($row['ngay_thi'])) ?></div>
                </div>
                <div class="info-item">
                  <div class="field-name">Ngày nhập học</div>
                  <div class="information"><?php echo date('d/m/Y', strtotime($row['ngay_nhaphoc'])) ?></div>
                </div>
                <div class="info-item">
                  <div class="field-name">Ngày dự kiến xuất cảnh</div>
                  <div class="information"><?php echo date('d/m/Y', strtotime($row['ngay_DKXC'])) ?></div>
                </div>
                <div class="info-item">
                  <div class="field-name">Ngày dự kiến về nước</div>
                  <div class="information"><?php echo date('d/m/Y', strtotime($row['dukien_venuoc'])) ?></div>
                </div>
                <div class="info-item">
                  <div class="field-name">Ngày xuất cảnh</div>
                  <div class="information"><?php echo date('d/m/Y', strtotime($row['ngayXC'])) ?></div>
                </div>
                <div class="info-item">
                  <div class="field-name">Ngành nghề</div>
                  <div class="information"><?php echo $row['nganh_nghe'] ?></div>
                </div>
                <div class="info-item">
                  <div class="field-name">Xí nghiệp</div>
                  <div class="information">
                    <div class="sub-field">Địa chỉ: Một cái địa chỉ nào đẫy dài vãi cả nho ra ở bên Nhật nhưng k hiển
                      thị dc ?</div>
                    <div class="sub-field">Số điện thoại: 0123456789</div>
                  </div>
                </div>
                <div class="info-item">
                  <div class="field-name">Nghiệp đoàn</div>
                  <div class="information">Asunaro</div>
                </div>
                <div class="info-item">
                  <div class="field-name">Nơi làm việc</div>
                  <div class="information">Text</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="ghi-chu-box">
        <div class="background-container">
          <div class="info-container expanded" id="info-container-4">
            <div class="info-title" onclick="toggleContent('info-container-4')">Ghi chú
              <span class="down-arrow"></span>
            </div>
            <div class="info-content-wrapper">
              <div class="info-content">
                <div class="info-item">
                  <div class="field-name"><?php echo $row['note'] ?></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
</body>
<script>
    function toggleContent(containerId) {
      var container = document.getElementById(containerId);
      container.classList.toggle("expanded");
    }
  </script>
  
</html>
<?php } ?>