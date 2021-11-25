    <header>
        <div class="box">
            <div class="logo">
                <a href="/"><img src="./resource/img/logo.png" alt="로고" title="로고"></a>
            </div>

            <nav>
                <ul style="margin: 0; padding: 0;">
                    <li><a href="/list">목록</a></li>
                    <li><a href="/write">글 쓰기</a></li>
                    <li><a href="/search">검색</a></li>
                    <li><a href="/mypage">마이페이지</a></li>
                </ul>
            </nav>

            <div class="ect">
                <?php if(isset($_SESSION['user'])) : ?>
                    <a href="/logout" class="btn logout">로그아웃</a>
                    <a href="/mypage" class="btn"><?= $_SESSION['user']->id ?></a>
                <?php else : ?>
                    <a href="/login" class="btn login">로그인</a>
                    <a href="/register" class="btn register">회원가입</a>
                <?php endif; ?>
            </div>
        </div>
    </header>
    <section>
        <div class="container write">
            <form action="/editok" method="post">
                <input type="hidden" name="id" value="<?= $list->id ?>">
                <div class="top my-4">
                    <div style="width: 73%;">
                        <input type="text" name="title" id="title" class="form-control" value="<?= $list->title ?>" placeholder="제목을 입력해주세요" required>
                    </div>

                    <div style="width: 25%;">
                        <select name="cates" id="cates" class="form-select">
                            <?php
                                $cates = array("책", "시", "음악", "영화");
                                foreach($cates as $item) {
                                    if($item == $list->cate) {
                                        echo "<option value='{$item}' selected>{$item}</option>";
                                    } else {
                                        echo "<option value='{$item}'>{$item}</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <div class='mb-3'>
                    <input type="text" name="copy" id="copy" class="form-control" value="<?= $list->copy ?>" placeholder="저작권 출처를 밝혀야 합니다 (책 제목, 사이트 주소 등)" required>
                </div>

                <div class='mb-3'>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control" required><?= $list->content ?></textarea>

                    <input class="form-control" type="text" name="tag" id="tag" placeholder="태그를 입력해주세요. 태그는 띄어쓰기로 구분됩니다.">
                </div>
                <button class="btn btn-danger cancle">취소</button>
                <button class="btn btn-primary">완료</button>
            </form>
        </div>
    </section>
    <script src="./resource/js/write.js"></script>