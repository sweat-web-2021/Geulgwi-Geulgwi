document.querySelector('.cancle').addEventListener('click', e => {
    e.preventDefault()
    history.back()
})

document.querySelector('#content').addEventListener('keyup', e => {
    document.querySelector('.limit').innerHTML = `(${e.target.value.length}/300)`
    if(e.target.value.length > 300) {
        e.target.value = e.target.value.substr(0, 300);
        document.querySelector('.limit').innerHTML = "(300 / 300)";
    }
})