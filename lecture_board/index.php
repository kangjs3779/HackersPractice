<?php

//파라미터 값 가져오기
$mode = $_GET['mode'];

//파일 읽는 순서 함수 : 공통
function readFileProcess($fileName) {
    include_once '../commonFile/leftnavbar.php';
    include_once $fileName;
//    include_once '../commonFile/footer.php';
}

//모드의 값에 따라 다른 페이지 이름
$modeActions = [
    'list' => './04_수강후기_리스트.php',
    'write' => './04_수강후기_등록.php',
    'view' => './04_수강후기_상세.php'
];

//fileName변수에 mode값에 해당하는 파일이름을 넣어줌
$fileName = $modeActions[$mode];

if($fileName == 'view') {
    include_once '../commonFile/header.php';
    include_once '../commonFile/leftnavbar.php';
    include_once $fileName;
    include_once '../commonFile/footer.php';

}else if($fileName != null) {
    include_once '../commonFile/leftnavbar.php';
    include_once $fileName;
}