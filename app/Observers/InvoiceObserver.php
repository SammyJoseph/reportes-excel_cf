<?php

namespace App\Observers;

use App\Models\Invoice;

class InvoiceObserver
{
    public function creating(Invoice $invoice): void
    {
        // $invoice->correlative = Invoice::where('serie', $invoice->serie)->count() + 1; // count() gets the number of rows
        $invoice->correlative = Invoice::where('serie', $invoice->serie)->max('correlative') + 1; // max() gets the highest value of the column
    }
}
