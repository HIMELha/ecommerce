<?php

include 'config.php';

$products = $_REQUEST['products'];
$uname = $_REQUEST['user'];
$price = $_REQUEST['totalPrice'];
$addresss = $_REQUEST['address'];
$phone = $_REQUEST['phone'];

$sql = "INSERT INTO orders (products, uname, price, addresss, phone)
        VALUES ('$products','$uname', '$price', '$addresss' ,$phone);";
$sql .= "UPDATE users SET orders = orders + 1 WHERE uname = '$uname';";

$sql .= "DELETE FROM carts WHERE uname = '$uname'";
if(mysqli_multi_query($conn, $sql)){
        echo 'success';
    }else{
        echo 'something went wrong';
    }

?>