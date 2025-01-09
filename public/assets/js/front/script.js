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