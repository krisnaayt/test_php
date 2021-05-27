<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notif_berkas;
use App\Berkas_perkara;
use DateTime;
use Illuminate\Support\Facades\DB;

class NotifController extends Controller
{
    public function readNotif($id)
    {
        DB::beginTransaction();
        try{

            $user = Auth::user();

            $notif = Notif_berkas::find(decrypt($id));
            $notif->delete();

            $berkas = Berkas_perkara::where('kode_berkas', $notif->kode_berkas)->first();

            $route = '';
            $routeReview = '/berkasPerkara/review/'.encrypt($berkas->id_berkas);
            $routeSetBht = '/berkasPerkara/setBht/'.encrypt($berkas->id_berkas);
            $routeSetArsip = '/berkasPerkara/setArsip/'.encrypt($berkas->id_berkas);
            $routeDetail = '/berkasPerkara/detail/'.encrypt($berkas->id_berkas);

            if($user->role == 'panmud_permohonan' or $user->role == 'panmud_gugatan'){
                if($berkas->id_berkas_status == 1){         // diajukan -> review
                    $route = $routeReview;
                }elseif($berkas->id_berkas_status == 2){    // diterima -> bht
                    $route = $routeSetBht;
                }else{
                    $route = $routeDetail;
                }
            }elseif($user->role == 'panmud_hukum'){
                if($berkas->id_berkas_status == 4){         // bht -> arsip
                    $route = $routeSetArsip;
                }else{
                    $route = $routeDetail;
                }
            }else{
                $route = $routeDetail;
            }
        
            DB::commit();
            return response()->json(['status' => true, 'message' => '', 'data' => ['route'=>$route, 'berkas'=>$berkas]], 200);
        }catch(\Exception $e){
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e, 'data' => []], 500);
        }
    }

    public function readAllNotif()
    {
        $idUser = Auth::user()->id_user;
        Notif_berkas::where('send_to_user', $idUser)->delete();
    }

    public function getNotif()
    {
        $user = Auth::user();

        $notif = [];
        
        $notif = Notif_berkas::with('berkasStatus')->with('userCreated')->where('send_to_user', $user->id_user)->orderBy('created_at', 'desc')->get();
        if (count($notif) > 0) {
            foreach ($notif as $item) {
                $item->id_notif_berkas_encrypt = encrypt($item->id_notif_berkas);

                $dateFormat = DateTime::createFromFormat('Y-m-d H:i:s', $item->created_at);
                $item->created_at_formatted = $dateFormat->format('d/m/Y H:i');
            }
        }

        return response()->json(['status' => true, 'message' => '', 'data' => ['notif' => $notif]], 200);
    }
}
