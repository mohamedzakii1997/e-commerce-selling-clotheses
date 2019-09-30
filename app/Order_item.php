<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{ public $timestamps = false;
    //


    public function product(){

        return $this->hasOne('App\Product','id','product_id');
    }

}
