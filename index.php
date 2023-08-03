<?php 
session_start();
include 'header.php';?>

<!-- carosel starts here -->
<div class="swiper mb-10 container mx-auto max-w-[1200px]">
  <div class="swiper-wrapper">
    <!-- Slides -->
  </div>
  <!-- If we need pagination -->
  <div class="swiper-pagination"></div>
</div>
<!-- carosel ends here -->
  
<!-- top trending mobile section starts here -->
<div class="trendings mb-10 container mx-auto max-w-[1200px]">
<div class="px-2 py-2 flex justify-between items-center shadow-sm">
  <h2 class="p-2 text-2xl text-center text-gray-600">Top Trending mobile phones</h2>
  <a class="text-md text-slate-600 hover:text-sky-800 cursor-pointer">view all <i class="ml-2 fa-solid fa-arrow-right"></i></a>
 </div>
  <div id="products" class=" p-4 grid gap-4 lg:gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">

  </div>
</div>
<!-- top trending mobile section ends here -->

<!-- latest smart phones section starts here -->
<div class="latest mb-10 container mx-auto max-w-[1200px]">
 <div class="px-2 py-2 flex justify-between items-center shadow-sm">
  <h2 class="p-2 text-2xl text-center text-gray-600">Lastest Smart phones</h2>
  <a class="text-md text-slate-600 hover:text-sky-800 cursor-pointer">view all <i class="ml-2 fa-solid fa-arrow-right"></i></a>
 </div>
<div class="products p-4 grid gap-4 lg:gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
   <?php
   include 'php/config.php';
   $sql = "SELECT * FROM mobiles order BY id DESC LIMIT 6";
   $run = mysqli_query($conn, $sql);
   if(mysqli_num_rows($run) > 0){
    while($row = mysqli_fetch_assoc($run)){
       echo '<div class="max-w-[400px] min-w-[360px] flex flex-col justify-between py-2 px-3 mx-auto border border-gray-200 ">
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
   }else{
     echo "<h2> no records found </h2>";
   }
   ?>
</div>
</div>
<!-- latest smart phones section ends here -->

<!-- WHY CHOOSE US -->

<div class="whyWe mb-10 container mx-auto max-w-[1200px]">
  <h2 class="text-2xl text-gray-700 text-center p-2">Why You should order here?</h2>
  <div class="px-6 overflow-x-hidden grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
       <div class="p-3 relative border-4 border-red-400 bg-red-50 rounded-md">
        <i  id="animation"  class="fa-solid fa-truck text-4xl text-slate-700"></i>
        <h2 class="text-xl text-center pt-2">fastest delivery service</h2>
       </div>
        <div class="p-3 relative border-4 border-sky-400 bg-sky-50 rounded-md flex justify-center gap-4  items-center">
        <i class="fa-solid fa-rotate-left text-4xl text-center text-slate-700"></i>
        <h2 class="text-xl text-center pt-2">easy and fastest refund</h2>
       </div>

        <div class="p-3 relative border-4 border-orange-400 bg-orange-50 rounded-md flex justify-center gap-4 items-center">
        <i class="fa-solid fa-triangle-exclamation text-4xl text-center text-slate-700"></i>
        <h2 class="text-xl text-center pt-2">Products warrenty</h2>
       </div>

        <div class="p-3 relative border-4 border-pink-400 bg-pink-50 rounded-md flex justify-center gap-4 items-center">
        <i class="fa-solid fa-users-gear text-4xl text-center text-slate-700"></i>
        <h2 class="text-xl text-center pt-2">Customer priority</h2>
       </div>
  </div>
</div>

<!-- !WHY CHOOSE US -->

    <script type="module">
        import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.mjs';

        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,
            autoplay: {
                delay: 3000, // Adjust the delay (time between slides) as needed
                disableOnInteraction: false, // Set to false if you want autoplay to continue even when the user interacts with the slides
            },
            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },
            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            }
        });
    </script>
<!--  footer starts here  -->
<?php include 'footer.php' ?>
<!-- footer ends here -->


