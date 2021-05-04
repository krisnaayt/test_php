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
                            {{-- <div class="row">
                                <div class="col-sm">
                                    <div class="table-responsive">
                                    <table class="table-responsive" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Heading 1</th>
                                                <th scope="col">Heading 2</th>
                                                <th scope="col">Heading 3</th>
                                                <th scope="col">Heading 4</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>
                                                    <div class="controls">
                                                        <input type="text" id="tglPutus" class="form-control datePicker"
                                                            name="tglPutus" placeholder="Tgl Putus">
                                                    </div>
                                                </td>
                                                <td>Table cell</td>
                                                <td>Table cell</td>
                                                <td><div class="controls">
                                                    <input type="text" id="tglPutus" class="form-control datePicker"
                                                        name="tglPutus" placeholder="Tgl Putus">
                                                </div></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div> --}}
                            <form class="form form-vertical" id="addSuratPanjarForm">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-sm">
                                            {{-- <div class="table-responsive"> --}}
                                                <table class="" style="width: 100%" id="rincianPerkaraTable">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">No.</th>
                                                            <th class="text-center">No. Perkara</th>
                                                            <th class="text-center">Jenis Perkara</th>
                                                            <th class="text-center">Tgl Putus</th>
                                                            <th class="text-center">Tgl Minutasi</th>
                                                            <th class="text-center">Tgl BHT</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>
                                                                
                                                                <input type="text" id="tglPutus1"
                                                                    class="form-control datePicker" name="tglPutus1"
                                                                    placeholder="Tgl Putus">
                                                            </td>
                                                            <td></td>
                                                            <td>
                                                                <input type="text" id="tglPutus1"
                                                                    class="form-control datePicker" name="tglPutus2"
                                                                    placeholder="Tgl Putus">
                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>1</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                {{-- <div class="form-group">
                                                                    <div class="controls"> --}}
                                                                        <input type="text" id="nama" class="form-control datePicker" name="nama" placeholder="Nama">
                                                                    {{-- </div>
                                                                </div> --}}
                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            {{-- </div> --}}
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
