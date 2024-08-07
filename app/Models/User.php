<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable , HasRoles , SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'social_id',
        'social_type',
        'phone',
        'address',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function wallet()
    {
        return $this->morphOne(UserWallet::class, 'walletable');
    }

    public function walletTransactions()
    {
        return $this->morphMany(WalletTransaction::class,'transactionable');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function review()
    {
        return $this->hasMany(Reviews::class);
    }

    public function trackorder()
    {
        return $this->hasMany(OrderTrake::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }
}
