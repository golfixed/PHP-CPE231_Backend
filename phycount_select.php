<?php

include "connect.php";

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

if (isset($_GET['no'])) {
    $no = $_GET['no'];
} else {
    echo json_encode(array());
    exit();
}
if (isset($_GET['location'])) {
    $location = $_GET['location'];
} else {
    echo json_encode(array());
    exit();
}

$result = mysqli_query($con, "  SELECT iv.ItemNo,iv.Location,i.ItemName,iv.OnHandQty
                                FROM item i,inventory iv
                                WHERE i.itemno = iv.itemno AND iv.itemno=$no AND iv.location=$location");

$data = array();

while ($row = mysqli_fetch_array($result)) {
    $data[] = $row;
}
echo json_encode($data);

mysqli_close($con);


?>