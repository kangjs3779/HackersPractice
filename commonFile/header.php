

<!-- skip nav -->
<div id="skip-nav">
<a href="#content">본문 바로가기</a>
</div>

<!-- //skip nav -->
<div id="wrap">
	<div id="header" class="header">
		
		<div class="nav-section">
			<div class="inner p-r">
				<h1><a href="/"><img src="http://img.hackershrd.com/common/logo.png" alt="해커스 HRD LOGO" width="165" height="37"/></a></h1>
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
								<li><a href="<?= isset($_SESSION['authorityId']) ? '/admin/index.php?mode=list ' : '#' ?>"><?= isset($_SESSION['authorityId']) ? '강의 리스트' : '서브메뉴' ?></a></li>
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
                        if(isset($_SESSION['memberId']) && isset($_SESSION['password'])) {
                            $memberId = $_SESSION['memberId'];
                            //로그인 후
                            echo "<a href='/process/logoutProcess.php'>로그아웃</a>";
                            echo "<a href='/member/index.php?mode=modifyMyInfo'>내정보</a>";
                            echo "<a href='#'>상담/고객센터</a>";
                        } else {
                            //로그인 전
                            echo "<a href='/member/index.php?mode=login'>로그인</a>";
                            echo "<a href='/member/index.php?mode=step_01'>회원가입</a>";
                            echo "<a href='#'>상담/고객센터</a>";
                        }
                    ?>
				</div>
			</div>
		</div>
	</div>