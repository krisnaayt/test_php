$(function(){

    $("#loginForm").validate({
        ignore: ":hidden",
        rules: {
            username: {
                required: true
            },
            password: {
                required: true
            }
        },
        errorPlacement: function(error, element) {
            error.appendTo(element.closest(".controls"));
        },
        submitHandler: function(form) {
            disableSubmitButton();

            var data = $(form).serialize();

            $.ajax({
                type: "post",
                url: window.location.origin + "/auth/doLogin",
                data: data
            })
                .done(function(res) {
                    enableSubmitButton()
                    location.href = window.location.origin + res.data.homeLink
                    
                })
                .fail(function(res) {
                    enableSubmitButton()
                    if(res.status == 400){
                        swal('warning', 'Failed', res.responseJSON.message)
                    }else{
                        swal('error', 'Server Error', 'Login Gagal')
                    }
                });
        }
    });
})