@extends('layouts.contentLayoutMaster')

@section('title', 'Preview Surat')

@section('subtitle', 'Surat Persetujuan Pengembalian Sisa Panjar Non Tunai')

@section('breadcrumb', 'Preview')

@section('vendor-style')

@endsection

@section('page-style')
<link rel="stylesheet" href="{{ asset('css/pages/suratPanjar/preview.css') }}">
@endsection

@section('content')
    <!-- Basic Horizontal form layout section start -->
    <section>
        <div class="row match-height">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        {{-- <h4 class="card-title">Multiple Column</h4> --}}
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div id="exportContent">
                                    <div class="col-12">
                                        <table >
                                            <tbody style="font-family: Arial">
                                                <tr style="height: 10px">
                                                    <td rowspan="5" style="width: 110px;">
                                                        <img width="79px" height="101px" src="{{ asset('images/pages/suratPanjar/logo_pa_batulicin.png') }}">
                                                    </td>
                                                    <td><b>PENGADILAN AGAMA BATULICIN KLAS II</b></td>
                                                </tr>
                                                <tr >
                                                    <td>Jalan Dharma Praja RT. 02 Gunung Tinggi</td>
                                                </tr>
                                                <tr>
                                                    <td>Telp. (0518) 6070035</td>
                                                </tr>
                                                <tr>
                                                    <td>Website pa-batulicin.pta-banjarmasin.go.id</td>
                                                </tr>
                                                <tr>
                                                    <td>Email pa.batulicin@gmail.com</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <br>
                                        <br>
                                        <p style="font-family: Arial; text-align: center"><b>SURAT PERSETUJUAN PENGEMBALIAN SISA PANJAR NON TUNAI</b></p>
                                        <p style="font-family: Arial; text-align: center"><b>Nomor: {{ $surat->no_surat_full }}</b></p>
                                        <br>
                                        <table class="table" id="dataSuratPanjarTable">
                                            <tbody style="font-family: Arial">
                                                <tr style="height: 25px">
                                                    <td >Nama</td>
                                                    <td style="width: 100px"></td>
                                                    <td>: {{ $surat->nama }}</td>
                                                </tr>
                                                <tr style="height: 25px">
                                                    <td >Alamat</td>
                                                    <td style="width: 100px"></td>
                                                    <td>: {{ $surat->alamat }}</td>
                                                </tr>
                                                <tr style="height: 25px">
                                                    <td >Nomor Telepon</td>
                                                    <td style="width: 100px"></td>
                                                    <td>: {{ $surat->no_telp }}</td>
                                                </tr>
                                                <tr style="height: 25px">
                                                    <td >Nomor Perkara</td>
                                                    <td style="width: 100px"></td>
                                                    <td>: {{ $surat->no_perkara_full }}</td>
                                                </tr>
                                                <tr style="height: 25px">
                                                    <td >Sebagai</td>
                                                    <td style="width: 100px"></td>
                                                    <td>: {{ $surat->sebagai }}</td>
                                                </tr>
                                                <tr style="height: 25px">
                                                    <td >Nomor Rekening</td>
                                                    <td style="width: 100px"></td>
                                                    <td>: {{ $surat->no_rekening }}</td>
                                                </tr>
                                                <tr style="height: 25px">
                                                    <td >Nama Bank</td>
                                                    <td style="width: 100px"></td>
                                                    <td>: {{ $surat->nama_rekening }}</td>
                                                </tr>
                                                <tr style="height: 25px">
                                                    <td >Cabang</td>
                                                    <td style="width: 100px"></td>
                                                    <td>: {{ $surat->cabang }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <p style="font-family: Arial; line-height: 25px; text-align: justify;">
                                            &emsp;&emsp;&emsp;&emsp;
                                            Bersedia menerima pengembalian sisa panjar secara non tunai/transfer bank setelah dipotong biaya transfer oleh Bank Negara Indonesia Syariah Cabang Batulicin;
                                        </p>
                                        <p style="font-family: Arial; line-height: 25px; text-align: justify;">
                                            &emsp;&emsp;&emsp;&emsp;
                                            Demikian surat ini Saya buat dan ditandatangani secara sadar dan sehat;
                                        </p>
                                        <br>
                                        <br>
                                        @php 
                                            setlocale(LC_ALL, 'IND');
                                        @endphp
                                        <p style="font-family: Arial; text-align: left;">
                                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                            Batulicin, {{ strftime('%d %B %Y') }}
                                        </p>
                                        <p style="font-family: Arial; text-align: left;">
                                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                            Pemohon
                                        </p>
                                        <br>
                                        <br>
                                        <br>
                                        <p style="font-family: Arial; text-align: left;">
                                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
                                            {{ $surat->nama }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary mr-1 mb-1" id="exportSuratBtn">Export</button>
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
    <script src="{{ asset('vendors/js/filesaver/FileSaver.min.js') }}"></script>
    <script src="{{ asset('vendors/js/jquery-word-export/jquery.wordexport.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('js/pages/suratPanjar/preview.js') }}"></script>
@endsection
