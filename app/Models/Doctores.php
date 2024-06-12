<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctores extends Model
{
    use HasFactory;
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

    public function clinic()  {
        return $this->belongsTo(Places::class);
    }

    public function review()
    {
        return $this->hasMany(Reviews::class);
    }

    public function reservation()  {
        return $this->hasOne(Reservationes::class);
    }
}
