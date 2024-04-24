<?php 
session_start();
if(!isset($_SESSION['username'])){
  header('location: login.php');
}
include 'php/config.php';
include 'header.php';?>

<div class="login-account mb-10 container mx-auto max-w-[1200px]">
  <?php
    $uname = $_SESSION['username'];
    $sql = "SELECT * FROM users WHERE uname = '$uname'";
    $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      ?>
<div class="flex flex-col">
    <div class="p-4 max-w-[800px] mx-auto flex gap-4">
       <div>
        <h2 class="p-2text-xl text-gray-700">Profile info</h2>
        <img src="<?php echo $row['image'] ?>" alt="" class="p-2 w-32 h-32 mt-4 border border-red-500 rounded-lg">
       <p class="p-2 text-center text-[19px] text-gray-900"> <?php echo $row['uname'] ?></p>
       </div>
       <div class="mt-6 p-2">
        <h2 class="mb-2 text-[18px] text-gray-800"><span>Name:</span> <?php echo $row['uname'] ?></h2>
        <h2 class="mb-2 text-[18px] text-gray-800"><span>email:</span> <?php echo $row['email'] ?></h2>
        <h2 class="mb-2 text-[18px] text-gray-800"><span>phone:</span> <?php echo $row['phone'] ?></h2>
        <h2 class="mb-2 text-[18px] text-gray-800"><span>password:</span> <a href="reset.php" class="border-b border-sky-600 hover:text-sky-600">reset now</a></h2>
        <div class="flex gap-4">
            <a href="update-profile.php?id=<?php echo $row['id'] ?>"><button class="py-2 px-4 text-white bg-green-700 hover:bg-sky-700 rounded-md">Update Profile</button></a>
            <button id="delete" data-path="<?php echo $row['id'] ?>"  class="py-2 px-4 text-white bg-red-600 hover:bg-sky-700 rounded-md">
              Delete account</button>
        </div>
       </div>
    </div>
    <div class="p-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-6 lg:px-2">
        <div class="p-3 border-2 border-slate-600  flex flex-col justfy-center rounded-md">
          <i class="fa-solid fa-cart-shopping text-5xl p-2 text-center text-orange-500"></i>
          <h2 class="text-center text-gray-700 text-2xl"><span class="text-3xl text-red-500 mr-2"></span>Products in your cart</h2>
          <a href="carts.php" class="mt-2 text-center text-sky-600 text-xl">check carts</a>
        </div>

          <div class="p-3 border-2 border-slate-600  flex flex-col justfy-center rounded-md">
          <i class="fa-regular fa-heart text-5xl p-2 text-center text-red-500"></i>
          <h2 class="text-center text-gray-700 text-2xl">Products in your wishlists</h2>
          <a href="wishlists.php" class="mt-2 text-center text-sky-600 text-xl">check wishlists</a>
        </div>

         <div class="p-3 border-2 border-slate-600  flex flex-col justfy-center rounded-md">
        <i class="fa-solid fa-wrench text-5xl p-2 text-center text-yellow-500"></i>
          <h2 class="text-center text-gray-700 text-2xl">Products in pending orders</h2>
          <a href="order.php" class="mt-2 text-center text-sky-600 text-xl">check orders</a>
        </div>

        <div class="p-3 border-2 border-slate-600  flex flex-col justfy-center rounded-md">
          <i class="fa-solid fa-store text-5xl p-2 text-center text-green-500"></i>
          <h2 class="text-center text-gray-700 text-2xl">Explore more products</h2>
          <a href="index.php" class="mt-2 text-center text-sky-600 text-xl">explore</a>
        </div>
    </div>
</div>
<?php }
  } else {
    echo "no data found for this user";
  }?>

</div>
</div>

<?php  include 'footer.php' ?>
