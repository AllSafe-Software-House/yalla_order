<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Doctores extends Model
{
    use HasFactory , HasTranslations;
    protected $fillable = [
        'name',
        'department',
        'place_id',
        'starttime',
        'endtime',
        'dayes',
        'price_fees',
        'time',
        'overview',
        'image',
        'sale',
        'wait'
    ];

    public $translatable = [
        'name',
        'department',
        'overview',
    ];

    public function clinic()  {
        return $this->belongsTo(Places::class , 'place_id');
    }

    public function review()
    {
        return $this->hasMany(Reviews::class);
    }

    public function reservation()  {
        return $this->hasOne(Reservationes::class);
    }


    public function bestdoctore(){
        return $this->hasMany(BestLandingPage::class);
    }
}
