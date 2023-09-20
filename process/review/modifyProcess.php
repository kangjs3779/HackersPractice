<?php
include_once $_SERVER['DOCUMENT_ROOT']."/key.php";
session_start();
print_r("수정");
print_r("</br>");
print_r($_POST);
print_r("</br>");
print_r("</br>");
print_r("</br>");

$reviewId = $_POST['reviewId'];
$lectureId = $_POST['lectureId'];
$title = $_POST['title'];
$content = $_POST['content'];
$satisfaction = $_POST['satisfaction'];


$sql = "
    UPDATE review
    SET
        lectureId = '{$lectureId}',
        title = '{$title}',
        satisfaction = '{$satisfaction}',
        content = '{$content}'
    WHERE id = '{$reviewId}';
";

$result = mysqli_query($conn, $sql);

if($result) {
    header("Location: ".$_SERVER['HTTP_ORIGIN']."/lecture_board/index.php?mode=view&reviewId=".$reviewId);
}