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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <!--[if lte IE 9]>
    <script src="/js/common/place_holder.js"></script> <![endif]-->

</head>
<body>
<div id="skip-nav">
    <a href="#content">본문 바로가기</a>
</div>
<div id="container" class="container-full">
    <div id="content" class="content">
        <div class="inner">
            <div class="tit-box-h3">
                <h3 class="tit-h3">강의 등록</h3>
                <div class="sub-depth">
                    <span><i class="icon-home"><span>홈</span></i></span>
                    <strong>강의등록</strong>
                </div>
            </div>

            <div class="section-content">
                <table border="0" cellpadding="0" cellspacing="0" class="tbl-col-join">
                    <caption class="hidden">강의정보</caption>
                    <colgroup>
                        <col style="width:15%"/>
                        <col style="*"/>
                    </colgroup>
                    <tbody>
                    <form action="/process/admin/putProcess.php" enctype="multipart/form-data" method="post" id="putLectureForm">
                        <tr>
                            <th scope="col"><span class="icons">*</span>강의 제목</th>
                            <td><input name="title" type="text" class="input-text" style="width:302px"/></td>
                        </tr>
                        <tr>
                            <th scope="col"><span class="icons">*</span>강사 이름</th>
                            <td><input name="teacher" type="text" class="input-text" style="width:302px"/></td>
                        </tr>
                        <tr>
                            <th scope="col"><span class="icons">*</span>학습 난이도</th>
                            <td><input name="level" type="text" class="input-text" style="width:302px" /></td>
                        </tr>
                        <tr>
                            <th scope="col"><span class="icons">*</span>썸네일</th>
                            <td><input name="mainPhoto" type="file" class="input-text" style="width:302px"/></td>
                        </tr>
                        <tr>
                            <th scope="col"><span class="icons">*</span>분류</th>
                            <td>
                                <select name="categorization" class="input-sel" style="width:160px">
                                    <option value="1">일반직무</option>
                                    <option value="2">산업직무</option>
                                    <option value="3">공통역량</option>
                                    <option value="4">어학 및 자격증</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">관리자 ID</th>
                            <td><input readonly value="<?= $_SESSION['authorityId']?>" name="authorityId" type="text" class="input-text" style="width:302px"/></td>
                        </tr>
                    </form>
                    </tbody>
                </table>
                <div class="box-btn">
                    <button class="btn-l" form="putLectureForm">강의 등록</button>
                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>
