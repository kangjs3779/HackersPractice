<!DOCTYPE html
        PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<div id="container" class="container-full">
    <div id="content" class="content">
        <div class="inner">
            <div class="tit-box-h3">
                <h3 class="tit-h3">회원가입</h3>
                <div class="sub-depth">
                    <span><i class="icon-home"><span>홈</span></i></span>
                    <strong>회원가입 완료</strong>
                </div>
            </div>

            <div class="join-step-bar">
                <ul>
                    <li><i class="icon-join-agree"></i> 약관동의</li>
                    <li class="on"><i class="icon-join-chk"></i> 본인확인</li>
                    <li class="last"><i class="icon-join-inp"></i> 정보입력</li>
                </ul>
            </div>

            <div class="tit-box-h4">
                <h3 class="tit-h4">본인인증</h3>
            </div>

            <div class="section-content after">
                <div class="identify-box" style="width:100%;height:190px;">
                    <div class="identify-inner">
                        <strong>휴대폰 인증</strong>
                        <p>주민번호 없이 메시지 수신가능한 휴대폰으로 1개 아이디만 회원가입이 가능합니다. </p>

                        <br/>
                        <input type="text" class="input-text phone-num" style="width:50px"/> -
                        <input type="text" class="input-text phone-num" style="width:50px"/> -
                        <input type="text" class="input-text phone-num" style="width:50px"/>
                        <button class="btn-s-line" id="send-veri-code-btn">인증번호 받기</button>
                        <br/><br/>
                        <input type="text" class="input-text" id="veri-code-input" style="width:200px"/>
                        <button id="check-veri-code-btn" class="btn-s-line">인증번호 확인</button>
                    </div>
                    <i class="graphic-phon"><span>휴대폰 인증</span></i>
                </div>
            </div>

        </div>
    </div>
</div>

    <script src="/js/join/step02VeriCode.js?t=<?=time()?>"></script>
<!-- <script src="/HackersPractice/js/join/step02VeriCode.js"></script> -->
	<script src="/js/join/ajax/step02Ajax.js?t=<?=time()?>"></script>
<!-- <script src="/HackersPractice/js/join/ajax/step02Ajax.js"></script> -->
</body>

</html>