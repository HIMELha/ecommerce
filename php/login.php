<?php
include 'config.php';

if (isset($_POST['create'])) { // Use POST method instead of REQUEST for better security
    if (empty($_POST['username'])) { // Use empty() to check if fields are empty
        echo json_encode(array('error' => 'Username field must not be empty'));
    } else if (empty($_POST['password'])) { // Use empty() to check if fields are empty
        echo json_encode(array('error' => 'Password field must not be empty'));
    } else {

        // Use prepared statements to prevent SQL injection
        $uname = mysqli_real_escape_string($conn, $_POST['username']);
        $pass = mysqli_real_escape_string($conn, $_POST['password']);

        $sql = "SELECT * FROM users WHERE uname = '$uname' AND pass = '$pass'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            if($row['status'] === 'suspended'){
                echo json_encode(array('error' => 'অএব সাইতে দুকে আবালামি করার কারনে আপনার আকউন্ত সুস্পেন্দ করা হয়েসে'));
                die();
            }else if($row['status'] === 'normal'){
                session_start();
                $_SESSION['username']  = $uname ; 
                echo json_encode(array('success' => 'Login success. Redirecting..'));
            }
        } else {
            echo json_encode(array('error' => 'Invalid username or password'));
        }
    }
}
?>
