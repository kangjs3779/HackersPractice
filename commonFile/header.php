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

    <?= isset($_GET['mode']) ?
        '<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/sub.css"/>' :
        ' <link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/main.css"/>'?>
    <?= $_GET['mode'] == 'login' ? '<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/login.css"/>' : ''?>

    <script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript"
            src="http://q.hackershrd.com/worksheet/js/plugins/bxslider/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/plugins/bxslider/bxslider.js"></script>
    <script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/ui.js"></script>
    <!--[if lte IE 9]>
    <script src="/js/common/place_holder.js"></script> <![endif]-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
</head>
<body>

<?php if ($_GET['mode'] != 'login') { ?>
<!-- skip nav -->
<div id="skip-nav">
    <a href="#content">본문 바로가기</a>
</div>

<!-- //skip nav -->
<div id="wrap">
    <div id="header" class="header">

        <div class="nav-section">
            <div class="inner p-r">
                <h1><a href="/"><img src="http://img.hackershrd.com/common/logo.png" alt="해커스 HRD LOGO" width="165"
                                     height="37"/></a></h1>
                <div class="nav-box">
                    <h2 class="hidden">주메뉴 시작</h2>

                    <ul class="nav-main-lst">
                        <li class="mnu">
                            <a href="#">일반직무</a>
                            <ul class="nav-sub-lst">
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                            </ul>
                        </li>
                        <li class="mnu2">
                            <a href="#">산업직무</a>
                            <ul class="nav-sub-lst">
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                            </ul>
                        </li>
                        <li class="mnu3">
                            <a href="#">공통역량</a>
                            <ul class="nav-sub-lst">
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                            </ul>
                        </li>
                        <li class="mnu4">
                            <a href="#">어학 및 자격증</a>
                            <ul class="nav-sub-lst">
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                            </ul>
                        </li>
                        <li class="mnu5">
                            <a href="/review/index.php?mode=list">직무교육 안내</a>
                            <ul class="nav-sub-lst">
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                            </ul>
                        </li>
                        <li class="mnu6">
                            <a href="<?= isset($_SESSION['authorityId']) ? '/admin/index.php?mode=put ' : '#' ?>"><?= isset($_SESSION['authorityId']) ? '강의 등록' : '내 강의실' ?></a>
                            <ul class="nav-sub-lst">
                                <li>
                                    <a href="<?= isset($_SESSION['authorityId']) ? '/admin/index.php?mode=list ' : '#' ?>"><?= isset($_SESSION['authorityId']) ? '강의 리스트' : '서브메뉴' ?></a>
                                </li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                                <li><a href="#">서브메뉴</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="nav-sub-box">
                <div class="inner"><!-- <a href="#"><img src="/" alt="배너이미지" width="171" height="196"></a> --></div>
            </div>

        </div>

        <div class="top-section">
            <div class="inner">
                <div class="link-box">
                    <!-- 로그인전 -->
                    <?php
                    if (isset($_SESSION['memberId']) && isset($_SESSION['password'])) {
                        $memberId = $_SESSION['memberId'];
                        //로그인 후
                        echo "<a href='/login/index.php?mode=logout'>로그아웃</a>";
                        echo "<a href='/member/index.php?mode=modify'>내정보</a>";
                        echo "<a href='#'>상담/고객센터</a>";
                    } else {
                        //로그인 전
                        echo "<a href='/login/index.php?mode=login'>로그인</a>";
                        echo "<a href='/member/index.php?mode=step_01'>회원가입</a>";
                        echo "<a href='#'>상담/고객센터</a>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php }