<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products; // Replace with your actual model
use PDF; // Import the PDF facade
use Excel; // Import the Excel facade
use App\Exports;
use App\Exports\ProductExport;


class DownloadController extends Controller
{
    public function download(Request $request)
    {
        $data = products::select('id', 'productName')->get(); // Replace with your actual query and columns

        if ($request->has('type') && $request->type === 'pdf') {
            return $this->downloadPDF($data);
        } elseif ($request->has('type') && $request->type === 'excel') {
            return $this->downloadExcel($data);
        }
    }

    private function downloadPDF($data)
    {
        $pdf = PDF::loadView('Admin.pages.product.show', compact('data'));
        return $pdf->download('table.pdf');
    }


    private function downloadExcel($data)
    {
        return \Excel::download(new ProductExport($data), 'table.xlsx'); // Replace with your actual export class
    }
}
 
// Note: Make sure to replace `'column1', 'column2', 'column3'`, `'your.view'`, and `YourExportClass` with your actual values.