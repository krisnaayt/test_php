<?php

namespace App\Http\Controllers;

use App\Berkas_status;
use Illuminate\Http\Request;
use App\Jenis_perkara;
Use App\User;
use Excel;
use App\Exports\PerkaraReportExport;

class PerkaraReportController extends Controller
{
    public function index(){
        $jenisPerkara = Jenis_perkara::selectRaw("*, concat(kode_jenis_perkara, ' - ', jenis_perkara) as nama_jenis_perkara")->get();

        $berkasStatus = Berkas_status::all();

        $user = User::where('user_group', 'admin_emus')->where('username', '!=', 'admin_emus')->orderBy('nama')->get();

        return view('pages.perkaraReport.export', compact('jenisPerkara', 'berkasStatus', 'user'));
    }

    public function export(Request $request){
        $daterangePenyerahan = $request->daterangePenyerahan;
        $serahStart = 'NULL';
        $serahEnd = 'NULL';

        if($daterangePenyerahan){
            $serahArray = explode(' - ', $daterangePenyerahan);
            $serahStart = "'".date("Y-m-d", strtotime($serahArray[0]))."'";
            $serahEnd = "'".date("Y-m-d", strtotime($serahArray[1]))."'";
        }

        $daterangePutus = $request->daterangePutus;
        $putusStart = 'NULL';
        $putusEnd = 'NULL';

        if($daterangePutus){
            $putusArray = explode(' - ', $daterangePutus);
            $putusStart = "'".date("Y-m-d", strtotime($putusArray[0]))."'";
            $putusEnd = "'".date("Y-m-d", strtotime($putusArray[1]))."'";
        }

        $daterangeMinutasi = $request->daterangeMinutasi;
        $minutasiStart = 'NULL';
        $minutasiEnd = 'NULL';

        if($daterangeMinutasi){
            $minutasiArray = explode(' - ', $daterangeMinutasi);
            $minutasiStart = "'".date("Y-m-d", strtotime($minutasiArray[0]))."'";
            $minutasiEnd = "'".date("Y-m-d", strtotime($minutasiArray[1]))."'";
        }

        $daterangeBht = $request->daterangeBht;
        $bhtStart = 'NULL';
        $bhtEnd = 'NULL';

        if($daterangeBht){
            $bhtArray = explode(' - ', $daterangeBht);
            $bhtStart = "'".date("Y-m-d", strtotime($bhtArray[0]))."'";
            $bhtEnd = "'".date("Y-m-d", strtotime($bhtArray[1]))."'";
        }

        $idJenisPerkara = $request->idJenisPerkara ? $request->idJenisPerkara : 'NULL';
        $idBerkasStatus = $request->idBerkasStatus ? $request->idBerkasStatus : 'NULL';
        $idUserCreated = $request->idUserCreated ? $request->idUserCreated : 'NULL';

        $fileName = 'report_berkas_perkara.xlsx';

        // $test = $serahStart.' - '. $serahEnd.' - '. $putusStart.' - '. $putusEnd.' - '. $minutasiStart.' - '. $minutasiEnd.' - '. $bhtStart.' - '. $bhtEnd.' - '. $idJenisPerkara.' - '. $idBerkasStatus.' - '.$idUserCreated;

        return Excel::download(new PerkaraReportExport($serahStart, $serahEnd, $putusStart, $putusEnd, $minutasiStart, $minutasiEnd, $bhtStart, $bhtEnd, $idJenisPerkara, $idBerkasStatus, $idUserCreated), $fileName);
        // return Excel::download(new PerkaraReportExport($test), $fileName);
    }
    
}
