<?php

include("connect.php");

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

$result = mysqli_query($con, "SELECT md.MovementReason,m.MovementNo,d.DocNo,d.RefNo,i.ItemNo,i.ItemName,m.MoveQty,
m.Location,e.EmployeeName,m.MoveDate, e.EmployeeNo
FROM item i,movement m,employee e,document d,movementdetail md
WHERE m.employeeno = e.employeeno AND m.refno = d.refno AND e.employeeno = m.employeeno
AND m.itemno = i.itemno AND md.movementcode = d.movementcode");

$data = array();

while ($row = mysqli_fetch_array($result)) {
    $data[] = $row;
}

echo json_encode($data);
mysqli_close($con);

?>