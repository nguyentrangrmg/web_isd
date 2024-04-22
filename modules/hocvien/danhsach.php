<?php
include 'config.php';
$res = mysqli_query($mysqli, "SELECT * FROM student WHERE type_hv='1' ORDER BY CONCAT(SUBSTRING(mhv, 3, 2), SUBSTRING(mhv, -3)) ASC;");

if ($res === false) {
    echo "Error: " . mysqli_error($mysqli);
} else {
    ?>
    
    <!-- Menu -->
    <div class="loai_hv">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="?type=1" style="text-decoration: none;color:black" >Thực tập sinh số 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?type=3" style="text-decoration: none;color:black" >Thực tập sinh số 3</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?type=dd" style="text-decoration: none;color:black" >Kỹ năng đặc định</a>
            </li>
        </ul>
    </div>
    <div class="function" style="text-align: right;">
        
        <a href="?function=them" ><button class="nut-them">Tạo mới</button></a>
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
                        <th style="white-space: nowrap;">Mã học viên</th>
                        <th style="white-space: nowrap;">Họ và Tên</th>
                        <th style="white-space: nowrap;">Ngày Sinh</th>
                        <th style="white-space: nowrap;">Số điện thoại</th>
                        <th style="white-space: nowrap;">Ngày thi tuyển</th>
                        <th style="white-space: nowrap;">Ngày nhập học</th>
                        <th style="white-space: nowrap;">Tên đơn hàng</th>
                        <th style="white-space: nowrap;">Trạng thái</th>
                        <th style="white-space: nowrap;">Ghi chú</th>
                        <th></th>
                    </tr>
                    </thead>
                    <?php 
                    while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                        <tr id="box<?php echo $row['mhv']?>">
                            <td><input type="checkbox" id="<?php echo $row['mhv']?>" name="checkbox[]" value="<?php echo $row['mhv']?>"/></td>
                            <td style="white-space: nowrap;"><?php echo $row['mhv'] ?></td>
                            <td style="white-space: nowrap;"><a href="index.php?action=view&mhv=<?php echo $row['mhv']; ?>" 
                            class="view" style="text-decoration: none;color:black" >
                            <?php echo $row['ho_ten'] ?></a></td>
                            <td style="white-space: nowrap;"><?php echo date('d/m/Y', strtotime($row['ngay_sinh'])) ?></td>
                            <td style="white-space: nowrap;"><?php echo $row['sdt'] ?></td>
                            <td style="white-space: nowrap;"><?php echo date('d/m/Y', strtotime($row['ngay_thi'])) ?></td>
                            <td style="white-space: nowrap;"><?php echo date('d/m/Y', strtotime($row['ngay_nhaphoc'])) ?></td>
                            <td style="white-space: nowrap;"><?php echo $row['order_name'] ?></td>
                            <td style="white-space: nowrap;"><?php echo $row['status'] ?></td>
                            <td style="white-space: normal"><?php echo $row['note'] ?></td>
                            <td>
                            <div style="display:flex" class="action-buttons">
                                <form action="#" method="#"> <!-- bỏ cái này thì nút edit dòng đầu tiên sẽ không hoạt động -->
                                    <button type="hidden"style="padding:0px;border: none; background: none; color: inherit;"></button>
                                </form>
                                <a href="index.php?action=view&mhv=<?php echo $row['mhv']; ?>" class="view" style="text-decoration: none;">
                                    <span class="btn btn-sm"><i class="fas fa-eye"></i></span>
                                </a>
                                <form action="?edit=sua&mhv=<?php echo $row['mhv']; ?>" method="GET">
                                    <input type="hidden" name="edit" value="<?php echo $row['mhv']; ?>">
                                    <button class="sua" style="border: none; background: none; color: inherit;"><i class="fas fa-pen edit"></i></button>
                                </form>
                                <form action="modules/hocvien/delete.php" method="POST">
                                    <input type="hidden" name="delete" value="<?php echo $row['mhv']; ?>">
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
                var check = confirm("Bạn có muốn chuyển học viên này vào thùng rác? (Dữ liệu của học viên sẽ bị xóa sau 30 ngày)");
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
                alert("Vui lòng chọn ít nhất 1 checkbox để xóa.");
            }
        }
        //icon xoa
        jQuery('.xoa').click(function(e) {
        e.preventDefault();
        var confirmation = confirm("Bạn có muốn chuyển học viên này vào thùng rác? (Dữ liệu của học viên sẽ bị xóa sau 30 ngày)");
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
