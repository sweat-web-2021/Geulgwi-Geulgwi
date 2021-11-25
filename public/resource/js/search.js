let searchbar = document.querySelector('#searchBar')

document.querySelector('.search-btn').addEventListener('click', e => {
    search()
})

searchbar.addEventListener('keyup', e => {
    if(e.keyCode == 13) {
        search()
    }
})

function search() {
    let type = document.querySelector('#category').value
    
    $.ajax({
        url:`/searchreq`,
        method:'post',
        data : {
            type,
            keyword : searchbar.value
        },
        dataType:'JSON',
        success : res => {
            makeList(res)
        }
    })
}

function makeList(res) {
    $('.list .box').html("")
    res.forEach(item => {
        let box = `<div class="item">
                        <a href="/view?id=${item.id}" target="_blank">
                            <div class="info">
                                ${ item.writedate.split(" ")[0] } | ${item.viewcnt} 읽음
                            </div>

                            <div class="cateinfo my-2">
                                <span class="pan">${item.cate}</span> ${item.writer}
                            </div>
                            <h2>${item.title}</h2>
                            <p style="word-break:break-all;">
                                ${item.content}
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
    });
}