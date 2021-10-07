$('.login').on('click', e => {
    e.preventDefault()

    $.ajax({
        url:`/loginCom`,
        method:'post',
        data: {
            id: $('#userId').val(),
            pass: $('#password').val()
        },
        success: re => {
            console.log(re)
        }
    })
})