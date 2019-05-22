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

$result = mysqli_query($con, "SELECT iv.ItemNo,i.ItemName,iv.Location,iv.OnHandQty,i.Unit,i.ItemType
                        FROM item i,inventory iv
                        WHERE i.itemno = iv.itemno AND i.itemname LIKE '%$id%'");

$data = array();

while ($row = mysqli_fetch_array($result)) {
    if($row['ItemType']=='FNG'){
        $row['ItemType']='Finished Goods';
    }else{
        $row['ItemType']='Raw Material';
    }
    $data[] = $row;
}
echo json_encode($data);

mysqli_close($con);


?>