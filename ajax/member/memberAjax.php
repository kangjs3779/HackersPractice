<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/key.php";
session_start();

//본인인증 시 = step_02일 때
if ($_POST['mode'] == 'step_02') {

    $_SESSION['phoneNum'] = $_POST['phoneNum'];
    $_SESSION['veriCode'] = 1234;

    //session값을 JSON으로 변환함
    $responseData = [
        'phoneNum' => $_SESSION['phoneNum'],
        'veriCode' => $_SESSION['veriCode']
    ];

    header('Content-Type: application/json');
    echo json_encode($responseData);
}


//아이디 중복확인 버튼을 누름
if ($_POST['mode'] == 'IdCheck') {
    //중복확인 세션 변수
    $IDcheck = false;

    //post로 받은 값을 변수에 넣어줌
    $idInput = $_POST['idInput'];

    //아이디 중복 체크
    $sql = "SELECT * FROM member WHERE username = '{$idInput}'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if (!$row) {
        //중복된 아이디가 없으면
        $IDcheck = true;
    }

    //값을 JSON으로 변환함
    $responseData = [
        'check' => $IDcheck,
    ];

    //http header에 정보를 보내준다
    //application/json타입으로 보내준다
    header('Content-Type: application/json');

    //해당 데이터를 json으로 변환한다
    echo json_encode($responseData);
}


//회원 정보 입력 후 회원가입 버튼을 누름 = step_03일 때
//유효성 검증 패턴
$pattern = [
    'username' => '/^[a-z][a-z0-9]{3,15}$/',
    'password' => '/^(?=.*[a-z])(?=.*[0-9])[a-z0-9]{8,15}$/i',
    'name' => '/^[가-힣]{2,}$/',
    'phoneNumber' => '/^010\d{8}$/',
    'postcode' => '/\d{5,6}$/'
];

if ($_POST['mode'] == 'step_03') {


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
    $password = $_POST['password'];

    //유효성 검증 체크
    $isValid = [
        'username' => preg_match($pattern['username'], $username),
        'password' => preg_match($pattern['password'], $password),
        'name' => preg_match($pattern['name'], $name),
        'phoneNumber' => preg_match($pattern['phoneNumber'], $phoneNumber),
        'postcode' => preg_match($pattern['postcode'], $postcode)
    ];

    if (!in_array(false, $isValid)) {
        //유효성 검증 체크 배열에서 모두 true가 나오면!

        //비밀번호 암호화
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

        //DB에 sql문으로 정보를 입력하기
        $result = mysqli_query($conn, $sql);

        //입력에 성공하면 param의 값을 complete로 변경
        if ($result) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;

            $responseData = [
                'result' => true
            ];

        }

    } else {
        $responseData = [
            'result' => false
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($responseData);
}

//회원 정보 수정 페이지에서 정보 수정 버튼을 누름
if ($_POST['mode'] == 'modify') {

    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $homeNumber = $_POST['homeNum'];
    $postcode = $_POST['postcode'];
    $address = $_POST['roadAddress'];
    $detailAddress = $_POST['extraAddress'];
    $sendSMS = $_POST['sendSMS'];
    $sendEmail = $_POST['sendEmail'];
    $password = $_POST['password'];
    $phoneNumber = $_POST['phoneNum'];


    //유효성 검증 체크
    $isValid = [
        'username' => preg_match($pattern['username'], $username),
        'password' => preg_match($pattern['password'], $password),
        'name' => preg_match($pattern['name'], $name),
        'phoneNumber' => preg_match($pattern['phoneNumber'], $phoneNumber),
        'postcode' => preg_match($pattern['postcode'], $postcode)
    ];

    if (!in_array(false, $isValid)) {
        //비밀번호 암호화
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "
        UPDATE member
        SET
            username = '{$username}',
            password = '{$hashedPassword}',
            email = '{$email}',
            homeNumber = '{$homeNumber}',
            postcode = '{$postcode}',
            address = '{$address}',
            detailAddress = '{$detailAddress}',
            sendSMS = '{$sendSMS}',
            sendEmail = '{$sendEmail}'
        WHERE
            name = '{$name}' AND  phoneNumber = '{$phoneNumber}';
    ";

        //DB에 sql문으로 정보를 입력하기
        $result = mysqli_query($conn, $sql);

        //입력에 성공하면 param의 값을 complete로 변경
        if ($result) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;

            $responseData = [
                'result' => true
            ];
            header('Content-Type: application/json');
            echo json_encode($responseData);

        } else {
            $responseData = [
                'result' => false
            ];
            header('Content-Type: application/json');
            echo json_encode($responseData);
        }
    }
}

//인증번호 받기 버튼을 눌렀을 때
if ($_POST['mode'] == 'find_ID_send_veriCode') {
    // POST 요청을 처리하는 PHP 코드
    $to = $_POST['fullEmail'];
    $subject = "Verify code for ID";

    $message = "<h1>Hello. Hackers</h1>";
    $message .= "<p>veriCode : 123456</p>";

    $header = "From: sharmate0203@gmail.com \r\n";
    $header .= "Content-type: text/html;charset=UTF-8\r\n";

    //메일 발송 함수
    $sendEmail = mail($to, $subject, $message, $header);

    //이메일이 전송되면 세션에 인증코드를 저장함
    $_SESSION['veriCode'] = '123456';

    //session값을 JSON으로 변환함
    $responseData = [
        'veriCode' => '123456'
    ];

    header('Content-Type: application/json');
    echo json_encode($responseData);
}

//인증번호 확인 버튼을 누름 - 아이디 찾기에서
if ($_POST['mode'] == 'find_ID') {
    //post로 받은 값을 변수에 넣어줌
    $name = $_POST['name'];
    $email = $_POST['email'];
    $check = false;

    //아이디 찾기
    $sql = "SELECT * FROM member WHERE email = '{$email}' and name = '{$name}'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);


    if ($row) {
        //조건에 맞는 아이디가 있으면
        //session에 아이디 저장하기
        $_SESSION['username'] = $row['username'];
        $_SESSION['memberId'] = $row['id'];
        $check = true;
    }

    //값을 JSON으로 변환함
    $responseData = [
        'check' => $check,
    ];

    //http header에 정보를 보내준다
    //application/json타입으로 보내준다
    header('Content-Type: application/json');

    //해당 데이터를 json으로 변환한다
    echo json_encode($responseData);
}


//인증번호 확인 버튼을 누름 - 비번 찾기에서
if ($_POST['mode'] == 'find_PW') {
    //post로 받은 값을 변수에 넣어줌
    $name = $_POST['name'];
    $email = $_POST['email'];
    $check = false;

    //아이디 찾기
    $sql = "SELECT * FROM member WHERE email = '{$email}' and name = '{$name}'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);


    if ($row) {
        //조건에 맞는 아이디가 있으면
        //session에 아이디 저장하기
        $_SESSION['username'] = $row['username'];
        $_SESSION['memberId'] = $row['id'];
        $check = true;
    }

    //값을 JSON으로 변환함
    $responseData = [
        'check' => $check,
    ];

    //http header에 정보를 보내준다
    //application/json타입으로 보내준다
    header('Content-Type: application/json');

    //해당 데이터를 json으로 변환한다
    echo json_encode($responseData);
}

//비밀번호 찾기에서 비밀번호 재설정을 함
if ($_POST['mode'] == 'find-PW-reset') {

    $newPassword = $_POST['password'];
    $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
    $memberId = $_SESSION['memberId'];
    $check = false;

    $sql = "UPDATE member
            SET
                password = '{$newPasswordHash}'
            WHERE
                id = {$memberId}";

    $result = mysqli_query($conn, $sql);

    if($result) {
        $check = true;
    }

    //값을 JSON으로 변환함
    $responseData = [
        'check' => $check,
    ];


    //해당 데이터를 json으로 변환한다
    header('Content-Type: application/json');
    echo json_encode($responseData);
}