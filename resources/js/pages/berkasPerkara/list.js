$(function() {
    var berkasPerkaraTable = $("#berkasPerkaraTable").DataTable({
        serverSide: true,
        processing: true,
        destroy: true,
        scrollX: true,
        ajax: {
            type: "get",
            url: window.location.origin + "/berkasPerkara/get"
        },
        columns: [
            {
                data: "DT_RowIndex"
            },
            {
                data: "kode_berkas"
            },
            {
                data: "tgl_penyerahan"
            },
            {
                data: "grup_jenis_perkara"
            },
            {
                data: "no_perkara"
            },
            {
                data: "berkas_status"
            },
            {
                data: "created"
            },
            // {
            //     data: "approved"
            // },
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
});
