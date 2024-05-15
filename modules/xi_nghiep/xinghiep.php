
<?php
include 'config.php';
$res = mysqli_query($mysqli, "SELECT * FROM enterprise 
-- where type_hv='1' ORDER BY CONCAT(SUBSTRING(mdh, 3, 2), SUBSTRING(mdh, -3)) 
;");
    ?>
    <div>
<div>
    <div class="function" style="text-align: right;">
    <a href="#" ><button class="nut-them">Tạo mới</button></a>
        <a href="javascript:void(0)" onclick="delete_all()"><button class="nut-xoa">Xóa</button></a>
        <a href="javascript:void(0)" onclick="xuatfile()"><button class="nut-xuat">Xuất Excel</button></a>  
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
                <th style="white-space: nowrap;">Ngày thi tuyển</th>
                <th style="white-space: nowrap;">Trạng thái</th>
                <th style="white-space: nowrap;"></th>
                  <th></th>
                </tr>    
                </thead>
                    <?php 
                    while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                        <tr id="box<?php echo $row['mdn']?>">
                        <td><input type="checkbox" id="<?php echo $row['mdn']?>" 
                        name="checkbox[]" value="<?php echo $row['mdn']?>"/></td>
                        <td style="white-space: nowrap;"><?php echo $row['mdn'] ?></td>
                        <td style="white-space: nowrap;"><?php echo $row['xi_nghiep'] ?></td>
                        <td style="white-space: nowrap;"><?php echo $row['ten_giam_doc'] ?></td>
                        <td style="white-space: nowrap;"><?php echo $row['nghiep_doan'] ?></td>
                        <td style="white-space: nowrap;"><?php echo $row['sdt_xn'] ?></td>
                        <td style="white-space: nowrap;"><?php echo $row['so_luong_don_hang'] ?></td>
                        <td style="white-space: nowrap;"><?php echo $row['so_luong_hv'] ?></td>
                        <td><?php echo $row['ghi_chu'] ?></td>
                        <td>
                            <div style="display:flex" class="action-buttons">
                                <form action="#" method="#"> <!-- bỏ cái này thì nút edit dòng đầu tiên sẽ không hoạt động -->
                                    <button type="hidden"style="padding:0px;border: none; background: none; color: inherit;"></button>
                                </form>
                                <a href="index.php?action=view&mdh=<?php echo $row['mdn']; ?>" class="view" style="text-decoration: none;">
                                    <span class="btn btn-sm"><i class="fas fa-eye"></i></span>
                                </a>
                                <form action="?edit_dh=suadh&mdh=<?php echo $row['mdn']; ?>" method="GET">
                                    <input type="hidden" name="edit_dh" value="<?php echo $row['mdn']; ?>">
                                    <button class="suadh" style="border: none; background: none; color: inherit;">
                                    <i class="fas fa-pen edit"></i></button>
                                </form>
                                <form action="modules/donhang/deletedh.php" method="POST">
                                    <input type="hidden" name="delete" value="<?php echo $row['mdn']; ?>">
                                    <button type="submit" class="xoa" style="border: none; background: none; color: inherit;">
                                    <i class="fas fa-trash trash"></i></button>
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
                var check = confirm("Bạn chắc chắn muốn xóa đơn hàng này?(Đơn hàng sẽ được lưu trữ trong thùng rác 30 ngày)");
                if (check == true) {
                    jQuery.ajax({
                        url: 'modules/donhang/deletedh.php',
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
        //icon xoa
        jQuery('.xoa').click(function(e) {
        e.preventDefault();
        var confirmation = confirm("Bạn chắc chắn muốn xóa đơn hàng này?(Đơn hàng sẽ được lưu trữ trong thùng rác 30 ngày)");
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
    
