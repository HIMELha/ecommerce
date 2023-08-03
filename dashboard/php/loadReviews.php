<?php
include 'config.php';


$sql = "SELECT * FROM reviews ORDER BY rid DESC";
$result = mysqli_query($conn, $sql);
$output = '';

if(mysqli_num_rows($result) > 0){
    $output .= '<div class="relative overflow-x-auto">
                <table class=" text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                               rid
                            </th>
                            <th scope="col" class="px-6 py-3">
                               username
                            </th>
                            <th scope="col" class="px-6 py-3">
                                pid
                            </th>
                            <th scope="col" class="px-6 py-3">
                               comment
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                               rating
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
                           '.$row['rid'].'
                        </th>
                        <td class="px-6 py-4">
                             '.$row['uname'].'
                        </td>
                        <td class="px-6 py-4">
                             '.$row['pid'].'
                        </td>
                        <td class="px-6 py-4">
                             '.$row['rtext'].'
                        </td>
                        <td class="px-6 py-4">
                             '.$row['rating'].' out of 5
                        </td>

                        <td class="px-6 py-4 flex  flex-col justify-center items-center gap-2">
                             <button data-path="'.$row['rid'].'" id="delReviews" class="px-3 ml-2 text-white bg-red-500 hover:bg-red-400 rounded-sm">Delete</button>
                        </td>
                    </tr>';
    }
    $output .= '</tbody>
                </table>
            </div>';
}
echo $output;
?>