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
error_reporting(0);

if($type == 'POO'){
    $sql="SELECT DISTINCT d.*,m.*,i.*,e.*,s.*,c*,
    FROM document d,movementdetail m,item i,supplier s,customer c,returndetail r,employee e
    WHERE d.movementcode = m.movementcode AND d.itemno = i.itemno AND s.supplierno = d.supplierno 
    AND d.docno=$docno AND d.movementcode = '$type' AND e.employeeno = d.employeeno";
}elseif($type == 'PRT'){
    $sql="SELECT DISTINCT d.*,m.*,i.* FROM document d,movementdetail m,item i,supplier s,customer c,returndetail r
    WHERE d.movementcode = m.movementcode AND d.itemno = i.itemno AND s.supplierno = d.supplierno AND r.returnno = d.returnno
    AND d.docno=$docno AND d.movementcode = '$type' AND e.employeeno = d.employeeno";

}elseif($type== 'SOO'){
    $sql="SELECT DISTINCT d.*,m.*,i.* FROM document d,movementdetail m,item i,supplier s,customer c,returndetail r
    WHERE d.movementcode = m.movementcode AND d.itemno = i.itemno AND d.customerno = c.customerno 
    AND d.docno=$docno AND d.movementcode = '$type' AND e.employeeno = d.employeeno";

}elseif($type== 'SRT'){
    $sql="SELECT DISTINCT d.*,m.*,i.* FROM document d,movementdetail m,item i,supplier s,customer c,returndetail r
    WHERE d.movementcode = m.movementcode AND d.itemno = i.itemno AND d.customerno = c.customerno AND r.returnno = d.returnno
    AND d.docno=$docno AND d.movementcode = '$type' AND e.employeeno = d.employeeno";
}elseif($type =="WOR" || $doc == 'MOR'){
    $sql="SELECT DISTINCT d.*,m.*,i.* FROM document d,movementdetail m,item i,supplier s,customer c,returndetail r
    WHERE d.movementcode = m.movementcode AND d.itemno = i.itemno
    AND d.docno=$docno AND d.movementcode = '$type' AND e.employeeno = d.employeeno";
}else{
    $sql="SELECT DISTINCT d.*,m.*,i.* FROM document d,movementdetail m,item i,supplier s,customer c,returndetail r
    WHERE d.movementcode = m.movementcode AND d.itemno = i.itemno AND r.returnno = d.returnno
    AND d.docno=$docno AND d.movementcode = '$type' AND e.employeeno = d.employeeno";
}

$result = mysqli_query($con,$sql);

$data = array();

while ($row = mysqli_fetch_array($result)){
    $data[] = $row;
}

echo json_encode($data);

mysqli_close($con);


?>