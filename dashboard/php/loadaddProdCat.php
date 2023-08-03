<?php

include 'config.php';

$sql = "SELECT * FROM categories";
$result = mysqli_query($conn, $sql);
$output = '';
if(mysqli_num_rows($result) > 0){
        $output = '<option  selected disabled>Select brands</option>';
    while($row = mysqli_fetch_assoc($result)){
        $output .= '<option value="'.$row['id'].'" >'.$row['cname'].'</option>';
    }
}else{
    $output = '<option  selected disabled>No categories found</option>';
}
echo $output;
?>