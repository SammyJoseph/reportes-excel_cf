<?php

namespace App\Imports;

use App\Models\Invoice;
use Maatwebsite\Excel\Concerns\ToModel;

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
        ]);
    }
}
