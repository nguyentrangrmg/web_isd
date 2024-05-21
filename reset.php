<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
  <title>Reset Password</title>
  <meta name="description" content="">
  <link rel="stylesheet" href="/assets/vendor/core.css" class="template-customizer-core-css">
  <link rel="stylesheet" href="/assets/vendor/theme.css" class="template-customizer-theme-css">
  <link rel="stylesheet" href="/assets/vendor/page-auth.css">
</head>
<?php
session_start();
include "config.php";
if (isset($_GET['token'])) {
  $token = $_GET['token'];
  if (isset($_POST['reset'])) {
    $newPassword = $_POST['pass'];
    $newPassword2 = $_POST['pass2'];
    if (empty($_POST["pass"]) || empty($_POST["pass2"])) {
      $_SESSION['error'] = "Vui lòng điền mật khẩu mới.";
      header("Location: reset.php?token=" . $token);
      exit();
    } elseif (strlen($newPassword) < 6 || strlen($newPassword) > 20) {
      $_SESSION['error'] = "Mật khẩu mới phải có ít nhất 6 ký tự và không vượt quá 20 ký tự.";
    } elseif ($newPassword !== $newPassword2) {
      $_SESSION['error'] = "Mật khẩu không khớp.";
    } elseif ($newPassword == $newPassword2) {
      $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
      $updateRes = mysqli_query($mysqli, "UPDATE user SET pass='$hashedPassword' WHERE forgotToken='$token'");
      if ($updateRes) {
        $_SESSION['success'] = "Đổi mật khẩu thành công.";
      }
    }
  }
}
?>

<body>
  <!-- Content -->
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <!-- Forgot Password -->
      <div class="card">
        <div class="card-body">
          <?php
          if (isset($_SESSION['error'])) {
            echo "<div class='alert alert-danger' style='width: 350px;'>" . $_SESSION['error'] . "</div>";
            unset($_SESSION['error']);
          }
          if (isset($_SESSION['success'])) {
            echo "<div class='alert alert-success' style='width: 350px;'>" . $_SESSION['success'] . "</div>";
            unset($_SESSION['success']);
          }
          ?>
          <h4 class="mb-2" style="text-align: center;">Đặt lại mật khẩu?</h4>
          <p class="mb-4">Nhập mật khẩu mới của bạn tại đây</p>
          <!-- Action to login -->
          <form id="formAuthentication" class="mb-3" action='reset.php?token=<?php echo $token ?>' method="POST">
            <div class="mb-3">
              <label for="email" class="form-label">Mật khẩu</label>
              <input type="password" class="form-control" id="pass" name="pass" placeholder="Nhập mật khẩu mới của bạn" maxlength="20" autofocus>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Mật khẩu</label>
              <input type="password" class="form-control" id="pass2" name="pass2" placeholder="Nhập lại mật khẩu" maxlength="20" autofocus>
            </div>
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit" name="reset">Gửi</button>
            </div>
          </form>
          <div class="text-center">
            <!-- redirect to login -->
            <a href="login.php" class="d-flex align-items-center justify-content-center">
              Trở lại đăng nhập
            </a>
          </div>
        </div>
      </div>
      <!-- /Forgot Password -->
    </div>
  </div>
  </div>
</body>

</html>
