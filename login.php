<?php 
    session_start();
    include "config.php";
    if(isset($_POST['login'])){
        $user = $_POST["uname"];
        $pass = $_POST["psw"];
        $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

        // Truy vấn mật khẩu đã được mã hóa từ cơ sở dữ liệu
        $sql = "SELECT * FROM user WHERE user='".$user."'";
        $result = mysqli_query($mysqli, $sql);
        
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
            $db_hashed_pass = $row['pass'];

            // So sánh mật khẩu đã được mã hóa
            if(password_verify($pass, $db_hashed_pass)){
              if(isset($_POST['remember'])){
                setcookie('user',$user,time()+(86400*7));
                setcookie('pass',$pass,time()+(86400*7));
              }
                $_SESSION['login'] = $user;
                header("Location:index.php");
                exit();
            } else {
                $_SESSION['error'] = "Sai tên đăng nhập hoặc mật khẩu.";
                header("Location: login.php");
                exit();
            }
        } else {
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
                <input type="text" value="<?php if(isset($_COOKIE['user'])) {echo $_COOKIE['user'];} ?>" class="form-control" id="email" name="uname" placeholder="Nhập tài khoản người dùng" autofocus maxlength="20">
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">Mật khẩu</label>
                </div>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" value="<?php if(isset($_COOKIE['pass'])) {echo $_COOKIE['pass'];} ?>" class="form-control" name="psw" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" maxlength="20">
                </div>
              </div>
              <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input class="form-check-input" name="remember" type="checkbox" <?php if(isset($_COOKIE['user'])) {echo 'checked';} ?> id="formRemember"/>
                    <label class="form-check-label" for="formRemember">Nhớ mật khẩu</label>
                </div>
                <a href="forgot-password.php" class="ml-auto">Quên mật khẩu?</a>
              </div>   
              <div 
              class="d-flex justify-content-between align-items-center mb-4 extra-spacing">
              </div>  
              <?php 
              echo "Tài khoản: admin";
              echo "<br>";
              echo "Mật khẩu: haylam";
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
</html>
