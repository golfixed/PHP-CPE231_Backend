<?php

include "connect.php";

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

if (isset($_GET['qty'])) {
    $qty = $_GET['qty'];
} else {
    echo json_encode(array());
    exit();
}
if (isset($_GET['employee'])) {
    $employee = $_GET['employee'];
} else {
    echo json_encode(array());
    exit();
}
if (isset($_GET['itemno'])) {
    $itemno = $_GET['itemno'];
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

$date = date("Y-m-d");
if (mysqli_query($con, "  INSERT INTO physicalcount (
                                                    Location,ItemNo,CountQty,CountDate,EmployeeNo)
                                                    VALUES($location,$itemno,$qty,'$date',$employee)")) {
    $save = "success";
}
else {
    $save = "Error! Data not save to the DB";
}
echo json_encode($save);

mysqli_close($con);

?>