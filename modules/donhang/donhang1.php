<?php
include 'config.php';

function executeQuery($mysqli, $query) {
    $result = mysqli_query($mysqli, $query);
    if (!$result) {
        die("Query failed: " . mysqli_error($mysqli));
    }
    return $result;
}

if (isset($_GET['search_dh'])) {
    $key = $_GET['key_search'];
    $per_page = 10;
    $current_page = !empty($_GET['pageo']) ? $_GET['pageo'] : 1;
    $offset = ($current_page - 1) * $per_page;
    $query = "SELECT * FROM jporder 
              WHERE type_hv='1' AND (mdh LIKE '%".$key."%' 
              OR ten_dh LIKE '%".$key."%' 
              OR xi_nghiep LIKE '%".$key."%' OR nganh_nghe LIKE '%".$key."%' 
              OR so_luong_tuyen LIKE '%".$key."%' 
              OR ngay_tt LIKE '%".$key."%' OR trang_thai LIKE '%".$key."%' 
              OR hinh_thuc_tt LIKE '%".$key."%') 
              ORDER BY mdh ASC 
              LIMIT ".$per_page." OFFSET ".$offset;
    $res = executeQuery($mysqli, $query);

    $count_query = "SELECT COUNT(*) AS total FROM jporder 
                    WHERE type_hv='1' AND (mdh LIKE '%".$key."%' 
                    OR ten_dh LIKE '%".$key."%' 
                    OR xi_nghiep LIKE '%".$key."%' OR nganh_nghe LIKE '%".$key."%' 
                    OR so_luong_tuyen LIKE '%".$key."%' 
                    OR ngay_tt LIKE '%".$key."%' OR trang_thai LIKE '%".$key."%' 
                    OR hinh_thuc_tt LIKE '%".$key."%')";
    $count_result = executeQuery($mysqli, $count_query);
    $count_row = mysqli_fetch_assoc($count_result);
    $rs = $count_row['total'];
} else {
    $per_page = 10;
    $current_page = !empty($_GET['pageo']) ? $_GET['pageo'] : 1;
    $offset = ($current_page - 1) * $per_page;
    $query = "SELECT * FROM jporder 
              WHERE type_hv='1' 
              ORDER BY CONCAT(SUBSTRING(mdh, 3, 2), SUBSTRING(mdh, -3)) ASC 
              LIMIT ".$per_page." OFFSET ".$offset;
    $res = executeQuery($mysqli, $query);

    $count_query = "SELECT COUNT(*) AS total FROM jporder WHERE type_hv='1'";
    $count_result = executeQuery($mysqli, $count_query);
    $count_row = mysqli_fetch_assoc($count_result);
    $rs = $count_row['total'];
}

$pages = ceil($rs / $per_page);
?>
<!-- Menu -->
<div class="loai_hv">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="?typedh=1" style="text-decoration: none;color:black">Thực tập sinh số 1</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?typedh=3" style="text-decoration: none;color:black">Thực tập sinh số 3</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?typedh=dd" style="text-decoration: none;color:black">Kỹ năng đặc định</a>
        </li>
    </ul>
</div>
<div>
    <div class="function" style="text-align: right;">
        <div style="display: inline-block;">
            <a href="?function=themdh"><button class="nut-them">Tạo mới</button></a>
            <a href="javascript:void(0)" onclick="delete_all()"><button class="nut-xoa">Xóa</button></a>
            <a href="javascript:void(0)" onclick="xuatfile()"><button class="nut-xuat">Xuất Excel</button></a>
        </div>
        <form action="" method="GET" style="display: inline-block;">
            <input type="text" class="search-input" placeholder="Search..." name="key_search" value="<?php echo isset($key) ? $key : ''; ?>">
            <input type="hidden" name="type_dh" value="1">
            <button type="submit" name="search_dh" class="search-button"><i class="fas fa-search search-icon"></i></button>
        </form>
    </div>

    <div class="content">
        <div class="table-container" style="max-height: 500px;">
            <form method="post" id="frm">
                <table class="table table-hover table-stripe">
                    <thead class="color-head">
                        <tr>
                            <th><input type="checkbox" onclick="select_all()" id="select-all-checkbox" /></th>
                            <th style="white-space: nowrap;">MDH</th>
                            <th style="white-space: nowrap;">Tên đơn hàng</th>
                            <th style="white-space: nowrap;">Ngành nghề</th>
                            <th style="white-space: nowrap;">Xí nghiệp</th>
                            <th style="white-space: nowrap;">Ngày thi tuyển</th>
                            <th style="white-space: nowrap;">Số lượng tuyển</th>
                            <th style="white-space: nowrap;">Trạng thái</th>
                            <th style="white-space: nowrap;">Ghi chú</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php 
                    while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                        <tr id="box<?php echo $row['mdh'] ?>">
                            <td><input type="checkbox" id="<?php echo $row['mdh'] ?>" name="checkbox[]" value="<?php echo $row['mdh'] ?>" /></td>
                            <td style="white-space: nowrap;">
                                <a href="index.php?action=view&mdh=<?php echo $row['mdh']; ?>" 
                                style="text-decoration: none; color: black;"><?php echo $row['mdh'] ?></a>
                            </td>
                            <td style="white-space: nowrap;"><?php echo $row['ten_dh'] ?></td>
                            <td style="white-space: nowrap;"><?php echo $row['nganh_nghe'] ?></td>
                            <td style="white-space: nowrap;"><?php echo $row['xi_nghiep'] ?></td>
                            <td><?php echo date('d/m/Y', strtotime($row['ngay_tt'])) ?></td>
                            <td style="white-space: nowrap;"><?php echo $row['so_luong_tuyen'] ?></td>
                            <td><?php echo $row['trang_thai'] ?></td>
                            <td><?php echo strlen($row['ghi_chu']) > 10 ? substr($row['ghi_chu'], 0, 10) . '...' : $row['ghi_chu']; ?></td>
                            <td>
                                <div style="display:flex" class="action-buttons">
                                    <form action="#" method="#">
                                        <button type="hidden" style="padding:0px;border: none; background: none; color: inherit;"></button>
                                    </form>
                                    <a href="index.php?action=view&mdh=<?php echo $row['mdh']; ?>" class="view" style="text-decoration: none;">
                                        <span class="btn btn-sm"><i class="fas fa-eye"></i></span>
                                    </a>
                                    <form action="?edit_dh=suadh&mdh=<?php echo $row['mdh']; ?>" method="GET">
                                        <input type="hidden" name="edit_dh" value="<?php echo $row['mdh']; ?>">
                                        <button class="suadh" style="border: none; background: none; color: inherit;">
                                            <i class="fas fa-pen edit"></i></button>
                                    </form>
                                    <form action="modules/donhang/deletedh.php" method="POST">
                                        <input type="hidden" name="delete" value="<?php echo $row['mdh']; ?>">
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
                <?php 
                if (mysqli_num_rows($res) == 0) {
                    echo "<div style='text-align: center; 
                    margin-top: 20px; font-size: 24px; font-weight: bold; font-family: Arial, sans-serif;'>
                    Không có dữ liệu</div>";
                } ?>
            </form>
            
        </div>
        
    </div>
<!-- pagination -->
<div class="pagination-container">
    <div class="pagination">
        <?php
                $typedh = isset($_GET['typedh']) ? $_GET['typedh'] : '1';
                $current_page = isset($_GET['pageo']) ? (int)$_GET['pageo'] : 1;
                
                if ($pages > 0) { ?>
                
                <nav aria-label="Page navigation example">
                    <ul class="pagination d-flex justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="?pageo=<?php echo max(1, $current_page - 1); ?>&typedh=<?php echo $typedh; ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php 
                        $start_page = max(1, $current_page - 1);
                        $end_page = min($pages, $current_page + 1);
        
                        if ($start_page > 1) {
                            ?>
                            <li class="page-item"><a class="page-link" href="?pageo=1&typedh=<?php echo $typedh; ?>">1</a></li>
                            <?php
                            if ($start_page > 2) {
                                echo '<li class="page-item"><span class="page-link">...</span></li>';
                            }
                        }
        
                        for ($i = $start_page; $i <= $end_page; $i++) {  
                            if ($i != $current_page) {
                                ?>
                                <li class="page-item"><a class="page-link" href="?pageo=<?php echo $i; ?>&typedh=<?php echo $typedh; ?>"><?php echo $i; ?></a></li>
                                <?php
                            } else { ?>
                                <li class="current-page page-item"><a style="color:white;background:#374375;" class="page-link" href="?pageo=<?php echo $i; ?>&typedh=<?php echo $typedh; ?>"><?php echo $i; ?></a></li>
                            <?php 
                            }
                        }
        
                        if ($end_page < $pages - 1) {
                            echo '<li class="page-item"><span class="page-link">...</span></li>';
                        }
                        if ($end_page < $pages) {
                            ?>
                            <li class="page-item"><a class="page-link" href="?pageo=<?php echo $pages; ?>&typedh=<?php echo $typedh; ?>"><?php echo $pages; ?></a></li>
                            <?php
                        }
                        ?>
                        <li class="page-item">
                            <a class="page-link" href="?pageo=<?php echo min($pages, $current_page + 1); ?>&typedh=<?php echo $typedh; ?>" aria-label="Next">
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        function select_all() {
            var isChecked = jQuery('#select-all-checkbox').prop("checked");
            jQuery('input[type=checkbox]').prop('checked', isChecked);
        }

        jQuery('input[type=checkbox]').not('#select-all-checkbox').change(function() {
            var allChecked = true;
            jQuery('input[type=checkbox]').not('#select-all-checkbox').each(function() {
                if (!jQuery(this).prop('checked')) {
                    allChecked = false;
                    return false;
                }
            });
            jQuery('#select-all-checkbox').prop('checked', allChecked);
        });

        function delete_all() {
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
</div>
