<?php

include 'config.php';

$sql = "SELECT * FROM categories ORDER BY cmobile DESC";
$result = mysqli_query($conn, $sql);
$output = '';
if(mysqli_num_rows($result)){
    $output .= '<div class="relative overflow-x-auto">
                <table class=" text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                cid
                            </th>
                            <th scope="col" class="px-6 py-3">
                                name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                mobile phones
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                actions
                            </th>
                        </tr>
                    </thead>
                    <tbody >';
    while($row = mysqli_fetch_assoc($result)){
        $output .= '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            '.$row['id'].'
                        </th>
                        <td class="px-6 py-4">
                            '.$row['cname'].'
                        </td>
                        <td class="px-6 py-4">
                            '.$row['cmobile'].'
                        </td>
                        <td class="px-6 py-4 flex gap-2 justify-center">
                            <button  id="editcategory" data-path="'.$row['id'].'" class="px-3 text-white bg-pink-500 hover:bg-pink-400 rounded-sm">Edit</button>
                            <button  id="del-cat" data-path="'.$row['id'].'" class="px-3 text-white bg-red-500 hover:bg-red-400 rounded-sm">Delete</button>
                        </td>
                    </tr>';
    }
    $output .= '</tbody>
             </table>
            </div>';
}

echo $output;


?>