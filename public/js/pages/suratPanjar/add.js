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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/pages/suratPanjar/add.js":
/*!***********************************************!*\
  !*** ./resources/js/pages/suratPanjar/add.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  $("input[type=checkbox][name=infoPerkara]").on("change", function () {
    $('input[type="checkbox"][name=infoPerkara]').not(this).prop("checked", false);
  });
  $("input[type=checkbox][name=sebagai]").on("change", function () {
    $('input[type="checkbox"][name=sebagai]').not(this).prop("checked", false);
  });
  $("#addSuratPanjarForm").validate({
    ignore: ":hidden",
    rules: {
      noSurat: {
        required: true
      },
      bulanSuratName: {
        required: true
      },
      tahunSurat: {
        required: true
      },
      noPerkara: {
        required: true,
        maxlength: 256
      },
      infoPerkara: {
        required: true
      },
      tahunPerkara: {
        required: true,
        maxlength: 4
      },
      nama: {
        required: true,
        maxlength: 256
      },
      alamat: {
        required: true,
        maxlength: 256
      },
      noTelp: {
        required: true,
        maxlength: 15
      },
      sebagai: {
        required: true
      },
      namaRekening: {
        required: true,
        maxlength: 256
      },
      noRekening: {
        required: true,
        maxlength: 256
      },
      cabang: {
        required: true,
        maxlength: 256
      }
    },
    errorPlacement: function errorPlacement(error, element) {
      error.appendTo(element.closest(".controls"));
    },
    submitHandler: function submitHandler(form) {
      disableSubmitButton();
      var data = $(form).serialize();
      $.ajax({
        type: "post",
        url: window.location.origin + "/suratPanjar/store",
        data: data
      }).done(function (res) {
        enableSubmitButton();
        swal('success', 'Success', 'Data berhasil disimpan', '/suratPanjar/preview/' + res.data.surat.id_surat_encrypt);
      }).fail(function (res) {
        enableSubmitButton();
        swal('error', 'Server Error', 'Data gagal disimpan');
      });
    }
  });
});

/***/ }),

/***/ 3:
/*!*****************************************************!*\
  !*** multi ./resources/js/pages/suratPanjar/add.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\pa_batulicin\resources\js\pages\suratPanjar\add.js */"./resources/js/pages/suratPanjar/add.js");


/***/ })

/******/ });