<?php
session_start();
include_once "../key.php";

//print_r($_SESSION);

//파라미터 값 가져오기
$mode = $_GET['mode'];

//모드의 값에 따라 다른 페이지 이름
$modeActions = [
    'put' => './강의등록.php',
    'modify' => './강의수정.php',
    'list' => './강의리스트.php',
    'delete' => $_SERVER['DOCUMENT_ROOT'].'/process/admin/deleteProcess.php',
    'view' => './강의상세.php'
];

//fileName변수에 mode값에 해당하는 파일이름을 넣어줌
$fileName = $modeActions[$mode];


switch ($mode) {
    case 'view':
        //강의 상세보기 페이지
        include_once $_SERVER['DOCUMENT_ROOT'].'/process/admin/lectureInfo.php';
        include_once '../commonFile/header.php';
        include_once $fileName;
        include_once '../commonFile/footer.php';
        break;

    case 'modify':
        //강의 수정 페이지
        include_once $_SERVER['DOCUMENT_ROOT'].'/process/admin/lectureInfo.php';
        include_once "../process/admin/modifyView.php";
        include_once '../commonFile/header.php';
        include_once $fileName;
        include_once '../commonFile/footer.php';
        break;

    case 'list':
        //강의 리스트 페이지
        include_once '../commonFile/pagination.php';
        include_once $_SERVER['DOCUMENT_ROOT'].'/process/admin/lectureList.php';
        include_once '../commonFile/header.php';
        include_once $fileName;
        include_once '../commonFile/footer.php';
        break;

    case 'put':
        //강의 등록 페이지
        include_once '../commonFile/header.php';
        include_once $fileName;
        include_once '../commonFile/footer.php';
        break;

    case 'delete':
        //강의 삭제
        include_once $_SERVER['DOCUMENT_ROOT']."/process/review/deleteProcess.php";
        include_once $fileName;
        break;
}