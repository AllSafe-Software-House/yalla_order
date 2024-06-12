<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content_US extends Model
{
    use HasFactory;
    protected $table = 'content_us';
    protected $fillable =[
        "fname",
        "lname",
        "email",
        "phone",
        "message"
    ] ;
}
