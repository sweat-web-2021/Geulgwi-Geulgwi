function like(code) {
    $.ajax({
        url:`/chklike`,
        method:'post',
        data : {
            code
        },
        success : res => {
            location.reload()
        }
    })
}

$('.reviewup').on('click', e => {
    if(document.querySelector('input[name="text"]').value == '') return
    e.preventDefault()
    $.ajax({
        url:`/review`,
        method:'post',
        data : {
            text : document.querySelector('input[name="text"]').value,
            code : document.querySelector('input[name="code"]').value
        },
        dataType:'JSON',
        success : res => {
            $('input[name="text"]').val("")
            $('.review .top').html("")
            res.forEach(item => {
                let con = `<div class="item">
                                <img src="./resource/img/profile.png" alt="">
                                <span>${item.text}</span>
                            </div>`

                $('.review .top').append(con)
            });
        },
        error : e => {
            console.log(e)
        }
    })
})