//아래 변수 두개가 모두 ture가 되어야만 다음 단계 진행 가능
let agreeCheck1 = false;
let agreeCheck2 = false;


//변수가 모두 true인지 확인하는 함수
function agreeCheck() {
    if(agreeCheck1 && agreeCheck2) {

    } else {
        alert("약관에 모두 동의해주세요.");
        event.preventDefault();
    }
}

//'모두 동의합니다.'를 체크하면 전체동의 체크
$("#agree-all").change(function() {
    let checkedAll = $(this).is(":checked");

    if(checkedAll) {
        $(".agree-check").prop("checked", true);
        agreeCheck1 = true;
        agreeCheck2 = true;
    } else {
        $(".agree-check").prop("checked", false);
        agreeCheck1 = false;
        agreeCheck2 = false;
    }
})

//하나라도 체크가 안되어 있으면 전체 동의 체크 해제
$(".agree-check").change(function() {
    let agreeCheckCount = $(".agree-check:checked").length;

    let totalCount = $(".agree-check").length;

    let anyUnchecked = agreeCheckCount < totalCount;

    if(anyUnchecked) {
        $("#agree-all").prop("checked", false);
    } else {
        $("#agree-all").prop("checked", true);
    }
})


//약관 동의에 체크하면 true로 변경
$("#agree-check1").change(function() {
    agreeCheck1 = $(this).is(":checked");
})

$("#agree-check2").change(function() {
    agreeCheck2 = $(this).is(":checked");
})

//다음단계 버튼을 클릭하면 동의 확인 후 다음단계로 진행
$("#next-step-btn").click(function() {
    agreeCheck();
})