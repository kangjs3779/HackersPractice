<?php
//DB연결하는 파일
include_once $_SERVER['DOCUMENT_ROOT'] . "/key.php";

//중복확인 세션 변수
$_SESSION['check'] = false;

//post로 받은 값을 변수에 넣어줌
$idInput = $_POST['idInput'];

//아이디 중복 체크
$sql = "SELECT * FROM member WHERE username = '{$idInput}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if(!$row) {
    //중복된 아이디가 없으면
    $_SESSION['check'] = true;
}

//값을 JSON으로 변환함
$responseData = [
    'check' => $_SESSION['check'],
];

//http header에 정보를 보내준다
//application/json타입으로 보내준다
header('Content-Type: application/json');

//해당 데이터를 json으로 변환한다
echo json_encode($responseData);


