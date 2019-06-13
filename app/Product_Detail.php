<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Detail extends Model
{
    protected $table='product_detail';
    protected $fillable = ['image','product_id'];
    public $timestamps = false;
    public function product(){
        return $this->belongsTo('App\Products','id');
    }
}
