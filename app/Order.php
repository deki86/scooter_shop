<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * Constant for order hold
     */
    const ORDER_HOLD = 'The order is processed';
    /**
     * Constant for order sent
     */
    const ORDER_SENT = 'The order is sent to your address';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname',
        'email',
        'telephone',
        'address',
        'city',
        'country',
        'zip',
        'payment_type',
        'payment_id',
        'flag',
        'total_price',
        'parts',
        'user_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'payment_type',
        'flag',
    ];

    /**
     * Check is order is sent to buyers address
     * @return boolean
     */
    public function isOrderSent()
    {
        return $this->flag == Order::ORDER_SENT;
    }
    /**
     * Relation between Order model and User model
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
