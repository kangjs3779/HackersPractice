<?php
$totalPage = 14;
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

if($allRecord[record] % 20 == 0) {
    $totalPage = $allRecord[record]/20;
}   else {
    $totalPage = (int) ($allRecord[record]/20 + 1 );
}

