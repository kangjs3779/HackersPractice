<?php
//include_once $_SERVER['DOCUMENT_ROOT']. '/commonFile/session.php';
session_start();

$phoneNum = $_POST['phoneNum'];

$_SESSION['phoneNum'] = $phoneNum;
$_SESSION['veriCode'] = 1234;

//session값을 JSON으로 변환함
$responseData = [
    'phoneNum' => $_SESSION['phoneNum'],
    'veriCode' => $_SESSION['veriCode']
];

header('Content-Type: application/json');
echo json_encode($responseData);


