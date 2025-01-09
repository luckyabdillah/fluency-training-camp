document.querySelectorAll('form').forEach(form => {
    form.addEventListener('submit', function(e) {
        e.preventDefault()
        const container = e.target
        const submitButton = container.querySelector('.btn-submit')
        const cancelButton = container.querySelector('.btn-cancel')
        if (submitButton) {
            const submitButtonWidth = submitButton.offsetWidth
            submitButton.style.width = `${submitButtonWidth}px`

            submitButton.setAttribute('disabled', true)
            submitButton.innerHTML = `
                <div class="spinner-border spinner-border-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            `
        }
        if (cancelButton) {
            cancelButton.classList.add('disabled')
            cancelButton.setAttribute('disabled', true)
        }
        return this.submit()
    })
})

document.querySelectorAll('input.numeric').forEach(input => {
    input.addEventListener('input', e => {
        e.preventDefault()
        const parent = e.target
        const currentValue = parseInt(parent.value.split('.').join(''))
        if (isNaN(currentValue) || Math.ceil(Math.log10(currentValue + 1)) > 19) {
            parent.value = ''
        } else if(currentValue < 0) {
            parent.value = new Intl.NumberFormat("id").format(Math.abs(currentValue))
        } else {
            parent.value = new Intl.NumberFormat("id").format(currentValue)
        }
    })
})