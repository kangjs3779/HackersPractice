////////////////////////////////////Step01 - 이용 약관 동의
//아래 변수 두개가 모두 ture가 되어야만 다음 단계 진행 가능
let agreeCheck1 = false;
let agreeCheck2 = false;

//'모두 동의합니다.'를 체크하면 전체동의 체크
$("#agree-all").change(function () {
    let checkedAll = $(this).is(":checked");

    if (checkedAll) {
        $(".agree-check").prop("checked", true);
        agreeCheck1 = true;
        agreeCheck2 = true;
    } else {
        $(".agree-check").prop("checked", false);
        agreeCheck1 = false;
        agreeCheck2 = false;
    }
})

//하나라도 체크가 안되어 있으면 전체 동의 체크 해제
$(".agree-check").change(function () {
    let agreeCheckCount = $(".agree-check:checked").length;

    let totalCount = $(".agree-check").length;

    let anyUnchecked = agreeCheckCount < totalCount;

    if (anyUnchecked) {
        $("#agree-all").prop("checked", false);
    } else {
        $("#agree-all").prop("checked", true);
    }
})

//약관 동의에 체크하면 true로 변경
$("#agree-check1").change(function () {
    agreeCheck1 = $(this).is(":checked");
})

$("#agree-check2").change(function () {
    agreeCheck2 = $(this).is(":checked");
})

//다음단계 버튼을 클릭하면 동의 확인 후 다음단계로 진행
$("#next-step-btn").click(function () {
    if (!agreeCheck1 || !agreeCheck2) {
        alert("약관에 모두 동의해주세요.");
        event.preventDefault();
    }
})


/////////////////////////////////////Step02 - 본인인증/휴대폰 인증
//인증번호 받기 버튼을 누르면 전화번호 유효성 검사를 한다
let sessionVeriCode = '';

$("#send-veri-code-btn").click(function () {
    let reg = new RegExp(/^010\d{4}\d{4}$/);
    let phoneNum = '';
    let inputNotNullCheck = true;

    $(".phone-num").each(function () {
        if ($(this).val() === '') {
            //비어있는 입력칸이 하나라도 있으면 알림
            alert("입력칸에 모두 기입해주세요.");
            inputNotNullCheck = false;
            return inputNotNullCheck;
        } else {
            //입력칸에 모두 기입되어 있으면 합침
            phoneNum += $(this).val();
        }
    })

    if (inputNotNullCheck) {
        //번호 형식인지 유효성 검사
        let check = reg.test(phoneNum)

        if (!check) {
            //번호 형식이 아니면 알림
            alert("알맞은 전화번호 형식이 아닙니다.");
        } else {
            //번호 형식이 맞으면 session에 저장
            let data = {
                mode: 'step_02',
                phoneNum: phoneNum
            }

            $.ajax("/ajax/member/memberAjax.php", {
                // $.ajax("/practice/ajax/join/Step02PhoneNumCheck.php", {
                method: "post",
                data: data,
                success: function (data) {
                    //성공하면 인증번호를 변수에 넣어줌
                    sessionVeriCode = data.veriCode;
                    alert("인증에 성공하였습니다. 인증번호는 " + sessionVeriCode + " 입니다.")
                },
                error: function (data) {
                    alert("인증번호 발송을 하지 못했습니다.")
                }
            })
        }
    }
});

// session에 저장된 인증번호와 사용자가 입력한 인증번호가 같은지 확인
$("#check-veri-code-btn").click(function () {
    let inputVeriCode = $("#veri-code-input").val();
    let checkVeriCode = inputVeriCode == sessionVeriCode;

    if (checkVeriCode) {
        window.location.replace("/member/index.php?mode=step_03");

    } else {
        alert("인증번호가 틀렸습니다.");
        $("#veri-code-input").val("");
        $("#veri-code-input").focus();
    }

});


//////////////////////////////////////Step03 - 회원가입 입력
//아래 배열의 요소들이 모두 true여야만 회원가입 버튼 활성화
let inputChecks = {
    nameCheck: false,
    idCheck: false,
    pwCheck: false,
    emailCheck: false,
    postCodeCheck: false
};

//회원가입 버튼을 클릭하면
$("#join-btn").click(function () {
    inputChecks['nameCheck'] = $("#name-input").val() != '';
    inputChecks['emailCheck'] = $("#email-input").val() != '';
    inputChecks['postCodeCheck'] = $("#postcodeInput").val() != '';

    console.log(inputChecks);

    if (Object.values(inputChecks).every(check => check)) {
        //배열이 모두 true이면 ajax호출

        //입력칸 정리
        let nameInput = $("#name-input").val();
        let idInput = $("#id-input").val();
        let pwInput = $("#pw-input").val();
        let emailInput = $("#email-input").val() + "@" + $("#email-address-input").val();
        let phoneNum = '';
        $(".phone").each(function () {
            let num = $(this).val();
            phoneNum += num;
        });
        let homeNumInput = '';
        $(".homeNum").each(function () {
            let num = $(this).val();
            homeNumInput += num;
        });
        let postcodeInput = $("#postcodeInput").val();
        let roadAddressInput = $("#roadAddressInput").val();
        let extraAddressInput = $("#extraAddressInput").val();
        let smsSend = $(".sms:checked").val();
        let emailSend = $(".email:checked").val();

        let data = {
            mode: 'step_03',
            username: idInput,
            name: nameInput,
            password: pwInput,
            email: emailInput,
            phoneNumber: phoneNum,
            homeNumber: homeNumInput,
            postcode: postcodeInput,
            address: roadAddressInput,
            detailAddress: extraAddressInput,
            sendSMS: smsSend,
            sendEmail: emailSend
        }

        $.ajax("/ajax/member/memberAjax.php", {
            method: "post",
            data: data,
            success: function (data) {
                console.log("success");
                console.log(data.result);
                if (data.result) {
                    window.location.replace("/member/index.php?mode=complete");
                } else {
                    alert("정보를 바르게 입력해주세요");
                }
            }
        })

    } else {
        //요소 중 하나라도 false이면 진행하지 않음
        alert("필수 입력칸을 모두 채워주세요.");
        event.preventDefault();
    }
})

//아이디 중복 검사
$("#duplicate-btn").click(function () {
    // if(check) {
    let idInput = $("#id-input").val();
    let data = {
        mode: 'IdCheck',
        idInput: idInput
    };

    $.ajax("/ajax/member/memberAjax.php", {
        method: "post",
        dataType: "json",
        data: data,
        success: function (data) {
            if (data.check) {
                alert("사용 가능한 아이디 입니다.")
                inputChecks['idCheck'] = true;
                modifyChecks['idCheck'] = true;

            } else {
                $("#id-input").val("");
                $("#id-input").focus();
                alert("이미 사용 중인 아이디 입니다.")
                inputChecks['idCheck'] = false;
                modifyChecks['idCheck'] = false;
            }
        }
    })
    // }
})

//아이디 입력칸에 키업이 발생하면?
$("#id-input").on("keyup", function () {
    inputChecks['idCheck'] = false;
})

//비밀번호 확인
$("#pw-check-input").blur(function () {
    let pwInput = $("#pw-input").val();
    let pwCheckInput = $("#pw-check-input").val();

    let check = pwInput == pwCheckInput;

    if (pwCheckInput) {
        if (check) {
            alert("비밀번호 확인이 되었습니다.");
            inputChecks['pwCheck'] = true;
        } else {
            alert("비밀번호가 다릅니다.");
            $("#pw-check-input").val("");
            $("#pw-check-input").focus();
            inputChecks['pwCheck'] = false;
        }
    }
})

//비밀번호 입력칸에 키업이 발생하면?
$("#pw-input").on("keyup", function () {
    inputChecks['pwCheck'] = false;
})

//이메일 주소 선택
$(".select-address").on("change", function () {
    let address = $(this).val();
    $("#email-address-input").val(address);
})

//주소 찾기 버튼을 클릭하면
$("#address-btn").click(function () {
    return new Promise(function (resolve, reject) {
        new daum.Postcode({
            oncomplete: function (data) {
                // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                // 도로명 주소의 노출 규칙에 따라 주소를 표시한다.
                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                var roadAddr = data.roadAddress; // 도로명 주소 변수
                var extraRoadAddr = ''; // 참고 항목 변수

                // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                if (data.bname !== '' && /[동|로|가]$/g.test(data.bname)) {
                    extraRoadAddr += data.bname;
                }
                // 건물명이 있고, 공동주택일 경우 추가한다.
                if (data.buildingName !== '' && data.apartment === 'Y') {
                    extraRoadAddr += (extraRoadAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                }
                // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                if (extraRoadAddr !== '') {
                    extraRoadAddr = ' (' + extraRoadAddr + ')';
                }

                // 우편번호와 주소 정보를 해당 필드에 넣는다.
                document.getElementById('postcodeInput').value = data.zonecode;
                document.getElementById("roadAddressInput").value = roadAddr;

                // 참고항목 문자열이 있을 경우 해당 필드에 넣는다.
                if (roadAddr !== '') {
                    document.getElementById("extraAddressInput").value = extraRoadAddr;
                } else {
                    document.getElementById("extraAddressInput").value = '';
                }
                resolve(data.zonecode);
            }
        }).open();
    });
})


////////////////////////////////내정보 수정
//아래 배열의 요소들이 모두 true여야만 정보수정 가능
let modifyChecks = {
    idCheck: true,
    pwCheck: false,
    emailCheck: true,
    postCodeCheck: true
};

//아이디 입력칸에 키업이 발생하면?
$("#id-input").on("keyup", function() {
    modifyChecks['idCheck'] = false;
})

//비밀번호 확인란에 비밀번호 입력해야 함
$("#modi-pw-check-input").blur(function() {
    let pwInput = $("#modi-pw-input").val();
    let pwCheckInput = $("#modi-pw-check-input").val();

    let check = pwInput == pwCheckInput;

    if(pwCheckInput) {
        if(check) {
            alert("비밀번호 확인이 되었습니다.");
            modifyChecks['pwCheck'] = check;
        } else {
            alert("비밀번호가 다릅니다.");
            modifyChecks['pwCheck'] = check;
            $(this).focus();
            $(this).val("");
        }
    }
})

//정보 수정 버튼을 누르면
$("#modify-btn").click(function () {

    //위 배열이 모두 true인지 확인하는 함수
    if (Object.values(modifyChecks).every(check => check)) {
        let username = $("#id-input").val();
        let password = $("#modi-pw-input").val();
        let email = $("#email-input").val() + "@" + $("#email-address-input").val();
        let homeNum = '';
        $(".homeNum").each(function () {
            let num = $(this).val();
            homeNum += num;
        });
        let postcode = $("#postcodeInput").val();
        let roadAddress = $("#roadAddressInput").val();
        let extraAddress = $("#extraAddressInput").val();
        let sendSMS = $(".send-sms:checked").val();
        let sendEmail = $(".send-email:checked").val();
        let name = $("#name-text").text();
        let phoneNum = $("#phone-num").val();

        let data = {
            mode: 'modify',
            username: username,
            password: password,
            email: email,
            homeNum: homeNum,
            postcode: postcode,
            roadAddress: roadAddress,
            extraAddress: extraAddress,
            sendSMS: sendSMS,
            sendEmail: sendEmail,
            name: name,
            phoneNum: phoneNum
        }

        $.ajax("/ajax/member/memberAjax.php", {
            method: "post",
            data: data,
            success: function (data) {
                if(data.result) {
                    window.location.replace("http://practice.hackers.com/process/logoutProcess.php");
                } else {
                    alert("정보를 바르게 입력해주세요.");
                }
            }
        })
    } else {
        alert("필수 입력칸을 모두 채워주세요.");
    }
})



/////////////////////////아이디 찾기
//생년월일 : 월별 일수가 다른게 표시
let monthDate = {
    1: 31,
    2: 28,
    3: 31,
    4: 30,
    5: 31,
    6: 30,
    7: 31,
    8: 31,
    9: 30,
    10: 31,
    11: 30,
    12: 31,
};

$("#month-input").on("change", function () {
    let date = monthDate[$("#month-input").val()];

    for(let i = 1; i <= date; i++) {
        $("#date-input").append("<option value='" + i + "'>" + i + "</option>")
    }
})

//이메일 입력칸 확인
$(".select-address").on("change", function() {
    let address = $(this).val();
    $("#email-address-input").val(address);
})

//인증번호 받기 버튼을 클릭하면 인증번호를 세션에 저장
$("#send-vericode-btn").click(function () {
    let email = $("#email-input").val();
    let fullEmail = email + "@" + $("#email-address-input").val();
    let data = {
        mode: 'find_ID_send_veriCode',
        fullEmail: fullEmail
    };

    if(email) {
        $.ajax("/ajax/member/memberAjax.php", {
            method: "post",
            data: data,
            success: function (data) {
                sessionVeriCode = data.veriCode;
                alert("인증번호가 발송되었습니다.");
            }
        })
    } else {
        alert("이메일을 올바르게 입력해주세요.");
    }
})

//인증번호 확인 버튼을 클릭하면 : 아이디 찾기에서
$("#check-vericode-id-btn").click(function () {
    let vericodeInput = $("#vericode-input").val();
    // let sessionVeriCode = $("#session-vericode").val();

    if(sessionVeriCode) {
        //세션에 인증번호가 저장되어있으면
        if (vericodeInput == sessionVeriCode) {
            // 입력된 값이 여섯 자리 숫자이고 세션에 저장된 인증번호와 일치한다면

            let name = $("#name-input").val();
            let email = $("#email-input").val() + "@" + $("#email-address-input").val();

            let data = {
                mode: 'find_ID',
                name: name,
                email: email
            }

            $.ajax("/ajax/member/memberAjax.php", {
                method: "post",
                data: data,
                success: function (data) {
                    console.log("인증번호 확인 버튼 성공");
                    if(data.check) {
                        //조회된 아이디가 있으면
                        window.location.replace("http://practice.hackers.com/member/index.php?mode=find_id_complete");
                    } else {
                        //조회된 아이디가 없으면
                        alert("가입된 회원이 아닙니다.");
                    }
                }
            })
        } else {
            // 인증번호가 틀린 경우
            alert("인증번호가 틀렸습니다.");
        }
    } else {
        //세션에 인증번호가 저장되어있지 않으면
        alert("인증번호를 먼저 받아주세요.");
    }
})

////////////////////////비번 찾기
//인증번호 확인 버튼을 클릭하면 : 비번 찾기에서
$("#check-vericode-pw-btn").click(function () {
    let vericodeInput = $("#vericode-input").val();
    // let sessionVeriCode = $("#session-vericode").val();

    if(sessionVeriCode) {
        //세션에 인증번호가 저장되어있으면
        if (vericodeInput == sessionVeriCode) {
            // 입력된 값이 여섯 자리 숫자이고 세션에 저장된 인증번호와 일치한다면

            let name = $("#name-input").val();
            let email = $("#email-input").val() + "@" + $("#email-address-input").val();

            let data = {
                mode: 'find_PW',
                name: name,
                email: email
            }

            $.ajax("/ajax/member/memberAjax.php", {
                method: "post",
                data: data,
                success: function (data) {
                    console.log("인증번호 확인 버튼 성공");
                    if(data.check) {
                        //조회된 아이디가 있으면
                        window.location.replace("http://practice.hackers.com/member/index.php?mode=find_pass_complete");
                    } else {
                        //조회된 아이디가 없으면
                        alert("가입된 회원이 아닙니다.");
                    }
                }
            })
        } else {
            // 인증번호가 틀린 경우
            alert("인증번호가 틀렸습니다.");
        }
    } else {
        //세션에 인증번호가 저장되어있지 않으면
        alert("인증번호를 먼저 받아주세요.");
    }
})

//비밀번호 재설정  페이지
//아래 변수가 true여야만 비밀번호 재설정 가능
let findPWCheck = false;

//확인 버튼을 누르면 비밀번호 재설정
$("#reset-btn").click(function() {
    if(!findPWCheck) {
        alert("비밀번호 확인이 되지 않았습니다.");
    } else {
        let password = $("#findPW-input").val();

        let data = {
            mode: 'find-PW-reset',
            password : password
        };

        $.ajax("/ajax/member/memberAjax.php", {
            method: "post",
            data: data,
            success: function (data) {
                if(data.check) {

                    window.location.replace("http://practice.hackers.com/member/index.php?mode=login");
                }
            }
        })
    }
});


//비밀번호 확인
$("#findPW-check-input").blur(function() {
    let pwInput = $("#findPW-input").val();
    let pwCheckInput = $("#findPW-check-input").val();

    let check = pwInput == pwCheckInput;

    if(pwCheckInput) {
        if(check) {
            alert("비밀번호 확인이 되었습니다.");
            findPWCheck = true;
        } else {
            $("#findPW-check-input").val("");
            $("#findPW-check-input").focus();
            alert("비밀번호가 다릅니다.");
            findPWCheck = false;
        }
    }
})