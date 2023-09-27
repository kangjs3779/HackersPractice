<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . "/key.php";
//print_r($_SESSION);

//파라미터 값 가져오기
$mode = $_GET['mode'];


if($mode == 'login') {
    //로그인
    include_once $_SERVER['DOCUMENT_ROOT'] . '/commonFile/header.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/login/login.php';
}

if($mode == 'logout') {
    //로그아웃
    session_destroy();
    header("Location: http://practice.hackers.com");
}
