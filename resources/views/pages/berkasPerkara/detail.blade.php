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
                                    @include('pages.berkasPerkara.detailData')
                                    <hr>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="button" class="btn btn-warning mr-1 mb-1 backBtn" data-url="/berkasPerkara">Cancel</button>
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
