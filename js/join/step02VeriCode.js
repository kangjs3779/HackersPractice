let sessionVeriCode = '';

// session에 저장된 인증번호와 사용자가 입력한 인증번호가 같은지 확인
$("#check-veri-code-btn").click(function() {
    let inputVeriCode = $("#veri-code-input").val();
    let checkVeriCode = inputVeriCode == sessionVeriCode;

    if(checkVeriCode) {
        window.location.href = "http://practice.hackers.com/member/index.php?mode=step_03";
        // window.location.href = "http://localhost:63342/HackersPractice/member/index.php?mode=step_03";
    } else {
        alert("인증번호가 틀렸습니다.")
    }

});
