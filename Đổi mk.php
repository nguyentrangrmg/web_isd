<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm học viên</title>
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
<div class="main-panel">
                <div class="content-wrapper">
                    <div class="setting" style="margin-left: 50px;">
                        <h4 class="text-dark font-weight-bold mb-2">Đổi mật khẩu</h4>
                        <p class="text-muted mt-2" style="margin-left: 10px; font-size: normal;">Mật khẩu của bạn phải
                            có ít nhất 6 ký tự và không vượt quá 20 ký tự</p>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group row">
                                    <label class="col-sm-9">Mật khẩu hiện tại<code>*</code></label>
                                    <div class="col-sm-12">
                                        <div class="input-group rounded">
                                            <input type="password" class="form-control rounded" id="currentPassword"
                                                oninput="checkInput('currentPassword')" />
                                            <span class="password-toggle-icon" id="toggleCurrentPassword"
                                                onclick="togglePasswordVisibility('currentPassword')">
                                                <i class="fa-solid fa-eye-slash" id="currentPasswordIcon"></i>
                                            </span>
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
                                            <input type="password" class="form-control rounded" id="currentPassword"
                                                oninput="checkInput('currentPassword')" />
                                            <span class="password-toggle-icon" id="toggleCurrentPassword"
                                                onclick="togglePasswordVisibility('currentPassword')">
                                                <i class="fa-solid fa-eye-slash" id="currentPasswordIcon"></i>
                                            </span>
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
                                            <input type="password" class="form-control rounded" id="currentPassword"
                                                oninput="checkInput('currentPassword')" />
                                            <span class="password-toggle-icon" id="toggleCurrentPassword"
                                                onclick="togglePasswordVisibility('currentPassword')">
                                                <i class="fa-solid fa-eye-slash" id="currentPasswordIcon"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                                <a href="#" class="btn btn-light ml-3">Huỷ</a>
                            </div>
                        </div>
                    </div>
                </div>
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
                // Hàm kiểm tra và ẩn hiện mật khẩu
                function checkInput(inputId) {
                    var passwordInput = document.getElementById(inputId);
                    var passwordIcon = document.getElementById(inputId + 'Icon');
                    if (passwordInput.value === "") {
                        passwordInput.type = "password";
                        passwordIcon.classList.remove("fa-eye");
                        passwordIcon.classList.add("fa-eye-slash");
                    } else {
                        passwordInput.type = "text";
                        passwordIcon.classList.remove("fa-eye-slash");
                        passwordIcon.classList.add("fa-eye");
                    }
                }

                // Hàm toggle hiển thị mật khẩu
                function togglePasswordVisibility(inputId) {
                    var passwordInput = document.getElementById(inputId);
                    var passwordIcon = document.getElementById(inputId + 'Icon');
                    if (passwordInput.type === "password") {
                        passwordInput.type = "text";
                        passwordIcon.classList.remove("fa-eye-slash");
                        passwordIcon.classList.add("fa-eye");
                    } else {
                        passwordInput.type = "password";
                        passwordIcon.classList.remove("fa-eye");
                        passwordIcon.classList.add("fa-eye-slash");
                    }
                }

                // Mặc định ẩn mật khẩu khi trang load
                document.addEventListener("DOMContentLoaded", function () {
                    var inputs = document.querySelectorAll('input[type="password"]');
                    inputs.forEach(function (input) {
                        var icon = document.getElementById(input.id + 'Icon');
                        input.type = "password";
                        icon.classList.remove("fa-eye");
                        icon.classList.add("fa-eye-slash");
                    });
                });
            </script></body>