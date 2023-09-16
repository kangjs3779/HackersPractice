<?php
//global $conn;
include_once "../key.php";

session_start();


print_r($_SESSION['memberId']);
print_r("</br>");
print_r("</br>");
print_r($_SESSION['password']);
print_r("</br>");
print_r("</br>");
print_r($conn);
print_r("</br>");
print_r("</br>");

$plainPw = $_SESSION['password'];
$id = $_SESSION['memberId'];

$sql = "SELECT * FROM member WHERE id = '{$id}'";

//DB에 sql문으로 정보를 조회하기
$result = mysqli_query($conn, $sql);
//$row = mysql_result($result);
$row = mysqli_fetch_array($result);

$hashPw = $row['password'];

print_r("sql : ".$sql);
print_r("</br>");
print_r("</br>");
print_r($hashPw);
print_r("</br>");
print_r("</br>");

//if(password_verify($plainPw, $hashPw) {
//    print_r("로그인 성공");
//} else {
//    print_r("로그인 실패");
//}

if(password_verify($plainPw, $hashPw)) {
    print_r("로그인 성공");
    print_r("</br>");
    print_r("</br>");
    header('Location: /index.php');
} else {
    print_r("로그인 실패");
    print_r("</br>");
    print_r("</br>");
    header('Location: /member/login.php');
}

print_r($_SERVER['HTTP_REFERER']);



//password_verify('rasmuslerdorf', $hash