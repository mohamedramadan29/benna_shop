<?php

namespace App\Http\Livewire;

use App\Models\SingleInvoice;
use Livewire\Component;

class SingleInvoices extends Component
{
public $invoice_saved,$invoice_update;
public $show_table = true;

    public function render()
    {
        return view('livewire.SingleInvoices.single-invoices',[
            'single_invoices'=>SingleInvoice::all(),
        ]);
    }
    public  function show_form_add(){
        $this->show_table=false;
    }
}
