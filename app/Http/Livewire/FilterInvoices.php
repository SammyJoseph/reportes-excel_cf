<?php

namespace App\Http\Livewire;

use App\Exports\InvoiceExport;
use App\Models\Invoice;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class FilterInvoices extends Component
{
    use WithPagination;

    public $filters = [
        'serie' => '',
        'fromNumber' => '',
        'toNumber' => '',
        'fromDate' => '',
        'toDate' => '',
    ];

    public function render()
    {
        $invoices = Invoice::filter($this->filters)->paginate(10); // filter() es un query scope que se encuentra en el modelo Invoice

        return view('livewire.filter-invoices', compact('invoices'));
    }

    public function generateReport(){
        // return Excel::download(new InvoiceExport(), 'invoices.xlsx');
        return Excel::download(new InvoiceExport(), 'invoices.csv', \Maatwebsite\Excel\Excel::CSV);
    }
}
