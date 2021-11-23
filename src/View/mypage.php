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
    <section class="mypage">
        <div class="user_info">
            <div class="box">
                <div class="image" style="margin-right:30px">
                    <img src="./profile/<?= $_SESSION['user']->profile ?>" alt="user_profile">
                </div>
                <div class="text">
                    <div style="font-size:30pt" class="user_name"><?= $_SESSION['user']->id ?></div>
                    <div class="mb-3">
                        <?php
                            $cates = explode(',', $_SESSION['user']->cate);
                            foreach($cates as $item) {
                                echo '<span style="margin-right:10px;">'.$item.'</span>';
                            }
                        ?>
                    </div>
                    <div class="edit">
                        <button class="edit-btn">프로필 편집</button>
                        <i style="font-size:20px; margin-left:10px;" class="fas fa-cog"></i>
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
                    <div class="card" style="width: 18rem;">
                        <img src="./profile/profile.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $item->title ?></h5>
                            <p class="card-text"><?= $item->content ?></p>
                            <a href="/view?id=<?= $item->id ?>" class="btn btn-primary">게시글 보기</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="like">
                <?php foreach($list1 as $item) : ?>
                    <div class="card" style="width: 18rem;">
                        <img src="./profile/profile.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $item->title ?></h5>
                            <p class="card-text"><?= $item->content ?></p>
                            <a href="/view?id=<?= $item->id ?>" class="btn btn-primary">게시글 보기</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="save">
                <?php foreach($list2 as $item) : ?>
                    <div class="card" style="width: 18rem;">
                        <img src="./profile/profile.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $item->title ?></h5>
                            <p class="card-text"><?= $item->content ?></p>
                            <a href="/view?id=<?= $item->id ?>" class="btn btn-primary">게시글 보기</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>