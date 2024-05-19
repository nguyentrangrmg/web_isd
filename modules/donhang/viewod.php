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
    if(isset($_GET['mdh'])){
        $mdh = $_GET['mdh'];
        $res = mysqli_query($mysqli,"SELECT type_hv FROM jporder WHERE mdh='$mdh'");
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
    <a href="?typedh=1" style="float: left;"><button class="nut-back"><i class="fas fa-long-arrow-alt-left"></i></button></a>
    <div style="float: right;">
        <a href="?function=themdh" ><button class="nut-them">Tạo mới</button></a>
        <a href="#"><button class="nut-xoa">Xóa</button></a>
        <a href="#" onclick="xuatfile()"><button class="nut-xuat">Xuất Excel</button></a>  
        <input type="text" class="search-input" placeholder="Search..." style="vertical-align: middle;">
        <i class="fas fa-search search-icon" style="vertical-align: middle;"></i>
    </div>
</div>

<div>
<?php
                    require 'config.php';

                    if(isset($_GET['mdh'])) {
                      $mdh = $_GET['mdh'];
                      $query = "SELECT student.*, jporder.*, enterprise.*
                                FROM jporder
                                LEFT JOIN student ON jporder.mdh = student.mdh
                                INNER JOIN enterprise ON jporder.xi_nghiep = enterprise.xi_nghiep
                                WHERE jporder.mdh = '$mdh'";
                  
                      $result = mysqli_query($mysqli, $query);
                  
                      if($result && mysqli_num_rows($result) > 0) {
                          while($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="in4-below-img" style="margin-top: 50px;">
            <div class="ho-va-ten"></div>
            <div class="mhv-title">Mã đơn hàng</div>
            <div class="mhv"><?php echo $row['mdh']; ?></div>
            <div class="ten-dh"><?php echo $row['ten_dh']; ?></div>
            <div class="trang-thai-title">Trạng thái</div>
            <div class="trang-thai"><?php echo $row['trang_thai']; ?></div>
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
                  <div class="field-name">Tên đơn hàng</div>
                  <div class="information"><?php echo $row['ten_dh'] ?></div>
                </div>
                <div class="info-item">
                  <div class="field-name">Nghiệp đoàn</div>
                  <div class="information"><?php echo $row['nghiep_doan'] ?></div>
                </div>
                <div class="info-item" style="padding: top 0px;">
                    <div class="row">
                        <div class="field-name">Xí nghiệp</div>
                        <div class="field-name" style="margin-left:30px">Giám đốc</div>
                        <div class="field-name" style="margin-left:30px">Số điện thoại</div>
                        <div class="field-name" style="margin-left:30px">Địa chỉ</div>
                    </div>
                  <div class="information" style="text-align: right; margin:0;padding:0">
                    <div class="row" style="text-align:right;">
                    <div class="sub-field" style="margin-top:10px; height:26.78px"><?php echo $row['xi_nghiep'] ?></div>
                    <div class="sub-field" style="margin-top:10px; height:26.78px"><?php echo $row['ten_giam_doc'] ?></div>
                    <div class="sub-field" style="margin-top:10px; height:26.78px"><?php echo $row['sdt_xn'] ?></div>
                    <div class="sub-field" style="margin-top:10px; height:26.78px"><?php echo $row['dia_chi_xn'] ?></div>
                  </div>
                </div>
                </div>
                <div class="info-item">
                  <div class="field-name">Ngành nghề</div>
                  <div class="information"><?php echo $row['nganh_nghe'] ?></div>
                </div>
                <div class="info-item">
                  <div class="field-name">Dự kiến thi tuyển</div>
                  <div class="information"><?php echo date('d/m/Y', strtotime($row['du_kien_tt'])) ?></div>
                </div>
                <div class="info-item">
                  <div class="field-name">Ngày thi tuyển</div>
                  <div class="information"><?php echo date('d/m/Y', strtotime($row['ngay_tt'])) ?></div>
                </div>
                <div class="info-item">
                  <div class="field-name">Hình thức thi tuyển</div>
                  <div class="information"><?php echo $row['hinh_thuc_tt'] ?></div>
                </div>
                <div class="info-item">
                  <div class="field-name">Ngày xuất cảnh</div>
                  <div class="information"><?php echo date('d/m/Y', strtotime($row['ngay_xc'])) ?></div>
                </div>
                <div class="info-item">
                  <div class="field-name">Ngày về nước</div>
                  <div class="information"><?php echo date('d/m/Y', strtotime($row['ngay_vn'])) ?></div>
                </div>
                <div class="info-item">
                  <div class="field-name">Số lượng tuyển</div>
                  <div class="information"><?php echo $row['so_luong_tuyen'] ?></div>
                </div>
                <div class="info-item" style="padding: top 0px;">
                    <div class="row">
                        <div class="field-name">Yêu cầu với học viên</div>
                        <div class="field-name" style="margin-left:30px">Nam</div>
                        <div class="field-name" style="margin-left:30px">Nữ</div>
                    </div>
                  <div class="information" style="text-align: right; margin:0;padding:0">
                    <div class="row" style="text-align:right;">
                    <div class="sub-field" style="margin-top:10px; height:26.78px"></div>
                    <div class="sub-field" style="margin-top:10px; height:26.78px">SL: <?php echo $row['sl_nam'] ?>; từ <?php echo $row['do_tuoi_nam'] ?> tuổi</div>
                    <div class="sub-field" style="margin-top:10px; height:26.78px">SL: <?php echo $row['sl_nu'] ?>; từ <?php echo $row['do_tuoi_nu'] ?> tuổi</div>
                  </div>
                </div>
                </div>
                <div class="info-item">
                  <div class="field-name">Nơi làm việc</div>
                  <div class="information"><?php echo $row['noi_lv'] ?></div>
                </div>
                <div class="info-item" style="padding: top 0px;">
                    <div class="row">
                        <div class="field-name">Mức lương</div>
                        <div class="field-name" style="margin-left:30px">Lương cơ bản</div>
                        <div class="field-name" style="margin-left:30px">Lương thực tế</div>
                    </div>
                  <div class="information" style="text-align: right; margin:0;padding:0">
                    <div class="row" style="text-align:right;">
                    <div class="sub-field" style="margin-top:10px; height:26.78px"></div>
                    <div class="sub-field" style="margin-top:10px; height:26.78px"><?php echo $row['luong_co_ban'] ?></div>
                    <div class="sub-field" style="margin-top:10px; height:26.78px"><?php echo $row['luong_thuc_te'] ?></div>
                  </div>
                </div>
                </div>
                <div class="info-item">
                  <div class="field-name">Chế độ phụ cấp</div>
                  <div class="information"><?php echo $row['che_do_phu_cap'] ?></div>
                </div>
                <div class="info-item" style="padding: top 0px;">
                    <div class="row">
                        <div class="field-name">Thời gian làm việc</div>
                        <div class="field-name" style="margin-left:30px">Theo ngày</div>
                        <div class="field-name" style="margin-left:30px">Theo tuần</div>
                        <div class="field-name" style="margin-left:30px">Thời gian nghỉ trong ngày</div>
                    </div>
                  <div class="information" style="text-align: right; margin:0;padding:0">
                    <div class="row" style="text-align:right;">
                    <div class="sub-field" style="margin-top:10px; height:26.78px"></div>
                    <div class="sub-field" style="margin-top:10px; height:26.78px"><?php echo $row['lv_theo_ngay'] ?> tiếng/ngày</div>
                    <div class="sub-field" style="margin-top:10px; height:26.78px"><?php echo $row['lv_theo_tuan'] ?> tiếng/tuần</div>
                    <div class="sub-field" style="margin-top:10px; height:26.78px"><?php echo $row['nghi'] ?> tiếng/ngày</div>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
       <!-- Danh sách học viên -->
       <div class="danh-sach-hv-box">
                <div class="background-container">
                    <div class="info-container expanded" id="info-container-2">
                        <div class="info-title">Danh sách học viên
                          
                        </div>
                        <div class="info-content-wrapper">
                            <table class="table table-hover table-stripe">
                                <thead class="color-head">
                                    <tr>
                                        <th style="white-space: nowrap;">Mã học viên</th>
                                        <th style="white-space: nowrap;">Họ và Tên</th>
                                        <th style="white-space: nowrap;">Ngày Sinh</th>
                                        <th style="white-space: nowrap;">Ngày Nhập học</th>
                                        <th style="white-space: nowrap;">Trạng Thái</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query_students = "SELECT * FROM student WHERE mdh = '$mdh'";
                                    $result_students = mysqli_query($mysqli, $query_students);

                                    if ($result_students && mysqli_num_rows($result_students) > 0) {
                                        while ($student_row = mysqli_fetch_assoc($result_students)) {
                                    ?>
                                            <tr>
                                                <td><?php echo $student_row['mhv']; ?></td>
                                                <td><?php echo $student_row['ho_ten']; ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($student_row['ngay_sinh'])) ?></td>
                                                <td><?php echo date('d/m/Y', strtotime($student_row['ngay_nhaphoc'])) ?></td>
                                                <td><?php echo $student_row['status']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                        
                                    }
                                    ?>
                                </tbody>
                            </table>
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
                  <div class="field-name"><td><?php echo $row['ghi_chu']; ?></td></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
        </div>

</body>
<script>
    function toggleContent(containerId) {
      var container = document.getElementById(containerId);
      container.classList.toggle("expanded");
    }
  </script>
  
</html>
        
<?php
        break;}
    }
}
?>