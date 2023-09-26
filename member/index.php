<?php
// 모든 member include는 여기에 작성할 것
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . "/key.php";
print_r($_SESSION);

//파라미터 값 가져오기
$mode = $_GET['mode'];

//모드의 값에 따라 다른 페이지 이름
$modeActions = [
    'step_01' => "/member/step_01.php",
    'step_02' => '/member/step_02.php',
    'step_03' => '/member/step_03.php',
    'complete' => '/member/complete.php',
    'find_id' => '/member/find_id.php',
    'find_id_complete' => '/member/find_id_complete.php',
    'find_pass' => '/member/find_pass.php',
    'find_pass_complete' => '/member/find_pass_complete.php',
    'modify' => '/member/modify.php',
    'login' => '/member/login.php'
];

//fileName변수에 mode값에 해당하는 파일이름을 넣어줌
$fileName = $modeActions[$mode];

//나머지 모든 회원에 관한 페이지
include_once $_SERVER['DOCUMENT_ROOT'] . '/commonFile/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . $fileName;
include_once $_SERVER['DOCUMENT_ROOT'] . '/commonFile/footer.php';

