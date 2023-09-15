<?php
include_once "includetest.php";

echo "test php";
echo "</br>";
echo "인클루드를 통해 ".$val; 
echo "</br>";
echo "인클루드를 통해 a의 값은 ".$a; 
echo "</br>";

include_once "key.php";

echo "db 비번 : ".$DB_PASSWORD;
echo "</br>";
echo "db 호스트 : ".$DB_LOCALHOST;
echo "</br>";
echo "결과";

$servername = "localhost"; // MySQL 서버 주소 (로컬 서버인 경우)
$username = "사용자이름"; // MySQL 사용자 이름
$password = "비밀번호"; // MySQL 비밀번호
$dbname = "데이터베이스이름"; // 사용할 데이터베이스 이름

// MySQL 서버에 연결
// $conn = mysqli_connect('3.38.245.67', 'root', '9dfocjwHN4dR', 'Hackers');
$conn = mysqli_connect($DB_LOCALHOST, $DB_USERNAME, $DB_PASSWORD, $DB_DBNAME);

// 연결 확인
if (!$conn) {
    die("연결 실패: " . mysqli_connect_error());
} else {
    echo "MySQL 데이터베이스에 성공적으로 연결되었습니다.";
    echo "</br>";

}

$testId = "test111";

$sql = "SELECT * FROM member WHERE id = '{$testId}'";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if(!$result) {
    echo "이상";
}

echo "성공";
echo "</br>";
print_r($sql);
echo "</br>";
print_r($result);
echo "</br>";
print_r($row[0]);
echo "</br>";
print_r($row);
