<?php
    session_start(); 
    if(!isset($_SESSION['admin'])){
    header('location: login.php');
    }
    include 'header.php' 
?>
    <section class="home">
        <header>
            <div><h2>products</h2></div>
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
          <h2 class="text-xl text-gray-800 py-2 px-5">Products</h2>
          <button id="add-product" class="btn" >Add New Products</button>
        </div>


        <!-- all hidden fields here -->
        <div id="add-product-modal" class="flex justify-center items-center absolute top-0 left-0 right-0 w-full min-h-full bg-[#86868699] z-50 hidden">
            <form id="addProducts" method="POST" enctype="multipart/form-data" class="p-4 pb-8  absolute xs:w-[350px] sm:w-[500px]  h-full overflow-x-auto bg-white rounded-sm">
             <h2 class="text-xl py-2">Add new Product</h2>
             <i id="close" class="fa-solid fa-close absolute top-6 right-4 text-xl text-slate-700 hover:text-sky-500 cursor-pointer"></i>
             <div class="flex flex-col justify-start max-w-[340px] mx-auto">
                <label for="pName" class="text-[17px] ">product Name</label>
                <input type="text" name="pName" id="pName" placeholder="product name" class="px-2 py-1 mt-1 mb-2 border border-sky-600 rounded-sm">
                <label for="title" class="text-[17px] ">product title</label>
                <input type="text" name="title" id="title" placeholder="product title" class="px-2 py-1 mt-1 mb-2 border border-sky-600 rounded-sm">
                <label for="price" class="text-[17px] ">price</label>
                <input type="number" name="price" id="price" placeholder="product price" class="px-2 py-1 mt-1 mb-2 border border-sky-600 rounded-sm">
                <label for="desc" class="text-[17px] ">description</label>
                <textarea name="desc" id="desc" placeholder="product description" class="px-2 py-1 mt-1 mb-2 border border-sky-600 rounded-sm" ></textarea>
                <label for="category" class="text-[17px] text-gray-700">Select category</label>
                <select name="category" id="Addcategory" class="p-2">
                    
                </select>
                <label for="image" class="text-[17px] ">Select image</label>
                <input type="file" name="image" id="image" class="p-2">

                <button type="submit" class="btn mt-2">Save</button>
             </div>
            </form>
        </div>

        <div id="edit-product-modal" class="flex justify-center items-center absolute top-0 left-0 right-0 w-full min-h-full bg-[#86868699] z-50 hidden">
            <form id="editProducts" method="POST" enctype="multipart/form-data" class="p-4 pb-8  absolute xs:w-[350px] sm:w-[500px] h-full overflow-x-auto bg-white rounded-sm">
             

            </form>
        </div>
        <!-- all hidden fields end -->

        <div id="Phoneload" class="flex justify-center mb-16">
      
        </div>
    </div>   
<?php include 'footer.php' ?>
    </section>

