<?php
include 'config.php';


$sql = "SELECT * FROM orders ORDER BY oid DESC";
$result = mysqli_query($conn, $sql);
$output = '';
$status = '';
if(mysqli_num_rows($result) > 0){
    $output .= '<div class="relative overflow-x-auto">
                <table class=" text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                               oid
                            </th>
                            <th scope="col" class="px-6 py-3">
                               username
                            </th>
                            <th scope="col" class="px-6 py-3">
                                product name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                address
                            </th>
                            <th scope="col" class="px-6 py-3">
                                phone no.
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                price
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                actions
                            </th>
                            
                        </tr>
                    </thead>
                    <tbody>';
    while($row = mysqli_fetch_assoc($result)){
        if($row['status'] == 'proccess'){
            $status = '<button data-path="'.$row['oid'].'" id="acp-order" class="px-3 text-white bg-pink-500 hover:bg-pink-400 rounded-sm">accept</button>
            <button data-path="'.$row['oid'].'" id="del-order" class="px-3 ml-2 text-white bg-red-500 hover:bg-red-400 rounded-sm">decline</button>';
        }else if($row['status'] == 'declined'){
            $status = '<button class="px-3 ml-2 text-red-600 bg-red-100 rounded-sm" disabled>declined</button>';
        }else if($row['status'] == 'completed'){
            $status = '<button class="px-3 ml-2 text-green-600 bg-green-100  rounded-sm" disabled>completed</button>';
        }
            $output .= '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           '.$row['oid'].'
                        </th>
                        <td class="px-6 py-4">
                             '.$row['uname'].'
                        </td>
                        <td class="px-6 py-4">
                             '.$row['products'].'
                        </td>
                        <td class="px-6 py-4">
                             '.$row['addresss'].'
                        </td>
                        <td class="px-6 py-4">
                             '.$row['phone'].'
                        </td>
                        <td class="px-6 py-4">
                            '.$row['price'].'
                        </td>
                        <td class="px-6 py-4 flex  flex-col justify-center items-center gap-2">
                            '.$status.'
                        </td>
                    </tr>';
    }
    $output .= '</tbody>
                </table>
            </div>';
}
echo $output;
?>