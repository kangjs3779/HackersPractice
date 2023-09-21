<?php

$category = [
    1 => '일반',
    2 => '산업',
    3 => '공통',
    4 => '어학'
];

$sql = "SELECT * FROM lecture 
            JOIN authority ON lecture.authorityId = authority.id 
        ORDER BY lecture.inserted DESC 
        LIMIT {$paginationArr['startIndex']}, {$paginationArr['listCount']}";
$result = mysqli_query($conn, $sql);
$record = array();
$resultNumRow = mysqli_num_rows($result);

//카테고리를 한글로 바꿔줌
for ($i = 0; $i < $resultNumRow; $i++) {
    $row = mysqli_fetch_array($result);
    $record[$i] = $row;
    $record[$i][1] = $category[$record[$i][1]];
}



