<?php
include 'php/config.php';

$id = $_POST['id'];

$sql = "SELECT * FROM slides WHERE id = $id";
$result = mysqli_query($conn, $sql);
$output = '';

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $output .= '<h2 class="text-xl py-2">Edit slides</h2>
             <i id="closed" class="fa-solid fa-close absolute top-6 right-4 text-xl text-slate-700 hover:text-sky-500 cursor-pointer"></i>
             <div class="flex flex-col justify-start max-w-[340px] mx-auto">
                <label for="pname" class="text-[17px] ">phone Name</label>
                <input type="text" id="pname" value="'.$row['pname'].'" placeholder="phone name" class="p-2 mt-1 border border-sky-600 rounded-sm">
                <label for="stitle" class="text-[17px] ">sort title</label>
                <input type="text" id="stitle" value="'.$row['stext'].'" placeholder="sort title" class="p-2 mt-1 border border-sky-600 rounded-sm">
                <label for="image" class="text-[17px] ">Select image</label>
                <input type="file" name="image" id="image" class="p-2">
                <img src="../'.$row['image'].'" alt="" srcset="" class="max-w-[200px] mx-auto py-2">
                <button type="submit" class="btn mt-2">Save</button>
             </div>';
    }
}
echo $output;
?>