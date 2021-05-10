$(function(){
    $('.daterange').daterangepicker({
        autoUpdateInput: false,
        locale: {
            format: 'DD-MM-YYYY'
        },
    });

    $('.daterange').val('');

    $('#daterange_created').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY'));
    });
  
    $('#daterange_created').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

    $('#downloadReportButton').on('click', function(){
        $('#downloadReportButton').prop('disabled', true);
        var data = {
            dateRange: $('input[name=daterange_created]').val(),
        }
        var url = window.location.origin+'/suratReport/export?'+ $.param(data)
        window.location = url
        $('#downloadReportButton').prop('disabled', false);
    });

})