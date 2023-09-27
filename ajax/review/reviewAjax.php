<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/key.php";
session_start();


// 수강 후기 수정할 때
if ($_POST['mode'] == 'modify_review') {

    $reviewId = $_POST['reviewId'];
    $lectureId = $_POST['lectureId'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $satisfaction = $_POST['satisfaction'];

    $sql = "
            UPDATE review
            SET
                lectureId = {$lectureId},
                title = '{$title}',
                satisfaction = '{$satisfaction}',
                content = '{$content}'
            WHERE id = {$reviewId};
            ";

    $result = mysqli_query($conn, $sql);
    $check = false;

    if ($result) {
        header("Location: " . $_SERVER['HTTP_ORIGIN'] . "/review/index.php?mode=view&reviewId=" . $reviewId);
    }
}

//수강 후기 등록할 때
if ($_POST['mode'] == 'write_review') {

    $memberId = $_SESSION['memberId'];
    $lectureId = $_POST['lectureId'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $satisfaction = $_POST['satisfaction'];

    $sql = "
        INSERT INTO review
            (memberId, lectureId, title, content, satisfaction)
        VALUES
            ('{$memberId}', '{$lectureId}', '{$title}', '{$content}', '{$satisfaction}')
        ";

    $result = mysqli_query($conn, $sql);
    $lastId = mysqli_insert_id($conn);

    if ($result) {
        header("Location: " . $_SERVER['HTTP_ORIGIN'] . "/review/index.php?mode=view&reviewId=" . $lastId);
    }
}

//후기 삭제할 때
if ($_POST['mode'] == 'delete_review') {

    $reviewId = $_POST['reviewId'];
    $sql = "DELETE FROM review WHERE id = {$reviewId}";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $responseData = [
            'result' => true
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($responseData);
}


//카테고리 검색
if ($_GET['mode'] == 'category_tab_search') {
    $category = $_GET['category'];

    $sql = "SELECT * FROM review
            JOIN lecture ON review.lectureId=lecture.id
            JOIN member ON review.memberId=member.id
            LEFT JOIN(SELECT id FROM review ORDER BY view DESC LIMIT 3)as best ON review.id=best.id
        WHERE lecture.categorization = {$category}
        AND best.id IS NULL";

    $result = mysqli_query($conn, $sql);
    $totalRow = mysqli_num_rows($result);

    $record = array();

    for ($i = 0; $i < $totalRow; $i++) {
        $row = mysqli_fetch_array($result);
        $record[$i] = $row;
    }

    //http header에 정보를 보내준다
    //application/json타입으로 보내준다
    header('Content-Type: application/json');

    //해당 데이터를 json으로 변환한다
    echo json_encode($record);
}

//후기 등록/수정 시 분류에 따른 강의 조회
if ($_GET['mode'] == 'category_lecture') {
    $categorization = $_GET['categorization'];

    $sql = "SELECT * FROM lecture WHERE categorization = {$categorization}";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);

    $record = array();

    for($i = 0; $i < $num_rows; $i++) {
        $row = mysqli_fetch_array($result);
        $record[$i] = $row;
    }

    //http header에 정보를 보내준다
    //application/json타입으로 보내준다
    header('Content-Type: application/json');

    //해당 데이터를 json으로 변환한다
    echo json_encode($record);
}

if($_POST['mode'] == 'search_input') {

    $category = $_POST['category'];
    $type = $_POST['type'];
    $search = $_POST['search'];

    $lectureSQL = "lecture.title";
    $writerSQL = "member.name";

    $sql = "SELECT * FROM review
            JOIN lecture ON review.lectureId = lecture.id
            JOIN member ON review.memberId = member.id
            LEFT JOIN (SELECT id FROM review ORDER BY view DESC LIMIT 3) as best ON review.id = best.id
        WHERE lecture.categorization = {$category}
          AND best.id IS NULL
          AND ".($type == 1 ? $lectureSQL : $writerSQL)." LIKE '%".$search."%'";

    $result = mysqli_query($conn, $sql);
    $totalRow = mysqli_num_rows($result);

    $record = array();

    for($i = 0; $i < $totalRow; $i++) {
        $row = mysqli_fetch_array($result);
        $record[$i] = $row;
    }


    //http header에 정보를 보내준다
    //application/json타입으로 보내준다
    header('Content-Type: application/json');

    //해당 데이터를 json으로 변환한다
    echo json_encode($record);
}