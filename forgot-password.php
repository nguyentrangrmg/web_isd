<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
  <title>Forgot Password</title>
  <meta name="description" content="">
  <link rel="stylesheet" href="../assets/vendor/core.css" class="template-customizer-core-css">
  <link rel="stylesheet" href="../assets/vendor/theme.css" class="template-customizer-theme-css">
  <link rel="stylesheet" href="../assets/vendor/page-auth.css">
</head>
<body>
  <!-- Content -->
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <!-- Forgot Password -->
        <div class="card">
          <div class="card-body">
            <h4 class="mb-2" style="text-align: center;">Quên mật khẩu?</h4>
            <p class="mb-4">Nhập email của bạn để lấy lại mã đăng nhập</p>
            <!-- Action to login -->
            <form id="formAuthentication" class="mb-3" action="login.html" method="POST">
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Nhập tài khoản Email của bạn" autofocus>
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
