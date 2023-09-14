<?php
session_start();

$phoneNum = $_POST['phoneNum'];

//session에 값을 저장함
$_SESSION['phoneNum'] = $phoneNum;
$_SESSION['test'] = 123;
$_SESSION['veriCode'] = '1234';

//session값을 JSON으로 변환함
$responseData = [
    'phoneNum' => $_SESSION['phoneNum'],
    'veriCode' => $_SESSION['veriCode']
];

//http header에 정보를 보내준다
//application/json타입으로 보내준다
header('Content-Type: application/json');
//해당 데이터를 json으로 변환한다

if(!empty($phoneNum)) {
    echo json_encode($responseData);
}