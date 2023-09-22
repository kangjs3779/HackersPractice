<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT']."/key.php";

//파라미터 값 가져오기
$mode = $_GET['mode'];

//모드의 값에 따라 다른 페이지 이름
$modeActions = [
    'list' => './04_수강후기_리스트.php',
    'write' => './04_수강후기_등록.php',
    'view' => './04_수강후기_상세.php',
    'modify' => './04_수강후기_수정.php',
    'delete' => $_SERVER['DOCUMENT_ROOT'].'/process/review/deleteProcess.php'
];

//fileName변수에 mode값에 해당하는 파일이름을 넣어줌
$fileName = $modeActions[$mode];

switch ($mode) {
    case 'view':
        //수강 후기 상세보기 페이지
        include_once $_SERVER['DOCUMENT_ROOT']."/commonFile/pagination.php";
        include_once $_SERVER['DOCUMENT_ROOT'].'/process/review/reviewList.php';
        include_once $_SERVER['DOCUMENT_ROOT'].'/process/review/reviewInfo.php';
        include_once $_SERVER['DOCUMENT_ROOT'].'/commonFile/header.php';
        include_once $_SERVER['DOCUMENT_ROOT'].'/commonFile/leftnavbar.php';
        include_once $fileName;
        include_once $_SERVER['DOCUMENT_ROOT'].'/commonFile/footer.php';
        break;

    case 'modify':
        //수강 후기 수정 페이지
        include_once $_SERVER['DOCUMENT_ROOT'].'/process/review/reviewInfo.php';
        include_once $_SERVER['DOCUMENT_ROOT'].'/commonFile/header.php';
        include_once $_SERVER['DOCUMENT_ROOT'].'/commonFile/leftnavbar.php';
        include_once $fileName;
        include_once $_SERVER['DOCUMENT_ROOT'].'/commonFile/footer.php';
        break;

    case 'list':
        //수강 후기 리스트 페이지
        include_once $_SERVER['DOCUMENT_ROOT']."/commonFile/pagination.php";
        include_once $_SERVER['DOCUMENT_ROOT'].'/process/review/reviewList.php';
        include_once $_SERVER['DOCUMENT_ROOT'].'/commonFile/header.php';
        include_once $_SERVER['DOCUMENT_ROOT'].'/commonFile/leftnavbar.php';
        include_once $fileName;
        include_once $_SERVER['DOCUMENT_ROOT'].'/commonFile/footer.php';
        break;

    case 'write':
        //수강 후기 등록 페이지
        include_once $_SERVER['DOCUMENT_ROOT'].'/commonFile/header.php';
        include_once $_SERVER['DOCUMENT_ROOT'].'/commonFile/leftnavbar.php';
        include_once $fileName;
        include_once $_SERVER['DOCUMENT_ROOT'].'/commonFile/footer.php';
        break;

    case 'delete':
        //수강 후기 삭제
        include_once $fileName;
        break;
}