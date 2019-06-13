<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $fillable = ['name','alias','order','parent_id','keywords','description'];
    public $timestamps = false;
    public function product(){
        return $this->hasMany('App\Products','cate_id');
    }
}
