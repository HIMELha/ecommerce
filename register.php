<?php 
session_start();
if(isset($_SESSION['username'])){
  header('location: account.php');
}
include 'header.php';?>

<div class="login-account mb-10 container mx-auto max-w-[1200px]">
<h2 class="py-3 text-center text-2xl text-gray-800">Shoping In your hand! stay logined and order your favorute produicts</h2>
<form id="sign-up" method="POST" class="p-4 m-4 flex flex-col max-w-[500px] mx-auto bg-slate-200 rounded-md">
  <h3 class="text-center text-gray-600 text-xl">create an account</h3>
  <h2 id="err-msg" class="p-2 my-2 text-center text-[18px] text-red-700 border border-red-600 bg-red-100 hidden"></h2>
  <h2 id="success-message" class="p-2 my-2 text-center text-[18px] text-blue-700 border border-sky-600 bg-cyan-100 hidden"></h2>
<label for="username" class="text-[18px] text-gray-700">Username</label>
<input type="text" name="username" placeholder="enter your username" class="p-2 border border-sky-400  rounded-sm mb-4">

<label for="email" class="text-[18px] text-gray-700">email</label>
<input type="email" name="email" placeholder="enter your email" class="p-2 border border-sky-400  rounded-sm mb-4">

<label for="password" class="text-[18px] text-gray-700">password</label>
<input type="password" name="password" placeholder="enter your password" class="p-2 border border-sky-400  rounded-sm mb-4">

<label for="cpassword" class="text-[18px] text-gray-700">Confirm password</label>
<input type="password" name="cpassword" placeholder="confirm your password" class="p-2 border border-sky-400  rounded-sm mb-4">

<label for="phone" class="text-[18px] text-gray-700">phone</label>
<input type="number" name="phone" placeholder="enter your phone number with country code" class="p-2 border border-sky-400  rounded-sm mb-4">

<div class="flex items-center mb-2">
    <input type="checkbox" name="rules" id="checkTerms" class="w-4 h-4"><span class="text-slate-800 ml-2"><a href="terms.php">Agree with mobile door terms and conditions</a></span>
</div>
<button type="submit" name="submit" class="p-3 bg-green-600 text-white text-[18px] hover:bg-pink-500">Sign up</button>
</form>
<div class="mt-6 mx-auto max-w-[400px]"> 
<p class="p-2 text-slate-600">Already have an account? <a href="login.php" class="hover:text-blue-500">login</a></p>
<!-- <p class="p-2 text-slate-600">forgot password? <a href="reset-pass.php" class="hover:text-blue-500">reset here</a></p> -->
</div>
</div>

<?php include 'footer.php' ?>
