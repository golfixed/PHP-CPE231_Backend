<?php

include "connect.php";

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

if (isset($_GET['employee'])) {
    $employee = $_GET['employee'];
} else {
    echo json_encode(array());
    exit();
}
$sql="SELECT dv.DeliveryNo,d.DocNo,i.ItemName,c.CustomerName,c.CustomerAddress,c.CustomerPhone,c.CustomerEmail,dv.MovementNo,m.MoveQty
FROM delivery dv,item i,customer c,movement m, document d,employee e
WHERE dv.movementno = m.movementno AND m.refno = d.refno AND d.itemno = i.itemno 
AND d.customerno = c.customerno AND dv.deliverystatus = 'no' AND dv.employeeno=e.employeeno 
AND dv.employeeno = $employee";

$result = mysqli_query($con,$sql);

$data = array();

while ($row = mysqli_fetch_array($result)) {
    $data[] = $row;
}

echo json_encode($data);

mysqli_close($con);


?>