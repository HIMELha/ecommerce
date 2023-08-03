<?php 
    session_start(); 
    if(!isset($_SESSION['admin'])){
    header('location: login.php');
    }
    include 'php/config.php';
    include 'header.php';
    date_default_timezone_set("Asia/Dhaka");
    $time = date('h:m A');
    $time = 'last updated on' . $time;
?>
    <section class="home">
        <header>
            <div><h2>Dashboard</h2></div>
            <div class="fa-solid fa-bars dash-bar"></div>
            <div class="badges">
                <i class="fa-solid fa-envelope"></i>
                <i class="fa-solid fa-bell"></i>
                <div class="profile"><img src="images/profile.jpg" alt=""></div>
            </div>
        </header>


    <!-- body contents -->

    <div class="contents p-2 px-8 ">
        <div class="cards m-4">
            <div class="card">
                <div>
                <div class="head">
                    <?php
                    $result0 = mysqli_query($conn, "SELECT price FROM orders");
                    if(mysqli_num_rows($result0) > 0){
                        $sells = 0;
                        while($row0 = mysqli_fetch_assoc($result0)){
                            $sells += $row0['price'] + $sells;
                        }
                        echo '<h2>BDT '.$sells.'</h2> 
                              <h2 class="text-blue-100">Sells</h2>';
                    }
                    
                    ?>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-arrow-trend-up"></i>
                </div>
                </div>
                <hr>
                <p class="para"><?php echo $time; ?></p>
            </div>

            <div class="card" id="green">
                <div>
                <div class="head">
                    <?php
                    $result1 = mysqli_query($conn, "SELECT hits FROM mobiles");
                    if(mysqli_num_rows($result1) > 0){
                        $imp = 0;
                        while($row1 = mysqli_fetch_assoc($result1)){
                            $imp += $row1['hits'] + $imp;
                        }
                        echo '<h2>hits: '.$imp.'</h2> 
                              <h2 class="">Impressions</h2>';
                    }
                    
                    ?>
                </div>
                <div class="icon">
                   <i class="fa-solid fa-eye"></i>
                </div>
                </div>
                <hr>
                <p class="para"><?php echo $time; ?></p>
            </div>

            <div class="card" id="violate">
                <div>
                <div class="head">
                    <?php
                    $result2 = mysqli_query($conn, "SELECT * FROM users");
                    if(mysqli_num_rows($result2) > 0){
                        
                        echo '<h2>Total: '.mysqli_num_rows($result2).'</h2> 
                              <h2 class="">users</h2>';
                    }
                    
                    ?>
                </div>
                <div class="icon">
                   <i class="fa-solid fa-user-plus"></i>
                </div>
                </div>
                <hr>
                <p class="para"><?php echo $time; ?></p>
            </div>

            <div class="card" id="red">
                <div>
                <div class="head">
                    <?php
                    $result3 = mysqli_query($conn, "SELECT * FROM orders WHERE status = 'proccess'");
                    if(mysqli_num_rows($result3) > 0){
                        echo '<h2>'.mysqli_num_rows($result3).' orders</h2> 
                              <h2 class="">in pending</h2>';
                    }else{
                        echo '<h2>No</h2> 
                              <h2 class="">pending orders</h2>';
                    }
                    
                    ?>
                </div>
                <div class="icon">
                   <i class="fa-sharp fa-solid fa-file-signature"></i>
                </div>
                </div>
                <hr>
                <p class="para">
                    <?php echo $time; ?>
                </p>
            </div>

        </div>


        <div class="summery mb-16">

            <div class="charts m-4">
                <img src="images/chart-icon.png" alt="">
                <h2>All data in last month</h2>
            </div>

        </div>

        </div>
<?php include 'footer.php' ?>
    </section>