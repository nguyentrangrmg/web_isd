
<?php
include 'config.php';
function executeQuery($mysqli, $query) {
    $result = mysqli_query($mysqli, $query);
    if (!$result) {
        die("Query failed: " . mysqli_error($mysqli));
    }
    return $result;
}

if (isset($_GET['search_xn'])) {
    $key = $_GET['key_search'];
    $per_page = 10;
    $current_page = !empty($_GET['pageo']) ? $_GET['pageo'] : 1;
    $offset = ($current_page - 1) * $per_page;
    $query = "SELECT * FROM enterprise  
              WHERE (mdn LIKE '%".$key."%' 
              OR ten_giam_doc LIKE '%".$key."%') 
              ORDER BY SUBSTRING(mdn, -3) ASC 
              LIMIT ".$per_page." OFFSET ".$offset;
    $res = executeQuery($mysqli, $query);

    $count_query = "SELECT COUNT(*) AS total FROM enterprise  
    WHERE (mdn LIKE '%".$key."%' 
    OR ten_giam_doc LIKE '%".$key."%') 
    ORDER BY SUBSTRING(mdn, -3)";
    $count_result = executeQuery($mysqli, $count_query);
    $count_row = mysqli_fetch_assoc($count_result);
    $rs = $count_row['total'];
} else {
    $per_page = 10;
    $current_page = !empty($_GET['pageo']) ? $_GET['pageo'] : 1;
    $offset = ($current_page - 1) * $per_page;
    $query = "SELECT * FROM enterprise 
              ORDER BY SUBSTRING(mdn, -3) ASC 
              LIMIT ".$per_page." OFFSET ".$offset;
    $res = executeQuery($mysqli, $query);

    $count_query = "SELECT COUNT(*) AS total FROM enterprise";
    $count_result = executeQuery($mysqli, $count_query);
    $count_row = mysqli_fetch_assoc($count_result);
    $rs = $count_row['total'];
}

$pages = ceil($rs / $per_page);
    ?>
    <div>
<div>
<div class="function" style="text-align: right;">
        <div style="display: inline-block;">
            <a href="?function=themxn"><button class="nut-them">Tạo mới</button></a>
            <a href="javascript:void(0)" onclick="delete_all()"><button class="nut-xoa">Xóa</button></a>
            <a href="javascript:void(0)" onclick="xuatfile()"><button class="nut-xuat">Xuất Excel</button></a>
            <a href="javascript:void(0)" onclick="xuatfile()"><button class="loc">Bộ lọc</button></a>
        </div>
        <form action="" method="GET" style="display: inline-block;">
            <input type="text" class="search-input" placeholder="Search..." name="key_search" value="<?php echo isset($key) ? $key : ''; ?>">
            <button type="submit" name="search_xn" class="search-button"><i class="fas fa-search search-icon"></i></button>
        </form>
    </div>
    <div class="content">
    <div class="table-container" style="max-height: 500px; overflow: auto;">
            <form method="post" id="frm">
                <table class="table table-hover table-stripe">
                <thead class="color-head">
                <tr>
                <th><input type="checkbox" onclick="select_all()" id="select-all-checkbox"/></th>
                <th style="white-space: nowrap;">Mã xí nghiệp</th>
                <th style="white-space: nowrap;">Tên xí nghiệp</th>
                <th style="white-space: nowrap;">Tên giám đốc</th>
                <th style="white-space: nowrap;">Nghiệp đoàn</th>
                <th style="white-space: nowrap;">Số điện thoại</th>
                <th style="white-space: nowrap;">Số lượng đơn</th>
                <th style="white-space: nowrap;">Số lượng học viên</th>
                <th style="white-space: nowrap;">Ghi chú</th>
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
                        <td style="white-space: nowrap;"><a href="index.php?action=view&mxn=<?php echo $row['mdn'] ?>" 
                            class="view" style="text-decoration: none;color:black" >
                            <?php echo $row['mdn'] ?></a></td>
                        <td style="white-space: nowrap;"><?php echo $row['xi_nghiep'] ?></td>
                        <td style="white-space: nowrap;"><?php echo $row['ten_giam_doc'] ?></td>
                        <td style="white-space: nowrap;"><?php echo $row['nghiep_doan'] ?></td>
                        <td style="white-space: nowrap;"><?php echo $row['sdt_xn'] ?></td>
                        <td style="white-space: nowrap;"><?php echo $row['so_luong_don_hang'] ?></td>
                        <td style="white-space: nowrap;"><?php echo $row['so_luong_hv'] ?></td>
                        <td><?php echo $row['ghi_chu_e'] ?></td>
                        <td>
                            <div style="display:flex" class="action-buttons">
                                <form action="#" method="#"> <!-- bỏ cái này thì nút edit dòng đầu tiên sẽ không hoạt động -->
                                    <button type="hidden"style="padding:0px;border: none; background: none; color: inherit;"></button>
                                </form>
                                <a href="index.php?action=view&mxn=<?php echo $row['mdn']; ?>" class="view" style="text-decoration: none;">
                                    <span class="btn btn-sm"><i class="fas fa-eye"></i></span>
                                </a>
                                <form action="?edit_xn=suaxn&mxn=<?php echo $row['mdn']; ?>" method="GET">
                                    <input type="hidden" name="edit_xn" value="<?php echo $row['mdn']; ?>">
                                    <button class="suaxn" style="border: none; background: none; color: inherit;">
                                    <i class="fas fa-pen edit"></i></button>
                                </form>
                                <form action="modules/xi_nghiep/delete_xn.php" method="POST">
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
            <div class="pagination-container">
    <div class="pagination">
            <?php
        $current_page = isset($_GET['pageo']) ? (int)$_GET['pageo'] : 1;
        
        if ($pages > 0) { ?>
        
        <nav aria-label="Page navigation example">
            <ul class="pagination d-flex justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="?pageo=<?php echo max(1, $current_page - 1); ?>&chucnang=xinghiep" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php 
                $start_page = max(1, $current_page - 1);
                $end_page = min($pages, $current_page + 1);

                if ($start_page > 1) {
                    ?>
                    <li class="page-item"><a class="page-link" href="?pageo=1&chucnang=xinghiep">1</a></li>
                    <?php
                    if ($start_page > 2) {
                        echo '<li class="page-item"><span class="page-link">...</span></li>';
                    }
                }

                for ($i = $start_page; $i <= $end_page; $i++) {  
                    if ($i != $current_page) {
                        ?>
                        <li class="page-item"><a class="page-link" href="?pageo=<?php echo $i; ?>&chucnang=xinghiep"><?php echo $i; ?></a></li>
                        <?php
                    } else { ?>
                        <li class="current-page page-item"><a style="color:white;background:#374375;" class="page-link" href="?pageo=<?php echo $i; ?>&chucnang=xinghiep"><?php echo $i; ?></a></li>
                    <?php 
                    }
                }

                if ($end_page < $pages - 1) {
                    echo '<li class="page-item"><span class="page-link">...</span></li>';
                }
                if ($end_page < $pages) {
                    ?>
                    <li class="page-item"><a class="page-link" href="?pageo=<?php echo $pages; ?>&chucnang=xinghiep"><?php echo $pages; ?></a></li>
                    <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" href="?pageo=<?php echo min($pages, $current_page + 1); ?>&chucnang=xinghiep" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
                
            </ul>
        </nav>
        <?php
                }
                ?>
        </div>
        </div>
        </div>
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
                var check = confirm("Bạn chắc chắn muốn xóa xí nghiệp này?(Xí nghiệp sẽ được lưu trữ trong thùng rác 30 ngày)");
                if (check == true) {
                    jQuery.ajax({
                        url: 'modules/xi_nghiep/delete_xn.php',
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
        var confirmation = confirm("Bạn chắc chắn muốn xóa xí nghiệp này?(Xí nghiệp sẽ được lưu trữ trong thùng rác 30 ngày)");
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
    
    
