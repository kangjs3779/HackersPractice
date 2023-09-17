//유효성 검사 함수 - 검사 후 boolean타입 리턴
function Reg(exp, target) {
    let reg = new RegExp(exp);

    let check = reg.test(target);

    return check;
}

// 이름 입력칸 확인
let nameInput = '';
$("#name-input").blur(function(e) {
    nameInput = $("#name-input").val();

    if (nameInput) {
        //이름 유효성 검사 : '가-힣'까지, 두 글자 이상 작성해야 함
        let exp = /^[가-힣]{2,}$/;

        let check = Reg(exp, nameInput);

        if(!check) {
            alert("올바른 이름을 입력해 주세요.");
            $("#name-input").val("");
            $("#name-input").focus();
        }
    }
})

//이메일 입력칸 확인
let fullEmail = '';
$(".select-address").on("change", function() {
    let emailInput = $("#email-input").val();
    let address = $(this).val();
    $("#email-address-input").val(address);

    //이메일 합치기
    $("#fullEmail").val(emailInput + "@" + address);
    fullEmail = $("#fullEmail").val();
})


