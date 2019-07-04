<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection, WithHeadings
{
    use Exportable;

    public function collection()
    {
        $product = Product::all();
        return collect($product);
    }

    public function headings(): array
    {
        return [
            'pid',
            'range_id',
            'bid',
            'is_bat',
            'p_name',
            'p_desc',
            'price',
        ];
    }
}