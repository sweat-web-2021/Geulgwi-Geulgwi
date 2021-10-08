<section>
        <div class="container" id="register">
            <div class="box">
                <div class="logo mb-3">
                    <img src="./resource/img/logo.png" alt="로고" title="로고">
                </div>
                <form action='/register' method="post" class="mid">
                    <div class="left">
                        <div class="mb-3">
                            <label for="userId">아이디</label>
                            <input type="text" class="form-control" id="userId" name="id" required>
                        </div>
                        <div class="mb-3">
                            <label for="password">비밀번호</label>
                            <input type="password" class="form-control" id="password" placeholder="8 ~ 16자 영문, 숫자 조합" name="pass" required>
                        </div>
                        <div class="mb-3">
                            <label for="passchk">비밀번호 확인</label>
                            <input type="password" class="form-control" id="passchk" name="passchk" required>
                        </div>
                        <div class="mb-3">
                            <label for="passwordHint">비밀번호 힌트</label>
                            <input type="text" class="form-control" id="passwordHint" placeholder="@gmail.com" name="passHint" required>
                        </div>
                    </div>
    
                    <div class="right">
                        <div class="cate">
                            <h5>카테고리</h5>
                            <div class="box">
                                <div class="item"></div>
                                <div class="item"></div>
                                <div class="item"></div>
                                <div class="item"></div>
                                <div class="item"></div>
                                <div class="item"></div>
                                <div class="item"></div>
                                <div class="item"></div>
                                <div class="item"></div>
                                <div class="item"></div>
                                <div class="item"></div>
                                <div class="item"></div>
                                <div class="item"></div>
                                <div class="item"></div>
                                <div class="item"></div>
                                <div class="item"></div>
                                <div class="item"></div>
                                <div class="item"></div>
                                <div class="item"></div>
                                <div class="item"></div>
                            </div>
                        </div>
                    </div>

                    <div class="btns">
                        <button class="btn btn-danger cancel">취소</button>
                        <button class="btn btn-primary chk">회원가입</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script src="./resource/js/register.js"></script>
</body>
</html>