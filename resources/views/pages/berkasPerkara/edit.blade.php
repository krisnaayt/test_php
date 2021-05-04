@extends('layouts.contentLayoutMaster')

@section('title', 'Edit Berkas')

@section('subtitle', 'Penyerahan Berkas yang Telah Diminutasi oleh Panitera Pengganti')

@section('breadcrumb', 'Edit')

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
                            <form class="form form-vertical" id="editBerkasPerkaraForm">
                                @csrf
                                <input type="hidden" id="idBerkas" value="{{ $id }}">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-sm">
                                            <h4 class="font-weight-bold">Info Berkas</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="tglPenyerahan">Tgl. Penyerahan</label>
                                                <div class="controls">
                                                    <input type="text" id="tglPenyerahan" class="form-control bootstrapDatepicker" name="tglPenyerahan" placeholder="Tgl Penyerahan" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm">
                                            <h4 class="font-weight-bold">Info Perkara</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="perkaraTable">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>No.Perkara</th>
                                                            <th>Jenis Perkara</th>
                                                            <th>Tgl. Putus</th>
                                                            <th>Tgl. Minutasi</th>
                                                            <th>Tgl. BHT</th>
                                                            <th>
                                                                <button type="button" title="Add" class="btn btn-icon btn-xs btn-success" role="button" id="addPerkaraBtn" ><i class="fa fa-plus"></i></button>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="perkaraTbody">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1 submit">Submit</button>
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
@endsection

@section('page-script')
    <script src="{{ asset('js/pages/berkasPerkara/edit.js') }}"></script>
@endsection
