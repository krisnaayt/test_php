$(function() {
    $.ajax({
        type: 'post',
        url: window.location.origin + '/berkasPerkara/getBerkasPerkara',
        data: {
            id_berkas: $('#idBerkas').val()
        }
    }).done(function(res){
        var berkas = res.data.berkas
        console.log(berkas)
        
        berkas.perkara.map(function(item){

        })

    }).fail(function(){

    })

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
                            <input type="text" id="noPerkara${perkaraRowId}" class="form-control noPerkara" name="noPerkara[]" placeholder="No. Perkara">
                        </div>
                    </td>
                    <td>
                        <div class="controls">
                            <select class="form-control select2 idJenisPerkara" id="idJenisPerkara${perkaraRowId}" name="idJenisPerkara[]">
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
                            <input type="text" id="tglPutus${perkaraRowId}" class="form-control bootstrapDatepicker tglPutus" name="tglPutus[]" placeholder="Tgl Putus">
                        </div>
                    </td>
                    <td>
                        <div class="controls">
                            <input type="text" id="tglMinutasi${perkaraRowId}" class="form-control bootstrapDatepicker tglMinutasi" name="tglMinutasi[]" placeholder="Tgl Minutasi">
                        </div>
                    </td>
                    <td>
                        <div class="controls">
                            <input type="text" id="tglBht${perkaraRowId}" class="form-control bootstrapDatepicker tglBht" name="tglBht[]" placeholder="Tgl BHT">
                        </div>
                    </td>
                    <td>
                        <button type="button" title="Add" class="btn btn-icon btn-xs btn-danger removePerkaraBtn" role="button" id="removePerkaraBtn${perkaraRowId}" ><i class="fa fa-minus"></i></button>
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

            addValidation();

            perkaraRowId++;
            perkaraRowNo++;
        }).fail(function(res){

        })
    }

    // addValidation();

    function addValidation(){
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
    }

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
            disableSubmitButton();
            var data = $(form).serialize();

            $.ajax({
                type: "post",
                url: window.location.origin + "/berkasPerkara/store",
                data: data
            })
                .done(function(res) {
                    enableSubmitButton()
                    console.log(res)
                    // swal('success', 'Success', 'Data berhasil disimpan', '/berkasPerkara')
                })
                .fail(function(res) {
                    enableSubmitButton()
                    swal('error', 'Server Error', 'Data gagal disimpan')
                });
        }
    });
});
