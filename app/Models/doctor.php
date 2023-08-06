<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Appointment;

class doctor extends Model
{
    use Translatable;
    use HasFactory;
    public $translatedAttributes = ['name'];
    protected $fillable = ['email', 'email_verified_at', 'password', 'phone', 'name', 'section_id', 'status'];
    //protected $guarded = [];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
    public function docotorappoiments()
    {
        return $this->belongsToMany(Appointment::class, 'appoiment_doctors');
    }
}
