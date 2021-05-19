<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Jenis_perkara;
use App\Berkas_perkara;
use App\Perkara;
use Illuminate\Support\Facades\DB;
use Exception;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\URL;

class BerkasPerkaraController extends Controller
{
    public function index(){
        return view('pages.berkasPerkara.list');
    }

    public function get(){
        $user = Auth::user();

        $idUser = $user->id_user;
        $role = $user->role ? $user->role : 'NULL';
        

        $data = DB::select("call get_list_berkas_perkara("."'".$role."'".", ".$idUser.")");
        return DataTables::of($data)
        ->editColumn('berkas_status', function($row){
            $status = '<div class="'.$row->badge.'">'.$row->berkas_status.'</div>';
            return $status;
        })
        ->addColumn('actions', function($row) use($role, $idUser){
            $actions = '<div class="text-center">';
            $actions .= '<a title="Detail" class="btn btn-icon btn-xs btn-info" role="button" href="' . URL::to('berkasPerkara/detail/' . encrypt($row->id_berkas)) . '"><i class="fa fa-search"></i></a> ';
            
            if($row->created_by == $idUser){
                if($row->id_berkas_status == 1 or $row->id_berkas_status == 3){
                    $actions .= '<a title="Edit" class="btn btn-icon btn-xs btn-warning" role="button" href="' . URL::to('berkasPerkara/edit/' . encrypt($row->id_berkas)) . '"><i class="fa fa-pencil-square-o"></i></a> ';
                }
            }
            
            if(($role == 'panmud_gugatan' and $row->grup_jenis_perkara == 'G') or ($role == 'panmud_permohonan' and $row->grup_jenis_perkara == 'P')){
                if($row->id_berkas_status == 1){
                    $actions .= '<a title="Review" class="btn btn-icon btn-xs btn-success" role="button" href="' . URL::to('berkasPerkara/review/' . encrypt($row->id_berkas)) . '"><i class="fa fa-share"></i></a> ';
                }
                if($row->id_berkas_status == 2){
                    $actions .= '<a title="Set BHT" class="btn btn-icon btn-xs btn-primary" role="button" href="' . URL::to('berkasPerkara/setBht/' . encrypt($row->id_berkas)) . '"><i class="fa fa-gavel"></i></a> ';
                }
            }
            
            if($role == 'panmud_hukum'){
                if($row->id_berkas_status == 4){
                    $actions .= '<a title="Diarsipkan" class="btn btn-icon btn-xs btn-dark" role="button" href="' . URL::to('berkasPerkara/setArsip/' . encrypt($row->id_berkas)) . '"><i class="fa fa-bookmark"></i></a> ';
                }
            }

            // $actions .= '<button type="button" title="Delete" class="btn btn-icon btn-xs btn-danger" role="button" id="deleteSuratBtn" data-id="' . encrypt($row->id_berkas) . '"><i class="fa fa-trash-o"></i></button> ';
            $actions .= '</div>';
            return $actions;
        })
        ->addIndexcolumn()
        ->rawColumns(['berkas_status', 'actions'])
        ->make(true);
    }

    public function add(){
        $jenisPerkara = Jenis_perkara::selectRaw("*, concat(kode_jenis_perkara, ' - ', jenis_perkara) as nama_jenis_perkara")->get();
        return view('pages.berkasPerkara.add', compact('jenisPerkara'));
    }

    public function store(Request $request){

        DB::beginTransaction();
        try{
        
            $lastBerkas = Berkas_perkara::where(DB::raw("date_format(created_at, '%Y-%m')"), date('Y-m'))
            ->orderBy('id_berkas', 'desc')->first();

            $orderNo = $lastBerkas ? ((int) substr($lastBerkas->kode_berkas, 6) + 1) : 1;

            $kodeBerkas = 'BP' . date('ym') . str_pad($orderNo, 5, 0, STR_PAD_LEFT);

            $berkas = new Berkas_perkara;
            $berkas->kode_berkas = $kodeBerkas;
            $berkas->tgl_penyerahan = $this->convertToDBDate($request->tglPenyerahan);
            $berkas->id_berkas_status =  1;
            $berkas->grup_jenis_perkara = $request->grupJenisPerkara;
            $berkas->created_by = Auth::user()->id_user;
            $berkas->created_at = now();
            $berkas->save();


            $kodeBerkas = $berkas->kode_berkas;
            $noPerkara = $request->noPerkara;
            $idJenisPerkara = $request->idJenisPerkara;
            $tglPutus = $request->tglPutus;
            $tglMinutasi = $request->tglMinutasi;
            $tglBht = $request->tglBht;

            foreach($request->noPerkara as $index => $item){
                $perkara = new Perkara;
                $perkara->kode_berkas = $kodeBerkas;
                $perkara->no_perkara = $noPerkara[$index];
                $perkara->id_jenis_perkara = $idJenisPerkara[$index];
                $perkara->tgl_putus = $this->convertToDBDate($tglPutus[$index]);
                $perkara->tgl_minutasi = $this->convertToDBDate($tglMinutasi[$index]);
                $perkara->tgl_bht = $tglBht[$index] ? $this->convertToDBDate($tglBht[$index]) : NULL;
                $perkara->save();
            }

            DB::commit();
            return response()->json(['status' => true, 'message' => '', 'data' => []], 200);
        }catch(\Exception $e){
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e, 'data' => []], 500);
        }
    }

    public function getJenisPerkara($grupJenisPerkara){
        $jenisPerkara = Jenis_perkara::selectRaw("*, concat(kode_jenis_perkara, ' - ', jenis_perkara) as nama_jenis_perkara")->where('grup_jenis_perkara', $grupJenisPerkara)->get();

        return response()->json(['status' => true, 'message' => '', 'data' => ['jenisPerkara'=>$jenisPerkara]], 200);
    }

    public function detail($id){
        $berkas = Berkas_perkara::with('perkara.jenisPerkara', 'berkasStatus')->find(decrypt($id));

        $berkas->tgl_penyerahan = $this->convertToViewDate($berkas->tgl_penyerahan);
        $berkas->created = $berkas->userCreated->nama .' pada '. $this->convertToViewDateTime($berkas->created_at);
        $berkas->updated = $berkas->updated_at ? $berkas->userUpdated->nama .' pada '. $this->convertToViewDateTime($berkas->updated_at) : '';
        $berkas->approved = $berkas->approved_at ? $berkas->userApproved->nama .' pada '. $this->convertToViewDateTime($berkas->approved_at) : '';
        $berkas->rejected = $berkas->rejected_at ? $berkas->userRejected->nama .' pada '. $this->convertToViewDateTime($berkas->rejected_at) : '';
        foreach($berkas->perkara as $perkara){
            $perkara->tgl_putus = $this->convertToViewDate($perkara->tgl_putus);
            $perkara->tgl_minutasi = $this->convertToViewDate($perkara->tgl_minutasi);  
            $perkara->tgl_bht =$this->convertToViewDate($perkara->tgl_bht);     
        }

        return view('pages.berkasPerkara.detail', compact('berkas'));
        // return response()->json($berkas);
    }

    public function edit($id){
        return view('pages.berkasPerkara.edit', compact('id'));
    }

    public function getBerkasPerkara(Request $request){
        $berkas = Berkas_perkara::with('perkara')->find(decrypt($request->id_berkas));

        $berkas->tgl_penyerahan = $this->convertToViewDate($berkas->tgl_penyerahan);
        foreach($berkas->perkara as $perkara){
            $perkara->tgl_putus = $this->convertToViewDate($perkara->tgl_putus);
            $perkara->tgl_minutasi = $this->convertToViewDate($perkara->tgl_minutasi);  
            $perkara->tgl_bht =$this->convertToViewDate($perkara->tgl_bht);     
        }

        return response()->json(['status' => true, 'message' => '', 'data' => ['berkas'=>$berkas]], 200);
    }

    public function update(Request $request){

        DB::beginTransaction();
        try{

            $berkas = Berkas_perkara::find(decrypt($request->idBerkas));
            $berkas->tgl_penyerahan = $this->convertToDBDate($request->tglPenyerahan);
            $berkas->id_berkas_status = 1;
            $berkas->updated_by = Auth::user()->id_user;
            $berkas->updated_at = now();
            $berkas->save();

            Perkara::where('kode_berkas', $berkas->kode_berkas)->delete();

            $kodeBerkas = $berkas->kode_berkas;
            $noPerkara = $request->noPerkara;
            $idJenisPerkara = $request->idJenisPerkara;
            $tglPutus = $request->tglPutus;
            $tglMinutasi = $request->tglMinutasi;
            $tglBht = $request->tglBht;

            foreach($request->noPerkara as $index => $item){
                $perkara = new Perkara;
                $perkara->kode_berkas = $kodeBerkas;
                $perkara->no_perkara = $noPerkara[$index];
                $perkara->id_jenis_perkara = $idJenisPerkara[$index];
                $perkara->tgl_putus = $this->convertToDBDate($tglPutus[$index]);
                $perkara->tgl_minutasi = $this->convertToDBDate($tglMinutasi[$index]);
                $perkara->tgl_bht = $tglBht[$index] ? $this->convertToDBDate($tglBht[$index]) : NULL;
                $perkara->save();
            }

            DB::commit();
            return response()->json(['status' => true, 'message' => '', 'data' => []], 200);
        }catch(\Exception $e){
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e, 'data' => []], 500);
        }
    }

    public function review($id){
        $berkas = Berkas_perkara::with('perkara', 'berkasStatus')->find(decrypt($id));

        $berkas->tgl_penyerahan = $this->convertToViewDate($berkas->tgl_penyerahan);
        $berkas->created = $berkas->userCreated->nama .' pada '. $this->convertToViewDateTime($berkas->created_at);
        $berkas->updated = $berkas->updated_at ? $berkas->userUpdated->nama .' pada '. $this->convertToViewDateTime($berkas->updated_at) : '';
        $berkas->approved = $berkas->approved_at ? $berkas->userApproved->nama .' pada '. $this->convertToViewDateTime($berkas->approved_at) : '';
        $berkas->rejected = $berkas->rejected_at ? $berkas->userRejected->nama .' pada '. $this->convertToViewDateTime($berkas->rejected_at) : '';
        foreach($berkas->perkara as $perkara){
            $perkara->tgl_putus = $this->convertToViewDate($perkara->tgl_putus);
            $perkara->tgl_minutasi = $this->convertToViewDate($perkara->tgl_minutasi);  
            $perkara->tgl_bht =$this->convertToViewDate($perkara->tgl_bht);     
        }

        return view('pages.berkasPerkara.review', compact('berkas'));
    }

    public function storeReview(Request $request){
        
        $berkas = Berkas_perkara::find(decrypt($request->idBerkas));
        $berkas->id_berkas_status = $request->idBerkasStatus;
        if($request->idBerkasStatus == '2'){
            $berkas->approved_by = Auth::user()->id_user;
            $berkas->approved_at = now();
        }else{
            $berkas->rejected_by = Auth::user()->id_user;
            $berkas->rejected_at = now();
        }
        $berkas->ket_status = $request->ketStatus;
        $berkas->save();

        return response()->json(['status' => true, 'message' => '', 'data' => []], 200);
    }

    public function setBht($id){
        $berkas = Berkas_perkara::with('perkara.jenisPerkara', 'berkasStatus')->find(decrypt($id));

        $berkas->tgl_penyerahan = $this->convertToViewDate($berkas->tgl_penyerahan);
        $berkas->created = $berkas->userCreated->nama .' pada '. $this->convertToViewDateTime($berkas->created_at);
        $berkas->updated = $berkas->updated_at ? $berkas->userUpdated->nama .' pada '. $this->convertToViewDateTime($berkas->updated_at) : '';
        $berkas->approved = $berkas->approved_at ? $berkas->userApproved->nama .' pada '. $this->convertToViewDateTime($berkas->approved_at) : '';
        $berkas->rejected = $berkas->rejected_at ? $berkas->userRejected->nama .' pada '. $this->convertToViewDateTime($berkas->rejected_at) : '';
        foreach($berkas->perkara as $perkara){
            $perkara->tgl_putus = $this->convertToViewDate($perkara->tgl_putus);
            $perkara->tgl_minutasi = $this->convertToViewDate($perkara->tgl_minutasi);  
            $perkara->tgl_bht =$this->convertToViewDate($perkara->tgl_bht);     
        }
        return view('pages.berkasPerkara.bht', compact('berkas'));
        // return response()->json($berkas);
    }

    public function storeSetBht(Request $request){
        DB::beginTransaction();
        try{

            $berkas = Berkas_perkara::find(decrypt($request->idBerkas));
            $berkas->id_berkas_status = 4;
            $berkas->set_bht_by = Auth::user()->id_user;
            $berkas->set_bht_at = now();
            $berkas->save();

            $tglBht = $request->tglBht;

            foreach($tglBht as $index => $item){
                $perkara = Perkara::find($index);
                $perkara->tgl_bht = $this->convertToDBDate($item);
                $perkara->save();
            }

            DB::commit();
            return response()->json(['status' => true, 'message' => '', 'data' => []], 200);
        }catch(\Exception $e){
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e, 'data' => []], 500);
        }
    }

    public function setArsip($id){
        $berkas = Berkas_perkara::with('perkara.jenisPerkara', 'berkasStatus')->find(decrypt($id));

        $berkas->tgl_penyerahan = $this->convertToViewDate($berkas->tgl_penyerahan);
        $berkas->created = $berkas->userCreated->nama .' pada '. $this->convertToViewDateTime($berkas->created_at);
        $berkas->updated = $berkas->updated_at ? $berkas->userUpdated->nama .' pada '. $this->convertToViewDateTime($berkas->updated_at) : '';
        $berkas->approved = $berkas->approved_at ? $berkas->userApproved->nama .' pada '. $this->convertToViewDateTime($berkas->approved_at) : '';
        $berkas->rejected = $berkas->rejected_at ? $berkas->userRejected->nama .' pada '. $this->convertToViewDateTime($berkas->rejected_at) : '';
        foreach($berkas->perkara as $perkara){
            $perkara->tgl_putus = $this->convertToViewDate($perkara->tgl_putus);
            $perkara->tgl_minutasi = $this->convertToViewDate($perkara->tgl_minutasi);  
            $perkara->tgl_bht =$this->convertToViewDate($perkara->tgl_bht);     
        }
        return view('pages.berkasPerkara.arsip', compact('berkas'));
    }

    public function storeSetArsip(Request $request){
        DB::beginTransaction();
        try{

            $berkas = Berkas_perkara::find(decrypt($request->idBerkas));
            $berkas->id_berkas_status = 5;
            $berkas->set_arsip_by = Auth::user()->id_user;
            $berkas->set_arsip_at = now();
            $berkas->save();

            DB::commit();
            return response()->json(['status' => true, 'message' => '', 'data' => []], 200);
        }catch(\Exception $e){
            DB::rollback();
            return response()->json(['status' => false, 'message' => $e, 'data' => []], 500);
        }
    }

    public function test(){
        
    }
}
