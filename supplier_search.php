<?php

include "connect.php";

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo json_encode(array());
    exit();
}

$result = mysqli_query($con, "SELECT * FROM supplier WHERE SupplierName LIKE '%$id%'");

$data = array();

while ($row = mysqli_fetch_array($result)) {
    $data[] = $row;
}
echo json_encode($data);

mysqli_close($con);


?>