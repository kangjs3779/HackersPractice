
<div id="skip-nav">
    <a href="#content">본문 바로가기</a>
</div>
<div id="container" class="container-full">
    <div id="content" class="content">
        <div class="inner">
            <div class="tit-box-h3">
                <h3 class="tit-h3">강의 수정</h3>
                <div class="sub-depth">
                    <span><i class="icon-home"><span>홈</span></i></span>
                    <strong>강의등록</strong>
                </div>
            </div>

            <div class="section-content">
                <table border="0" cellpadding="0" cellspacing="0" class="tbl-col-join">
                    <caption class="hidden">강의정보</caption>
                    <colgroup>
                        <col style="width:15%"/>
                        <col style="*"/>
                    </colgroup>
                    <tbody>
                    <form action="/process/admin/modifyProcess.php" enctype="multipart/form-data" method="post" id="modifyLectureForm">
                        <input name="id" value="<?= $row['id'] ?>" type="hidden" class="input-text" style="width:302px"/>
                        <tr>
                            <th scope="col"><span class="icons">*</span>강의 제목</th>
                            <td><input name="title" value="<?= $row['title'] ?>" type="text" class="input-text" style="width:302px"/></td>
                        </tr>
                        <tr>
                            <th scope="col"><span class="icons">*</span>강사 이름</th>
                            <td><input name="teacher" value="<?= $row['teacher'] ?>" type="text" class="input-text" style="width:302px"/></td>
                        </tr>
                        <tr>
                            <th scope="col"><span class="icons">*</span>학습 난이도</th>
                            <td><input name="level" value="<?= $row['level'] ?>" type="text" class="input-text" style="width:302px" /></td>
                        </tr>
                        <tr>
                            <th scope="col"><span class="icons">*</span>이전 썸네일</th>
                            <input type="hidden" name="oldMainPhoto" id="oldMainPhoto" value="<?= $row['mainPhoto'] ?>">
                            <td><img style="width: 500px;" src="<?= '/img/lectureMainPhoto/' . $row['id'] . "/" . $row['mainPhoto'] ?>"></td>
                        </tr>
                        <tr>
                            <th scope="col"><span class="icons">*</span>수정할 썸네일</th>
                            <td><input name="mainPhoto" id="newMainPhoto" type="file" class="input-text" style="width:302px"/></td>
                        </tr>
                        <tr>
                            <th scope="col"><span class="icons">*</span>분류</th>
                            <td>
                                <select name="categorization" class="input-sel" style="width:160px">
                                    <option value="1" <?= $row['categorization'] == 1 ? 'selected' : ''?>>일반직무</option>
                                    <option value="2" <?= $row['categorization'] == 2 ? 'selected' : ''?>>산업직무</option>
                                    <option value="3" <?= $row['categorization'] == 3 ? 'selected' : ''?>>공통역량</option>
                                    <option value="4" <?= $row['categorization'] == 4 ? 'selected' : ''?>>어학 및 자격증</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="col">관리자 ID</th>
                            <td><input readonly value="<?= $_SESSION['authorityId']?>" name="authorityId" type="text" class="input-text" style="width:302px"/></td>
                        </tr>
                    </form>
                    </tbody>
                </table>
                <div class="box-btn">
                    <button class="btn-l" form="modifyLectureForm" type="submit">수정</button>
                </div>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript" src="/js/admin/modify.js"></script>


