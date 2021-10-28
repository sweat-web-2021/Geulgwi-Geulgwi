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
                    <div class="btn"><?= $_SESSION['user']->nick ?></div>
                <?php else : ?>
                    <a href="/login" class="btn login">로그인</a>
                    <a href="/register" class="btn register">회원가입</a>
                <?php endif; ?>
            </div>
        </div>
    </header>
    <section>
        <?php var_dump($list); ?>
        <?php var_dump($list1); ?>
    </section>