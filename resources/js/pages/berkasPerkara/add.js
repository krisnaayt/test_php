$(function() {

    var perkaraRowId = 1;
    var perkaraRowNo = 1;

    function addPerkaraRow(){
        $.ajax({
            type: 'get',
            url: window.location.origin + '/berkasPerkara/getJenisPerkara'
        }).done(function(res){
            var jenisPerkara = res.data.jenisPerkara


            perkaraContent = ``;

            perkaraContent += `
                <tr class="perkaraRow" id="perkaraRowId${perkaraRowId}" data-id="${perkaraRowId}">
                    <td class="rowNo">${perkaraRowNo}</td>
                    <td>
                        <div class="controls">
                            <input type="text" id="noPerkara${perkaraRowId}" class="form-control noPerkara" name="noPerkara[${perkaraRowId}]" placeholder="No. Perkara">
                        </div>
                    </td>
                    <td>
                        <div class="controls">
                            <select class="form-control select2 idJenisPerkara" id="idJenisPerkara${perkaraRowId}" name="idJenisPerkara[${perkaraRowId}]">
                                <option></option>
                                `;

            jenisPerkara.map(function(item){
                perkaraContent += `
                    <option value="${item.id_jenis_perkara}">${item.nama_jenis_perkara}</option>
                `;
            })

            perkaraContent += `
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="controls">
                            <input type="text" id="tglPutus${perkaraRowId}" class="form-control bootstrapDatepicker tglPutus" name="tglPutus[${perkaraRowId}]" placeholder="Tgl Putus">
                        </div>
                    </td>
                    <td>
                        <div class="controls">
                            <input type="text" id="tglMinutasi${perkaraRowId}" class="form-control bootstrapDatepicker tglMinutasi" name="tglMinutasi[${perkaraRowId}]" placeholder="Tgl Minutasi">
                        </div>
                    </td>
                    <td>
                        <div class="controls">
                            <input type="text" id="tglBht${perkaraRowId}" class="form-control bootstrapDatepicker tglBht" name="tglBht[${perkaraRowId}]" placeholder="Tgl BHT">
                        </div>
                    </td>
                    <td>
                        <button type="button" title="Delete" class="btn btn-icon btn-xs btn-danger removePerkaraBtn" role="button" id="removePerkaraBtn${perkaraRowId}" ><i class="fa fa-minus"></i></button>
                    </td>
                </tr>
            `;

            $('#perkaraTbody').append(perkaraContent)
            
            $(".select2").select2({
                dropdownAutoWidth: true,
                width: '100%',
                allowClear: true,
                placeholder: "Choose One",
              })

              $(".bootstrapDatepicker").datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true,
                todayHighlight: true,
            });

            $('.noPerkara').each(function () {
                $(this).rules("add", {
                    required: true,
                });
            });

            $('.idJenisPerkara').each(function () {
                $(this).rules("add", {
                    required: true,
                });
            });

            $('.tglPutus').each(function () {
                $(this).rules("add", {
                    required: true,
                });
            });

            $('.tglMinutasi').each(function () {
                $(this).rules("add", {
                    required: true,
                });
            });

            perkaraRowId++;
            perkaraRowNo++;
        }).fail(function(res){

        })
    }

    addPerkaraRow();

    $(document).on('click', '#addPerkaraBtn', function(){
        addPerkaraRow();
    })

    function resetRowNo(){
        perkaraRowNo = 1
        $('.rowNo').each(function(){
            $(this).html(perkaraRowNo)
            perkaraRowNo++
        })
    }

    function removePerkaraRow(rowId){
        $('#perkaraRowId'+rowId).remove();
        resetRowNo();
        
    }

    $(document).on('click', '.removePerkaraBtn', function(){
        var rowId = $(this).parents('tr').data('id');
        var countPerkaraRow = $('.perkaraRow').length
        if (countPerkaraRow <= 1){
            swal('warning', 'Warning', 'Isi minimal 1 perkara')
        }else{
            removePerkaraRow(rowId);
        }
    })
    

    $("#addBerkasPerkaraForm").validate({
        ignore: ":hidden",
        rules: {
            tglPenyerahan: {
                required: true
            }
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
                url: window.location.origin + "/berkasPerkara/store",
                data: data
            })
                .done(function(res) {
                    enableFormButton(btnContent)
                    swal('success', 'Success', 'Data berhasil disimpan', '/berkasPerkara')
                })
                .fail(function(res) {
                    enableFormButton(btnContent)
                    swal('error', 'Server Error', 'Data gagal disimpan')
                });
        }
    });
});
