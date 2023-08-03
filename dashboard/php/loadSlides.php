<?php
include 'config.php';

$sql = "SELECT * FROM slides";
$result = mysqli_query($conn, $sql);
$output = '';

if(mysqli_num_rows($result) > 0){
    $output .= '<div class="relative overflow-x-auto">
                <table class=" text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                sid
                            </th>
                            <th scope="col" class="px-6 py-3">
                               phone name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                stitle
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                image
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>';
    while($row = mysqli_fetch_assoc($result)){
        $output .= '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            '.$row['id'].'
                        </th>
                        <td class="px-6 py-4">
                            '.$row['pname'].'
                        </td>
                        <td class="px-6 py-4">
                            '.$row['stext'].'
                        </td>
                        <td class="px-6 py-4">
                            <img src="../'.$row['image'].'" alt="" srcset="" class="w-10 h-10">
                        </td>
                        <td class="px-6 py-4 ">
                            <button data-path="'.$row['id'].'" id="edit-slide-btn" class="px-3 text-white bg-pink-500 hover:bg-pink-400 rounded-sm">Edit</button>
                            <button  data-path="'.$row['id'].'" id="delSlides" class="px-3 ml-2 text-white bg-red-500 hover:bg-red-400 rounded-sm">Delete</button>
                        </td>
                    </tr> ';
    }
    $output .= '</tbody>
                </table>
            </div>';
}

echo $output;




?>