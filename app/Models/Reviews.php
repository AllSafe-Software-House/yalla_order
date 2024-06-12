<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'place_id',
        'rate_num',
        'comment',
        'doctore_id'
    ];

    public function place()
    {
        return $this->belongsTo(Places::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctores::class);
    }
}
