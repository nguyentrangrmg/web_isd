<?php 
include 'config.php';
$res=mysqli_query($mysqli, "select * from student");
?>
<div>
<h2>Danh sách học viên</h2>
<div>
<a href="javascript:void(0)" onclick="add()"><button class="add">Them moi</button></a>
<a href="javascript:void(0)" onclick="delete_all()"><button class="dele">Xoa</button></a>
<a href="javascript:void(0)" onclick="import()"><button class="add">Nhập Excel</button></a>
<a href="javascript:void(0)" onclick="xuatfile()"><button class="add">Xuất Excel</button></a>

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
            <td><a href="javascript:void(0)" onclick="edit()"><button class="edit">Sua</button></a></td>
            </tr>
            
            <?php 
            }
            ?>
      </table>
    </form>
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
</script>