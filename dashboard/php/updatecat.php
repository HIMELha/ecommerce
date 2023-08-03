<?php

include 'config.php';
$id = $_POST['id'];
$cname = $_POST['cname'];

$sql = "UPDATE categories SET cname = '$cname' WHERE id = $id";

if(mysqli_query($conn, $sql)){
    echo 'success';
}else{
    echo 'error';
}
?>