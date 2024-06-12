<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservationes extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'gender',
        'age',
        'detection_type',
        'detection_location',
        'day_booking',
        'time_booking',
        'doctore_id',
        'status',
        'place_id',
        'totalAfterSale',
        'user_id',
        'reservationNumber'
    ];

    public function doctore()  {
        return $this->belongsTo(Doctores::class);
    }


    public function clinic()  {
        return $this->belongsTo(Places::class);
    }


    public function place()  {
        return $this->belongsTo(Places::class);
    }
}
