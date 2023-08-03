<?php 
session_start();
include 'header.php';

if(isset($_SESSION['username'])){
  $uname = $_SESSION['username'];
}else{
  $uname = 'anonymous';
}
?>
<div id="details" class="details mb-10 container mx-auto max-w-[1200px]">

<?php
include 'php/config.php';
$id = $_REQUEST['pid'];

$query1 = mysqli_query($conn, "SELECT * FROM categories JOIN mobiles ON mobiles.cid = categories.id 
WHERE mobiles.id = $id");
$qrow = mysqli_fetch_assoc($query1);
$category = $qrow['cname'];


$sql = "SELECT * FROM mobiles WHERE id = $id";
$result = mysqli_query($conn, $sql);
$output = '';

if (mysqli_num_rows($result) > 0) {
    $output = ''; 
    foreach ($result as $row) {
      $mobile = $row['name'];
    $output .= '
     <h2 class="text-center mb-6 p-3 text-md text-sky-800"><a href="index.php">Home</a> / <a href="search-and-view.php?brands='.$category.'">'.$category.'</a> / <span class="text-gray-700 text-[22px]">'.$mobile.'</span> </h2>
   <div class="flex  flex-col md:flex-col sm:justify-center  sm:flex-col lg:flex-row gap-4">
      <div class="image max-w-[700px] md:max-w-[500px] md:min-w-[400px]">
        <img src="'.$row['image'].'" class="w-full" alt="">
      </div>
      <div class="flex-1 p-3">
        <h2 class="py-2 text-2xl text-pink-500">'.$row['name'].' <span class="text-[20px] text-gray-600">('.$row['stitle'].')</span></h2>
        <p class="text-md text-gray-800 py-3"><span class="text-2xl text-slate-700">'.$row['price'].'</span> BDT</p>

        <h4 class="text-xl text-gray-900 ">
         '.$row['p_desc'].'
        </h4>

        <div class="mt-10 py-4 flex lg:gap-4 gap-4">
          <button id="addCart" data-path='.$row['id'].' class="py-2 px-6 border-2 border-orange-600 bg-orange-600 text-white hover:bg-white hover:text-orange-600 rounded-full">Add to cart<i class="fa-solid fa-cart-shopping ml-2"></i></button>
          <button id="addWish" data-path='.$row['id'].' class="py-2 px-6 border-2 border-orange-600 bg-orange-600 text-white hover:bg-white hover:text-orange-600 rounded-full">Add to wishlists<i class="fa-regular fa-heart ml-2"></i></button>
        </div>
      </div>
   </div> 
    ';
    }
} else {
    $output .= '<h2 class="p-2 text-2xl text-center text-gray-600">No mobiles found</h2>';
}
echo $output;
?>

   <div class="review mb-10 container mx-auto max-w-[1200px]">
    <h2 class="text-gray-800 text-2xl text-center p-4 border-b border-green-600">Reviews</h2>
    <div class="reviews px-4 am:px-10 py-4 flex flex-col gap-4">
      <?php
      $sql1 = "SELECT * FROM reviews 
      JOIN users ON reviews.uname = users.uname 
      where pid = $id
      ORDER BY rid DESC";
      $result1 = mysqli_query($conn, $sql1);
 
      if(mysqli_num_rows($result1) > 0){
        while($row1 = mysqli_fetch_assoc($result1)){
          $star = $row1['rating'];
          $rating = '';
          if($star == 5){
          for ($i = 1; $i <= $star; $i ++ ){
            $rating .= '<i class="fa-solid fa-star"></i>';
          }
          }else if ($star == 4){
            for ($i = 1; $i <= $star; $i ++ ){
            $rating .= '<i class="fa-solid fa-star"></i>';
          }
            $rating .= '<i class="fa-regular fa-star"></i>';
          }else if ($star == 3){
            for ($i = 1; $i <= $star; $i ++ ){
            $rating .= '<i class="fa-solid fa-star"></i>';
          }
            $rating .= '<i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i>';
          }else if ($star == 2){
            for ($i = 1; $i <= $star; $i ++ ){
            $rating .= '<i class="fa-solid fa-star"></i>';
          }
            $rating .= '<i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i>';
          }else if ($star == 1){
            for ($i = 1; $i <= $star; $i ++ ){
            $rating .= '<i class="fa-solid fa-star"></i>';
          }
            $rating .= '<i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i>';
          }
          echo '<div class="comment flex gap-4 mt-4">
        <div class="w-14 h-14 sm:w-16 sm:h-16">
          <img src="'.$row1['image'].'" alt="" srcset="" class="h-full w-full rounded-full positon-center">
        </div>
        <div class="flex flex-1 justify-start items-start flex-col">
          <a href="" class="text-gray-700">'.$row1['uname'].'</a>
          <span class="text-orange-500"> 
           '.$rating.'
          </span>
          <p class="py-2 text-[18px] text-gray-700">'.$row1['rtext'].'</p>
        </div>
      </div>';
        }
      }else{
        echo "<h2 class='text-center text-xl mt-6'>write the first review for this product</h2>";
      }
      ?>

     <form id="submitReviews" action="php/review.php" method="POST" class="py-4 sm:ml-20 flex flex-col">
      <h2 class="text-xl text-gray-800 py-2">Write A review</h2>
      <input type="text" name="uname" value="<?php echo $uname ?>" hidden>
      <input type="number" name="pid"  value="<?php echo $id ?>" hidden>
      <textarea name="rtext" id="rtext"  class="p-2 border border-gray-500 w-[500px] h-[100px] resize-none rounded-sm" placeholder="write here..."></textarea>
      <label for="rating" class="text-gray-700 py-2">Select Rating</label>
      <select name="rat" id="rating" class="w-40 p-2">
        <option value="1" >1star</option>
        <option value="2">2star</option>
        <option value="3">3star</option>
        <option value="4">4star</option>
        <option value="5">5star</option>
      </select>

      <button id="btnReview" name="submit" type="submit" class="py-2 px-6 mt-3 text-center text-white w  max-w-[200px] bg-red-500 hover:bg-yellow-300 hover:text-red-600 rounded-sm shadow-md" disabled>Submit Review</button>
      </form>
      
      
      
    </div>

   </div>
</div>

<!--  footer from another file   -->
<?php include 'footer.php' ?>


