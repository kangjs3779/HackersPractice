
<div id="content" class="content" style="width: 1000px; margin: auto;">
    <div class="tit-box-h3">
        <br/>
        <h3 class="tit-h3">강의 리스트</h3>
        <div class="sub-depth">
            <span><i class="icon-home"><span>홈</span></i></span>
            <span>관리자페이지</span>
            <strong>강의리스트</strong>
        </div>
    </div>

    <table border="0" cellpadding="0" cellspacing="0" class="tbl-bbs">
        <caption class="hidden">수강후기</caption>
        <colgroup>
            <col style="width:8%"/>
            <col style="width:8%"/>
            <col style="*"/>
            <col style="width:15%"/>
            <col style="width:12%"/>
        </colgroup>

        <thead>
        <tr>
            <th scope="col">번호</th>
            <th scope="col">분류</th>
            <th scope="col">제목</th>
            <th scope="col">강사이름</th>
            <th scope="col">관리자</th>
        </tr>
        </thead>

        <tbody>
        <!-- set -->
        <?php
            for($i = 0; $i < $resultNumRow; $i++) {
        ?>

            <tr class="bbs-sbj">
                <td><?=$record[$i][0]?></td>
                <td><?=$record[$i][1]?></td>
                <td>
                    <a href="/admin/index.php?mode=view&lectureId=<?=$record[$i][0]?>">
                        <strong class="ellipsis_line"><?=$record[$i][2]?></strong>
                    </a>
                </td>
                <td class="last"><?=$record[$i][3]?></td>
                <td class="last"><?=$record[$i][10]?></td>
            </tr>

        <?php
            }
        ?>

        <!-- //set -->
        </tbody>
    </table>

    <div class="box-paging">
        <!--        페이지네이션-->
    </div>

    <div class="box-paging">
        <?php
        echo '<a href="/admin/index.php?mode=list&page=1"><i class="icon-first"><span class="hidden">첫페이지</span></i></a>';
        echo '<a href="/admin/index.php?mode=list&page=' . $paginationArr['prePage'] . '"><i class="icon-prev"><span class="hidden">이전페이지</span></i></a>';
        for ($i = $paginationArr['startPage']; $i <= $paginationArr['endPage']; $i++) {
            //페이지네이션 숫자
            echo '<a href="/admin/index.php?mode=list&page=' . $i . '" class="' . (isset($_GET['page']) && $_GET['page'] == $i ? 'active' : '') . '">' . $i . '</a>';
        }
        echo '<a href="/admin/index.php?mode=list&page=' . $paginationArr['nextPage'] . '"><i class="icon-next"><span class="hidden">다음페이지</span></i></a>';
        echo '<a href="/admin/index.php?mode=list&page=' . $paginationArr['totalPage'] . '"><i class="icon-last"><span class="hidden">마지막페이지</span></i></a>';
        ?>
    </div>

    <div class="box-btn t-r">
        <a href="/admin/index.php?mode=put" class="btn-m">강의 등록</a>
    </div>
</div>
</div>

