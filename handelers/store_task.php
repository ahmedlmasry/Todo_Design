<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'todoapp');
if (!$con) {
    echo 'connect error ' . mysqli_connect_error($con);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['title'])) {

    $title = trim(htmlspecialchars(htmlentities($_POST['title'])));  
    
    if(strlen($title) < 3){
        $_SESSION['errors'] = "title of task must be greater than 3 chars "; 
    }
    if(empty($_SESSION['errors'])){
    $sql = "INSERT INTO  tasks(title) VALUES ('$title')  ";
    $result = mysqli_query($con, $sql);
    if(  mysqli_affected_rows($con)==1){
    $_SESSION['success'] = 'data insereted succssfuly';
    }}
    header('location: ../index.php');
}
