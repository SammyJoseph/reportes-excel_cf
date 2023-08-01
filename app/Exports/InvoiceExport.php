<?php

namespace App\Exports;

use App\Models\Invoice;
// use Illuminate\Contracts\Support\Responsable; // se puede usar en lugar de ->download() en el controlador
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize; // para autoajustar el ancho de las columnas
use Maatwebsite\Excel\Concerns\WithColumnWidths; // para ajustar el ancho de las columnas manualmente
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Excel;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class InvoiceExport implements FromCollection, WithCustomStartCell, WithMapping, WithColumnFormatting, WithHeadings, WithColumnWidths
{
    use Exportable;

    private $filters;
    private $fileName = 'facturas.xlsx'; // nombre del archivo
    private $writerType = Excel::XLSX; // Excel::XLSX, Excel::CSV, Excel::XLS

    public function __construct(array $filters)
    {
        $this->filters = $filters;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Invoice::all();
        return Invoice::filter($this->filters)->get(); // filter() es un query scope que se encuentra en el modelo Invoice
    }

    public function startCell(): string
    {
        return 'A1';
    }

    public function map($invoice): array
    {
        return [
            $invoice->serie,
            $invoice->correlative,
            $invoice->base,
            $invoice->igv,
            $invoice->total,
            $invoice->user->name,
            Date::dateTimeToExcel($invoice->created_at), // formato de fecha para el campo created_at
        ];
    }

    public function columnFormats(): array
    {
        return [
            'G' => 'dd/mm/yyyy hh:mm:ss', // formato de fecha para mostrar en Excel en la columna G
        ];
    }

    public function headings(): array
    {
        return [
            'Serie',
            'Correlativo',
            'Base',
            'IGV',
            'Total',
            'Usuario',
            'Fecha de Creación',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 10,
            'C' => 10,
            'D' => 10,
            'E' => 10,
            'F' => 30,
            'G' => 25,
        ];
    }
}
