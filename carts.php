<?php 
session_start();
if(!isset($_SESSION['username'])){
    header('location: login.php');
}
include 'header.php';?>

<div class="carts mb-10 container mx-auto max-w-[1200px]">
<h2 class="py-3 text-center text-2xl text-gray-800">Items in your cart</h2>
    <?php
    include 'php/config.php';
    $uname = $_SESSION['username'];
    $sql = "SELECT *
    FROM users
    LEFT JOIN carts ON users.uname = carts.uname
    LEFT JOIN mobiles ON carts.pid = mobiles.id
    WHERE users.uname = '$uname' AND carts.pid = mobiles.id";
    $run = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($run) > 0){
        echo '<div class="flex flex-col lg:flex-row justify-between  lg:items-start gap-8 ">
    <div id="incarts" class="flex lg:flex-1 justify-center  flex-col gap-4">';
        $price = 0;
    while($row = mysqli_fetch_assoc($run)){
            echo '<div class="w-[300px] md:w-[100%] px-4 p-2 mx-auto flex  flex-col md:flex-row justify-between items-center border border-gray-500">
            <div class="w-[200px]">
                <img src="'.$row['image'].'" alt="" srcset="">
            </div>
            <div class="flex flex-col items-start">
                <h2 class="py-2 text-xl text-gray-800">'.$row['name'].'</h2>
                <p class="text-[20px] text-orange-600">'.$row['price'].' BDT</p>

            </div>
            <div class="flex gap-4 mt-6 md:mt-0">
                 <button data-path="'.$row['pid'].'" id="rmvCart" class="p-2 px-4 bg-orange-500 text-white rounded-sm">Delete</button>
                 <button data-path="'.$row['pid'].'" id="addWish" class="p-2 px-4 bg-green-500 text-white rounded-sm">Add to wishlists</button>
            </div>
        </div>';
        $phone[] = $row['name'];
        $price = $price + $row['price'];
    }
    $phone = implode(',',$phone );
    //     <label for="promo"  class="text-[17px] p-2 mt-2 bg-pink-600 text-white">Enter promo</label>
    //    <input type="text" name="promo" class="text-[17px] p-1 mt-2 border border-sky-600">  
    echo '</div>
    <div class="orders px-6 mx-auto p-2 pb-6 sm:px-4 w-[400px] border border-gray-700 rounded-sm">

        <h2 class="text-center py-2 text-xl">checkout</h2>
        <input type="text" id="phones" class="text-[18px] py-2 text-pink-700" value="'.$phone.'" hidden>
        <input id="user" type="text" value="'.$uname.'" hidden>
        <p class="text-[18px]">Your Total order amount is: <input id="totalPrice" class="w-[100px] text-green-600 text-right pr-1 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none" type="number" value="'.$price.'" disabled>BDT</p>

        <label for="address"  class="text-[17px] p-2 mt-2 bg-orange-600 text-white">Enter address</label>
        <input type="text" name="address" id="address" class="text-[17px] p-1 mt-2 border border-sky-600">
        <label for="phone"  class="text-[17px] p-2 mt-2 bg-slate-600 text-white">phone number</label>
        <input type="number" name="phone" id="phoneNum" class="text-[17px] p-1 mt-2 border border-sky-600">                       
        <button id="confirm" class="p-2 px-4 mt-3 bg-slate-500 hover:bg-slate-700 text-white rounded-sm">Confirm order</button>

    </div>';
    }else{
        echo "<h2 class='text-xl p-4 text-center'>No items in cart</h2>";
    }
    ?>

</div>
</div>

<?php include 'footer.php' ?>
