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
                    <div class="image image-1"></div>
                    <div class="image image-2"></div>
                    <div class="image image-3"></div>
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
            <div class="search mb-5">
                <select name="category" id="category">
                    <option value="null" selected>카테고리</option>
                    <option value="#">카테고리들</option>
                    <option value="#">카테고리들</option>
                    <option value="#">카테고리들</option>
                    <option value="#">카테고리들</option>
                    <option value="#">카테고리들</option>
                    <option value="#">카테고리들</option>
                    <option value="#">카테고리들</option>
                </select>

                <input type="text" name="searchBar" id="searchBar" class="form-control" placeholder="제목, 닉네임, 카테고리">

                <i class="fas fa-search"></i>
            </div>
            
            <div class="bestWeek mb-5">
                <h4>이번주 인기 게시물</h4>
                <div class="box">
                    <div class="item">
                        <img src="./resource/img/download.png" alt="게시물 이미지" title="게시물 이미지">
                    </div>
                    <div class="item">
                        <img src="./resource/img/download.png" alt="게시물 이미지" title="게시물 이미지">
                    </div>
                    <div class="item">
                        <img src="./resource/img/download.png" alt="게시물 이미지" title="게시물 이미지">
                    </div>
                    <div class="item">
                        <img src="./resource/img/download.png" alt="게시물 이미지" title="게시물 이미지">
                    </div>
                </div>
                <a href="/list" class="btn btn-primary">더보기</a>
            </div>
        </div>
    </section>
</body>
</html>