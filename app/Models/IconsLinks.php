<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IconsLinks extends Model
{
    use HasFactory;
    protected $table = "icons_links";
    protected $fillable = [
        "classname",
        "link",
        "name"
    ];
}
