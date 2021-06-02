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
/******/ 	return __webpack_require__(__webpack_require__.s = 11);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/pages/berkasPerkara/edit.js":
/*!**************************************************!*\
  !*** ./resources/js/pages/berkasPerkara/edit.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  var grupJenisPerkara = $("input[name=grupJenisPerkara]:checked").val();
  $.ajax({
    type: 'post',
    url: window.location.origin + '/berkasPerkara/getBerkasPerkara',
    data: {
      id_berkas: $('#idBerkas').val()
    }
  }).done(function (res) {
    var berkas = res.data.berkas;
    $('#kodeBerkas').val(berkas.kode_berkas);
    $("#tglPenyerahan").datepicker("update", berkas.tgl_penyerahan);

    if (berkas.grup_jenis_perkara == 'G') {
      $('#grupJenisPerkaraG').prop('checked', true);
    } else {
      $('#grupJenisPerkaraP').prop('checked', true);
    }

    grupJenisPerkara = $("input[name=grupJenisPerkara]:checked").val();
    berkas.perkara.map(function (item) {
      addPerkaraRow(item.no_perkara, item.id_jenis_perkara, item.tgl_putus, item.tgl_minutasi, item.tgl_bht, grupJenisPerkara);
    });
  }).fail(function () {});
  var perkaraRowId = 1;
  var perkaraRowNo = 1;

  function addPerkaraRow(noPerkara, idJenisPerkara, tglPutus, tglMinutasi, tglBht, grupJenisPerkara) {
    $.ajax({
      type: 'get',
      url: window.location.origin + '/berkasPerkara/getJenisPerkara/' + grupJenisPerkara
    }).done(function (res) {
      var jenisPerkara = res.data.jenisPerkara;
      perkaraContent = "";
      perkaraContent += "\n                <tr class=\"perkaraRow\" id=\"perkaraRowId".concat(perkaraRowId, "\" data-id=\"").concat(perkaraRowId, "\">\n                    <td class=\"rowNo\">").concat(perkaraRowNo, "</td>\n                    <td>\n                        <div class=\"controls\">\n                            <input value=\"").concat(noPerkara, "\" type=\"text\" id=\"noPerkara").concat(perkaraRowId, "\" class=\"form-control noPerkara\" name=\"noPerkara[").concat(perkaraRowId, "]\" placeholder=\"No. Perkara\">\n                        </div>\n                    </td>\n                    <td>\n                        <div class=\"controls\">\n                            <select class=\"form-control select2 idJenisPerkara\" id=\"idJenisPerkara").concat(perkaraRowId, "\" name=\"idJenisPerkara[").concat(perkaraRowId, "]\">\n                                <option></option>\n                                ");
      jenisPerkara.map(function (item) {
        perkaraContent += "\n                    <option ".concat(item.id_jenis_perkara == idJenisPerkara ? 'selected' : '', " value=\"").concat(item.id_jenis_perkara, "\">").concat(item.nama_jenis_perkara, "</option>\n                ");
      });
      perkaraContent += "\n                            </select>\n                        </div>\n                    </td>\n                    <td>\n                        <div class=\"controls\">\n                            <input value=\"".concat(tglPutus, "\" type=\"text\" id=\"tglPutus").concat(perkaraRowId, "\" class=\"form-control bootstrapDatepicker tglPutus\" name=\"tglPutus[").concat(perkaraRowId, "]\" placeholder=\"Tgl Putus\">\n                        </div>\n                    </td>\n                    <td>\n                        <div class=\"controls\">\n                            <input value=\"").concat(tglMinutasi, "\" type=\"text\" id=\"tglMinutasi").concat(perkaraRowId, "\" class=\"form-control bootstrapDatepicker tglMinutasi\" name=\"tglMinutasi[").concat(perkaraRowId, "]\" placeholder=\"Tgl Minutasi\">\n                        </div>\n                    </td>\n                    <td>\n                        <div class=\"controls\">\n                            <input value=\"").concat(tglBht, "\" type=\"text\" id=\"tglBht").concat(perkaraRowId, "\" class=\"form-control bootstrapDatepicker tglBht\" name=\"tglBht[").concat(perkaraRowId, "]\" placeholder=\"Tgl BHT\">\n                        </div>\n                    </td>\n                    <td>\n                        <button type=\"button\" title=\"Delete\" class=\"btn btn-icon btn-xs btn-danger removePerkaraBtn\" role=\"button\" id=\"removePerkaraBtn").concat(perkaraRowId, "\" ><i class=\"fa fa-minus\"></i></button>\n                    </td>\n                </tr>\n            ");
      $('#perkaraTbody').append(perkaraContent);
      $(".select2").select2({
        dropdownAutoWidth: true,
        width: '100%',
        allowClear: true,
        placeholder: "Choose One"
      });
      $(".bootstrapDatepicker").datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
        todayHighlight: true
      });
      addValidation();
      perkaraRowId++;
      perkaraRowNo++;
    }).fail(function (res) {});
  }

  function addValidation() {
    $('.noPerkara').each(function () {
      $(this).rules("add", {
        required: true
      });
    });
    $('.idJenisPerkara').each(function () {
      $(this).rules("add", {
        required: true
      });
    });
    $('.tglPutus').each(function () {
      $(this).rules("add", {
        required: true
      });
    });
    $('.tglMinutasi').each(function () {
      $(this).rules("add", {
        required: true
      });
    });
  }

  $(document).on('click', '#addPerkaraBtn', function () {
    addPerkaraRow('', '', '', '', '', grupJenisPerkara);
  });

  function resetRowNo() {
    perkaraRowNo = 1;
    $('.rowNo').each(function () {
      $(this).html(perkaraRowNo);
      perkaraRowNo++;
    });
  }

  function removePerkaraRow(rowId) {
    $('#perkaraRowId' + rowId).remove();
    resetRowNo();
  }

  $(document).on('click', '.removePerkaraBtn', function () {
    var rowId = $(this).parents('tr').data('id');
    var countPerkaraRow = $('.perkaraRow').length;

    if (countPerkaraRow <= 1) {
      swal('warning', 'Warning', 'Isi minimal 1 perkara');
    } else {
      removePerkaraRow(rowId);
    }
  });
  $("#editBerkasPerkaraForm").validate({
    ignore: ":hidden",
    rules: {
      tglPenyerahan: {
        required: true
      }
    },
    errorPlacement: function errorPlacement(error, element) {
      error.appendTo(element.closest(".controls"));
    },
    submitHandler: function submitHandler(form) {
      var btnContent = getFormButton('.formBtn');
      disableFormButton(btnContent);
      var data = $(form).serialize();
      $.ajax({
        type: "post",
        url: window.location.origin + "/berkasPerkara/update",
        data: data
      }).done(function (res) {
        enableFormButton(btnContent);
        swal('success', 'Success', 'Data berhasil disimpan', '/berkasPerkara');
      }).fail(function (res) {
        enableFormButton(btnContent);
        swal('error', 'Server Error', 'Data gagal disimpan');
      });
    }
  });
});

/***/ }),

/***/ 11:
/*!********************************************************!*\
  !*** multi ./resources/js/pages/berkasPerkara/edit.js ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\pa_batulicin\resources\js\pages\berkasPerkara\edit.js */"./resources/js/pages/berkasPerkara/edit.js");


/***/ })

/******/ });