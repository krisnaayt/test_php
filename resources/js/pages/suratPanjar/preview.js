$(function(){
    $('#exportSuratBtn').on('click', function(){
        $("#exportContent").wordExport('Surat_123');
    })

    $('.backToList').on('click', function(){
        location.href = window.location.origin + '/suratPanjar'
    })
})