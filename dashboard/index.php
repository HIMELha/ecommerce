<?php 
session_start();
if(isset($_SESSION['admin'])){
  header('location: dashboard.php');
}
?>
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
<div class="login-account mb-10 container mx-auto max-w-[1200px]">

<form id="login-form" method="POST" class="p-4 m-4 flex flex-col max-w-[500px] mx-auto bg-slate-200 rounded-md">
  <h3 class="text-center text-gray-600 text-xl">Sign In</h3>
  <p>Demo login: admin@email.com</p>
  <p>Demo pass: 123456</p>
<label for="username" class="text-[18px] text-gray-700">Username</label>
<input id="uname" type="text" name="username" placeholder="enter your username" class="p-2 border border-sky-400  rounded-sm mb-4">

<label for="password" class="text-[18px] text-gray-700">password</label>
<input id="password" type="password" name="password" placeholder="enter your password" class="p-2 border border-sky-400  rounded-sm mb-4">

<button type="submit" name="submit" class="p-3 bg-sky-500 text-white text-[18px] hover:bg-green-500">Sign In</button>
</form>

</div>
<!-- Add this line before your custom JavaScript code -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="ajax.js"></script>
</body>
</html>