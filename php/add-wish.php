<?php

include 'config.php';
session_start();
if(isset($_SESSION['username'])){
    $id = $_REQUEST['pid'];
    $uname = $_SESSION['username'];
    $result0 = mysqli_query($conn, "SELECT * FROM wishlist WHERE uname = '$uname' AND pid = $id");

    if(mysqli_num_rows($result0) >= 1){
        echo 'incart';
    }else{
        $sql = "INSERT INTO wishlist ( uname, pid) VALUES ('$uname' , $id)";
        $result = mysqli_query($conn, $sql);
    }
}else{
    echo "login";
}


?>