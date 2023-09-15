//아래 배열의 요소들이 모두 true여야만 회원가입 가능
let checks = {
    nameCheck: false,
    idCheck: false,
    pwCheck: false,
    emailCheck: false,
    postCodeCheck: false
};
  
//위 배열이 모두 true인지 확인하는 함수
function enableJoin() {
    if (Object.values(checks).every(check => check)) {
        //배열이 모두 true이면 진행
        window.location.href = "http://practice.hackers.com/member/index.php?mode=regist";
    } else {
        //요소 중 하나라도 false이면 진행하지 않음
        alert("필수 입력칸을 모두 채워주세요.");
        event.preventDefault();
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
$("#name-input").blur(function(e) {
    let nameInput = $("#name-input").val();
    
    if (nameInput) {
        //이름 유효성 검사 : '가-힣'까지, 두 글자 이상 작성해야 함
        let exp = /^[가-힣]{2,}$/;
    
        let check = Reg(exp, nameInput);
    
        if(check) {
            checks['nameCheck'] = true;
        } else {
            alert("올바른 이름을 입력해 주세요.");
            $("#name-input").val("");
            $("#name-input").focus();
            checks['nameCheck'] = false;
        }
    }
})


//이름 입력칸에 키업이 발생하면?
$("#name-input").on("keyup", function() {
    checks['nameCheck'] = false;
})


//아이디 입력칸에 키업이 발생하면?
$("#id-input").on("keyup", function() {
    checks['idCheck'] = false;
})

//비밀번호 유효성검사
$("#pw-input").blur(function() {
    let pwInput = $("#pw-input").val();
    if(pwInput) {
        let exp = /^(?=.*[a-z])(?=.*[0-9])[a-z0-9]{8,15}$/i;
    
        let check = Reg(exp, pwInput);
    
        if(!check) {
            alert("비밀번호는 8-15자의 영문자/숫자의 혼합이어야 합니다.");
        }
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
    let address = $(this).val();
    $("#email-address-input").val(address);
})


//주소 검색
$("#address-btn").click(function() {
    DaumPostcode().then(function(postcodeValue) {
        checks['postCodeCheck'] = true;
    });
})

//일반 전화
$(".homeNum").on("keyup", function() {
    let fullNum = '';
    $(".homeNum").each(function() {
        let num = $(this).val();
        fullNum += num;
    })
    $("#fullHomeNum").val(fullNum);
})

//휴대폰 번호
// $(".phone").on("change", function() {
//     let num1 = $("#phone1").val();
//     let num2 = $("#phone2").val();
//     let num3 = $("#phone3").val();
//     let fullNum = num1 + num2 + num3;
//     let exp = /^010\d{8}$/;
//     let check = Reg(exp, fullNum)

//     console.log(num1 + num2 + num3);
//     console.log("full : " + fullNum);
//     console.log("check : " + check);
//     if(check) {
//         checks['phoneCheck'] = true;
//     } else {
//         alert("휴대폰 번호를 올바르게 입력해주세요.");
//         checks['phoneCheck'] = false;
//     }
// })

//휴대폰 번호에 키업이 발생하면 초기화
// $(".phone").on("keyup", function() {
//     checks['phoneCheck'] = false;
// })

// //SMS수신
// $(".sms").on("change", function() {
//     let answer = $(".sms:checked").val();
//     console.log(answer);

//     if(answer === 'yes') {
//     } else if(answer === 'no') {
//     }
// })

// //email수신
// $(".email").on("change", function() {
//     let email = $(".email:checked").val();

//     if(email === 'yes') {

//     } else if(email === 'no') {

//     }
// })