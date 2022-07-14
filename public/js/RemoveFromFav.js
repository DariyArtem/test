$(document).ready(function () {
    $('#removeFromFav').click(function () {
        let post_id = $('#post_id').val();
        let user_id = $('#user_id').val();
        let csrf_token = $('#csrf').attr('content');
        console.log(post_id);
        console.log(user_id)
        $.ajax({
            type: 'delete',
            url: '/remove',
            data: {
                _token: csrf_token,
                post_id: post_id,
                user_id: user_id
            },
            success: function (response) {
                if (response.status === true) {
                    toastr.success(response.message);
                    setTimeout(function(){
                        document.location.reload();
                    }, 2000);
                }
            },
            error: function (response) {
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
