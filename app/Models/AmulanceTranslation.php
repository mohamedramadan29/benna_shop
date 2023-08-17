<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmulanceTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['driver_name','note'];
    public $timestamps = false;
}
