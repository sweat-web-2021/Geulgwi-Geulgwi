let searchbar = document.querySelector('#searchBar')
let start = 0
let type
let keyword

document.querySelector('.search-btn').addEventListener('click', e => {
    search()
})

searchbar.addEventListener('keyup', e => {
    if(e.keyCode == 13) {
        search()
    }
})

function search() {
    type = document.querySelector('#category').value
    start = 0
    keyword = searchbar.value

    $.ajax({
        url:`/searchreq`,
        method:'post',
        data : {
            type,
            start,
            keyword
        },
        dataType:'JSON',
        success : res => {
            $('.list .box').html("")
            makeList(res)
        }
    })
}

document.querySelector('.more').addEventListener('click', e => {
    start += 10
    $.ajax({
        url : `/searchreq`,
        method : 'post',
        data : {
            type,
            start,
            keyword
        },
        dataType:'JSON',
        success : res => {
            makeList(res)
        },
        error : ad => {
            console.log(ad)
        }
    })
})

function makeList(res) {
    if(res.length) {
        res.forEach(item => {
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
    
            $('.list .box').append(box)
        })
    } else {
        let box = '<p>검색 결과가 없습니다.</p>'
        $('.list .box').append(box)
    }
}

function tag(arr) {
    let arr1 = arr.replace(/ /gi, "").split(',')
    console.log(arr1)
    let str = ''
    arr1.forEach(item => {
        str+= "#"+ item +" ";
    })

    return str;
}

document.querySelector('.upbtn').addEventListener('click', e => {
    window.scrollTo({top:0, behavior:'smooth'});
})