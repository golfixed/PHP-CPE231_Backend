<?php

include("connect.php");

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

$result = mysqli_query($con, "SELECT employeeno,employeename FROM employee WHERE position='staff' ");

$data = array();

while ($row = mysqli_fetch_array($result)) {
    $data[] = $row;
}

echo json_encode($data);
mysqli_close($con);

?>