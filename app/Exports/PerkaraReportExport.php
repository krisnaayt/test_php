<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\DB;

class PerkaraReportExport implements FromArray, WithHeadings, ShouldAutoSize, WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($serahStart, $serahEnd, $putusStart, $putusEnd, $minutasiStart, $minutasiEnd, $bhtStart, $bhtEnd, $idJenisPerkara, $idBerkasStatus, $idUserCreated)
    {
        $this->serahStart = $serahStart;
        $this->serahEnd = $serahEnd;
        $this->putusStart = $putusStart;
        $this->putusEnd = $putusEnd;
        $this->minutasiStart = $minutasiStart;
        $this->minutasiEnd = $minutasiEnd;
        $this->bhtStart = $bhtStart;
        $this->bhtEnd = $bhtEnd;
        $this->idJenisPerkara = $idJenisPerkara;
        $this->idBerkasStatus = $idBerkasStatus;
        $this->idUserCreated = $idUserCreated;
    }

    public function columnFormats(): array
    {
        return [
            'A' => '@',
            'B' => '@',
            'C' => '@',
            'D' => '@',
            'E' => '@',
            'F' => '@',
            'G' => '@',
            'H' => '@',
            'I' => '@',
            'J' => '@',
            'K' => '@',
            'L' => '@',
            'M' => '@',
            'N' => '@',
            'O' => '@',
            'P' => '@',
            'Q' => '@',
            'R' => '@',
            'S' => '@',
            'T' => '@'
        ];
    }

    public function headings(): array
    {
        return [
            'No',
            'Kode Berkas',
            'Status Terakhir',
            'Tgl. Penyerahan',
            'No. Perkara',
            'Jenis Perkara',
            'Tgl. Putus',
            'Tgl. Minutasi',
            'Tgl. BHT',
            'Dibuat Oleh',
            'Dibuat Pada',
            'Di-update Oleh',
            'Di-update Pada',
            'Diterima Oleh',
            'Diterima Pada',
            'Ditolak Oleh',
            'Ditolak Pada',
            'Di-set BHT Oleh',
            'Di-set BHT Pada',
            'Ket.'
        ];
    }

    public function array(): array{

        $data = DB::select("
            call get_perkara_report(
                ".$this->serahStart.", 
                ".$this->serahEnd.", 
                ".$this->putusStart.", 
                ".$this->putusEnd.", 
                ".$this->minutasiStart.", 
                ".$this->minutasiEnd.", 
                ".$this->bhtStart.", 
                ".$this->bhtEnd.", 
                ".$this->idJenisPerkara.", 
                ".$this->idBerkasStatus.", 
                ".$this->idUserCreated."
        )");

        return $data;
    }
}
