// 아이디 입력칸 확인
$("#id-input").blur(function(e) {
    let idInput = $("#id-input").val();
    console.log("진행 1 : " + idInput);

    if (idInput) {
        //아이디 유효성 검사 : 영문자로 시작하는 4~15자의 영문소문자, 숫자
        let exp = /^[a-z][a-z0-9]{3,15}$/;
        let check = Reg(exp, idInput);
        console.log("진행 2 : " + idInput + ", " + check);
        if(check) {
            console.log("진행 3 : " + idInput + ", " + check);
            //유효성 검사 후 중복확인 진행
            let data = {idInput : idInput, te : 'test'};
            for (let key in data) {
                if (data.hasOwnProperty(key)) {
                  console.log(key + ": " + data[key]);
                }
              }
            $("#duplicate-btn").click(function() {
                $.ajax("/controllers/Step03IdCheck.php", {
                    method: "post",
                    dataType: "json",
                    data: data,
                    success: function(data) {
                        if(data.check) {
                            alert("사용 가능한 아이디 입니다.")
                            checks['idCheck'] = true;
                            console.log("진행 4(true) : " + idInput + ", " + data.check + ", " + data);
                        } else if(!data.check) {
                            $("#id-input").val("");
                            $("#id-input").focus();
                            alert("이미 사용 중인 아이디 입니다.")
                            console.log("진행 4(false) : " + idInput + ", " + data.check + ", " + data);
                        }
                    }
                })
            })
        } else if(!check) {
            console.log("진행 5 : " + idInput + ", " + check);
            alert("아이디는 영문자로 시작하는 4~15자의 영문소문자, 숫자만 가능합니다.");
            $("#id-input").val("");
            $("#id-input").focus();
            checks['idCheck'] = false;
        }
    }
})