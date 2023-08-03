<?php 
session_start();
if(!isset($_SESSION['username'])){
    header('location: login.php');
    exit();
}
include 'header.php';?>

<div class="carts mb-10 container mx-auto max-w-[1200px]">
   <h2 class="text-center p-4 text-xl text-gray-700">Order history</h2>
   
   <div class="flex flex-col justify-center w-full">
         <div class="flex justify-center">

            <div class="relative overflow-x-auto">
                <table class=" text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                               order id
                            </th>
                            <th scope="col" class="px-6 py-3">
                                product name
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                price
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                address
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                actions
                            </th>
                            
                        </tr>
                    </thead>
                    <tbody>

                    <?php

                    include 'php/config.php';
                    $uname = $_SESSION['username'];
                    $sql = "SELECT * FROM orders WHERE uname = '$uname' order by oid desc";

                    $result = mysqli_query($conn, $sql);
                    $status = '';
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            if($row['status'] == 'proccess'){
                                $status = '<a href="del-order.php?id='.$row['oid'].'"><button id="del-cat" class="px-3 ml-2 text-white bg-red-500 hover:bg-red-400 rounded-sm">cancel</button></a>';
                            }else if($row['status'] == 'declined'){
                                $status = '<button class="px-3 ml-2 text-red-600 bg-red-100 rounded-sm" disabled>order cancel</button>';
                            }else if($row['status'] == 'completed'){
                                $status = '<button class="px-3 ml-2 text-green-600 bg-green-100  rounded-sm" disabled>completed</button>';
                            }
                        echo '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                '.$row['oid'].'
                            </th>
                            <td class="px-6 py-4">
                                '.$row['products'].'
                            </td>
                            <td class="px-6 py-4">
                                '.$row['price'].'BDT
                            </td>
                            <td class="px-6 py-4">
                                '.$row['addresss'].'
                            </td>
                            <td class="px-6 py-4 ">
                                '.$status.'
                            </td>
                        </tr>';
                        }
                    }else{

                    }

                    ?>
                              
                    </tbody>
                </table>
            </div>

        </div>
   </div>
</div>


<?php include 'footer.php' ?>
