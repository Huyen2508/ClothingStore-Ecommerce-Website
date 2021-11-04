<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id',  'tag_id','slug', 'name', 'price', 'image', 'quantity', 'color', 'size', 'promotion', 'description', 'detail'];

    public function categories(){
        return $this->belongsTo('App\Models\ProductCategory', 'category_id');
    }

    public function tags(){
        return $this->belongsTo('App\Models\Tag', 'tag_id');
    }
}
