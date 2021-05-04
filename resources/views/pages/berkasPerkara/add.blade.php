@extends('layouts.contentLayoutMaster')

@section('title', 'Add Berkas')

@section('subtitle', 'Penyerahan Berkas yang Telah Diminutasi oleh Panitera Pengganti')

@section('breadcrumb', 'Add')

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
                                        <div class="col-sm">
                                            <h4 class="font-weight-bold">Info Berkas</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="tglPenyerahan">Tgl. Penyerahan</label>
                                                <div class="controls">
                                                    <input type="text" id="tglPenyerahan" class="form-control bootstrapDatepicker" name="tglPenyerahan" placeholder="Tgl Penyerahan" value="{{ date('d/m/Y') }}">
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
                                                        {{-- <tr>
                                                            <td>1</td>
                                                            <td>
                                                                <div class="controls">
                                                                    <input type="text" id="noPerkara" class="form-control" name="noPerkara" placeholder="No. Perkara">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="controls">
                                                                    <select class="form-control select2" id="idJenisPerkara" name="idJenisPerkara">
                                                                        <option></option>
                                                                        @foreach ($jenisPerkara as $jp)
                                                                            <option value="{{ $jp->id_jenis_perkara }}">{{ $jp->nama_jenis_perkara }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="controls">
                                                                    <input type="text" id="tglPutus" class="form-control bootstrapDatepicker" name="tglPutus" placeholder="Tgl Putus">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="controls">
                                                                    <input type="text" id="tglMinutasi" class="form-control bootstrapDatepicker" name="tglMinutasi" placeholder="Tgl Minutasi">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="controls">
                                                                    <input type="text" id="tglBHT" class="form-control bootstrapDatepicker" name="tglBHT" placeholder="Tgl BHT">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <button type="button" title="Add" class="btn btn-icon btn-xs btn-success" role="button" id="addPerkaraBtn" ><i class="fa fa-plus"></i></button>
                                                            </td>
                                                        </tr> --}}
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
    <script src="{{ asset('js/pages/berkasPerkara/add.js') }}"></script>
@endsection
