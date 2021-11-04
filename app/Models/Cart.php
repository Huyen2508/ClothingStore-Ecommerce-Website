<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    
    protected $fillable = [
        'user_id', 'product_id','user_session_id','size','color','quantity'
    ];

    public function productInCart(){
        return $this->belongsTo('App\Models\Product','product_id','id');
    }
}
