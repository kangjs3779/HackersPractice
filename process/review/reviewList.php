<?php
//리뷰 리스트 페이지 정보 조회

//페이지네이션 변수
if(isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$reviewCount = $page == 1 || $page == null ? 17 : 20;
$start = ($page - 1) * 20;
$recordSQL = "SELECT COUNT(*) record
              FROM review
                 JOIN member ON review.memberId = member.id
                 JOIN lecture ON review.lectureId = lecture.id";

$recordCountResult = mysqli_query($conn, $recordSQL);
$allRecord = mysqli_fetch_array($allRecordResult);

//후기 리스트
$sql = "SELECT *
            FROM review
                 JOIN member ON review.memberId = member.id
                 JOIN lecture ON review.lectureId = lecture.id
                 LEFT JOIN (
                    SELECT id
                    FROM review
                    ORDER BY view DESC
                    LIMIT 3
                ) AS bestReview ON review.id = bestReview.id
        WHERE bestReview.id IS NULL
        ORDER BY review.inserted DESC 
        LIMIT {$start}, {$reviewCount}";


$result = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($result);

$record = array();

$category = [
    1 => '일반',
    2 => '산업',
    3 => '공통',
    4 => '어학'
];

for($i = 0; $i < $num_rows; $i++) {
    $row = mysqli_fetch_array($result);
    $record[$i] = $row;
    $record[$i][22] = $category[$record[$i][22]];
}

//베스트 뽑기
$bestSQL = "SELECT * FROM review
                  JOIN member ON review.memberId = member.id
                  JOIN lecture ON review.lectureId = lecture.id
            ORDER BY review.view DESC
            LIMIT 3
           ";

$bestresult = mysqli_query($conn, $bestSQL);
$bestRecord = array();

for($i = 0; $i < mysqli_num_rows($bestresult); $i++) {
    $bestRow = mysqli_fetch_array($bestresult);
    $bestRecord[$i] = $bestRow;
    $bestRecord[$i][22] = $category[$bestRecord[$i][22]];
}

