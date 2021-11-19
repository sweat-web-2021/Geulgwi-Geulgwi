<section>
        <div class="container" id="register">
            <div class="box">
                <div class="logo mb-3">
                    <a href="/"><img src="./resource/img/logo.png" alt="로고" title="로고"></a>
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
                            <h5 class="mb-4">카테고리</h5>
                            <div class="box">
                                <input type="checkbox" value="temp1" name="cate[]" id="temp1" hidden>
                                <input type="checkbox" value="temp2" name="cate[]" id="temp2" hidden>
                                <input type="checkbox" value="temp3" name="cate[]" id="temp3" hidden>
                                <input type="checkbox" value="temp4" name="cate[]" id="temp4" hidden>
                                <input type="checkbox" value="temp5" name="cate[]" id="temp5" hidden>
                                <input type="checkbox" value="temp6" name="cate[]" id="temp6" hidden>
                                <input type="checkbox" value="temp7" name="cate[]" id="temp7" hidden>
                                <input type="checkbox" value="temp8" name="cate[]" id="temp8" hidden>
                                <input type="checkbox" value="temp9" name="cate[]" id="temp9" hidden>
                                <input type="checkbox" value="temp10" name="cate[]" id="temp10" hidden>
                                <input type="checkbox" value="temp11" name="cate[]" id="temp11" hidden>
                                <input type="checkbox" value="temp12" name="cate[]" id="temp12" hidden>
                                <input type="checkbox" value="temp13" name="cate[]" id="temp13" hidden>
                                <input type="checkbox" value="temp14" name="cate[]" id="temp14" hidden>
                                <input type="checkbox" value="temp15" name="cate[]" id="temp15" hidden>
                                <input type="checkbox" value="temp16" name="cate[]" id="temp16" hidden>
                                <input type="checkbox" value="temp17" name="cate[]" id="temp17" hidden>
                                <input type="checkbox" value="temp18" name="cate[]" id="temp18" hidden>
                                <input type="checkbox" value="temp19" name="cate[]" id="temp19" hidden>
                                <input type="checkbox" value="temp20" name="cate[]" id="temp20" hidden>

                                <label for="temp1">temp1</label>
                                <label for="temp2">temp2</label>
                                <label for="temp3">temp3</label>
                                <label for="temp4">temp4</label>
                                <label for="temp5">temp5</label>
                                <label for="temp6">temp6</label>
                                <label for="temp7">temp7</label>
                                <label for="temp8">temp8</label>
                                <label for="temp9">temp9</label>
                                <label for="temp10">temp10</label>
                                <label for="temp11">temp11</label>
                                <label for="temp12">temp12</label>
                                <label for="temp13">temp13</label>
                                <label for="temp14">temp14</label>
                                <label for="temp15">temp15</label>
                                <label for="temp16">temp16</label>
                                <label for="temp17">temp17</label>
                                <label for="temp18">temp18</label>
                                <label for="temp19">temp19</label>
                                <label for="temp20">temp20</label>
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