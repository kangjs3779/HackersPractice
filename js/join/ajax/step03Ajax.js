// let check = false;

// 아이디 입력칸 확인
// $("#id-input").blur(function(e) {
//     let idInput = $("#id-input").val();
//
//     if (idInput) {
//         //아이디 유효성 검사 : 영문자로 시작하는 4~15자의 영문소문자, 숫자
//         let exp = /^[a-z][a-z0-9]{3,15}$/;
//         check = Reg(exp, idInput);
//
//         if(!check) {
//
//             alert("아이디는 영문자로 시작하는 4~15자의 영문소문자, 숫자만 가능합니다.");
//             $("#id-input").val("");
//             $("#id-input").focus();
//             checks['idCheck'] = false;
//         }
//     }
// })


$("#duplicate-btn").click(function () {
//아이디 중복 검사
    // if(check) {
    let idInput = $("#id-input").val();
    let data = {idInput: idInput};

    $.ajax("/ajax/join/Step03IdCheck.php", {
        method: "post",
        dataType: "json",
        data: data,
        success: function (data) {
            if (data.check) {
                alert("사용 가능한 아이디 입니다.")
                // checks['idCheck'] = true;
            } else if (!data.check) {
                $("#id-input").val("");
                $("#id-input").focus();
                alert("이미 사용 중인 아이디 입니다.")
            }
        }
    })
    // }
})

//회원가입 버튼을 클릭하면
$("#join-btn").click(function () {
    // enableJoin();
    // console.log(checks);

    //입력칸 정리
    let nameInput = $("#name-input").val();
    let idInput = $("#id-input").val();
    let pwInput = $("#pw-input").val();
    // let pwCheckInput = $("#pw-check-input").val();
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


    // if (Object.values(checks).every(check => check)) {
    //배열이 모두 true이면 진행
    // window.location.replace = "http://practice.hackers.com/member/index.php?mode=regist";
    // window.location.href = "http://localhost:63342/practice/member/index.php?mode=regist";
    // $.ajax("/ajax/join/JoinProcess", {
    $.ajax("/ajax/join/JoinAjax.php", {
        method: "post",
        contentType: "application/json",
        data: JSON.stringify(data),
        success: function () {
            console.log("success");
        }
    })
    // } else {
    //     //요소 중 하나라도 false이면 진행하지 않음
    //     //필수 입력칸에 하나라도 입력이 안되어 있다면
    //     alert("필수 입력칸을 모두 채워주세요.");
    //     // event.preventDefault();
    // }

});