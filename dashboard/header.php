<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile shop - dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div id="err-msg" class="absolute top-20 right-8 py-3 px-6 bg-red-600 text-white rounded-sm z-index-50 hidden"></div>
<div id="suc-msg" class="absolute top-20 right-8 py-3 px-6 bg-blue-600 text-white rounded-sm z-index-50 hidden"></div>
    <nav class="sidebar">
     
        <div>
        <div class="image-text">
            <span class="image">
                <i class="fa-brands fa-algolia"> <span>MOBILESHOP</span> </i>
                
                   <i class="fa-solid fa-chevron-left"></i>
            </span>
        </div>
        <div class="search">
            <input type="search" name="search" id="" placeholder="search here...">
            <i class="fa-solid fa-magnifying-glass"></i>
            
        </div>

        <div class="nav">
            <ul>
                 <a href="dashboard.php" ><li  class="flex items-center"><i class="fa-solid fa-gauge"></i><p>Dashboard</p></li></a>
                 <a href="categories.php"><li class="flex items-center"><i class="fa-solid fa-layer-group"></i><p>Categories</p></li></a>
                 <a href="products.php"><li class="flex items-center"><i class="fa-solid fa-sitemap"></i><p>Products</p></li></a>
                 <a href="slides.php"><li class="flex items-center"><i class="fa-solid fa-sliders"></i><p>Slides</p></li></a>
                 <a href="orders.php"><li class="flex items-center"><i class="fa-solid fa-truck-fast"></i><p>Orders</p></li></a>
                 <a href="reviews.php"><li class="flex items-center"><i class="fa-solid fa-comments"></i><p>Reviews</p></li></a>
                 <a href="users.php"><li class="flex items-center"><i class="fa-solid fa-users"></i><p>Users</p></li></a>
                 <!-- <a href="promocodes.php"><li class="flex items-center"><i class="fa-solid fa-percent"></i><p>Promocodes</p></li></a>
                 <a href="advertisement.php"><li class="flex items-center"><i class="fa-solid fa-rectangle-ad"></i><p>Advertisement</p></li></a> -->
                 <a href="settings.php"><li class="flex items-center"><i class="fa-solid  fa-gear"></i><p>Settings</p></li></a>
                 <a href="logout.php"><li class="flex items-center"><i class="fa-solid fa-right-from-bracket"></i><p>logout</p></li></a>
                
            </ul>
        </div>
    </div>
        <div class="dark-mode">
            <h2><i class="fa-solid fa-circle-half-stroke"></i>dark mode</h2>
            <div class="dark"></div>
        </div>
    </nav>




        <!-- <header>
            <div><h2>Home</h2></div>
            <div class="fa-solid fa-bars dash-bar"></div>
            <div class="badges">
                <i class="fa-solid fa-envelope"></i>
                <i class="fa-solid fa-bell"></i>
                <div class="profile"><img src="images/profile.jpg" alt=""></div>
            </div>
        </header> -->