$(function() {
    var suratPanjarTable = $("#notifAktaTable").DataTable({
        serverSide: true,
        processing: true,
        destroy: true,
        scrollX: true,
        ajax: {
            type: "get",
            url: window.location.origin + "/smsNotifAkta/get"
        },
        columns: [
            {
                data: "DT_RowIndex"
            },
            {
                data: "no_perkara"
            },
            {
                data: "no_akta_cerai"
            },
            {
                data: "pemohon"
            },
            {
                data: "termohon"
            },
            {
                data: "get_akta_status"
            },
            {
                data: "send_akta_status"
            },
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
