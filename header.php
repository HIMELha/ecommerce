<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile shop - phones in your hand</title>

    <!-- link css file -->
    <link rel="stylesheet" href="styles/style.css">

    <!-- taiwlind css play cdn -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- font awosome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- swiper js links -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

</head>
<body>
    
<!-- header start from here -->
<div  id="err-msg" class="fixed top-5 right-4  sm:max-w-[400px] sm:top-10 sm:right-4 py-3 px-6 bg-red-500 text-white rounded-sm z-50  border-2 border-slate-200 flex justify-center items-center gap-3 hidden">
    <i class="fa-solid fa-circle-xmark"></i>
</div>
<div id="suc-msg" class="fixed top-5 right-4  sm:max-w-[400px] sm:top-10 sm:right-4 py-3 px-6 bg-blue-500 text-white rounded-sm z-50  border-2 border-slate-200 flex justify-center items-center gap-3 hidden"><i class="fa-solid fa-circle-check"></i></div>

    <header id="header" class="relative">
        
        <div class="flex justify-between items-center p-2">
            <?php
            date_default_timezone_set("Asia/Dhaka");
            $time = date("d:M:Y");
            $period = date('H:');
            if($period >= 5 && $period <= 13){
                $msg = 'good morning';
            } else if($period > 13 && $period < 17 ){
                $msg = 'Good afternoon';
            }else if($period > 18 && $period < 24 ){
                $msg = 'Good night';
            }else{
                $msg = 'good midnight';
            }
            if(!isset($_SESSION['username'])){
                    echo '<p class="text-sm text-gray-500">hello guest, '.$time.'</p>';
                }else{
                    echo '<p class="text-sm text-gray-500"> '.$msg.' , '.$_SESSION['username'].' || '.$time.' </p>';
                }
            ?>
            <div class="items-end">
                <?php
                if(!isset($_SESSION['username'])){
                    echo ' <a href="login.php" class="py-1 px-3 mr-2 text-white bg-red-500 hover:bg-red-600 rounded-sm">Login</a>
                    <a href="wishlists.php" class="py-1 px-3 text-white bg-sky-500 hover:bg-sky-600 rounded-sm">whishlists(0)</a>';
                }else{
                    echo ' <a href="logout.php" class="py-1 px-3 mr-2 text-white bg-cyan-500 hover:bg-red-600 rounded-sm">logout</a>
                    <a href="wishlists.php" class="py-1 px-3 text-white bg-sky-500 hover:bg-sky-600 rounded-sm">whishlists(<span id="wishNum"></span>)</a>';
                }
                ?>   
            </div>
        </div>

        <div class="flex justify-between items-center bg-sky-600 p-2 md:gap-1 relative z-index-10">
            <div>
                <a href="index.php" class="text-xl text-gray-200">Mobile <span class="text-md spa">Shop</span></a>
            </div>
            <div class="">
                   <input type="text" id="search" class="pl-2 py-[5px] rounded-sm" placeholder="Search here">
            </div>
    
            <div class="nav">
                <!-- <div class="sm:hidden">
                    <input type="text" id="search" class="pl-2 py-[5px] rounded-sm" placeholder="Search here">
                    <button id="findBtn"><i class="fa-solid fa-search p-2 text-md text-white "></i></button> -->
                    <button id="navToggle"><i class="fa-solid fa-bars p-2 text-xl text-white sm:hidden"></i></button>
                </div>

               <div class="navMenu">
                 <ul class="sm:flex sm:items-center">
                    <li><a href="#" class="px-2 py-1 hover:bg-gray-100 hover:text-pink-700 rounded-md">Presales</a></li>
                    <li><a href="categories.php" class="px-2 py-1 hover:bg-gray-100 hover:text-pink-700 rounded-md">categories</a></li>
                    <li><a href="search-and-view.php" class="px-2 py-1 hover:bg-gray-100 hover:text-pink-700 rounded-md">Search products</a></li>
                    
                    <div class="carts">
                    <a href="carts.php">
                    <button class="ml-2 mt-2 sm:ml-1 sm:mt-0 text-white text-xl hover:text-yellow-400"><i class="fa-solid fa-cart-shopping"></i>(<span id="cartNum">0</span>)</button>
                    </a>
                </div>
                </ul>
               </div>
            </div>
        </div>
    </header>

    <div id="searchBox"  class="mb-10 container mx-auto max-w-[1200px]">
        <div id="searched" class=" p-4 grid gap-4 lg:gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
        
        </div>
    </div>
<!-- header ends here -->