<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResturantRequest extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'resturants_requests';


}
