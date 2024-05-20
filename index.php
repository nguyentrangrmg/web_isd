<?php 
    session_start();
    if (!isset($_SESSION['login'])) {
        header('Location: login.php');
        exit;
    }
    if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
        unset($_SESSION['login']);
        header('Location: login.php');
        exit;
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"> 
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/base/base.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/style-pv.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="css/style-db.css">
  <link rel="stylesheet" href="css/filter2.css" />
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <!-- Morris.js and Raphael.js JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>
<body>
    <?php 
        // Kết nối cơ sở dữ liệu và lấy tên người dùng
        $conn = new mysqli('localhost', 'root', '', 'web_isd');
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }
        $user = $_SESSION['login'];
        $stmt = $conn->prepare("SELECT name FROM user WHERE user = ?");
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $stmt->bind_result($ten_admin);
        $stmt->fetch();
        $stmt->close();
        $conn->close();
    ?>

    <?php 
    // Hiển thị nội dung trang quản lý
    if (isset($_SESSION['login'])) {
        include 'trangquanly.php';
    }

    // Hiển thị thông báo lỗi nếu có
    if (isset($_GET['error_message'])) {
        $error_message = $_GET['error_message'];
        echo "<p style='color: red;'>$error_message</p>";
        include 'trangquanly.php';
    }
    ?>
    <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="messageModalLabel">Thông báo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="messageModalBody">
        <!-- Nội dung thông báo sẽ được thêm vào đây -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script src="js/filter2.js"></script>
</body>


</html>
