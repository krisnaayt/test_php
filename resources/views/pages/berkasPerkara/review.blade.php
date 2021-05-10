@extends('layouts.contentLayoutMaster')

@section('title', 'Review Berkas')

@section('subtitle', 'Penyerahan Berkas yang Telah Diminutasi oleh Panitera Pengganti')

@section('breadcrumb', 'Review')

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
                            <form class="form form-vertical" id="reviewBerkasPerkaraForm">
                                @csrf
                                <input type="hidden" id="idBerkas" name="idBerkas" value="{{ encrypt($berkas->id_berkas) }}">
                                <div class="form-body">
                                    @include('pages.berkasPerkara.detailData')
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm">
                                            <h4 class="font-weight-bold">Hasil Review</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="ketStatus">Keterangan</label>
                                                <div class="controls">
                                                    <textarea class="form-control" id="ketStatus" name="ketStatus" rows="3" placeholder="Keterangan"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="button" class="btn btn-warning mr-1 mb-1 formBtn backBtn" id="backBtn" data-url="/berkasPerkara">Cancel</button>
                                            <button type="button" class="btn btn-success mr-1 mb-1 formBtn actionBtn" id="approveBtn" data-id="2">Terima</button>
                                            <button type="button" class="btn btn-danger mr-1 mb-1 formBtn actionBtn" id="rejectBtn" data-id="3">Tolak</button>
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
    <script src="{{ asset('js/pages/berkasPerkara/review.js') }}"></script>
@endsection
