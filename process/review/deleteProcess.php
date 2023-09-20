<?php
print_r($_GET['reviewId']);

$reviewId = $_GET['reviewId'];
$sql = "DELETE FROM review WHERE id = '{$reviewId}'";

$result = mysqli_query($conn, $sql);

if($result) {
    header("Location: ".$_SERVER['HTTP_ORIGIN']."/lecture_board/index.php?mode=list");
}
