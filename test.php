<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/key.php";
//print_r($_GET);
$categorization = 1;

$sql = "SELECT * FROM lecture WHERE categorization = {$categorization}";
$result = mysqli_query($conn, $sql);
//$row = mysqli_fetch_array($result);
$num_rows = mysqli_num_rows($result);

print_r($num_rows);
print_r("</br>");
print_r("</br>");

$record = array();

for($i = 0; $i < $num_rows; $i++) {
    $row = mysqli_fetch_array($result);
    print_r($row);
    print_r("</br>");
    print_r("</br>");
    $record[$i] = $row;
}

print_r($record);
print_r("</br>");
print_r("</br>");

$matrix = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];

print_r($matrix);
print_r("</br>");
print_r("</br>");