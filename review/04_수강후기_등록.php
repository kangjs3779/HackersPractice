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
            <li>욕설(욕설을 표현하는 자음어/기호표현 포함) 및 명예훼손, 비방,도배글, 상업적 목적의 홍보성 게시글 등 사회상규에 반하는 게시글 및 강의내용과 상관없는 서비스에 대해 작성한 글들은 삭제
                될 수 있으며, 법적 책임을 질 수 있습니다.
            </li>
        </ul>
    </div>

    <table border="0" cellpadding="0" cellspacing="0" class="tbl-col">
        <caption class="hidden">강의정보</caption>
        <colgroup>
            <col style="width:15%"/>
            <col style="*"/>
        </colgroup>
        <form name="tx_editor_form" id="tx_editor_form" action="/process/review/putProcess.php" method="post"
              accept-charset="utf-8">
            <tbody>
            <tr>
                <th scope="col">강의</th>
                <td>
                    <select class="input-sel" id="categorization-sel" style="width:160px">
                        <option value="">분류</option>
                        <option value="1">일반직무</option>
                        <option value="2">산업직무</option>
                        <option value="3">공통역량</option>
                        <option value="4">어휘 및 자격증</option>
                    </select>
                    <select class="input-sel ml5" name="lectureId" id="lecture-sel" style="width:454px">
                        <option value="">강의명</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th scope="col">제목</th>
                <td><input type="text" name="title" class="input-text" style="width:611px"/></td>
            </tr>
            <tr>
                <th scope="col">강의만족도</th>
                <td>
                    <ul class="list-rating-choice">
                        <li>
                            <label class="input-sp ico">
                                <input type="radio" name="satisfaction" value="100" checked="checked"/>
                                <span class="input-txt">만점</span>
                            </label>
                            <span class="star-rating">
                                        <span class="star-inner" style="width:100%"></span>
                                    </span>
                        </li>
                        <li>
                            <label class="input-sp ico">
                                <input type="radio" name="satisfaction" value="80"/>
                                <span class="input-txt">만점</span>
                            </label>
                            <span class="star-rating">
                                        <span class="star-inner" style="width:80%"></span>
                                    </span>
                        </li>
                        <li>
                            <label class="input-sp ico">
                                <input type="radio" name="satisfaction" value="60"/>
                                <span class="input-txt">만점</span>
                            </label>
                            <span class="star-rating">
                                        <span class="star-inner" style="width:60%"></span>
                                    </span>
                        </li>
                        <li>
                            <label class="input-sp ico">
                                <input type="radio" name="satisfaction" value="40"/>
                                <span class="input-txt">만점</span>
                            </label>
                            <span class="star-rating">
                                        <span class="star-inner" style="width:40%"></span>
                                    </span>
                        </li>
                        <li>
                            <label class="input-sp ico">
                                <input type="radio" name="satisfaction" value="20"/>
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
        <a class="btn-m ml5" onclick='saveContent()'>저장</a>
    </div>
</div>
</form>
</div>
<script type="text/javascript" src="/js/review/ajax/putReviewForm.js"></script>
