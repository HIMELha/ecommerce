<?php
    session_start(); 
    if(!isset($_SESSION['admin'])){
    header('location: login.php');
    }
    include 'header.php' 
?>
    <section class="home">
        <header>
            <div><h2>slides</h2></div>
            <div class="fa-solid fa-bars dash-bar"></div>
            <div class="badges">
                <i class="fa-solid fa-envelope"></i>
                <i class="fa-solid fa-bell"></i>
                <div class="profile"><img src="images/profile.jpg" alt=""></div>
            </div>
        </header>



    <!-- body contents starts -->
    <div class="contents p-2">
        
        <div class="px-6 py-2 flex justify-between items-center">
          <h2 class="text-xl text-gray-800 py-2 px-5">Slides</h2>
          <button id="addSlides" class="btn">Add Slides</button>
        </div>


        <!-- all hidden fields here -->
        <div id="New-addSlides" class="flex justify-center items-center absolute top-0 left-0 right-0 w-full min-h-full bg-[#86868699] z-50 hidden">
            <form id="addSliders" method="POST" enctype="multipart/form-data" class="p-4 pb-8  absolute xs:w-[350px] sm:w-[500px] h-auto bg-white rounded-sm">
             <h2 class="text-xl py-2">Add new slides</h2>
             <i id="closed" class="fa-solid fa-close absolute top-6 right-4 text-xl text-slate-700 hover:text-sky-500 cursor-pointer"></i>
             <div class="flex flex-col justify-start max-w-[340px] mx-auto">
                <label for="pname" class="text-[17px] ">phone Name</label>
                <input type="text" id="pname" name="pname" placeholder="phone name" class="p-2 mt-1 border border-sky-600 rounded-sm">
                <label for="stitle" class="text-[17px] ">sort title</label>
                <input type="text" id="stitle" name="stitle" placeholder="sort title" class="p-2 mt-1 border border-sky-600 rounded-sm">
                <label for="image" class="text-[17px] ">Select image</label>
                <input type="file" name="image" id="image" class="p-2">
                <button type="submit" class="btn mt-2">Save</button>
             </div>
            </form>
        </div>

        <div id="editSlides" class="flex justify-center items-center absolute top-0 left-0 right-0 w-full min-h-full bg-[#86868699] z-50 hidden">
            <form id="editSlides-form" method="post" class="p-4 pb-8  absolute xs:w-[350px] sm:w-[500px] h-auto bg-white rounded-sm">

            </form>
        </div>
        <!-- all hidden fields end -->

        <div id="slides" class="flex justify-center mb-16">    
            
        </div>
    </div>

<?php include 'footer.php' ?>
    </section>