
<body>
 <?php 
  include 'config.php';

  // Truy vấn đếm số lượng đơn hàng từ bảng jporder
$query_orders = "SELECT COUNT(*) AS total_orders FROM jporder";
$result_orders = mysqli_query($mysqli, $query_orders);
$row_orders = mysqli_fetch_assoc($result_orders);
$total_orders = $row_orders['total_orders'];

// Truy vấn đếm số lượng học viên từ bảng student
$query_students = "SELECT COUNT(*) AS total_students FROM student";
$result_students = mysqli_query($mysqli, $query_students);
$row_students = mysqli_fetch_assoc($result_students);
$total_students = $row_students['total_students'];

$query_working_students = "SELECT COUNT(*) AS total_working_students FROM student WHERE status = 'Đang làm việc'";
$result_working_students = mysqli_query($mysqli, $query_working_students);
$row_working_students = mysqli_fetch_assoc($result_working_students);
$total_working_students = $row_working_students['total_working_students'];

$query_new_students = "SELECT COUNT(*) AS total_new_students, 
                               MONTH(ngay_nhaphoc) AS month, 
                               YEAR(ngay_nhaphoc) AS year 
                        FROM student 
                        WHERE ngay_nhaphoc >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) 
                        GROUP BY YEAR(ngay_nhaphoc), MONTH(ngay_nhaphoc)";
$result_new_students = mysqli_query($mysqli, $query_new_students);
$new_students_data = array();

while ($row = mysqli_fetch_assoc($result_new_students)) {
    $month_year = date("M Y", mktime(0, 0, 0, $row['month'], 1, $row['year']));
    
    $new_students_data[$month_year] = $row['total_new_students'];
}
$query_enterprise = "SELECT COUNT(*) AS total_enterprise FROM enterprise";
$result_enterprise = mysqli_query($mysqli, $query_enterprise);
$row_enterprise = mysqli_fetch_assoc($result_enterprise);
$total_enterprise = $row_enterprise['total_enterprise'];

  $query = "SELECT student.*, jporder.*, baolanh.* 
  FROM student 
  JOIN jporder ON student.mdh = jporder.mdh 
  JOIN baolanh ON student.mhv = baolanh.mhv";
  $result = mysqli_query($mysqli, $query);
  if (mysqli_num_rows($result) > 0) {
    $num_students = mysqli_num_rows($result);
 ?>
  <div class="boxes-db">
    <div class="container-db">
      <div class="row">
          <div class="order-box1">
            <div class="total-students">
              <div class="order-amount"><?php echo $total_students ?></div>
              <div class="order-text">Tổng số học viên</div>
                <a class="foot" href="?chucnang=hocvien" style="text-decoration: none">
                 <button class="footer1">Chi tiết
                  <span class="arrow">→</span>  
                 </button>
                </a>
            </div>
            
          </div>
          <div class="order-box2">
            <div class="total-orders">
              <div class="order-amount"><?php echo $total_orders ?></div>
              <div class="order-text">Đơn hàng</div>
              <a class="foot" href="?chucnang=donhang" style="text-decoration: none">
                 <button class="footer2">Chi tiết
                  <span class="arrow">→</span>  
                 </button>
                </a>
            </div>
          </div>
          <div class="order-box3">
            <div class="total-enterprise">
              <div class="order-amount"><?php echo $total_enterprise ?></div>
              <div class="order-text">Xí nghiệp</div>
            </div>
            <a class="foot" href="?chucnang=xinghiep" style="text-decoration: none">
                 <button class="footer3">Chi tiết
                  <span class="arrow">→</span>  
                 </button>
                </a>
          </div>
          <div class="order-box4">
            <div class="total-exported"> 
              
              <div class="order-amount"><?php echo $total_working_students ?></div>
              <div class="order-text">Học viên xuất cảnh</div>
            </div>
            <?php 
            $status_query_param = urlencode('Đang làm việc');
            $url_with_status = "?filter=hocvien&status=$status_query_param";
            ?>
            <a class="foot" href="<?php echo $url_with_status ?>" style="text-decoration: none">
                 <button class="footer4">Chi tiết
                  <span class="arrow">→</span>  
                 </button>
                </a>
          </div>
      </div>
    </div>
    
    <div id="chart-wrapper" style="height: 400px;">
    <div id="chart-container" style="text-align: center; height: 400px;">
      <h5>Số lượng tuyển học viên theo tháng</h5>
      <div id="myfirstchart" style="height: 85%;"></div>
  </div>
  </div>
  
  
<script>
    // Dữ liệu biểu đồ
    var newStudentsData = <?php echo json_encode($new_students_data); ?>;
    var newStudentsData = <?php echo json_encode(array_map(function($key, $value) { return array('month' => $key, 'value' => $value); }, array_keys($new_students_data), $new_students_data)); ?>;
    // Biểu đồ đường
    new Morris.Line({
        element: 'myfirstchart',
        data: newStudentsData,
        xkey: 'month',
        ykeys: ['value'],
        labels: ['Số lượng học viên'],
        parseTime: false // Không cần phân tích ngày tháng
    });
</script>

<?php } ?>
</body>

</html>