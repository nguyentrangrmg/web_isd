<?php 
    session_start();
    if(!isset($_SESSION['login'])){
        header('Location:login.php');
        exit;
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
    <link href= "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <script src= "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> 
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Trang Quản Lý</title>   
</head>
<body>
    <?php //lấy tên Admin từ csdl
        $conn = new mysqli('localhost', 'root', '','web_isd');
        $sql = "SELECT name FROM user";
        $result = $conn->query($sql);
        while ($row = $result ->fetch_assoc()){
            $ten_admin = $row['name'];
        }
    ?>
    <?php 
    if(isset($_SESSION['login']))
        include 'trangquanly.php';
    
?>
</body>
</html>