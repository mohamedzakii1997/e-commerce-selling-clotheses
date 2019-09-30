<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{ public $timestamps = false;
    

public function user(){

    return $this->hasOne('App\User','id','user_id');
}

public function product(){

    return $this->hasMany('App\Order_item','order_id','id');
}

}
