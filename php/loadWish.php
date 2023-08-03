<?php
include 'config.php';
session_start();
if (isset($_SESSION['username'])){

    $uname = $_SESSION['username'];
    $result0 = mysqli_query($conn, "SELECT * FROM wishlist WHERE uname = '$uname'");

    if ($row = mysqli_num_rows($result0)) {
        echo $row;
    }
}
?>