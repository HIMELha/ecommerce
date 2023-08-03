<?php

include 'config.php';

$name = $_POST['username'];
$pass = $_POST['password'];

$sql = "SELECT * FROM admin WHERE name = '$name' AND pass = '$pass'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    session_start();
    $_SESSION['admin'] = $name;
    echo 'success';
}else{
   echo 'error';
}

?>