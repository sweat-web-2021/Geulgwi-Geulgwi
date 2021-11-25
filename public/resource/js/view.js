let likebtn = document.querySelector('.likebtn')
let unlikebtn = document.querySelector('.unlikebtn')
let savebtn = document.querySelector('.savebtn')
let unsavebtn = document.querySelector('.unsavebtn')
let review = document.querySelector('.reviewup')

if(null != likebtn) {
    likebtn.addEventListener('click', e => {
        $.ajax({
            url:`/chklike`,
            method:'post',
            data : {
                code : $('.codes').val()
            },
            success : () => {
                location.reload()
            }
        })
    }, {once:true})
}

if(null != unlikebtn) {
    unlikebtn.addEventListener('click', e => {
        $.ajax({
            url:`/unlike`,
            method:'post',
            data : {
                code : $('.codes').val()
            },
            success : () => {
                location.reload()
            }
        })
    }, {once:true})
}

if(null != savebtn) {
    savebtn.addEventListener('click', e => {
        $.ajax({
            url:`/save`,
            method:'post',
            data : {
                code : $('.codes').val()
            },
            success : () => {
                location.reload()
            }
        })
    })
}

if(null != unsavebtn) {
    unsavebtn.addEventListener('click', e => {
        $.ajax({
            url:`/unsave`,
            method:'post',
            data : {
                code : $('.codes').val()
            },
            success : () => {
                location.reload()
            }
        })
    }, {once:true})
}

if(null != review) {
    review.addEventListener('click', e => {
        if($('.reviewtext').val() == '') 
            return
    
        e.preventDefault()
        $.ajax({
            url:'/review',
            method:'post',
            data : {
                text : $('.reviewtext').val(),
                code : $('.codes').val()
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
            }
        })
    })
}

//삭제

let del = document.querySelector('.delete')

if(del != null) {
    del.addEventListener('click', e => {
        if(confirm("삭제하시겠습니까?")) {
            $.ajax({
                url : '/del',
                method : 'post',
                data : {
                    code : $('.codes').val()
                },
                success : () => {
                    location.href = '/list'
                }
            })
        }
    })
}