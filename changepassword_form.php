<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['user'];
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmNewPassword = $_POST['confirmNewPassword'];

    if ($newPassword !== $confirmNewPassword) {
        $_SESSION['error'] = "Mật khẩu mới không khớp.";
    } elseif (strlen($newPassword) < 6 || strlen($newPassword) > 20) {
        $_SESSION['error'] = "Mật khẩu mới phải có ít nhất 6 ký tự và không vượt quá 20 ký tự.";
    } else {
        $res = mysqli_query($mysqli, "SELECT * FROM user WHERE user='$user'");
        $row = mysqli_fetch_assoc($res);

        if (password_verify($currentPassword, $row['pass'])) {
            $_SESSION['error'] = "Mật khẩu hiện tại không đúng.";
        } else {
            // $updateRes = mysqli_query($mysqli, "UPDATE user SET pass='$newPassword' WHERE user='$user'");
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $updateRes = mysqli_query($mysqli, "UPDATE user SET pass='$hashedPassword' WHERE user='$user'");

            if ($updateRes) {
                $_SESSION['success'] = "Đổi mật khẩu thành công.";
            } else {
                $_SESSION['error'] = "Mật khẩu hiện tại không đúng.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đổi mật khẩu</title>
  <!-- Link CSS Bootstrap -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/select2/select2.min.css">
  <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <link rel="stylesheet" href="css/newstyle.css">
  <link rel="stylesheet" href="vendors/base/base.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
</head>
<body>
<!-- Content -->
<div class="container">
  <?php 
  include 'config.php';
  $user = $_GET['user'];
  $res = mysqli_query($mysqli, "SELECT * FROM user WHERE user='".$user."'");
  while ($row = mysqli_fetch_assoc($res)) {
  ?>
  <div class="content-wrapper">
    <?php
    if(isset($_SESSION['error'])){
      echo "<div class='alert alert-danger' style='width: 500px;'>".$_SESSION['error']."</div>";
      unset($_SESSION['error']);
      }
    else if(isset($_SESSION['success'])){
      echo "<div class='alert alert-success' style='width: 500px;'>".$_SESSION['success']."</div>";
      unset($_SESSION['success']);
      }
    ?>
    <form id="formAuthentication" class="mb-3" action="#" method="post">
    <div class="setting" style="margin-left: 50px;">
        <h4 class="text-dark font-weight-bold mb-2">Đổi mật khẩu</h4>
        <p class="text-muted mt-2" style="margin-left: 10px; font-size: normal;">Mật khẩu của bạn phải
          có ít nhất 6 ký tự và không vượt quá 20 ký tự</p>
        <input type="hidden" name="user" value="<?php echo $row['user']; ?>"/>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group row">
              <label class="col-sm-9">Mật khẩu hiện tại<code>*</code></label>
              <div class="col-sm-12">
                <div class="input-group rounded">
                  <input type="password" class="form-control rounded" name="currentPassword" id="currentPassword" maxlength="20"/>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group row">
              <label class="col-sm-9">Mật khẩu mới<code>*</code></label>
              <div class="col-sm-12">
                <div class="input-group rounded">
                  <input type="password" class="form-control rounded" name="newPassword" id="newPassword" maxlength="20"/>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group row">
              <label class="col-sm-9">Nhập mật khẩu mới<code>*</code></label>
              <div class="col-sm-12">
                <div class="input-group rounded">
                  <input type="password" class="form-control rounded" name="confirmNewPassword" id="confirmNewPassword" maxlength="20"/>
                </div>
              </div>
            </div>
          </div>
        </div>        
              <div class="row mt-3">
          <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
            <a href="?chucnang=dasboard" class="btn btn-light ml-3">Huỷ</a>
          </div>
        </div>
            </form>
  </div>
  <?php } ?>
</div>
  <style>
    .input-group {
      position: relative;
    }

    .password-toggle-icon {
      position: absolute;
      top: 50%;
      right: 10px;
      transform: translateY(-50%);
      cursor: pointer;
    }
  </style>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      var inputs = document.querySelectorAll('input[type="password"]');
      inputs.forEach(function (input) {
        var icon = document.getElementById(input.id + 'Icon');
        input.type = "password";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
      });
    });
  </script>
</body>
</html>
