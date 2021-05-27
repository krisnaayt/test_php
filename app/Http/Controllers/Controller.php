<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use DateTime;
use App\Notif_berkas;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function convertToViewDate($date){
        $dateFormat = $date ? DateTime::createFromFormat('Y-m-d', $date) : '';
        return $dateFormat ? $dateFormat->format('d/m/Y') : '';
    }

    public function convertToDBDate($date){
        $dateFormat = $date ? DateTime::createFromFormat('d/m/Y', $date) : '';
        return $dateFormat ? $dateFormat->format('Y-m-d') : ''; 
    }


    public function convertToViewDateTime($date){
        $dateFormat = $date ? DateTime::createFromFormat('Y-m-d H:i:s', $date) : '';
        return $dateFormat ? $dateFormat->format('d/m/Y H:i') : ''; 
    }

    public function convertToDBDateTime($date){
        $dateFormat = $date ? DateTime::createFromFormat('d/m/Y H:i', $date) : '';
        return $dateFormat ? $dateFormat->format('Y-m-d H:i:s') : ''; 
    }

    public function createNotifBerkas($kodeBerkas, $idBerkasStatus, $grupJenisPerkara, $createdBy){
        
        $sendToArray = array();

        if($grupJenisPerkara == 'P'){
            if($idBerkasStatus == 1){       // menunggu
                array_push($sendToArray, 4);        // panmud permohonan
            }elseif($idBerkasStatus == 2){  // diterima
                // array_push($sendToArray, 4);        // panmud permohonan
                array_push($sendToArray, $createdBy);            
            }elseif($idBerkasStatus == 3){  // ditolak
                array_push($sendToArray, $createdBy);
            }elseif($idBerkasStatus == 4){  // bht
                array_push($sendToArray, 7);        // panmud hukum
                array_push($sendToArray, $createdBy);
            }elseif($idBerkasStatus == 5){  // arsip
                array_push($sendToArray, 4); 
                array_push($sendToArray, $createdBy);
            }
        }else{
            if($idBerkasStatus == 1){       // menunggu
                array_push($sendToArray, 5);        // panmud gugatan
            }elseif($idBerkasStatus == 2){  // diterima
                // array_push($sendToArray, 5);        // panmud gugatan
                array_push($sendToArray, $createdBy);            
            }elseif($idBerkasStatus == 3){  // ditolak
                array_push($sendToArray, $createdBy);
            }elseif($idBerkasStatus == 4){  // bht
                array_push($sendToArray, 7);        // panmud hukum
                array_push($sendToArray, $createdBy);
            }elseif($idBerkasStatus == 5){  // arsip
                array_push($sendToArray, 5);  
                array_push($sendToArray, $createdBy);
            }
        }

        $notifArray = array();

        if(count($sendToArray) > 0){
            foreach($sendToArray as $sendToUser){    
                $notif = new Notif_berkas;
                $notif->kode_berkas = $kodeBerkas;
                $notif->id_berkas_status = $idBerkasStatus;
                $notif->send_to_user = $sendToUser;
                $notif->created_by = Auth::user()->id_user;
                $notif->created_at = now();
                $notif->save();

                array_push($notifArray, $notif);
            }
        }

        return $notifArray;
    }

    public function deleteNotif($kodeBerkas){      // delete notif when access page directly
        $user = Auth::user();
        Notif_berkas::where('kode_berkas', $kodeBerkas)
        ->where('send_to_user', $user->id_user)
        ->delete();
    }
}
