<?php

include "connect.php";

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

$result = mysqli_query($con, "  SELECT m.MovementNo,i.ItemName,m.MoveQty,c.CustomerName
                                FROM movement m,item i,customer c,document d
                                WHERE d.movementcode = 'SOO' AND m.refno = d.refno AND m.itemno = i.itemno 
                                AND d.customerno = c.customerno AND m.movementno 
                                NOT IN (SELECT movementno FROM delivery)");

$data = array();

while ($row = mysqli_fetch_array($result)) {
    $data[] = $row;
}
echo json_encode($data);
mysqli_close($con);
