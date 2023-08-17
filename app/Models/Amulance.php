<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amulance extends Model
{
    use Translatable;
    use HasFactory;
    protected $guarded = [];
    public $translatedAttributes = ['driver_name','note'];
}
