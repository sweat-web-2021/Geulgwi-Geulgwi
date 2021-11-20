document.querySelector('.likebtn').addEventListener(e => {
    $.ajax({
        url:`/chklike`,
        method:'post',
        data : {
            code : e.target.dataset.id
        },
        success : () => {
            location.reload()
        }
    })
}, {once:true})

document.querySelector('.unlikebtn').addEventListener(e => {
    $.ajax({
        url:`/unlike`,
        method:'post',
        data : {
            code : e.target.dataset.id
        },
        success : () => {
            location.reload()
        }
    })
}, {once:true})

document.querySelector('.savebtn').addEventListener(e => {
    $.ajax({
        url:`/save`,
        method:'post',
        data : {
            code : e.target.dataset.id
        },
        success : () => {
            location.reload()
        }
    })
}, {once:true})

document.querySelector('.unsavebtn').addEventListener(e => {
    $.ajax({
        url:`/unsave`,
        method:'post',
        data : {
            code : e.target.dataset.id
        },
        success : () => {
            location.reload()
        }
    })
}, {once:true})

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