$('.cancel').on('click', e => {
    e.preventDefault()
    history.back()
})

document.querySelector('#profile').addEventListener("change", e => {
    const [file] = e.target.files
    if(file) {
        document.querySelector('.imgPreview').src = URL.createObjectURL(file)
    }
})

