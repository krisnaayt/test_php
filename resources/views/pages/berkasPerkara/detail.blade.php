@extends('layouts.contentLayoutMaster')

@section('title', 'Detail Berkas')

@section('subtitle', 'Penyerahan Berkas yang Telah Diminutasi oleh Panitera Pengganti')

@section('breadcrumb', 'Detail')

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
                            <form class="form form-vertical" id="addBerkasPerkaraForm">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h4 class="font-weight-bold">Info Berkas</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="kodeBerkas">Kode Berkas</label>
                                                <div class="controls">
                                                    <input readonly type="text" id="kodeBerkas" class="form-control" name="kodeBerkas" placeholder="Kode Berkas" value="{{ $berkas->kode_berkas }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="tglPenyerahan">Tgl. Penyerahan</label>
                                                <div class="controls">
                                                    <input readonly type="text" id="tglPenyerahan" class="form-control bootstrapDatepicker" name="tglPenyerahan" placeholder="Tgl Penyerahan" value="{{ $berkas->tgl_penyerahan }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="status">Status Terakhir</label>
                                                <div class="controls">
                                                    <div class="{{ $berkas->berkasStatus->badge }}">{{ $berkas->berkasStatus->berkas_status }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="createdBy">Dibuat</label>
                                                <div class="controls">
                                                    <input readonly type="text" id="createdBy" class="form-control" name="createdBy" value="{{ $berkas->created}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="updatedBy">Di-update</label>
                                                <div class="controls">
                                                    <input readonly type="text" id="updatedBy" class="form-control" name="updatedBy" value="{{ $berkas->updated}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="approvedBy">Diterima</label>
                                                <div class="controls">
                                                    <input readonly type="text" id="approvedBy" class="form-control" name="approvedBy" value="{{ $berkas->approved}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="rejectedBy">Ditolak</label>
                                                <div class="controls">
                                                    <input readonly type="text" id="rejectedBy" class="form-control" name="rejectedBy" value="{{ $berkas->rejected}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="ketStatus">Keterangan</label>
                                                <div class="controls">
                                                    <textarea readonly class="form-control" id="ketStatus" rows="2" placeholder="Keterangan">{{ $berkas->ket_status }}</textarea>
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
                                                <table class="table table-bordered" id="perkaraTable" style="width: 100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>No.Perkara</th>
                                                            <th>Jenis Perkara</th>
                                                            <th>Tgl. Putus</th>
                                                            <th>Tgl. Minutasi</th>
                                                            <th>Tgl. BHT</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="perkaraTbody">
                                                        @foreach ($berkas->perkara as $perkara)
                                                            <tr>
                                                                <td>1</td>
                                                                <td>{{ $perkara->no_perkara }}</td>
                                                                <td>{{ $perkara->id_jenis_perkara }}</td>
                                                                <td>{{ $perkara->tgl_putus }}</td>
                                                                <td>{{ $perkara->tgl_minutasi }}</td>
                                                                <td>{{ $perkara->tgl_bht }}</td>
                                                            </tr>
                                                        @endforeach
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
    <script src="{{ asset('js/pages/berkasPerkara/detail.js') }}"></script>
@endsection
