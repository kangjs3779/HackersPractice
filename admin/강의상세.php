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
        <h3 class="tit-h3">강의 상세</h3>
        <div class="sub-depth">
            <span><i class="icon-home"><span>홈</span></i></span>
            <span>직무교육 안내</span>
            <strong>수강후기</strong>
        </div>
    </div>


    <!-- set -->
    <table border="0" cellpadding="0" cellspacing="0" class="tbl-lecture-list">
        <caption class="hidden">강의정보</caption>
        <colgroup>
            <col style="width:166px"/>
            <col style="*"/>
            <col style="width:110px"/>
        </colgroup>
        <tbody>
        <tr>
            <td>
                <a href="#" class="sample-lecture">
                    <img src="<?= '/img/lectureMainPhoto/' . $row['id'] . "/" . $row['mainPhoto'] ?>" alt="" width="144" height="101"/>
                    <span class="tc-brand">샘플강의 ▶</span>
                </a>
            </td>
            <td class="lecture-txt">
                <em class="tit mt10"><?= $row['title'] ?></em>
                <p class="tc-gray mt20">강사: <?= $row['teacher'] ?> | 학습난이도 : <?= $row['level'] ?> | 교육시간: 18시간 (18강)</p>
            </td>
        </tr>
        </tbody>
    </table>

    <div class="box-btn t-r">
        <a href="/admin/index.php?mode=list" class="btn-m-gray">목록</a>
        <?php
        if ($_SESSION['authorityId'] == $row['authorityId']) {

            ?>
            <a href="/admin/index.php?mode=modify&lectureId=<?= $_GET['lectureId'] ?>" class="btn-m ml5">수정</a>
            <a href="/admin/index.php?mode=delete&lectureId=<?= $_GET['lectureId'] ?>" id="delete-btn"
               class="btn-m-dark">삭제</a>
            <?php
        }
        ?>
    </div>
</div>
</div>
<script>
    $("#delete-btn").click(function () {
        alert("후기를 삭제하시겠습니까?");
    })
</script>

</body>
</html>
