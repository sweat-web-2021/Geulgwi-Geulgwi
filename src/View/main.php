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
        <div class="slider">
            <!-- 순방향 -->
            <input type="radio" name="target" id="target-1-2" hidden>
            <input type="radio" name="target" id="target-2-3" hidden>
            <input type="radio" name="target" id="target-3-1" hidden>

            <!-- 순방향 카피 -->
            <input type="radio" name="target" id="target-1-2-copy" hidden>
            <input type="radio" name="target" id="target-2-3-copy" hidden>
            <input type="radio" name="target" id="target-3-1-copy" hidden>
            
            <!-- 역방향 -->
            <input type="radio" name="target" id="target-1-3" hidden>
            <input type="radio" name="target" id="target-3-2" hidden>
            <input type="radio" name="target" id="target-2-1" hidden checked>

            <!-- 역방향 카피 -->
            <input type="radio" name="target" id="target-1-3-copy" hidden>
            <input type="radio" name="target" id="target-2-1-copy" hidden>
            <input type="radio" name="target" id="target-3-2-copy" hidden>

            <div id="target-slide" class="slide">
                <div class="inner">
                    <div class="image image-1">
                        <img src="./resource/img/banner1.png" alt="">
                    </div>
                    <div class="image image-2">
                        <img src="./resource/img/banner2.png" alt="">
                    </div>
                    <div class="image image-3">
                        <a href="https://softcon.ajou.ac.kr/works/works.asp?uid=486&grp=A"><img src="./resource/img/banner3.png" alt=""></a>
                    </div>
                </div>
                <div class="labels">
                    <div class="label">
                        <!-- 원본 -->
                        <label for="" class="label-1"></label>
                        <label for="target-2-1" class="label-2"></label>
                        <label for="target-3-1" class="label-3"></label>
                        <!-- 카피 -->
                        <label for="" class="label-1-copy"></label>
                        <label for="target-2-1-copy" class="label-2-copy"></label>
                        <label for="target-3-1-copy" class="label-3-copy"></label>
                        
                    </div>
                    <div class="label">
                        <!-- 원본 -->
                        <label for="target-1-2" class="label-1"></label>
                        <label for="" class="label-2"></label>
                        <label for="target-3-2" class="label-3"></label>
                        <!-- 카피 -->
                        <label for="target-1-2-copy" class="label-1-copy"></label>
                        <label for="" class="label-2-copy"></label>
                        <label for="target-3-2-copy" class="label-3-copy"></label>
                        
                    </div>
                    <div class="label">
                        <!-- 원본 -->
                        <label for="target-1-3" class="label-1"></label>
                        <label for="target-2-3" class="label-2"></label>
                        <label for="" class="label-3"></label>
                        <!-- 카피 -->
                        <label for="target-1-3-copy" class="label-1-copy"></label>
                        <label for="target-2-3-copy" class="label-2-copy"></label>
                        <label for="" class="label-3-copy"></label>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="bestWeek mb-5">
                <h3>이번주 인기 게시물</h3>
                <div class="box">
                    <?php foreach($list as $item) : ?>
                        <div class="item">
                            <a href="/view?id=<?= $item->id ?>">
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
            </div>
        </div>
    </section>
</body>
</html>