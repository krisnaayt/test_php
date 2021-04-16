<?php

namespace App\Exports;

use App\Surat_panjar;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class SuratReportExport implements FromArray, WithHeadings
{
    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function headings(): array
    {
        return [
            'No', 'No. Surat', 'No. Perkara', 'Nama', 'Alamat', 'No. Telp.', 'Sebagai', 'No. Rek.', 'Bank', 'Cabang', 'Created At', 'Updated At'
        ];
    }

    public function array(): array{

        $data = DB::select("call get_surat_report(".$this->startDate.", ".$this->endDate.")");

        return $data;
    }
}