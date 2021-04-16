<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Exports\SuratReportExport;

class SuratReportController extends Controller
{
    public function index(){
        return view('pages.suratReport.export');
    }

    public function export(Request $request){
        $dateRange = $request->dateRange;
        $startDate = 'NULL';
        $endDate = 'NULL';

        if($dateRange){
            $dateRangeArray = explode(' - ', $dateRange);
            $startDate = "'".date("Y-m-d", strtotime($dateRangeArray[0]))."'";
            $endDate = "'".date("Y-m-d", strtotime($dateRangeArray[1]))."'";
        }

        $file_name = 'Report'.'_'.$dateRange.'.xlsx';

        return Excel::download(new SuratReportExport($startDate, $endDate), $file_name);
        
    }
}
