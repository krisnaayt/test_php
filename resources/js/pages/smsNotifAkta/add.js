$(function() {
    $("input[type=checkbox][name=jenisPerkara]").on("change", function() {
        $('input[type="checkbox"][name=jenisPerkara]')
            .not(this)
            .prop("checked", false);
    });

    $("#findPerkaraForm").validate({
        ignore: ":hidden",
        rules: {
            noPerkara: {
                required: true,
                maxlength:256
            },
            jenisPerkara: {
                required: true
            },
            tahunPerkara: {
                required: true,
                maxlength:4
            },
        },
        errorPlacement: function(error, element) {
            error.appendTo(element.closest(".controls"));
        },
        submitHandler: function(form) {
            disableSubmitButton();
            disableButton('#resetBtn')
            disableButton('#findBtn')

            var data = $(form).serialize();

            $.ajax({
                type: "post",
                url: window.location.origin + "/smsNotifAkta/findPerkara",
                data: data
            })
                .done(function(res) {
                    enableSubmitButton()
                    enableButton('#resetBtn', 'Reset')
                    enableButton('#findBtn', 'Cari')
                    if(res.data.perkara.idPerkara != ''){
                        swal('success', 'Success', res.message)
                        resetInfoPerkara()
                        showInfoPerkara(res.data.perkara)
                    }else{
                        swal('warning', 'Warning', res.message)
                        resetInfoPerkara()
                    }
                })
                .fail(function(res) {
                    enableSubmitButton()
                    enableButton('#resetBtn', 'Reset')
                    enableButton('#findBtn', 'Cari')
                    swal('error', 'Server Error', 'Data gagal dicari')
                    resetInfoPerkara()
                });
        }
    });

    $('#resetBtn').on('click', function(){
        resetInfoPerkara()

    })

    function showInfoPerkara(perkara){
        $('#addPerkaraForm').show()
        $('#idPerkara').val(perkara.idPerkara)
        $('#noPerkaraFull').val(perkara.noPerkara)
        $('#namaPemohon').val(perkara.namaPemohon)
        $('#namaTermohon').val(perkara.namaTermohon)
        $('#namaPemohon').val(perkara.namaPemohon)
    }

    function resetInfoPerkara(){
        $('#findPerkaraForm').trigger("reset");
        $('#addPerkaraForm').trigger("reset");
        $('#addPerkaraForm').hide()
    }

    $("#addPerkaraForm").validate({
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
            disableButton('#resetBtn')
            disableButton('#findBtn')

            var data = $(form).serialize();

            $.ajax({
                type: "post",
                url: window.location.origin + "/smsNotifAkta/store",
                data: data
            })
                .done(function(res) {
                    console.log(res)
                    enableSubmitButton()
                    enableButton('#resetBtn', 'Reset')
                    enableButton('#findBtn', 'Cari')

                    swal('success', 'Success', 'Data berhasil disimpan', '/smsNotifAkta')
                })
                .fail(function(jqXHR, textStatus, errorThrown) {
                    enableSubmitButton()
                    enableButton('#resetBtn', 'Reset')
                    enableButton('#findBtn', 'Cari')

                    if(jqXHR.status == 400){
                        swal('warning', 'Warning', jqXHR.responseJSON.message)
                    }else{
                        swal('error', 'Server Error', 'Data gagal disimpan')
                    }
                });
        }
    });
});
