<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctortranslation extends Model
{
    use HasFactory;
    protected $fillable= ['name','appointment'];
    public $timestamps = false;
}
