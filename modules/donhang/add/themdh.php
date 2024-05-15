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
<div class="container">
  <div class="add-form">
    <a style="font-size: 25px; font-weight: bold;color: #374375;">Tạo Mới Đơn Hàng</a>
    <a style="font-style: italic;margin-left:10px;font-size:12px"> Vui lòng nhập các trường thông tin bắt buộc ( <strong style="color: red;">*</strong> ) </a>
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
                                                       <input type="text" class="form-control" id="ten_dh" name="ten_dh" maxlength="50" required>
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
                                                           <input type="text" class="form-control" required />
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                           <label>Xí nghiệp<code>*</code></label>
                                           <div class="row">
                                               <div class="col-md-4">
                                                   <div class="form-group row">
                                                       <div class="col-sm-12">
                                                           <input type="text" class="form-control" required />
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="col-md-4">
                                                   <div class="form-group row">
                                                       <label class="col-sm-3" style="white-space: nowrap;">Giám đốc</label>
                                                       <div class="col-sm-9">
                                                           <input type="text" class="form-control" required />
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="col-md-4">
                                                   <div class="form-group row">
                                                       <label class="col-sm-3" style="white-space: nowrap;">Số điện thoại</label>
                                                       <div class="col-sm-9">
                                                           <input type="text" class="form-control" required />
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="col-md-4 offset-md-4">
                                                   <div class="form-group row">
                                                       <label class="col-sm-3" style="white-space: nowrap;">Địa chỉ</label>
                                                       <div class="col-md-9">
                                                           <input type="text" class="form-control" required />
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>


                                           <div class="row">
                                               <div class="col-md-4">
                                                   <div class="form-group row">
                                                       <label class="col-sm-9">Ngành nghề<code>*</code></label>
                                                       <div class="col-sm-12">
                                                           <input type="text" class="form-control" />
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="row">
                                               <div class="col-md-4">
                                                   <div class="form-group row">
                                                       <label class="col-sm-9">Dự kiến thi
                                                           tuyển<code>*</code></label>
                                                       <div class="col-sm-12">
                                                           <input type="text" class="form-control" />
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="row">
                                               <div class="col-md-4">
                                                   <div class="form-group row"><label class="col-sm-9">Ngày thi
                                                           tuyển</label>
                                                       <div class="col-sm-12">
                                                           <input type="date" class="form-control" />
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="row">
                                               <div class="col-md-4">
                                                   <div class="form-group row">
                                                       <label class="col-sm-9">Hình thức thi
                                                           tuyển<code>*</code></label>
                                                       <div class="col-sm-12">
                                                           <input type="text" class="form-control" />
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
                                                           <input type="date" class="form-control" />
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="row">
                                               <div class="col-md-4">
                                                   <div class="form-group row"><label class="col-sm-9">Ngày về
                                                           nước</label>
                                                       <div class="col-sm-12">
                                                           <input type="date" class="form-control" />
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="row">
                                               <div class="col-md-4">
                                                   <div class="form-group row"><label class="col-sm-9">Số lượng tuyển</label>
                                                       <div class="col-sm-12">
                                                       <input type="text" class="form-control" required />
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="col-md-4">
                                                       <div class="form-group row">
                                                           <label class="col-sm-4" style="white-space: nowrap;">Ghi chú yêu cầu</label>
                                                           <div class="col-sm-9">
                                                               <input type="text" class="form-control"
                                                                   placeholder="Nam" />
                                                           </div>
                                                       </div>
                                                   </div>
                                                   
                                           </div>
                                           <div class="row">
                                           <div class="m-col">
                                               <label class="col-sm-9" style="white-space: nowrap;">Số lượng tuyển</label>
                                               <div class="row">
                                                   <div class="col-md-4">
                                                       <div class="form-group row">
                                                           <div class="col-sm-6">
                                                               <input type="text" class="form-control" required />
                                                           </div>
                                                       </div>
                                                   </div>
                                                   <div class="col-md-4">
                                                       <div class="form-group row">
                                                           <label class="col-sm-3" style="white-space: nowrap;">Ghi chú yêu cầu</label>
                                                           <div class="col-sm-9">
                                                               <input type="text" class="form-control"
                                                                   placeholder="Nam" />
                                                           </div>
                                                       </div>
                                                   </div>
                                                   <div class="col-md-4">
                                                       <div class="form-group row">
                                                           <label class="col-sm-3 col-form-label">Độ tuổi</label>
                                                           <div class="col-sm-4">
                                                               <input type="text" class="form-control" />
                                                           </div>
                                                           <div class="col-md-5">
                                                               <div class="row">
                                                                   <div class="col-sm-3 col-form-label">
                                                                       <i class="fa-solid fa-arrow-right"></i>
                                                                   </div>
                                                                   <div class="col-sm-9">
                                                                       <input type="text" class="form-control"
                                                                           required />
                                                                   </div>
                                                               </div>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                           </div>
                                           <div class="row">
                                               <div class="col-md-4 offset-md-4">
                                                   <div class="form-group row">
                                                       <label class="col-sm-3"></label>
                                                       <div class="col-md-9">
                                                           <input type="text" class="form-control" required
                                                               placeholder="Nữ" />
                                                       </div>
                                                   </div>
                                               </div>
                                               <div class="col-md-4">
                                                   <div class="form-group row">
                                                       <label class="col-sm-3 col-form-label ">Độ tuổi</label>
                                                       <div class="col-sm-4">
                                                           <input type="text" class="form-control" />
                                                       </div>
                                                       <div class="col-md-5">
                                                           <div class="row">
                                                               <div class="col-sm-3 col-form-label">
                                                                   <i class="fa-solid fa-arrow-right"></i>
                                                               </div>
                                                               <div class="col-sm-9">
                                                                   <input type="text" class="form-control" required />
                                                               </div>
                                                           </div>
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
                                               <label class="col-sm-3 col-form-label">Mức lương</label>
                                           </div>
                                           <div class="row">
                                               <div class="col-md-8">
                                                   <div class="form-group row">
                                                       <label class="col-sm-3 offset-md-1">Lương cơ bản</label>
                                                       <div class="col-sm-8">
                                                           <input type="text" class="form-control" />
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="row">
                                               <div class="col-md-8">
                                                   <div class="form-group row">
                                                       <label class="col-sm-3 offset-md-1">Lương thực tế</label>
                                                       <div class="col-sm-8">
                                                           <input type="text" class="form-control" />
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="row">
                                               <div class="col-md-8">
                                                   <div class="form-group row">
                                                       <label class="col-sm-9">Chế độ phụ cấp</label>
                                                       <div class="col-sm-12">
                                                           <input type="text" class="form-control" />
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="row">
                                               <label class="col-sm-3 col-form-label">Thời gian làm việc</label>
                                           </div>
                                           <div class="row">
                                               <div class="col-md-8">
                                                   <div class="form-group row">
                                                       <label class="col-sm-3 offset-md-1">Theo ngày</label>
                                                       <div class="col-sm-4">
                                                           <input type="text" class="form-control" />
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
                                                       <label class="col-sm-3 offset-md-1">Theo tuần</label>
                                                       <div class="col-sm-4">
                                                           <input type="text" class="form-control" />
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
                                                           <input type="text" class="form-control" />
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
                                                       <label class="col-sm-9" for="SelectState">Trạng
                                                           thái<code>*</code></label>
                                                       <div class="col-sm-9">
                                                           <select class="form-control" id="SelectSelect" required>
                                                               <option>Đang đào tạo</option>
                                                               <option>Đang làm việc</option>
                                                               <option>Đã về nước</option>
                                                           </select>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                   </div>
                               </div>
                           </div>


                           <div class="card">
                               <div class="card-body">
                                   <div class="form-group">
                                       <label for="Textarea">Ghi chú</label>
                                       <textarea class="form-control" id="Textarea" rows="5"></textarea>
                                   </div>
                               </div>
                           </div>
                           <div style="text-align: right; margin-top: 10px;">
                        <button type="submit" class="btn btn-primary" style="font-size: 15px;">Tạo</button>
                        </div>
                       </div>
                       </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
   </div>
    
    </form>
  </div>
</div>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
<!-- <body>
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
<div class="container">
  <div class="add-form">
    <a style="font-size: 25px; font-weight: bold;color: #374375;">Tạo Mới Đơn Hàng</a>
    <a style="font-style: italic;margin-left:10px;font-size:12px"> Vui lòng nhập các trường thông tin bắt buộc ( <strong style="color: red;">*</strong> ) </a>
    <br>
    <br>
    <form action="modules/donhang/add/adddh.php" method="POST" enctype="multipart/form-data">
    <div class="row">
       <div class="col-md-4">
              <label for="type_hv" class="form-label">Chọn loại đơn hàng:</label>
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
            <label for="ten_dh" class="form-label">Tên đơn hàng:</label>
            <input type="text" class="form-control" id="ten_dh" name="ten_dh" maxlength="50" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label for="nghiep_doan" class="form-label">Nghiệp đoàn:</label>
            <input type="text" class="form-control" id="nghiep_doan" name="nghiep_doan" required title="Nghiệp đoàn không được bỏ trống!">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="mb-3">
            <label for="xi_nghiep" class="form-label">Xí nghiệp:</label>
            <input type="text" class="form-control" id="xi_nghiep" name="xi_nghiep" maxlength="50" require title="Xí nghiệp không được bỏ trống!">
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label for="ngay_cap_hc" class="form-label">Giám đốc:</label>
            <input type="text" class="form-control" id="ngay_cap_hc" name="ngay_cap_hc" maxlength="60">
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label for="sdt_gd" class="form-label">SĐT:</label>
            <input type="tel" class="form-control" id="sdt_gd" name="sdt_gd" maxlength="10" pattern="[0-9]{+}" required title="Vui lòng nhập chữ số.">
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label for="dia_chi" class="form-label">Địa chỉ:</label>
            <input type="text" class="form-control" id="dia_chi" name="dia_chi">
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
            <label for="nganh_nghe" class="form-label">Ngành nghề:</label>
            <input type="text" class="form-control" id="nganh_nghe" name="nganh_nghe" maxlength="50">
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label for="dia_chi" class="form-label">Dự kiến thi tuyển:</label>
            <input type="text" class="form-control" id="dia_chi" name="dia_chi" maxlength="50">
          </div>
        </div>
        <div class="col-md-4">
          <div class="mb-3">
            <label for="dia_chi" class="form-label">Ngày thi tuyển:</label>
            <input type="date" class="form-control" id="nganh_nghe" name="nganh_nghe" maxlength="50">
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
    <div style="text-align: right; margin-top: 10px;">
    <button type="submit" class="btn btn-primary" style="font-size: 15px;">Tạo</button>
    </div>
    </form>
  </div>
</div>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body> -->
</html>
