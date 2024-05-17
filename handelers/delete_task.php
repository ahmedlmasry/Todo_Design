<?php 

session_start();
if(isset($_GET['id'])){


$con = mysqli_connect("localhost", 'root', '','todoapp');
if (!$con) {
    echo 'connect error ' . mysqli_connect_error($con);
}
$id = $_GET['id'];  
$sql = " SELECT * FROM tasks WHERE id = '$id'  " ;
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_row($result);

if(!$row){
  $_SESSION['errors'] = 'data dosnt exsist';
    
}else{
    $sql = " DELETE FROM tasks WHERE id = '$id'  " ;
    $result = mysqli_query($con,$sql);
    $_SESSION['errors']= 'data deleted succssfuly';

}

header('location: ../index.php');

}