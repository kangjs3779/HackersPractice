//아래 배열의 요소들이 모두 true여야만 회원가입 가능
let checks = {
    nameCheck: false,
    idCheck: false,
    pwCheck: false,
    emailCheck: false,
    postCodeCheck: false
};

//위 배열이 모두 true인지 확인하는 함수
// function enableJoin() {
//     if (Object.values(checks).every(check => check)) {
//         //배열이 모두 true이면 진행
//         // window.location.replace = "http://practice.hackers.com/member/index.php?mode=regist";
//         // window.location.href = "http://localhost:63342/practice/member/index.php?mode=regist";
//         $.ajax("/member/index.php?mode=regist", {
//             method: "post",
//             success: function () {
//                 console.log("success");
//             }
//         })
//     } else {
//         //요소 중 하나라도 false이면 진행하지 않음
//         alert("필수 입력칸을 모두 채워주세요.");
//         event.preventDefault();
//     }
// }



//유효성 검사 함수 - 검사 후 boolean타입 리턴
// function Reg(exp, target) {
//     let reg = new RegExp(exp);
//
//     let check = reg.test(target);
//
//     return check;
// }

// 이름 입력칸 확인
// $("#name-input").blur(function(e) {
//     let nameInput = $("#name-input").val();
//
//     if (nameInput) {
//         //이름 유효성 검사 : '가-힣'까지, 두 글자 이상 작성해야 함
//         let exp = /^[가-힣]{2,}$/;
//
//         let check = Reg(exp, nameInput);
//
//         if(check) {
//             checks['nameCheck'] = true;
//         } else {
//             alert("올바른 이름을 입력해 주세요.");
//             $("#name-input").val("");
//             $("#name-input").focus();
//             checks['nameCheck'] = false;
//         }
//     }
// })


//이름 입력칸에 키업이 발생하면?
// $("#name-input").on("keyup", function() {
//     checks['nameCheck'] = false;
// })


//아이디 입력칸에 키업이 발생하면?
// $("#id-input").on("keyup", function() {
//     checks['idCheck'] = false;
// })

//비밀번호 유효성검사
// $("#pw-input").blur(function() {
//     let pwInput = $("#pw-input").val();
//     if(pwInput) {
//         let exp = /^(?=.*[a-z])(?=.*[0-9])[a-z0-9]{8,15}$/i;
//
//         let check = Reg(exp, pwInput);
//
//         if(!check) {
//             alert("비밀번호는 8-15자의 영문자/숫자의 혼합이어야 합니다.");
//         }
//     }
// })

//비밀번호 확인
$("#pw-check-input").blur(function () {
    let pwInput = $("#pw-input").val();
    let pwCheckInput = $("#pw-check-input").val();

    let check = pwInput == pwCheckInput;

    if (pwCheckInput) {
        if (check) {
            alert("비밀번호 확인이 되었습니다.");
            // checks['pwCheck'] = true;
        } else {
            alert("비밀번호가 다릅니다.");
            $("#pw-check-input").val("");
            $("#pw-check-input").focus();
            // checks['pwCheck'] = false;
        }
    }
})

//비밀번호 입력란에 키업이 발생하면?
// $(".pw").on("keyup", function() {
//     checks['pwCheck'] = false;
// })

//이메일 입력
// let emailInput = '';
// $("#email-input").blur(function() {
//     emailInput = $("#email-input").val();
//     let check = emailInput == '';
//
//     if(!check) {
//         //이메일 입력칸이 비어있지 않으면
//         checks['emailCheck'] = true;
//     } else {
//         //이메일 입력칸이 비어있으면
//         checks['emailCheck'] = false;
//     }
// })

//이메일 주소 선택
$(".select-address").on("change", function () {
    let address = $(this).val();
    $("#email-address-input").val(address);

    //이메일 합치기
    // $("#fullEmail").val(emailInput + "@" + address);
})


//주소 검색
// $("#address-btn").click(function () {
//     DaumPostcode();
//     //     .then(function(postcodeValue) {
//     //     checks['postCodeCheck'] = true;
//     // });
// })

//일반 전화
// $(".homeNum").on("keyup", function () {
//     let fullNum = '';
//     $(".homeNum").each(function () {
//         let num = $(this).val();
//         fullNum += num;
//     })
//     // $("#fullHomeNum").val(fullNum);
// })

//본 예제에서는 도로명 주소 표기 방식에 대한 법령에 따라, 내려오는 데이터를 조합하여 올바른 주소를 구성하는 방법을 설명합니다.
function DaumPostcode() {
    // return new Promise(function (resolve, reject) {
    //     new daum.Postcode({
    //         oncomplete: function (data) {
    //             // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.
    //
    //             // 도로명 주소의 노출 규칙에 따라 주소를 표시한다.
    //             // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
    //             var roadAddr = data.roadAddress; // 도로명 주소 변수
    //             var extraRoadAddr = ''; // 참고 항목 변수
    //
    //             // 법정동명이 있을 경우 추가한다. (법정리는 제외)
    //             // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
    //             if (data.bname !== '' && /[동|로|가]$/g.test(data.bname)) {
    //                 extraRoadAddr += data.bname;
    //             }
    //             // 건물명이 있고, 공동주택일 경우 추가한다.
    //             if (data.buildingName !== '' && data.apartment === 'Y') {
    //                 extraRoadAddr += (extraRoadAddr !== '' ? ', ' + data.buildingName : data.buildingName);
    //             }
    //             // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
    //             if (extraRoadAddr !== '') {
    //                 extraRoadAddr = ' (' + extraRoadAddr + ')';
    //             }
    //
    //             // 우편번호와 주소 정보를 해당 필드에 넣는다.
    //             document.getElementById('postcodeInput').value = data.zonecode;
    //             document.getElementById("roadAddressInput").value = roadAddr;
    //
    //             // 참고항목 문자열이 있을 경우 해당 필드에 넣는다.
    //             if (roadAddr !== '') {
    //                 document.getElementById("extraAddressInput").value = extraRoadAddr;
    //             } else {
    //                 document.getElementById("extraAddressInput").value = '';
    //             }
    //             resolve(data.zonecode);
    //         }
    //     }).open();
    // });
}

$("#address-btn").click(function () {
    // DaumPostcode();
    //     .then(function(postcodeValue) {
    //     checks['postCodeCheck'] = true;
    // });
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