<?php
require 'config.php';

$res = mysqli_query($mysqli, "SELECT * FROM student WHERE type_hv='1' ORDER BY CONCAT(SUBSTRING(mhv, 1, 2), SUBSTRING(mhv, -3)) ASC;");

if ($res === false) {
    echo "Error: " . mysqli_error($mysqli);
} else {
    ?>
    <!-- Menu -->
    <div class="loai_hv">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="?type=1">Thực tập sinh số 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?type=3">Thực tập sinh số 3</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?type=dd">Kỹ năng đặc định</a>
            </li>
        </ul>
    </div>
    <div class="function">
        <a href="?function=them"><button class="btn btn-primary btn-add" >Thêm mới</button></a>
        <a href="javascript:void(0)" onclick="delete_all()"><button class="btn btn-danger">Xóa</button></a>
        <a href="javascript:void(0)" onclick="import()"><button class="btn btn-success">Nhập Excel</button></a>
        <a href="javascript:void(0)" onclick="xuatfile()"><button class="btn btn-secondary">Xuất Excel</button></a>
        <input type="text" class="search">
    </div>
    <div class="content">
        <div>
            <form method="post" id="frm">
                <table class="table">
                    <tr>
                        <th><input type="checkbox" onclick="select_all()" id="select-all-checkbox"/></th>
                        <th>Mã học viên</th>
                        <th>Họ và Tên</th>
                        <th>Ngày Sinh</th>
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
                            <td><?php echo $row['sdt'] ?></td>
                            <td><?php echo $row['ngay_thi'] ?></td>
                            <td><?php echo $row['ngay_nhaphoc'] ?></td>
                            <td><?php echo $row['order_name'] ?></td>
                            <td><?php echo $row['status'] ?></td>
                            <td><?php echo $row['note'] ?></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <form action="?sua=<?php echo $row['mhv']; ?>" method="GET">
                                      <input type="hidden" name="edit" value="<?php echo $row['mhv']; ?>">
                                      <button class="dropdown-item" type="submit">Sửa</button>
                                    </form>
                                        <a class="dropdown-item" href="#">Xóa</a>
                                    </div>
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
    <?php
}
?>
