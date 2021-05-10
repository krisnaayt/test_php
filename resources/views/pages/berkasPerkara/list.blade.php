@extends('layouts.contentLayoutMaster')

@section('title', 'List Berkas Perkara')

@section('subtitle', 'Penyerahan Berkas yang Telah Diminutasi oleh Panitera Pengganti')

@section('breadcrumb', 'List')

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
                            <div class="row">
                                <div class="col-12">
                                    <a title="Add" class="btn btn-success mr-1 mb-1" role="button" href="{{ URL::to('berkasPerkara/add') }}"><i class="fa fa-plus"></i> Add Berkas</a> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    {{-- <h4 class="card-title">List Surat</h4> --}}
                                    <div class="table-responsive">
                                        <table class="table nowrap" style="width: 100%" id="berkasPerkaraTable">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-center">Kode Berkas</th>
                                                    <th class="text-center">Tgl Penyerahan</th>
                                                    <th class="text-center">Perkara</th>
                                                    <th class="text-center">Status Terakhir</th>
                                                    <th class="text-center">Dibuat</th>
                                                    <th class="text-center">Diterima</th>
                                                    <th class="text-center">Actions</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
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
@endsection

@section('page-script')
    <script src="{{ asset('js/pages/berkasPerkara/list.js') }}"></script>
@endsection
