<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SingleInvoice extends Model
{
    use HasFactory;
    protected  $guarded = [];

    public function Service(){
        return $this->belongsTo(Service::class,'service_id');
    }
    public function Patient(){
        return $this->belongsTo(Patient::class,'patient_id');
    }
    public function Doctor(){
        return $this->belongsTo(doctor::class,'doctor_id');
    }
    public function Section(){
        return $this->belongsTo(Section::class,'section_id');
    }
}
