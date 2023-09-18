
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!--[if lte IE 9]> <script src="/js/common/place_holder.js"></script> <![endif]-->

</head><body>

<div id="container" class="container-full">
	<div id="content" class="content">
		<div class="inner">
			<div class="tit-box-h3">
				<h3 class="tit-h3">아이디/비밀번호 찾기</h3>
				<div class="sub-depth">
					<span><i class="icon-home"><span>홈</span></i></span>
					<strong>아이디/비밀번호 찾기</strong>
				</div>
			</div>

			<ul class="tab-list">
				<li class="on"><a href="#">아이디 찾기</a></li>
				<li><a href="/member/index.php?mode=find_pass">비밀번호 찾기</a></li>
			</ul>

			<div class="tit-box-h4">
				<h3 class="tit-h4">아이디 찾기 방법 선택</h3>
			</div>

			<dl class="find-box">
				<dt>휴대폰 인증</dt>
				<dd>
					고객님이 회원 가입 시 등록한 휴대폰 번호와 입력하신 휴대폰 번호가 동일해야 합니다.
					<label class="input-sp big">
						<input type="radio" name="radio" checked="checked"/>
						<span class="input-txt"></span>
					</label>
				</dd>
			</dl>

			<dl class="find-box">
				<dt>이메일 인증</dt>
				<dd>
					고객님이 회원 가입 시 등록한 이메일 주소와 입력하신 이메일 주소가 동일해야 합니다.
					<label class="input-sp big">
						<input type="radio" name="radio" checked="checked"/>
						<span class="input-txt"></span>
					</label>
				</dd>
			</dl>

			<div class="section-content mt30">
				<table border="0" cellpadding="0" cellspacing="0" class="tbl-col-join">
					<caption class="hidden">아이디 찾기 개인정보 입력</caption>
					<colgroup>
						<col style="width:15%"/>
						<col style="*"/>
					</colgroup>

					<tbody>
						<tr>
							<th scope="col">성명</th>
							<td><input type="text" class="input-text" style="width:302px" id="name-input" /></td>
						</tr>
						<tr>
							<th scope="col">생년월일</th>
							<td>
                                <select class="input-sel" style="width:148px">
                                    <?php
                                    for($i = 2023; $i > 1900; $i--) {
                                        echo "<option value='$i'>$i</option>";
                                        $moth = $i;
                                    }
                                    ?>
								</select>
								년
								<select class="input-sel" style="width:147px" id="month-input">
                                    <?php
                                    for($i = 1; $i < 13; $i++) {
                                        echo "<option value='$i'>$i</option>";
                                    }
                                    ?>
								</select>
								월
								<select class="input-sel" style="width:147px" id="date-input">

								</select>
								일
							</td>
						</tr>
						<tr>
							<th scope="col">이메일주소</th>
							<td>
								<input type="text" class="input-text" style="width:138px" id="email-input"/> @ <input type="text" id="email-address-input" class="input-text" style="width:138px" readonly/>
								<select class="input-sel select-address" style="width:160px">
                                    <option value="">선택하기</option>
									<option value="naver.com">naver.com</option>
									<option value="gmail.com">gmail.com</option>
									<option value="kakao.com">kakao.com</option>
								</select>
                                <button class="btn-s-tin ml10" id="send-vericode-btn">인증번호 받기</button>
							</td>
						</tr>
						<tr>
							<th scope="col">인증번호</th>
							<td>
                                <input type="text" class="input-text" style="width:478px" id="vericode-input"/><button class="btn-s-tin ml10" id="check-vericode-btn">인증번호 확인</button>
                            </td>
                        </tr>
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>

<script src="/js/find/findIdVeridateForm.js"></script>
<script src="/js/find/ajax/findIdVeriCodeAjax.js"></script>
</body>
</html>
