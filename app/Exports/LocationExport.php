<?php

namespace App\Exports;

use App\Location;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LocationExport implements FromQuery, WithHeadings
{
    use Exportable;

    public function query()
    {
        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', 300);
        $location = Location::query();
        return $location;
    }

    public function headings(): array
    {
        return [
            'id_province',
            'province',
            'id_regency',
            'regency',
            'id_district',
            'district',
            'id_village',
            'village',
        ];
    }
}