<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['code', 'user_id', 'order_info', 'voucher_used', 'total_price','payment_method'];
}
