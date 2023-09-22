<?php

//리뷰 리스트 페이지 정보 조회
$category = [
    1 => '일반',
    2 => '산업',
    3 => '공통',
    4 => '어학'
];

if ($paginationArr['isBest']) {
    //베스트를 출력한다고 하면?

    //후기 리스트 (베스트 제외하고 출력)
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
            LIMIT {$paginationArr['startIndex']}, {$paginationArr['listCount']}";

    $result = mysqli_query($conn, $sql);
    $record = array();
    $resultNumRow = mysqli_num_rows($result);

    //카테고리를 한글로 바꿔줌
    for ($i = 0; $i < $resultNumRow; $i++) {
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


    //베스트 카테고리를 한글로 바꿔줌
    for ($i = 0; $i < mysqli_num_rows($bestresult); $i++) {
        $bestRow = mysqli_fetch_array($bestresult);
        $bestRecord[$i] = $bestRow;
        $bestRecord[$i][22] = $category[$bestRecord[$i][22]];
    }


} else {
    //후기 리스트
    $sql = "SELECT *
                FROM review
                     JOIN member ON review.memberId = member.id
                     JOIN lecture ON review.lectureId = lecture.id
            ORDER BY review.inserted DESC
            LIMIT {$paginationArr['startIndex']}, {$paginationArr['listCount']}";

    $result = mysqli_query($conn, $sql);
    $record = array();
    $resultNumRow = mysqli_num_rows($result);

    //카테고리를 한글로 바꿔줌
    for ($i = 0; $i < $resultNumRow; $i++) {
        $row = mysqli_fetch_array($result);
        $record[$i] = $row;
        $record[$i][22] = $category[$record[$i][22]];
    }

//    print_r($record);
//    print_r("</br>");
}

