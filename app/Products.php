<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';
    protected $fillable=['name','alias','price','intro','content','image','keywords','description','cate_id'];
    // public $timestamps = false;
    public function category(){
        return $this->belongsTo('App\Category','id');
    }
    public function product_detail(){
        return $this->hasMany('App\Product_Detail','product_id');
    }
}
