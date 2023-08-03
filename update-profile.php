<?php 
session_start();
if(!isset($_SESSION['username'])){
  header('location: login.php');
}
include 'php/config.php';
$uname = $_SESSION['username'];
$uid = $_REQUEST['id'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE uname = '$uname'");

if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    if($row['id'] != $uid){
      die("this user not found and suck your cleaverness");
    }else{
include 'header.php';?>

<div class="login-account mb-10 container mx-auto max-w-[1200px]">
<h2 class="py-3 text-center text-2xl text-gray-800">update profile</h2>
<div class="flex flex-col w-[500px] mx-auto">
  <?php
  
  ?>
<form id="update-user" method="POST" enctype="multipart/form-data" class="p-4 m-4 flex flex-col w-[350px] sm:w-[450px] sm:max-w[500px] mx-auto bg-slate-200 rounded-md">
  <h2 class="p-2 my-2 text-center text-[15px] text-orange-700 border border-red-600 bg-yellow-100 ">due to an security issue, you will be logged out after updating profile</h2>
 <h2 id="err-msg" class="p-2 my-2 text-center text-[18px] text-red-700 border border-red-600 bg-red-100 hidden"></h2>
 <h2 id="success-message" class="p-2 my-2 text-center text-[18px] text-blue-700 border border-sky-600 bg-cyan-100 hidden"></h2>
 <input type="number" name="id"  value="<?php echo $row['id']?>" hidden>
<label for="username" class="text-[18px] text-gray-700">Username</label>
<input type="text" name="username" placeholder="enter your username" class="p-2 border border-sky-400  rounded-sm mb-4" value="<?php echo $row['uname']?>">
<label for="email" class="text-[18px] text-gray-700">email</label>
<input type="email" name="email" placeholder="enter your email" class="p-2 border border-sky-400  rounded-sm mb-4" value="<?php echo $row['email']?>">

<label for="phone" class="text-[18px] text-gray-700">phone</label>
<input type="number" name="phone" placeholder="enter your phone" class="p-2 border border-sky-400  rounded-sm mb-4" value="<?php echo $row['phone']?>">
<label for="address" class="text-[18px] text-gray-700">address</label>
<input type="text" name="address" placeholder="enter your address" class="p-2 border border-sky-400  rounded-sm mb-4"
value="<?php echo $row['addres']?>">

<label for="image">select profile</label>
<input type="file" name="image" class="p-2 border border-sky-400  rounded-sm mb-4" class="p-2 border border-sky-400  rounded-sm mb-4">

<button type="submit" name="submit" class="p-3 bg-sky-500 text-white text-[18px] hover:bg-green-500">update</button>
</form>
</div>

</div>
<?php  
    }
      }
    }else{
      echo ("no records found");
    }
?>

<?php include 'footer.php' ?>
