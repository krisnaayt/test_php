!function(e){var t={};function a(n){if(t[n])return t[n].exports;var r=t[n]={i:n,l:!1,exports:{}};return e[n].call(r.exports,r,r.exports,a),r.l=!0,r.exports}a.m=e,a.c=t,a.d=function(e,t,n){a.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},a.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},a.t=function(e,t){if(1&t&&(e=a(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(a.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)a.d(n,r,function(t){return e[t]}.bind(null,r));return n},a.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return a.d(t,"a",t),t},a.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},a.p="/",a(a.s=68)}({68:function(e,t,a){e.exports=a(69)},69:function(e,t){$((function(){$(".daterange").daterangepicker({autoUpdateInput:!1,locale:{format:"DD-MM-YYYY"}}),$(".daterange").val(""),$("#daterangePenyerahan").on("apply.daterangepicker",(function(e,t){$(this).val(t.startDate.format("DD-MM-YYYY")+" - "+t.endDate.format("DD-MM-YYYY"))})),$("#daterangePenyerahan").on("cancel.daterangepicker",(function(e,t){$(this).val("")})),$("#daterangePutus").on("apply.daterangepicker",(function(e,t){$(this).val(t.startDate.format("DD-MM-YYYY")+" - "+t.endDate.format("DD-MM-YYYY"))})),$("#daterangePutus").on("cancel.daterangepicker",(function(e,t){$(this).val("")})),$("#daterangeMinutasi").on("apply.daterangepicker",(function(e,t){$(this).val(t.startDate.format("DD-MM-YYYY")+" - "+t.endDate.format("DD-MM-YYYY"))})),$("#daterangeMinutasi").on("cancel.daterangepicker",(function(e,t){$(this).val("")})),$("#daterangeBht").on("apply.daterangepicker",(function(e,t){$(this).val(t.startDate.format("DD-MM-YYYY")+" - "+t.endDate.format("DD-MM-YYYY"))})),$("#daterangeBht").on("cancel.daterangepicker",(function(e,t){$(this).val("")})),$("#downloadReportButton").on("click",(function(){$("#downloadReportButton").prop("disabled",!0);var e={daterangePenyerahan:$("input[name=daterangePenyerahan]").val(),daterangePutus:$("input[name=daterangePutus]").val(),daterangeMinutasi:$("input[name=daterangeMinutasi]").val(),daterangeBht:$("input[name=daterangeBht]").val(),idJenisPerkara:$("#idJenisPerkara").val(),idBerkasStatus:$("#idBerkasStatus").val(),idUserCreated:$("#idUserCreated").val()},t=window.location.origin+"/perkaraReport/export?"+$.param(e);window.location=t,$("#downloadReportButton").prop("disabled",!1)}))}))}});