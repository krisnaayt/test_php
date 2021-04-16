@extends('layouts.contentLayoutMaster')

@section('title', 'Report')

@section('subtitle', 'Surat Persetujuan Pengembalian Sisa Panjar Non Tunai')

@section('breadcrumb', 'Report')

@section('vendor-style')

@endsection

@section('page-style')
@endsection

@section('content')
    <!-- Basic Horizontal form layout section start -->
    <section>
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        {{-- <h4 class="card-title">Multiple Column</h4> --}}
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" id="addSuratPanjarForm">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="form-group col-sm-4">
                                                    <label>Rentang Waktu</label>
                                                    <div class='input-group'>
                                                        <input readonly type='text' class="form-control daterange" name="daterange_created" id="daterange_created" />
                                                        {{-- <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <span class="fa fa-calendar"></span>
                                                            </span>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="button" class="btn btn-primary mr-1 mb-1" id="downloadReportButton">Download</button>
                                            {{-- <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button> --}}
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic Horizontal form layout section end -->
@endsection

@section('vendor-script')
    {{-- <script src="{{ asset('vendors/js/ui/jquery.sticky.js') }}"></script> --}}
@endsection

@section('page-script')
    <script src="{{ asset('js/pages/suratReport/export.js') }}"></script>
@endsection
