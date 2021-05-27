$(function() {
    
    $("#setArsipForm").validate({
        ignore: ":hidden",
        rules: {
            // tglPenyerahan: {
            //     required: true
            // }
        },
        errorPlacement: function(error, element) {
            error.appendTo(element.closest(".controls"));
        },
        submitHandler: function(form) {
            var btnContent = getFormButton('.formBtn')
            disableFormButton(btnContent);
            var data = $(form).serialize();

            $.ajax({
                type: "post",
                url: window.location.origin + "/berkasPerkara/storeSetArsip",
                data: data
            })
                .done(function(res) {
                    enableFormButton(btnContent)
                    // swal('success', 'Success', 'Data berhasil disimpan', '/berkasPerkara')
                    console.log(res)
                })
                .fail(function(res) {
                    enableFormButton(btnContent)
                    swal('error', 'Server Error', 'Data gagal disimpan')
                });
        }
    });
    
    $('.tglBht').each(function () {
        $(this).rules("add", {
            required: true,
        });
    });
});
