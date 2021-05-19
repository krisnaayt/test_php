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
                                <input type="hidden" id="idBerkas" name="idBerkas" value="{{ $id }}">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h4 class="font-weight-bold">Info Berkas</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="kodeBerkas">Kode Berkas</label>
                                                <div class="controls">
                                                    <input readonly type="text" id="kodeBerkas" class="form-control" name="kodeBerkas" placeholder="Kode Berkas">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="tglPenyerahan">Tgl. Penyerahan</label>
                                                <div class="controls">
                                                    <input type="text" id="tglPenyerahan" class="form-control bootstrapDatepicker" name="tglPenyerahan" placeholder="Tgl Penyerahan">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="grupJenisPerkara">Jenis Perkara</label>
                                                <ul class="list-unstyled mb-0">
                                                    <li class="d-inline-block mr-2">
                                                        <fieldset>
                                                            <div class="vs-radio-con">
                                                                <input type="radio" name="grupJenisPerkara" value="G" id="grupJenisPerkaraG" disabled>
                                                                <span class="vs-radio">
                                                                    <span class="vs-radio--border"></span>
                                                                    <span class="vs-radio--circle"></span>
                                                                </span>
                                                                <span class="">Gugatan</span>
                                                            </div>
                                                        </fieldset>
                                                    </li>
                                                    <li class="d-inline-block mr-2">
                                                        <fieldset>
                                                            <div class="vs-radio-con">
                                                                <input type="radio" name="grupJenisPerkara" value="P" id="grupJenisPerkaraP" disabled>
                                                                <span class="vs-radio">
                                                                    <span class="vs-radio--border"></span>
                                                                    <span class="vs-radio--circle"></span>
                                                                </span>
                                                                <span class="">Permohonan</span>
                                                            </div>
                                                        </fieldset>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="updatedBy">Di-update</label>
                                                <div class="controls">
                                                    <input readonly type="text" id="updated" class="form-control" name="updated">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="approvedBy">Diterima</label>
                                                <div class="controls">
                                                    <input readonly type="text" id="approved" class="form-control" name="approved">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="rejectedBy">Ditolak</label>
                                                <div class="controls">
                                                    <input readonly type="text" id="rejected" class="form-control" name="rejected">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="ketStatus">Keterangan</label>
                                                <div class="controls">
                                                    <textarea readonly class="form-control" id="ketStatus" rows="3" placeholder="Keterangan"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
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
                                    <hr>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="button" class="btn btn-warning mr-1 mb-1 formBtn backBtn" id="backBtn" data-url="/berkasPerkara">Cancel</button>
                                            <button type="submit" class="btn btn-primary mr-1 mb-1 formBtn" id="submitBtn">Submit</button>
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
