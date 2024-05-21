<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm đơn hàng</title>
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
        <a href="?typedh=1" style="float: left;"><button class="nut-back"><i
                    class="fas fa-long-arrow-alt-left"></i></button></a>
        <div style="float: right;">
            <a href="?function=themdh"><button class="nut-them">Tạo mới</button></a>
            <a href="javascript:void(0)" onclick="delete_all()"><button class="nut-xoa">Xóa</button></a>
            <a href="javascript:void(0)" onclick="xuatfile()"><button class="nut-xuat">Bộ lọc</button></a>
            <a href="javascript:void(0)" onclick="xuatfile()"><button class="nut-xuat">Xuất Excel</button></a>
            <input type="text" class="search-input" placeholder="Search..." style="vertical-align: middle;">
            <i class="fas fa-search search-icon" style="vertical-align: middle;"></i>
        </div>
    </div>
    <div class="container">
        <div class="add-form">
            <a style="font-size: 25px; font-weight: bold;color: #374375;">Tạo Mới Đơn Hàng</a>
            <a style="font-style: italic;margin-left:10px;font-size:12px"> Vui lòng nhập các trường thông tin bắt buộc (
                <strong style="color: red;">*</strong> ) </a>
            <br>
            <br>
            <form action="modules/donhang/add/adddh.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4">
                        <label for="type_hv" class="form-label">Chọn loại đơn hàng:<code>*</code></label>
                        <select class="form-select" id="type_hv" name="type_hv">
                            <option value="1">Thực tập sinh số 1</option>
                            <option value="3">Thực tập sinh số 3</option>
                            <option value="dd">Kỹ năng đặc định</option>
                        </select>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-14 grid-margin">
                        <div class="card">
                            <div class="card-body">
                                <h5 style="font-weight: bold; color: #374375;">Thông tin cơ bản</h5>
                                <form class="forms-sample">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-9">Tên đơn hàng<code>*</code></label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="ten_dh" name="ten_dh"
                                                        maxlength="50" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-9">Nghiệp
                                                    đoàn<code>*</code></label></label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="nghiep_doan"
                                                        name="nghiep_doan" maxlength="50" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Xem xet -->
                                    <?php
                                    require 'config.php';
                                    $res = mysqli_query($mysqli, "SELECT * FROM enterprise ORDER BY SUBSTRING(mdn, -3) ASC");

                                    if ($res === false) {
                                        echo "Error: " . mysqli_error($mysqli);
                                    } else {
                                    ?>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group row ">
                                                <label class="col-sm-9">Xí nghiệp<code>*</code></label>
                                                <div class="col-sm-12">
                                                    <select class="form-select" id="xi_nghiep" name="xi_nghiep"
                                                        onchange="getValue()" required>
                                                        <option value="">Chọn xí nghiệp</option>
                                                        <?php while ($row = mysqli_fetch_assoc($res)) { ?>
                                                        <option value="<?php echo $row['xi_nghiep'] ?>">
                                                            <?php echo $row['xi_nghiep'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-9">Ngành nghề<code>*</code></label>
                                                <div class="col-sm-12">
                                                    <select class="form-select" id="nganh_nghe" name="nganh_nghe"
                                                        required>
                                                        <option value="default">Vui lòng chọn xí nghiệp trước</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-9">Nơi làm việc<code>*</code></label>
                                                <div class="col-sm-12">
                                                    <select class="form-select" id="noi_lv" name="noi_lv" required>
                                                        <option value="default">Vui lòng chọn xí nghiệp trước</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                    function getValue() {
                                        var selectedValue = document.getElementById("xi_nghiep").value;
                                        getNganhNghe(selectedValue);
                                        getNoiLamViec(selectedValue);
                                    }

                                    function getNganhNghe() {
                                        var selectedValue = document.getElementById("xi_nghiep").value;

                                        $.ajax({
                                            url: 'modules/donhang/add/process.php',
                                            type: 'POST',
                                            data: {
                                                xi_nghiep: selectedValue
                                            },
                                            success: function(response) {
                                                var select = document.getElementById("nganh_nghe");
                                                select.innerHTML = response;
                                            },
                                            error: function(xhr, status, error) {
                                                console.error(xhr.responseText);
                                            }
                                        });
                                    }

                                    function getNoiLamViec() {
                                        var selectedValue = document.getElementById("xi_nghiep").value;

                                        $.ajax({
                                            url: 'modules/donhang/add/pro_noi_lv.php',
                                            type: 'POST',
                                            data: {
                                                xi_nghiep: selectedValue
                                            },
                                            success: function(response) {
                                                var select = document.getElementById("noi_lv");
                                                select.innerHTML = response;
                                            },
                                            error: function(xhr, status, error) {
                                                console.error(xhr.responseText);
                                            }
                                        });
                                    }
                                    </script>



                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-9">Dự kiến thi
                                                    tuyển<code>*</code></label>
                                                <div class="col-sm-12">
                                                    <input type="date" class="form-control" id="du_kien_tt"
                                                        name="du_kien_tt" maxlength="50" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group row"><label class="col-sm-9">Ngày thi
                                                    tuyển<code>*</code></label>
                                                <div class="col-sm-12">
                                                    <input type="date" class="form-control" id="ngay_tt" name="ngay_tt"
                                                        maxlength="50" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                        $status = isset($_POST['hinh_thuc_tt']) ? $_POST['hinh_thuc_tt'] : '';
                                        $otherText = isset($_POST['otherText']) ? $_POST['otherText'] : '';
                                        ?>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label for="hinh_thuc_tt" class="col-sm-9">Hình thức thi
                                                    tuyển<code>*</code></label>
                                                <div class="col-sm-12">
                                                    <select class="form-select" id="hinh_thuc_tt" name="hinh_thuc_tt"
                                                        onchange="showOtherInput()">
                                                        <option value="offline"
                                                            <?php echo $status == 'offline' ? 'selected' : ''; ?>>
                                                            Offline</option>
                                                        <option value="online"
                                                            <?php echo $status == 'online' ? 'selected' : ''; ?>>Online
                                                        </option>
                                                        <option value="other"
                                                            <?php echo $status == 'other' ? 'selected' : ''; ?>>Khác
                                                        </option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <div class="col-sm-12" id="other-input"
                                                    style="display: <?php echo $status == 'other' ? 'block' : 'none'; ?>;">
                                                    <label for="otherText" class="col-sm-9">Vui lòng mô tả chi
                                                        tiết:<code>*</code> </label>
                                                    <input type="text" class="form-control" id="otherText"
                                                        name="otherText"
                                                        value="<?php echo htmlspecialchars($otherText); ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group row"><label class="col-sm-9">Ngày xuất
                                                    cảnh
                                                </label>
                                                <div class="col-sm-12">
                                                    <input type="date" class="form-control" id="ngay_xc" name="ngay_xc"
                                                        maxlength="50">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group row"><label class="col-sm-9">Ngày về
                                                    nước</label>
                                                <div class="col-sm-12">
                                                    <input type="date" class="form-control" id="ngay_vn" name="ngay_vn"
                                                        maxlength="50">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="m-col">
                                            <label class="col-sm-9" style="white-space: nowrap;">Số lượng
                                                tuyển<code>*</code></label>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="form-group row">
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" id="so_luong_tuyen"
                                                                name="so_luong_tuyen" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4" style="white-space: nowrap;">Ghi chú yêu
                                                            cầu</label>
                                                        <div class="col-sm-7">
                                                            <input type="number" class="form-control" id="sl_nam"
                                                                name="sl_nam" required min="0" step="1"
                                                                placeholder="Số lượng Nam" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Độ tuổi</label>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" id="tuoi_nam1"
                                                                name="tuoi_nam1" />
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="row">
                                                                <div class="col-sm-3 col-form-label">
                                                                    <i class="fa-solid fa-arrow-right"></i>
                                                                </div>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control"
                                                                        id="tuoi_nam2" name="tuoi_nam2" required />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4" style="margin-left: 220px;">
                                            <div class="form-group row">
                                                <label class="col-sm-3"></label>
                                                <div class="col-md-9">
                                                    <input type="number" class="form-control" id="sl_nu" name="sl_nu"
                                                        required min="0" step="1" placeholder="Số lượng Nữ" />

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4" style="margin-left: 25px;">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label ">Độ tuổi</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="tuoi_nu1"
                                                        name="tuoi_nu1" />
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="row">
                                                        <div class="col-sm-3 col-form-label">
                                                            <i class="fa-solid fa-arrow-right"></i>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="tuoi_nu2"
                                                                name="tuoi_nu2" required />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label">Mức lương</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group row">
                                                <label class="col-sm-3 offset-md-1">Lương cơ bản</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="luong_co_ban"
                                                        name="luong_co_ban" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group row">
                                                <label class="col-sm-3 offset-md-1">Lương thực tế</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="luong_thuc_te"
                                                        name="luong_thuc_te" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group row">
                                                <label class="col-sm-9">Chế độ phụ cấp</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="che_do_phu_cap"
                                                        name="che_do_phu_cap" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-3">Thời gian làm việc</label>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group row">
                                                <label class="col-sm-3 offset-md-1">Theo ngày</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="lv_theo_ngay"
                                                        name="lv_theo_ngay" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-sm-6">tiếng/ngày</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group row">
                                                <label class="col-sm-3 offset-md-1">Theo tuần</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="lv_theo_tuan"
                                                        name="lv_theo_tuan" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-sm-6 col-form-label">tiếng/ngày</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group row">
                                                <label class="col-sm-3 offset-md-1">Thời gian nghỉ</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="nghi" name="nghi" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="col-sm-6 col-form-label">tiếng/ngày</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group row">
                                                <label class="col-sm-9" for="trang_thai">Trạng
                                                    thái<code>*</code></label>
                                                <div class="col-sm-9">
                                                    <select class="form-control" id="trang_thai" name="trang_thai"
                                                        required>
                                                        <option value="Đang tuyển">Đang tuyển</option>
                                                        <option value="Đã hoàn thành">Đã hoàn thành</option>
                                                        <option value="Bị hủy">Bị hủy</option>
                                                    </select>
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
                                <div class="form-group">
                                    <h5 style="font-weight: bold; color: #374375;">Ghi chú</h5>
                                    <textarea class="form-control" id="ghi_chu" name="ghi_chu" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <div style="text-align: right; margin-top: 10px;">
                            <a href="#" class="btn btn-light" type="button"
                                style="font-size: 15px; margin-right:5px">Huỷ</a>
                            <button type="submit" class="btn btn-primary" style="font-size: 15px;">Tạo
                                mới</button>
                        </div>

                    </div>
                </div>

        </div>

    </div>

    <?php } ?>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>

<script>
function showOtherInput() {
    var selectElement = document.getElementById('hinh_thuc_tt');
    var otherInput = document.getElementById('other-input');
    if (selectElement.value === 'other') {
        otherInput.style.display = 'block';
    } else {
        otherInput.style.display = 'none';
        document.getElementById('otherText').value = ''; // Clear the input when not 'other'
    }
}

function updateOtherValue() {
    var otherInputValue = document.getElementById('otherText').value;
    var selectElement = document.getElementById('hinh_thuc_tt');
    var otherOption = selectElement.querySelector('option[value="other"]');
    otherOption.value = otherInputValue;
}
</script>

</html>
