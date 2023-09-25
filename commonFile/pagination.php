<?php
//페이지네이션 생성 시 필수 변수 목록
$paginationBlock = 10; //페이지네이션 한 블럭의 개수
//$listCount = 0; //해당 페이지에 보여줄 리스트의 개수
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; //현재 페이지, 페이지 안눌렀으면 1로 간주함
//$startIndex = ($currentPage - 1) * $listCount; //DB의 시작 인덱스 구하는 식
//$totalRecordQeury = ""; //해당 테이블의 총 레코드 수를 구하는 쿼리 변수
//$totalRecordCount = 0; //총 레코드의 수
$totalPage = 0; //필요한 페이지네이션의 수
//$isBest = best게시글 넣을 것인지 안넣을 것인지 boolean


//페이지네이션 로직 함수
function paginationProcess($listCount, $totalRecordCount, $currentPage, $paginationBlock, $isBest)
{

    //DB의 시작 인덱스 구하는 식
    $startIndex = ($currentPage - 1) * $listCount;
    $totalPage = $totalRecordCount % $listCount == 0 ? $totalRecordCount / $listCount : ceil(($totalRecordCount / $listCount));

    if ($paginationBlock >= $totalPage) {
        //총 필요한 페이지가 페이지네이션블럭의 수보다 작으면?
        $startPage = 1;
        $endPage = $totalPage;

    } else {
        //총 필요한 페이지가 페이지네이션블럭의 수보다 크면? ex) total = 50, 90
        if ($totalPage % $paginationBlock == 0) {
            //총 페이지가 블럭보다 크고 나누었을 때 0이 된다면
            if ($currentPage >= 1 && $currentPage <= 10) {
                $startPage = 1;
                $endPage = 10;

            } else {
                $startPage =
                    $currentPage % $paginationBlock != 0 ?
                        (floor($currentPage / $paginationBlock) * $paginationBlock) + 1 :
                        ((floor($currentPage / $paginationBlock) - 1) * $paginationBlock) + 1;

                $endPage = $startPage + 9;
            }

        } else {
            //총 페이지가 블럭보다 크고 나우었을 때 0이 안된다면
            if ($currentPage >= 1 && $currentPage <= 10) {
                $startPage = 1;
                $endPage = 10;

            } else {
                $startPage =
                    $currentPage % $paginationBlock != 0 ?
                        (floor($currentPage / $paginationBlock) * $paginationBlock) + 1 :
                        ((floor($currentPage / $paginationBlock) - 1) * $paginationBlock) + 1;

                $endPage =
                    floor($totalPage / $paginationBlock) == floor($currentPage / $paginationBlock)
                    && $currentPage % $paginationBlock != 0 ?
                        $totalPage :
                        $startPage + 9;
            }
        }
    }

    $listCount = $currentPage == 1 && $isBest ? $listCount - 3 : $listCount;

    $nextPage = $totalPage > $currentPage ? $currentPage + 1 : $currentPage;
    $prePage = $currentPage > 1 ? $currentPage - 1 : 1;

    //필요한 값 배열에 저장
    $paginationArr = [
        'startIndex' => $startIndex,
        'totalPage' => $totalPage,
        'listCount' => $listCount,
        'startPage' => $startPage,
        'endPage' => $endPage,
        'isBest' => $isBest,
        'nextPage' => $nextPage,
        'prePage' => $prePage

    ];

    return $paginationArr;
}

if (strpos($_SERVER['SCRIPT_FILENAME'], 'review') && $_GET['mode'] == 'view') {
    // 수강 후기 상세 페이지라면?

    $totalRecordQeury = "SELECT COUNT(*)
                         FROM review
                            JOIN member ON review.memberId = member.id
                            JOIN lecture ON review.lectureId = lecture.id";

    $recordCountResult = mysqli_query($conn, $totalRecordQeury);
    $totalRecordCount = mysqli_fetch_array($recordCountResult)[0];
    $isBest = false;

    $paginationArr = paginationProcess(5, $totalRecordCount, $currentPage, $paginationBlock, $isBest);

} else if (strpos($_SERVER['SCRIPT_FILENAME'], 'review') && $_GET['mode'] == 'list') {
    // 수강 후기 리스트 페이지라면?

    $totalRecordQeury = "SELECT COUNT(*)
                         FROM review
                            JOIN member ON review.memberId = member.id
                            JOIN lecture ON review.lectureId = lecture.id
                         ";

    $recordCountResult = mysqli_query($conn, $totalRecordQeury);
    $totalRecordCount = mysqli_fetch_array($recordCountResult)[0];
    $isBest = true;
    
    $paginationArr = paginationProcess(20, $totalRecordCount, $currentPage, $paginationBlock, $isBest);
} else if (strpos($_SERVER['SCRIPT_FILENAME'], 'admin') && $_GET['mode'] == 'list') {
    //관리자페이지 강의 리스트라면?

    $totalRecordQeury = "SELECT COUNT(*) 
                         FROM lecture 
                             JOIN authority ON lecture.authorityId = authority.id 
                         ORDER BY lecture.inserted DESC";
    $recordCountResult = mysqli_query($conn, $totalRecordQeury);
    $totalRecordCount = mysqli_fetch_array($recordCountResult)[0];
    $isBest = false;

    $paginationArr = paginationProcess(10, $totalRecordCount, $currentPage, $paginationBlock, $isBest);
}