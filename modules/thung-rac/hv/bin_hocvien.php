<?php
include 'config.php';
$res = mysqli_query($mysqli, "SELECT * FROM bin_student ORDER BY created_at DESC;");

if ($res === false) {
    echo "Error: " . mysqli_error($mysqli);
} else {
    ?>
    <!-- Menu -->
    <div class="loai_hv">
        <ul class="nav nav-tabs">
        <li class="nav-item">
                <a class="nav-link  active" href="?typebin=hv" style="text-decoration: none;color:black" >Học Viên</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?typebin=dh" style="text-decoration: none;color:black" >Đơn hàng</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?typebin=xn" style="text-decoration: none;color:black" >Xí nghiệp</a>
            </li>
        </ul>
    </div>
    <div class="function" style="text-align: right;">
        
        <a href="?function=them" ><button class="nut-them">Tạo mới</button></a>
        <a href="javascript:void(0)" onclick="delete_all()"><button class="nut-xoa">Xóa</button></a>
        <a href="javascript:void(0)" onclick="restore_all()"><button class="nut-re">Khôi phục</button></a>
        <input type="text" class="search-input" placeholder="Search...">
        <i class="fas fa-search search-icon"></i>
    </div>
    <div class="content">
    
    <div class="table-container" style="max-height: 500px; overflow: auto;">
            <form method="post" id="frm">
                <table class="table table-hover table-stripe">
                    <thead class="color-head">
                    <tr>
                        <th><input type="checkbox" onclick="select_all()" id="select-all-checkbox"/></th>
                        <th>Mã học viên</th>
                        <th>Họ và Tên</th>
                        <th style="white-space: nowrap;">Ngày Sinh</th>
                        <th>Số điện thoại</th>
                        <th>Ngày thi tuyển</th>
                        <th>Ngày nhập học</th>
                        <th>Tên đơn hàng</th>
                        <th>Trạng thái</th>
                        <th>Ghi chú</th>
                        <th></th>
                    </tr>
                    </thead>
                    <?php 
                    while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                        <tr id="box<?php echo $row['mhv']?>">
                        <td>
                            <!-- Input hidden để lưu trữ các giá trị mhv -->
                            <input type="hidden" name="mhv[]" value="<?php echo $row['mhv']?>">
                            <!-- Input hidden để lưu trữ các giá trị created_at -->
                            <input type="hidden" name="created_at[]" value="<?php echo $row['created_at']?>">
                            <!-- Checkbox để chọn học viên -->
                            <input type="checkbox" id="<?php echo $row['mhv']?>" name="checkbox[]" value="<?php echo $row['created_at']?>">
                        </td>

                            <td><?php echo $row['mhv'] ?></td>
                            <td><a href="index.php?action=view&mhv=<?php echo $row['mhv']; ?>" 
                            class="view" style="text-decoration: none;color:black" >
                            <?php echo $row['ho_ten'] ?></a></td>
                            <td><?php echo date('d/m/Y', strtotime($row['ngay_sinh'])) ?></td>
                            <td><?php echo $row['sdt'] ?></td>
                            <td><?php echo date('d/m/Y', strtotime($row['ngay_thi'])) ?></td>
                            <td><?php echo date('d/m/Y', strtotime($row['ngay_nhaphoc'])) ?></td>
                            <td><?php echo $row['order_name'] ?></td>
                            <td><?php echo $row['status'] ?></td>
                            <td><?php echo $row['note'] ?></td>
                            <td>
                            
                            <div style="display:flex" class="action-buttons">
                                <form action="#" method="#"> <!-- bỏ cái này thì nút edit dòng đầu tiên sẽ không hoạt động -->
                                    <button type="hidden"style="padding:0px;border: none; background: none; color: inherit;"></button>
                                </form>
                                <form action="modules/thung-rac/hv/restore_bin.php" method="POST">
                                <input type="hidden" name="restore" value="<?php echo $row['mhv']; ?>">
                                <input type="hidden" name="created_at" value="<?php echo $row['created_at']; ?>">
                                    <button type="submit" class="khoi-phuc" style="border: none; background: none; color: inherit;"><i class="fas fa-undo-alt edit"></i></button>
                                </form>
                                <form action="modules/thung-rac/hv/delete_bin.php" method="POST">
                                <input type="hidden" name="delete" value="<?php echo $row['mhv']; ?>">
                                <input type="hidden" name="created_at" value="<?php echo $row['created_at']; ?>">
                                <button type="submit" class="xoa" style="border: none; background: none; color: inherit;"><i class="fas fa-trash trash"></i></button>
                                </form>
                            </div>

                            </td>
                        </tr>
                        <?php 
                    }
                    ?>
                </table>
                <?php 
                if (mysqli_num_rows($res) == 0) {
                    echo "<div style='text-align: center; 
                    margin-top: 20px; font-size: 24px; font-weight: bold; font-family: Arial, sans-serif;'>
                    Không có gì ở đây cả!</div>";
                } ?>
            </form>
        </div>
    </div>
   

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
       <script>
        //checkbox
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
                var check = confirm("Bạn có muốn xóa vĩnh viễn học viên này?");
                
                if (check == true) {
                    jQuery.ajax({
                        url: 'modules/thung-rac/hv/delete_bin.php',
                        type: 'post',
                        data: jQuery('#frm').serialize(),
                        success: function(result) {
                            jQuery('input[type=checkbox]').each(function() {
                                if (jQuery('#' + this.id).prop("checked")) {
                                    jQuery('#box' + this.id).remove();
                                }
                            });
                            
                    alert("Học viên này đã bị xóa.");
                        }
                    });
                }
            } else {
                alert("Vui lòng chọn ít nhất 1 checkbox để xóa.");
            }
        }
        function restore_all(){
            if (jQuery('input[type=checkbox]:checked').length > 0) {
                var check = confirm("Bạn có muốn khôi phục học viên này?");
                
                if (check == true) {
                    jQuery.ajax({
                        url: 'modules/thung-rac/hv/restore_bin.php',
                        type: 'post',
                        data: jQuery('#frm').serialize(),
                        success: function(result) {
                            jQuery('input[type=checkbox]').each(function() {
                                if (jQuery('#' + this.id).prop("checked")) {
                                    jQuery('#box' + this.id).remove();
                                }
                                
                            });
                            alert("Khôi phục học viên thành công!");
                        }
                    });
                }
            } else {
                alert("Vui lòng chọn ít nhất 1 checkbox để khôi phục dữ liệu.");
            }
        }
        //icon xoa
        jQuery('.xoa').click(function(e) {
        e.preventDefault();
        var confirmation = confirm("Bạn có muốn xóa vĩnh viễn học viên này?");
        if (confirmation) {
            var form = jQuery(this).closest('form');
            jQuery.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: form.serialize(),
                success: function(result) {
                    form.closest('tr').remove();
                    
                    alert("Học viên này đã bị xóa.");
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    });
        //icon restore
        jQuery('.khoi-phuc').click(function(e) {
        e.preventDefault();
        var confirmation = confirm("Bạn có khôi phục thông tin học viên này?");
        if (confirmation) {
            var form = jQuery(this).closest('form');
            jQuery.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: form.serialize(),
                success: function(result) {
                    form.closest('tr').remove();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    });
    
    </script>
     <?php
}
?>
