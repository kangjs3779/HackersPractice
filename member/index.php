<?php
// 모든 member include는 여기에 작성할 것
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . "/key.php";

//파라미터 값 가져오기
$mode = $_GET['mode'];

//모드의 값에 따라 다른 페이지 이름
$modeActions = [
    'step_01' => "./01_회원가입_01_약관동의.php",
    'step_02' => './01_회원가입_02_본인확인.php',
    'step_03' => './01_회원가입_03_정보입력.php',
    'complete' => './01_회원가입_04_회원가입완료.php',
    'find_id' => './02_아이디찾기.php',
    'find_id_complete' => './02_아이디찾기완료.php',
    'find_pass' => './03_비밀번호찾기.php',
    'find_pass_complete' => './03_비밀번호찾기_완료.php',
    'member' => './05_내정보수정.php',
    'login' => './login.php'
];

//fileName변수에 mode값에 해당하는 파일이름을 넣어줌
$fileName = $modeActions[$mode];

//if($mode == 'regist') {
//    //회원가입 프로세스
//    include_once $_SERVER['DOCUMENT_ROOT'].'/process/join/JoinProcess.php';
//    //ajax로 호출하기
//
//} else if ($mode == 'login') {
//    //로그인 페이지
//    include_once $_SERVER['DOCUMENT_ROOT'].'/commonFile/script.php';
//    include_once $fileName;
//
//} else if($fileName !== null) {
//    if($mode == 'member') {
////        include_once $_SERVER['DOCUMENT_ROOT'].'/process/myInfoModify/modifyView.php';
//        //상단에 붙이기
//    }
//    include_once $_SERVER['DOCUMENT_ROOT'].'/commonFile/script.php';
//    include_once $_SERVER['DOCUMENT_ROOT'].'/commonFile/header.php';
//    include_once $fileName;
//    include_once $_SERVER['DOCUMENT_ROOT'].'/commonFile/footer.php';
//}


//나머지 모든 회원에 관한 페이지
//    include_once $_SERVER['DOCUMENT_ROOT'].'/commonFile/script.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/commonFile/header.php';
include_once $fileName;
include_once $_SERVER['DOCUMENT_ROOT'] . '/commonFile/footer.php';

