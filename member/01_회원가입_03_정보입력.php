
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
<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<!--[if lte IE 9]> <script src="/js/common/place_holder.js"></script> <![endif]-->

</head><body>

<div id="container" class="container-full">
	<div id="content" class="content">
		<div class="inner">
			<div class="tit-box-h3">
				<h3 class="tit-h3">회원가입</h3>
				<div class="sub-depth">
					<span><i class="icon-home"><span>홈</span></i></span>
					<strong>회원가입</strong>
				</div>
			</div>

			<div class="join-step-bar">
				<ul>
					<li><i class="icon-join-agree"></i> 약관동의</li>
					<li><i class="icon-join-chk"></i> 본인확인</li>
					<li class="last on"><i class="icon-join-inp"></i> 정보입력</li>
				</ul>
			</div>

			<div class="section-content">
				<table cellpadding="0" cellspacing="0" class="tbl-col-join">
					<caption class="hidden">강의정보</caption>
					<colgroup>
						<col style="width:15%"/>
						<col/>
					</colgroup>
					<form action="/member/index.php?mode=regist" id="member-info" method="post">
						<tbody>
							<tr>
								<th scope="col"><span class="icons">*</span>이름</th>
								<td><input name="name" type="text" class="input-text" id="name-input" style="width:302px"/></td>
							</tr>
							<tr>
								<th scope="col"><span class="icons">*</span>아이디</th>
								<td><input name="id" type="text" class="input-text" id="id-input" style="width:302px" placeholder="영문자로 시작하는 4~15자의 영문소문자, 숫자"/><button type="button" id="duplicate-btn" class="btn-s-tin ml10">중복확인</button></td>
							</tr>
							<tr>
								<th scope="col"><span class="icons">*</span>비밀번호</th>
								<td><input type="password" name="password" class="input-text pw" id="pw-input" style="width:302px" placeholder="8-15자의 영문자/숫자 혼합"/></td>
							</tr>
							<tr>
								<th scope="col"><span class="icons">*</span>비밀번호 확인</th>
								<td><input type="password" class="input-text pw" id="pw-check-input" style="width:302px"/></td>
							</tr>
							<tr>
								<th scope="col"><span class="icons">*</span>이메일주소</th>
								<td>
									<input type="text" class="input-text" name="email" id="email-input" style="width:138px"/> @ <input type="text" name="emailAddress" id="email-address-input" class="input-text" style="width:138px" readonly/>
									<select class="input-sel select-address" style="width:160px">
										<option value="naver.com">naver.com</option>
										<option value="gmail.com">gmail.com</option>
										<option value="kakao.com">kakao.com</option>
									</select>
								</td>
							</tr>
							<tr>
								<th scope="col"><span class="icons">*</span>휴대폰 번호</th>
								<td>
									<input type="text" class="input-text" id="phone1" value="<?php echo substr($_SESSION['phoneNum'], 0, 3) ?>" style="width:50px" readonly/> - 
									<input type="text" class="input-text" id="phone2" value="<?php echo substr($_SESSION['phoneNum'], 3, 4) ?>" style="width:50px" readonly/> - 
									<input type="text" class="input-text" id="phone3" value="<?php echo substr($_SESSION['phoneNum'], 7, 4) ?>" style="width:50px" readonly/>
									<input type="hidden" name="phoneNumber" value="<?php echo $_SESSION['phoneNum']?>" />		
								</td>
							</tr>
							<tr>
								<th scope="col"><span class="icons"></span>일반전화 번호</th>
								<td>
									<input type="text" class="input-text homeNum" style="width:88px"/> - 
									<input type="text" class="input-text homeNum" style="width:88px"/> - 
									<input type="text" class="input-text homeNum" style="width:88px"/>
									<input type="hidden" name="homeNumber" id="fullHomeNum" />
								</td>
							</tr>
							<tr>
								<th scope="col"><span class="icons">*</span>주소</th>
								<td>
									<p >
										<label>우편번호 <input type="text" name="postcode" id="postcodeInput" class="input-text ml5 address" style="width:242px" readonly /></label><button type="button" class="btn-s-tin ml10" id="address-btn">주소찾기</button>
									</p>
									<p class="mt10">
										<label>기본주소 <input type="text" name="address" id="roadAddressInput" class="input-text ml5 address" style="width:719px" readonly/></label>
									</p>
									<p class="mt10">
										<label>상세주소 <input type="text" name="detailAddress" id="extraAddressInput" class="input-text ml5 address" style="width:719px"/></label>
									</p>
								</td>
							</tr>
							<tr>
								<th scope="col"><span class="icons">*</span>SMS수신</th>
								<td>
									<div class="box-input">
										<label class="input-sp">
											<input type="radio" name="sendSMS" checked="checked" value="yes" class="sms"/>
											<span class="input-txt">수신함</span>
										</label>
										<label class="input-sp">
											<input type="radio" name="sendSMS" value="no" class="sms" />
											<span class="input-txt">미수신</span>
										</label>
									</div>
									<p>SMS수신 시, 해커스의 혜택 및 이벤트 정보를 받아보실 수 있습니다.</p>
								</td>
							</tr>
							<tr>
								<th scope="col"><span class="icons">*</span>메일수신</th>
								<td>
									<div class="box-input">
										<label class="input-sp">
											<input type="radio" name="sendEmail" checked="checked" value="yes"  class="email"/>
											<span class="input-txt">수신함</span>
										</label>
										<label class="input-sp">
											<input type="radio" name="sendEmail" value="no" class="email"/>
											<span class="input-txt">미수신</span>
										</label>
									</div>
									<p>메일수신 시, 해커스의 혜택 및 이벤트 정보를 받아보실 수 있습니다.</p>
								</td>
							</tr>
						</tbody>
					</form>
				</table>

				<div class="box-btn">
					<button type="submit" form="member-info" class="btn-l" id="join-btn">회원가입</button>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="/js/join/daumPostCode.js"></script>
<script src="/js/join/step03.js?t=<?=time()?>"></script>
<script src="/js/join/ajax/step03Ajax.js?t=<?=time()?>"></script>
</body>
</html>
