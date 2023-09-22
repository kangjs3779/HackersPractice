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
<div id="skip-nav">
<a href="#content">본문 바로가기</a>
</div>
<div id="container" class="container-full">
	<div id="content" class="content">
		<div class="inner">
			<div class="tit-box-h3">
				<h3 class="tit-h3">내정보수정</h3>
				<div class="sub-depth">
					<span><i class="icon-home"><span>홈</span></i></span>
					<strong>내정보수정</strong>
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
						<tr>
							<th scope="col"><span class="icons">*</span>이름</th>
							<td><span id="name-text"><?= $row['name'] ?></span></td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>아이디</th>
							<td><input id="id-input" value="<?=$row['username'] ?>" type="text" class="input-text" style="width:302px" placeholder="영문자로 시작하는 4~15자의 영문소문자, 숫자"/><a id="duplicate-btn" class="btn-s-tin ml10">중복확인</a></td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>비밀번호</th>
							<td><input id="pw-input" value="<?= $_SESSION['password']?>" type="password" class="input-text" style="width:302px" placeholder="8-15자의 영문자/숫자 혼합"/></td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>비밀번호 확인</th>
							<td><input id="pw-check-input" type="password" class="input-text" style="width:302px"/></td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>이메일주소</th>
							<td>
								<input id="email-input" value="<?= explode('@',$row['email'])[0] ?>" type="text" class="input-text" style="width:138px"/> @ <input type="text" value="<?= explode('@',$row['email'])[1] ?>" id="email-address-input" class="input-text" style="width:138px"/>
								<select class="input-sel select-address" style="width:160px">
									<option value="">선택</option>
                                    <option value="naver.com" <?= explode('@',$row['email'])[1] == 'naver.com' ? 'selected' : '' ?>>naver.com</option>
                                    <option value="gmail.com" <?= explode('@',$row['email'])[1] == 'gmail.com' ? 'selected' : '' ?>>gmail.com</option>
                                    <option value="kakao.com" <?= explode('@',$row['email'])[1] == 'kakao.com' ? 'selected' : '' ?>>kakao.com</option>
								</select>
							</td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>휴대폰 번호</th>
							<td>
                                <?= substr($row['phoneNumber'], 0, 3) ?>
                                -
                                <?= substr($row['phoneNumber'], 3, 4) ?>
                                -
                                <?= substr($row['phoneNumber'], 7, 4) ?>
                                <input value="<?= $row['phoneNumber'] ?>" id="phone-num" type="hidden"/>
                            </td>
						</tr>
						<tr>
							<th scope="col"><span class="icons"></span>일반전화 번호</th>
							<td>
                                <input value="<?= substr($row['homeNumber'], 0, 3) ?>" type="text" class="input-text homeNum" style="width:88px"/> -
                                <input value="<?= substr($row['homeNumber'], 3, 4) ?>" type="text" class="input-text homeNum" style="width:88px"/> -
                                <input value="<?= substr($row['homeNumber'], 7, 4) ?>" type="text" class="input-text homeNum" style="width:88px"/>
                            </td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>주소</th>
							<td>
								<p >
									<label>우편번호 <input id="postcodeInput" value="<?= $row['postcode'] ?>" type="text" class="input-text ml5 address" style="width:242px" disabled /></label><button type="button" class="btn-s-tin ml10" id="address-btn">주소찾기</button>
								</p>
								<p class="mt10">
									<label>기본주소 <input id="roadAddressInput" value="<?= $row['address'] ?>" type="text" class="input-text ml5 address" style="width:719px"/></label>
								</p>
								<p class="mt10">
									<label>상세주소 <input id="extraAddressInput" value="<?= $row['detailAddress'] ?>" type="text" class="input-text ml5 address" style="width:719px"/></label>
								</p>
							</td>
						</tr>
						<tr>
							<th scope="col"><span class="icons">*</span>SMS수신</th>
							<td>
								<div class="box-input">
									<label class="input-sp">
										<input type="radio" value="yes" name="radio" class="send-sms" <?= $row['sendSMS'] == 'yes' ? 'checked' : ''?>/>
										<span class="input-txt">수신함</span>
									</label>
									<label class="input-sp">
										<input type="radio" value="no" name="radio" class="send-sms" <?= $row['sendSMS'] == 'no' ? 'checked' : ''?> />
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
										<input type="radio" value="yes" class="send-email" name="radio2" id="" <?= $row['sendEmail'] == 'yes' ? 'checked' : ''?>/>
										<span class="input-txt">수신함</span>
									</label>
									<label class="input-sp">
										<input type="radio" value="no" class="send-email" name="radio2" id="" <?= $row['sendEmail'] == 'no' ? 'checked' : ''?> />
										<span class="input-txt">미수신</span>
									</label>
								</div>
								<p>메일수신 시, 해커스의 혜택 및 이벤트 정보를 받아보실 수 있습니다.</p>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="box-btn">
					<a class="btn-l" id="modify-btn">정보수정</a>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="/js/join/daumPostCode.js"></script>
<script src="/js/modifyMyInfo/modifyForm.js"></script>
<script src="/js/modifyMyInfo/ajax/modifyAjax.js"></script>

</body>
</html>
