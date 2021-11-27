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
    <section id='search' style="position:relative; padding-bottom:80px;">
        <div class='container my-5'>
            <h3>검색</h3>
            <div class="search mb-5">
                <select name="category" id="category">
                    <option value="제목" selected>제목</option>
                    <option value="닉네임">닉네임</option>
                    <option value="카테고리">카테고리</option>
                    <option value="태그">태그</option>
                </select>
    
                <input type="text" name="searchBar" id="searchBar" class="form-control" placeholder="제목, 닉네임, 카테고리, 태그">
    
                <button class='btn search-btn'><i class="fas fa-search"></i></button>
            </div>
        
            <div class="list">
                <h3>검색결과</h3>

                <div class="box">
                    
                </div>
            </div>
        </div>

        <button class="btn btn-primary more mb-5">더 보기 10+</button>
        <div class="upbtn"><i class="fas fa-arrow-up"></i></div>
    </section>
    <script src="./resource/js/search.js"></script>
</body>
</html>