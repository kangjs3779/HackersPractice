//아래 변수들이 모두 true여야만 회원가입 가능
let checks = {
    nameCheck: false,
    idCheck: false,
    pwCheck: false,
    emailCheck: false,
    phoneCheck: false,
    postCodeCheck: false,
    defaultAddressCheck: false,
    detailAddressCheck: false,
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
}); 

//유효성 검사 함수
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


// 아이디 입력칸 확인
$("#id-input").blur(function() {
    //아이디 유효성 검사 : 영문자로 시작하는 4~15자의 영문소문자, 숫자
    let exp = /^[a-z][a-z0-9]{3,15}$/;
    let idInput = $("#id-input").val();

    let check = Reg(exp, idInput);

    if(check) {
        
        checks['idCheck'] = true;
    } else {
        alert("아이디는 영문자로 시작하는 4~15자의 영문소문자, 숫자만 가능합니다.");
        $("#id-input").val("");
        checks['idCheck'] = false;
    }
})


