<?php
print_r($_POST['password']);
print_r("</br>");
print_r("</br>");
print_r($_SESSION);
print_r("</br>");
print_r("</br>");
print_r($conn);
print_r("</br>");
print_r("</br>");

//비밀번호 암호화
$password = $_POST['password'];
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

print_r($password);
print_r("</br>");
print_r($hashedPassword);

$sql = "INSERT INTO member
            (
                id,
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

print_r("</br>");
print_r("</br>");
print_r($sql);
print_r("</br>");
print_r("</br>");

//DB에 sql문으로 정보를 입력하기
$result = mysqli_query($conn, $sql);

//입력에 성공하면 param의 값을 complete로 변경
if($result) {
    $_SESSION['memberId'] = $_POST['id'];
    $_SESSION['password'] = $_POST['password'];

    print_r("성공");
    print_r("</br>");
    print_r("</br>");
    print_r($_SESSION);

    header('Location: /member/index.php?mode=complete');
    exit;
}







