<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'product_categories';
    
    protected $fillable = [
        'name', 'slug'
    ];

    public function product(){
        return $this->hasMany('App\Models\Product','category_id','id');
    }

}
