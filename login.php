<?php 
    session_start();
    include "config.php";
    if(isset($_POST['login'])){
        $user=$_POST["uname"];
        $pass=$_POST["psw"];
        $sql ="SELECT * FROM user WHERE user='".$user."' AND pass='".$pass."'";
        $row = mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);
        if($count>0){
            $_SESSION['login']= $user;
            header("Location:index.php");
        }else{
          $_SESSION['error'] = "Sai tên đăng nhập hoặc mật khẩu.";
          header("Location: login.php");
          exit();

        }
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="boxcenter">
    <h2 style="text-align: center;">Đăng Nhập Admin</h2>
    <form action="login.php" method="post">
      <div class="imgcontainer">
        <img src="images/tvclogo.png" alt="Avatar" class="avatar">
      </div>
    
      <div class="container">
        <label for="uname"><b>Tên đăng nhập</b></label>
        <input type="text" placeholder="Tên đăng nhập" name="uname" required>
    
        <label for="psw"><b>Mật khẩu</b></label>
        <input type="password" placeholder="Mật khẩu" name="psw" required>
        <?php 
            // Kiểm tra nếu có thông báo lỗi, hiển thị và sau đó xóa biến session để khi F5 lại trang sẽ k hiển thị lại lỗi
            if(isset($_SESSION['error'])){
              echo "<p style='color:red; text-align: center'>".$_SESSION['error']."</p>";
              unset($_SESSION['error']);
          }
        ?>
        <button type="submit" name="login">Đăng Nhập</button>
      </div>
    </form>
    
</div>
</body>
</html>
