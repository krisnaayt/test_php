@extends('layouts.contentLayoutMaster')

@section('title', 'Edit Surat')

@section('subtitle', 'Surat Persetujuan Pengembalian Sisa Panjar Non Tunai')

@section('breadcrumb', 'Edit')

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
                            <form class="form form-vertical" id="editSuratPanjarForm">
                                @csrf
                                <input type="hidden" id="idSurat" name="idSurat" value="{{ encrypt($surat->id_surat) }}">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="row">
                                                <div class="col-sm">
                                                    <h4>Nomor Surat</h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="noSurat">Nomor</label>
                                                        <div class="controls">
                                                            <input readonly type="number" id="noSurat" class="form-control" name="noSurat" placeholder="Nomor" value="{{ $surat->no_surat }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="bulanSuratName">Bulan</label>
                                                        <div class="controls">
                                                            @php 
                                                                setlocale(LC_ALL, 'IND');
                                                            @endphp
                                                            <input readonly type="text" id="bulanSuratName" class="form-control" name="bulanSuratName" value="{{ strftime('%B') }}">
                                                            <input type="hidden" id="bulanSurat" name="bulanSurat" value="{{ $surat->bulan_surat }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="tahunSurat">Tahun </label>
                                                        <div class="controls">
                                                            <input readonly type="number" id="tahunSurat" class="form-control" name="tahunSurat" value="{{ $surat->tahun_surat }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
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
                                                            <input type="number" id="noPerkara" class="form-control" name="noPerkara" placeholder="Nomor" value="{{ $surat->no_perkara }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="infoPerkara">Jenis Perkara</label>
                                                        <div class="controls">
                                                            <div class="d-inline-block custom-control custom-checkbox mr-1">
                                                                <input type="checkbox" class="custom-control-input" name="infoPerkara" value="G" id="infoPerkaraG" {{ $surat->info_perkara == 'G' ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="infoPerkaraG">G</label>
                                                            </div>
                                                            <div class="d-inline-block custom-control custom-checkbox mr-1">
                                                                <input type="checkbox" class="custom-control-input" name="infoPerkara" value="P" id="infoPerkaraP" {{ $surat->info_perkara == 'P' ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="infoPerkaraP">P</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="tahunPerkara">Tahun </label>
                                                        <div class="controls">
                                                            <input type="number" id="tahunPerkara" class="form-control" name="tahunPerkara" value="{{ $surat->tahun_perkara }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col">
                                            <div class="row">
                                                <div class="col-sm">
                                                    <h4 id="infoPihakTitle">Info Penggungat / Pemohon</h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="nama">Nama</label>
                                                        <div class="controls">
                                                            <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama" value="{{ $surat->nama }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="alamat">Alamat</label>
                                                        <div class="controls">
                                                            <input type="text" id="alamat" class="form-control" name="alamat" placeholder="Alamat" value="{{ $surat->alamat }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label for="noTelp">No. Telepon</label>
                                                            <div class="controls">
                                                                <input type="number" id="noTelp" class="form-control" name="noTelp" placeholder="No Telp" value="{{ $surat->no_telp }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="sebagai">Sebagai</label>
                                                        <div class="controls">
                                                            <div class="d-inline-block custom-control custom-checkbox mr-1">
                                                                <input type="checkbox" class="custom-control-input" name="sebagai" value="Penggugat" id="sebagaiPenggugat" {{ $surat->sebagai == 'Penggugat' ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="sebagaiPenggugat">Penggugat</label>
                                                            </div>
                                                            <div class="d-inline-block custom-control custom-checkbox mr-1">
                                                                <input type="checkbox" class="custom-control-input" name="sebagai" value="Pemohon" id="sebagaiPemohon" {{ $surat->sebagai == 'Pemohon' ? 'checked' : '' }}>
                                                                <label class="custom-control-label" for="sebagaiPemohon">Pemohon</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="namaRekening">Nama Bank</label>
                                                        <div class="controls">
                                                            <input type="text" id="namaRekening" class="form-control" name="namaRekening" placeholder="Nama Bank" value="{{ $surat->nama_rekening }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <div class="form-group">
                                                            <label for="noRekening">No. Rekening</label>
                                                            <div class="controls">
                                                                <input type="number" id="noRekening" class="form-control" name="noRekening" placeholder="No. Rekening" value="{{ $surat->no_rekening }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label for="cabang">Cabang</label>
                                                        <div class="controls">
                                                            <input type="text" id="cabang" class="form-control" name="cabang" placeholder="Cabang" value="{{ $surat->cabang }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1 submit">Submit</button>
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
    <script src="{{ asset('js/pages/suratPanjar/edit.js') }}"></script>
@endsection