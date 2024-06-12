<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        // 'place_id',
        'name',
        'logo',
        'type'
    ];


    public function places()
    {
        return $this->belongsToMany(Places::class);
    }
}
