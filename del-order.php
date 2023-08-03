<?php

include 'php/config.php';

$id = $_REQUEST['id'];

$result = mysqli_query($conn , "DELETE FROM orders WHERE oid = '$id'" );

header('location: order.php');

?>