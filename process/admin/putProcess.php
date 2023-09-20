<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/key.php";

print_r($_POST);

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

if ($check) {
//확장자가 올바르면

    $sql = "
        INSERT INTO lecture
            (
             categorization,
             title,
             teacher,
             level,
             mainPhoto,
             authorityId
            )
        VALUES
            (
             '{$_POST['categorization']}',
             '{$_POST['title']}',
             '{$_POST['teacher']}',
             '{$_POST['level']}',
             '{$_FILES['mainPhoto']['name']}',
             '{$_POST['authorityId']}'
        )";

    $result = mysqli_query($conn, $sql);

    //등록된 강의정보의 id값을 가져옴
    $lastId = mysqli_insert_id($conn);

    if ($result) {
        //등록이 되었으면 폴더를 만든다
        $path = $_SERVER['DOCUMENT_ROOT']."/img/lectureMainPhoto/".$lastId;
        $tmp_name = $_FILES['mainPhoto']['tmp_name'];

        if (!is_dir($path)) {
            //해당 폴더가 없으면 폴더를 만든다
            $dircheck = mkdir($path);

            if($dircheck) {
                $movecheck = move_uploaded_file($tmp_name, $path . '/' . $_FILES['mainPhoto']['name']);
                if($movecheck) {
                    header('Location: http://practice.hackers.com/');
                }
            }
        }
    }
}

