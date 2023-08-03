<?php
    session_start(); 
    if(!isset($_SESSION['admin'])){
    header('location: login.php');
    }
    include 'header.php' 
?>
    <section class="home">
        <header>
            <div><h2>settings</h2></div>
            <div class="fa-solid fa-bars dash-bar"></div>
            <div class="badges">
                <i class="fa-solid fa-envelope"></i>
                <i class="fa-solid fa-bell"></i>
                <div class="profile"><img src="images/profile.jpg" alt=""></div>
            </div>
        </header>

    <div class="contents p-2">
        
        <div class="px-6 py-2 flex justify-between items-center min-h-full">
          <h2 class="text-xl text-red-600 py-2 px-5 bg-white">জত এরর খাইসি তাতে সেতিং পেজ দুনামিক করা বিলাসিতা 😅😄</h2>
          
        </div>

<?php include 'footer.php' ?>
    </section>