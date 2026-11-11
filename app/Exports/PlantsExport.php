<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PlantsExport implements FromCollection, WithHeadings, WithMapping
{
    public function __construct(private Collection $plants) {}

    public function collection()
    {
        return $this->plants;
    }

    public function headings(): array
    {
        return ['Name', 'Category', 'Unit Price', 'Stock Status', 'Description'];
    }

    public function map($plant): array
    {
        return [
            $plant->name,
            ucfirst($plant->category),
            $plant->unit_price,
            $plant->stock_status == 'in_stock' ? 'In Stock' : 'Out of Stock',
            $plant->description,
        ];
    }
}