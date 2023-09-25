
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
<!-- skip nav -->
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

		<table border="0" cellpadding="0" cellspacing="0" class="tbl-bbs-view">
			<caption class="hidden">수강후기</caption>
			<colgroup>
				<col style="*"/>
				<col style="width:20%"/>
			</colgroup>
			<tbody>
				 <tr>
					<th scope="col"><?= $row[3] ?></th>
					<th scope="col" class="user-id">작성자 | <?= $row['username'] ?></th>
				 </tr>
				<tr>
					<td colspan="2">
						<div class="box-rating">
							<span class="tit_rating">강의만족도</span>
							<span class="star-rating">
								<span class="star-inner" style="width:<?=$row['satisfaction']?>%"></span>
							</span>
						</div>
                        <br/><br/>
                        <p>
                            <?= $row['content'] ?>
                        </p>
					</td>
				</tr>
			</tbody>
		</table>


		<p class="mb15"><strong class="tc-brand fs16"><?= $row['username'] ?>님의 수강하신 강의 정보</strong></p>

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
							<img src="<?='/img/lectureMainPhoto/'.$row['lectureId']."/".$row['mainPhoto']?>" alt="" width="144" height="101" />
							<span class="tc-brand">샘플강의 ▶</span>
						</a>
					</td>
					<td class="lecture-txt">
						<em class="tit mt10"><?=$row[23]?></em>
						<p class="tc-gray mt20">강사: <?=$row['teacher']?> | 학습난이도 : <?=$row['teacher']?> | 교육시간: 18시간 (18강)</p>
					</td>
					<td class="t-r"><a href="#" class="btn-square-line">강의<br />상세</a></td>
				</tr>
			</tbody>
		</table>

		<div class="box-btn t-r">
			<a href="/review/index.php?mode=list" class="btn-m-gray">목록</a>
            <?php
                if($_SESSION['memberId'] == $row['memberId']) {

            ?>
                    <a href="/review/index.php?mode=modify&reviewId=<?=$_GET['reviewId']?>" class="btn-m ml5">수정</a>
                    <a href="/review/index.php?mode=delete&reviewId=<?=$_GET['reviewId']?>" id="delete-btn" class="btn-m-dark">삭제</a>
            <?php
                }
            ?>
		</div>

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
					<th scope="col">강의만족도</th>
					<th scope="col">작성자</th>
				</tr>
			</thead>

			<tbody>
				<!-- set -->
                <?php
                for($i = 0; $i < $resultNumRow; $i++) {
                    ?>
                    <tr class="bbs-sbj">
                        <td><?= $record[$i][0] ?></td>
                        <td><?= $record[$i][22] ?></td>
                        <td>
                            <a href="/review/index.php?mode=view&reviewId=<?=$record[$i][0]?>">
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
            <a href="/review/index.php?mode=view&reviewId=<?=$_GET['reviewId']?>&page=1"><i class="icon-first"><span class="hidden">첫페이지</span></i></a>
            <a href="/review/index.php?mode=view&reviewId=<?=$_GET['reviewId']?>&page=<?=$paginationArr['prePage']?>"><i class="icon-prev"><span class="hidden">이전페이지</span></i></a>
            <?php
                for ($i = $paginationArr['startPage']; $i <= $paginationArr['endPage']; $i++) {
                    //페이지네이션 숫자
                    echo '<a href="/review/index.php?mode=view&reviewId='.$_GET['reviewId'].'&page=' . $i . '" class="' . (isset($_GET['page']) && $_GET['page'] == $i ? 'active' : '') . '">' . $i . '</a>';
                }
            ?>
            <a href="/review/index.php?mode=view&reviewId=<?=$_GET['reviewId']?>&page=<?=$paginationArr['nextPage']?>"><i class="icon-next"><span class="hidden">다음페이지</span></i></a>
            <a href="/review/index.php?mode=view&reviewId=<?=$_GET['reviewId']?>&page=<?=$paginationArr['totalPage']?>>"><i class="icon-last"><span class="hidden">마지막페이지</span></i></a>
		</div>
	</div>
</div>

</body>
<script>
    $("#delete-btn").click(function () {
        alert("후기를 삭제하시겠습니까?");
    })
</script>
</html>
