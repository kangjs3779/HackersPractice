// 아이디 입력칸 확인
let check = false;

// 아이디 입력칸 확인
$("#id-input").blur(function(e) {
    let idInput = $("#id-input").val();

    if (idInput) {
        //아이디 유효성 검사 : 영문자로 시작하는 4~15자의 영문소문자, 숫자
        let exp = /^[a-z][a-z0-9]{3,15}$/;
        check = Reg(exp, idInput);

        if(!check) {

            alert("아이디는 영문자로 시작하는 4~15자의 영문소문자, 숫자만 가능합니다.");
            $("#id-input").val("");
            $("#id-input").focus();
            checks['idCheck'] = false;
        }
    }
})


//유효성 검사 후 중복확인 진행
$("#duplicate-btn").click(function() {
    console.log(check);
    if(check) {
        let idInput = $("#id-input").val();
        let data = {idInput : idInput};

        $.ajax("/ajax/modifyMyInfo/IdCheck.php", {
            method: "post",
            dataType: "json",
            data: data,
            success: function(data) {
                if(data.check) {
                    alert("사용 가능한 아이디 입니다.")
                    checks['idCheck'] = true;
                } else if(!data.check) {
                    $("#id-input").val("");
                    $("#id-input").focus();
                    alert("이미 사용 중인 아이디 입니다.")
                }

                console.log(data);
            }
        })
    }
})





//정보수정 버튼을 누르면 함수 실행함
$("#modify-btn").click(function () {
    let modifyCheck = enableModify();

    if (modifyCheck) {
        let id = $("#id-input").val();
        let password = $("#pw-input").val();
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
            id: id,
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

        console.log(data);

        $.ajax("../process/myInfoModify/modifyProcess.php", {
            method: "PATCH",
            contentType: "application/json",
            data: JSON.stringify(data),
            success: function () {
                window.location.replace("http://practice.hackers.com/process/logoutProcess.php");
            }
        })
    }
});