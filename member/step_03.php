

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
					<form>
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
									<input type="text" class="input-text" id="email-input" style="width:138px"/> @ <input type="text" id="email-address-input" class="input-text" style="width:138px" readonly/>
									<select class="input-sel select-address" style="width:160px">
										<option value="naver.com">naver.com</option>
										<option value="gmail.com">gmail.com</option>
										<option value="kakao.com">kakao.com</option>
									</select>
<!--									<input type="hidden" name='email' id="fullEmail">-->
								</td>
							</tr>
							<tr>
								<th scope="col"><span class="icons">*</span>휴대폰 번호</th>
								<td>
									<input type="text" class="input-text phone" id="phone1" value="<?php echo substr($_SESSION['phoneNum'], 0, 3) ?>" style="width:50px" readonly/> -
									<input type="text" class="input-text phone" id="phone2" value="<?php echo substr($_SESSION['phoneNum'], 3, 4) ?>" style="width:50px" readonly/> -
									<input type="text" class="input-text phone" id="phone3" value="<?php echo substr($_SESSION['phoneNum'], 7, 4) ?>" style="width:50px" readonly/>
<!--									<input type="hidden" name="phoneNumber" value="--><?php //echo $_SESSION['phoneNum']?><!--" />		-->
								</td>
							</tr>
							<tr>
								<th scope="col"><span class="icons"></span>일반전화 번호</th>
								<td>
									<input type="text" class="input-text homeNum" style="width:88px"/> - 
									<input type="text" class="input-text homeNum" style="width:88px"/> - 
									<input type="text" class="input-text homeNum" style="width:88px"/>
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
					<button class="btn-l" id="join-btn">회원가입</button>
				</div>
			</div>
		</div>
	</div>
</div>

<!--<script src="/js/join/daumPostCode.js"></script>-->
<!--<script src="/js/join/step03Form.js?t=--><?php //=time()?><!--"></script>-->
<script src="/js/member/memberAjax.js?t=<?= time()?>"></script>

