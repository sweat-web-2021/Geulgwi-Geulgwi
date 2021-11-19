    <header>
        <div class="box">
            <div class="logo">
                <a href="/"><img src="./resource/img/logo.png" alt="로고" title="로고"></a>
            </div>

            <nav>
                <ul style="margin: 0; padding: 0;">
                    <li><a href="#">책</a></li>
                    <li><a href="#">영화</a></li>
                    <li><a href="#">시</a></li>
                    <li><a href="#">음악</a></li>
                    <li><a href="#">영어</a></li>
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
        <div class="container" id="list">
            <table class="table my-5">
                <thead>
                    <tr>
                        <th style="width:10%;">번호</th>
                        <th style="width:50%;">제목</th>
                        <th style="width:10%;">글쓴이</th>
                        <th style="width:10%;">작성일</th>
                        <th style="width:10%;">조회</th>
                        <th style="width:10%;">추천</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($list as $item) : ?>
                        <tr>
                            <td><?= $item->id ?></td>
                            <td><a href="/view?id=<?= $item->id ?>"><?= $item->title ?></a></td>
                            <td><?= $item->writer ?></td>
                            <td><?= explode(" ", $item->writedate)[0] ?></td>
                            <td><?= $item->viewcnt ?></td>
                            <td><?= $item->sug ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="btns">
                <a class="btn btn-primary" href="/write">글쓰기</a>
            </div>
        </div>
    </section>