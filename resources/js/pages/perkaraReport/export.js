$(function(){
    $('.daterange').daterangepicker({
        autoUpdateInput: false,
        locale: {
            format: 'DD-MM-YYYY'
        },
    });

    $('.daterange').val('');

    $('#daterangePenyerahan').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY'));
    });
  
    $('#daterangePenyerahan').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

    // -----------------------
    $('#daterangePutus').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY'));
    });
  
    $('#daterangePutus').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

    // -----------------------
    $('#daterangeMinutasi').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY'));
    });
  
    $('#daterangeMinutasi').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

    // -----------------------
    $('#daterangeBht').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY'));
    });
  
    $('#daterangeBht').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

    // -----------------------
    

    $('#downloadReportButton').on('click', function(){
        $('#downloadReportButton').prop('disabled', true);
        var data = {
            daterangePenyerahan: $('input[name=daterangePenyerahan]').val(),
            daterangePutus: $('input[name=daterangePutus]').val(),
            daterangeMinutasi: $('input[name=daterangeMinutasi]').val(),
            daterangeBht: $('input[name=daterangeBht]').val(),
            idJenisPerkara: $('#idJenisPerkara').val(),
            idBerkasStatus: $('#idBerkasStatus').val(),
            idUserCreated: $('#idUserCreated').val(),
        }
        var url = window.location.origin+'/perkaraReport/export?'+ $.param(data)
        window.location = url
        $('#downloadReportButton').prop('disabled', false);
    });

})