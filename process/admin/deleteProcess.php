<?php



$lectureId = $_GET['lectureId'];

$findDeleteInfoQuery = "SELECT * FROM lecture WHERE id = '{$lectureId}'";
$findDeleteResult = mysqli_query($conn, $findDeleteInfoQuery);
$row = mysqli_fetch_array($findDeleteResult);

$path = $_SERVER['DOCUMENT_ROOT'] . "/img/lectureMainPhoto/" . $row['id'];
$file = $_SERVER['DOCUMENT_ROOT'] . "/img/lectureMainPhoto/" . $row['id'] . "/" . $row['mainPhoto'];

if (is_dir($path)) {
    //해당 폴더 있는지 확인
    if (unlink($file) && rmdir($path)) {
        //썸네일 사진과 해당 폴더 삭제


        $sql = "DELETE FROM lecture WHERE id = '{$lectureId}'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location: " . $_SERVER['HTTP_ORIGIN'] . "/admin/index.php?mode=list");
        }
    }
}

