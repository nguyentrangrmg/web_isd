
<body>
    <?php
    include 'config.php';
    function executeQuery($mysqli, $query) {
        $result = mysqli_query($mysqli, $query);
        if (!$result) {
            die("Query failed: " . mysqli_error($mysqli));
        }
        return $result;
    }
    // Lấy danh sách đơn hàng
$donHangQuery = "SELECT ten_dh FROM jporder";
$donHangResult = executeQuery($mysqli, $donHangQuery);
$donHangOptions = [];
while ($row = mysqli_fetch_assoc($donHangResult)) {
    $donHangOptions[] = $row['ten_dh'];
}

// Lấy danh sách xí nghiệp
$xiNghiepQuery = "SELECT xi_nghiep FROM enterprise";
$xiNghiepResult = executeQuery($mysqli, $xiNghiepQuery);
$xiNghiepOptions = [];
while ($row = mysqli_fetch_assoc($xiNghiepResult)) {
    $xiNghiepOptions[] = $row['xi_nghiep'];
}
    
    if (isset($_GET['search_hv'])) {
        $key = $_GET['key_search'];
        $per_page = 10;
        $current_page = !empty($_GET['pageo']) ? $_GET['pageo'] : 1;
        $offset = ($current_page - 1) * $per_page;
        $query = "SELECT student.*, jporder.* 
                  FROM student 
                  JOIN `jporder` ON student.mdh = jporder.mdh
                  WHERE student.type_hv='3' 
                  AND (student.mhv LIKE '%".$key."%' 
                  OR student.ho_ten LIKE '%".$key."%' 
                  OR student.ngay_sinh LIKE '%".$key."%' 
                  OR student.sdt LIKE '%".$key."%' 
                  OR student.ngay_thi LIKE '%".$key."%' 
                  OR student.ngay_nhaphoc LIKE '%".$key."%' 
                  OR student.mdh LIKE '%".$key."%' 
                  OR student.status LIKE '%".$key."%') 
                  ORDER BY CONCAT(SUBSTRING(student.mhv, 3, 2), SUBSTRING(student.mhv, -3)) ASC 
                  LIMIT ".$per_page." OFFSET ".$offset;
        $res = executeQuery($mysqli, $query);
    
        $count_query = "SELECT COUNT(*) AS total 
                    FROM student 
                    JOIN `jporder` ON student.mdh = jporder.mdh
                    WHERE student.type_hv='3' 
                    AND (student.mhv LIKE '%".$key."%' 
                    OR student.ho_ten LIKE '%".$key."%' 
                    OR student.ngay_sinh LIKE '%".$key."%' 
                    OR student.sdt LIKE '%".$key."%' 
                    OR student.ngay_thi LIKE '%".$key."%' 
                    OR student.ngay_nhaphoc LIKE '%".$key."%' 
                    OR student.mdh LIKE '%".$key."%' 
                    OR student.status LIKE '%".$key."%')";
        $count_result = executeQuery($mysqli, $count_query);
        $count_row = mysqli_fetch_assoc($count_result);
        $rs = $count_row['total'];
    } else {
        $key = '';
        $per_page = 10;
        $current_page = !empty($_GET['pageo']) ? $_GET['pageo'] : 1;
        $offset = ($current_page - 1) * $per_page;
        $query = "SELECT student.*, jporder.* 
              FROM student 
              JOIN `jporder` ON student.mdh = jporder.mdh
              WHERE student.type_hv='3'
              ORDER BY CONCAT(SUBSTRING(student.mhv, 3, 2), SUBSTRING(student.mhv, -3)) ASC 
              LIMIT ".$per_page." OFFSET ".$offset;
    $res = executeQuery($mysqli, $query);

    $count_query = "SELECT COUNT(*) AS total 
                    FROM student 
                    JOIN `jporder` ON student.mdh = jporder.mdh
                    WHERE student.type_hv='3'";
    $count_result = executeQuery($mysqli, $count_query);
    $count_row = mysqli_fetch_assoc($count_result);
    $rs = $count_row['total'];
    }
    
    $pages = ceil($rs / $per_page);
    ?>
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
        <div style="display: inline-block;">
            <a href="?function=them"><button class="nut-them">Tạo mới</button></a>
            <a href="javascript:void(0)" onclick="delete_all()"><button class="nut-xoa">Xóa</button></a>
            <a href="modules/hocvien/export.php"><button class="nut-xuat">Xuất Excel</button></a>
        </div>
        
        <form action="" method="GET" style="display: inline-block;">
            <input type="text" class="search-input" placeholder="Search..." name="key_search" value="<?php echo isset($key) ? $key : ''; ?>">
            <input type="hidden" name="type" value="3">
            <button type="submit" name="search_hv" class="search-button"><i class="fas fa-search search-icon"></i></button>
        </form>
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
                            <td style="white-space: nowrap;">
                            <?php echo $row['ten_dh'] ?>
                            <input type="hidden" name="mdh" value="<?php echo $row['mdh'] ?>">
                            </td>
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
                <?php 
                if (mysqli_num_rows($res) == 0) {
                    echo "<div style='text-align: center; 
                    margin-top: 20px; font-size: 24px; font-weight: bold; font-family: Arial, sans-serif;'>
                    Không có dữ liệu</div>";
                } ?>
                </form>
                <div class="pagination-container">
            <div class="pagination">
        <?php
                $type = isset($_GET['type']) ? $_GET['type'] : '3';
                $current_page = isset($_GET['pageo']) ? (int)$_GET['pageo'] : 1;
                
                if ($pages > 0) { ?>
                
                <nav aria-label="Page navigation example">
                    <ul class="pagination d-flex justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="?pageo=<?php echo max(1, $current_page - 1); ?>&type=<?php echo $type; ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php 
                        $start_page = max(1, $current_page - 1);
                        $end_page = min($pages, $current_page + 1);
        
                        if ($start_page > 1) {
                            ?>
                            <li class="page-item"><a class="page-link" href="?pageo=1&type=<?php echo $type; ?>">1</a></li>
                            <?php
                            if ($start_page > 2) {
                                echo '<li class="page-item"><span class="page-link">...</span></li>';
                            }
                        }
        
                        for ($i = $start_page; $i <= $end_page; $i++) {  
                            if ($i != $current_page) {
                                ?>
                                <li class="page-item"><a class="page-link" href="?pageo=<?php echo $i; ?>&type=<?php echo $type; ?>"><?php echo $i; ?></a></li>
                                <?php
                            } else { ?>
                                <li class="current-page page-item"><a style="color:white;background:#374375;" class="page-link" href="?pageo=<?php echo $i; ?>&type=<?php echo $type; ?>"><?php echo $i; ?></a></li>
                            <?php 
                            }
                        }
        
                        if ($end_page < $pages - 1) {
                            echo '<li class="page-item"><span class="page-link">...</span></li>';
                        }
                        if ($end_page < $pages) {
                            ?>
                            <li class="page-item"><a class="page-link" href="?pageo=<?php echo $pages; ?>&type=<?php echo $type; ?>"><?php echo $pages; ?></a></li>
                            <?php
                        }
                        ?>
                        <li class="page-item">
                            <a class="page-link" href="?pageo=<?php echo min($pages, $current_page + 1); ?>&type=<?php echo $type; ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                        
                    </ul>
                </nav>
        </div>
        </div>
        
        </div>
    </div>
    <script src="js/filter2.js"></script>
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
    

</body>
</html>
<?php } ?>