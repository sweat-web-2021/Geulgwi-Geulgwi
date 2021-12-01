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
        <div class="container" id="list">
            <div class="cate my-5">
                <div class="cates act">전체</div>
                <div class="cates">책</div>
                <div class="cates">시</div>
                <div class="cates">음악</div>
                <div class="cates">영화</div>
            </div>

            <?php if(isset($_SESSION['user'])) : ?>
                <div class="btns">
                    <a class="btn btn-primary" href="/write">글쓰기</a>
                </div>
            <?php endif; ?>

            <div class="list mb-5">
                <?php foreach($list as $item) : ?>
                    <div class="item">
                        <a href="/view?id=<?= $item->id ?>" target="_blank">
                            <div class="info">
                                <?= explode(" ", $item->writedate)[0] ?> | <?= $item->viewcnt ?> 읽음
                            </div>
    
                            <div class="cateinfo my-2">
                                <span class="pan"><?= $item->cate ?></span> <?= $item->writer ?>
                            </div>
                            <div style="display:flex; align-items:center;">
                                <h2 style="margin-right:10px"><?= $item->title ?></h2>
                                <?php
                                    $arr = explode(",", preg_replace("/\s+/","",$item->tag));
                                    foreach($arr as $a) {
                                        echo "#".$a." ";
                                    }
                                ?>
                            </div>
                            
                            <p style="word-break:break-all;">
                                <?php
                                    echo mb_strlen($item->content, "UTF-8") > 100 ? mb_substr($item->content, 0, 100, "UTF-8")."..." : $item->content;
                                ?>
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

            <button class="btn btn-primary more mb-5">더 보기 10+</button>
            <div class="upbtn"><i class="fas fa-arrow-up"></i></div>
        </div>
    </section>
    <script src="./resource/js/list.js"></script>    
</body>
</html>