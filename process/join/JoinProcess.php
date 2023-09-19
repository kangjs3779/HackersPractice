<?php
include_once $_SERVER['DOCUMENT_ROOT']."/key.php";

//비밀번호 암호화
$password = $_POST['password'];
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO member
            (
                username,
                name,
                password,
                email,
                phoneNumber,
                homeNumber,
                postcode,
                address,
                detailAddress,
                sendSMS,
                sendEmail
            )
        VALUES
            (
                '{$_POST['id']}',
                '{$_POST['name']}',
                '{$hashedPassword}',
                '{$_POST['email']}',
                '{$_POST['phoneNumber']}',
                '{$_POST['homeNumber']}',
                '{$_POST['postcode']}',
                '{$_POST['address']}',
                '{$_POST['detailAddress']}',
                '{$_POST['sendSMS']}',
                '{$_POST['sendEmail']}'
            )
        ";

//DB에 sql문으로 정보를 입력하기
$result = mysqli_query($conn, $sql);

//입력에 성공하면 param의 값을 complete로 변경
if($result) {
    $_SESSION['memberId'] = $_POST['id'];
    $_SESSION['password'] = $_POST['password'];

    header('Location: /member/index.php?mode=complete');
}







