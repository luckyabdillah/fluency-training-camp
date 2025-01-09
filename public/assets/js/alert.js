const flashData = $('.flash-data').data('flash');
const flashDataFailed = $('.flash-data-failed').data('flash');

if (flashData) {
    Swal({
        title: 'Success',
        text: flashData,
        type: 'success'
    })
} else if (flashDataFailed) {
    Swal({
        title: 'Oops..',
        text: flashDataFailed,
        type: 'error'
    })
}

// Swal({
//     title: 'Success',
//     text: 'Yooo dude',
//     type: 'success'
// })

$(document).on('click', '.btn-delete-course', function (event) {
    event.preventDefault();
    let form = $(this).closest("form");
    Swal({
        title: "Delete Course",
        html: "It will delete course and all related data. <br>Once it deleted, <b>it can't be undone</b>. You sure?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#ff3e1d',
        cancelButtonColor: '#8592a3',
        confirmButtonText: 'Yes, delete it',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.value) {
            form.submit()
        }
    })
})

$(document).on('click', '.btn-delete', function (event) {
    event.preventDefault()
    let form = $(this).closest("form")
    Swal({
        title: "Delete Data",
        text: "You sure want to delete this data?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#ff3e1d',
        cancelButtonColor: '#8592a3',
        confirmButtonText: 'Yes, delete it',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.value) {
            form.submit()
        }
    })
})

$(document).on('click', '.btn-enroll', function (event) {
    event.preventDefault()
    let form = $(this).closest("form")
    Swal({
        title: "Enroll course",
        text: "You sure want to enroll this course?",
        type: "info",
        showCancelButton: true,
        confirmButtonColor: '#162d81',
        cancelButtonColor: '#8592a3',
        confirmButtonText: 'Yes, enroll',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.value) {
            form.submit()
        }
    })
})

$(document).on('click', '.btn-confirm', function (event) {
    event.preventDefault()
    let form = $(this).closest("form")
    Swal({
        title: "Confirmation",
        text: "You sure want to confirm this enrollment?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#162d81',
        cancelButtonColor: '#8592a3',
        confirmButtonText: 'Yes, confirm',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.value) {
            form.submit()
        }
    })
})

$(document).on('click', '.btn-confirm-quiz', function (event) {
    event.preventDefault()
    let form = $(this).closest("form")
    Swal({
        title: "Confirmation",
        text: "You sure want to submit the quiz?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#162d81',
        cancelButtonColor: '#8592a3',
        confirmButtonText: 'Yes',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.value) {
            const submitButton = document.querySelector('.btn-submit')
            const submitButtonWidth = submitButton.offsetWidth
            submitButton.style.width = `${submitButtonWidth}px`

            submitButton.setAttribute('disabled', true)
            submitButton.innerHTML = `
                <div class="spinner-border spinner-border-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            `

            form.submit()
        }
    })
})

$(document).on('click', '.btn-reject', function (event) {
    event.preventDefault()
    let form = $(this).closest("form")
    Swal({
        title: "Rejection",
        text: "You sure want to reject this enrollment?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#ff3e1d',
        cancelButtonColor: '#8592a3',
        confirmButtonText: 'Yes, reject',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.value) {
            form.submit()
        }
    })
})

$(document).on('click', '.btn-unenroll', function (event) {
    event.preventDefault()
    let form = $(this).closest("form")
    Swal({
        title: "Unenroll",
        text: "You sure want to unenroll this course?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#ff3e1d',
        cancelButtonColor: '#8592a3',
        confirmButtonText: 'Yes, unenroll',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.value) {
            form.submit()
        }
    })
})

$(document).on('click', '.btn-back-quiz', function (event) {
    event.preventDefault()
    const courseUuid = $('[name="course_uuid"]').val()
    Swal({
        title: "Quit the quiz",
        text: "Any unsaved changes will be lost",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#ff3e1d',
        cancelButtonColor: '#8592a3',
        confirmButtonText: 'Yes, quit',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.value) {
            window.location.href = `/dashboard/courses/${courseUuid}`
        }
    })
})