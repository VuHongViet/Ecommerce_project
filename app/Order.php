<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $fillable = ['tenkh','tensp','image','price','qty','totalprice','thanhtien'];
    public $timestapms = false;
}
