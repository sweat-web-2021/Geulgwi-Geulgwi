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