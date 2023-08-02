<?php

namespace App\Imports;

use App\Models\Invoice;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class InvoiceImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Invoice([
            'user_id' => 1,
            'serie' => $row[0], // columna 0 de cada fila
            'base' => $row[2],
            'igv' => $row[3],
            'total' => $row[4],
            'date' => Carbon::instance(Date::excelToDateTimeObject($row[6])), // cuando el formato de fecha en la columna excel es fecha
            // 'date' => Carbon::createFromFormat('d/m/Y' ,$row[6]), // cuando el formato de fecha en la columna excel es texto
        ]);
    }

    /* public function collection($rows)
    {
        foreach ($rows as $row) {
            $invoice = Invoice::create([
                'user_id' => 1,
                'serie' => $row[0], // columna 0 de cada fila
                'base' => $row[2],
                'igv' => $row[3],
                'total' => $row[4],
                'date' => Carbon::instance(Date::excelToDateTimeObject($row[6])),
            ]);

            // Ejemplo de como se usaría ToCollection para crear un registro en otra tabla
            Compras::create([
                'invoice_id'    => $invoice->id,                
            ]);
        }
    } */
}
