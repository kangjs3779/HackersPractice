<?php
// MainController 역할
// 모든 include는 여기에 작성할 것
//include_once $_SERVER['DOCUMENT_ROOT']. '/commonFile/session.php';
include_once "../key.php";

//파라미터 값 가져오기
$mode = $_GET['mode'];

//파일 읽는 순서 함수 : 공통
function readFileProcess($fileName) {
    include_once '../commonFile/header.php';
    include_once $fileName;
    include_once '../commonFile/footer.php';
}

if($mode == 'step_01') { 

    $fileName = "./01_회원가입_01_약관동의.php";
    readFileProcess($fileName);

} else if($mode == 'step_02') {
    
    $fileName = './01_회원가입_02_본인확인.php';
    readFileProcess($fileName);

} else if($mode == 'step_03') {

    $fileName = './01_회원가입_03_정보입력.php';
    readFileProcess($fileName);

} else if($mode == 'regist') {
    
    include_once '../process/join/JoinProcess.php';

} else if($mode == 'complete') {

    $fileName = './01_회원가입_04_회원가입완료.php';
    readFileProcess($fileName);

}
