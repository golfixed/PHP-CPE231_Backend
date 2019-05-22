<?php

include("connect.php");

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

$result = mysqli_query($con, "SELECT CustomerNo, CustomerName FROM customer");
// $result2 = mysqli_query($con, "SELECT COUNT(CustomerNo) AS Count FROM customer");

$data = array();
// $data2 = array();

while ($row = mysqli_fetch_array($result)) {
    $data[] = $row;
}
// while ($count = mysqli_fetch_array($result2)) {
//     $data2[] = $count;
// }

echo json_encode($data);
// echo json_encode($data2);


mysqli_close($con);


?>