<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/key.php";

print_r("연결됨");
print_r("</br>");
print_r($_SERVER['REQUEST_METHOD']);
// PATCH 요청 본문에서 데이터 추출
$data = json_decode(file_get_contents('php://input'), true);


print_r($data);



//비밀번호 암호화
$password = $data['password'];
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

if($conn) {
    $sql = "
        UPDATE member
        SET
            username = '{$data['id']}',
            password = '{$hashedPassword}',
            email = '{$data['email']}',
            homeNumber = '{$data['homeNum']}',
            postcode = '{$data['postcode']}',
            address = '{$data['roadAddress']}',
            detailAddress = '{$data['extraAddress']}',
            sendSMS = '{$data['sendSMS']}',
            sendEmail = '{$data['sendEmail']}'
        WHERE
            name = '{$data['name']}' AND  phoneNumber = '{$data['phoneNum']}';
    ";

    //DB에 sql문으로 정보를 입력하기
    $result = mysqli_query($conn, $sql);
}
