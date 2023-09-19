<?php
session_start();
include_once "../key.php";

print_r($_SESSION);

//파라미터 값 가져오기
$mode = $_GET['mode'];

//모드의 값에 따라 다른 페이지 이름
$modeActions = [
    'put' => './강의등록.php',
    'modify' => './수정삭제.php'
];

//fileName변수에 mode값에 해당하는 파일이름을 넣어줌
$fileName = $modeActions[$mode];

if($mode) {
    if($mode == 'modify') {
        include_once "../process/admin/modifyView.php";
    }
    include_once '../commonFile/header.php';
    include_once $fileName;
    include_once '../commonFile/footer.php';

}