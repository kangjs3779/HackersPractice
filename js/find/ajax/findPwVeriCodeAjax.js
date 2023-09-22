let sessionVeriCode = '';
let fullEmail = '';

//인증번호 받기 버튼을 클릭하면 인증번호를 세션에 저장
$("#send-vericode-btn").click(function () {

    let email = $("#email-input").val();
    fullEmail = email + "@" + $("#email-address-input").val();

    if(email) {
        $.ajax("/ajax/find/SendFindIdVeriCode.php", {
            method: "POST",
            dataType: "JSON",
            data: { fullEmail : fullEmail },
            success: function (data) {
                sessionVeriCode = data.veriCode;
                console.log(data.mailStatus);
                alert("인증번호가 발송되었습니다.");
            }
        })
    } else {
        alert("이메일을 올바르게 입력해주세요.");
    }
})

//인증번호 확인 버튼을 클릭하면 : 비번 찾기에서
$("#check-vericode-pw-btn").click(function () {
    let vericodeInput = $("#vericode-input").val();
    // let sessionVeriCode = $("#session-vericode").val();

    if(sessionVeriCode) {
        //세션에 인증번호가 저장되어있으면
        var regex = /^\d{6}$/;

        if (regex.test(vericodeInput) && vericodeInput == sessionVeriCode) {
            // 입력된 값이 여섯 자리 숫자이고 세션에 저장된 인증번호와 일치한다면

            $.ajax("/ajax/find/CheckVeriCodeForPW.php", {
                method: "POST",
                dataType: "JSON",
                data: {name : nameInput, email : fullEmail},
                success: function (data) {
                    console.log("인증번호 확인 버튼 성공");
                    if(data.check) {
                        //조회된 회원정보가 있으면
                        window.location.replace("http://practice.hackers.com/member/index.php?mode=find_pass_complete");
                    } else {
                        //조회된 회원정보가 없으면
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