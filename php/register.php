<?php
include 'config.php';

if (isset($_POST['create'])) { // Use POST method instead of REQUEST for better security
    if (empty($_POST['username'])) { // Use empty() to check if fields are empty
        echo json_encode(array('error' => 'Username field must not be empty'));
    } else if(empty($_POST['email'])){
        echo json_encode(array('error' => 'email field must not be empty'));
    } else if (empty($_POST['password'])) { // Use empty() to check if fields are empty
        echo json_encode(array('error' => 'Password field must not be empty'));
    }  else if (empty($_POST['cpassword'])) { // Use empty() to check if fields are empty
        echo json_encode(array('error' => 'confirm password field must not be empty'));
    } else if(empty($_POST['phone'])){
        echo json_encode(array('error' => 'phone number field must not be empty'));
    }

        // Use prepared statements to prevent SQL injection
        $uname = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, $_POST['password']);
        $cpass = mysqli_real_escape_string($conn, $_POST['cpassword']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);

        if($pass === $cpass){
        $sql1 = "SELECT * FROM users WHERE uname = '$uname'";
        $result1 = mysqli_query($conn, $sql1);
        if(mysqli_num_rows($result1) > 0){
            echo json_encode(array('error' => 'username already exist'));
            exit();
        }

        $sql2 = "SELECT * FROM users WHERE email = '$email'";
        $result2 = mysqli_query($conn, $sql2);
        if(mysqli_num_rows($result2) > 0){
            echo json_encode(array('error' => 'email already exist'));
            exit();
        }

        $sql3 = "SELECT * FROM users WHERE phone = '$phone'";
        $result3 = mysqli_query($conn, $sql3);
        if(mysqli_num_rows($result3) > 0){
            echo json_encode(array('error' => 'phone already exist'));
            exit();
        }

        $sql = "INSERT INTO users (uname, email, pass, phone) VALUES ('$uname', '$email', '$pass' , '$phone')";

            if (mysqli_query($conn, $sql)) {
                session_start();
                $_SESSION['username']  = $uname; 
                echo json_encode(array('success' => 'registration success. Redirecting..'));
            } else {
                echo json_encode(array('error' => 'something went wrong'));
            }
        }
    }
?>
