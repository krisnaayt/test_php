<!-- BEGIN: Vendor JS-->
<script src="{{ asset('vendors/js/vendors.min.js') }}"></script>
<script src="{{ asset('vendors/js/ui/prism.min.js') }}"></script>

{{-- jquery validate --}}
<script src="{{ asset('vendors/js/jquery-validate/jquery.validate.js') }}"></script>
<script src="{{ asset('vendors/js/jquery-validate/additional-methods.min.js') }}"></script>
{{-- sweet alert --}}
<script src="{{ asset('vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
{{-- bootstap datetime picker --}}
<script src="{{ asset('vendors/js/moment/moment.js') }}"></script>
<script src="{{ asset('vendors/js/moment/moment-with-locales.js') }}"></script>
<script src="{{ asset('vendors/js/pickers/datetime/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('vendors/js/pickers/daterange/daterangepicker.js') }}"></script>
<script src="{{ asset('vendors/js/pickers/date/bootstrap-datepicker.min.js') }}"></script>
{{-- select2 --}}
<script src="{{ asset('vendors/js/forms/select/select2.full.min.js') }}"></script>
{{-- Datatable --}}
<script src="{{ asset('vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
<script src="{{ asset('vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
<script src="{{ asset('vendors/js/tables/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
<script src="{{ asset('vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
<script src="{{ asset('vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
<script src="{{ asset('vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
<!-- END Vendor JS-->


<!-- BEGIN: Page Vendor JS-->
@yield('vendor-script')
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('js/core/app-menu.js') }}"></script>
<script src="{{ asset('js/core/app.js') }}"></script>
<script src="{{ asset('js/scripts/components.js') }}"></script>
<script src="{{ asset('js/scripts/auth/login.js') }}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="{{ asset('js/globalCustom.js') }}"></script>
@yield('page-script')
<!-- END: Page JS-->