$(document).ready(function () {
    $('#submitComment').click(function () {
        let name = $('#inputName').val();
        let email = $('#inputEmail').val();
        let number = $('#inputNumber').val();
        let message = $('#inputMessage').val();
        let post_id = $('#post_id').val();
        let user_id = $('#user_id').val();
        let csrf_token = $('#csrf').attr('content');
        $.ajax({
            type: 'POST',
            url: '/comment',
            data: {
                _token: csrf_token,
                name: name,
                email: email,
                number: number,
                message: message,
                post_id: post_id,
                user_id: user_id
            },
            success: function (response) {
                if (response.status === true) {
                    toastr.success(response.message);
                    $('#inputName').val('')
                    $('#inputEmail').val('')
                    $('#inputNumber').val('')
                    $('#inputMessage').val('')
                }

            },
            error: function (response) {
                console.log(response)
                console.log(response.responseJSON.message)
                if (response.responseJSON.status === false) {
                    response.responseJSON.message.forEach(function (message) {
                        toastr.error(message);
                    })
                }
            }
        })
    })
})
