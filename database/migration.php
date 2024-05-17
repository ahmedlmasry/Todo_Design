<?php
$con = mysqli_connect("localhost", 'root', '');
if (!$con) {
    echo 'connect error ' . mysqli_connect_error($con);
}

$sql = "CREATE DATABASE  IF NOT EXISTS todoapp";
$result = mysqli_query($con, $sql);
mysqli_close($con);

$con = mysqli_connect("localhost", 'root', '', 'todoapp');
if (!$con) {
    echo 'connect error ' . mysqli_connect_error($con);
}

$sql = "CREATE TABLE IF NOT EXISTS  tasks(
    id INT PRIMARY KEY AUTO_INCREMENT ,
    title VARCHAR(255)

)";
$result = mysqli_query($con, $sql);
echo mysqli_error($con);

