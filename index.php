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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Trang Quản Lý</title>
  <link rel="stylesheet" href="css/newstyle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <script src= "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href= "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/base/base.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/style-pv.css">
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

    if (isset($_GET['error_message'])) {
        $error_message = $_GET['error_message'];
        echo "<p style='color: red;'>$error_message</p>";
            
        include 'trangquanly.php';
        }

?>

</body>
</html>