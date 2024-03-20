<div><h3>Danh sách học viên</h3>
<table class="table">
 
<thead>
    <tr>
      <th scope="col">MHV</th>
      <th scope="col">HovaTen</th>
      <th scope="col">NgaySinh</th>
      <th scope="col">HoChieu</th>
      <th scope="col">CCCD</th>
    </tr>
  </thead>
    
<?php 
        require 'config.php';
        $danhsach="SELECT * FROM student";
        $result = mysqli_query($mysqli, $danhsach);
        while ($r = mysqli_fetch_assoc($result)){
            ?>
            <!-- echo $r['mhv']."-".$r['ho_ten']."-".$r['ngay_sinh']; -->
            <thead>
            <tr>
            <td scope="col"><?php echo $r['mhv'] ?></td>
            <td scope="col"><?php echo $r['ho_ten'] ?></td>
            <td scope="col"><?php echo $r['ngay_sinh'] ?></td>
            <td scope="col"><?php echo $r['ho_chieu'] ?></td>
            <td scope="col"><?php echo $r['CCCD'] ?></td>
            </tr>
  </thead>
        <?php   
        }
        ?>
</tbody>
</table>
</div>