<div id="content" class="content">
    <div class="tit-box-h3">
        <h3 class="tit-h3">수강후기</h3>
        <div class="sub-depth">
            <span><i class="icon-home"><span>홈</span></i></span>
            <span>직무교육 안내</span>
            <strong>수강후기</strong>
        </div>
    </div>

    <ul class="tab-list tab5">
        <li class="on"><a href="/review/index.php?mode=list">전체</a></li>
        <li><a category="1" class="categoryTab">일반직무</a></li>
        <li><a category="2" class="categoryTab">산업직무</a></li>
        <li><a category="3" class="categoryTab">공통역량</a></li>
        <li><a category="4" class="categoryTab">어학 및 자격증</a></li>
    </ul>

    <div class="search-info">
        <div class="search-form f-r">
            <select class="input-sel" id="categorizarion-sel" style="width:158px">
                <option value="">분류</option>
                <option value="1">일반직무</option>
                <option value="2">산업직무</option>
                <option value="3">공통역량</option>
                <option value="4">어학 및 자격증</option>
            </select>
            <select class="input-sel" id="type-sel" style="width:158px">
                <option value="1">강의명</option>
                <option value="2">작성자</option>
            </select>
            <input type="text" class="input-text" id="search-input" placeholder="강의명을 입력하세요." style="width:158px"/>
            <button type="button" id="search-btn" class="btn-s-dark">검색</button>
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
            <th scope="col">강좌만족도</th>
            <th scope="col">작성자</th>
        </tr>
        </thead>

        <tbody id="list-body">
        <!-- set -->
        <?php
        if ($_GET['page'] == 1 || !isset($_GET['page'])) {
            for ($i = 0; $i < 3; $i++) {
                ?>
                <tr class="bbs-sbj">
                    <td><span class="txt-icon-line"><em>BEST</em></span></td>
                    <td><?= $bestRecord[$i][22] ?></td>
                    <td>
                        <a href="/review/index.php?mode=view&reviewId=<?= $bestRecord[$i][0] ?>">
                            <span class="tc-gray ellipsis_line">수강 강의명 : <?= $bestRecord[$i]['title'] ?></span>
                            <strong class="ellipsis_line"><?= $bestRecord[$i][3] ?></strong>
                        </a>
                    </td>
                    <td>
                            <span class="star-rating">
                                <span class="star-inner" style="width:80%"></span>
                            </span>
                    </td>
                    <td class="last"><?= $bestRecord[$i]['name'] ?></td>
                </tr>
                <?php
            }
        }

        ?>

        <!-- //set -->
        <!-- set -->
        <?php
        for ($i = 0; $i < $resultNumRow; $i++) {
            ?>
            <tr class="bbs-sbj list">
                <td><?= $record[$i][0] ?></td>
                <td><?= $record[$i][22] ?></td>
                <td>
                    <a href="/review/index.php?mode=view&reviewId=<?= $record[$i][0] ?>">
                        <span class="tc-gray ellipsis_line">수강 강의명 : <?= $record[$i]['title'] ?></span>
                        <strong class="ellipsis_line"><?= $record[$i][3] ?></strong>
                    </a>
                </td>
                <td>
						<span class="star-rating">
							<span class="star-inner" style="width:<?= $record[$i]['satisfaction'] ?>%"></span>
						</span>
                </td>
                <td class="last"><?= $record[$i]['name'] ?></td>
            </tr>
            <?php
        }
        ?>

        <!-- //set -->
        </tbody>
    </table>

    <div class="box-paging">
        <?php
        echo '<a href="/review/index.php?mode=list&page=1"><i class="icon-first"><span class="hidden">첫페이지</span></i></a>';
        echo '<a href="/review/index.php?mode=list&page=' . $paginationArr['prePage'] . '"><i class="icon-prev"><span class="hidden">이전페이지</span></i></a>';
        for ($i = $paginationArr['startPage']; $i <= $paginationArr['endPage']; $i++) {
            //페이지네이션 숫자
            echo '<a href="/review/index.php?mode=list&page=' . $i . '" class="' . (isset($_GET['page']) && $_GET['page'] == $i ? 'active' : '') . '">' . $i . '</a>';
        }
        echo '<a href="/review/index.php?mode=list&page=' . $paginationArr['nextPage'] . '"><i class="icon-next"><span class="hidden">다음페이지</span></i></a>';
        echo '<a href="/review/index.php?mode=list&page=' . $paginationArr['totalPage'] . '"><i class="icon-last"><span class="hidden">마지막페이지</span></i></a>';
        ?>
    </div>

    <?php
    if (isset($_SESSION['username'])) {
        ?>
        <div class="box-btn t-r">
            <a href="/review/index.php?mode=write" class="btn-m">후기 작성</a>
        </div>
        <?php
    }
    ?>
</div>
</div>
<script type="text/javascript" src="/js/review/ajax/searchReview.js"></script>
<script src="/js/review/ajax/categoryTab.js"></script>

