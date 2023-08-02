<?php

namespace App\Http\Livewire;

use App\Exports\InvoiceExport;
use App\Models\Invoice;
use Livewire\Component;
use Livewire\WithPagination;

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
        session()->flash('exported', 'Se exportó con éxito a la base de datos');
        return (new InvoiceExport($this->filters))->download(); // se puede omitir ->download() y usar Responsable en el modelo InvoiceExport
    }

    public function clearFilters(){
        $this->reset('filters');
    }
}
