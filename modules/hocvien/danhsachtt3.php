<?php
include 'config.php';
$res = mysqli_query($mysqli, "SELECT * FROM student WHERE type_hv='3' ORDER BY CONCAT(SUBSTRING(mhv, 1, 2), SUBSTRING(mhv, -3)) ASC;");

if ($res === false) {
    echo "Error: " . mysqli_error($mysqli);
} else {
    ?>
    
    <!-- Menu -->
    <div class="loai_hv">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="?type=1">Thực tập sinh số 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="?type=3">Thực tập sinh số 3</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?type=dd">Kỹ năng đặc định</a>
            </li>
        </ul>
    </div>
    <div class="function" style="text-align: right;">
        <a href="?function=them"><button class="btn btn-primary btn-add" >Thêm mới</button></a>
        <a href="javascript:void(0)" onclick="delete_all()"><button class="btn btn-danger">Xóa</button></a>
        <a href="javascript:void(0)" onclick="import()"><button class="btn btn-success">Nhập Excel</button></a>
        <a href="javascript:void(0)" onclick="xuatfile()"><button class="btn btn-secondary">Xuất Excel</button></a>
        <input type="text" class="search">  
    </div>
    <div class="content">
    <div class="table-container" style="max-height: 500px; overflow: auto;">
            <form method="post" id="frm">
                <table class="table">
                    <tr>
                        <th><input type="checkbox" onclick="select_all()" id="select-all-checkbox"/></th>
                        <th>Mã học viên</th>
                        <th>Họ và Tên</th>
                        <th>Ngày Sinh</th>
                        <th>Ảnh</th>
                        <th>Số điện thoại</th>
                        <th>Ngày thi tuyển</th>
                        <th>Ngày nhập học</th>
                        <th>Tên đơn hàng</th>
                        <th>Trạng thái</th>
                        <th>Ghi chú</th>
                        <th></th>
                    </tr>
                    <?php 
                    while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                        <tr id="box<?php echo $row['mhv']?>">
                            <td><input type="checkbox" id="<?php echo $row['mhv']?>" name="checkbox[]" value="<?php echo $row['mhv']?>"/></td>
                            <td><?php echo $row['mhv'] ?></td>
                            <td><?php echo $row['ho_ten'] ?></td>
                            <td><?php echo date('d/m/Y', strtotime($row['ngay_sinh'])) ?></td>
                            <td><?php 
                            $anh_path = $row['file_anh'];           
                            $target_dir = "modules/hocvien/anhhv/";
                            $target_file = $target_dir.$anh_path;
                            echo "<img src='".$target_file."' width='80px'>" ?></td>
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
                var check = confirm("Bạn chắc chắn muốn xóa học viên này?");
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
        //icon xoa
        jQuery('.xoa').click(function(e) {
        e.preventDefault();
        var confirmation = confirm("Bạn chắc chắn muốn xóa học viên này?");
        if (confirmation) {
            var form = jQuery(this).closest('form');
            jQuery.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: form.serialize(),
                success: function(result) {
                    form.closest('tr').remove();
                    // alert("Xóa học viên thành công!");
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
