<?php

include 'config.php';

$sql = "SELECT * FROM slides";

$result = mysqli_query($conn, $sql);

$output = '';

if (mysqli_num_rows($result) > 0) {
    $output = ''; // Initialize the output variable as an empty string
    while ($row = mysqli_fetch_assoc($result)) {
        // Dynamically generate the HTML content for each row
        $output .= "<div class='swiper-slide flex flex-col sm:flex-row justify-center lg:gap-15 gap-2 items-center'>
            <div class='max-w-[300px] lg:max-w-[600px]'>
                <img src='" . $row['image'] . "' alt='' class='max-h-[250px] sm:max-h-[350px]'>
            </div>
            <div class='p-4'>
                <h3 class='text-3xl py-4 text-gray-600'>" . $row['pname'] . "</h3>
                <p>" . $row['stext'] . "</p>
                <button id='addCart' class='px-6 py-2 mt-3 text-white bg-sky-700 hover:bg-red-500'>Buy Now <i class='ml-1 fa-solid fa-arrow-right'></i></button>
            </div>
        </div>";
    }
echo $output;
} else {
    // If no results are found, display a default HTML content
    $output .= '<div class="swiper-slide flex flex-col sm:flex-row flex justify-center lg:gap-15 items-center">
        <div class="max-w-[600px]">
            <img src="images\vivo-y93-1024x538.webp" alt="" class="max-h-[250px] sm:max-h-[350px]">
        </div>
        <div class="p-4">
            <h3 class="text-3xl py-4 text-gray-600">testing products</h3>
            <p>product title goes here</p>
            <button id="addCart" class="px-6 py-2 mt-3 text-white bg-sky-700 hover:bg-red-500">Buy Now <i class="ml-1 fa-solid fa-arrow-right"></i></button>
        </div>
    </div>';
}


?>