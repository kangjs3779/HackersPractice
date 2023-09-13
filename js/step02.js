let sessionVeriCode = '';

//인증번호 받기 버튼을 누르면 전화번호 유효성 검사를 한다
$("#send-veri-code-btn").click(function() {
    let reg = new  RegExp(/^010\d{3,4}\d{4}$/);
    let phoneNum = '';
    let inputNotNullCheck = true;

    $(".phone-num").each(function() {
        if($(this).val() === '') {
            //비어있는 입력칸이 하나라도 있으면 알림
            alert("입력칸에 모두 기입해주세요.");
            inputNotNullCheck = false;
            return inputNotNullCheck;
        } else {
            //입력칸에 모두 기입되어 있으면 합침
            phoneNum += $(this).val();
        }
    })

    if(inputNotNullCheck) {
        //번호 형식인지 유효성 검사
        let check = reg.test(phoneNum)
    
        if(!check) {
            //번호 형식이 아니면 알림
            alert("알맞은 전화번호 형식이 아닙니다.");
        } else {
            //번호 형식이 맞으면 session에 저장

            $.ajax("/controllers/Step02Controller.php", {
                method: "post",
                dataType: 'JSON',
                data: { phoneNum: phoneNum },
                success: function(data) {
                    //성공하면 인증번호를 변수에 넣어줌
                    sessionVeriCode = data.veriCode;
                    alert("인증에 성공하였습니다. 인증번호는 " + sessionVeriCode + " 입니다.")
                },
                error: function() {
                    alert("인증번호 발송을 하지 못했습니다.")
                }
            })
        }
    }

});

// session에 저장된 인증번호와 사용자가 입력한 인증번호가 같은지 확인
$("#check-veri-code-btn").click(function() {
    let inputVeriCode = $("#veri-code-input").val();
    let checkVeriCode = inputVeriCode == sessionVeriCode;

    if(checkVeriCode) {
        window.location.href = "http://practice.hackers.com/member/index.php?mode=step_03";
    } else {
        alert("인증번호가 틀렸습니다.")
    }

});

//test