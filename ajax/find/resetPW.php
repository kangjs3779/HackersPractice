<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/key.php";
session_start();

// PUT 요청 데이터 읽기
$input_data = file_get_contents('php://input');

// JSON 형식의 데이터를 PHP 배열로 파싱
$data = json_decode($input_data, true);

$newPassword = $data['password'];
$newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
$memberId = $_SESSION['memberId'];
$check = false;


$sql = "UPDATE member
        SET
            password = '{$newPasswordHash}'
        WHERE
            id = '{$memberId}'";


$result = mysqli_query($conn, $sql);

if($result) {
    $check = true;
}

//값을 JSON으로 변환함
$responseData = [
    'check' => $check,
];


//해당 데이터를 json으로 변환한다
header('Content-Type: application/json');
echo json_encode($responseData);

