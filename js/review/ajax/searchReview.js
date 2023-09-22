let category = 0;
let type = 0;
let search = '';

let categoryName = {
    1: '일반',
    2: '산업',
    3: '공통',
    4: '어학'
}

$("#categorizarion-sel").on("change", function () {
    category = $(this).val();
    type = $("#type-sel").val();
})

$("#type-sel").on("change", function () {
    type = $(this).val();
    $("#search-input").attr("placeholder", type == 1 ? "강의명을 입력하세요." : "작성자를 입력하세요.");
})


$("#search-btn").click(function () {
    //검색 버튼을 누르면
    search = $("#search-input").val();

    $.ajax("/ajax/review/searchReview.php?category=" + category + "&type=" + type + "&search=" + search, {
        success: function (data) {
            $(".list").remove();
            // $(".box-paging").remove();

            for(const review of data) {
                let categoryNum = category;
                console.log(categoryName[categoryNum]);
                console.log(category);

                $("#list-body").append(`
                    <tr class="bbs-sbj list">
                        <td>${review[0]}</td>
                        <td>${categoryName[categoryNum]}</td>
                        <td>
                            <a href="/lecture_board/index.php?mode=view&reviewId=${review[0]}">
                                <span class="tc-gray ellipsis_line">수강 강의명 : ${review[10]}</span>
                                <strong class="ellipsis_line">${review[3]}</strong>
                            </a>
                        </td>
                        <td>
                            <span class="star-rating">
                                <span class="star-inner" style="width:${review[5]}%"></span>
                            </span>
                        </td>
                        <td class="last">${review[18]}</td>
                    </tr>
                `);
            }
        }
    })
})