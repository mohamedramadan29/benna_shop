<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    use Translatable;
    use HasFactory;
    public $translatedAttributes = ['name','appointment'];
    protected $fillable = ['email','email_verified_at','password','phone','price','name','appointment','section_id','status'];
    //protected $guarded = [];

    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }
    public function section(){
        return $this->belongsTo(Section::class);
    }
}
