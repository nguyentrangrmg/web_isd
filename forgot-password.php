<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
  <title>Quên mật khẩu</title>
  <meta name="description" content="">
  <link rel="stylesheet" href="/assets/vendor/core.css" class="template-customizer-core-css">
  <link rel="stylesheet" href="/assets/vendor/theme.css" class="template-customizer-theme-css">
  <link rel="stylesheet" href="/assets/vendor/page-auth.css">
</head>
<?php
session_start();
include "config.php";
if (isset($_POST['send-mail'])) {
  if (empty($_POST["email"])) {
    $_SESSION['error'] = "Vui lòng điền địa chỉ email.";
    header("Location: forgot-password.php");
    exit();
  } else {
    $email = $_POST['email'];
    $sql = "SELECT * FROM user WHERE email='" . $email . "'";
    $result = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);

      $forgotToken = md5($email . time());
      $sqlUpdate = "UPDATE user SET forgotToken='" . $forgotToken . "' WHERE email='" . $email . "'";
      $updateStatus = mysqli_query($mysqli, $sqlUpdate);
      if ($updateStatus) {
        // Tao link reset
        $resetLink = "http://localhost:3000/reset.php?token=" . urlencode($forgotToken);

        require "mail/PHPMailer/src/PHPMailer.php";
        require "mail/PHPMailer/src/SMTP.php";
        require 'mail/PHPMailer/src/Exception.php';
        $mail = new PHPMailer\PHPMailer\PHPMailer(true); //true:enables exceptions
        try {
          $mail->SMTPDebug = 0; //0,1,2: chế độ debug
          $mail->isSMTP();
          $mail->CharSet  = "utf-8";
          $mail->Host = 'smtp.gmail.com';  //SMTP servers
          $mail->SMTPAuth = true; // Enable authentication
          $mail->Username = 'nguyentrangrmg@gmail.com'; // SMTP username
          $mail->Password = 'rcopzqrdrlswdami';   // SMTP password
          $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
          $mail->Port = 465;  // port to connect to                
          $mail->setFrom('nguyentrangrmg@gmail.com', 'Hỗ trợ');
          $mail->addAddress($email);
          $mail->isHTML(true);  // Set email format to HTML
          $mail->Subject = 'Đặt lại mật khẩu';
          $noidungthu = 'Nhấp vào liên kết sau để đặt lại mật khẩu của bạn: ' . $resetLink;
          $mail->Body = $noidungthu;
          $mail->smtpConnect(array(
            "ssl" => array(
              "verify_peer" => false,
              "verify_peer_name" => false,
              "allow_self_signed" => true
            )
          ));
          $mail->send();
          $_SESSION['success'] = "Gửi yêu cầu thành công.";
        } catch (Exception $e) {
          echo 'Error: ', $mail->ErrorInfo;
        }
      }
    } else {
      $_SESSION['error'] = "Địa chỉ email không tồn tại trong hệ thống.";
      header("Location: forgot-password.php");
      exit();
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
          <h4 class="mb-2" style="text-align: center;">Quên mật khẩu?</h4>
          <p class="mb-4">Nhập email của bạn để lấy lại mã đăng nhập</p>
          <!-- Action to login -->
          <form id="formAuthentication" class="mb-3" action="forgot-password.php" method="POST">
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Nhập tài khoản Email của bạn" autofocus>
            </div>
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit" name="send-mail">Gửi</button>
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
