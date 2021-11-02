    <header>
        <div class="box">
            <div class="logo">
                <img src="./resource/img/logo.png" alt="로고" title="로고">
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
                    <div class="btn"><?= $_SESSION['user']->id ?></div>
                <?php else : ?>
                    <a href="/login" class="btn login">로그인</a>
                    <a href="/register" class="btn register">회원가입</a>
                <?php endif; ?>
            </div>
        </div>
    </header>
    <section>
        <div class="container" id="view">
            <h2><?= $list->title ?></h2>
            <div class="info">
                <div class="user"><?= $list->writer ?></div>
                <span></span>
                <div class="date"><?= $list->writedate ?></div>
            </div>
            <hr>
            <div class="box">
                <p><?= $list->content ?></p>
            </div>
            <div class="btn">
                <?php if($list->user_id != "0") : ?>
                    <button class="goodbtn btn btn-primary"><i style="color: #000;" class="fas fa-thumbs-up"></i></button>
                <?php else : ?>
                    <button class="goodbtn btn btn-primary" onclick="like(<?= $list->id ?>)"><i class="fas fa-thumbs-up"></i></button>
                <?php endif; ?>
                <p><?= $list->sug ?></p>
            </div>
        </div>
    </section>
    <script src="./resource/js/view.js"></script>