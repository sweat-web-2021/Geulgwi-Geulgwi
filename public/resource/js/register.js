$('.cancel').on('click', e => {
    history.back()
})

$('.chk').on('click', e => {
    e.preventDefault()

    if($('#userId').val() != '' && isPassword($('#password').val()) && $('#password').val() == $('#passchk').val() && isEmail($('#passwordHint').val())) {
        $.ajax({
            url: `/registerCom`,
            method:'post',
            data : {
                id : $('#userId').val(),
                pass : $('#password').val(),
                passHint : $('#passwordHint').val(),
                cate : null
            },
            success : () => {
                alert('회원 가입 완료')
                location.href = '/'
            }
        }) 
    } else {
        alert('정보를 확인해주세요')
    }
})

function isEmail(asValue) {
	var regExp = /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/i;

	return regExp.test(asValue);
}

function isPassword(asValue) {
	var regExp = /^(?=.*\d)(?=.*[a-zA-Z])[0-9a-zA-Z]{8,16}$/;

	return regExp.test(asValue);
}