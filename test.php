<?php
include_once $_SERVER['DOCUMENT_ROOT']."/key.php";

$path = $_SERVER['DOCUMENT_ROOT']."/test/썸네일.png";
//$path = '/test/썸네일.png';
print_r($path);
if(unlink($path)) {
    echo "성공";
} else {
    echo "실패";
}
?>


