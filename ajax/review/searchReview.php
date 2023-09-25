<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/key.php";

$category = $_GET['category'];
$type = $_GET['type'];
$search = $_GET['search'];

$lectureSQL = "lecture.title";
$writerSQL = "member.name";

$sql = "SELECT * FROM review
            JOIN lecture ON review.lectureId = lecture.id
            JOIN member ON review.memberId = member.id
            LEFT JOIN (SELECT id FROM review ORDER BY view DESC LIMIT 3) as best ON review.id = best.id
        WHERE lecture.categorization = {$category}
          AND best.id IS NULL
          AND ".($type == 1 ? $lectureSQL : $writerSQL)." LIKE '%".$search."%'";

$result = mysqli_query($conn, $sql);
$totalRow = mysqli_num_rows($result);

$record = array();

for($i = 0; $i < $totalRow; $i++) {
    $row = mysqli_fetch_array($result);
    $record[$i] = $row;
}

//print_r("이거".$paginationArr."임");
array_push($record, $paginationArr);

//print_r($_SERVER);
//print_r($sql);
//http header에 정보를 보내준다
//application/json타입으로 보내준다
header('Content-Type: application/json');

//해당 데이터를 json으로 변환한다
echo json_encode($record);
