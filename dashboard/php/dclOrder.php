<?php

include 'config.php';

$id = $_REQUEST['id'];

$sql = "UPDATE orders SET status = 'declined' WHERE oid = $id";

if(mysqli_query($conn, $sql)){
    echo 'success';
}else{
    echo 'error';
}

?>