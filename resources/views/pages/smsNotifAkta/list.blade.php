@extends('layouts.contentLayoutMaster')

@section('title', 'Sms Notif')

@section('subtitle', 'Sms Notifikasi Akta Cerai')

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
                                    <a title="Add Perkara" class="btn btn-success mr-1 mb-1" role="button" href="{{ URL::to('smsNotifAkta/add') }}"><i class="fa fa-plus"></i> Add Perkara</a> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table nowrap" style="width: 100%" id="notifAktaTable">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">No.</th>
                                                    <th class="text-center">No. Perkara</th>
                                                    <th class="text-center">No. Akta Cerai</th>
                                                    <th class="text-center">Pemohon</th>
                                                    <th class="text-center">Termohon</th>
                                                    <th class="text-center">Status Sinkron Akta</th>
                                                    <th class="text-center">Status SMS</th>
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
    <script src="{{ asset('js/pages/smsNotifAkta/list.js') }}"></script>
@endsection
