$(function() {
    $("#editPerkaraForm").validate({
        ignore: ":hidden",
        rules: {
            noPerkaraFull: {
                required: true
            },
            namaPemohon: {
                required: true
            },
            noHpPemohon: {
                required: true,
                number: true,
                maxlength: 16,
                pattern: "^0[0-9]+"
            },
            namaTermohon: {
                required: true
            },
            noHpTermohon: {
                number: true,
                maxlength: 16,
                pattern: "^0[0-9]+"
            },
        },
        messages: {
            noHpPemohon: {
                pattern: "Invalid format"
            },
            noHpTermohon: {
                pattern: "Invalid format"
            },
        },
        errorPlacement: function(error, element) {
            error.appendTo(element.closest(".controls"));
        },
        submitHandler: function(form) {
            disableSubmitButton();

            var data = $(form).serialize();

            $.ajax({
                type: "post",
                url: window.location.origin + "/smsNotifAkta/update",
                data: data
            })
                .done(function(res) {
                    enableSubmitButton()

                    swal('success', 'Success', 'Data berhasil diupdate', '/smsNotifAkta')
                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    enableSubmitButton()
                    swal('error', 'Server Error', 'Data gagal diupdate')
                        
                });
        }
    });
});
