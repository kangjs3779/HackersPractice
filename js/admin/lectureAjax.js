var formData = new FormData();

//삭제 버튼을 누르면
$("#delete-btn").click(function () {

    if(confirm("삭제하시겠습니까?")) {

        let lectureId = $(this).attr('lecture-id');

        formData.append("mode", "delete");
        formData.append("lectureId", lectureId);

        $.ajax("/ajax/admin/lectureAjax.php", {
            method: "post",
            data: formData,
            processData: false,
            contentType: false,
            success: function () {
                window.location.replace("/admin/index.php?mode=list");
            }
        })
    }
})


//수정 버튼을 누르면
$("#modify-btn").click(function () {

    let lectureId = $("#lecture-id").val();
    let title = $("#title").val();
    let teacher = $("#teacher").val();
    let level = $("#level").val();
    let categorization = $("#categorization").val();
    let authorityId = $("#authorityId").val();
    let oldMainPhoto = $("#oldMainPhoto").val();
    let newMainPhoto = $("#newMainPhoto")[0].files[0];


    if (newMainPhoto) {
        formData.append("newMain", newMainPhoto);
    }

    formData.append("mode", "modify");
    formData.append("lectureId", lectureId);
    formData.append("title", title);
    formData.append("teacher", teacher);
    formData.append("level", level);
    formData.append("categorization", categorization);
    formData.append("authorityId", authorityId);
    formData.append("oldMainPhoto", oldMainPhoto);

    $.ajax("/ajax/admin/lectureAjax.php", {
        method: "post",
        data: formData,
        processData: false,
        contentType: false,
        success: function () {
            window.location.replace("/admin/index.php?mode=view&lectureId=" + lectureId);
        }
    })
})

//강의 등록 버튼을 누르면
$("#put-btn").click(function () {

    let title = $("#title").val();
    let teacher = $("#teacher").val();
    let level = $("#level").val();
    let mainPhoto = $("#mainPhoto")[0].files[0];
    let categorization = $("#categorization").val();
    let authorityId = $("#authorityId").val();

    formData.append("mode", "put");
    formData.append("mainPhoto", mainPhoto);
    formData.append("title", title);
    formData.append("teacher", teacher);
    formData.append("level", level);
    formData.append("categorization", categorization);
    formData.append("authorityId", authorityId);

    $.ajax("/ajax/admin/lectureAjax.php", {
        method: "post",
        data: formData,
        processData: false,
        contentType: false,
        success: function (data) {
            window.location.replace("/admin/index.php?mode=view&lectureId=" + data.lectureId);
        }
    })
})