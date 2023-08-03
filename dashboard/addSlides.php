<?php

include 'php/config.php';

if($_FILES['image']['name'] != ''){
    $filenames = $_FILES['image']['name'];
    $ext = pathinfo($filenames, PATHINFO_EXTENSION);
    $vaild_ext = array('jpg', 'png', 'jepg');

    if(in_array($ext , $vaild_ext)){
        $new_name = rand() . ".$ext" ;
        $path = '../images/' . $new_name;
        $filename = 'images/' . $new_name;
        if(move_uploaded_file($_FILES['image']['tmp_name'], $path)){
            $pname = $_POST['pname'];
            $title = $_POST['stitle'];

            $sql = "INSERT INTO slides (pname, stext, image) VALUES ('$pname', '$title', '$filename');";

            if(mysqli_query($conn, $sql)){
               echo json_encode(array('success' => 'slides added'));
            } 
        }else{
            echo json_encode(array('error' => 'something wrong with file path'));
        }
    }else{
        echo json_encode(array('error' => 'you cannot upload ' . $ext . ' ext files'));
    }
}

?>