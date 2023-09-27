<?php
include_once $_SERVER['DOCUMENT_ROOT']."/key.php";

session_start();

function verifyProcess($plainPw, $username, $conn){
//입력된 아이디와 비밀번호로 회원의 정보를 찾고 확인하는 함수

    $sql = "SELECT * FROM member WHERE username = '{$username}'";

    //DB에 sql문으로 정보를 조회하기
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    //DB에서 찾은 암호화된 비번 찾기
    $hashPw = $row['password'];

    //세션에 저장된 비빌번호와 암호화된 비밀번호를 비교
    if (password_verify($plainPw, $hashPw)) {
        //로그인 성공 시
        $_SESSION['result'] = 'success';
        $_SESSION['memberId'] = $row['id'];
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $plainPw;

        findAuthority($row['id'], $conn);

        header('Location: http://practice.hackers.com/');
//        header('Location: http://localhost:63342/practice/index.php/');

    } else {
        //로그인 실패 시
        $_SESSION['result'] = 'fail';

        header('Location: http://practice.hackers.com/member/index.php?mode=login');
    }
}

function findAuthority($memberId, $conn) {
//권한을 찾는 함수
//    $sql = "SELECT * FROM authority WHERE username = '{$memberId}'";
    $sql= "SELECT * FROM authority LEFT JOIN member on member.id = authority.memberId WHERE member.id = '{$memberId}'";
    //DB에 sql문으로 정보를 조회하기
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if($row['id']) {
        $_SESSION['authorityId'] = $row[0];
    }
}


//로그인 진행
$username = $_POST['username'];
$plainPw = $_POST['password'];

verifyProcess($plainPw, $username, $conn);

print_r($_SERVER);
