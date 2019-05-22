<?php

include "connect.php";

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

if (isset($_GET['docno'])&&isset($_GET['type'])) {
    $docno = $_GET['docno'];
    $type = $_GET['type'];
} else {
    echo json_encode(array());
    exit();
}

$sql =  "SELECT d.*, m.*, e.*,COUNT(*) AS Reccord FROM document d,movementdetail m,employee e
        WHERE d.DocNo=$docno AND d.movementcode=m.movementcode AND e.employeeno = d.employeeno
        AND d.movementcode = '$type'
        GROUP BY d.MovementCode,d.DocNo";

$result = mysqli_query($con,$sql);

$data = array();

while ($row = mysqli_fetch_array($result)) {
    $data[] = $row;
}

echo json_encode($data);

mysqli_close($con);


?>