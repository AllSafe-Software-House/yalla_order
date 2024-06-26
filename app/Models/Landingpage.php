<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Landingpage extends Model
{
    use HasFactory , HasTranslations;
    protected $fillable = [
        'name',
        'title',
        'description',
    ];

    public $translatable = ['title', 'description'];
}
