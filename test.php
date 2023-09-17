<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // POST 요청을 처리하는 PHP 코드
    $to = "kangjs3779@naver.com";
    $subject = "verify code";

    $message = "<h1>해커스에 방문해주셔서 감사합니다.</h1>";
    $message .= "<p>인증번호는 '12345'입니다.</p>";

    $header = "From: sharemate0203@gmail.com \r\n";
    //$header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html;charset=UTF-8\r\n";

    $retval = mail($to, $subject, $message, $header);

    if ($retval == true) {
        echo "Message sent successfully...";
    } else {
        echo "Message could not be sent...";
    }

    //send sms
//    $result = sendSMS('01057543779', '01048852396', '테스트 문자발송', '에러');
//
//    if ($result < 0) {
//        echo '에러';
//    } else {
//        echo "성공 (" . $result . "건)<br>";
//    }
}
    ?>

    <body>
    <button type="button" id="button">보내기</button>
    <button type="button" id="button2">sms</button>
    </body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function () {
            $("#button").click(function () {
                $.ajax({
                    type: "POST",
                    url: "", // 빈 문자열 또는 현재 파일 URL을 사용합니다.
                    success: function (response) {
                        console.log("PHP 코드 실행 결과:", response);
                    }
                });
            });
        });

        $(document).ready(function () {
            $("#button2").click(function () {
                $.ajax({
                    type: "POST",
                    url: "", // 빈 문자열 또는 현재 파일 URL을 사용합니다.
                    success: function (response) {
                        console.log("PHP 코드 실행 결과:", response);
                    }
                });
            });
        });
    </script>








