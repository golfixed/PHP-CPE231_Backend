<?php

include "connect.php";

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

$result = mysqli_query($con, "SELECT *,COUNT(MovementCode) AS Reccord FROM document GROUP BY MovementCode,DocNo");

$data = array();

while ($row = mysqli_fetch_array($result)) {
    $data[] = $row;
}
echo json_encode($data);

mysqli_close($con);
