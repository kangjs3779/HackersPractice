

<div id="content" class="content" style="width: 1000px; margin: auto;">
    <div class="tit-box-h3">
        <br/>
        <h3 class="tit-h3">강의 상세</h3>
        <div class="sub-depth">
            <span><i class="icon-home"><span>홈</span></i></span>
            <span>직무교육 안내</span>
            <strong>수강후기</strong>
        </div>
    </div>


    <!-- set -->
    <table border="0" cellpadding="0" cellspacing="0" class="tbl-lecture-list">
        <caption class="hidden">강의정보</caption>
        <colgroup>
            <col style="width:166px"/>
            <col style="*"/>
            <col style="width:110px"/>
        </colgroup>
        <tbody>
        <tr>
            <td>
                <a href="#" class="sample-lecture">
                    <img src="<?= '/img/lectureMainPhoto/' . $row['id'] . "/" . $row['mainPhoto'] ?>" alt="" width="144" height="101"/>
                    <span class="tc-brand">샘플강의 ▶</span>
                </a>
            </td>
            <td class="lecture-txt">
                <em class="tit mt10"><?= $row['title'] ?></em>
                <p class="tc-gray mt20">강사: <?= $row['teacher'] ?> | 학습난이도 : <?= $row['level'] ?> | 교육시간: 18시간 (18강)</p>
            </td>
        </tr>
        </tbody>
    </table>

    <div class="box-btn t-r">
        <a href="/admin/index.php?mode=list" class="btn-m-gray">목록</a>
        <?php
        if ($_SESSION['authorityId'] == $row['authorityId']) {

            ?>
            <a href="/admin/index.php?mode=modify&lectureId=<?= $_GET['lectureId'] ?>" class="btn-m ml5">수정</a>
            <a href="/admin/index.php?mode=delete&lectureId=<?= $_GET['lectureId'] ?>" id="delete-btn"
               class="btn-m-dark">삭제</a>
            <?php
        }
        ?>
    </div>
</div>
</div>
<script>
    $("#delete-btn").click(function () {
        alert("후기를 삭제하시겠습니까?");
    })
</script>

