<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\DB;

class ProductItemExport implements FromArray, WithHeadings, ShouldAutoSize, WithColumnFormatting
{
    public function __construct($productId)
    {
        $this->productId = $productId;
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
            'H' => '@'
        ];
    }

    public function headings(): array
    {
        return [
            'No', 'Product', 'Category', 'Price', 'Stock', 'Image URL', 'Created At', 'Updated At'
        ];
    }

    public function array(): array{

        $data = DB::select("call export_product_item(".$this->productId.")");

        return $data;
    }
}
