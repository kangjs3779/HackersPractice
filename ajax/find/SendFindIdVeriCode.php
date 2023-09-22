<?php
session_start();

function mailProcess($mailStatus) {
    //이메일이 전송되면 세션에 인증코드를 저장함
    $_SESSION['veriCode'] = '123456';

    //session값을 JSON으로 변환함
    $responseData = [
        'mailStatus' => $mailStatus,
        'veriCode' => '123456'
    ];

    header('Content-Type: application/json');
    echo json_encode($responseData);
}

if (isset($_POST['fullEmail'])) {
    // POST 요청을 처리하는 PHP 코드
    $to = $_POST['fullEmail'];
    $subject = "Verify code for ID";

//    $message = "<h1>해커스에 방문해주셔서 감사합니다.</h1>";
//    $message .= "<p>인증번호는 '123456'입니다.</p>";

    $message = "<h1>Hello. Hackers</h1>";
    $message .= "<p>veriCode : 123456</p>";

    $header = "From: sharmate0203@gmail.com \r\n";
    $header .= "Content-type: text/html;charset=UTF-8\r\n";

    //메일 발송 함수
    $sendEmail = mail($to, $subject, $message, $header);

    mailProcess($sendEmail == true);
}