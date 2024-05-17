<?php 
session_start();

$con = mysqli_connect("localhost","root","","todoapp");
if(!$con){
    echo "connect error " . mysqli_connect_error($con);
}

if($_SERVER['REQUEST_METHOD']  == "POST" && isset($_POST['title'])){

    $title = trim(htmlspecialchars(htmlentities($_POST['title'])));
    $id = $_GET['id'];

    // echo $title;

    if(strlen($title) < 3){
        $_SESSION['errors'] = "title of task must be greater than 3 chars "; 
    }


    if(empty($_SESSION['errors'])){
        $sql = "UPDATE `tasks` SET `title`='$title' WHERE `id` = $id ";
        $result = mysqli_query($con,$sql);
        // echo mysqli_affected_rows($con);
        if($result ){
            $_SESSION['success'] = "data updated succefully";
        }
    }else{
        header("location:../update.php?id=$id");
        die;

    }

    // redirection 
    header("location:../index.php");

}