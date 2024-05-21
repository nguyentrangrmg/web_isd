<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm xí nghiệp</title>
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
<div class="function" style="overflow: hidden;">
    <a href="?chucnang=xinghiep" style="float: left;"><button class="nut-back"><i class="fas fa-long-arrow-alt-left"></i></button></a>
    <div style="float: right;">
        <a href="?function=themxn" ><button class="nut-them" >Tạo mới</button></a>
        <a href="#"><button class="nut-xoa">Xóa</button></a>
        <a href="#" onclick="xuatfile()"><button class="nut-xuat">Xuất Excel</button></a>  
        <input type="text" class="search-input" placeholder="Search..." style="vertical-align: middle;">
        <i class="fas fa-search search-icon" style="vertical-align: middle;"></i>
    </div>
</div>
<div class="container">
  <div class="add-form">
    <a style="font-size: 25px; font-weight: bold;color: #374375;">Tạo Mới Xí Nghiệp</a>
    <a style="font-style: italic;margin-left:10px;font-size:12px"> Vui lòng nhập các trường thông tin bắt buộc ( <strong style="color: red;">*</strong> ) </a>
    <br>
    <br>
    <form action="modules/xi_nghiep/add/addxn.php" method="POST" enctype="multipart/form-data" onsubmit="return collectData()">
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
                      <input type="text" class="form-control" id="xi_nghiep" name="xi_nghiep" maxlength="50" required>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group row">
                    <label class="col-sm-9">Tên giám đốc<code>*</code></label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="ten_giam_doc" name="ten_giam_doc" maxlength="50" required />
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group row">
                    <label for="ngay_sinh" class="col-sm-9">Số điện thoại<code>*</code></label>
                    <div class="col-sm-12">
                      <input type="tel" class="form-control" id="sdt" name="sdt" maxlength="10" pattern="[0-9]+" required title="Vui lòng điền đúng định dạng số!"/>
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
                      <input type="text" class="form-control" id="dia_chi_xn" name="dia_chi_xn" maxlength="255"/>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group row">
                    <label class="col-sm-9">Nghiệp đoàn<code>*</code></label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="nghiep_doan" name="nghiep_doan" maxlength="20" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group row">
                    <label class="col-sm-9">Ngành nghề<code>*</code></label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="nganh_nghe" name="nganh_nghe[]" maxlength="50">
                      <div id="nganh_nghe_inputs"></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group row" style="margin-top:40px;">
                    <div class="col-sm-12">
                    <button type="button" class="btn btn-secondary btn-sm ml-2" onclick="addInput('nganh_nghe')">Thêm</button>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group row">
                    <label class="col-sm-9">Nơi làm việc</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="noi_lam_viec" name="noi_lam_viec[]" maxlength="255">
                      <div id="noi_lam_viec_inputs"></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group row" style="margin-top:40px;">
                    <div class="col-sm-12">
                      <button type="button" class="btn btn-secondary btn-sm ml-2" onclick="addInput('noi_lam_viec')">Thêm</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div style="text-align: right; margin-top: 10px;">
        <a href="#" class="btn btn-light" type="button" style="font-size: 15px; margin-right:5px" >Huỷ</a>
        <button type="submit" class="btn btn-primary" style="font-size: 15px;">Tạo mới</button>
      </div>
    </form>
  </div>
</div>
</div>
</div>
</body>
<script>
  function addInput(inputId) {
    var container = document.getElementById(inputId + '_inputs');
    var input = document.createElement('input');
    input.type = 'text';
    input.className = 'form-control mt-2';
    input.name = inputId + '[]'; // Add [] to make it an array
    input.maxlength = '255';
    var deleteButton = document.createElement('button');
    deleteButton.className = 'btn btn-danger btn-sm ml-2';
    deleteButton.textContent = 'Xóa';
    deleteButton.onclick = function() {
      container.removeChild(input);
      container.removeChild(deleteButton);
    };
    container.appendChild(input);
    container.appendChild(deleteButton);
  }

  function collectData() {
    var nganhNgheInputs = document.getElementsByName('nganh_nghe[]');
    var noiLamViecInputs = document.getElementsByName('noi_lam_viec[]');
    var nganhNgheValues = [];
    var noiLamViecValues = [];

    // Collect nganh nghe values
    for (var i = 0; i < nganhNgheInputs.length; i++) {
      nganhNgheValues.push(nganhNgheInputs[i].value);
    }

    // Collect noi lam viec values
    for (var j = 0; j < noiLamViecInputs.length; j++) {
      noiLamViecValues.push('(' + noiLamViecInputs[j].value + ')');
    }

    // Set the collected values to hidden inputs for submitting
    document.getElementById('nganh_nghe_collected').value = nganhNgheValues.join(';');
    document.getElementById('noi_lam_viec_collected').value = noiLamViecValues.join('');

    return true; // Allow form submission
  }
</script>
</html>

