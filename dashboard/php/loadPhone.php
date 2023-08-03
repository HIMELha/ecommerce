<?php

include 'config.php';

$sql = "SELECT mobiles.*, mobiles.id AS pid, categories.* 
        FROM mobiles 
        JOIN categories ON categories.id = mobiles.cid 
        ORDER BY pid DESC ";
$result = mysqli_query($conn, $sql);
$output = '';

if(mysqli_num_rows($result)){
    $output .= '<div class="relative mb-8 overflow-x-auto overflow-auto ">
                <table class=" text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                pid
                            </th>
                            <th scope="col" class="px-6 py-3">
                                name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                stitle
                            </th>
                            <th scope="col" class="px-6 py-3">
                                price
                            </th>
                            <th scope="col" class="px-6 py-3 ">
                                desc
                            </th>
                            <th scope="col" class="px-6 py-3 ">
                                htis
                            </th>
                            <th scope="col" class="px-6 py-3 ">
                                image
                            </th>
                            <th scope="col" class="px-6 py-3">
                                category
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>';
    while($row = mysqli_fetch_assoc($result)){
        $desc = $row['p_desc'];
        $desc = substr($desc, 0, 25) . '...';
        $output .= '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                '.$row['pid'].'
                            </th>
                            <td class="px-6 py-4">
                                '.$row['name'].'
                            </td>
                            <td class="px-6 py-4">
                                '.$row['stitle'].'
                            </td>
                            <td class="px-6 py-4">
                              '.$row['price'].'
                            </td>
                            <td class="px-6 py-4">
                               '.$desc.'
                            </td>
                            <td class="px-6 py-4">
                               '.$row['hits'].'
                            </td>
                            <td class="px-6 py-4">
                               <img src="../'.$row['image'].'" alt="" srcset="" class="w-10 h-10">
                            </td>
                            <td class="px-1 py-4">
                               '.$row['cname'].'
                            </td>
                            <td class="px-6 py-4 flex flex-col justify-center items-center gap-2">
                                <button data-path="'.$row['pid'].'" id="edit-phone" class="px-3 text-white bg-pink-500 hover:bg-pink-400 rounded-sm">Edit</button>
                                <button data-path="'.$row['pid'].'" id="delProduct" class="px-3 ml-2 text-white bg-red-500 hover:bg-red-400 rounded-sm">Delete</button>
                            </td>
                        </tr>  ';
    }
    $output .= '</tbody>
             </table>
            </div>';
}else{
    echo "<h2 class='text-xl text-center p-4'> No records found </h2>";
}
echo $output;


?>