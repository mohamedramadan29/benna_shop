<?php

namespace App\Http\Livewire;

use App\Models\doctor;
use App\Models\Patient;
use App\Models\Service;
use App\Models\SingleInvoice;
use Hamcrest\Type\IsNumeric;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class SingleInvoices extends Component
{
    public $invoice_saved, $invoice_update;
    public $show_table = true;
    public $price, $discount_value, $patient_id, $doctor_id, $section_id, $Service_id, $type;
    public $tax_rate = 17;
    public function render()
    {
        return view('livewire.SingleInvoices.single-invoices', [
            'single_invoices' => SingleInvoice::all(),
            'Patients' => Patient::all(),
            'Doctors' => doctor::all(),
            'Services' => Service::all(),
            'subtotal' => $total_before_discount = ((is_numeric($this->price) ? $this->price : 0)) - ((is_numeric($this->discount_value) ? $this->discount_value : 0)),
            'tax_value' => $total_before_discount * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100),
        ]);
    }
    public  function show_form_add()
    {
        $this->show_table = false;
    }
    public function get_section()
    {
        $doctor_id = doctor::with('section')->where('id', $this->doctor_id)->first();
        $this->section_id = $doctor_id->section->name;
    }
    public function get_price()
    {
        $this->price = Service::where("id", $this->Service_id)->first()->price;
    }
    // insert into db 

    public function store()
    {

        $single_invoices = new SingleInvoice();
        $single_invoices->invoice_date = date('Y-m-d');
        $single_invoices->patient_id = $this->patient_id;
        $single_invoices->doctor_id = $this->doctor_id;
        $single_invoices->section_id = DB::table('section_translations')->where('name', $this->section_id)->first()->section_id;
        $single_invoices->Service_id = $this->Service_id;
        $single_invoices->price = $this->price;
        $single_invoices->discount_value = $this->discount_value;
        $single_invoices->tax_rate = $this->tax_rate;
        // قيمة الضريبة = السعر - الخصم * نسبة الضريبة /100
        $single_invoices->tax_value = ($this->price - $this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
        // الاجمالي شامل الضريبة  = السعر - الخصم + قيمة الضريبة
        $single_invoices->total_with_tax = $single_invoices->price -  $single_invoices->discount_value + $single_invoices->tax_value;
        $single_invoices->type = $this->type;

        $single_invoices->save();
        $this->invoice_saved = true;
        $this->show_table = true;
    }
}
