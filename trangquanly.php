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
            else {
                $pageTitle = 'Bảng điều khiển';
            }
        ?>
    <div class="container-scroller">
    <!-- navbar -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" ><img src="images/logo TVC.png" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span> 
        </button>
        <span class="navbar-brand page-title"><?php echo $pageTitle; ?></span> <!-- Hiển thị tiêu đề -->
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown mr-4 d-lg-flex d-none">
            <a class="nav-link count-indicatord-flex align-item s-center justify-content-center" href="#">
              <i class="icon-search"></i>
            </a>
          </li>
          <li class="nav-item dropdown mr-4 d-lg-flex d-none">
            <a class="nav-link count-indicatord-flex align-item s-center justify-content-center" href="#">
              <i class="icon-bell"></i>
            </a>
          </li>
          <li class="nav-item dropdown d-flex mr-4 ">
            <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-cog"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Settings</p>
              <a class="dropdown-item preview-item">               
                  <i class="icon-head"></i> Đổi mật khẩu
              </a>
              <a class="dropdown-item preview-item" href="index.php?dangxuat=1">
                <i class="icon-outbox"></i> Đăng Xuất
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- sidebar -->
    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <div class="nav-link" data-toggle="collapse">
                <form class="" method="get" action="#">
                <input name="chucnang" value="dashboard" style="display:none">
                <button class="bt" style="width: 100%; display: flex; align-items: center; border: none; background: none; color: inherit;" type="submit"> <!-- Thêm style để giữ giao diện giống như nút trên -->
                <i class="icon-bar-graph-2 menu-icon "></i>
                    <span class="menu-title">Báo cáo</span>
                </button>
                </form>
            </div>
          </li>
         
          <li class="nav-item">
            <div class="nav-link" data-toggle="collapse">
                <form class="" method="get" action="#">
                <input name="chucnang" value="hocvien" style="display:none">
                <button class="bt" style="width: 100%; display: flex; align-items: center; border: none; background: none; color: inherit;" type="submit"> <!-- Thêm style để giữ giao diện giống như nút trên -->
                    <i class="icon-head menu-icon"></i>
                    <span class="menu-title">Học viên</span>
                </button>
                </form>
            </div>
          </li>

          <li class="nav-item">
            <div class="nav-link" data-toggle="collapse">
                <form class="" method="get" action="#">
                <input name="chucnang" value="donhang" style="display:none">
                <button class="bt" style="width: 100%; display: flex; align-items: center; border: none; background: none; color: inherit;" type="submit"> <!-- Thêm style để giữ giao diện giống như nút trên -->
                <i class="icon-paper menu-icon"></i>
                    <span class="menu-title">Đơn hàng</span>
                </button>
                </form>
            </div>
          </li>
          
          <li class="nav-item">
            <div class="nav-link" data-toggle="collapse">
                <form class="" method="get" action="#">
                <input name="chucnang" value="xinghiep" style="display:none">
                <button class="bt" style="width: 100%; display: flex; align-items: center; border: none; background: none; color: inherit;" type="submit"> <!-- Thêm style để giữ giao diện giống như nút trên -->
                <i class="icon-briefcase menu-icon"></i>
                    <span class="menu-title">Xí nghiệp</span>
                </button>
                </form>
            </div>
          </li>
         
        </ul>
      </nav>
      <div class="content-wrapper">
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
              // Dựa vào giá trị của 'type', include trang tương ứng
              switch($type) {
                  case 1:
                      include 'modules/hocvien/danhsach.php'; // Trang "Thực tập sinh số 1"
                      break;
                  case 3:
                      include 'modules/hocvien/danhsachtt3.php'; // Trang "Thực tập sinh số 3"
                      break;
                  case 'dd':
                      include 'modules/hocvien/danhsachdd.php'; // Trang "Kỹ năng đặc định"
                      break;
                  default:
                      include 'modules/hocvien/danhsach.php'; // Trang mặc định
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
          include 'modules/hocvien/edit/editfform.php';
      }
            ?>
          </div>
      </div>
  <script>
    const icon_menu = document.querySelector('.icon-menu');
    const content = document.querySelector('.content-wrapper');
    icon_menu.onclick = function(){
        content.classList.toggle('expand');
    }
  </script>
   
<!-- partial -->
<script src="vendors/base/vendor.bundle.base.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
   <script src="js/login.js" ></script>