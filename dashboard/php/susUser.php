<?php

include 'config.php';

$id = $_REQUEST['id'];

$sql = "UPDATE users SET status = 'suspended' WHERE id = $id";

if(mysqli_query($conn, $sql)){
    echo 'success';
}else{
    echo 'error';
}

?>