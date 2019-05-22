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
$sql="UPDATE delivery SET deliverystatus = 'yes' WHERE movementno=$no";

$result = mysqli_query($con,$sql);

$data = array();

while ($row = mysqli_fetch_array($result)) {
    $data[] = $row;
}

echo json_encode($data);

mysqli_close($con);


?>