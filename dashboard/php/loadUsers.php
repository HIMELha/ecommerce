<?php
include 'config.php';


$sql = "SELECT * FROM users ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
$output = '';
$status = '';
if(mysqli_num_rows($result) > 0){
    $output .= '<div class="mb-16 relative overflow-x-auto">
                <table class=" text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                id
                            </th>
                            <th scope="col" class="px-6 py-3">
                                name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                phone
                            </th>
                            <th scope="col" class="px-6 py-3">
                                address
                            </th>
                            <th scope="col" class="px-6 py-3">
                                profile
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>';
    while($row = mysqli_fetch_assoc($result)){
        if($row['status'] == 'normal'){
            $status = '<button data-path="'.$row['id'].'" id="sus-user" class="px-3 ml-2 bg-red-600 text-white hover:bg-red-500 rounded-sm">Suspend User</button>';
        }else if($row['status'] == 'suspended'){
            $status = '<button class="px-3 ml-2 text-red-600 bg-red-100 rounded-sm" disabled>user suspended</button> 
            <button data-path="'.$row['id'].'" id="unsus-user" class="px-3 ml-2 bg-green-600 text-green-200 rounded-sm">unsuspended</button>';
        }
            $output .= '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                '.$row['id'].'
                            </th>
                            <td class="px-6 py-4">
                                '.$row['uname'].'
                            </td>
                            <td class="px-6 py-4">
                                '.$row['email'].'
                            </td>
                            <td class="px-6 py-4">
                                '.$row['phone'].'
                            </td>
                            <td class="px-6 py-4">
                                '.$row['addres'].'
                            </td>
                            <th scope="col" class="px-6 py-3">
                                <img src="../'.$row['image'].'" class="w-10 h-10 rounded-md" >
                            </th>
                            <td class="px-6 py-4 flex flex-col gap-2 justify-center">
                                '.$status.'
                            </td>
                        </tr> ';
    }
    $output .= '   </tbody>
                </table>
            </div>';
}
echo $output;
?>