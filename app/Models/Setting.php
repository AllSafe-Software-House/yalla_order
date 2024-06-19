<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    use HasFactory , HasTranslations;
    protected $table = 'aboutus';
    protected $fillable = [
        'title',
        'text'
    ];

    public $translatable = [
        'title',
        'text'
    ];
}
