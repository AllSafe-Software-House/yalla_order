<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Addons extends Model
{
    use HasFactory , HasTranslations;
    protected $table = 'addons';
    protected $fillable = [
        'name',
        'price',
        'type',
        'place_id'
    ];

    public $translatable = ['name'];
}
