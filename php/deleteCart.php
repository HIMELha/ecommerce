<?php

include 'config.php';
session_start();
if(isset($_SESSION['username'])){
    $id = $_REQUEST['pid'];
    $uname = $_SESSION['username'];
    $result0 = mysqli_query($conn, "SELECT * FROM carts WHERE uname = '$uname' AND pid = $id");

    if(mysqli_num_rows($result0) == 1){
        $sql = "DELETE FROM carts WHERE uname = '$uname' AND pid = $id";
        $result = mysqli_query($conn, $sql);
    }
}else{
    echo "login";
}


?>