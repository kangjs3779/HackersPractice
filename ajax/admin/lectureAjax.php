<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/key.php";

// 확장자 검사 함수
function extCheck($fileExt) {
    $check = false;
    switch ($fileExt) {
        case 'jpeg':
        case 'jpg':
        case 'png':
            $check = true;
            break;
    }
    return $check;
}

//강의를 등록할 때
if ($_POST['mode'] == 'put') {
    // 파일타입 및 확장자 체크
    $mainPhoto = explode("/", $_FILES['mainPhoto']['type']);

    $extCheck = extCheck($mainPhoto[1]);

    if ($extCheck) {
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
            $path = $_SERVER['DOCUMENT_ROOT'] . "/img/lectureMainPhoto/" . $lastId;
            $tmp_name = $_FILES['mainPhoto']['tmp_name'];

            if (!is_dir($path)) {
                //해당 폴더가 없으면 폴더를 만든다
                $dircheck = mkdir($path);

                if ($dircheck) {
                    $movecheck = move_uploaded_file($tmp_name, $path . '/' . $_FILES['mainPhoto']['name']);
                }
            }
        }
    }

    //값을 JSON으로 변환함
    $responseData = [
        'lectureId' => $lastId,
    ];

    //http header에 정보를 보내준다
    //application/json타입으로 보내준다
    header('Content-Type: application/json');

    //해당 데이터를 json으로 변환한다
    echo json_encode($responseData);
}


//강의를 수정할 때
if ($_POST['mode'] == 'modify') {
    if($_FILES != null) {
        //썸네일을 변경했다면
        $mainPhoto = explode("/", $_FILES['newMain']['type']);

        // 파일 확장자
        $extCheck = extCheck($mainPhoto[1]);

        $mainPhoto = $extCheck ? $_FILES['newMain']['name'] : '';

    } else {
        //변경 안했으면
        $mainPhoto = $_POST['oldMainPhoto'];
    }

    $lectureId = $_POST['lectureId'];
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

    if ($result && $_FILES != null) {
        //쿼리가 성공하고 사진을 변경했다면

        //해당 폴더 안에 있는 이미지를 지우고 수정한 이미지를 넣는다
        $path = $_SERVER['DOCUMENT_ROOT']."/img/lectureMainPhoto/".$lectureId;
        $deletePath = $_SERVER['DOCUMENT_ROOT'] . "/img/lectureMainPhoto/" . $lectureId . "/" . $_POST['oldMainPhoto'];
        $tmp_name = $_FILES['newMain']['tmp_name'];

        if (is_file($deletePath)) {
            //해당 폴더가 있는지 확인한다 있으면?
            $deleteCheck = unlink($deletePath);
            $movecheck = move_uploaded_file($tmp_name, $path . '/' .$mainPhoto);

        }
    }
}

//강의를 삭제할 떄
if ($_POST['mode'] == 'delete') {
    $lectureId = $_POST['lectureId'];

    $findDeleteInfoQuery = "SELECT * FROM lecture WHERE id = {$lectureId}";
    $findDeleteResult = mysqli_query($conn, $findDeleteInfoQuery);
    $row = mysqli_fetch_array($findDeleteResult);

    $path = $_SERVER['DOCUMENT_ROOT'] . "/img/lectureMainPhoto/" . $row['id'];
    $file = $_SERVER['DOCUMENT_ROOT'] . "/img/lectureMainPhoto/" . $row['id'] . "/" . $row['mainPhoto'];

    if (is_dir($path)) {
        //해당 폴더 있는지 확인
        if (unlink($file) && rmdir($path)) {
            //썸네일 사진과 해당 폴더 삭제

            //해당 강의의 후기를 모두 삭제한 후 강의 삭제
            $reviewSQL = "DELETE FROM review WHERE lectureId = {$lectureId}";
            $reviewResult = mysqli_query($conn, $reviewSQL);

            if($reviewResult) {
                $sql = "DELETE FROM lecture WHERE id = {$lectureId}";
                $result = mysqli_query($conn, $sql);
            }
        }
    }
}