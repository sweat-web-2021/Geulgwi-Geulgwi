let list = document.querySelectorAll('.cates')
let start = 0
let keyword = '전체';

list.forEach(item => {
    item.addEventListener('click', e => {
        start = 0
        list.forEach(asd => {
            asd.classList.remove('act')
        })

        e.target.classList.add('act')
        keyword = e.target.innerHTML

        $.ajax({
            url:'/searchreq',
            method:'post',
            data : {
                type : '카테고리',
                start,
                keyword
            },
            dataType:'JSON',
            success : res => {
                $('.list').html("")
                makelist(res)
            }
        })
    })
})

function tag(arr) {
    let arr1 = arr.replace(/ /gi, "").split(',')
    let str = ''
    arr1.forEach(item => {
        str+= "#"+ item +" ";
    })

    return str;
}

document.querySelector('.upbtn').addEventListener('click', e => {
    window.scrollTo({top:0, behavior:'smooth'});
})

document.querySelector('.more').addEventListener('click', e => {
    start += 10
    $.ajax({
        url : `/searchreq`,
        method : 'post',
        data : {
            type : '카테고리',
            start,
            keyword
        },
        dataType:'JSON',
        success : res => {
            makelist(res)
        }
    })
})

function makelist(arr) {
    arr.forEach(item => {
        let box = `<div class="item">
                    <a href="/view?id=${item.id}" target="_blank">
                        <div class="info">
                            ${ item.writedate.split(" ")[0] } | ${item.viewcnt} 읽음
                        </div>

                        <div class="cateinfo my-2">
                            <span class="pan">${item.cate}</span> ${item.writer}
                        </div>
                        <div style="display:flex; align-items:center;">
                            <h2 style="margin-right:10px">${item.title}</h2>
                            ${tag(item.tag)}
                        </div>
                        <p style="word-break:break-all;">
                            ${item.content.length > 100 ? item.content.substr(0, 100)+'...' : item.content}
                        </p>

                        <div class="jab mt-4">
                            <div class="good">
                                <i style="font-size:24px;" class="far fa-star"></i>
                                ${item.sug}
                            </div>
                            <div class="coment" style="margin-left:10px;">
                                <i style="font-size:24px;" class="far fa-comment-dots"></i>
                                ${item.recnt}
                            </div>
                        </div>
                    </a>
                </div>`
        $('.list').append(box)
    })
}