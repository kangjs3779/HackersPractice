<?php
include_once "../key.php";

session_start();

function verifyProcess($plainPw, $memberId, $conn) {
    $sql = "SELECT * FROM member WHERE id = '{$memberId}'";

    //DB에 sql문으로 정보를 조회하기
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result);

    //DB에서 찾은 암호화된 비번 찾기
    $hashPw = $row['password'];

    //세션에 저장된 비빌번호와 암호화된 비밀번호를 비교
    if(password_verify($plainPw, $hashPw)) {
        //로그인 성공 시

        $_SESSION['result'] = 'success';

        $_SESSION['memberId'] = $memberId;
        $_SESSION['password'] = $plainPw;

//        header('Location: http://localhost:63342/HackersPractice/index.php');
        header('Location: http://practice.hackers.com/');

    } else {
        //로그인 실패 시
        $_SESSION['result'] = 'fail';

//        header('Location: http://localhost:63342/HackersPractice/member/login.php');
        header('Location: http://practice.hackers.com/member/login.php');
    }
}

if(isset($_SESSION['memberId']) && isset($_SESSION['password'])) {
    //회원가입 후 로그인을 진행할 때

    //세션에 저장된 비밀번호와 아이디를 가져옴
    $plainPw = $_SESSION['password'];
    $memberId = $_SESSION['memberId'];

    verifyProcess($plainPw, $memberId, $conn);

} else {
    //메인페이지에서 바로 로그인 진행 시

    $memberId = $_POST['memberId'];
    $plainPw = $_POST['password'];

    verifyProcess($plainPw, $memberId, $conn);

}



