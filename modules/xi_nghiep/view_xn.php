<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thông tin học viên</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <div class="loai_dh">
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link" href="#" style="text-decoration: none;color:black">Thực tập sinh số 1</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" style="text-decoration: none;color:black">Thực tập sinh số 3</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" style="text-decoration: none;color:black">Kỹ năng đặc định</a>
      </li>
    </ul>
  </div>
  <div class="function" style="overflow: hidden;">
    <a href="?chucnang=xinghiep" style="float: left;"><button class="nut-back"><i class="fas fa-long-arrow-alt-left"></i></button></a>
    <div style="float: right;">
      <a href="?function=themxn"><button class="nut-them">Tạo mới</button></a>
      <a href="#"><button class="nut-xoa">Xóa</button></a>
      <a href="javascript:void(0)" onclick="xuatfile()"><button class="nut-xuat">Bộ lọc</button></a>
      <a href="#" onclick="xuatfile()"><button class="nut-xuat">Xuất Excel</button></a>
      <input type="text" class="search-input" placeholder="Search..." style="vertical-align: middle;">
      <i class="fas fa-search search-icon" style="vertical-align: middle;"></i>
    </div>
  </div>

  <div>
    <?php
    require 'config.php';
    if (isset($_GET['mxn'])) {
      $mdn = $_GET['mxn'];
      $query = "SELECT student.*, jporder.*, enterprise.*
                                FROM enterprise
                                LEFT JOIN jporder ON enterprise.xi_nghiep = jporder.xi_nghiep
                                LEFT JOIN student ON jporder.mdh = student.mdh
                                WHERE enterprise.mdn = '$mdn'";
      $query_enterprise = "SELECT *
                                FROM enterprise";

      $result = mysqli_query($mysqli, $query);

      if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $mdh = $row['mdh'];
          $nganh_nghe_e = $row['nganh_nghe_e'];
          $nganh_nghe_list = explode('; ', $nganh_nghe_e);
          $noi_lam_viec_e = $row['noi_lam_viec'];
          // Xóa bỏ dấu ngoặc đơn đầu và cuối, rồi tách các phần tử
          $noi_lam_viec_clean = trim($noi_lam_viec_e, '()');
          $noi_lam_viec_list = explode(')(', $noi_lam_viec_clean);
    ?>
          <div class="in4-below-img" style="margin-top: 50px;">
            <div class="ho-va-ten"></div>
            <div class="mhv-title">Mã xí nghiệp</div>
            <div class="mhv"><?php echo $row['mdn']; ?></div>
            <div class="ten-dh"><?php echo $row['xi_nghiep']; ?></div>
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
                <div class="field-name">Tên xí nghiệp</div>
                <div class="information"><?php echo $row['xi_nghiep'] ?></div>
              </div>
              <div class="info-item">
                <div class="field-name">Tên giám đốc</div>
                <div class="information"><?php echo $row['ten_giam_doc'] ?></div>
              </div>
              <div class="info-item">
                <div class="field-name">Nghiệp đoàn</div>
                <div class="information"><?php echo $row['nghiep_doan'] ?></div>
              </div>
              <div class="info-item" style="padding: top 0px;">
                <div class="row">
                  <div class="field-name">Ngành nghề</div>
                  <?php foreach ($nganh_nghe_list as $index => $nganh_nghe) : ?>
                    <div class="field-name" style="margin-left:30px">Ngành nghề
                      <?php echo $index + 1; ?></div>
                  <?php endforeach; ?>
                </div>
                <div class="information" style="text-align: right; margin:0;padding:0">
                  <div class="row" style="text-align:right;">
                    <div class="sub-field" style="margin-top:10px; height:26.78px"></div>
                    <?php foreach ($nganh_nghe_list as $nganh_nghe) : ?>
                      <div class="sub-field" style="margin-top:10px; height:26.78px">
                        <?php echo $nganh_nghe; ?></div>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
              <div class="info-item">
                <div class="field-name">Số điện thoại</div>
                <div class="information"><?php echo $row['sdt_xn'] ?></div>
              </div>
              <div class="info-item">
                <div class="field-name">Địa chỉ</div>
                <div class="information"><?php echo $row['dia_chi_xn'] ?></div>
              </div>
              <div class="info-item" style="padding: top 0px;">
                <div class="row">
                  <div class="field-name">Nơi làm việc</div>
                  <?php foreach ($noi_lam_viec_list as $index => $noi_lam_viec) : ?>
                    <div class="field-name" style="margin-left:30px">Nơi làm việc
                      <?php echo $index + 1; ?></div>
                  <?php endforeach; ?>
                </div>
                <div class="information" style="text-align: right; margin:0;padding:0">
                  <div class="row" style="text-align:right;">
                    <div class="sub-field" style="margin-top:10px; height:26.78px"></div>
                    <?php foreach ($noi_lam_viec_list as $noi_lam_viec) : ?>
                      <div class="sub-field" style="margin-top:10px; height:26.78px">
                        <?php echo $noi_lam_viec; ?></div>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
              <?php
              $xi_nghiep = $row['xi_nghiep'];

              // Đếm số lượng đơn hàng từ bảng jporder
              $query_order_count = "SELECT COUNT(*) as order_count 
                                    FROM jporder 
                                    WHERE xi_nghiep = '$xi_nghiep'";
              $result_order_count = mysqli_query($mysqli, $query_order_count);
              $order_count = ($result_order_count && mysqli_num_rows($result_order_count) > 0)
                ? mysqli_fetch_assoc($result_order_count)['order_count']
                : 0;

              // Đếm số lượng học viên từ bảng student
              $query_student_count = "SELECT COUNT(*) as student_count 
                                      FROM student 
                                      WHERE mdh IN (SELECT mdh FROM jporder WHERE xi_nghiep = '$xi_nghiep')";
              $result_student_count = mysqli_query($mysqli, $query_student_count);
              $student_count = ($result_student_count && mysqli_num_rows($result_student_count) > 0)
                ? mysqli_fetch_assoc($result_student_count)['student_count']
                : 0;
              ?>
              <div class="info-item">
                <div class="field-name">Số lượng đơn hàng</div>
                <div class="information"><?php echo $order_count; ?></div>
              </div>

              <div class="info-item">
                <div class="field-name">Số lượng học viên</div>
                <div class="information"><?php echo $student_count; ?></div>
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
            <a style="float:right; font-size: 13px;" href="?filter=hocvien&mdn=<?php echo $row['mdn']; ?>">Xem chi tiết</a>
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
                if ($mdh) {
                  $query_students = "SELECT student.*
                          FROM student
                          LEFT JOIN jporder ON student.mdh = jporder.mdh
                          LEFT JOIN enterprise ON jporder.xi_nghiep = enterprise.xi_nghiep
                          WHERE enterprise.mdn = '$mdn' LIMIT 5"; // Thêm câu lệnh LIMIT 10 vào truy vấn
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
                <div class="field-name">
                  <td><?php echo $row['ghi_chu_e']; ?></td>
                </div>
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
          break;
        }
      }
    }
?>
