//아래 배열의 요소들이 모두 true여야만 회원가입 가능
let checks = {
    nameCheck: false,
    idCheck: false,
    pwCheck: false,
    emailCheck: false,
    phoneCheck: false,
    postCodeCheck: false,
    sendSmsCheck: false,
    sendEmailCheck: false
};
  
//위 배열이 모두 true인지 확인하는 함수
function enableJoin() {
    if (Object.values(checks).every(check => check)) {
        //배열이 모두 true이면 진행
        window.location.href = "http://practice.hackers.com/homework/01_회원가입_04_회원가입완료.html";
    } else {
        //요소 중 하나라도 false이면 진행하지 않음
        alert("필수 입력칸을 모두 채워주세요.")
    }
}

//회원가입 버튼을 누르면 함수 실행함
$("#join-btn").click(function() {
    enableJoin();
    console.log(checks);
}); 

//유효성 검사 함수 - 검사 후 boolean타입 리턴
function Reg(exp, target) {
    let reg = new RegExp(exp);

    let check = reg.test(target);

    return check;
}

// 이름 입력칸 확인
$("#name-input").blur(function() {
    //이름 유효성 검사 : '가-힣'까지, 두 글자 이상 작성해야 함
    let nameInput = $("#name-input").val();
    let exp = /^[가-힣]{2,}$/;
    
    let check = Reg(exp, nameInput);

    if(check) {
        checks['nameCheck'] = true;
    } else {
        alert("올바른 이름을 입력해 주세요");
        $("#name-input").val("");
        checks['nameCheck'] = false;
    }
})

//이름 입력칸에 키업이 발생하면?
$("#name-input").on("keyup", function() {
    checks['nameCheck'] = false;
})


// 아이디 입력칸 확인
$("#id-input").blur(function() {
    //아이디 유효성 검사 : 영문자로 시작하는 4~15자의 영문소문자, 숫자
    let exp = /^[a-z][a-z0-9]{3,15}$/;
    let idInput = $("#id-input").val();

    let check = Reg(exp, idInput);

    if(check) {
        //유효성 검사 후 중복확인 진행
        $("#duplicate-btn").click(function() {
            $.ajax("/controllers/Step03Controller.php", {
                method: "post",
                dataType: "json",
                data: {idInput : idInput},
                success: function(data) {
                    if(data.check) {
                        alert("사용 가능한 아이디 입니다.")
                        checks['idCheck'] = true;
                    } else {
                        alert("이미 사용 중인 아이디 입니다.")
                    }
                }
            })

        })
    } else {
        alert("아이디는 영문자로 시작하는 4~15자의 영문소문자, 숫자만 가능합니다.");
        $("#id-input").val("");
        checks['idCheck'] = false;
    }
})

//아이디 입력칸에 키업이 발생하면?
$("#id-input").on("keyup", function() {
    checks['idCheck'] = false;
})

//비밀번호 유효성검사
$("#pw-input").blur(function() {
    let pwInput = $("#pw-input").val();
    let exp = /^(?=.*[a-z])(?=.*[0-9])[a-z0-9]{8,15}$/i;

    let check = Reg(exp, pwInput);

    if(!check) {
        alert("비밀번호는 8-15자의 영문자/숫자의 혼합이어야 합니다.");
    }
})

//비밀번호 확인
$("#pw-check-input").blur(function() {
    let pwInput = $("#pw-input").val();
    let pwCheckInput = $("#pw-check-input").val();

    let check = pwInput == pwCheckInput;

    if(check) {
        alert("비밀번호 확인이 되었습니다.");
        checks['pwCheck'] = true;
    } else {
        alert("비밀번호가 다릅니다.");
        checks['pwCheck'] = false;
    }
})

//비밀번호 입력란에 키업이 발생하면?
$(".pw").on("keyup", function() {
    checks['pwCheck'] = false;
})

//이메일 입력
$("#email-input").blur(function() {
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
    let option = $(this).val();
    $("#email-address-input").val(option);
})

//주소 검색
$("#address-btn").click(function() {
    DaumPostcode().then(function(postcodeValue) {
        checks['postCodeCheck'] = true;
    });
})

