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
    <section class="mypage">
        <div class="user_info">
            <div class="box">
                <div class="image" style="margin-right:30px">
                    <img style="border-radius:50%;" src="./profile/<?= $_SESSION['user']->profile ?>" alt="user_profile">
                </div>
                <div class="text">
                    <div style="font-size:30pt" class="user_name mb-3"><?= $_SESSION['user']->id ?></div>
                    <div class="edit">
                        <a href="/profileedit" class="edit-btn">프로필 편집</a>
                        <a href="#" onClick="alert('준비중인 기능입니다.');"><i style="font-size:20px; margin-left:10px; color:black;" class="fas fa-cog"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-5">
            <input type="radio" name="tab-menu" id="post" hidden checked>
            <input type="radio" name="tab-menu" id="like" hidden>
            <input type="radio" name="tab-menu" id="save" hidden>

            <label for="post"><i style="margin-right:10px;" class="fas fa-clone"></i>게시물</label>
            <label for="like" style="margin:0 70px;"><i style="margin-right:10px;" class="fas fa-heart"></i>좋아요</label>
            <label for="save"><i style="margin-right:10px;" class="fas fa-check-square"></i>저장됨</label>

            <div class="post">
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
                                    echo mb_strlen($item->content, "UTF-8") > 100 ? mb_substr($item->content, 0, 100)."..." : $item->content;
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

            <div class="like">
                <?php foreach($list1 as $item) : ?>
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
                                    echo mb_strlen($item->content, "UTF-8") > 100 ? mb_substr($item->content, 0, 100)."..." : $item->content;
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

            <div class="save">
                <?php foreach($list2 as $item) : ?>
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
                                    echo mb_strlen($item->content, "UTF-8") > 100 ? mb_substr($item->content, 0, 100)."..." : $item->content;
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
    </section>
</body>
</html>
