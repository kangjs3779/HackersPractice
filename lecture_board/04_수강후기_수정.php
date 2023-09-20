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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
    <div id="skip-nav">
        <a href="#content">본문 바로가기</a>
    </div>
    <div id="content" class="content">
        <div class="tit-box-h3">
            <h3 class="tit-h3">수강후기</h3>
            <div class="sub-depth">
                <span><i class="icon-home"><span>홈</span></i></span>
                <span>직무교육 안내</span>
                <strong>수강후기</strong>
            </div>
        </div>

        <div class="user-notice">
            <strong class="fs16">유의사항 안내</strong>
            <ul class="list-guide mt15">
                <li class="tc-brand">수강후기는 신청하신 강의의 학습진도율 25%이상 달성시 작성가능합니다.</li>
                <li>욕설(욕설을 표현하는 자음어/기호표현 포함) 및 명예훼손, 비방,도배글, 상업적 목적의 홍보성 게시글 등 사회상규에 반하는 게시글 및 강의내용과 상관없는 서비스에 대해 작성한
                    글들은 삭제 될 수 있으며, 법적 책임을 질 수 있습니다.
                </li>
            </ul>
        </div>

        <table border="0" cellpadding="0" cellspacing="0" class="tbl-col">
            <caption class="hidden">강의정보</caption>
            <colgroup>
                <col style="width:15%"/>
                <col style="*"/>
            </colgroup>
            <form name="tx_editor_form" id="tx_editor_form" action="/process/review/modifyProcess.php" method="post" accept-charset="utf-8">
                <input type="hidden" value="<?=$_GET['reviewId']?>" name="reviewId"/>
                <tbody>
                <tr>
                    <th scope="col">강의</th>
                    <td>
                        <select class="input-sel" id="categorization-sel" style="width:160px">
                            <option value="">분류</option>
                            <option value="1" <?=$row['categorization'] == 1 ? 'selected' : ''?>>일반직무</option>
                            <option value="2" <?=$row['categorization'] == 2 ? 'selected' : ''?>>산업직무</option>
                            <option value="3" <?=$row['categorization'] == 3 ? 'selected' : ''?>>공통역량</option>
                            <option value="4" <?=$row['categorization'] == 4 ? 'selected' : ''?>>어휘 및 자격증</option>
                        </select>
                        <select class="input-sel ml5" name="lectureId" id="lecture-sel" style="width:454px">
                            <option value="<?=$row['lectureId']?>"><?=$row['title']?></option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th scope="col">제목</th>
                    <td><input type="text" name="title" class="input-text" style="width:611px" value="<?=$row[3]?>"/></td>
                </tr>
                <tr>
                    <th scope="col">강의만족도</th>
                    <td>
                        <ul class="list-rating-choice">
                            <li>
                                <label class="input-sp ico">
                                    <input type="radio" name="satisfaction" value="100" <?=$row['satisfaction'] == 100? 'checked' : ''?>/>
                                    <span class="input-txt">만점</span>
                                </label>
                                <span class="star-rating">
									<span class="star-inner" style="width:100%"></span>
								</span>
                            </li>
                            <li>
                                <label class="input-sp ico">
                                    <input type="radio" name="satisfaction" value="80" <?=$row['satisfaction'] == 80? 'checked' : ''?>/>
                                    <span class="input-txt">만점</span>
                                </label>
                                <span class="star-rating">
									<span class="star-inner" style="width:80%"></span>
								</span>
                            </li>
                            <li>
                                <label class="input-sp ico">
                                    <input type="radio" name="satisfaction" value="60" <?=$row['satisfaction'] == 60? 'checked' : ''?>/>
                                    <span class="input-txt">만점</span>
                                </label>
                                <span class="star-rating">
									<span class="star-inner" style="width:60%"></span>
								</span>
                            </li>
                            <li>
                                <label class="input-sp ico">
                                    <input type="radio" name="satisfaction" value="40" <?=$row['satisfaction'] == 40? 'checked' : ''?>/>
                                    <span class="input-txt">만점</span>
                                </label>
                                <span class="star-rating">
									<span class="star-inner" style="width:40%"></span>
								</span>
                            </li>
                            <li>
                                <label class="input-sp ico">
                                    <input type="radio" name="satisfaction" value="20" <?=$row['satisfaction'] == 20? 'checked' : ''?>/>
                                    <span class="input-txt">만점</span>
                                </label>
                                <span class="star-rating">
									<span class="star-inner" style="width:20%"></span>
								</span>
                            </li>
                        </ul>
                    </td>
                </tr>
                </tbody>
        </table>

        <div class="editor-wrap">
            <?php
            include_once($_SERVER['DOCUMENT_ROOT'] . "/daumEditor/editor.php");
            ?>
        </div>

        <div class="box-btn t-r">
            <a href="#" class="btn-m-gray">목록</a>
            <a href="#" class="btn-m ml5" onclick='saveContent()'>수정 </a>
        </div>
    </div>
</form>
</div>
<script type="text/javascript" src="/js/review/ajax/putReviewForm.js"></script>

</body>
</html>
