@extends('layouts.contentLayoutMaster')

@section('title', 'Sms Notif')

@section('subtitle', 'Sms Notifikasi Akta Cerai')

@section('breadcrumb', 'Add')

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
                            <form class="form form-vertical" id="findPerkaraForm">
                                @csrf
                                <div class="form-body">
                                <div class="row">
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm">
                                                    <h4>Nomor Perkara</h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="noPerkara">Nomor</label>
                                                        <div class="controls">
                                                            <input type="number" id="noPerkara" class="form-control" name="noPerkara" placeholder="Nomor">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="infoPerkara">Jenis Perkara</label>
                                                        <div class="controls">
                                                            <div class="d-inline-block custom-control custom-checkbox mr-1">
                                                                <input type="checkbox" class="custom-control-input" name="jenisPerkara" value="G" id="jenisPerkaraG">
                                                                <label class="custom-control-label" for="jenisPerkaraG">G</label>
                                                            </div>
                                                            <div class="d-inline-block custom-control custom-checkbox mr-1">
                                                                <input type="checkbox" class="custom-control-input" name="jenisPerkara" value="P" id="jenisPerkaraP">
                                                                <label class="custom-control-label" for="jenisPerkaraP">P</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="tahunPerkara">Tahun </label>
                                                        <div class="controls">
                                                            <input type="number" id="tahunPerkara" class="form-control" name="tahunPerkara" value="{{ date('Y') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="button" id="resetBtn" class="btn btn-warning mr-1 mb-1">Reset</button>
                                            <button type="submit" id="findBtn" class="btn btn-primary mr-1 mb-1">Cari</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <form class="form form-vertical" id="addPerkaraForm" style="display:none">
                                @csrf
                                <input type="hidden" id="idPerkara" name="idPerkara">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-sm">
                                                    <h4 id="infoPihakTitle">Info Perkara</h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="noPerkaraFull">Nomor Perkara</label>
                                                        <div class="controls">
                                                            <input readonly type="text" id="noPerkaraFull" class="form-control" name="noPerkaraFull">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="namaPemohon">Nama Pemohon</label>
                                                        <div class="controls">
                                                            <input readonly type="text" id="namaPemohon" class="form-control" name="namaPemohon">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label for="noHpPemohon">No. HP Pemohon</label>
                                                            <div class="controls">
                                                                <input type="number" id="noHpPemohon" class="form-control" name="noHpPemohon" placeholder="contoh: 08123456789">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="namaTermohon">Nama Termohon</label>
                                                        <div class="controls">
                                                            <input readonly type="text" id="namaTermohon" class="form-control" name="namaTermohon">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label for="noHpTermohon">No. HP Termohon</label>
                                                            <div class="controls">
                                                                <input type="number" id="noHpTermohon" class="form-control" name="noHpTermohon"  placeholder="contoh: 08123456789">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
    {{-- <script src="{{ asset('vendors/js/ui/jquery.sticky.js') }}"></script> --}}
@endsection

@section('page-script')
    <script src="{{ asset('js/pages/smsNotifAkta/add.js') }}"></script>
@endsection
