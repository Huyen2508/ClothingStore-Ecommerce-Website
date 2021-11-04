<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'orders_details';
    protected $fillable = ['order_id', 'product_id', 'quantity', 'size', 'color'];

    public function productOrder(){
        return $this->belongsTo('App\Models\Product','product_id','id');
    }
}
