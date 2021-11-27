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
        <div class="container editpro">
            <h2 class="my-5">프로필 수정</h2>
            <form method="post" action="/profileup" enctype="multipart/form-data">
                <div class="image mb-3">
                    <img class="imgPreview" style="margin-right:20px;" src="./profile/<?= $_SESSION['user']->profile ?>" alt="">
                    <div class="right">
                        <div style="font-size:24px;" class="mb-2"><?= $_SESSION['user']->id ?></div>
                        <input class="form-control" type="file" name="profile" id="profile" hidden>
                        <label class="form-label" for="profile">프로필 사진 바꾸기</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="id">아이디</label>
                    <input class="form-control" type="text" name="id" id="id" disabled value="<?= $_SESSION['user']->id ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="pass">비밀번호</label>
                    <input class="form-control" type="password" name="pass" id="pass" placeholder="8 ~ 16자 영문, 숫자 조합">
                    <span style="font-size:12px;">비밀번호 변경시에만 입력</span>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="passchk">비밀번호 확인</label>
                    <input class="form-control" type="password" name="passchk" id="passchk">
                </div>

                <button class="btn btn-danger cancle">취소</button>
                <button class="btn btn-primary">정보 수정</button>
            </form>
        </div>
    </section>
    <script src="./resource/js/editpro.js"></script>
</body>
</html>