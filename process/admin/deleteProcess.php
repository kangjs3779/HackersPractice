<?php

$lectureId = $_GET['lectureId'];

$sql = "DELETE FROM lecture WHERE id = '{$lectureId}'";

$result = mysqli_query($conn, $sql);

if($result) {
    header("Location: ".$_SERVER['HTTP_ORIGIN']."/admin/index.php?mode=list");
}