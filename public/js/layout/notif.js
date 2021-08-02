/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/layout/notif.js":
/*!**************************************!*\
  !*** ./resources/js/layout/notif.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  // SOCKET -----------------
  if (typeof socket !== 'undefined') {
    socket.on('getMessage', function (data) {
      getNotif();
    });
  } // ------------------------


  getNotif();

  function getNotif() {
    // $.ajax({
    //   type: 'get',
    //   url: window.location.origin + '/notif/getNotif'
    // }).then(function (res) {
    //   $('#notifGroup').html('');
    //   $('#notifCountBell').html('');
    //   $('#notifCountHeader').html('0 New');
    //   $('#readAllNotifGroup').html('');
    //   var notifData = res.data.notif;
    //   var content = "";
    //   notifData.map(function (item) {
    //     content += "\n                  <a class=\"d-flex justify-content-between notifItem\" href=\"javascript:void(0)\" data-id=\"".concat(item.id_notif_berkas_encrypt, "\">\n                      <div class=\"media d-flex align-items-start\">\n                          <div class=\"media-left\">\n                              <i class=\"font-medium-5 ").concat(item.berkas_status.fa_icon + ' ' + item.berkas_status.color, "\"></i>\n                          </div>\n                          <div class=\"media-body\">\n                              <h6 class=\"media-heading ").concat(item.berkas_status.color, "\">").concat(item.kode_berkas, "</h6>\n                              <small class=\"notification-text\">").concat(item.berkas_status.berkas_status + ' oleh ' + item.user_created.nama + ' pada ' + item.created_at_formatted, "</small>\n                          </div>\n                          <small>\n                              <time class=\"media-meta\" datetime=\"2015-06-11T18:29:20+08:00\">\n                              </time>\n                          </small>\n                      </div>\n                  </a>\n              ");
    //   });
    //   $('#notifGroup').html(content);
    //   $('#notifCountBell').html(notifData.length > 0 ? notifData.length : '');
    //   $('#notifCountHeader').html(notifData.length + ' New');

    //   if (notifData.length > 0) {
    //     $('#readAllNotifGroup').html("\n                  <a class=\"dropdown-item p-1 text-center\" href=\"javascript:void(0)\" id=\"readAllNotif\">Read all notifications</a>\n              ");
    //   }
    // }).fail({});
  }

  $(document).on('click', '.notifItem', function () {
    var notifId = $(this).data('id');
    $.ajax({
      type: "get",
      url: window.location.origin + "/notif/readNotif/" + notifId
    }).done(function (res) {
      getNotif();
      location.href = window.location.origin + res.data.route;
    }).fail(function (res) {
      swal('error', 'Server Error', 'Gagal menuju halaman');
    });
  });
  $(document).on('click', '#readAllNotif', function () {
    Swal.fire({
      title: 'Apakah Anda yakin?',
      text: 'Semua notifikasi akan terhapus',
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Submit',
      confirmButtonClass: 'btn btn-primary',
      cancelButtonClass: 'btn btn-warning ml-1',
      buttonsStyling: false
    }).then(function (result) {
      if (result.value) {
        $.ajax({
          type: "get",
          url: window.location.origin + "/notif/readAllNotif"
        }).done(function (res) {
          getNotif();
        }).fail(function (res) {
          swal('error', 'Server Error', 'Notifikasi gagal dihapus');
        });
      }
    });
  });
});

/***/ }),

/***/ 2:
/*!********************************************!*\
  !*** multi ./resources/js/layout/notif.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\dev-pa-apps\resources\js\layout\notif.js */"./resources/js/layout/notif.js");


/***/ })

/******/ });