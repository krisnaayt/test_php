// ------ ajax
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
  })
  // -----
  
  // ------ swal
  const buttonClass = 'btn btn-primary'
  
  function swal(type, title, text, url) {
    Swal.fire({
      title: title,
      text: text,
      type: type,
      confirmButtonClass: buttonClass,
    }).then(function () {
      if (url) {
        location.href = window.location.origin + url
      }
    })
  }
  
  function swalErrorServer() {
    Swal.fire({
      title: "Error",
      text: 'Server Error',
      type: "error",
      confirmButtonClass: buttonClass,
    }).then(function () {
  
    })
  }
  
  // ------
  
  function swalSuccessInsert(url) {
    Swal.fire({
      title: "Success",
      text: 'Data berhasil disimpan',
      type: "success",
      confirmButtonClass: buttonClass,
    }).then(function () {
      $('.form')[0].reset()
      // select2
      $('.select2').val(null).trigger('change')
      $('label.error').attr('style', 'display:none')
  
      if (url) {
        location.href = window.location.origin + url
      }
    })
  }
  
  function swalSuccessUpdate(url) {
    Swal.fire({
      title: "Success",
      text: 'Data berhasil diubah',
      type: "success",
      confirmButtonClass: buttonClass,
    }).then(function () {
      $('.form')[0].reset()
      // select2
      $('.select2').val(null).trigger('change')
      $('label.error').attr('style', 'display:none')
  
      if (url) {
        location.href = window.location.origin + url
      }
    })
  }
  
  function swalSuccessDelete(url) {
    Swal.fire({
      title: "Success",
      text: 'Data berhasil dihapus',
      type: "success",
      confirmButtonClass: buttonClass,
    }).then(function () {
      if (url) {
        location.href = window.location.origin + url
      }
    })
  }
  
  function swalSuccessUpload(url) {
    Swal.fire({
      title: "Success",
      text: "File berhasil diupload",
      type: "success",
      confirmButtonClass: buttonClass,
    }).then(function () {
      $('.form')[1].reset()
      if (url) {
        location.href = window.location.origin + url
      }
    })
  }
  
  // ------
  
  function swalErrorInsert(url) {
    Swal.fire({
      title: "Error",
      text: 'Data gagal disimpan',
      type: "error",
      confirmButtonClass: buttonClass,
    }).then(function () {
      if (url) {
        location.href = window.location.origin + url
      }
    })
  }
  
  function swalErrorUpdate(url) {
    Swal.fire({
      title: "Error",
      text: 'Data gagal diubah',
      type: "error",
      confirmButtonClass: buttonClass,
    }).then(function () {
      if (url) {
        location.href = window.location.origin + url
      }
    })
  }
  
  function swalErrorDelete(url) {
    Swal.fire({
      title: "Error",
      text: 'Data gagal dihapus',
      type: "error",
      confirmButtonClass: buttonClass,
    }).then(function () {
      if (url) {
        location.href = window.location.origin + url
      }
    })
  }
  
  function swalErrorUpload(url) {
    Swal.fire({
      title: "Error",
      text: 'File gagal diupload',
      type: "error",
      confirmButtonClass: buttonClass,
    }).then(function () {
      if (url) {
        location.href = window.location.origin + url
      }
    })
  }
  
  // ----- 
  
  // ----- disable button
  function disableSubmitButton() {
    const buttonContent = `
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Loading...
    `;
    $('.submit').each(function () {
      $(this).prop('disabled', true)
      $(this).html('')
      $(this).html(buttonContent)
    })
  
  }
  
  function enableSubmitButton() {
    const buttonContent = `Submit`;
    $('.submit').each(function () {
      $(this).prop('disabled', false)
      $(this).html('')
      $(this).html(buttonContent)
    })
  }
  
  function disableButton(buttonElement) {
    $(buttonElement).prop('disabled', true)
    $(buttonElement).html('')
  
    const buttonContent = `
    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Loading...
    `
    $(buttonElement).html(buttonContent)
  }
  
  function enableButton(buttonElement, buttonContent) {
    $(buttonElement).prop('disabled', false)
    $(buttonElement).html('')
    $(buttonElement).html(buttonContent)
  }
  
  // ----- 
  
  // ----- pop up modal
  function showModalAlert(data) {
    var modalContent = `
    <div class="modal fade text-left" id="modalAlertDanger" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
          <div class="modal-content">
              <div class="modal-header bg-danger white">
                  <h5 class="modal-title" id="modalLabel">Error</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="table-responsive">
                      <table class="table">
                          <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Field</th>
                                  <th>Error Message</th>
                              </tr>
                          </thead>
                          <tbody>
                          `;
    var errorNo = 1
    data.map(function (item) {
      modalContent += `
                              <tr>
                                  <th scope="row">${errorNo}</th>
                                  <td>${item.errorField}</td>
                                  <td>${item.errorMessage}</td>
                              </tr>
                            `;
      errorNo++
    })
    modalContent += `
                          </tbody>
                      </table>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Accept</button>
              </div>
          </div>
      </div>
    </div>
    `;
  
    $('.card-body').append(modalContent)
    $('#modalAlertDanger').modal('show')
  
    $('#modalAlertDanger').on('hidden.bs.modal', function () {
      $('#modalAlertDanger').remove()
    })
  
  }
  
  // ----- 
  
  // ----- select2
  
  $(".select2").select2({
    dropdownAutoWidth: true,
    width: '100%',
    allowClear: true,
    placeholder: "Choose One",
  })
  
  // $('.select2').on('change', function(){
  //   var inputVal = $(this).val()
  //   var inputId = $(this).attr('id')
  
  //   if(inputVal != null){
  //     $('#'+inputId+'-error').attr('style', 'display:none');
  //   }
  // });
  
  $('select').select2({
    dropdownAutoWidth: true,
    width: '100%',
    allowClear: true,
    placeholder: "Choose One",
  }).on("change", function (e) {
    $(this).valid()
  });
  
  // ----- bootstrapDatepicker

    $(".bootstrapDatepicker").datepicker({
      format: 'dd/mm/yyyy',
      autoclose: false,
      todayHighlight: true,
  });

  
  // ----- datetimepicker
  
  $('.datePicker').datetimepicker({
    format: "DD/MM/YYYY",
    ignoreReadonly: true
  })
  
  $('.dateTimePicker').datetimepicker({
    format: "DD/MM/YYYY HH:mm",
    ignoreReadonly: true
  })
  
  // ----- 
  
  // ----- jquery validate
  
  jQuery.validator.addMethod("dateGreaterThan",
  function (value, element, params) {
    if(value != ''){
      var activeAt = moment($(params).val(), 'DD/MM/YYYY', true)
      var deactiveAt = moment(value, 'DD/MM/YYYY', true)
    
      if (deactiveAt < activeAt) {
        return false
      } else {
        return true
      }
    }else{
      return true
    }
  
  },
  function (params, element) {
    var paramLabel = $("label[for='" + $('#activeAt').attr('id') + "']").html()
    return 'Must be greater or equal than '+paramLabel
  })
  
  jQuery.validator.addMethod("dateTimeGreaterThan",
  function (value, element, params) {
    if(value != ''){
      var activeAt = moment($(params).val(), 'DD/MM/YYYY HH:mm', true)
      var deactiveAt = moment(value, 'DD/MM/YYYY HH:mm', true)
      if (deactiveAt < activeAt) {
        return false
      } else {
        return true
      }
    }else{
      return true
    }
  
  },
  function (params, element) {
    var paramLabel = $("label[for='" + $('#activeAt').attr('id') + "']").html()
    return 'Must be greater or equal than '+paramLabel
  })
  
  // jQuery.validator.addMethod("noSpace", function (value, element) {
  //   return value.indexOf(" ") < 0 && value != "";
  // }, "Space are not allowed");
  
  // -----
  
  // ----- Modal
  $('.modal').on('hidden.bs.modal', function () {
    $(this).find('.form')[0].reset()
  });

  // ----- back button
  $('.backBtn').on('click', function(){
    location.href = window.location.origin + $(this).data('url')
  })

  // ------ get button element and text by class

  function getFormButton(elementClass){
    var btnContent = [];
    $(elementClass).each(function(){
      var item = {}
      item['id'] = $(this).attr('id');
      item['text'] = $(this).text();

      btnContent.push(item);
    })
    return btnContent 
  }

  function disableFormButton(btnContent){
    btnContent.map(function(item){
      disableButton('#'+item.id)
    })
  }

  function enableFormButton(btnContent){
    btnContent.map(function(item){
      enableButton('#'+item.id, item.text)
    })  
  }

  function sendNotif(){
      console.log('test send notif')
  }

