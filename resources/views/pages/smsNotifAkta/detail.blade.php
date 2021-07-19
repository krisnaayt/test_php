@extends('layouts.contentLayoutMaster')

@section('title', 'Sms Notif')

@section('subtitle', 'Sms Notifikasi Akta Cerai')

@section('breadcrumb', 'Detail')

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
                            <form class="form form-vertical" id="detailPerkaraForm">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-sm">
                                                    <h4 id="infoPihakTitle">Info Perkara</h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="noPerkaraFull">Nomor Perkara</label>
                                                        <div class="controls">
                                                            <input readonly type="text" id="noPerkaraFull" class="form-control" name="noPerkaraFull" value="{{ $akta->no_perkara }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="noPerkaraFull">Nomor Akta Cerai</label>
                                                        <div class="controls">
                                                            <input readonly type="text" id="noPerkaraFull" class="form-control" name="noPerkaraFull" value="{{ $akta->no_akta_cerai }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="createdAt">Dibuat Pada</label>
                                                        <div class="controls">
                                                            <input readonly type="text" id="createdAt" class="form-control" name="createdAt" value="{{ $akta->created_at }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="smsGetStatus">Status Sinkron Akta</label>
                                                        <div class="controls">
                                                            <div class="{{ $akta->badge_get_akta_status }}">{{ $akta->get_akta_status }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="lastSync">Sinkron SIPP Pada</label>
                                                        <div class="controls">
                                                            <input readonly type="text" id="lastSync" class="form-control" name="lastSync" value="{{ $akta->last_sync_akta_at }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="smsSendStatus">Status Sms</label>
                                                        <div class="controls">
                                                            <div class="{{ $akta->badge_send_akta_status }}">{{ $akta->send_akta_status }}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="smsSendAt">Sms Terkirim Pada</label>
                                                        <div class="controls">
                                                            <input readonly type="text" id="smsSendAtPemohon" class="form-control" name="smsSendAtPemohon" value="{{ $akta->sms_send_at }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="smsText">Sms Text</label>
                                                        <div class="controls">
                                                            <textarea readonly class="form-control" id="smsText" name="smsText" rows="3" placeholder="">{{ $akta->sms_text }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm">
                                                    <h4>Info Pemohon</h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="namaPemohon">Nama</label>
                                                        <div class="controls">
                                                            <input readonly type="text" id="namaPemohon" class="form-control" name="namaPemohon" value="{{ $akta->nama_pemohon }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label for="noHpPemohon">No. HP</label>
                                                            <div class="controls">
                                                                <input readonly type="number" id="noHpPemohon" class="form-control" name="noHpPemohon" value="{{ $akta->no_hp_pemohon }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm">
                                                    <h4>Info Termohon</h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="namaTermohon">Nama</label>
                                                        <div class="controls">
                                                            <input readonly type="text" id="namaTermohon" class="form-control" name="namaTermohon" value="{{ $akta->nama_termohon }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label for="noHpTermohon">No. HP</label>
                                                            <div class="controls">
                                                                <input readonly type="number" id="noHpTermohon" class="form-control" name="noHpTermohon" value="{{ $akta->no_hp_termohon }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm">
                                            <button type="button" class="btn btn-success mr-1 mb-1 backToList">Back</button>
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
    <script src="{{ asset('js/pages/smsNotifAkta/detail.js') }}"></script>
@endsection
