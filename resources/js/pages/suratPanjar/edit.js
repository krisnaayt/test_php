$(function() {
    $("input[type=checkbox][name=infoPerkara]").on("change", function() {
        $('input[type="checkbox"][name=infoPerkara]')
            .not(this)
            .prop("checked", false);
    });

    $("input[type=checkbox][name=sebagai]").on("change", function() {
        $('input[type="checkbox"][name=sebagai]')
            .not(this)
            .prop("checked", false);
    });

    $("#editSuratPanjarForm").validate({
        ignore: ":hidden",
        rules: {
            noSurat: {
                required: true
            },
            bulanSuratName: {
                required: true
            },
            tahunSurat: {
                required: true
            },
            noPerkara: {
                required: true,
                maxlength:256
            },
            infoPerkara: {
                required: true
            },
            tahunPerkara: {
                required: true,
                maxlength:4
            },
            nama: {
                required: true,
                maxlength:256
            },
            alamat: {
                required: true,
                maxlength: 256
            },
            noTelp: {
                required: true,
                maxlength:15
            },
            sebagai: {
                required: true
            },
            namaRekening: {
                required: true,
                maxlength: 256
            },
            noRekening: {
                required: true,
                maxlength: 256
            },
            cabang: {
                required: true,
                maxlength: 256
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
                url: window.location.origin + "/suratPanjar/update",
                data: data
            })
                .done(function(res) {
                    enableSubmitButton()
                    swal('success', 'Success', 'Data berhasil disimpan', '/suratPanjar')
                })
                .fail(function(res) {
                    enableSubmitButton()
                    swal('error', 'Error', 'Data gagal disimpan')
                });
        }
    });
});
