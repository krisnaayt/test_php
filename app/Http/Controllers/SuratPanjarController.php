<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Surat_panjar;
use App\Berkas_perkara;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\URL;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// class CustomExeption extends Exception
// { }

class SuratPanjarController extends Controller
{
    public function index()
    {
        return view('pages.suratPanjar.list');
    }

    public function get()
    {
        $data = DB::select("call get_list_surat_panjar(null)");
        return DataTables::of($data)
            ->addColumn('actions', function ($row) {
                $actions = '<div class="text-center">';
                $actions .= '<a title="Detail" class="btn btn-icon btn-xs btn-info" role="button" href="' . URL::to('suratPanjar/preview/' . encrypt($row->id_surat)) . '"><i class="fa fa-search"></i></a> ';
                $actions .= '<a title="Edit" class="btn btn-icon btn-xs btn-warning" role="button" href="' . URL::to('suratPanjar/edit/' . encrypt($row->id_surat)) . '"><i class="fa fa-pencil-square-o"></i></a> ';
                // $actions .= '<button type="button" title="Delete" class="btn btn-icon btn-xs btn-danger" role="button" id="deleteSuratBtn" data-id="' . encrypt($row->id_surat) . '"><i class="fa fa-trash-o"></i></button> ';
                $actions .= '</div>';
                return $actions;
            })
            ->addIndexcolumn()
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function preview($id){
        $id_surat = decrypt($id);

        $data = DB::select("call get_list_surat_panjar(".$id_surat.")");

        $surat = $data[0];

        return view('pages.suratPanjar.preview', compact('surat'));
    }
    
    public function add()
    {
        $lastSurat = Surat_panjar::orderBy('no_surat', 'desc')->first();

        if ($lastSurat) {
            $noSurat = (int)$lastSurat->no_surat + 1;
        } else {
            $noSurat = 1;
        }

        return view('pages.suratPanjar.add', compact('noSurat'));
    }

    public function test()
    {
        // $pass = Hash::make('p3rk4r4');

        // echo $pass;
        $lastBerkas = Berkas_perkara::where(DB::raw("date_format(created_at, '%Y-%m')"), date('Y-m'))
        ->orderBy('id_berkas', 'desc')->first();

        $orderNo = $lastBerkas ? ((int) substr($lastBerkas->kode_berkas, 6) + 1) : 1;

        $kodeBerkas = 'BP' . date('ym') . str_pad($orderNo, 5, 0, STR_PAD_LEFT);

        echo $kodeBerkas;

        
    }

    public function store(Request $request)
    {

        DB::beginTransaction();
        try {
            $error = [];

            $lastSurat = Surat_panjar::orderBy('no_surat', 'desc')->first();

            if ($lastSurat) {
                $noSurat = (int)$lastSurat->no_surat + 1;
            } else {
                $noSurat = 1;
            }

            $bulanSurat = date('n');
            $tahunSurat = date('Y');

            $surat = new Surat_panjar;
            $surat->no_surat = $noSurat;
            $surat->bulan_surat = $bulanSurat;
            $surat->tahun_surat = $tahunSurat;
            $surat->nama = $request->nama;
            $surat->alamat = $request->alamat;
            $surat->no_telp = $request->noTelp;
            $surat->no_perkara = $request->noPerkara;
            $surat->info_perkara = $request->infoPerkara;
            $surat->tahun_perkara = $request->tahunPerkara;
            $surat->sebagai = $request->sebagai;
            $surat->no_rekening = $request->noRekening;
            $surat->nama_rekening = $request->namaRekening;
            $surat->cabang = $request->cabang;
            $surat->created_by = Auth::user()->id_user;
            $surat->created_at = now();
            $surat->save();
            $surat->id_surat_encrypt = encrypt($surat->id_surat);
            
            DB::commit();
            return response()->json(['status' => true, 'message' => $error, 'data' => ['surat'=>$surat]], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['status' => true, 'message' => $error, 'data' => []], 500);
        }
    }

    public function edit($id)
    {
        $surat = Surat_panjar::find(decrypt($id));
        return view('pages.suratPanjar.edit', compact('surat'));
    }

    public function update(Request $request)
    {
        $surat = Surat_panjar::find(decrypt($request->idSurat));
        $surat->nama = $request->nama;
        $surat->alamat = $request->alamat;
        $surat->no_telp = $request->noTelp;
        $surat->no_perkara = $request->noPerkara;
        $surat->info_perkara = $request->infoPerkara;
        $surat->tahun_perkara = $request->tahunPerkara;
        $surat->sebagai = $request->sebagai;
        $surat->no_rekening = $request->noRekening;
        $surat->nama_rekening = $request->namaRekening;
        $surat->cabang = $request->cabang;
        $surat->updated_by = Auth::user()->id_user;
        $surat->updated_at = now();
        $surat->save();
    }

    public function delete($id)
    {
        $surat = Surat_panjar::find(decrypt($id));
        $surat->delete();
    }
}
