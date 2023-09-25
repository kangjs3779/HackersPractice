//아래 배열의 요소들이 모두 true여야만 정보수정 가능
let checks = {
    idCheck: true,
    pwCheck: false,
    emailCheck: true,
    postCodeCheck: true
};

//위 배열이 모두 true인지 확인하는 함수
function enableModify() {
    if (Object.values(checks).every(check => check)) {
        //배열이 모두 true이면 return true
        //window.location.replace = "http://practice.hackers.com/";
        return true;
    } else {
        //요소 중 하나라도 false이면 return false
        alert("필수 입력칸을 모두 채워주세요.");
        return false;
    }
}

//유효성 검사 함수 - 검사 후 boolean타입 리턴
function Reg(exp, target) {
    let reg = new RegExp(exp);

    let check = reg.test(target);

    return check;
}

//아이디 입력칸에 키업이 발생하면?
$("#id-input").on("keyup", function() {
    checks['idCheck'] = false;
})

//비밀번호 확인란에 비밀번호 입력해야 함
$("#pw-check-input").blur(function() {
    let pwInput = $("#pw-input").val();
    let pwCheckInput = $("#pw-check-input").val();

    let check = pwInput == pwCheckInput;

    if(pwCheckInput) {
        if(check) {
            alert("비밀번호 확인이 되었습니다.");
            checks['pwCheck'] = check;
        } else {
            alert("비밀번호가 다릅니다.");
            checks['pwCheck'] = check;
            $(this).focus();
            $(this).val("");
        }
    }
})

//이메일 입력란에 키업이 발생하면?
$("#email-input").on("keyup", function () {
    checks['emailCheck'] = false;
})

$("#email-input").blur(function () {
    let emailInput = $("#email-input").val();
    let check = emailInput == '';

    if(!check) {
        //이메일 입력칸이 비어있지 않으면
        checks['emailCheck'] = true;
    } else {
        //이메일 입력칸이 비어있으면
        checks['emailCheck'] = false;
    }
})

//이메일 주소 선택
$(".select-address").on("change", function() {
    let address = $(this).val();
    $("#email-address-input").val(address);
})

//주소 검색
$("#address-btn").click(function() {
    DaumPostcode().then(function(postcodeValue) {
        checks['postCodeCheck'] = true;
    });
})

