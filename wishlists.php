<?php 
session_start();
if(!isset($_SESSION['username'])){
    header('location: login.php');
    exit();
}
include 'header.php';?>

<div class="carts mb-10 container mx-auto max-w-[1200px]">
<h2 class="py-3 text-center text-2xl text-gray-800">Items in your wishlists</h2>
    <?php
    include 'php/config.php';
    $uname = $_SESSION['username'];
    $sql = "SELECT *
    FROM users
    LEFT JOIN wishlist ON users.uname = wishlist.uname
    LEFT JOIN mobiles ON wishlist.pid = mobiles.id
    WHERE users.uname = '$uname' AND pid = mobiles.id";
    $run = mysqli_query($conn, $sql);

    if(mysqli_num_rows($run) != 0){
        echo '<div class="flex justify-between items-start gap-8 ">
    <div id="incarts" class="flex flex-1 flex-col gap-4">';
     while($row = mysqli_fetch_assoc($run)){
            echo '<div class="w-[300px] md:w-[100%] px-4 p-2 mx-auto flex flex-col md:flex-row justify-between items-center border border-gray-500">
            <div class="w-[200px]">
                <img src="'.$row['image'].'" alt="" srcset="">
            </div>
            <div class="flex flex-col">
                <h2 class="py-2 text-xl text-gray-800">'.$row['name'].'</h2>
                <p class="text-[20px] text-center text-orange-600">'.$row['price'].' BDT</p>
            </div>
            <div class="flex gap-4 mt-6 md:mt-0">
                 <button data-path="'.$row['pid'].'" id="rmvWish" class="p-2 px-4 bg-orange-500 text-white rounded-sm">Delete</button>
                 <button data-path="'.$row['pid'].'" id="addCart" class="p-2 px-4 bg-green-500 text-white rounded-sm">Add to cart</button>
            </div>
        </div>';

    }
  
    }else{
        echo "<h2 class='text-xl p-4 text-center'>No items in cart</h2>";
    }
    ?>

</div>
</div>

<?php include 'footer.php' ?>
