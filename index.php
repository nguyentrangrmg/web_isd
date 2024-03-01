<?php 
    session_start();
    if(!isset($_SESSION['login'])){
        header('Location:login.php');
    }
    if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
        unset($_SESSION['login']);
        header('Location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Trang Quản Lý</title>   
</head>
<body>
    <h2 class="trangadmin">Trang Admin</h2>
    <?php //lấy tên Admin từ csdl
        $conn = new mysqli('localhost', 'root', '','web_isd');
        $sql = "SELECT name FROM user";
        $result = $conn->query($sql);
        while ($row = $result ->fetch_assoc()){
            $ten_admin = $row['name'];
        }
    ?>
    <div class="sidebar" id="Administrators" style="display:flex">
    <ul class="admin_menu">
        <div class="ten_admin">
            <img src="images/iconadmin3.jpg" style="width: 20px; height: auto;">
            <?php if(isset($ten_admin)&&($ten_admin!="")){
                echo "<span><strong>$ten_admin</strong></span>";
            } ?></div>
        <li class="line_menu"><a href="">Quản lý học viên </a></li> <br>
        <li class="line_menu"><a href="">Danh sách học viên </a></li> <br>
        <li class="line_menu"><a href="index.php?dangxuat=1" style="color: red;">Đăng xuất </a></li><br>
    
    </ul></div>
    
</body>
</html>