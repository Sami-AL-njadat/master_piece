<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\products;

class YourExportClass implements FromCollection
{
    public function collection()
    {
        return products::select('id', 'image1', 'image2', 'image3', 'productName', 'price', 'created_at')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Image1',
            'Image2',
            'Image3',
            'Product Name',
            'Price',
            'Created At',
        ];
    }
}

 