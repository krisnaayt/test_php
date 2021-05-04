@extends('layouts.contentLayoutMaster')

@section('title', 'Add Berkas')

@section('subtitle', 'Penyerahan Berkas yang Telah Diminutasi oleh Panitera Pengganti')

@section('breadcrumb', 'Add')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset('vendors/css/pickers/pickadate/pickadate.css') }}">
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
                            <form class="form form-vertical" id="addBerkasPerkaraForm">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <h4 class="font-weight-bold">Info Berkas</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="tglPenyerahan">Tgl Penyerahan</label>
                                                <div class="controls">
                                                    <input type="text" id="tglPenyerahan" class="form-control datePicker" name="tglPenyerahan" placeholder="Tgl Penyerahan">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <h4 class="font-weight-bold">Info Perkara</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <p>No</p>
                                        </div>
                                        <div class="col-sm-2">
                                            <p>No. Perkara</p>
                                        </div>
                                        <div class="col-sm-3">
                                            <p>Jenis Perkara</p>
                                        </div>
                                        <div class="col-sm">
                                            <p>Tgl Putus</p>
                                        </div>
                                        <div class="col-sm">
                                            <p>Tgl Minutasi</p>
                                        </div>
                                        <div class="col-sm-1">
                                            <p>Tgl BHT</p>
                                        </div>
                                        <div class="col-sm-1">
                                            <p>No</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <p>1</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <input type="text" id="noPerkara" class="form-control" name="noPerkara" placeholder="No Perkara">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                              <div class="controls">
                                                <select class="form-control jenisPerkara" id="idJenisPerkara" name="idJenisPerkara">
                                                  <option></option>
                                                  @foreach ($jenisPerkara as $jP)
                                                    <option value="{{ $jP->id_jenis_perkara }}">{{ $jP->jenis_perkara }}</option>
                                                  @endforeach
                                                </select>
                                              </div>
                                            </div>
                                          </div>
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <input type="text" id="tglPutus" class="form-control datePicker" name="tglPutus" placeholder="Tgl Putus">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <input type="text" id="tglMinutasi" class="form-control datePicker" name="tglMinutasi" placeholder="Tgl Minutasi">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <div class="controls">
                                                    <input type="text" id="tglBht" class="form-control datePicker" name="tglBht" placeholder="Tgl BHT">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-1">
                                            <div class="form-group">
                                                <p>2</p>
                                            </div>
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
        <script src="{{ asset('vendors/js/pickers/pickadate/picker.js') }}"></script>
        <script src="{{ asset('vendors/js/pickers/pickadate/picker.date.js') }}"></script>
        <script src="{{ asset('vendors/js/pickers/pickadate/picker.time.js') }}"></script>
        <script src="{{ asset('vendors/js/pickers/pickadate/legacy.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('js/pages/berkasPerkara/add.js') }}"></script>
@endsection
