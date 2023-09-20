<?php

$reviewId = $_GET['reviewId'];

$sql = "SELECT * FROM review 
            JOIN member on review.memberId = member.id
            JOIN lecture on review.lectureId = lecture.id
        WHERE review.id = {$reviewId}";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if($_GET['mode'] == 'view') {
    //수강 후기 상세페이지 조회를 하면 조회수 올라감
    $viewSQL = "UPDATE review SET view = view + 1 WHERE id = $reviewId";
    $result = mysqli_query($conn, $viewSQL);
}

