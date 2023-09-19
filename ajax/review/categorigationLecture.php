<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/key.php";
//print_r($_GET);
$categorization = $_GET['categorization'];

$sql = "SELECT * FROM lecture WHERE categorization = {$categorization}";
$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);

$record = array();

for($i = 0; $i < $num_rows; $i++) {
    $row = mysqli_fetch_array($result);
    $record[$i] = $row;
}

//값을 JSON으로 변환함
//$responseData = [
//    'mode' => $_GET['categorization'],
//];

//http header에 정보를 보내준다
//application/json타입으로 보내준다
header('Content-Type: application/json');

//해당 데이터를 json으로 변환한다
echo json_encode($record);
