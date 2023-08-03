<?php

include 'php/config.php';

      $pid = $_REQUEST['id'];
      $pname = $_REQUEST['product'];
      $title = $_REQUEST['productTitle'];
      $price = $_REQUEST['Price'];
      $desc = $_REQUEST['desc'];
      $category = $_REQUEST['category'];
   
      $sql = "UPDATE mobiles SET name = '$pname' , stitle = '$title' , price = $price, p_desc = '$desc' , cid = $category 
               WHERE id = $pid;";
      if(mysqli_query($conn, $sql)){
         echo 'success';
      }else{
         echo 'error';
      }

            
// if(isset($_FILES['images']['name'])){
//     echo json_encode(array('success' => 'product addeddd'));
//     $filenames = $_FILES['image']['name'];
//     $ext = pathinfo($filenames, PATHINFO_EXTENSION);
//     $vaild_ext = array('jpg', 'png', 'jepg');

//     if(in_array($ext , $vaild_ext)){
//         $new_name = rand() . ".$ext" ;
//         $path = '../images/' . $new_name;
//         $filename = 'images/' . $new_name;
//         if(move_uploaded_file($_FILES['image']['tmp_name'], $path)){
//             $pid = $_GET['id'];
//             $pname = $_GET['epName'];
//             $title = $_GET['etitle'];
//             $price = $_GET['eprice'];
//             $desc = $_GET['edesc'];
//             $category = $_GET['ecategory'];
        
//             $sql = "UPDATE mobiles SET name = '$pname' , stitle = '$title' , price = $price, p_desc = '$desc' , cid = $category , image = '$filename' WHERE id = $pid;";
//              echo json_encode(array('success' => $sql));
            
//             exit();
//             if(mysqli_query($conn, $sql)){
//                echo json_encode(array('success' => 'product updated'));
//             } 
//         }else{
//             echo json_encode(array('error' => 'something wrong with file path'));
//         }
//     }else{
//         echo json_encode(array('error' => 'you cannot upload ' . $ext . ' ext files'));
//     }
// }else{
// }


?>