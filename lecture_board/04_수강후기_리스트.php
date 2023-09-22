
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">
<!--[if (IE 7)]><html class="no-js ie7" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko"><![endif]-->
<!--[if (IE 8)]><html class="no-js ie8" xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko"><![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" id="X-UA-Compatible" content="IE=EmulateIE8" />
<title>해커스 HRD</title>
<meta name="description" content="해커스 HRD" />
<meta name="keywords" content="해커스, HRD" />

<!-- 파비콘설정 -->
<link rel="shortcut icon" type="image/x-icon" href="http://img.hackershrd.com/common/favicon.ico" />

<!-- xhtml property속성 벨리데이션 오류/확인필요 -->
<meta property="og:title" content="해커스 HRD" />
<meta property="og:type" content="website" />
<meta property="og:url" content="http://www.hackershrd.com/" />
<meta property="og:image" content="http://img.hackershrd.com/common/og_logo.png" />

<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/common.css" />
<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/bxslider.css" />
<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/main.css" /><!-- main페이지에만 호출 -->
<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/sub.css" /><!-- sub페이지에만 호출 -->
<link type="text/css" rel="stylesheet" href="http://q.hackershrd.com/worksheet/css/login.css" /><!-- login페이지에만 호출 -->

<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/plugins/bxslider/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/plugins/bxslider/bxslider.js"></script>
<script type="text/javascript" src="http://q.hackershrd.com/worksheet/js/ui.js"></script>
<!--[if lte IE 9]> <script src="/js/common/place_holder.js"></script> <![endif]-->

</head><body>

	<div id="content" class="content">
		<div class="tit-box-h3">
			<h3 class="tit-h3">수강후기</h3>
			<div class="sub-depth">
				<span><i class="icon-home"><span>홈</span></i></span>
				<span>직무교육 안내</span>
				<strong>수강후기</strong>
			</div>
		</div>

		<ul class="tab-list tab5">
			<li class="on"><a href="#">전체</a></li>
			<li><a href="#">일반직무</a></li>
			<li><a href="#">산업직무</a></li>
			<li><a href="#">공통역량</a></li>
			<li><a href="#">어학 및 자격증</a></li>
		</ul>

		<div class="search-info">
			<div class="search-form f-r">
				<select class="input-sel" style="width:158px">
					<option value="">분류</option>
				</select>
				<select class="input-sel" style="width:158px">
					<option value="">강의명</option>
					<option value="">작성자</option>
				</select>
				<input type="text" class="input-text" placeholder="강의명을 입력하세요." style="width:158px"/>
				<button type="button" class="btn-s-dark">검색</button>
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
					<th scope="col">강좌만족도</th>
					<th scope="col">작성자</th>
				</tr>
			</thead>
	 
			<tbody>
				<!-- set -->
                <?php
                if($_GET['page'] == 1 || !isset($_GET['page'])) {
                    for($i = 0; $i < 3; $i++) {
                        ?>
                        <tr class="bbs-sbj">
                            <td><span class="txt-icon-line"><em>BEST</em></span></td>
                            <td><?= $bestRecord[$i][22] ?></td>
                            <td>
                                <a href="/lecture_board/index.php?mode=view&reviewId=<?=$bestRecord[$i][0]?>">
                                    <span class="tc-gray ellipsis_line">수강 강의명 : <?= $bestRecord[$i]['title'] ?></span>
                                    <strong class="ellipsis_line"><?= $bestRecord[$i][3] ?></strong>
                                </a>
                            </td>
                            <td>
                            <span class="star-rating">
                                <span class="star-inner" style="width:80%"></span>
                            </span>
                            </td>
                            <td class="last"><?= $bestRecord[$i]['name'] ?></td>
                        </tr>
                <?php
                    }
                }

                ?>

				<!-- //set -->
				<!-- set -->
                <?php
                    for($i = 0; $i < $resultNumRow; $i++) {
                ?>
                        <tr class="bbs-sbj">
                            <td><?= $record[$i][0] ?></td>
                            <td><?= $record[$i][22] ?></td>
                            <td>
                                <a href="/lecture_board/index.php?mode=view&reviewId=<?=$record[$i][0]?>">
                                    <span class="tc-gray ellipsis_line">수강 강의명 : <?= $record[$i]['title'] ?></span>
                                    <strong class="ellipsis_line"><?= $record[$i][3] ?></strong>
                                </a>
                            </td>
                            <td>
						<span class="star-rating">
							<span class="star-inner" style="width:<?= $record[$i]['satisfaction'] ?>%"></span>
						</span>
                            </td>
                            <td class="last"><?= $record[$i]['name'] ?></td>
                        </tr>
                <?php
                    }
                ?>

				<!-- //set -->
			</tbody>
		</table>

		<div class="box-paging">
            <?php
                echo '<a href="/lecture_board/index.php?mode=list&page=1"><i class="icon-first"><span class="hidden">첫페이지</span></i></a>';
                echo '<a href="/lecture_board/index.php?mode=list&page=' . $paginationArr['prePage'] . '"><i class="icon-prev"><span class="hidden">이전페이지</span></i></a>';
                for ($i = $paginationArr['startPage']; $i <= $paginationArr['endPage']; $i++) {
                    //페이지네이션 숫자
                    echo '<a href="/lecture_board/index.php?mode=list&page=' . $i . '" class="' . (isset($_GET['page']) && $_GET['page'] == $i ? 'active' : '') . '">' . $i . '</a>';
                }
                echo '<a href="/lecture_board/index.php?mode=list&page=' . $paginationArr['nextPage'] . '"><i class="icon-next"><span class="hidden">다음페이지</span></i></a>';
                echo '<a href="/lecture_board/index.php?mode=list&page=' . $paginationArr['totalPage'] . '"><i class="icon-last"><span class="hidden">마지막페이지</span></i></a>';
            ?>
		</div>

        <?php
            if(isset($_SESSION['username'])) {
        ?>
            <div class="box-btn t-r">
                <a href="/lecture_board/index.php?mode=write" class="btn-m">후기 작성</a>
            </div>
        <?php
            }
        ?>
	</div>
</div>

</body>
</html>
