//아래 변수가 true여야만 비밀번호 재설정 가능
let pwCheck = false;


//회원가입 버튼을 누르면 함수 실행함
$("#reset-btn").click(function() {
    if(!pwCheck) {
        alert("비밀번호 확인이 되지 않았습니다.");
    } else {
        let password = $("#pw-input").val();

        let data = {password : password};

        $.ajax("/ajax/find/resetPW.php", {
            method: 'patch',
            contentType: 'application/json',
            data: JSON.stringify(data),
            success: function (data) {
                if(data.check) {

                    window.location.replace("http://practice.hackers.com/member/login.php");
                }
            }
        })
    }
});

//유효성 검사 함수 - 검사 후 boolean타입 리턴
function Reg(exp, target) {
    let reg = new RegExp(exp);

    let check = reg.test(target);

    return check;
}

//비밀번호 유효성검사
$("#pw-input").blur(function() {
    let pwInput = $("#pw-input").val();
    if(pwInput) {
        let exp = /^(?=.*[a-z])(?=.*[0-9])[a-z0-9]{8,15}$/i;

        let check = Reg(exp, pwInput);

        if(!check) {
            $("#pw-input").val("");
            $("#pw-input").focus();
            alert("비밀번호는 8-15자의 영문자/숫자의 혼합이어야 합니다.");
        }
    }
})

//비밀번호 확인
$("#pw-check-input").blur(function() {
    let pwInput = $("#pw-input").val();
    let pwCheckInput = $("#pw-check-input").val();

    let check = pwInput == pwCheckInput;

    if(pwCheckInput) {
        if(check) {
            alert("비밀번호 확인이 되었습니다.");
            pwCheck = true;
        } else {
            $("#pw-check-input").val("");
            $("#pw-check-input").focus();
            alert("비밀번호가 다릅니다.");
            pwCheck = false;
        }
    }
})