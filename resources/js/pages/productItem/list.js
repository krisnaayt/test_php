$(function() {
    showProductItemTable('');

    function showProductItemTable(productId){
        var productItemTable = $("#productItemTable").DataTable({
            serverSide: true,
            processing: true,
            destroy: true,
            scrollX: true,
            ajax: {
                type: 'post',
                url: window.location.origin + "/productItem/get",
                data: {
                    productId: productId,
                }
            },
            columns: [
                {
                    data: "DT_RowIndex"
                },
                {
                    data: "item_title"
                },
                {
                    data: "product_name"
                },
                {
                    data: "item_price"
                },
                {
                    data: "item_stock"
                },
                {
                    data: "item_image"
                },
                {
                    data: "created_at"
                },
                {
                    data: "updated_at"
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
    }

    $(document).on('click', '.deleteItem', function () {
        var itemId = $(this).data('id');

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
                    url: window.location.origin + "/productItem/delete/"+itemId,
                }).done(function(res){

                    Swal.fire({
                        title: "Success",
                        text: "Data berhasil dihapus",
                        type: "success",
                        confirmButtonClass: 'btn btn-primary'
                    }).then(function() {
                        showProductItemTable('');
                    });

                }).fail(function(){
                    swal('error', 'Error', 'Data gagal dihapus')
                })
                
            }
        });
    });
    
    $("#addProductItemForm").validate({
        ignore: ":hidden",
        rules: {
            productId: {
                required: true,
                maxlength:256
            },
            itemTitle: {
                required: true,
                maxlength:256
            },
            itemPrice: {
                required: true,
                maxlength:11
            },
            itemStock: {
                required: true,
                maxlength:11
            },
            itemImage: {
                maxlength:256
            },
        },
        errorPlacement: function(error, element) {
            error.appendTo(element.closest(".controls"));
        },
        submitHandler: function(form) {
            disableSubmitButton();

            var data = $(form).serialize();

            $.ajax({
                type: "post",
                url: window.location.origin + "/productItem/store",
                data: data
            })
                .done(function(res) {
                    enableSubmitButton()
                    swal('success', 'Success', 'Data berhasil disimpan', '/productItem')
                })
                .fail(function(res) {
                    enableSubmitButton()
                    swal('error', 'Server Error', 'Data gagal disimpan')
                });
        }
    });

    $("#editProductItemForm").validate({
        ignore: ":hidden",
        rules: {
            productId: {
                required: true,
                maxlength:256
            },
            itemTitle: {
                required: true,
                maxlength:256
            },
            itemPrice: {
                required: true,
                maxlength:11
            },
            itemStock: {
                required: true,
                maxlength:11
            },
            itemImage: {
                maxlength:256
            },
        },
        errorPlacement: function(error, element) {
            error.appendTo(element.closest(".controls"));
        },
        submitHandler: function(form) {
            disableSubmitButton();

            var data = $(form).serialize();

            $.ajax({
                type: "post",
                url: window.location.origin + "/productItem/update",
                data: data
            })
                .done(function(res) {
                    enableSubmitButton()
                    swal('success', 'Success', 'Data berhasil di-update', '/productItem')
                })
                .fail(function(res) {
                    enableSubmitButton()
                    swal('error', 'Server Error', 'Data gagal di-update')
                });
        }
    });

    $(document).on('click', '#addItemFromApi', function () {
        var btnContent = getFormButton('.formBtn');
        disableFormButton(btnContent);
        $.ajax({
            type: "get",
            url: window.location.origin + "/productItem/storeItemFromApi",
        })
            .done(function(res) {
                enableFormButton(btnContent);
                swal('success', 'Success', 'Data berhasil ditambahkan')
                showProductItemTable('');
            })
            .fail(function(res) {
                enableSubmitButton()
                swal('error', 'Server Error', 'Data gagal ditambahkan')
            });
    });

    $('#exportButton').on('click', function(){
        $('#exportButton').prop('disabled', true);
        var data = {
            productId: $('#productIdFilter').val(),
        }
        var url = window.location.origin+'/productItem/export?'+ $.param(data)
        window.location = url
        $('#exportButton').prop('disabled', false);
    });

    $('#productIdFilter').on('change', function(){
        var productIdFilter = $(this).val()
        showProductItemTable(productIdFilter)
    })
});
