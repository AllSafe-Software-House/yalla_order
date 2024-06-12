<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'doctore_id',
        'menue_id',
        'place_id'
    ];

    public function menues()
    {
        return $this->belongsTo(Menues::class);
    }

}
