<?php
include_once $_SERVER['DOCUMENT_ROOT']. '/commonFile/session.php';

//이런 회원정보가 세션에 저장됨(DB같은거)
$_SESSION['userList'] = array(
    'test111', 'test222', 'test333'
);

//중복확인 세션 변수
$_SESSION['check'] = false;

//post로 받은 값을 변수에 넣어줌
$idInput = $_POST['idInput'];

//아이디 중복 체크
if(!in_array($idInput, $_SESSION['userList'])) {
    //사용자가 입력한 아이디가 세션에 저장된 아이디와 같은게 없으면
    $_SESSION['check'] = true;
}

//session값을 JSON으로 변환함
$responseData = [
    'check' => $_SESSION['check']
];

//http header에 정보를 보내준다
//application/json타입으로 보내준다
header('Content-Type: application/json');
//해당 데이터를 json으로 변환한다
echo json_encode($responseData);