<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appoiment_doctor extends Model
{
    use HasFactory;
    protected $fillable = ['doctor_id', 'appointment_id'];
}
