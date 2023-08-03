<?php
include 'config.php';
$id = $_REQUEST['id'];
$run = mysqli_query($conn, "DELETE FROM users WHERE id = $id");
echo 'success';
session_start();
session_unset();
session_destroy();
?>