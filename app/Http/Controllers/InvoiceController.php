<?php

namespace App\Http\Controllers;

use App\Imports\InvoiceImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class InvoiceController extends Controller
{
    public function export()
    {
        return view('invoices.export');
    }

    public function import()
    {
        return view('invoices.import');
    }

    public function importStore(Request $request){
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        $file = $request->file('file');

        Excel::import(new InvoiceImport, $file);

        return "Se importó a la base de datos";
    }
}
