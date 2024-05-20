<?php 
include '../../config.php';
require '../../Excel/PhpXlsxGenerator.php';
function fetchAll($mysqli, $query) {
    $result = $mysqli->query($query);
    $data = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    $result->free();
    return $data;
}
$query = "SELECT student.*, jporder.* FROM student 
JOIN jporder ON student.mdh = jporder.mdh";
$list_hv = fetchAll($mysqli, $query);
$fileName = "danh-sach-hv_".time().".xlsx";

// Define column names 
$excelData[] = array('Mã học viên', 'Họ và Tên', 'Ngày sinh', 'Số điện thoại', 'Ngày thi tuyển', 'Ngày nhập học', 'Tên đơn hàng', 'Trạng thái'); 
 
// Fetch records from database and store in an array 
$query = $mysqli->query("SELECT student.*, jporder.* FROM student 
JOIN jporder ON student.mdh = jporder.mdh"); 
if($query->num_rows > 0){ 
    while($row = $query->fetch_assoc()){ 
        $status = ($row['status'] == 1)?'Active':'Inactive'; 
        $lineData = array($row['mhv'], $row['ho_ten'], $row['ngay_sinh'], $row['sdt'], $row['ngay_thi'], $row['ngay_nhaphoc'], $row['ten_dh'], $row['status']);  
        $excelData[] = $lineData; 
    } 
} 
 
// Export data to excel and download as xlsx file 
$xlsx = CodexWorld\PhpXlsxGenerator::fromArray( $excelData ); 
$xlsx->downloadAs($fileName); 
 
exit; 
?>