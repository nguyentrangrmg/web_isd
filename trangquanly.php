
    <div class="sidebar">
        <div class="logo"><img src="images/tvclogo.png"></div>    
        <ul class="menu">
            
            <li <?php 
            if (isset($_GET['chucnang']) && $_GET['chucnang'] == 'dashboard') echo 'class="active"';
            elseif (!isset($_GET['chucnang'])) echo 'class="active"'; ?>>
                    <a href = "index.php?chucnang=dashboard">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class ="line_menu">Dashboard</span>
                    </a>
            </li>
            <li <?php if (isset($_GET['chucnang']) && $_GET['chucnang'] == 'hocvien') echo 'class="active"'; ?>><div>
                    <a href="index.php?chucnang=hocvien">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class ="line_menu">Học Viên</span>
                    </a>
            </li>
            <li <?php if (isset($_GET['chucnang']) && $_GET['chucnang'] == 'donhang') echo 'class="active"'; ?>><div>
                    <a href="index.php?chucnang=donhang">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class ="line_menu">Đơn Hàng</span>
                </a>
            </li>
            <li <?php if (isset($_GET['chucnang']) && $_GET['chucnang'] == 'giaovien') echo 'class="active"'; ?>><div>
                    <a href="index.php?chucnang=giaovien">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class ="line_menu">Giáo Viên</span>
                </a>
            </li>
            <li><div>
                    <a href="#">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class ="line_menu">Đơn Hàng</span>
                </a>
            </li>
            <li><div>
                    <a href="#">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class ="line_menu">Đơn Hàng</span>
                </a>
            </li>
            
            <li class="logout">
                <a href="index.php?dangxuat=1">
                <i class="fas fa-tachometer-alt"></i>
                Đăng xuất 
            </a></li>
        </ul>
    </div>
    <div class="content">
        <!-- click vào nút chứa chucnang nào sẽ dẫn tới trang tương ứng -->
    <?php 
        if(isset($_GET['chucnang'])) {
        $chucnang = $_GET['chucnang'];
        switch($chucnang) {
            case 'hocvien':
                include 'modules/hocvien/danhsach.php';
                break;
            case 'donhang':
                include 'modules/donhang/danhsachdonhang.php';
                break;
            case 'giaovien':
                include 'modules/giaovien/danhsachgv.php';
                break;
            case 'dashboard':
                include 'modules/menu.php';
                break;
            // default:
            //     include 'modules/donhang/danhsachdonhang.php';
            //     break;
            }
    } else {
        // nội dung mặc định
        include 'modules/menu.php';
    }
    ?>
    </div>
</div>
