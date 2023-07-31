<?php

namespace App\Http\Livewire;

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
}
