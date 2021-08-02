<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Sms_akta;
use App\Sms_pemohon;
use App\Sms_termohon;
use App\Sms_get_akta_log;
use App\Sms_send_akta_log;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\URL;

class SmsNotifAktaController extends Controller
{
    public function index(){
        return view('pages.smsNotifAkta.list');
    }

    public function get(){
        $data = DB::select("call get_list_notif_akta(null)");
        return DataTables::of($data)
            ->addColumn('pemohon', function($row){
                $data = $row->nama_pemohon.'<br>'.
                        'No. HP : '.$row->no_hp_pemohon;
                return $data;
            })
            ->addColumn('termohon', function($row){
                $data = $row->nama_termohon.'<br>'.
                        'No. HP : '.$row->no_hp_termohon;
                return $data;
            })
            ->editColumn('get_akta_status', function($row){
                $data = '<div class="'.$row->badge_get_akta_status.'">'.$row->get_akta_status.'</div>';
                return $data;
            })
            ->editColumn('send_akta_status', function($row){
                $data = '<div class="'.$row->badge_send_akta_status.'">'.$row->send_akta_status.'</div>';
                return $data;
            })
            ->addColumn('actions', function ($row) {
                $actions = '<div class="text-center">';
                $actions .= '<a title="Detail" class="btn btn-icon btn-xs btn-info" role="button" href="' . URL::to('smsNotifAkta/detail/' . encrypt($row->id_sms_akta)) . '"><i class="fa fa-search"></i></a> ';
                if($row->id_get_akta_status != 4 and $row->id_send_akta_status == 1){
                    $actions .= '<a title="Edit" class="btn btn-icon btn-xs btn-warning" role="button" href="' . URL::to('smsNotifAkta/edit/' . encrypt($row->id_sms_akta)) . '"><i class="fa fa-pencil-square-o"></i></a> ';
                }
                $actions .= '</div>';
                return $actions;
            })
            ->addIndexcolumn()
            ->rawColumns(['actions', 'pemohon', 'termohon', 'get_akta_status', 'send_akta_status'])
            ->make(true);
    }

    public function findPerkara(Request $request){
        try{
            $noPerkara = $request->noPerkara.'/Pdt.'.$request->jenisPerkara.'/'.$request->tahunPerkara.'/PA.Blcn';
            // $noPerkara = '226/Pdt.G/2021/PA.Blcn';
            $client = new Client;
            $response = $client->request(
                'POST', 
                'http://192.168.100.252/sms_notif/c_api/getPerkara',
                [
                    'json' => [
                        'token' => config('app.sms_notif_api_key'),
                        'noPerkara' => $noPerkara
                    ]
                ]
            );

            $data = json_decode($response->getBody());

            if($data->perkara->idPerkara != ''){
                $data->perkara->idPerkara = encrypt($data->perkara->idPerkara);
            }

            if($data->status == true){
                return response()->json(['status' => true, 'message' => $data->message, 'data' => ['perkara' => $data->perkara]], 200);
            }else{
                return response()->json(['status' => false, 'message' => '', 'data' => []], 500);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, 'message' => $e, 'data' => []], 500);
        }
    }

    public function add(){
        return view('pages.smsNotifAkta.add');
    }

    public function store(Request $request){
        
        DB::beginTransaction();
        try{

            $checkAkta = Sms_akta::where('id_perkara', decrypt($request->idPerkara))->first();
            
            if(empty($checkAkta)){
                $akta = new Sms_akta;
                $akta->id_perkara = decrypt($request->idPerkara);
                $akta->no_perkara = $request->noPerkaraFull;
                $akta->created_by = Auth::user()->id_user;
                $akta->created_at = now();
                $akta->id_get_akta_status = 1;
                $akta->id_send_akta_status = 1;
                $akta->save();

                $pemohon = new Sms_pemohon;
                $pemohon->id_sms_akta = $akta->id_sms_akta;
                $pemohon->nama = $request->namaPemohon;
                $pemohon->no_hp = $request->noHpPemohon;
                $pemohon->save();

                $termohon = new Sms_termohon;
                $termohon->id_sms_akta = $akta->id_sms_akta;
                $termohon->nama = $request->namaTermohon;
                $termohon->no_hp = $request->noHpTermohon;
                $termohon->save();

                DB::commit();
                return response()->json(['status' => true, 'message' => '', 'data' => []], 200);
            
            }else{
                return response()->json(['status' => true, 'message' => 'Nomor perkara sudah terdaftar', 'data' => []], 400);
            }

        }catch(\Exception $e){
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e, 'data' => []], 500);
        }
    }

    public function edit($id){
        $data = DB::select("call get_list_notif_akta(".decrypt($id).")");

        $akta = $data[0];

        return view('pages.smsNotifAkta.edit', compact('akta'));
    }

    public function detail($id){
        $data = DB::select("call get_list_notif_akta(".decrypt($id).")");

        $akta = $data[0];

        return view('pages.smsNotifAkta.detail', compact('akta'));
    }

    public function update(Request $request){
        
        DB::beginTransaction();
        try{
            $idSmsAkta = decrypt($request->idSmsAkta);

            $akta = Sms_akta::find($idSmsAkta);
            $akta->updated_by = Auth::user()->id_user;
            $akta->updated_at = now();
            $akta->save();

            Sms_pemohon::where('id_sms_akta', $idSmsAkta)->update([
                'no_hp' => $request->noHpPemohon
            ]);
            
            Sms_termohon::where('id_sms_akta', $idSmsAkta)->update([
                'no_hp' => $request->noHpTermohon
            ]);

            DB::commit();
            return response()->json(['status' => true, 'message' => '', 'data' => []], 200);

        }catch(\Exception $e){
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e, 'data' => []], 500);
        }
    }

    public function syncAktaCeraiSipp(){
        DB::beginTransaction();
        try{
            $smsAkta = Sms_akta::where('no_akta_cerai', NULL)->orWhere('no_akta_cerai', '')->get();

            $idPerkaraArray = array();

            if(count($smsAkta) > 0){
                foreach($smsAkta as $akta){
                    array_push($idPerkaraArray, $akta->id_perkara);
                }

                $client = new Client;
                $response = $client->request(
                    'POST', 
                    'http://192.168.100.252/sms_notif/c_api/getAktaCerai',
                    [
                        'json' => [
                            'token' => config('app.sms_notif_api_key'),
                            'idPerkara' => $idPerkaraArray
                        ]
                    ]
                );

                $data = json_decode($response->getBody());

                $idPerkaraArrayGet = array();
                if($data->status == true){
                    foreach($data->akta as $akta){
                        $smsAktaData = Sms_akta::where('id_perkara', $akta->perkara_id)->first();

                        $smsAkta = Sms_akta::find($smsAktaData->id_sms_akta);
                        $smsAkta->no_akta_cerai = $akta->nomor_akta_cerai;
                        $smsAkta->last_sync_akta_at = now();
                        $smsAkta->id_get_akta_status = 2;
                        $smsAkta->save();

                        Sms_pemohon::where('id_sms_akta', $smsAktaData->id_sms_akta)->update([
                            'tgl_penyerahan_akta' => $akta->tgl_penyerahan_akta_pemohon
                        ]);

                        Sms_termohon::where('id_sms_akta', $smsAktaData->id_sms_akta)->update([
                            'tgl_penyerahan_akta' => $akta->tgl_penyerahan_akta_termohon
                        ]);

                    }
                }
            }

            // log

            DB::commit();
        }catch(\Exception $e){
            DB::rollback();

            // return response()->json(['status' => false, 'message' => $e, 'data' => []], 500);
        }
    }

    public function sendSmsAkta(){
        DB::beginTransaction();
        try{


            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
        }
    }
}
