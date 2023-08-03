<?php

include 'config.php';
$id = $_POST['id'];

$sql = "DELETE FROM slides WHERE id = $id";

if(mysqli_query($conn, $sql)){
    echo 'success';
}else{
    echo 'error';
}
?>