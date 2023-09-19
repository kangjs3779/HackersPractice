$("#categorization-sel").on("change", function () {
    //강의 분류를 선택하면 해당 분류의 강의명이 나옴

    let categorization = $(this).val();

    $.ajax("/ajax/review/categorigationLecture.php?categorization=" + categorization, {
        success: function (data) {
            $("#lecture-sel").empty();
            for(let i = 0; i < data.length; i++) {
                console.log(data[i].id);
                $("#lecture-sel").append("<option value='" + data[i].id + "'>" + data[i].title + "</option>");
            }

        }
    })
})