let likebtn = document.querySelector('.likebtn')
let unlikebtn = document.querySelector('.unlikebtn')
let savebtn = document.querySelector('.savebtn')
let unsavebtn = document.querySelector('.unsavebtn')
let review = document.querySelector('.reviewup')

if(likebtn) {
    likebtn.addEventListener(e => {
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
}

if(unlikebtn) {
    unlikebtn.addEventListener(e => {
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
}

if(savebtn) {
    savebtn.addEventListener(e => {
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
}

if(unsavebtn) {
    unsavebtn.addEventListener(e => {
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
}

if(review) {
    review.addEventListener('click', e => {
        if($('.reviewtext').val() == '') 
            return
    
        e.preventDefault()
        $.ajax({
            url:'/review',
            method:'post',
            data : {
                text : $('.reviewtext').val(),
                code : $('.code').val()
            },
            dataType:'JSON',
            success : res => {
                $('.reviewtext').val("")
                $('.review .top').html("")
                res.forEach(item => {
                    let con = `<div class="item">
                                    <img src="./profile/${item.profile}" alt="">
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
}