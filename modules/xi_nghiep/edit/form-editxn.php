<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sửa xí nghiệp</title>
  <!-- Link CSS Bootstrap -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/select2/select2.min.css">
  <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <link rel="stylesheet" href="css/newstyle.css">
  <link rel="stylesheet" href="vendors/base/base.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
</head>

<body>
  <?php
  require 'config.php';
  if (isset($_GET['edit_xn'])) {
    $mdn = $_GET['edit_xn'];
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
        <div class="function" style="overflow: hidden;">
          <a href="?chucnang=xinghiep" style="float: left;"><button class="nut-back"><i
                class="fas fa-long-arrow-alt-left"></i></button></a>
          <div style="float: right;">
            <a href="?function=themxn"><button class="nut-them">Tạo mới</button></a>
            <a href="#"><button class="nut-xoa">Xóa</button></a>
            <!-- <a href="#" onclick="xuatfile()"><button class="nut-xuat">Xuất Excel</button></a>   -->
            <input type="text" class="search-input" placeholder="Search..." style="vertical-align: middle;">
            <i class="fas fa-search search-icon" style="vertical-align: middle;"></i>
          </div>
        </div>
        <div class="container">
          <div class="add-form">
            <a style="font-size: 25px; font-weight: bold;color: #374375;">Chỉnh sửa thông tin Xí Nghiệp</a>
            <a style="font-style: italic;margin-left:10px;font-size:12px"> Vui lòng không để trống các trường thông tin
              bắt buộc ( <strong style="color: red;">*</strong> ) </a>
            <br>
            <br>
            <form action="modules/xi_nghiep/edit/edit_xn.php" method="POST" enctype="multipart/form-data"
              onsubmit="return collectData()">
              <div class="row">
                <div class="col-14 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <h5 style="font-weight: bold; color: #374375;">Thông tin cơ bản</h5>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-9">Tên xí nghiệp<code>*</code></label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" id="xi_nghiep" name="xi_nghiep" maxlength="50"
                                value="<?php echo $row['xi_nghiep'] ?>" required>
                              <input type="hidden" class="form-control" id="mdn" name="mdn" value="<?php echo $row['mdn'] ?>">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group row">
                            <label class="col-sm-9">Tên giám đốc<code>*</code></label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" id="ten_giam_doc" name="ten_giam_doc"
                                value="<?php echo $row['ten_giam_doc'] ?>" maxlength="50" required />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group row">
                            <label for="ngay_sinh" class="col-sm-9">Số điện thoại<code>*</code></label>
                            <div class="col-sm-12">
                              <input type="tel" class="form-control" id="sdt" name="sdt" maxlength="10" pattern="[0-9]+"
                                value="<?php echo $row['sdt_xn'] ?>" required title="Vui lòng điền đúng định dạng số!" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label for="sdt" class="col-sm-9">Địa chỉ xí nghiệp
                              <code>*</code></label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" id="dia_chi_xn" name="dia_chi_xn" maxlength="255"
                                value="<?php echo $row['dia_chi_xn'] ?>" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-5">
                          <div class="form-group row">
                            <label class="col-sm-9">Nghiệp đoàn<code>*</code></label>
                            <div class="col-sm-12">
                              <input type="text" class="form-control" id="nghiep_doan" name="nghiep_doan"
                                value="<?php echo $row['nghiep_doan'] ?>" maxlength="20" required>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-5">
                          <div class="form-group row">
                            <label class="col-sm-9">Ngành nghề<code>*</code></label>
                            <div class="col-sm-12">

                              <div id="nganh_nghe_inputs">
                                <?php

                                foreach ($nganh_nghe_list as $nganh_nghe) {
                                  ?>
                                  <div class="form-group row">

                                    <div class="col-sm-12">
                                      <div class="input-group">
                                        <input type="text" class="form-control" name="nganh_nghe[]"
                                          value="<?php echo $nganh_nghe; ?>">
                                        <div class="input-group-append">
                                          <button class="btn btn-danger" type="button" onclick="removeInput(this)">Xóa</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <?php
                                }
                                ?>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group row" style="margin-top:40px;">
                            <div class="col-sm-12">
                              <button type="button" class="btn btn-secondary btn-sm ml-2"
                                onclick="addInput('nganh_nghe')">Thêm</button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-9">Nơi làm việc</label>
                            <div class="col-sm-12">

                              <div id="noi_lam_viec_inputs">
                                <?php
                                // Tạo input cho mỗi phần tử trong mảng nơi làm việc
                                foreach ($noi_lam_viec_list as $noi_lam_viec) {
                                  ?>
                                  <div class="form-group row">
                                    <div class="col-sm-12">
                                      <div class="input-group">
                                        <input type="text" class="form-control" name="noi_lam_viec[]"
                                          value="<?php echo $noi_lam_viec; ?>">
                                        <div class="input-group-append">
                                          <button class="btn btn-danger" type="button" onclick="removeInput(this)">Xóa</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <?php
                                }
                                ?>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group row" style="margin-top:40px;">
                            <div class="col-sm-12">
                              <button type="button" class="btn btn-secondary btn-sm ml-2"
                                onclick="addInput('noi_lam_viec')">Thêm</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div style="text-align: right; margin-top: 10px;">
                <a href="?chucnang=xinghiep" class="btn btn-light" type="button"
                  style="font-size: 15px; margin-right:5px">Huỷ</a>
                <button type="submit" class="btn btn-primary" style="font-size: 15px;">Cập nhật</button>
              </div>
            </form>
          </div>
          <?php break; ?>
        </div>
        </div>

      </body>
      <script>
        function addInput(inputId) {
          var container = document.getElementById(inputId + '_inputs');
          var inputGroup = document.createElement('div');
          inputGroup.className = 'form-group row';
          var colDiv = document.createElement('div');
          colDiv.className = 'col-sm-12';
          var inputDiv = document.createElement('div');
          inputDiv.className = 'input-group';
          var input = document.createElement('input');
          input.type = 'text';
          input.className = 'form-control';
          input.name = inputId + '[]';
          inputDiv.appendChild(input);
          var deleteButton = document.createElement('button');
          deleteButton.className = 'btn btn-danger';
          deleteButton.textContent = 'Xóa';
          deleteButton.type = 'button';
          deleteButton.onclick = function () {
            container.removeChild(inputGroup);
          };
          var buttonDiv = document.createElement('div');
          buttonDiv.className = 'input-group-append';
          buttonDiv.appendChild(deleteButton);
          inputDiv.appendChild(buttonDiv);
          colDiv.appendChild(inputDiv);
          inputGroup.appendChild(colDiv);
          container.appendChild(inputGroup);
        }

        function collectData() {
          var nganhNgheInputs = document.getElementsByName('nganh_nghe[]');
          var noiLamViecInputs = document.getElementsByName('noi_lam_viec[]');
          var nganhNgheValues = [];
          var noiLamViecValues = [];

          var isNganhNgheFilled = false;
          for (var i = 0; i < nganhNgheInputs.length; i++) {
            if (nganhNgheInputs[i].value.trim() !== '') {
              isNganhNgheFilled = true;
              break;
            }
          }

          var isNoiLamViecFilled = false;
          for (var j = 0; j < noiLamViecInputs.length; j++) {
            if (noiLamViecInputs[j].value.trim() !== '') {
              isNoiLamViecFilled = true;
              break;
            }
          }

          // Nếu không có ít nhất một input ngành nghề hoặc một input nơi làm việc được điền, hiển thị cảnh báo và ngăn việc gửi dữ liệu
          if (!isNganhNgheFilled || !isNoiLamViecFilled) {
            alert('Vui lòng điền ít nhất một ngành nghề và một nơi làm việc trước khi gửi dữ liệu.');
            return false;
          }

          for (var i = 0; i < nganhNgheInputs.length; i++) {
            nganhNgheValues.push(nganhNgheInputs[i].value);
          }

          for (var j = 0; j < noiLamViecInputs.length; j++) {
            noiLamViecValues.push('(' + noiLamViecInputs[j].value + ')');
          }

          document.getElementById('nganh_nghe_collected').value = nganhNgheValues.join(';');
          document.getElementById('noi_lam_viec_collected').value = noiLamViecValues.join('');

          return true;


          window.onload = function () {
            var nganh_nghe_e = "<?php echo $nganh_nghe_e; ?>";
            var nganhNgheInputsContainer = document.getElementById('nganh_nghe_inputs');

            var nganh_nghe_list = nganh_nghe_e.split('; ');

            nganh_nghe_list.forEach(function (nganh_nghe) {
              addInputWithValue('nganh_nghe', nganh_nghe);
            });

            function addInputWithValue(inputId, value) {
              var container = document.getElementById(inputId + '_inputs');
              var input = document.createElement('input');
              input.type = 'text';
              input.className = 'form-control mt-2';
              input.name = inputId + '[]';
              input.maxlength = '50';
              input.value = value;
              var deleteButton = document.createElement('button');
              deleteButton.className = 'btn btn-danger btn-sm ml-2';
              deleteButton.textContent = 'Xóa';
              deleteButton.onclick = function () {
                container.removeChild(input);
                container.removeChild(deleteButton);
              };
              container.appendChild(input);
              container.appendChild(deleteButton);
            }
          };
        }

        function removeInput(button) {
          var inputGroup = button.parentNode.parentNode.parentNode;
          inputGroup.remove();
        }
      </script>
      <?php
      }
    }
  }
  ?>

</html>
