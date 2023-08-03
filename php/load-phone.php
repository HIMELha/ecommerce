<?php

include 'config.php';

$sql = "SELECT * FROM mobiles WHERE hits < 11";

$result = mysqli_query($conn, $sql);

$output = '';

if (mysqli_num_rows($result) > 0) {
    $output = ''; // Initialize the output variable as an empty string
    while ($row = mysqli_fetch_assoc($result)) {
        // Dynamically generate the HTML content for each row
    $output .= '<div class="max-w-[400px] flex flex-col justify-between py-2 px-3 mx-auto border border-gray-200 ">
   <div id="product-image" class="width-[380px] h-[350px] flex justify-center ">
    <img  src="'.$row['image'].'" alt="" srcset="" class="max-w-[360px] min-h-min ">
    <div id="p-btns" class="flex flex-col gap-8">

      <button data-path="'.$row['id'].'" id="addWish" class="w-10 h-10 bg-sky-500 text-white border hover:text-yellow-600 hover:bg-slate-200 hover:border-yellow-500  rounded-full"><i class="text-xl fa-regular fa-heart"></i></button>
      <a href="view-phone.php?pid='.$row['id'].'"><button class="w-10 h-10 bg-sky-500 text-white border hover:text-yellow-600 hover:bg-slate-200 hover:border-yellow-500  rounded-full"><i class="text-xl fa-solid fa-eye"></i></button></a>
    </div>
   </div>
   <div class="p-3">
   <div class="flex justify-between items-center">
    <a href="view-phone.php?pid='.$row['id'].'"><h2 class="text-xl text-gray-700 py-2">'.$row['name'].'</h2></a>
    <button class="text-yellow-500"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i></button>
   </div>
   <div class="flex justify-between items-center mt-3">
    <h3 class="text-xl text-gray-700">'.$row['price'].'<span class="text-md text-red-500">BDT</span></h3>
    <button data-path="'.$row['id'].'" id="addCart" class="p-2 px-4 bg-green-500 text-white rounded-sm">Add to Cart</button>
   </div>
   </div>
  </div>';
    }
} else {
    // If no results are found, display a default HTML content
    $output .= '  <h2 class="p-2 text-2xl text-center text-gray-600">No mobiles found</h2>';
}

echo $output;

?>