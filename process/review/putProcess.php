<?php
include_once $_SERVER['DOCUMENT_ROOT']."/key.php";
session_start();

$memberId = $_SESSION['memberId'];
$lectureId = $_POST['lectureId'];
$title = $_POST['title'];
$content = $_POST['content'];
$satisfaction = $_POST['satisfaction'];

$sql = "
        INSERT INTO review
            (memberId, lectureId, title, content, satisfaction)
        VALUES
            ('{$memberId}', '{$lectureId}', '{$title}', '{$content}', '{$satisfaction}')
        ";

$result = mysqli_query($conn, $sql);
$lastId = mysqli_insert_id($conn);

if($result) {
    header("Location: ".$_SERVER['HTTP_ORIGIN']."/lecture_board/index.php?mode=view&reviewId=".$lastId);
}
