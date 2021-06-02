$(function() {

    $('.actionBtn').on('click', function () {
        var btnContent = getFormButton('.formBtn')
        disableFormButton(btnContent);
        var idBerkasStatus = $(this).data('id');
        var text = idBerkasStatus == 2 ? 'Anda menerima berkas tersebut' : 'Anda menolak berkas tersebut';
        var data = $('#reviewBerkasPerkaraForm').serializeArray();
        data.push({name: 'idBerkasStatus', value: idBerkasStatus});
        Swal.fire({
          title: 'Apakah Anda yakin?',
          text: text,
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
                url: window.location.origin + "/berkasPerkara/storeReview",
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
      });
    
});
