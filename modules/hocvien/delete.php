<?php 
include ('../../config.php');
if(isset($_POST['checkbox'][0])){
    foreach($_POST['checkbox']as $list){
        $id=mysqli_real_escape_string($mysqli,$list);
        mysqli_query($mysqli,"DELETE from student where mhv='$id'");
    }
}
?>