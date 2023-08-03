<?php

include 'config.php';

$cname = $_POST['cname'];
$phone = 0;

$sql = "INSERT INTO categories(cname, cmobile) VALUES('$cname', $phone)";

if(mysqli_query($conn, $sql)){
    echo 'success';
}else{
    echo 'error';
}

?>