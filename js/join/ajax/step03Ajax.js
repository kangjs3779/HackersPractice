// 아이디 입력칸 확인
$("#id-input").blur(function(e) {
    let idInput = $("#id-input").val();

    if (idInput) {
        //아이디 유효성 검사 : 영문자로 시작하는 4~15자의 영문소문자, 숫자
        let exp = /^[a-z][a-z0-9]{3,15}$/;
        let check = Reg(exp, idInput);

        if(check) {
            //유효성 검사 후 중복확인 진행
            let data = {idInput : idInput};

            for (let key in data) {
                if (data.hasOwnProperty(key)) {
                  console.log(key + ": " + data[key]);
                }
              }
            $("#duplicate-btn").click(function() {

                $.ajax("/ajax/Step03IdCheck.php", {
                    method: "post",
                    dataType: "json",
                    data: data,
                    success: function(data) {

                        if(data.check) {
                            alert("사용 가능한 아이디 입니다.")
                            checks['idCheck'] = true;
                        } else if(!data.check) {
                            $("#id-input").val("");
                            $("#id-input").focus();
                            alert("이미 사용 중인 아이디 입니다.")
                        }
                    }
                })
            })

        } else if(!check) {
            
            alert("아이디는 영문자로 시작하는 4~15자의 영문소문자, 숫자만 가능합니다.");
            $("#id-input").val("");
            $("#id-input").focus();
            checks['idCheck'] = false;
        }
    }
})