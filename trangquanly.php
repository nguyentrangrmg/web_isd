        <?php //lấy tên Admin từ csdl
            $conn = new mysqli('localhost', 'root', '','web_isd');
            $sql = "SELECT name FROM user";
            $result = $conn->query($sql);
            while ($row = $result ->fetch_assoc()){
                $ten_admin = $row['name'];
            }
        ?>
        <div class="sidebar" id="Administrators" style="display:flex">
    <nav>
    <div class="click_menu"><ion-icon name="menu-outline"></ion-icon></div>
        <ul>
            <div class="logo">
                <img src="images/tvclogo.png" >
            </div>
        <li>
                    <div class="ten_admin">
                        <img src="images/iconadmin3.jpg" style="width: 20px; height: auto;">
                        <?php if(isset($ten_admin)&&($ten_admin!="")){
                            echo " <span><strong>$ten_admin</strong></span>";
                        } ?></div>
        </li>
            <li><div>
                <form method="get" action="#">
                    <input name = "chucnang" value="dashboard" style="display:none">
                    <button class="bt" style="width: 100%">
                    <div class ="line_menu">Dashboard</div>
                </button>
                </input></form>
            </div></li>
            <li><div>
                <form method="get" action="#">
                    <input name = "chucnang" value="hocvien" style="display:none">
                    <button class="bt" style="width: 100%">
                    <div class ="line_menu">Học Viên</div>
                </button>
                </input></form>
            </div></li>
            <li><div>
                <form method="get" action="#">
                    <input name = "chucnang" value="donhang" style="display:none">
                    <button class="bt" style="width: 100%">
                    <div class ="line_menu">Đơn Hàng</div>
                </button>
                </input></form>
            </div></li>
            <li class="logout">
                    <a href="index.php?dangxuat=1" style="color: red;">
                    Đăng xuất 
                    </a>
            </li>
        </ul>
    </nav>
    <div class="content">
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
<script>
    const nav = document.querySelector('nav');
    const click_menu = document.querySelector('.click_menu');
    const content = document.querySelector('.content');
    click_menu.onclick = function(){
        nav.classList.toggle('hide');
        content.classList.toggle('expand');
    }
</script>