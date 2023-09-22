<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/key.php";
session_start();

//post로 받은 값을 변수에 넣어줌
$name = $_POST['name'];
$email = $_POST['email'];
$check = false;

//회원 찾기 찾기
$sql = "SELECT * FROM member WHERE email = '{$email}' and name = '{$name}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

//print_r($row == null);

if($row != null) {
    //조회된 회원 정보가 있으면
    $check = true;
}
//조회된 회원 정보가 없으면


if($row) {
    //조건에 맞는 아이디가 있으면
    //session에 아이디 저장하기
    $_SESSION['username'] = $row['username'];
    $_SESSION['memberId'] = $row['id'];
    $check = true;
}

//값을 JSON으로 변환함
$responseData = [
    'check' => $check,
];

//http header에 정보를 보내준다
//application/json타입으로 보내준다
header('Content-Type: application/json');

//해당 데이터를 json으로 변환한다
echo json_encode($responseData);
