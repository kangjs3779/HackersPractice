<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . "/key.php";

//파라미터 값 가져오기
$mode = $_GET['mode'];

//모드의 값에 따라 다른 페이지 이름
$modeActions = [
    'list' => '/review/reviewList.php',
    'write' => '/review/writeReview.php',
    'view' => '/review/reviewDetail.php',
    'modify' => '/review/modifyReview.php'
//    'delete' => '/process/review/deleteProcess.php'
];

//fileName변수에 mode값에 해당하는 파일이름을 넣어줌
$fileName = $modeActions[$mode];


include_once $_SERVER['DOCUMENT_ROOT'] . "/commonFile/pagination.php";
include_once $_SERVER['DOCUMENT_ROOT'] . '/commonFile/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/commonFile/leftnavbar.php';
include_once $_SERVER['DOCUMENT_ROOT'] . $fileName;
include_once $_SERVER['DOCUMENT_ROOT'] . '/commonFile/footer.php';
