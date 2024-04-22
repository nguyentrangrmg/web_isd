<?php
include 'config.php';
$res = mysqli_query($mysqli, "SELECT * FROM bin_order ORDER BY created_at DESC;");

if ($res === false) {
    echo "Error: " . mysqli_error($mysqli);
} else {
    ?>
    <!-- Menu -->
    <div class="loai_hv">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link " href="?typebin=hv" style="text-decoration: none;color:black" >Học Viên</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="?typebin=dh" style="text-decoration: none;color:black" >Đơn hàng</a>
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
                <th style="white-space: nowrap;">MDH</th>
                <th style="white-space: nowrap;">Tên đơn hàng</th>
                <th style="white-space: nowrap;">Xí nghiệp</th>
                <th style="white-space: nowrap;">Ngành nghề</th>
                <th style="white-space: nowrap;">Giới tính</th>
                <th style="white-space: nowrap;">Số lượng tuyển</th>
                <th style="white-space: nowrap;">Độ tuổi</th>
                <th style="white-space: nowrap;">Ngày thi tuyển</th>
                <th style="white-space: nowrap;">Trạng thái</th>
                <th style="white-space: nowrap;">Hình thức</th>
                  <th></th>
              </tr>    
                    </thead>
                    <?php 
                    while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                        <tr id="box<?php echo $row['mdh']?>">
                        <td><input type="checkbox" id="<?php echo $row['mdh']?>" 
                        name="checkbox[]" value="<?php echo $row['mdh']?>"/></td>
                        <td style="white-space: nowrap;"><?php echo $row['mdh'] ?></td>
                        <td style="white-space: nowrap;"><?php echo $row['ten_dh'] ?></td>
                        <td style="white-space: nowrap;"><?php echo $row['xi_nghiep'] ?></td>
                        <td style="white-space: nowrap;"><?php echo $row['nganh_nghe'] ?></td>
                        <td style="white-space: nowrap;"><?php echo $row['gioi_tinh'] ?></td>
                        <td style="white-space: nowrap;"><?php echo $row['so_luong_tuyen'] ?></td>
                        <td style="white-space: nowrap;"><?php echo $row['do_tuoi'] ?></td>
                        <td><?php echo date('d/m/Y', strtotime($row['ngay_tt'])) ?></td>
                        <td><?php echo $row['trang_thai'] ?></td>
                        <td><?php echo $row['hinh_thuc_tt'] ?></td>
                        <td>
                        <div style="display:flex" class="action-buttons">
                                <form action="#" method="#"> <!-- bỏ cái này thì nút edit dòng đầu tiên sẽ không hoạt động -->
                                    <button type="hidden"style="padding:0px;border: none; background: none; color: inherit;"></button>
                                </form>
                                <form action="modules/thung-rac/bin_dh/restore_bin.php" method="POST">
                                <input type="hidden" name="restore" value="<?php echo $row['mdh']; ?>">
                                    <button type="submit" class="khoi-phuc" style="border: none; background: none; color: inherit;"><i class="fas fa-pen edit"></i></button>
                                </form>
                                <form action="modules/thung-rac/bin_dh/delete_dh.php" method="POST">
                                <input type="hidden" name="delete" value="<?php echo $row['mdh']; ?>">
                                <button type="submit" class="xoa" style="border: none; background: none; color: inherit;"><i class="fas fa-trash trash"></i></button>
                                </form>
                            </div>

                            </td>
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
                        url: 'modules/thung-rac/bin_dh/delete_dh.php',
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
                alert("Vui lòng chọn ít nhất 1 checkbox để xóa.");
            }
        }
        function restore_all(){
            if (jQuery('input[type=checkbox]:checked').length > 0) {
                var check = confirm("Bạn có muốn khôi phục học viên này?");
                
                if (check == true) {
                    jQuery.ajax({
                        url: 'modules/thung-rac/bin_order/restore_dh.php',
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
