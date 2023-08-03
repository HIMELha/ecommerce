<?php
include 'config.php';
session_start();
if(isset($_POST['update'])){
    if(empty($_POST['username'])){
        echo json_encode(array('error' => 'username not should be empty'));
    }else if(empty($_POST['email'])){
        echo json_encode(array('error' => 'email not should be empty'));
    }else if(empty($_POST['phone'])){
        echo json_encode(array('error' => 'phone not should be empty'));
    }else if(empty($_POST['address'])){
        echo json_encode(array('error' => 'address not should be empty'));
    }else{
        if($_FILES['image']['name'] != ''){
            $filename = $_FILES['image']['name'];
            $tmp = $_FILES['image']['tmp_name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $vaild_ext = array('jpg', 'img', 'jpeg', 'gif', 'png');

            if(in_array($ext, $vaild_ext)){
                $new_name = rand() . "." . $ext;
                $path = "../images/user-profile/" . $new_name;
                $filenames = "images/user-profile/". $new_name;
                if(move_uploaded_file($tmp , $path)){
                    $id = $_POST['id'];
                    $uname = $_POST['username'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $address = $_POST['address'];

                    $alrdyExist = mysqli_query($conn, "SELECT * FROM users WHERE uname = '$uname' OR email = '$email' OR phone = '$phone'");
                    if(mysqli_num_rows($alrdyExist) == 0 AND  mysqli_num_rows($alrdyExist) != 2 ){
                       echo json_encode(array('error' => 'you cannot use these info'));
                    }else{
                        $sql = "UPDATE users SET uname = '$uname' , email = '$email' , phone = $phone , addres = '$address', image = '$filenames' WHERE id = $id ";
                        $result = mysqli_query($conn, $sql);
                        session_unset();
                        session_destroy();                        
                        echo json_encode(array('success' => 'profile updated successfully'));
                    }
                }
            }else{
                echo json_encode(array('error' => 'invalid file format'));
            }
        }else{
        echo json_encode(array('error' => 'image not selected'));
        }
    }
}




?>