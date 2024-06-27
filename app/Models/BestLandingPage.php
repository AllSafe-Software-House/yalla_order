<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BestLandingPage extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctore_id'
    ];


    public function doctore(){
        return $this->belongsTo(Doctores::class,'doctore_id');
    }
}
