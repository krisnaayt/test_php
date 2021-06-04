$(function(){
    // SOCKET -----------------
    if(typeof socket !== 'undefined'){
        socket.on('getMessage', data => {
            getNotif()
        })
    }

    // ------------------------
    getNotif()
    function getNotif(){
      $.ajax({
          type: 'get',
          url: window.location.origin + '/notif/getNotif',
      }).then(function(res){
          
          $('#notifGroup').html('')
          $('#notifCountBell').html('')
          $('#notifCountHeader').html('0 New')
          $('#readAllNotifGroup').html('')

          const notifData = res.data.notif
          var content = ``;
          notifData.map(function(item){
              content += `
                  <a class="d-flex justify-content-between notifItem" href="javascript:void(0)" data-id="${item.id_notif_berkas_encrypt}">
                      <div class="media d-flex align-items-start">
                          <div class="media-left">
                              <i class="font-medium-5 ${item.berkas_status.fa_icon+' '+item.berkas_status.color}"></i>
                          </div>
                          <div class="media-body">
                              <h6 class="media-heading ${item.berkas_status.color}">${item.kode_berkas}</h6>
                              <small class="notification-text">${item.berkas_status.berkas_status+' oleh '+item.user_created.nama+' pada '+item.created_at_formatted}</small>
                          </div>
                          <small>
                              <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">
                              </time>
                          </small>
                      </div>
                  </a>
              `;
          })

          $('#notifGroup').html(content)
          $('#notifCountBell').html(notifData.length > 0 ? notifData.length : '')
          $('#notifCountHeader').html(notifData.length+' New')
          if(notifData.length > 0){
              $('#readAllNotifGroup').html(`
                  <a class="dropdown-item p-1 text-center" href="javascript:void(0)" id="readAllNotif">Read all notifications</a>
              `)
          }
      }).fail({

      })
    }

    $(document).on('click', '.notifItem', function(){
        var notifId = $(this).data('id')
        $.ajax({
            type: "get",
            url: window.location.origin + "/notif/readNotif/" + notifId,
        })
            .done(function(res) {
                getNotif()
                location.href = window.location.origin + res.data.route
            })
            .fail(function(res) {
                swal('error', 'Server Error', 'Gagal menuju halaman')
            });
    })

    $(document).on('click', '#readAllNotif', function () {
        Swal.fire({
          title: 'Apakah Anda yakin?',
          text: 'Semua notifikasi akan terhapus',
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Submit',
          confirmButtonClass: 'btn btn-primary',
          cancelButtonClass: 'btn btn-warning ml-1',
          buttonsStyling: false,
        }).then(function (result) {
          if (result.value) {
            $.ajax({
                type: "get",
                url: window.location.origin + "/notif/readAllNotif",
            })
                .done(function(res) {
                    getNotif()
                })
                .fail(function(res) {
                    swal('error', 'Server Error', 'Notifikasi gagal dihapus')
                });
          }
        })
      });
})