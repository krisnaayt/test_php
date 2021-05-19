@extends('layouts.contentLayoutMaster')

@section('title', 'Report Perkara')

@section('subtitle', 'Penyerahan Berkas yang Telah Diminutasi oleh Panitera Pengganti')

@section('breadcrumb', 'Report')

@section('vendor-style')

@endsection

@section('page-style')
<link rel="stylesheet" href="{{ asset('css/pages/berkasPerkara.css') }}">
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
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Tgl. Penyerahan</label>
                                                <div class="controls">
                                                    <input readonly type='text' class="form-control daterange" name="daterangePenyerahan" id="daterangePenyerahan" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Tgl. Putus</label>
                                                <div class="controls">
                                                    <input readonly type='text' class="form-control daterange" name="daterangePutus" id="daterangePutus" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Tgl. Minutasi</label>
                                                <div class="controls">
                                                    <input readonly type='text' class="form-control daterange" name="daterangeMinutasi" id="daterangeMinutasi" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Tgl. BHT</label>
                                                <div class="controls">
                                                    <input readonly type='text' class="form-control daterange" name="daterangeBht" id="daterangeBht" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Jenis Perkara</label>
                                                <div class="controls">
                                                    <select class="form-control select2" id="idJenisPerkara" name="idJenisPerkara">
                                                        <option></option>
                                                        @foreach($jenisPerkara as $jp)
                                                        <option value="{{ $jp->id_jenis_perkara }}">{{ $jp->nama_jenis_perkara }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Status Terakhir</label>
                                                <div class="controls">
                                                    <select class="form-control select2" id="idBerkasStatus" name="idBerkasStatus">
                                                        <option></option>
                                                        @foreach($berkasStatus as $bs)
                                                        <option value="{{ $bs->id_berkas_status }}">{{ $bs->berkas_status }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Dibuat Oleh</label>
                                                <div class="controls">
                                                    <select class="form-control select2" id="idUserCreated" name="idUserCreated">
                                                        <option></option>
                                                        @foreach($user as $u)
                                                        <option value="{{ $u->id_user }}">{{ $u->nama }}</option>
                                                        @endforeach
                                                    </select>
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
    <script src="{{ asset('js/pages/perkaraReport/export.js') }}"></script>
@endsection
