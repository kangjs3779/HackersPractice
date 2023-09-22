<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/key.php";
print_r($_FILES);

if ($_FILES['mainPhoto']['size'] != 0) {
    //썸네일을 변경했다면
    // 파일타입 및 확장자 체크
    $mainPhoto = explode("/", $_FILES['mainPhoto']['type']);

    // 파일 확장자
    $fileExt = $mainPhoto[1];

    // 확장자 검사
    $check = false;
    switch ($fileExt) {
        case 'jpeg':
        case 'jpg':
        case 'png':
            $check = true;
            break;
    }
    $mainPhoto = $check ? $_FILES['mainPhoto']['name'] : '';

} else {
    //변경 안했으면
    $mainPhoto = $_POST['oldMainPhoto'];
    print_r("변경안함");
}


$lectureId = $_POST['id'];
$title = $_POST['title'];
$teacher = $_POST['teacher'];
$level = $_POST['level'];
$categorization = $_POST['categorization'];
$authorityId = $_POST['authorityId'];


$sql = "
    UPDATE lecture
    SET
        title = '{$title}',
        teacher = '{$teacher}',
        level = '{$level}',
        categorization = '{$categorization}',
        mainPhoto = '{$mainPhoto}'
    WHERE id = '{$lectureId}';
";

$result = mysqli_query($conn, $sql);
//$result = true;
if ($result && $_FILES['mainPhoto']['size'] != 0) {
    //쿼리가 성공하고 사진을 변경했다면

    //등록이 되었으면 해당 폴더 안에 있는 이미지를 지우고 수정한 이미지를 넣는다
    $path = $_SERVER['DOCUMENT_ROOT']."/img/lectureMainPhoto/".$lectureId;
    $deletePath = $_SERVER['DOCUMENT_ROOT'] . "/img/lectureMainPhoto/" . $lectureId . "/" . $_POST['oldMainPhoto'];
    $tmp_name = $_FILES['mainPhoto']['tmp_name'];

    if (is_file($deletePath)) {
        //해당 폴더가 있는지 확인한다 있으면?
        $deleteCheck = unlink($deletePath);
        $movecheck = move_uploaded_file($tmp_name, $path . '/' .$mainPhoto);

        if ($deleteCheck && $movecheck) {
            header("Location: " . $_SERVER['HTTP_ORIGIN'] . "/admin/index.php?mode=view&lectureId=" . $lectureId);

        }
    }
} else if($result && $_FILES['mainPhoto']['size'] == 0) {
    //쿼리가 성공하고 사진을 변경하지 않았다면
    header("Location: " . $_SERVER['HTTP_ORIGIN'] . "/admin/index.php?mode=view&lectureId=" . $lectureId);
}