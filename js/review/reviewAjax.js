
//강의 분류를 선택하면 해당 분류의 강의명이 나옴
$("#categorization-sel").on("change", function () {

    let categorization = $(this).val();

    $.ajax("/ajax/review/reviewAjax.php?mode=category_lecture&categorization=" + categorization, {
        success: function (data) {
            $("#lecture-sel").empty();
            for(let i = 0; i < data.length; i++) {
                $("#lecture-sel").append("<option value='" + data[i].id + "'>" + data[i].title + "</option>");
            }

        }
    })
})

//삭제버튼을 누르면
$("#delete-btn").click(function () {
    let check = confirm("삭제하시겠습니까?");

    if(check) {
        let reviewId = $(this).attr("reviewId");

        let data = {
            mode: 'delete_review',
            reviewId: reviewId
        }

        $.ajax("/ajax/review/reviewAjax.php", {
            method: "post",
            data: data,
            success: function (data) {

                if (data.result) {
                    window.location.replace("/review/index.php?mode=list")
                } else {
                    window.location.replace("/review/index.php?mode=view&reviewId=" + reviewId);
                    alert("수강 후기를 삭제하지 못했습니다.");
                }
            }
        })
    }
})

//카테고리 탭 검색
$(".categoryTab").click(function () {
    let category = $(this).attr('category');

    $.ajax("/ajax/review/reviewAjax.php?mode=category_tab_search&category=" + category, {
        success: function (data) {
            $(".list").remove();
            $(".box-paging").remove();

            for (const review of data) {
                let categoryNum = category;
                $("#list-body").append(`
                    <tr class="bbs-sbj list">
                        <td>${review[0]}</td>
                        <td>${categoryName[categoryNum]}</td>
                        <td>
                            <a href="/review/index.php?mode=view&reviewId=${review[0]}">
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

//검색바 검색
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

    let data = {
        mode: 'search_input',
        category: category,
        type: type,
        search: search
    }

    $.ajax("/ajax/review/reviewAjax.php", {
        method: "post",
        data: data,
        success: function (data) {
            $(".list").remove();
            $(".box-paging").remove();

            for (const review of data) {
                let categoryNum = category;
                $("#list-body").append(`
                    <tr class="bbs-sbj list">
                        <td>${review[0]}</td>
                        <td>${categoryName[categoryNum]}</td>
                        <td>
                            <a href="/review/index.php?mode=view&reviewId=${review[0]}">
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