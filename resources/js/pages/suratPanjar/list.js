$(function() {
    var suratPanjarTable = $("#suratPanjarTable").DataTable({
        serverSide: true,
        processing: true,
        destroy: true,
        scrollX: true,
        ajax: {
            type: "get",
            url: window.location.origin + "/suratPanjar/get"
        },
        columns: [
            {
                data: "DT_RowIndex"
            },
            {
                data: "no_surat_full"
            },
            {
                data: "no_perkara_full"
            },
            {
                data: "nama"
            },
            {
                data: "alamat"
            },
            {
                data: "no_telp"
            },
            {
                data: "sebagai"
            },
            //   {
            //     data: "no_rekening",
            //   },
            //   {
            //     data: "nama_rekening",
            //   },
            //   {
            //     data: "cabang",
            //   },
            //   {
            //     data: "created",
            //   },
            //   {
            //     data: "updated",
            //   },
            {
                data: "actions"
            }
        ],
        columnDefs: [
            {
                targets: [-1],
                searchable: false,
                orderable: false
            }
        ]
    });

    $(document).on('click', '#deleteSuratBtn', function () {
        var idSurat = $(this).data('id');

        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Anda akan menghapus data ini",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Delete",
            confirmButtonClass: "btn btn-primary",
            cancelButtonClass: "btn btn-danger ml-1",
            buttonsStyling: false
        }).then(function(result) {
            if (result.value) {
                $.ajax({
                    type: "get",
                    url: window.location.origin + "/suratPanjar/delete/"+idSurat,
                }).done(function(res){

                    Swal.fire({
                        title: "Success",
                        text: "Data berhasil dihapus",
                        type: "success",
                        confirmButtonClass: 'btn btn-primary'
                    }).then(function() {
                        suratPanjarTable.ajax.reload(null, false)
                    });

                }).fail(function(){
                    swal('error', 'Error', 'Data gagal dihapus')
                })
                
            }
        });
    });
});
