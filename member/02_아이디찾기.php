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
                                <input type="text" class="input-text" style="width:478px" id="vericode-input"/><button class="btn-s-tin ml10" id="check-vericode-id-btn">인증번호 확인</button>
                            </td>
                        </tr>
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>

<script src="/js/find/findVeridateForm.js"></script>
<script src="/js/find/ajax/findIdVeriCodeAjax.js"></script>

