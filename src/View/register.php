<section>
        <div class="container" id="register">
            <div class="box">
                <div class="logo mb-3">
                    <h2>회원가입</h2>
                    타 사이트에서 이용 중인 아이디나 비밀번호를 <b>절대</b> 사용하지 마세요.
                </div>
                <form action='/register' method="post" class="mid" enctype="multipart/form-data">
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
                    </div>
    
                    <div class="right">
                        <div class="img mb-4">
                            <img src="./resource/img/profile.png" alt="" class="imgPreview">
                            <input type="file" name="profile" id="profile" accept='image/*'>
                        </div>
                        <div class="cate mb-3">
                            <h5 class="mb-4">카테고리</h5>
                            <div class="box">
                                <input type="checkbox" value="책" name="cate[]" id="temp1">
                                <label for="temp1">책</label>
                                <input type="checkbox" value="시" name="cate[]" id="temp2">
                                <label for="temp2">시</label>
                                <input type="checkbox" value="음악" name="cate[]" id="temp3">
                                <label for="temp3">음악</label>
                                <input type="checkbox" value="영화" name="cate[]" id="temp4">
                                <label for="temp4">영화</label>
                            </div>
                        </div>
                    </div>

                    <div class="btns my-4">
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
