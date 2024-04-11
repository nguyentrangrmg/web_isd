<body class="d-flex flex-column h-100">
<?php
            $pageTitle = '';
            // Xác định tiêu đề dựa vào trang đang hiển thị
            if(isset($_GET['chucnang'])) {
                $chucnang = $_GET['chucnang'];
                switch($chucnang) {
                    case 'hocvien':
                        $pageTitle = 'Quản lý học viên';
                        break;
                    case 'donhang':
                        $pageTitle = 'Quản lý đơn hàng';
                        break;
                    case 'xinghiep':
                        $pageTitle = 'Quản lý xí nghiệp';
                        break;
                    case 'dashboard':
                        $pageTitle = 'Bảng điều khiển';
                        break;
                }
            }
            else if(isset($_GET['action'])) {
                $action = $_GET['action'];
                switch($action) {
                    case 'view':
                        $pageTitle = 'Quản lý học viên';
                        break;
                }
            }
            else if(isset($_GET['type'])) {
                $type = $_GET['type'];
                        $pageTitle = 'Quản lý học viên';
                
            }
            else if(isset($_GET['edit'])) {
                $edit = $_GET['edit'];
                        $pageTitle = 'Quản lý học viên';
                
            }
            else {
                $pageTitle = 'Bảng điều khiển';
            }
        ?>

<main role="main" class="flex-shrink-0 d-flex" style="height: 100%;">
    <div class="container-fluid h-100 d-flex" style="height: 100%;">
        <div class="sidebar" id="sidebar">
                            <div class="panel panel-body">
                                <div class="list-group">
                                    <ul class="logo-container"><img class="logo" src="images/logo TVC.png" alt="logo"/></ul>
                                    <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-center align-items-center" style="white-space: nowrap; overflow: hidden;">
                                            <form class="" method="get" action="#">
                                                <input name="chucnang" value="dashboard" style="display:none">
                                                <button class="bt" style="width: 100%; display: flex; align-items: center; border: none; background: none; color: inherit;" type="submit">
                                                <i class="icon-bar-graph-2 menu-icon" style="font-size: 20px; margin-right: 10px; vertical-align: middle; color:white"></i>
                                                    <span class="item" style="color: white;">Báo cáo</span>
                                                </button>
                                            </form>
                                    </li>

                                    <li class="list-group-item d-flex justify-content-center align-items-center" style="white-space: nowrap;">
                                        <form class="" method="get" action="#">
                                        <input name="chucnang" value="hocvien" style="display:none">
                                            <button class="bt" style="width: 100%; display: flex; align-items: center; border: none; background: none; color: inherit;" type="submit">
                                                <i class="icon-head menu-icon" style="font-size: 20px; margin-right: 10px; vertical-align: middle; color:white"></i>
                                                <span class="menu-title" style="color: white;">Học viên</span>
                                            </button>
                                        </form>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-center align-items-center" style="white-space: nowrap; overflow: hidden;">
                                    <form class="" method="get" action="#">
                                    <input name="chucnang" value="donhang" style="display:none">
                                        <button class="bt" style="width: 100%; display: flex; align-items: center; border: none; background: none; color: inherit;" type="submit"> <!-- Thêm style để giữ giao diện giống như nút trên -->
                                        <i class="icon-paper menu-icon" style="font-size: 20px; margin-right: 10px; vertical-align: middle; color:white"></i>
                                            <span class="menu-title" style="color: white;">Đơn hàng</span>
                                        </button>
                                    </form>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-center align-items-center" style="white-space: nowrap; overflow: hidden;">
                                    <form class="" method="get" action="#">
                                    <input name="chucnang" value="xinghiep" style="display:none">
                                        <button class="bt" style="width: 100%; display: flex; align-items: center; border: none; background: none; color: inherit;" type="submit"> <!-- Thêm style để giữ giao diện giống như nút trên -->
                                        <i class="icon-briefcase menu-icon" style="font-size: 20px; margin-right: 10px; vertical-align: middle; color:white"></i>
                                            <span class="menu-title" style="color: white;">Xí nghiệp</span>
                                        </button>
                                    </form>
                                    </li>
                                    </ul>
                                </div>
                            </div> 
                        </div>
                        <div class="main-content flex-grow-1" style="overflow: auto;">
                            <div>
                                <nav class="navbar">
                                <div class="navbar-brand d-flex align-items-center">
                                    <button class="btn btn-light mr-2" id="icon-menu" type="button">
                                        <span class="icon-menu"></span> 
                                    </button>
                                    <span class="navbar-brand page-title"><?php echo $pageTitle; ?></span>
                                </div>
                                
                                <div class="nav-item dropdown d-flex mr-4">
                                    <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                                        <i class="icon-cog"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                                        <p class="mb-0 font-weight-normal float-left dropdown-header">Cài đặt</p>
                                        <a class="dropdown-item preview-item" href="#">
                                            <i class="icon-head"></i> Đổi mật khẩu
                                        </a>
                                        <a class="dropdown-item preview-item" href="index.php?dangxuat=1">
                                            <i class="icon-outbox"></i> Đăng Xuất
                                        </a>
                                    </div>
                                </div>
                                                                    
                                </nav>
                            </div>
                            <nav class="site-index" style="overflow: auto;">
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
                                        case 'xinghiep':
                                            include 'modules/xi_nghiep/danhsachxinghiep.php';
                                            break;
                                        case 'dashboard':
                                            include 'modules/menu.php';
                                            break;
                                        default:
                                        include 'modules/menu.php';
                                        break;
                                        }
                                } 
                                if(isset($_GET['type'])) {
                                $type = $_GET['type'];
                                switch($type) {
                                    case 1:
                                        include 'modules/hocvien/danhsach.php';
                                        break;
                                    case 3:
                                        include 'modules/hocvien/danhsachtt3.php';
                                        break;
                                    case 'dd':
                                        include 'modules/hocvien/danhsachdd.php';
                                        break;
                                    default:
                                        include 'modules/hocvien/danhsach.php';
                                        break;
                                }
                                    }
                                    if(isset($_GET['function'])) {
                                        $function = $_GET['function'];
                                        switch($function) {
                                            case 'them':
                                                include 'modules/hocvien/add/them.php';
                                                break;    
                                        }
                                    }
                                    if(isset($_GET['edit'])) {
                                    include 'modules/hocvien/edit/form-sua.php';
                                    } 
                                    if(isset($_GET['action']) && $_GET['action'] === 'view' && isset($_GET['mhv'])) {
                                      include 'modules/hocvien/view.php';
                                  }
                                    if (isset($_GET['error_message'])) {
                                        $error_message = $_GET['error_message'];
                                        include 'modules/hocvien/add/them.php';
                                    }
                                ?>
                            </nav>
                        </div>
            </div>
        </div>
    </div>
</div>

</main>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    var isSidebarExpanded = true;

    document.getElementById('icon-menu').addEventListener('click', function() {
        var sidebar = document.getElementById('sidebar');
        var mainContent = document.querySelector('.main-content');
        var logo = document.querySelector('.logo');

        if (isSidebarExpanded) {
            sidebar.style.width = '80px';
            logo.style.width = '50px';
            logo.style.height = 'auto';
            mainContent.style.width = 'calc(100% - 80px)';
            document.body.classList.add('collapsed'); // Thêm lớp CSS collapsed
        } else {
            sidebar.style.width = '200px';
            logo.style.width = '100px';
            logo.style.height = 'auto';
            mainContent.style.width = 'calc(100% - 100px)';
            document.body.classList.remove('collapsed'); // Xóa lớp CSS collapsed
        }

        isSidebarExpanded = !isSidebarExpanded;
    });
</script>