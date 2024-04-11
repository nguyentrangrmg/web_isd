<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin học viên</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="loai_hv">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#">Thực tập sinh số 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Thực tập sinh số 3</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Kỹ năng đặc định</a>
            </li>
        </ul>
    </div>
    <div class="btn" style="width: 100%; display: flex; justify-content: space-between;">
    <div class="back" style="text-align: left;"><a href="?type=1"><button class="btn btn-primary">Trở về</button></a></div>
    <div class="function" style="text-align: right;">
        
        <a href="#"><button class="btn btn-primary btn-add" disabled>Thêm mới</button></a>
        <a href="#"><button class="btn btn-danger" disabled>Xóa</button></a>
        <a href="#"><button class="btn btn-danger" disabled>Nhập Excel</button></a>
        <a href="#"><button class="btn btn-secondary" disabled>Xuất Excel</button></a>  
        <input type="text" class="search">
    </div>
</div>

<div class="container">
    <div class="table-responsive"  style="flex-basis: 75%; margin-top:10px">
    <table class="table table-bordered">
    <?php
                require 'config.php';
                if(isset($_GET['mhv'])) {
                    $mhv = $_GET['mhv'];
                    $query = "SELECT * FROM student WHERE mhv='$mhv'";
                    $result = mysqli_query($mysqli, $query);

                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {
                            echo "<h3>Thông tin cơ bản</h3>";
                            echo "<tr>";
                            echo "<th>Họ và tên</th>";
                            echo "<td>" . $row['ho_ten'] . "</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<th>Ngày sinh</th>";
                            echo "<td>" . date('d/m/Y', strtotime($row['ngay_sinh'])) . "</td>";
                            
                            echo "</tr>";
                            echo "<tr>";
                            echo "<th>Giới tính</th>";
                            echo "<td>" . $row['gioi_tinh'] . "</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<th>Số điện thoại</th>";
                            echo "<td>" . $row['sdt'] . "</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<th colspan='1'>";
                                echo "<strong>Hộ chiếu </strong>" ."<br>"; // Thêm thông tin căn cước công dân
                                echo "<span style='padding-left: 20px;'>Nơi cấp </span>" ."<br>"; // Thêm thông tin nơi cấp và thụt vào
                                echo "<span style='padding-left: 20px;'>Ngày cấp </span>"; // Thêm thông tin ngày cấp và thụt vào
                            echo "</th>";
                            echo "<td>" . $row['ho_chieu']  . "<br>"
                                        . $row['ho_chieu']  ."<br>"
                                        . $row['ho_chieu']  ."<br>".
                            "</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<th colspan='1'>";
                                echo "<strong>Căn cước công dân </strong>" ."<br>"; // Thêm thông tin căn cước công dân
                                echo "<span style='padding-left: 20px;'>Nơi cấp </span>" ."<br>"; // Thêm thông tin nơi cấp và thụt vào
                                echo "<span style='padding-left: 20px;'>Ngày cấp </span>"; // Thêm thông tin ngày cấp và thụt vào
                            echo "</th>";
                            echo "<td>" . $row['CCCD']  . "<br>"
                                        . $row['CCCD']  ."<br>"
                                        .  $row['CCCD']  ."<br>".
                            "</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<th>Hộ khẩu</th>";
                            echo "<td>" . $row['ho_khau'] . "</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<th>Địa chỉ thường trú</th>";
                            echo "<td>" . $row['que_quan'] . "</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<th>Người bảo lãnh</th>";
                            echo "<td>" . $row['ng_bao_lanh'] . "</td>";
                            echo "</tr>";
                            }
                        } 
                            else {
                        echo "<tr><td colspan='4'>Không tìm thấy thông tin học viên.</td></tr>";
                        }
                        } else {
                        echo "<tr><td colspan='4'>Mã học viên không được cung cấp.</td></tr>";
                        }   
                        
                ?>
    </table>
    <table class="table table-bordered">
    <?php
                require 'config.php';
                if(isset($_GET['mhv'])) {
                    $mhv = $_GET['mhv'];
                    $query2 = "SELECT * FROM baolanh WHERE mhv='$mhv'";
                    $result2 = mysqli_query($mysqli, $query2);
                    if(mysqli_num_rows($result2) > 0) {
                        while($row = mysqli_fetch_assoc($result2)){
                            echo "<h3>Người bảo lãnh</h3>";
                            echo "<tr>";
                            echo "<th>Họ và tên người bảo lãnh</th>";
                            echo "<td>" . $row['ten'] . "</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<th>Ngày sinh</th>";
                            echo "<td>" . $row['dob'] . "</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<th>Quan hệ với học viên</th>";
                            echo "<td>" . $row['quan_he'] . "</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<th>Số điện thoại</th>";
                            echo "<td>" . $row['sdt'] . "</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<th>Hộ khẩu</th>";
                            echo "<td>" . $row['dia_chi'] . "</td>";
                            echo "</tr>";
                        }}}
                        ?>
    </table>
    </div>
    <div class="image" style="text-align:center; flex-basis: 25%; margin-top:50px">
    <?php
                require 'config.php';
                if(isset($_GET['mhv'])) {
                    $mhv = $_GET['mhv'];
                    $query = "SELECT * FROM student WHERE mhv='$mhv'";
                    $result = mysqli_query($mysqli, $query);} 
                    if(mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {

                            $anh_path = $row['file_anh'];           
                            $target_dir = "modules/hocvien/anhhv/";
                            $target_file = $target_dir.$anh_path;
                            
                            echo "<img src='".$target_file."' width='100px'><br>";
                            echo "<tr>";
                            echo "<br>";
                            echo '<th><strong>Mã học viên</strong></th><br>';
                            echo "<td>" . $row['mhv'] . "</td>";
                            echo "</tr>";
                            echo "<tr>";
                            echo "<br>";
                            echo '<th><strong>Trạng thái</strong></th><br>';
                            echo "<td>" . $row['status'] . "</td>";
                            echo "</tr>";
                        }}?>
    </div>
</div>
</body>
</html>
