<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cart;
class Product extends Model
{
    public $timestamps = false;


    public function quantity(){

        return $this->hasOne('App\Cart','product_id','id');
    }
}
