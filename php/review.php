<?php

include 'config.php';

$text = $_REQUEST['rtext'];
$rating = $_REQUEST['rat'];
$uname = $_REQUEST['uname'];
$pid = $_REQUEST['pid'];

$sql = "INSERT INTO reviews(pid, uname, rtext, rating)
        VALUES ($pid, '$uname', '$text', $rating)";
      
    if(mysqli_query($conn, $sql)){
    echo 'success';
    }else{
    echo 'something went wrong';
    }



?>