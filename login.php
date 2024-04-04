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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
  <title>Login</title>
  <meta name="description" content="">
  <link rel="stylesheet" href="../assets/vendor/core.css" class="template-customizer-core-css">
  <link rel="stylesheet" href="../assets/vendor/theme.css" class="template-customizer-theme-css">
  <link rel="stylesheet" href="../assets/vendor/page-auth.css">
</head>
<body>
  <!-- Content -->
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="card">
          <div class="card-body">
            <!-- /Logo -->
            <img src="images/logo TVC.png" class="logo" style="margin: 0 auto; display: block;">
            <p style="line-height: 1.5em;"></p>
            <form id="formAuthentication" class="mb-3" action="login.php" method="post">
              <div class="mb-3">
                <label for="email" class="form-label"> Tài khoản</label>
                <input type="text" class="form-control" id="email" name="uname" placeholder="Nhập tài khoản người dùng" autofocus maxlength="20">
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">Mật khẩu</label>
                </div>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="psw" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" maxlength="20">
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="formRemember"/>
                    <label class="form-check-label" for="formRemember">Nhớ mật khẩu</label>
                </div>
                <a href="forgot-password.php" class="ml-auto">Quên mật khẩu?</a>
              </div>   
              <div 
              class="d-flex justify-content-between align-items-center mb-4 extra-spacing">
              </div>  
              <?php 
              // Kiểm tra nếu có thông báo lỗi, hiển thị và sau đó xóa biến session để khi F5 lại trang sẽ k hiển thị lại lỗi
              if(isset($_SESSION['error'])){
              echo "<p style='color:red; text-align: center'>".$_SESSION['error']."</p>";
              unset($_SESSION['error']);
              }
              ?>        
              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit" name="login">Đăng nhập</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<!-- <body>
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
</body> -->
</html>
