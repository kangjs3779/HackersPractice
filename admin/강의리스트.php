<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">
<!--[if (IE 7)]>
<html class="no-js ie7" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko"><![endif]-->
<!--[if (IE 8)]>
<html class="no-js ie8" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko"><![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" id="X-UA-Compatible" content="IE=EmulateIE8"/>
    <title>해커스 HRD</title>
    <meta name="description" content="해커스 HRD"/>
    <meta name="keywords" content="해커스, HRD"/>

    <!-- 파비콘설정 -->
    <link rel="shortcut icon" type="image/x-icon" href="http://img.hackershrd.com/common/favicon.ico"/>

    <!-- xhtml property속성 벨리데이션 오류/확인필요 -->
    <meta property="og:title" content="해커스 HRD"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="http://www.hackershrd.com/"/>
    <meta property="og:image" content="http://img.hackershrd.com/common/og_logo.png"/>

    <link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/common.css"/>
    <link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/bxslider.css"/>
    <link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/main.css"/><!-- main페이지에만 호출 -->
    <link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/sub.css"/><!-- sub페이지에만 호출 -->
    <link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/login.css"/>
    <!-- login페이지에만 호출 -->

    <script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript"
            src="http://q.hackershrd.com/worksheet/js/plugins/bxslider/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/plugins/bxslider/bxslider.js"></script>
    <script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/ui.js"></script>
    <!--[if lte IE 9]>
    <script src="/js/common/place_holder.js"></script> <![endif]-->

</head>
<body>

<div id="content" class="content" style="width: 1000px; margin: auto;">
    <div class="tit-box-h3">
        <br/>
        <h3 class="tit-h3">강의 리스트</h3>
        <div class="sub-depth">
            <span><i class="icon-home"><span>홈</span></i></span>
            <span>관리자페이지</span>
            <strong>강의리스트</strong>
        </div>
    </div>

    <table border="0" cellpadding="0" cellspacing="0" class="tbl-bbs">
        <caption class="hidden">수강후기</caption>
        <colgroup>
            <col style="width:8%"/>
            <col style="width:8%"/>
            <col style="*"/>
            <col style="width:15%"/>
            <col style="width:12%"/>
        </colgroup>

        <thead>
        <tr>
            <th scope="col">번호</th>
            <th scope="col">분류</th>
            <th scope="col">제목</th>
            <th scope="col">강사이름</th>
            <th scope="col">관리자</th>
        </tr>
        </thead>

        <tbody>
        <!-- set -->
        <?php
            for($i = 0; $i < $resultNumRow; $i++) {
        ?>

            <tr class="bbs-sbj">
                <td><?=$record[$i][0]?></td>
                <td><?=$record[$i][1]?></td>
                <td>
                    <a href="/admin/index.php?mode=view&lectureId=<?=$record[$i][0]?>">
                        <strong class="ellipsis_line"><?=$record[$i][2]?></strong>
                    </a>
                </td>
                <td class="last"><?=$record[$i][3]?></td>
                <td class="last"><?=$record[$i][10]?></td>
            </tr>

        <?php
            }
        ?>

        <!-- //set -->
        </tbody>
    </table>

    <div class="box-paging">
        <!--        페이지네이션-->
    </div>

    <div class="box-paging">
        <?php
        echo '<a href="/admin/index.php?mode=list&page=1"><i class="icon-first"><span class="hidden">첫페이지</span></i></a>';
        echo '<a href="/admin/index.php?mode=list&page=' . ($currentPage - 1) . '"><i class="icon-prev"><span class="hidden">이전페이지</span></i></a>';
        for ($i = $paginationArr['startPage']; $i <= $paginationArr['endPage']; $i++) {
            //페이지네이션 숫자
            echo '<a href="/admin/index.php?mode=list&page=' . $i . '" class="' . (isset($_GET['page']) && $_GET['page'] == $i ? 'active' : '') . '">' . $i . '</a>';
        }
        echo '<a href="/admin/index.php?mode=list&page=' . ($currentPage + 1) . '"><i class="icon-next"><span class="hidden">다음페이지</span></i></a>';
        echo '<a href="/admin/index.php?mode=list&page=' . $paginationArr['totalPage'] . '"><i class="icon-last"><span class="hidden">마지막페이지</span></i></a>';
        ?>
    </div>

    <div class="box-btn t-r">
        <a href="/admin/index.php?mode=put" class="btn-m">강의 등록</a>
    </div>
</div>
</div>

</body>
</html>
