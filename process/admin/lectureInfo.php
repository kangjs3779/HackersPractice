<?php

$lectureId = $_GET['lectureId'];

$sql = "SELECT * FROM lecture WHERE id = {$lectureId}";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
