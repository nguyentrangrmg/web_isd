<?php 

include 'config.php';
$res=mysqli_query($mysqli, "SELECT * FROM student ORDER BY CONCAT(SUBSTRING(mhv, 1, 2), SUBSTRING(mhv, -3)) ASC;");
?>
<div>
<h3>Danh sách học viên</h3> 
<!-- Hiển thị thông báo chức năng add -->
<?php 
if(isset($_SESSION['success_message'])) {
  echo '<p style="color: green;">'.$_SESSION['success_message'].'</p>';
  unset($_SESSION['success_message']);
}
 if(isset($_SESSION['error_message'])) {
              echo '<p style="color: red;">'.$_SESSION['error_message'].'</p>';
              unset($_SESSION['error_message']);
          }
?>
<!-- Mấy cái nút -->
<div>
<button type="button" class="btn btn-primary btn-add" data-bs-toggle="modal" data-bs-target="#myModal">
  Thêm mới
</button>
<a href="javascript:void(0)" onclick="delete_all()"><button class="btn btn-danger">Xoa</button></a>
<a href="javascript:void(0)" onclick="import()"><button class="btn btn-success">Nhập Excel</button></a>
<a href="javascript:void(0)" onclick="xuatfile()"><button class="btn btn-secondary">Xuất Excel</button></a>
<!-- Bảng -->
  <form method="post" id="frm">
    <table class="table">
      <tr>
          <th><input type="checkbox" onclick="select_all()" id="select-all-checkbox"/></th>
          <th>MHV</th>
          <th>HovaTen</th>
          <th>NgaySinh</th>
          <th>HoChieu</th>
          <th>CCCD</th>
          <th>QueQuan</th>
          
          <th></th>
      </tr>    
    <?php 
            while ($row = mysqli_fetch_assoc($res)){
                ?>
            <tr id="box<?php echo $row['mhv']?>">
            <td><input type="checkbox" id="<?php echo $row['mhv']?>" name="checkbox[]" value="<?php echo $row['mhv']?>"/></td>
            <td><?php echo $row['mhv'] ?></td>
            <td><?php echo $row['ho_ten'] ?></td>
            <td><?php echo $row['ngay_sinh'] ?></td>
            <td><?php echo $row['ho_chieu'] ?></td>
            <td><?php echo $row['CCCD'] ?></td>
            <td><?php echo $row['que_quan'] ?></td>
            <td><a href="javascript:void(0)" onclick="edit()"><button class="btn btn-primary">Sua</button></a></td>
            </tr>
            
            <?php 
            }
            ?>
      </table>
    </form>
  </div>
</div>

<!-- Modal thêm học viên -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tạo Mới Học Viên</h4>
        <?php
        if(isset($_SESSION['error_message'])) {
            echo '<p style="color: red;">'.$_SESSION['error_message'].'</p>';
            unset($_SESSION['error_message']);
        }
        ?>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form id="addForm">
          <label for="ma_hoc_vien"></label>
          <span id="display_mhv"></span>
          <input type="hidden" id="ma_hoc_vien" name="mhv" /><br />

          <label for="ho_ten">Họ và tên:</label><br />
          <input type="text" id="ho_ten" name="ho_ten" /><br />

          <label for="ngay_sinh">Ngày sinh:</label><br />
          <input type="date" id="ngay_sinh" name="ngay_sinh" /><br />

          <label for="so_dien_thoai">Số điện thoại:</label><br />
          <input type="tel" id="so_dien_thoai" name="so_dien_thoai" /><br />

          <label for="ho_chieu">Hộ chiếu:</label><br />
          <input type="text" id="ho_chieu" name="ho_chieu" /><br />

          <label for="so_cccd">Số CCCD:</label><br />
          <input type="text" id="so_cccd" name="cccd" /><br />

          <label for="que_quan">Quê quán:</label><br />
          <input type="text" id="que_quan" name="que_quan" /><br />

          <label for="nguoi_bao_lanh">Người bảo lãnh:</label><br />
          <input type="text" id="nguoi_bao_lanh" name="nguoi_bao_lanh" /><br />

          <label for="sdt_nguoi_bao_lanh">Số điện thoại người bảo lãnh:</label><br />
          <input type="tel" id="sdt_nguoi_bao_lanh" name="sdt_nguoi_bao_lanh" /><br />
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="addStudent()">Thêm</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
  function select_all(){
    var isChecked = jQuery('#select-all-checkbox').prop("checked");
    jQuery('input[type=checkbox]').prop('checked', isChecked);
    }

    jQuery('input[type=checkbox]').not('#select-all-checkbox').change(function() {
    var allChecked = true;
    // Kiểm tra xem tất cả các checkbox khác đều được chọn không
    jQuery('input[type=checkbox]').not('#select-all-checkbox').each(function() {
      if (!jQuery(this).prop('checked')) {
        allChecked = false;
        return false;
      }
    });
    jQuery('#select-all-checkbox').prop('checked', allChecked);
  });
  function delete_all(){
    if (jQuery('input[type=checkbox]:checked').length > 0) {
        var check = confirm("Are you sure?");
        if (check == true) {
            jQuery.ajax({
                url: 'modules/hocvien/delete.php',
                type: 'post',
                data: jQuery('#frm').serialize(),
                success: function(result) {
                    jQuery('input[type=checkbox]').each(function() {
                        if (jQuery('#' + this.id).prop("checked")) {
                            jQuery('#box' + this.id).remove();
                        }
                    });
                }
            });
        }
    } else {
        alert("Chọn ít nhất 1 checkbox để xóa.");
    }
  }

function addStudent() {
    //auto tạo ID
    var mhv = generateStudentID();
    
    
    var hoTen = jQuery("#ho_ten").val().trim();
    var ngaySinh = jQuery("#ngay_sinh").val().trim();
    var cccd = jQuery("#so_cccd").val().trim();
    var queQuan = jQuery("#que_quan").val().trim();
    var hoChieu = jQuery("#ho_chieu").val().trim();

    
    if (hoTen === '' || ngaySinh === '' || cccd === '' || queQuan === '' || hoChieu === '') {
        alert("Vui lòng điền đầy đủ thông tin học viên!");
        return; 
    }

    
    var formData = {
        mhv: mhv,
        ho_ten: hoTen,
        ngay_sinh: ngaySinh,
        cccd: cccd,
        que_quan: queQuan,
        ho_chieu: hoChieu
        
    };

    
    jQuery.ajax({
        url: 'modules/hocvien/add.php',
        type: 'post',
        data: formData,
        success: function(result) {
            // alert("Thêm học viên thành công."); 
            // location.reload(); 
            if (result.trim() === "exists") {
                alert("Học viên đã tồn tại!");
            } else if (result.trim() === "success"){
                alert("Thêm học viên thành công!"); 
                location.reload(); 
            }
        },
        error: function(xhr, status, error) {
            alert("Error adding student: " + error);
        }
    });
}
// Hàm để tạo mã học viên
function generateStudentID() {
    // Lấy năm hiện tại
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear().toString().substr(-2);

    // Lấy hai số cuối cùng của năm sinh từ ngày sinh
    var yearOfBirth = jQuery("#ngay_sinh").val().trim().substr(2, 2);

    // Tạo một mảng để lưu trữ các số cuối của các mã học viên
    var sequenceNumbers = [];

    // Xác định số cuối của mỗi mã học viên trong các ô checkbox
    jQuery('input[type=checkbox]').not('#select-all-checkbox').each(function() {
        var mhv = jQuery(this).attr('id');
        if (mhv.substr(0, 2) === currentYear) {
            sequenceNumbers.push(parseInt(mhv.substr(-3))); // Thêm số cuối vào mảng
        }
    });

    // Tìm số lượng học viên đã tham gia trong năm hiện tại
    var count = sequenceNumbers.length;

    // Nếu có ít nhất một mã học viên trong năm hiện tại
    if (count > 0) {
        // Sắp xếp mảng theo thứ tự giảm dần để tìm số lớn nhất
        sequenceNumbers.sort(function(a, b) {
            return b - a;
        });
        
        // Lấy số cuối cùng và tăng lên 1
        var lastSequenceNumber = sequenceNumbers[0];
        lastSequenceNumber++;
    } else {
        // Nếu không có mã học viên nào trong năm hiện tại, bắt đầu từ 001
        var lastSequenceNumber = 1;
    }

    // Format số cuối để có số 0 ở đầu (nếu số nhỏ hơn 1000)
    var formattedCount = ('00' + lastSequenceNumber).slice(-3);

    //tạo mã học viên
    var studentID = currentYear + yearOfBirth + formattedCount;

    return studentID;
}


</script>