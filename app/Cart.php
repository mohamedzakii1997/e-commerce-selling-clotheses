<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
class Cart extends Model
{
    public $timestamps = false;


    public function product(){
        return $this->hasMany('App\Product','id','product_id');
    }
}
