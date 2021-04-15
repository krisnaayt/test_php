@extends('layouts.contentLayoutMaster')

@section('title', 'List Surat')

@section('subtitle', 'Surat Persetujuan Pengembalian Sisa Panjar Non Tunai')

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
                                    <a title="Add" class="btn btn-success mr-1 mb-1" role="button" href="{{ URL::to('suratPanjar/add') }}"><i class="fa fa-plus"></i> Add Surat</a> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    {{-- <h4 class="card-title">List Surat</h4> --}}
                                    <div class="table-responsive">
                                        <table class="table nowrap" style="width: 100%" id="suratPanjarTable">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-center">No. Surat</th>
                                                    <th class="text-center">No. Perkara</th>
                                                    <th class="text-center">Nama</th>
                                                    <th class="text-center">Alamat</th>
                                                    <th class="text-center">No. Telp</th>
                                                    <th class="text-center">Sebagai</th>
                                                    {{-- <th class="text-center">No. Rekening</th>
                                                    <th class="text-center">Nama Bank</th>
                                                    <th class="text-center">Cabang</th> --}}
                                                    {{-- <th class="text-center">Created</th>
                                                    <th class="text-center">Updated</th> --}}
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
    {{-- <script src="{{ asset('vendors/js/ui/jquery.sticky.js') }}"></script> --}}
@endsection

@section('page-script')
    <script src="{{ asset('js/pages/suratPanjar/list.js') }}"></script>
@endsection
