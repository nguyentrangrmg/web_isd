
<body>
 
  <div class="boxes-db">
    <div class="container-db">
      <div class="row">
          <div class="order-box1">
            <div class="total-students">
              <div class="order-amount">886</div>
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
              <div class="order-amount">15</div>
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
              <div class="order-amount">5</div>
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
              <div class="order-amount">333</div>
              <div class="order-text">Học viên xuất cảnh</div>
            </div>
            <div class="footer4">
              <span>Chi tiết</span>
              <span class="arrow">→</span>
          </div>
          </div>
      </div>
    </div>
    
    <div id="chart-wrapper">
    <div id="chart-container" style="text-align: center;">
      <h5>Số lượng tuyển học viên theo tháng</h5>
      <!-- <canvas id="enrollmentChart"></canvas> -->
      <div id="myfirstchart" style="height: 250px;"></div>
  </div>
  </div>
  
  <script type="text/javascript">
    new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    { year: '2008-10', value: 20 },
    { year: '2009-10', value: 10 },
    { year: '2010-8', value: 5 },
    { year: '2011-10', value: 5 },
    { year: '2012-11', value: 20 }
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Số lượng tuyển']
});
</script>
  <script>
    const ctx = document.getElementById('enrollmentChart').getContext('2d');
    const enrollmentChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['06/2023', '07/2023', '08/2023', '09/2023', '10/2023', '11/2023', '12/2023', '01/2024', '02/2024', '03/2024', '04/2024', '05/2024'],
            datasets: [{
                label: 'Số lượng tuyển thực tập sinh theo tháng',
                data: [30, 45, 35, 50, 65, 60, 70, 80, 75, 90, 100, 95],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                fill: true, // This makes it an area chart
            }]
        },
        options: {
            scales: {
                y: {
                    title: {
                        display: true,
                        text: 'Số lượng tuyển'
                    },
                    ticks: {
                        stepSize: 10
                    }
                }
            }
        }
    });
</script>
</body>

</html>