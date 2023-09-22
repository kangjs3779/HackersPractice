<?php


if(isset($_GET['reviewId'])) {
    $reviewId = $_GET['reviewId'];
    $sql = "DELETE FROM review WHERE id = '{$reviewId}'";

    $result = mysqli_query($conn, $sql);

    if($result) {
        header("Location: ".$_SERVER['HTTP_ORIGIN']."/lecture_board/index.php?mode=list");
    }
} else if(isset($_GET['lectureId'])) {
    $lectureId = $_GET['lectureId'];
    $sql = "DELETE FROM review WHERE lectureId = '{$lectureId}'";

    $result = mysqli_query($conn, $sql);
}