<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo_Codes extends Model
{
    use HasFactory;
    protected $table = 'promo_codes';
    protected $fillable = [
        'place_id',
        'name',
        'sale',
        'start',
        'end',
        'type'
    ];

    public function place()
    {
        return $this->belongsTo(Places::class);
    }
}
