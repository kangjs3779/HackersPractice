<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/key.php";

print_r($_POST);
print_r("</br>");

$check = [
    'username' => false,
    'password' => false,
    'name' => false,
    'email' => false,
    'phoneNumber' => false,
    'postcode' => false,
    'detailAddress' => false
];

$username = $_POST['username'];
$name = $_POST['name'];
$email = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];
$homeNumber = $_POST['homeNumber'];
$postcode = $_POST['postcode'];
$address = $_POST['address'];
$detailAddress = $_POST['detailAddress'];
$sendSMS = $_POST['sendSMS'];
$sendEmail = $_POST['sendEmail'];
//비밀번호 암호화
$password = $_POST['password'];
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$check['username'] = preg_match('/^[a-z][a-z0-9]{3,15}$/',$username);
$check['password'] = preg_match('/^(?=.*[a-z])(?=.*[0-9])[a-z0-9]{8,15}$/i',$username);
$check['name'] = preg_match('/^[가-힣]{2,}$/',$username);
$check['email'] = isset($email) ? true : false;
$check['phoneNumber'] = preg_match('/^010\d{4}\d{4}$/',$username);
$check['postcode'] = isset($postcode) ? true : false;
$check['detailAddress'] = isset($detailAddress) ? true : false;

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
            '{$username}',
            '{$name}',
            '{$hashedPassword}',
            '{$email}',
            '{$phoneNumber}',
            '{$homeNumber}',
            '{$postcode}',
            '{$address}',
            '{$detailAddress}',
            '{$sendSMS}',
            '{$sendEmail}'
        )";

print_r('sql문 : '.$sql);

//DB에 sql문으로 정보를 입력하기
//$result = mysqli_query($conn, $sql);

//입력에 성공하면 param의 값을 complete로 변경
//if($result) {
//    $_SESSION['username'] = $username;
//    $_SESSION['password'] = $password;
//
//    header('Location: /member/index.php?mode=complete');
//}







