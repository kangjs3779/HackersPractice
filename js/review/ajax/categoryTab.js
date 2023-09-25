

$(".categoryTab").click(function () {
    let category = $(this).attr('category');

    $.ajax("/ajax/review/categoryTab.php?category=" + category, {
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
