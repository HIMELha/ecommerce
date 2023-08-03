<?php 
  include 'php/config.php';
  include 'header.php';
?>


<div class="search-product mb-10 container mx-auto max-w-[1200px]">
<div class="flex flex-col justify-center md:flex-row gap-4">
<div>
  <?php 
  if(isset($_REQUEST['brands'])){
    $brand = $_REQUEST['brands'];
    $sql0 = "SELECT *, mobiles.id AS pid FROM mobiles 
    JOIN categories ON mobiles.cid = categories.id 
    WHERE  categories.cname = '$brand' ORDER BY mobiles.name ASC";
    $result0 = mysqli_query($conn, $sql0);
    if(mysqli_num_rows($result0)  == 0){
      echo '<h2 class="p-3 mt-4 text-center text-gray-700 text-2xl"> no records found for '.$brand.'</h2>';
    }else{
      echo '<h2 class="p-3 mt-4 text-center text-gray-700 text-2xl"> '.$brand.' mobile phones</h2>';
     }}
  ?>
  
<div class="p-4 w-[200px]">
    <!-- <h3 class="py-2 px-1 text-slate-800 text-[19px]">select price range</h3>
<p>
  <label for="amount">Price range:</label>
  <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
</p>
 
<div id="slider-range"></div> -->
</div>

<div class="p-4 w-[200px]">
    <h3 class="py-2 px-1 text-slate-800 text-[19px]">select brands</h3>
    <ul class="border-l-2 border-orange-600">
        <?php
        $run = mysqli_query($conn, 'SELECT * FROM categories');
        if(mysqli_num_rows($run) > 0){
            while($row = mysqli_fetch_assoc($run)){
                echo ' <li class="py-1 px-2"><a href="search-and-view.php?brands='.$row['cname'].'" class="p-2 text-center text-gray-700 hover:text-sky-600 hover:bg-gray-100 ">'.$row['cname'].'</a></li>';
            }
        }else{
            echo "<h2 class='text-center text-xl'> no categories found </h2>";
        } 
        ?>       
    </ul>
</div>


</div>

<div class="p-4 flex  flex-col flex-1 gray-100">
<div class="flex flex-col">
    
    <div class="filters p-2 flex justify-start items-center md:gap-6 sm:gap-2">
       <div>
      <label for="type">type</label>
    <select name="type" id="" class="p-2 bg-sky-200">
      <option value="" selected>Select type</option>
      <option value="" selected>Gaming</option>
      <option value="" selected>camera</option>
    </select>
       </div>

      <div>
      <label for="type">sorts</label>
    <select name="type" id="" class="p-2 bg-sky-200">
      <option value="" selected>Select sorts</option>
      <option value="" selected>most popular</option>
      <option value="" selected>top searches</option>
    </select>
       </div>
       <div>
        <button class="p-2 px-4 bg-pink-500 hover:bg-purple-600 text-white rounded-md"><i class="fa-solid fa-search text-white mr-2"></i>Find</button>
       </div>
    </div>
</div>

<div class="products p-2 mb-2 grid gap-4 lg:gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
  
   <?php
     if(isset($_REQUEST['brands'])){
      if(mysqli_num_rows($result0) > 0){
    while($row = mysqli_fetch_assoc($result0)){
      echo '<div class="max-w-[300px] min-w-[280px] flex flex-col justify-between py-2 px-3 mx-auto border border-gray-200 ">
   <div id="product-image" class="width-[280px] flex justify-center ">
    <img  src="'.$row['image'].'" alt="" srcset="" class="max-w-[280] min-h-min ">
    <div id="p-btns" class="flex flex-col gap-8">

      <button data-path="'.$row['id'].'" id="addWish" class="w-10 h-10 bg-sky-500 text-white border hover:text-yellow-600 hover:bg-slate-200 hover:border-yellow-500  rounded-full"><i class="text-xl fa-regular fa-heart"></i></button>
      <a href="view-phone.php?pid='.$row['pid'].'"><button class="w-10 h-10 bg-sky-500 text-white border hover:text-yellow-600 hover:bg-slate-200 hover:border-yellow-500  rounded-full"><i class="text-xl fa-solid fa-eye"></i></button></a>
    </div>
   </div>
   <div class="p-3">
   <div class="flex justify-between items-center">
    <a href="view-phone.php?pid='.$row['pid'].'"><h2 class="text-xl text-gray-700 py-2">'.$row['name'].'</h2></a>
    <button class="text-yellow-500"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i></button>
   </div>
   <div class="flex justify-between items-center mt-3">
    <h3 class="text-xl text-gray-700">'.$row['price'].'<span class="text-md text-red-500">BDT</span></h3>
    <button data-path="'.$row['pid'].'" id="addCart" class="p-2 px-4 bg-green-500 text-white rounded-sm">Add to Cart</button>
   </div>
   </div>
  </div>';
    }
   }else{
     echo "<h2 class='text-center mt-10 text-xl'> no records found </h2>";
   }
     }
 
   ?>



  </div>
</div>
</div>
</div>

<!--  footer starts here  -->
<?php include 'footer.php' ?>
<!-- footer ends here -->

