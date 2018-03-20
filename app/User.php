<?php

namespace App;

use App\Order;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;
    /**
     * Constant for verified user
     */
    const VERIFIED_USER = '1';
    /**
     * Constant for unverified user
     */
    const UNVERIFIED_USER = '0';
    /**
     * protected array for delete attributes
     * @var array
     */
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lastname',
        'address',
        'city',
        'country',
        'email',
        'password',
        'verified',
        'verification_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'verification_token',
    ];

    /**
     * Function for check is user verified
     * @return boolean
     */
    public function isVerified()
    {
        return $this->verified == User::VERIFIED_USER;
    }

    /**
     * Function for generate verification token
     * @return string
     */
    public static function generateVerificationCode()
    {
        return str_random(40);
    }

    /**
     * Relation between User model and Order model
     * @return void
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
