<?php

include 'config.php';
$id = $_POST['id'];

$sql = "SELECT * FROM categories WHERE id = $id";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
    echo '  <input type="number"  id="cid" value="'.$row['id'].'" hidden>
            <label for="category" class="text-[19px] py-1">Category Name</label>
            <input type="text" id="cname" value="'.$row['cname'].'"  placeholder="category name" class="p-2 mt-1 border border-sky-600 rounded-sm"> <button type="submit" name="submit" class="btn mt-2">update</button>';
    }
}else{
    echo 'error';
}
?>