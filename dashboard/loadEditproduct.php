<?php
include 'php/config.php';

$id = $_POST['id'];

$sql = "SELECT * FROM mobiles WHERE id = $id";
$result = mysqli_query($conn, $sql);
$cat = '';
$sql0 = "SELECT * FROM categories
        JOIN mobiles ON mobiles.cid = categories.id
        where mobiles.id  = $id";
    $result0 = mysqli_query($conn, $sql0);
    $row0 = mysqli_fetch_assoc($result0);
    $cat .= '<option value="'.$row0['id'].'" selected disabled>'.$row0['cname'].'</option>';

$sql2 = "SELECT * FROM categories";
$result2 = mysqli_query($conn, $sql2);
if(mysqli_num_rows($result2) > 0){
   while($row1 = mysqli_fetch_assoc($result2)){
        $cat .= '<option value="'.$row1['id'].'" >'.$row1['cname'].'</option>';
   }
}
$output = '';

if(mysqli_num_rows($result) > 0){
    $output .= '<i id="closed" class="fa-solid fa-close absolute top-6 right-4 text-xl text-slate-700 hover:text-sky-500 cursor-pointer"></i>
             <div class="flex flex-col justify-start max-w-[340px] mx-auto">';
    while($row = mysqli_fetch_assoc($result)){
        $output .= '
                <h2 class="text-xl py-2 text-gray-600">Update Product</h2>
                <input type="number" id="eid" value="'.$row['id'].'" hidden>
                <label for="pName" class="text-[17px] ">product Name</label>
                <input type="text" name="epName" id="epName" value="'.$row['name'].'" placeholder="product name" class="px-2 py-1 mt-1 mb-2 border border-sky-600 rounded-sm" >
                <label for="title" class="text-[17px] ">product title</label>
                <input type="text"  name="etitle" id="etitle" value="'.$row['stitle'].'" placeholder="product title" class="px-2 py-1 mt-1 mb-2 border border-sky-600 rounded-sm">
                <label for="price" class="text-[17px] ">price</label>
                <input type="number" name="eprice" id="eprice" value="'.$row['price'].'" placeholder="product price" class="px-2 py-1 mt-1 mb-2 border border-sky-600 rounded-sm">
                <label for="desc" class="text-[17px] " >description</label>
                <textarea name="edesc" id="edesc" value="'.$row['p_desc'].'" placeholder="product description" class="px-2 py-1 mt-1 mb-2 border border-sky-600 rounded-sm" >'.$row['p_desc'].'</textarea>
                <label for="category" class="text-[17px] text-gray-700">Select category</label>
                <select name="ecategory" id="ecategory" class="p-2">
                   '.$cat.'
                </select>
                <label for="image" class="text-[17px] ">image update unavailable</label>
                <img src="../'.$row['image'].'" alt="" srcset="" class="max-w-[200px] mx-auto py-2">

                <button type="submit" class="btn mt-2">Update</button>
             ';
    }
    $output .= '</div>';
}


echo $output;


?>