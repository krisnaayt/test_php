$(function() {

    $("#setArsipForm").validate({
        ignore: ":hidden",
        rules: {

        },
        errorPlacement: function(error, element) {
            error.appendTo(element.closest(".controls"));
        },
        submitHandler: function(form) {
            var btnContent = getFormButton('.formBtn')
            disableFormButton(btnContent);
            var data = $(form).serialize();

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Berkas akan diarsipkan',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Submit',
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-warning ml-1',
                buttonsStyling: false,
            }).then(function (result) {
                if (result.value) {

                    $.ajax({
                        type: "post",
                        url: window.location.origin + "/berkasPerkara/storeSetArsip",
                        data: data
                    })
                        .done(function(res) {
                            enableFormButton(btnContent)
                            swal('success', 'Success', 'Data berhasil disimpan', '/berkasPerkara')

                            // socket
                            sendMessage(null);
                        })
                        .fail(function(res) {
                            enableFormButton(btnContent)
                            swal('error', 'Server Error', 'Data gagal disimpan')
                        });

                }else{
                    enableFormButton(btnContent)
                }
            })
            
        }
    });
    
    $('.tglBht').each(function () {
        $(this).rules("add", {
            required: true,
        });
    });
});
