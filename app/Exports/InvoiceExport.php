<?php

namespace App\Exports;

use App\Models\Invoice;
// use Illuminate\Contracts\Support\Responsable; // se puede usar en lugar de ->download() en el controlador
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Excel;

class InvoiceExport implements FromCollection, WithCustomStartCell
{
    use Exportable;

    private $fileName = 'facturas.xlsx'; // nombre del archivo
    private $writerType = Excel::XLSX; // Excel::XLSX, Excel::CSV, Excel::XLS

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Invoice::all();
    }

    public function startCell(): string
    {
        return 'A10';
    }
}
