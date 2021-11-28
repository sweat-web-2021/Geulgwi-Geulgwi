<section>
        <div class="container" id="login">
            <div class="logo me-4">
                <a href="/"><img src="./resource/img/logo.png" alt="로고" title="로고"></a>
            </div>

            <div class="right">
                <div class="box">
                    <form class="top" action="/login" method="post">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="id" id="userId" placeholder="아이디" required>
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="pass" id="password" placeholder="비밀번호" required>
                        </div>
                        <button style="width: 100%;" class="btn btn-primary login">로그인</button>
                    </form>
                    <div class="bot">
                        <a href="#" onClick="alert('준비중인 기능입니다.');" style="margin-right: 50px;">아이디/비밀번호 찾기</a>
                        <a href="/register">회원가입</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>