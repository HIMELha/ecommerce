<?php 
include 'php/config.php';
include 'header.php';?>

<div class="categories mb-10 container mx-auto max-w-[1200px]">
<h2 class="py-3 text-center text-2xl text-gray-800">categories and brands</h2>
<div class="max-w-[400px] mx-auto">
    <ul>
        <?php
        $run = mysqli_query($conn, 'SELECT * FROM categories');
        if(mysqli_num_rows($run) > 0){
            while($row = mysqli_fetch_assoc($run)){
                echo '<li class="py-3"><a href="search-and-view.php?brands='.$row['cname'].'" class="p-2 text-slate-700 hover:text-sky-400 text-xl bg-gray-200 ">'.$row['cname'].'(<span>'.$row['cmobile'].'</span>)</a></li>';
            }
        }else{
            echo "<h2 class='text-center text-xl'> no categories found </h2>";
        } 
        ?>
    </ul>
</div>
</div>

<?php include 'footer.php' ?>