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
            <div class="cate my-5">
                <div class="act">책</div>
                <div class="">시</div>
                <div class="">음악</div>
                <div class="">영화</div>
            </div>

            <?php if(isset($_SESSION['user'])) : ?>
                <div class="btns">
                    <a class="btn btn-primary" href="/write">글쓰기</a>
                </div>
            <?php endif; ?>

            <div class="list mb-5">
                <?php foreach($list as $item) : ?>
                    <div class="item">
                        <a href="/view?id=<?= $item->id ?>">
                            <div class="info">
                                <?= str_replace("-", ".", explode(" ", $item->writedate)[0]) ?> | <?= $item->viewcnt ?> 읽음
                            </div>
    
                            <div class="cateinfo my-2">
                                <span class="pan"><?= $item->cate ?></span> <?= $item->writer ?>
                            </div>
                            <h2><?= $item->title ?></h2>
                            <p>
                                <?= $item->content ?>
                            </p>
    
                            <div class="jab mt-4">
                                <div class="good">
                                    <i style="font-size:24px;" class="far fa-star"></i>
                                    <?= $item->sug ?>
                                </div>
                                <div class="coment" style="margin-left:10px;">
                                    <i style="font-size:24px;" class="far fa-comment-dots"></i>
                                    <?= $item->recnt ?>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>