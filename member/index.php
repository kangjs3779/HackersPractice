<?php
// 모든 member include는 여기에 작성할 것
session_start();
include_once "../key.php";

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
    'modifyMyInfo' => './05_내정보수정.php'
];

//fileName변수에 mode값에 해당하는 파일이름을 넣어줌
$fileName = $modeActions[$mode];

if($mode == 'regist') {
    //회원가입 프로세스
    include_once $_SERVER['DOCUMENT_ROOT'].'/process/join/JoinProcess.php';

} else if($fileName !== null) {
    if($mode == 'modifyMyInfo') {
        include_once $_SERVER['DOCUMENT_ROOT'].'/process/myInfoModify/modifyView.php';
    }
    include_once $_SERVER['DOCUMENT_ROOT'].'/commonFile/header.php';
    include_once $fileName;
    include_once $_SERVER['DOCUMENT_ROOT'].'/commonFile/footer.php';
}
