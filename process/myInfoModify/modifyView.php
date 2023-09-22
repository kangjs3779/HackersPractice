<?php
//include_once "../key.php";

//해당 정보 조회
if($_SESSION['result'] == 'success') {
    //로그인에 성공한 사용자이면
    $sql = "SELECT * FROM member WHERE id = '{$_SESSION['memberId']}'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

}


