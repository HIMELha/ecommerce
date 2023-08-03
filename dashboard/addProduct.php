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
            $pname = $_POST['pName'];
            $title = $_POST['title'];
            $price = $_POST['price'];
            $desc = $_POST['desc'];
            $category = $_POST['category'];

            $sql = "INSERT INTO mobiles (name, stitle, price, p_desc , cid, image) VALUES ('$pname', '$title', $price , '$desc', $category , '$filename');";
            $sql .= "UPDATE categories SET cmobile = cmobile + 1 WHERE id = $category";
            if(mysqli_multi_query($conn, $sql)){
               echo json_encode(array('success' => 'product added'));
            } 
        }else{
            echo json_encode(array('error' => 'something wrong with file path'));
        }
    }else{
        echo json_encode(array('error' => 'you cannot upload ' . $ext . ' ext files'));
    }
}

?>