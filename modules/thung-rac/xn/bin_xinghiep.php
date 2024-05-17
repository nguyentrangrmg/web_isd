
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
    $query = "SELECT * FROM bin_xn  
              WHERE (mdn LIKE '%".$key."%' 
              OR ten_giam_doc LIKE '%".$key."%') 
              ORDER BY SUBSTRING(mdn, -3) ASC 
              LIMIT ".$per_page." OFFSET ".$offset;
    $res = executeQuery($mysqli, $query);

    $count_query = "SELECT COUNT(*) AS total FROM bin_xn  
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
    $query = "SELECT * FROM bin_xn
              ORDER BY SUBSTRING(mdn, -3) ASC 
              LIMIT ".$per_page." OFFSET ".$offset;
    $res = executeQuery($mysqli, $query);

    $count_query = "SELECT COUNT(*) AS total FROM bin_xn";
    $count_result = executeQuery($mysqli, $count_query);
    $count_row = mysqli_fetch_assoc($count_result);
    $rs = $count_row['total'];
}

$pages = ceil($rs / $per_page);
    ?>
    <div class="loai_hv">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link " href="?typebin=hv" style="text-decoration: none;color:black" >Học Viên</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?typebin=dh" style="text-decoration: none;color:black" >Đơn hàng</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  active" href="?typebin=xn" style="text-decoration: none;color:black" >Xí nghiệp</a>
            </li>
        </ul>
    </div>
    <div class="function" style="text-align: right;">
    <div style="display: inline-block;">
    <a href="?function=themxn" ><button class="nut-them">Tạo mới</button></a>
        <a href="javascript:void(0)" onclick="delete_all()"><button class="nut-xoa">Xóa</button></a>
        <a href="javascript:void(0)" onclick="restore_all()"><button class="nut-re">Khôi phục</button></a>
    </div>
    <form action="" method="GET" style="display: inline-block;">
        <input type="text" class="search-input" placeholder="Search..." name="key_search" value="<?php echo isset($key) ? $key : ''; ?>">
        <input type="hidden" name="type_dh" value="bin_dh">
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
                                <form action="modules/thung-rac/xn/restore_xn.php" method="POST">
                                <input type="hidden" name="restore" value="<?php echo $row['mdn']; ?>">
                                    <button type="submit" class="khoi-phuc" style="border: none; background: none; color: inherit;"><i class="fas fa-undo-alt edit"></i></button>
                                </form>
                                <form action="modules/thung-rac/xn/delete_xn.php" method="POST">
                                <input type="hidden" name="delete" value="<?php echo $row['mdn']; ?>">
                                <button type="submit" class="xoa" style="border: none; background: none; color: inherit;"><i class="fas fa-trash trash"></i></button>
                                </form>
                            </div>

                            </td>
                        </tr>
                        <?php 
                    }
                    ?>
                </table>
                <div class="pagination-container">
    <div class="pagination">
                <?php 
                if (mysqli_num_rows($res) == 0) {
                    echo "<div style='text-align: center; 
                    margin-top: 20px; font-size: 24px; font-weight: bold; font-family: Arial, sans-serif;'>
                    Không có gì ở đây cả!</div>";
                } ?>
            </form>
            <?php
        $current_page = isset($_GET['pageo']) ? (int)$_GET['pageo'] : 1;
        
        if ($pages > 0) { ?>
        
        <nav aria-label="Page navigation example">
            <ul class="pagination d-flex justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="?pageo=<?php echo max(1, $current_page - 1); ?>&typebin=xn" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php 
                $start_page = max(1, $current_page - 1);
                $end_page = min($pages, $current_page + 1);

                if ($start_page > 1) {
                    ?>
                    <li class="page-item"><a class="page-link" href="?pageo=1&typebin=xn">1</a></li>
                    <?php
                    if ($start_page > 2) {
                        echo '<li class="page-item"><span class="page-link">...</span></li>';
                    }
                }

                for ($i = $start_page; $i <= $end_page; $i++) {  
                    if ($i != $current_page) {
                        ?>
                        <li class="page-item"><a class="page-link" href="?pageo=<?php echo $i; ?>&typebin=xn"><?php echo $i; ?></a></li>
                        <?php
                    } else { ?>
                        <li class="current-page page-item"><a style="color:white;background:#374375;" class="page-link" href="?pageo=<?php echo $i; ?>&typebin=xn"><?php echo $i; ?></a></li>
                    <?php 
                    }
                }

                if ($end_page < $pages - 1) {
                    echo '<li class="page-item"><span class="page-link">...</span></li>';
                }
                if ($end_page < $pages) {
                    ?>
                    <li class="page-item"><a class="page-link" href="?pageo=<?php echo $pages; ?>&typebin=xn"><?php echo $pages; ?></a></li>
                    <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" href="?pageo=<?php echo min($pages, $current_page + 1); ?>&typebin=xn" aria-label="Next">
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
                var check = confirm("Bạn có muốn xóa vĩnh viễn xí nghiệp này?");
                
                if (check == true) {
                    jQuery.ajax({
                        url: 'modules/thung-rac/xn/delete_xn.php',
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
                var check = confirm("Bạn có muốn khôi phục thông tin xí nghiệp này?");
                
                if (check == true) {
                    jQuery.ajax({
                        url: 'modules/thung-rac/xn/restore_xn.php',
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
        var confirmation = confirm("Bạn có muốn xóa vĩnh viễn đơn hàng này?");
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
        var confirmation = confirm("Bạn có khôi phục thông tin đơn hàng này?");
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
    
